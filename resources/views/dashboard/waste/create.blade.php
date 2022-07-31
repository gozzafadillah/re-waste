@extends('dashboard.layouts.main')
@section('container')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Form Page Re Waste</h3>
            <div class="dropdown-divider"></div>
            <div class="col-lg-6">
                <form class="mt-3" action="/dashboard/waste" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <strong><label for="item_id" class="form-label">Sampah yang Diperlukan</label></strong>
                        @foreach($items as $item)
                        <div class="form-check">
                            @if(old('item_id') == $item->id)
                            <input class="form-check-input @error('item_id') is-invalid @endError" type="radio" name="item_id" value="{{ $item->id }}" checked>
                            @else
                            <input class="form-check-input @error('item_id') is-invalid @endError" type="radio" name="item_id" value="{{ $item->id }}">
                            @endIf

                            <label class="form-check-label" for="item_id">
                                {{ $item->item_name }}
                            </label>
                        </div>
                        @endForeach
                        @error('item_id') 
                            <small class="text-danger">{{ $message }}</small>
                        @endError
                    </div>

                    <div class="mb-3">
                        <strong><label for="qty" class="form-label">Quantitas Diperlukan</label></strong>
                        <input class="form-control @error('qty') is-invalid @endError" type="number" id="qty" name="qty">
                        @error('qty') 
                            <small class="invalid-feedback">{{ $message }}</small>
                        @endError
                    </div>
                    <div class="mb-3">
                        <strong><label for="harga" class="form-label">Harga / kg</label></strong>
                        <input class="form-control @error('harga') is-invalid @endError" type="number" id="harga" name="harga">
                        @error('harga') 
                            <small class="invalid-feedback">{{ $message }}</small>
                        @endError
                    </div>
                    <div class="mb-3">
                        <strong><label for="image" class="form-label">Foto Sebagai Bukti</label></strong>
                        <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        <input class="form-control @error('image') is-invalid @endError" type="file" id="image" name="image" onchange="previewImage()">
                        @error('image') 
                            <small class="invalid-feedback">{{ $message }}</small>
                        @endError
                    </div>
                    <div class="mb-3">
                        <strong><label for="title" class="form-label">Title</label></strong>
                        <input type="text" class="form-control @error('title') is-invalid @endError" name="title" id="title" placeholder="Ajukan Judul Anda">
                        @error('title') 
                            <small class="invalid-feedback">{{ $message }}</small>
                        @endError
                    </div>
                    <div class="mb-3">
                        <strong><label for="description" class="form-label">Deskripsi</strong> <i><small class="text-muted">note: Tidak wajib diisi</small></i></label>
                        <input id="description" name="description" type="hidden" name="content">
                        <trix-editor input="description"></trix-editor>
                    </div>

                    <div class="mb-3 pb-3 mt-3">
                        <button type="submit" class="btn btn-primary px-4 py-2 border-0" onclick="return confirm('Data sudah sesuai ?')">Submit</button>
                    </div>
                </form>
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

<script>
    function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
            
        }
</script>
@endsection