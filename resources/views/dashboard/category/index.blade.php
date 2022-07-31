@extends('dashboard.layouts.main')
@section('container')
<div id="layoutSidenav_content">
    <main>
        <?php
            $req = "";
            $i = 0;
            if(Request::is('dashboard/category/botol-cup')){
                $req = "Botol / Cup";
                $i++;
            } else if(Request::is('dashboard/category/karton-susu')){
                $req = "Karton Susu";
                $i++;
            } else if(Request::is('dashboard/category/kardus')){
                $req = "Kardus";
                $i++;
            }

            ?>
        <div class="container-fluid px-4">
            <h3 class="mt-4">{{ $title }}</h3>
            <div class="dropdown-divider"></div>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Upload</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wastes as $waste)
                    @if ($waste->item->category === $req)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $waste->item->item_name }}</td>
                        <td>{{ $waste->user->alamat}}</td>
                        <td>{{ $waste->created_at->diffForHumans()}}</td>
                        <td><a href="/dashboard/waste/{{ $waste->id }}/edit" class="badge bg-warning text-white"><i class="far fa-edit"></i></a>
                        <form action="/dashboard/waste/{{ $waste->id }}" method="POST" class="d-inline">
                            @csrf
                            @method("delete")
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </tr>
                    @endif
                    @endForeach    
                        
                    
                </tbody>
            </table>
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