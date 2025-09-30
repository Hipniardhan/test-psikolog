<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TesController extends Controller
{
    public function kepribadian()
    {
        return view('tes.kepribadian.index');
    }

    public function bigfive()
    {
    $soals = DB::table('kepribadian_soals')
            ->where('tipe', 'bigfive')
            ->get();

    $jawaban = DB::table('kepribadian_jawaban')
            ->whereIn('soal_id', $soals->pluck('id'))
            ->get()
            ->groupBy('soal_id');

    // Return the unified Big Five test view with progressive navigation UI
    return view('tes-kepribadian-bigfive', compact('soals', 'jawaban'));
    }

    public function submitBigfive(Request $request)
    {
    $user_id = Auth::id() ?? 0;
        $jawaban_ids = $request->input('jawaban', []);
        $total_skor = 0;
        foreach ($jawaban_ids as $id) {
            $jawaban = DB::table('kepribadian_jawaban')->find($id);
            if ($jawaban) {
                $total_skor += $jawaban->bobot;
            }
        }

        if ($total_skor < 30) {
            $interpretasi = "Cenderung lebih hati-hati, introvert, atau kurang nyaman dengan hal-hal baru.";
        } elseif ($total_skor <= 70) {
            $interpretasi = "Memiliki keseimbangan antara ekstrovert dan introvert, fleksibel dalam berbagai situasi.";
        } else {
            $interpretasi = "Sangat terbuka pada pengalaman baru, suka tantangan, percaya diri, dan punya sifat kepemimpinan.";
        }

    $hasil_id = DB::table('kepribadian_hasil')->insertGetId([
            'user_id' => $user_id,
            'tipe' => 'bigfive',
            'total_skor' => $total_skor,
            'interpretasi' => $interpretasi,
            'tanggal_tes' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('bigfive.hasil', ['id' => $hasil_id]);
    }

    // Alias method to match requested naming TesController@store
    public function store(Request $request)
    {
        return $this->submitBigfive($request);
    }

    public function mbti()
    {
        return view('tes.kepribadian.mbti');
    }

    public function mmpiKepribadian()
    {
        return view('tes.kepribadian.mmpi');
    }

    public function minatBakat()
    {
        return view('tes.minatbakat');
    }

    public function mmpi()
    {
        return view('tes.mmpi');
    }
}
