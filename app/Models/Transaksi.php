<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'kode_transaksi';
    protected $keyType = 'string';

    public function penawaran()
    {
        return $this->belongsTo(Penawaran::class);
    }
}
