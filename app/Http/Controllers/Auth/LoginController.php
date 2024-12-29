<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    // This method displays the login page with necessary data passed to the view.
    public function index()
    {
        // Renders the login view.
        return view("auth.login.index", [
            'routeAction' => route('auth.login.action'), // The route to handle the login action.
            'routeHome' => route('site.home'), // The route to the home page.
            'routeForgotPassword' => 'todo-forgot-password' // Placeholder for the forgot password route.
        ]);
    }

    // This method handles the login action after the user submits the login form.
    public function action(LoginRequest $request)
    {
        $request->authenticate(); // Authenticates the user using the validated data in the LoginRequest.

        $request->session()->regenerate(); // Regenerates the session to prevent session fixation attacks.

        // Redirects the user to their intended destination or the dashboard home if no previous URL is set.
        return redirect()->intended(route('dashboard.home', absolute: false));
    }
}
