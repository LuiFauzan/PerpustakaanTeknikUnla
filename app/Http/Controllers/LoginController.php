<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    // public function index(){
    //     return view('login/index',['title'=>'Login Page']);
    // }
    public function authenticate(Request $request){
        $users = $request->validate([
            'npm' => 'required|numeric',
            'password' => 'required'
        ]);
        if(Auth::attempt($users)){
            $request->session()->regenerate();
            if(Auth::user()->is_admin){
                return redirect()->intended('/dashboard')->with('success','Login Success Sebagai Admin');
            }elseif(Auth::user()->is_super_admin){
                return redirect()->intended('/dashboard/su/')->with('success','Login Success Sebagai Manager');
            }
            return redirect()->intended('/')->with('success','Login Success Sebagai Mahasiswa');
        };
        return back()->with('error','Login Failed');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended('/')->with('success','You been logout succesfully');
    }
}
