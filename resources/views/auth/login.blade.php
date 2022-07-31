@extends('auth.layouts.main')
@section('container')
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">

                                    @if (session()->has("loginError"))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <p>{{ session("loginError") }}</p>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session()->has("successLogout"))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <p>{{ session("successLogout") }}</p>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif


                                    
                                    <form action="/login" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('email') is-invalid @endError" id="email" name="email" type="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                            <label for="email">Email address</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('password') is-invalid @endError" id="password" name="password" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <button type="submit" class="btn btn-primary px-3 py-2 rounded-top">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="/register">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
@endsection