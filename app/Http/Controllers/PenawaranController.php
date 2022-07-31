<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penawaran;
use App\Models\Transaksi;
use App\Models\Waste;
use Illuminate\Support\Facades\Redirect;

class PenawaranController extends Controller
{
    public function penawaran(Waste $id)
    {
        return view('penawaran.create', [
            'penawaran' => $id
        ]);
    }

    public function store(Request $request)
    {
        // ddd($request->kode_penawaran);
        $validatedData = $request->validate([
            'waste_id' => 'required',
            'nama' => 'required',
            'kode_penawaran' => 'required',
            'noTelp' => 'required|max:14',
            'image' => 'required|mimes:jpg,png,jpeg|image|file|max:4024',
            'alamat' => 'required|max:255',
            'qty' => 'required|numeric',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-penawaran-images');
        }

        Penawaran::create($validatedData);


        return Redirect::route('transaksi', array('id' => $request->kode_penawaran));
        // return redirect()->to('transaksi/' . $request->id);
    }

    public function transaksi(Penawaran $id)
    {
        // ddd($id);
        $getHarga = $id->waste->harga;
        $data = [
            'kode_transaksi' => 'TR' . '-' . time(),
            'penawaran_id' => $id->id,
            'total' => $id->qty * $getHarga
        ];
        Transaksi::where('penawaran_id', $id->id)->create($data);

        return Redirect::route('transaksi_bukti', array('id' => $id->kode_penawaran))->with('success', 'Penawaran Anda telah diproses!');
    }

    public function indexTransaksi(Penawaran $id)
    {
        $getData = $id->id;
        $data = Transaksi::where('penawaran_id', $getData)->first();

        return view('transaksi.index', [
            'data' => $data
        ]);
    }

    public function dataPenawaran()
    {

        $getUser = auth()->user()->id;
        $dataWaste = Waste::where('user_id', $getUser)->first();
        if ($getUser == $dataWaste->user_id) {
            $dataPenawaran = Penawaran::get();
        }


        return view('dashboard.penawaran.data_penawaran', [
            'data' => $dataPenawaran,
            'title' => "Data Penawaran"
        ]);
    }
    public function showPenawaran(Penawaran $data)
    {
        return view(
            'dashboard.penawaran.show',
            [
                'title' => 'Penawaran Data',
                'data' => $data,
                'penawaran' => $data->penawaran
            ]
        );
    }
}
