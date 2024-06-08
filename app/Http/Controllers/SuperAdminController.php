<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //
    public function index(){
        return view('dashboard-admin',['title'=>'Super Admin Page']);
    }
}
