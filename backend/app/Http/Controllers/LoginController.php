<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Session\Store;
use App\User;
class LoginController extends Controller
{   
    // menampilkan dashboard login
    public function show(Store $store)
    {   
        return view('login');
    }
    // authentikasi login
    public function authenticate(Request $requestFields)
    {   
        $attributes = $requestFields->only(['username', 'password']);
        if (Auth::attempt($attributes)) {
            $id= Auth::id();
            $role = User::find($id);
            if ($role->role==1) {
                Session::flush();
                Auth::logout();
                return back()->with('alert','Akun yang anda masukan tidak memiliki hak untuk mengakses platform ini');
            }
            if ($role->role==2) {
                return redirect('/produk');
            }
        }else{
            return redirect()->back()->with('alert','Password / Username yang anda masukan salah');
        }
    }
    public function logout()
    {   
        Session::flush();
        Auth::logout();
        return back();
    }
}