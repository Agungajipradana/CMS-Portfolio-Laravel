<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view("auth.login.index", [
            'routeAction' => route('auth.login.action'),
            'routeHome' => route('site.home'),
            'routeForgotPassword' => 'todo-forgot-password'
        ]);
    }

    public function action(Request $request)
    {
        dd($request->all());
    }
}
