<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AuthUserController extends Controller
{
    public function login() {
        return view('authuser/login');
    }

    public function getLogin(LoginRequest $request){
        $attemptLogin = Auth::attempt(['nia' => $request->nia, 'password' => $request->password]);
        if ($attemptLogin) {
            $user = Auth::user();

            if ($user->is_active == 1) {
                if ($user->level == 'admin') {
                    session(['id' => $user->id, 'username' => $user->name, 'email' => $user->email, 'level' => $user->level]);
                    return Redirect::to('admin/dashboard');
                } else if ($user->level == 'anggota') {
                    session(['id' => $user->id, 'username' => $user->name, 'email' => $user->email, 'level' => $user->level]);
                    return Redirect::to('anggota/dashboard');
                }
            } else {
                Session::flash('Message', 'Nomor Nia '.$request->nia.' telah di nonaktifkan');
                return Redirect::to('login');
            }
        } else {
            Session::flash('Message', 'nomor NIA atau password salah');
            return Redirect::to('login')->withErrors([
                'email'=> trans('auth.failed')
            ])->withInput();
        }
    }

    public function logout(){
        session()->flush();
        Auth::logout();
        return Redirect::to('/');
    }
}
