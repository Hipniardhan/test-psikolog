<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPesertaController extends Controller
{
    public function index()
    {
        $peserta = DB::table('users as u')
            ->leftJoin('kepribadian_hasil as h', 'h.user_id', '=', 'u.id')
            ->where('u.role', 'user')
            ->select('u.id', 'u.name', 'u.email',
                DB::raw('COUNT(h.id) as tes_count'),
                DB::raw('MAX(h.tanggal_tes) as last_test'))
            ->groupBy('u.id', 'u.name', 'u.email')
            ->orderByDesc(DB::raw('last_test'))
            ->paginate(15);

        return view('admin.peserta.index', compact('peserta'));
    }

    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if (!$user) {
            return redirect()->route('admin.peserta.index')->with('error', 'Peserta tidak ditemukan');
        }

        $hasil = DB::table('kepribadian_hasil as h')
            ->where('h.user_id', $id)
            ->orderByDesc('h.tanggal_tes')
            ->paginate(10);

        return view('admin.peserta.show', compact('user', 'hasil'));
    }
}
