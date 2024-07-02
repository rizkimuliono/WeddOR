<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WeddOR</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
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

        .login-container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="bg">
        <div class="container login-container">

            <div class="card p-4 shadow-lg">
                <div class="card-body">

                    <div class="row align-items-center bg-light py-3 px-xl-2 d-none d-lg-flex">
                        <div class="col-lg-12">
                            <a href="{{ route('home') }}" class="text-decoration-none">
                                <span class="h1 text-primary bg-dark px-2"><img src="{{ asset('template/img/ring.png') }}">Wedd</span>
                                <span class="h1 text-dark bg-primary px-2 ml-n1">OR</span>
                            </a>
                            <strong class="ml-2">Medan Wedding Markets</strong>
                            {{-- <img src="{{ asset('template/img/carousel-3.png') }}" class="w-100 h-100" alt="WeddOR Medan Wedding Markets"> --}}
                        </div>
                    </div>
                    <h3 class="card-title text-center">Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
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

                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>

                    <p class="mt-3 justify-content-center">
                        <a href="" class="text-danger">Lupa Kata Sandi?</a>
                    </p>
                    <p class="justify-content-center">Belum punya akun? <a href="" class="text-danger">Daftar</a></p>

                    <div class="alert alert-info" role="alert">
                        <p>Punya bisnis terkait pernikahan?</p>
                        <p class="mb-0">
                            <a href="" class="text-danger">Gabung menjadi vendor gratis</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>
</body>

</html>
