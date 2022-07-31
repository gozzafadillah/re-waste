@extends('layouts.main')
@section('container')

<div class="container my-5">
  <a href="/" class="btn btn-outline-primary">Back</a>
  <h1 class="text-center">Lakukan Penawaran</h1>
    <div class="row justify-content-center">
        <div class="col-lg-8">
          <form method="POST" action="/penawaran/tambah" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="waste_id" value="{{ $penawaran->id }}">
            <input type="hidden" name="kode_penawaran" value="{{ "PR" . '-' . time() }}">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="nama" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Anda!">
              @error('image') 
                  <small class="invalid-feedback">{{ $message }}</small>
              @endError
            </div>
            <div class="mb-3">
              <label for="noTelp" class="form-label">Telephone / Whatsapps</label>
              <input type="text" class="form-control" id="noTelp" name="noTelp" placeholder="Masukan Nomor Telp Anda!">
              @error('noTelp') 
                  <small class="invalid-feedback">{{ $message }}</small>
              @endError
            </div>
            <div class="mb-3">
              <strong><label for="alamat" class="form-label">Alamat</strong></label>
              <input id="alamat" name="alamat" type="hidden" name="content">
              <trix-editor input="alamat"></trix-editor>
              @error('alamat') 
                  <small class="invalid-feedback">{{ $message }}</small>
              @endError
          </div>
            <div class="mb-3">
              <label for="qty" class="form-label">Kuantitas</label>
              <input type="number" class="form-control" id="qty" name="qty" placeholder="Masukan Kuantitas Anda!">
              @error('image') 
                  <small class="invalid-feedback">{{ $message }}</small>
              @endError
            </div>
            <div class="mb-3">
              <strong><label for="image" class="form-label">Foto Barang Sebagai Bukti</label></strong>
              <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
              <input class="form-control @error('image') is-invalid @endError" type="file" id="image" name="image" onchange="previewImage()">
              @error('image') 
                  <small class="invalid-feedback">{{ $message }}</small>
              @endError
          </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-outline-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
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