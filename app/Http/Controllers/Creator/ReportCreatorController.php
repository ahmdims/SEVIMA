<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportCreatorController extends Controller
{
    /**
     * Menampilkan laporan pendapatan dan statistik untuk creator
     *
     * Method ini menangani permintaan untuk melihat laporan pendapatan creator berdasarkan periode tertentu.
     * Data yang ditampilkan termasuk:
     * - Pendapatan total dan rata-rata
     * - Perbandingan dengan periode sebelumnya
     * - Data pendapatan per bulan/minggu
     * - Asset dengan download terbanyak
     *
     * @param Request $request Mengandung parameter filter:
     *               - option: Periode laporan (Annual/Month)
     *               - annual: Tahun yang dipilih
     *               - month: Bulan yang dipilih (jika periode Monthly)
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Mendapatkan data user yang sedang login
        $user = Auth::user();
        $creatorId = $user->creator->id;

        // Mendapatkan parameter filter dari request
        $period = $request->input('option', 'Month'); // Default ke Monthly
        $year = $request->input('annual', now()->year); // Default tahun sekarang
        $month = $request->input('month', now()->month); // Default bulan sekarang

        // Inisialisasi variabel untuk data laporan
        $formattedIncome = [];
        $totalIncome = 0;
        $averageIncome = 0;
        $lastYearIncome = 0;
        $lastMonthIncome = 0;
        $lastYearAvgIncome = 0;
        $lastMonthAvgIncome = 0;

        // Mendapatkan data pendapatan berdasarkan periode yang dipilih
        if ($period === 'Annual') {
            /**
             * Laporan Tahunan - breakdown per bulan
             * Query untuk mendapatkan pendapatan per bulan pada tahun yang dipilih
             */
            $incomeData = DB::table('download_history')
                ->join('asset', 'download_history.asset_id', '=', 'asset.id')
                ->whereYear('download_history.created_at', $year)
                ->where('asset.creator_id', $creatorId)
                ->select(
                    DB::raw('MONTH(download_history.created_at) as month'),
                    DB::raw('SUM(asset.price) as income')
                )
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('income', 'month')
                ->toArray();

            // Format data pendapatan untuk semua bulan (1-12)
            for ($i = 1; $i <= 12; $i++) {
                $formattedIncome[$i] = $incomeData[$i] ?? 0;
            }

            // Total pendapatan untuk tahun yang dipilih
            $totalIncome = array_sum($formattedIncome);

            // Pendapatan tahun sebelumnya untuk perbandingan
            $lastYearIncome = DB::table('download_history')
                ->join('asset', 'download_history.asset_id', '=', 'asset.id')
                ->whereYear('download_history.created_at', $year - 1)
                ->where('asset.creator_id', $creatorId)
                ->select(DB::raw('SUM(asset.price) as income'))
                ->value('income') ?? 0;

            // Hitung rata-rata (dalam 365 hari)
            $averageIncome = $totalIncome / 365;
            $lastYearAvgIncome = $lastYearIncome / 365;
        } else {
            /**
             * Laporan Bulanan - breakdown per minggu
             * Query untuk mendapatkan pendapatan per minggu pada bulan yang dipilih
             */
            $incomeData = DB::table('download_history')
                ->join('asset', 'download_history.asset_id', '=', 'asset.id')
                ->whereYear('download_history.created_at', $year)
                ->whereMonth('download_history.created_at', $month)
                ->where('asset.creator_id', $creatorId)
                ->select(
                    DB::raw('LEAST(4, WEEK(download_history.created_at, 1) - WEEK(DATE_SUB(download_history.created_at, INTERVAL DAYOFMONTH(download_history.created_at)-1 DAY), 1) + 1) as week'),
                    DB::raw('SUM(asset.price) as income')
                )
                ->groupBy('week')
                ->orderBy('week')
                ->pluck('income', 'week')
                ->toArray();

            // Format data pendapatan untuk semua minggu (1-4)
            for ($i = 1; $i <= 4; $i++) {
                $formattedIncome[$i] = $incomeData[$i] ?? 0;
            }

            // Total pendapatan untuk bulan yang dipilih
            $totalIncome = array_sum($formattedIncome);

            // Pendapatan bulan sebelumnya untuk perbandingan
            $prevMonth = $month == 1 ? 12 : $month - 1;
            $prevYear = $month == 1 ? $year - 1 : $year;

            $lastMonthIncome = DB::table('download_history')
                ->join('asset', 'download_history.asset_id', '=', 'asset.id')
                ->whereYear('download_history.created_at', $prevYear)
                ->whereMonth('download_history.created_at', $prevMonth)
                ->where('asset.creator_id', $creatorId)
                ->select(DB::raw('SUM(asset.price) as income'))
                ->value('income') ?? 0;

            // Hitung rata-rata (dalam 30 hari)
            $averageIncome = $totalIncome / 30;
            $lastMonthAvgIncome = $lastMonthIncome / 30;
        }

        /**
         * Mendapatkan data asset dengan download terbanyak (top 10)
         * Query ini tidak terpengaruh oleh periode filter
         */
        $bestDownloads = DB::table('download_history')
            ->join('asset', 'download_history.asset_id', '=', 'asset.id')
            ->leftJoin('creator', 'asset.creator_id', '=', 'creator.id')
            ->leftJoin('user', 'creator.user_id', '=', 'user.id')
            ->leftJoin('category', 'asset.category_id', '=', 'category.id')
            ->select(
                'asset.id',
                'asset.title',
                'category.name as category_name',
                'asset.image',
                'user.name as creator_name',
                DB::raw('COUNT(download_history.id) as total_downloads')
            )
            ->where('asset.creator_id', $creatorId)
            ->groupBy('asset.id', 'asset.title', 'category.name', 'asset.image', 'user.id', 'user.name')
            ->orderByDesc('total_downloads')
            ->limit(10)
            ->get();

        // Return view dengan semua data yang diperlukan
        return view('creator.report.index', [
            'report' => [],
            'totalIncome' => $totalIncome,
            'averageIncome' => $averageIncome,
            'period' => $period,
            'year' => $year,
            'month' => $month,
            'lastYearIncome' => $lastYearIncome,
            'lastMonthIncome' => $lastMonthIncome,
            'totalIncomeInLastYear' => $lastYearIncome,
            'averageIncomeInLastMonth' => $lastMonthAvgIncome,
            'lastMonthAvgIncome' => $lastMonthAvgIncome,
            'lastYearAvgIncome' => $lastYearAvgIncome,
            'averageIncomeInLastYear' => $lastYearAvgIncome,
            'totalIncomeInLastMonth' => $lastMonthIncome,
            'formattedIncome' => $formattedIncome,
            'bestDownloads' => $bestDownloads
        ]);
    }
}
