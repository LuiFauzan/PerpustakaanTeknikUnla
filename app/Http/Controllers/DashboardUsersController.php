<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DashboardUsersController extends Controller
{
    // public function index()
    // {
    //     // Ambil data pengguna terbaru dengan menggunakan paginate() untuk pembagian halaman
    //     $users = User::latest();
    
    //     // Kirimkan data pengguna ke view 'data-pengguna' bersama dengan judul halaman
    //     return view('data-pengguna', [
    //         'title' => 'Halaman Admin - Data Pengguna',
    //         'users' => $users->paginate(10),
    //     ]);
    // }
    public function create(){
        return view('users.create',['title'=>'Tambah User']);
    }
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'npm' => 'required|unique:users,npm',
            'name' => 'required',
            // 'password' => 'required',
            'prodi' => 'required',
            // 'photo' => 'required|image|max:2048', // Maksimum 2MB, harus berupa gambar
        ]);

        // Redirect kembali jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        // Simpan foto ke dalam storage (misalnya storage/app/public)
        // $photoPath = $request->file('photo')->store('public');

        // Buat user baru berdasarkan input
        $user = new User();
        $user->npm = $request->npm;
        $user->name = $request->name;
        $user->password = bcrypt('password'); // Disarankan menggunakan enkripsi untuk password
        $user->prodi = $request->prodi;
        // $user->photo = $photoPath; // Simpan path foto ke dalam database
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }
}
