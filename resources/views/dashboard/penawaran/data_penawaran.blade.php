
@extends('dashboard.layouts.main')
@section('container')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Penawaran</h1>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Penawaran</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Qty</th>
                            <th scope="col">action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->kode_penawaran }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{!!$data->alamat !!}</td>
                                <td>{{ $data->qty }}</td>
                                <td>
                                    <a href="/dashboard/penawaran/detail/{{ $data->kode_penawaran }}" class="badge bg-primary text-white"><i class="fa fa-eye"></i></a>
                                    <form action="/dashboard/penawaran/{{ $data->kode_penawaran }}" method="POST" class="d-inline">
                                        @csrf
                                        @method("delete")
                                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
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