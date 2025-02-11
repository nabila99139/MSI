<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContractController extends Controller
{
    public function contract()
    {
        return view('contract');
    }

    public function contract_hitung(Request $request)
    {
        $otr = $request->input('otr') ?? 0;
        $dp = $request->input('dp') ?? 0;
        $jangka_waktu = $request->input('jangka_waktu') ?? 0;

        $pokok_utang = $otr - $dp;

        if ($jangka_waktu <= 12) {
            $bunga = 12;
        } else if ($jangka_waktu > 12 && $jangka_waktu <= 24) {
            $bunga = 14;
        } else if ($jangka_waktu > 24) {
            $bunga = 16.5;
        } else {
            return response()->json(['error' => 'Jangka waktu tidak valid.'], 400);
        }

        $angsuran = ($jangka_waktu > 0) ? (($pokok_utang + ($pokok_utang * ($bunga / 100))) / $jangka_waktu) : 0;


        // ini kalo akumulasi sebelum 14 Agustus 2024
        $jadwal_angsuran = DB::select("SELECT SUM(angsuran_per_bulan) AS total_angsuran  
            FROM jadwal_angsuran  
            WHERE tanggal_jatuh_tempo < '2024-08-14'  
            GROUP BY kontrak_no  
        ");

        $total_angsuran_14Agt = [];
        foreach ($jadwal_angsuran as $data) {
            $total_angsuran_14Agt[] = $data->total_angsuran_14Agt;
        }

        // jawaban nomor 3
        $total_angsuran_lompat_bulan = DB::select("SELECT 
                *,
                DATEDIFF('2024-08-14', TANGGAL_JATUH_TEMPO) AS HARI_KETERLAMBATAN,
                ROUND(DATEDIFF('2024-08-14', TANGGAL_JATUH_TEMPO) * 0.1) AS PERSENTASE_DENDA,
                ROUND(DATEDIFF('2024-08-14', TANGGAL_JATUH_TEMPO) * 0.001 * ANGSURAN_PER_BULAN) AS DENDA,
                ROUND((DATEDIFF('2024-08-14', TANGGAL_JATUH_TEMPO) * 0.001 * ANGSURAN_PER_BULAN) + ANGSURAN_PER_BULAN) AS TOTAL
            FROM jadwal_angsuran
            WHERE ANGSURAN_KE > 5
            AND DATE(TANGGAL_JATUH_TEMPO) < '2024-08-14';
        ");

        $total_angsuran_lompat_bulan = [];
        foreach ($total_angsuran_lompat_bulan as $data) {
            $total_angsuran_lompat_bulan[] = $data->HARI_KETERLAMBATAN;
        }

        return response()->json([
            'otr' => $otr,
            'dp' => $dp,
            'jangka_waktu' => $jangka_waktu,
            'pokok_utang' => $pokok_utang,
            'bunga' => $bunga,
            'angsuran' => $angsuran,
            'total_angsuran_14Agt' => $total_angsuran_14Agt,
            'total_angsuran_lompat_bulan' => $total_angsuran_lompat_bulan,
        ]);
    }
}
