<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\Creator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class SettingCreatorController
 *
 * Mengelola pengaturan data kreator yang berkaitan dengan informasi dompet dan portofolio.
 */
class SettingCreatorController extends Controller
{
    /**
     * Menampilkan halaman pengaturan kreator.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Ambil data kreator yang sesuai dengan user_id
        $creator = Creator::where('user_id', $user->id)->first();

        // Kirim data user dan creator ke view
        return view('creator.setting.index', compact('user', 'creator'));
    }

    /**
     * Memperbarui atau membuat data kreator untuk pengguna yang sedang login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'account_number' => 'required|string|max:100', // Nomor rekening wajib, maksimal 100 karakter
            'wallet_name' => 'required|string|max:100',    // Nama dompet wajib, maksimal 100 karakter
            'portfolio' => 'required|string|max:255',      // Portofolio wajib, maksimal 255 karakter
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Cari data kreator berdasarkan user_id
        $creator = Creator::where('user_id', $user->id)->first();

        // Jika data kreator sudah ada, perbarui
        if ($creator) {
            $creator->update([
                'account_number' => $request->account_number,
                'wallet_name' => $request->wallet_name,
                'portfolio' => $request->portfolio,
            ]);
        }
        // Jika belum ada, buat data kreator baru
        else {
            Creator::create([
                'user_id' => $user->id,
                'account_number' => $request->account_number,
                'wallet_name' => $request->wallet_name,
                'portfolio' => $request->portfolio,
            ]);
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data updated successfully!');
    }
}
