@extends('layouts.main')
@section('container')

<section class="my-4 p-3">
    <div class="container my-3">
        <a href="/" class="btn btn-outline-primary">Back</a>
        <h1 class="text-center">Bukti Transaksi {{ $data->penawaran->waste->title }}</h1>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center">
                    <img src="{{ asset('storage/' . $data->penawaran->image ) }}" alt="..." width="450">
                </div>
                <h5>Data Mitra</h5>
                <dl class="row">
                    <dt class="col-sm-3">Nama Mitra</dt>
                    <dd class="col-sm-9">{{ $data->penawaran->waste->user->nama_mitra }}</dd>
                    <dt class="col-sm-3">Email</dt>
                    <dd class="col-sm-9">{{ $data->penawaran->waste->user->email }}</dd>
                    <dt class="col-sm-3">Nomor Telephone</dt>
                    <dd class="col-sm-9">{{ $data->penawaran->waste->user->noTelp }}</dd>
                    <dt class="col-sm-3">Alamat</dt>
                    <dd class="col-sm-9">{{ $data->penawaran->waste->user->alamat }}</dd>
                    <dt class="col-sm-3">Quantitas diperlukan</dt>
                    <dd class="col-sm-9">{{ $data->penawaran->waste->qty . ' Kg' }}</dd>
                    <dt class="col-sm-3">Harga</dt>
                    <dd class="col-sm-9">{{ 'Rp'. $data->penawaran->waste->harga . ' /Kg' }}</dd>
                </dl>
                <h5>Data yang Menawarkan</h5>
                <dl class="row">
                    <dt class="col-sm-3">Nama anda</dt>
                    <dd class="col-sm-9">{{ $data->penawaran->nama }}</dd>
                    <dt class="col-sm-3">Quantitas ditawarkan</dt>
                    <dd class="col-sm-9">{{ $data->penawaran->qty . ' kg' }}</dd>
                    <dt class="col-sm-3">Total harga</dt>
                    <dd class="col-sm-9">{{ 'Rp'. $data->total }}</dd>
                </dl>
                <div class="card p-5">
                    <h2>Bukti Kode Transaksi : {{ $data->kode_transaksi }}</h2>
                </div>
            </div>
        </div>
    </div>

</section>

@endSection