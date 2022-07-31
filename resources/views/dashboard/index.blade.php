@extends('dashboard.layouts.main')
@section('container')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            @if (session()->has("successLogin"))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{{ session("successLogin") }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                @foreach ($data as $data)
                <div class="col-lg-3 my-4">
                    <div class="card shadow">
                        <img src="{{ asset('storage/' . $data->image ) }}" width="300" height="300" class="card-img-top" alt="...">
                        <div class="card-body" >
                            <p class="card-title" style="font-weight: bold;">{{ $data->title }}</p>                          
                            <small class="text-muted">{!! strip_tags(Str::limit($data->description, 100)) !!}</small>
                        </div>
                        <div class="card-footer d-flex justify-content-between h-25">
                            <strong class="mb-3">Price : <small><strong class="text-danger">Rp{{ $data->harga }} / kg</strong></small></strong>
                            <small>{{ $data->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
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
@endsection