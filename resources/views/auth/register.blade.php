@extends('auth.layouts.main')
@section('container')
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                <div class="card-body">
                                    <form action="/register" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('name') is-invalid @endError" id="name" name="name" type="text" placeholder="Name" value="
                                            {{ old('name') }}" required />
                                            <label for="name">Name</label>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('noTelp') is-invalid @endError" id="noTelp" name="noTelp" type="text" placeholder="noTelp" required value="{{ old("noTelp") }}" />
                                            <label for="noTelp">Telephone / Whatsapps</label>
                                            @error('noTelp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('nama_mitra') is-invalid @endError" id="nama_mitra" name="nama_mitra" type="text" placeholder="Perusahaan Anda" required value="{{ old("nama_mitra") }}" />
                                            <label for="nama_mitra">Nama Perusahaan Anda</label>
                                            @error('nama_mitra')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('email') is-invalid @endError" id="email" name="email" type="email" placeholder="name@example.com" required />
                                            <label for="email">Email address</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('alamat') is-invalid @endError" id="alamat" name="alamat" type="alamat" placeholder="Adress" required />
                                            <label for="alamat">Alamat</label>
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control @error('password') is-invalid @endError" id="password" name="password" type="password" placeholder="Create a password" />
                                                    <label for="password">Password</label>
                                                    @error('password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control  @error('password') is-invalid @endError" id="confirm" name="confirm" type="password" placeholder="Confirm password" />
                                                    <label for="confirm">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary btn-block" type="submit">Create Account</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="/login">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection