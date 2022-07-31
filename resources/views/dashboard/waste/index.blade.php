@extends('dashboard.layouts.main')
@section('container')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title }}</h1>
            <div class="d-flex flex-row-reverse my-5">
                    <a href="/dashboard/waste/create" class="btn btn-primary px-3 py-2"><i class="fas fa-plus"></i> <div class="d-none d-md-block">Tambah Data</div></a>
            </div>
            

            <div class="col-lg-10">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endIf
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Date Upload</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach($wastes as $waste)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $waste->item->item_name }}</td>
                            <td>{{ $waste->qty . 'Kg'}}</td>
                            <td>{{ 'Rp' . $waste->harga . ' / Kg'}}</td>
                           
                            <td>{{ $waste->created_at->format("d-M-y") }}</td>
                            <td><a href="/dashboard/waste/{{ $waste->id }}/edit" class="badge bg-warning text-white"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/waste/{{ $waste->id }}" method="POST" class="d-inline">
                                @csrf
                                @method("delete")
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </tr>
                    @endForeach
    
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-5 my-5  d-flex justify-content-center">
            {{ $wastes->links() }}
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