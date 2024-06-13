<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Pengembalian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SuperAdminController extends Controller
{
    //
    public function index(){
        $book = Book::count();
        $user = User::count();
        $borrow = Borrowing::count();
        $kembali = Pengembalian::count();
        return view('dashboard-admin',[
            'title'=>'Super Admin Page',
            'book'=>$book,
            'borrow'=>$borrow,
            'user'=>$user,
            'kembali'=>$kembali,
        ]);
    }
}
