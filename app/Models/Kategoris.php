<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoris extends Model
{
    use HasFactory;

    protected $table = "kategoris"; // menghubungkan ke dalam tabel kategoris

    public function product()
    {
        $this->hasMany(Product::class);
    }
}
