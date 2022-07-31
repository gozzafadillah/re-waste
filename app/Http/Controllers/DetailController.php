<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waste;

class DetailController extends Controller
{
    public function show(Waste $id)
    {
        return view('detail.index', [
            'detail' => $id
        ]);
    }
}
