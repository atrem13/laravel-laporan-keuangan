<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginSetupController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function form_login() {
        return view('auth.pages.login');
    }

    public function filter_login(Request $request) {
        if ( ! in_array($request->login_as, ['admin'])) return redirect()->back()->withInput()->with('error', 'What re u doin?');
        if (auth()->guard($request->login_as)->attempt($request->only('username', 'password'))) {
            if(auth()->guard('admin')->user()){
                return redirect()->route('laporan_keuangan.index');
            }
            // return redirect()->route('dasboard.index');
        } else {
            return redirect()->back()->withInput()->with('error', 'Login gagal.');
        }
    }
    public function logout() {
        auth()->guard('admin')->logout();
        return redirect()->route('form_login');
    }
}
