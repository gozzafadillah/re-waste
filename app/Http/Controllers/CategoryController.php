<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waste;

class CategoryController extends Controller
{
    public function botol_cup()
    {
        return view('dashboard.category.index', [
            'title' => 'Botol / Cup',
            'wastes' => Waste::all()
        ]);
    }
    public function kardus()
    {
        return view('dashboard.category.index', [
            'title' => 'Kardus',
            'wastes' => Waste::all()
        ]);
    }
    public function karton_susu()
    {
        return view('dashboard.category.index', [
            'title' => 'Karton Susu',
            'wastes' => Waste::all()
        ]);
    }
}
