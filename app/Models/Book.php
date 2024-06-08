<?php

namespace App\Models;

use App\Models\Borrowing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isbn',
        'penulis',
        'penerbit',
        'gambar'
    ];
    public function borrowing(){
        return $this->hasMany(Borrowing::class);
    }
    public function pengembalian(){
        return $this->hasMany(Pengembalian::class);
    }
    
}
