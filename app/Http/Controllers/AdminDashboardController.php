<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $counts = DB::table('kepribadian_soals')
            ->selectRaw("tipe, COUNT(*) as total")
            ->groupBy('tipe')
            ->pluck('total','tipe');

        $summary = [
            'bigfive' => $counts['bigfive'] ?? 0,
            'mbti' => $counts['mbti'] ?? 0,
            'mmpi' => $counts['mmpi'] ?? 0,
        ];
        return view('admin.dashboard', compact('summary'));
    }
}
