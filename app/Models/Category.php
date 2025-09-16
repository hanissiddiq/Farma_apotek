<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;

    //jika pake $guarded semua kolom database di input kecuali id tapi
    // jika pake $fillable hanya kolom yang ada di $fillable yang bisa di input
    protected $guarded = [
        'id',
    ];
}
