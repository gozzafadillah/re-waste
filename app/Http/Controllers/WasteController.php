<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Waste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WasteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waste = Waste::latest()->where('user_id', auth()->user()->id)->paginate(5)->withQueryString();
        return view('dashboard.waste.index', [
            'title' => 'Your Re-Waste',
            'wastes' => $waste
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_item = Item::all();
        return view('dashboard.waste.create', [
            'title' => 'Form Tambah Data',
            'items' => $data_item,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'item_id' => 'required',
            'qty' => 'required',
            'harga' => 'required|numeric',
            'image' => 'required|mimes:jpg,png,jpeg|image|file|max:4024',
            'title' => 'required|max:255',
            'description' => 'max:255',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        Waste::create($validatedData);


        return redirect('/dashboard/waste')->with('success', 'Your Post has been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Waste  $waste
     * @return \Illuminate\Http\Response
     */
    public function show(Waste $waste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Waste  $waste
     * @return \Illuminate\Http\Response
     */
    public function edit(Waste $waste)
    {
        $data = $waste;
        return view('dashboard.waste.edit', [
            'items' => Item::all(),
            'waste' => $data,
            'title' => 'Waste Edit Form'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Waste  $waste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Waste $waste)
    {
        $rules = [
            'item_id' => 'required',
            'qty' => 'required',
            'image' => 'mimes:jpg,jpeg,png|image|file|max:4024',
            'title' => 'required|max:255',
            'description' => 'max:255',
            'status' => ''
        ];
        $validatedData = request()->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        if ($waste->user->id !== auth()->user()->id) {
            abort(403);
        }

        $validatedData['user_id'] = auth()->user()->id;

        Waste::where('id', $waste->id)->update($validatedData);

        return redirect('/dashboard/waste')->with('success', 'Your Waste Item has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Waste  $waste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waste $waste)
    {
        if (!auth() || $waste->user->id !== auth()->user()->id) {
            abort(403);
        }

        if ($waste->image) {
            Storage::delete($waste->image);
        }

        Waste::destroy($waste->id);
        return redirect('/dashboard/waste')->with('success', 'Your waste item has been Deleted!');
    }
}
