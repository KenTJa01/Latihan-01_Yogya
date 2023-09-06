<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="CSS/signin.css">
</head>
<body>

    {{-- SESSION --}}
    @if (session()->has('success'))
        <div class="alert alert-success" id="success-signup" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- SESSION --}}
    @if (session()->has('loginError'))
        <div class="alert alert-danger col-lg-10" role="alert">
            {{ session('loginError') }}
        </div>
    @endif

    <div class="form-signin">

        {{-- GAMBAR --}}
        <img class="img-01" alt="Img" src="IMG/img-01.jpg" />

        {{-- FORM SIGN IN --}}
        <form class="form" action="/signin" method="post">
            @csrf

            {{-- JUDUL --}}
            <p class="form-title-01">Welcome to<p>
            <p class="form-title-02">Yogya Learning Academy</p>

            {{-- GARIS DI BAWAH JUDUL --}}
            <div class="line-1"></div>

            {{-- INPUT NAME --}}
            <div class="input-container">
                <input type="text" name="name" class="form-control @error("name") is-invalid @enderror" placeholder="Enter name" autofocus required value="{{ old("name") }}">
                @error("name")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- INPUT PASSWORD --}}
            <div class="input-container">
                <input type="password"  name="password" class="form-control @error("password") is-invalid @enderror" placeholder="Enter password" required value="{{ old("password") }}">
                @error("passsword")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- BUTTON SIGN IN --}}
            <button type="submit" class="submit">
                Sign in
                <div class="arrow-wrapper">
                    <div class="arrow"></div>
                </div>
            </button>

            {{-- LINK TO SIGN UP --}}
            <p class="signup-link">
                No account?
                <a href="/signup">Sign up</a>
            </p>

        </form>

    </div>

</body>
</html>
