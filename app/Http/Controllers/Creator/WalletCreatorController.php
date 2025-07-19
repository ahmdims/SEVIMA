<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Claim;
use App\Models\DownloadHistory;
use App\Models\Asset;
use Illuminate\Support\Facades\DB;

/**
 * Class WalletCreatorController
 *
 * Mengelola dompet kreator, termasuk perhitungan penghasilan, klaim saldo, dan laporan penghasilan.
 */
class WalletCreatorController extends Controller
{
    /**
     * Menampilkan halaman dompet kreator.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil data kreator yang sedang login
        $creator = Auth::user()->creator;
        $userId = Auth::id();

        // Hitung total penghasilan dari semua aset kreator berdasarkan jumlah download x harga
        $totalIncome = $creator->assets()->with('downloadHistory')->get()->sum(function ($asset) {
            return $asset->price * $asset->downloadHistory->count();
        });

        // Hitung total saldo yang sudah diklaim dan masih diproses atau berhasil
        $claimedAmount = Claim::where('creator_id', $creator->id)
            ->where('status', '!=', 2) // 2 = ditolak
            ->sum('saldo');

        // Penghasilan yang tersedia = total - yang sudah diklaim
        $income = $totalIncome - $claimedAmount;

        // Ambil riwayat klaim
        $claim = Claim::where('creator_id', $creator->id)
            ->latest()
            ->get();

        // Hitung jumlah aset yang aktif untuk kreator ini
        $assetCount = DB::table('asset')
            ->join('creator', 'asset.creator_id', '=', 'creator.id')
            ->where('creator.user_id', $userId)
            ->where('asset.status', 1) // hanya aset yang aktif
            ->count();

        // Tampilkan ke view
        return view('creator.wallet.index', compact('income', 'claim', 'assetCount'));
    }

    /**
     * Mengajukan klaim saldo oleh kreator.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function claim(Request $request)
    {
        // Validasi form
        $request->validate([
            'claim_amount' => 'required|numeric',
            'wallet_name' => 'required|string',
            'account_number' => 'required|string',
        ]);

        $claimAmount = (float) $request->claim_amount;

        // Minimal klaim: Rp 100.000
        if ($claimAmount < 100000) {
            return redirect()->route('creator.wallet.index')->with('error', 'Claim amount must be at least Rp 100.000');
        }

        $creator = Auth::user()->creator;

        // Hitung total penghasilan kreator
        $totalIncome = $creator->assets()
            ->with('downloadHistory')
            ->get()
            ->sum(fn($asset) => $asset->price * $asset->downloadHistory->count());

        // Hitung jumlah saldo yang telah diklaim (selain yang ditolak)
        $claimedSaldo = Claim::where('creator_id', $creator->id)
            ->where('status', '!=', 2)
            ->sum('saldo');

        // Hitung saldo yang tersedia untuk diklaim
        $availableBalance = $totalIncome - $claimedSaldo;

        // Jika klaim melebihi saldo tersedia, batalkan
        if ($claimAmount > $availableBalance) {
            return redirect()->route('creator.wallet.index')->with('error', 'Claim amount exceeds available balance.');
        }

        // Ambil download terakhir dari aset milik kreator
        $latestDownload = DownloadHistory::whereHas('asset', function ($query) use ($creator) {
            $query->where('creator_id', $creator->id);
        })->latest()->first();

        // Jika tidak ada download valid, batalkan klaim
        if (!$latestDownload) {
            return redirect()->route('creator.wallet.index')->with('error', 'No valid download found for claim.');
        }

        // Buat klaim baru
        Claim::create([
            'creator_id' => $creator->id,
            'download_id' => $latestDownload->id,
            'account_number' => $request->account_number,
            'wallet_name' => $request->wallet_name,
            'saldo' => $claimAmount,
            'status' => 0, // status awal = pending
        ]);

        return redirect()->route('creator.wallet.index')->with('success', 'Claim submitted successfully.');
    }

    /**
     * Mengembalikan total penghasilan kreator dalam format JSON.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function income()
    {
        $creator = Auth::user()->creator;

        // Hitung total penghasilan
        $totalIncome = Asset::where('creator_id', $creator->id)
            ->with('downloadHistory')
            ->get()
            ->sum(function ($asset) {
                return $asset->price * $asset->downloadHistory->count();
            });

        return response()->json(['total_income' => $totalIncome]);
    }
}
