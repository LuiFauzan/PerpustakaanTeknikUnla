<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Borrowing;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::count();
        $user = User::count();
        $borrow = Borrowing::count();
        $kembali = Pengembalian::count();
        return view('dashboard-admin',[
            'title'=>'Admin Page',
            'book'=>$book,
            'borrow'=>$borrow,
            'user'=>$user,
            'kembali'=>$kembali,
        ]);
    }
    public function formprofile($id){
        $user = User::findOrFail($id);
        return view('admin.profile',['title'=>'Your Profile','user'=>$user]);
    }
    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:5|confirmed',
        ]);
    
        $user = User::findOrFail($id);
    
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['error' => 'Current password is incorrect']);
        }
    
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('success', 'Password successfully changed');
    }
    public function changePhoto(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);
        
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);

            $user->photo = $filename;
            $user->save();
        }

        return redirect()->back()->with('success', 'Photo successfully changed');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
