@extends('layouts.main')
@section('container')
    <div class="container my-5">
        <a href="/" class="btn btn-outline-primary">Back</a>
        <h1 class="text-center mb-4">
            Detail {{ $detail->title}}
        </h1>
        <div class="text-center">
            <img src="{{ asset('storage/' . $detail->image ) }}" class="mb-3" height="300" alt="...">
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <dl class="row">
                    <dt class="col-sm-3">Nama Mitra</dt>
                    <dd class="col-sm-9"><p class="fs-6">{{ $detail->user->nama_mitra }}</p></dd>
                    <dt class="col-sm-3">Deskripsi</dt>
                    <dd class="col-sm-9"><p class="fs-6">{!! strip_tags($detail->description) !!}</p></dd>
                  
                    <dt class="col-sm-3">Kebutuhan</dt>
                    <dd class="col-sm-9">
                      <p class="fs-6">{{ $detail->qty . ' kg' }}</p>
                      <p class="fs-6">{{ $detail->item->item_name }}</p>
                    </dd>
                    <dt class="col-sm-3">
                        Harga / kg
                    </dt>
                    <dd class="col-sm-9">{{ 'Rp' . $detail->harga . ' / kg' }}</dd>
                    <dt class="col-sm-3">
                        Total Harga keseluruhan
                    </dt>
                    <dd class="col-sm-9">{{ 'Rp' . $detail->harga * $detail->qty  }}</dd>
                </dl>
            </div>
            <div class="text-center mb-5">
                <a href="/penawaran/{{ $detail->id }}" class="btn btn-outline-primary btn-lg">Lakukan Penawaran</a>
            </div>
        </div>
    </div>
    
@endsection