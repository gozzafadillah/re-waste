<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function waste()
    {
        return $this->belongsTo(Waste::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
