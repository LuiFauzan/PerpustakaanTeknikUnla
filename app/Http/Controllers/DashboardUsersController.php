<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardUsersController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('data-pengguna',['title'=>'Halaman Admin - Data Pengguna'],compact('users'));
    }
}
