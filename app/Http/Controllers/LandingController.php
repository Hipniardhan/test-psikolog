<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Show the public landing page.
     */
    public function index()
    {
        return view('landing.index');
    }

    /**
     * Handle contact form submission (placeholder).
     */
    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        // Placeholder: here you could store to DB or send mail.
        // For now, just flash a success message.
        return back()->with('status', 'Terima kasih! Pesan kamu sudah kami terima.');
    }

    /**
     * Redirect helper berdasarkan role user.
     */
    public static function redirectByRole($user)
    {
        switch ($user->role ?? null) {
            case 'admin':
                // Prefer route name if available
                return redirect()->route('admin.dashboard');
            case 'dokter':
                return redirect('/dokter/dashboard');
            case 'perawat':
                return redirect('/perawat/dashboard');
            case 'pasien':
                return redirect('/pasien/dashboard');
            default:
                return redirect()->route('dashboard');
        }
    }
}
