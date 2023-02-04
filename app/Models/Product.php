<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products"; // menghubungkan ke dalam tabel products

    public function kategoris()
    {
        return $this->belongsTo(Kategoris::class, 'kategori_id');
    }

    public function stock()
    {
        $this->hasMany(Stock::class);
    }
}
