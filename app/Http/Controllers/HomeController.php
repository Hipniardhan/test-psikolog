<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Redirect user to dashboard based on role (after login).
     */
    public function redirect()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        // Reuse existing helper logic
        return LandingController::redirectByRole($user);
    }
}
