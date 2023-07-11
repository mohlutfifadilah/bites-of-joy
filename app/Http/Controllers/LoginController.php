<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function login()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            if (Auth::user()->role == 1) {
                return redirect('dashboard');
            } else {
                return redirect('/');
            }
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function actionregister(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        // $role = $request->role;
        // if ($request->role == 'Administrator') {
        //     $role = 1;
        // } else {
        //     $role = 2;
        // }
        Users::create([
            'name'      =>   $request->name,
            'email'     =>   $request->email,
            'role'      =>   2,
            'password'  =>   Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }
}
