<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Borrowing;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public function index(Request $request)
{
    // Ambil query pencarian dari input 'search'
    $search = $request->input('search');
    
    // Cek apakah ada permintaan untuk mengekspor ke PDF
    if ($request->get('export') == 'pdf') {
        // Ambil semua data pengguna dengan filter pencarian
        $users = User::latest()
                    ->where(function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                              ->orWhere('prodi', 'like', '%' . $search . '%')
                              ->orWhere('npm', 'like', '%' . $search . '%');
                    })
                    ->get();

        // Load view PDF dengan data pengguna
        $pdf = PDF::loadView('pdf.user', ['users' => $users]);
        
        // Stream PDF ke browser dengan nama file 'Data Pengguna.pdf'
        return $pdf->stream('Data Pengguna.pdf');
    } else {
        // Ambil semua data pengguna dengan filter pencarian dan paginate(10)
        $users = User::latest()
                    ->where(function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                              ->orWhere('prodi', 'like', '%' . $search . '%')
                              ->orWhere('npm', 'like', '%' . $search . '%');
                    })
                    ->paginate(10);
        
        // Tampilkan halaman dengan hasil pencarian dan paginate
        return view('data-pengguna', [
            'title' => 'Halaman Admin - Data Pengguna',
            'users' => $users,
            'search' => $search // kirimkan kembali input pencarian untuk digunakan di tampilan
        ]);
    }
}
    public function formprofile($id){
        $user = User::findOrFail($id);
        return view('users.profile',['title'=>'Your Profile','user'=>$user]);
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
    public function formlist($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Ambil buku yang sedang dipinjam oleh pengguna
        $bukuDipinjam = Borrowing::where('user_id', $id)->get();

        // Ambil buku yang sudah dikembalikan oleh pengguna
        $bukuDikembalikan = Pengembalian::where('user_id', $id)->get();

        // Mengembalikan view dengan data yang diperlukan
        return view('users.list-buku', [
            'title' => 'List Buku',
            'user' => $user,
            'bukuDipinjam' => $bukuDipinjam,
            'bukuDikembalikan' => $bukuDikembalikan
        ]);
    }
}
