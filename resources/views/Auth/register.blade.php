<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - WeddOR</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
        }

        .bg {
            background-image: url('your-background-image-url');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .register-container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="bg">
        <div class="container register-container">

            <div class="card p-4 shadow-lg">
                <div class="card-body">

                    <div class="row align-items-center bg-light py-3 px-xl-2 d-none d-lg-flex">
                        <div class="col-lg-12">
                            <a href="{{ route('home') }}" class="text-decoration-none">
                                <span class="h1 text-primary bg-dark px-2"><img src="{{ asset('template/img/ring.png') }}">Wedd</span>
                                <span class="h1 text-dark bg-primary px-2 ml-n1">OR</span>
                            </a>
                            <strong class="ml-2">Medan Wedding Markets</strong>
                        </div>
                    </div>
                    <h3 class="card-title text-center">Register</h3>
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf
                        <input type="hidden" name="level" value="{{ request('level') }}">
                        <input type="hidden" name="is_vendor" value="{{ request('level') == 'vendor' ? 1 : 0 }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        @if(request('level') == 'vendor')
                        <div class="form-group">
                            <label for="vendor_name">Vendor Name</label>
                            <input type="text" class="form-control @error('vendor_name') is-invalid @enderror" id="vendor_name" name="vendor_name" value="{{ old('vendor_name') }}" required>
                            @error('vendor_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="vendor_email">Vendor Email</label>
                            <input type="email" class="form-control @error('vendor_email') is-invalid @enderror" id="vendor_email" name="vendor_email" value="{{ old('vendor_email') }}" required>
                            @error('vendor_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>

                    <p class="mt-3 justify-content-center">
                        <a href="{{ route('password.request') }}" class="text-danger">Lupa Kata Sandi?</a>
                    </p>
                    <p class="justify-content-center">Sudah punya akun? <a href="{{ route('login') }}" class="text-danger">Login</a></p>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>
    <script>
        @if(session('success'))
            Swal.fire(
                'Registration Successful!',
                '{{ session('success') }}',
                'success'
            );
        @endif

        @if(session('error'))
            Swal.fire(
                'Registration Failed!',
                '{{ session('error') }}',
                'error'
            );
        @endif
    </script>
</body>

</html>
