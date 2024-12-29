<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     * 
     * This method is invoked when the LogoutController is called, as it is a single-action controller.
     */
    public function __invoke(Request $request)
    {
        // Logs out the currently authenticated user.
        Auth::logout();

        // Invalidates the current session to prevent reuse.
        $request->session()->invalidate();  // Invalidates the current session to prevent reuse.

        // Generates a new CSRF token to protect against cross-site request forgery attacks.
        $request->session()->regenerateToken();

        // Redirects the user to the login page after logging out.
        return redirect()->intended(route("auth.login"));
    }
}
