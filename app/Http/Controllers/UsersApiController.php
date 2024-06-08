<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use App\Models\User;

use Illuminate\Http\Request;

class UsersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Buat instance Guzzle client
        $client = new Client();
        // Kirim permintaan GET ke API Google Books tanpa parameter pencarian
        $response = $client->request('GET', 'http://localhost:3000/users');
        // Ambil isi respons
        $data = json_decode($response->getBody(), true);
        foreach($data as $item){
            $users = new User();
            $users->npm = $item['npm'];
            $users->name = $item['name'];
            $users->password = $item['password'];
            $users->prodi = $item['prodi'];
            $users->photo = $item['photo'];
            $users->is_admin = $item['is_admin'];
            $users->is_super_admin = $item['is_super_admin'];
            $users->save();
        }
        return response()->json(['message'=>'Data Berhasil Dimasukkan']);
        // return response()->json($data);
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
