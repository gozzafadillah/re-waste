<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Waste extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['item', 'user'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penawawaran()
    {
        return $this->hasMany(Penawaran::class);
    }
}
