<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardCreatorController extends Controller
{
    /**
     * Tampilkan halaman dashboard kreator.
     * Menyediakan statistik pendapatan, jumlah aset aktif,
     * jumlah saldo yang telah dicairkan, dan daftar aset terpopuler.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();

        /**
         * Ambil data pendapatan bulanan kreator berdasarkan histori download
         * Grup berdasarkan tahun dan bulan, lalu hitung total pendapatan
         */
        $incomeData = DB::table('download_history')
            ->join('asset', 'download_history.asset_id', '=', 'asset.id')
            ->join('creator', 'asset.creator_id', '=', 'creator.id')
            ->where('creator.user_id', $userId)
            ->selectRaw('YEAR(download_history.created_at) as year, MONTH(download_history.created_at) as month, SUM(asset.price) as total_income')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        $incomeStats = []; // Menyimpan statistik pendapatan
        $previousIncome = null;

        // Hitung persentase perubahan pendapatan dibanding bulan sebelumnya
        foreach ($incomeData as $data) {
            $percentageChange = null;

            if ($previousIncome !== null) {
                $percentageChange = $previousIncome > 0
                    ? (($data->total_income - $previousIncome) / $previousIncome) * 100
                    : 100;
            }

            $incomeStats[] = [
                'year' => $data->year,
                'month' => $data->month,
                'total_income' => $data->total_income,
                'percentage_change' => $percentageChange
            ];

            $previousIncome = $data->total_income;
        }

        // Ambil data pendapatan bulan terbaru (jika ada)
        $latestIncome = $incomeStats[0] ?? ['total_income' => 0, 'percentage_change' => 0];

        /**
         * Hitung total saldo yang sudah dicairkan oleh kreator
         * hanya untuk status klaim yang disetujui (status = 1)
         */
        $amountClaim = DB::table('claim')
            ->join('creator', 'claim.creator_id', '=', 'creator.id')
            ->where('creator.user_id', $userId)
            ->where('claim.status', 1)
            ->sum('claim.saldo');

        /**
         * Hitung total jumlah aset aktif (status = 1)
         * yang dimiliki oleh kreator
         */
        $assetCount = DB::table('asset')
            ->join('creator', 'asset.creator_id', '=', 'creator.id')
            ->where('creator.user_id', $userId)
            ->where('asset.status', 1)
            ->count();

        /**
         * Ambil 5 aset terpopuler berdasarkan jumlah download terbanyak
         * Disertakan juga informasi kategori aset
         */
        $topAssets = DB::table('download_history')
            ->join('asset', 'download_history.asset_id', '=', 'asset.id')
            ->join('creator', 'asset.creator_id', '=', 'creator.id')
            ->join('category', 'asset.category_id', '=', 'category.id')
            ->where('creator.user_id', $userId)
            ->select(
                'asset.id',
                'asset.title',
                'asset.image',
                'category.name as category_name',
                DB::raw('COUNT(download_history.id) as total_downloads')
            )
            ->groupBy('asset.id', 'asset.title', 'asset.image', 'category.name')
            ->orderByDesc('total_downloads')
            ->limit(5)
            ->get();

        // Kembalikan ke view dashboard kreator dengan data yang sudah dihitung
        return view('creator.dashboard.index', compact(
            'latestIncome',
            'assetCount',
            'amountClaim',
            'topAssets'
        ));
    }
}
