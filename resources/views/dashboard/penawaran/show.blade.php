
@extends('dashboard.layouts.main')
@section('container')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="mt-4">
            <a href="/dashboard/penawaran" class="btn btn-primary">Back</a>
            </div>
            <h2 class="mt-4">Penawaran {{ $data->kode_penawaran }}</h2>
            <div class="row justify-content-center">
                <div class="my-5">  
                    <div class="col-lg-10">
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $data->image) }}" alt="..." width="450">
                                <dl class="row my-3">
                                    <dt class="col-sm-3">Nama</dt>
                                    <dd class="col-sm-9">{{ $data->nama }}</dd>
                                    <dt class="col-sm-3">Kuantitas</dt>
                                    <dd class="col-sm-9">{{ $data->qty }}</dd>
                                    <dt class="col-sm-3">Total</dt>
                                    <dd class="col-sm-9">{{ 'Rp' . $data->waste->harga * $data->qty }}</dd>
                                    <dt class="col-sm-3">Alamat</dt>
                                    <dd class="col-sm-9">{!! $data->alamat !!}</dd>
                                    <dt class="col-sm-3">No Telpone</dt>
                                    <dd class="col-sm-9">{{ $data->noTelp }}</dd>
                                </dl>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-dark mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-white">Copyright &copy; Your Website 2021</div>
                <div>
                    <a class="text-decoration-none text-white" href="#">Privacy Policy</a>
                    &middot;
                    <a class="text-decoration-none text-white" href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>

@endSection