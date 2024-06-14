<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function gambarproduk()
    {
        return $this->hasMany(GambarProduk::class);
    }
    public function kategoriproduk()
    {
        return $this->belongsTo(KategoriProduk::class);
    }
}
