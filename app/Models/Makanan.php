<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    public $table = "makanan";

    protected $primarykey = 'id';

    protected $fillable = [
    'nama_makanan',
    'harga',
    'gambar'
];
// protected $guarded = ['id'];


}
