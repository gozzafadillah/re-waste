@extends('layouts.main')
@section('container')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Noto+Sans+Mono:wght@900&display=swap');

        p,article {
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
        }

        h1,h2,h3,h4,h5 {
            font-family: 'Noto Sans Mono', monospace !important;
            font-weight: 900;
        }

        body{
            overflow-x: hidden;
        }

        .corousel-item .img{
            background-color: rgba(0, 0, 0, 0.55)
        }
        #jumbotron {
            background-image: url("https://source.unsplash.com/1200x700/?trash");
            background-color: #cccccc;
            height: 700px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            position: relative;
        }

        .hero-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .border {
            background-color: #c3baba81;
        }
        .border p,h3 {
            font-family: 'Oxygen', sans-serif;
            font-weight: bold;
            text-align: justify;
        }

        .card p {
            text-align: justify
        }
    </style>
    <section id="jumbotron">
        @if (session()->has('error'))
                <div class="hero-text" style="z-index: 999">
                    
                        <div class="alert alert-danger alert-dismissible fade show p-5 m-3" role="alert">
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    
                </div>
                @endif
        <div class="border px-3 py-4 text-light shadow hero-text">
            <h3 class="mb-3 fs-4" style="overflow: hidden;">Re-Waste</h3>
            <p><sup><i class="text-danger fas fa-quote-right"></sup></i> change the item in
                end of their life into resource benefits <sup><i class="text-danger fas fa-quote-left"></i></sup></p>
        </div>
    </section>
    <section id="body" class="p-4">
        <h3 class="text-center my-3">Wastes Area</h3>
        <div class="container">
            <div class="row">
                @foreach ($wastes as $waste)
                <div class="col-lg-3 my-4">
                    <div class="card shadow">
                        <img src="{{ asset('storage/' . $waste->image ) }}" width="300" height="300" class="card-img-top" alt="...">
                        <div class="card-body" >
                            <p class="card-title" style="font-weight: bold;">{{ $waste->title }}</p>                          
                            <small class="text-muted">{{ $waste->user->nama_mitra }}</small>
                        </div>
                        <div class="card-footer d-flex justify-content-between h-25">
                            <strong class="mb-3">Price : <small><strong class="text-danger">Rp{{ $waste->harga }} / kg</strong></small></strong>
                            <a href="detail/{{ $waste->id }}" class="btn btn-outline-dark">Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>    
        </div>

        <div class="container mt-3 ">
            <h3 class="text-center mt-5">Categori</h3>
            <div class="border p-3 my-3">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card p-3">
                            <div class="justify-content-center">
                                <h5 class="text-center">Botol / Cup</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card p-3">
                            <div class="justify-content-center">
                                <h5 class="text-center">Kardus</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card p-3">
                            <div class="justify-content-center">
                                <h5 class="text-center">Kaleng</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card p-3">
                            <div class="justify-content-center">
                                <h5 class="text-center">Karton Susu</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="containe mt-5">
            <h3 class="text-center">
                Program Pengambilan Sampah dan Dibayar
            </h3>
            <div class="row mt-3 p-5">
                <div class="col-lg-6 col-md-12">
                    <p style="text-align: justify; font-size:large">Pernahkah Anda merasa selalu menumpukan sampah lebih banyak dan pemebersih sampah pada wilayah anda menghilang? </p>
                    <p style="text-align: justify; font-size:large">Program kami mengurangi kecemasan dan ketidakpastian terhadap limbah yang bertumpuk / sudah penuh. Jadi, jika Anda siap untuk memiliki waktu dan ruang ekstra dalam hidup Anda, daftarlah untuk program kami hari ini dan sampah anda jadi cuan!</p>
                    <a href="#" class="d-block btn btn-outline-primary btn-lg">Daftar</a>
                </div>
                <div class="col-lg-6 d-none d-md-block">
                    <img  src="https://source.unsplash.com/500x500/?trash" alt="sampah">
                </div>
            </div>
        </div>

    </section>
@endsection