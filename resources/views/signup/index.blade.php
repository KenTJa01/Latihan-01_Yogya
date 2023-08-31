<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/signup.css">
</head>
<body>

    <div class="form-signup">

        {{-- GAMBAR --}}
        <img class="img-01" alt="Img" src="IMG/img-01.jpg" />

        {{-- FORM SIGN UP --}}
        <form class="form" action="/signup" method="post">
            @csrf
            {{-- BUTTON BACK & JUDUL --}}
            <div class="button-back">
                <a href="/signin">
                    <svg
                        width="28"
                        height="27"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M20.3284 11.0001V13.0001L7.50011 13.0001L10.7426 16.2426L9.32842 17.6568L3.67157 12L9.32842 6.34314L10.7426 7.75735L7.49988 11.0001L20.3284 11.0001Z"
                            fill="currentColor"
                        />
                    </svg>
                </a>
                <font>Sign Up</font>

            </div>

            {{-- GARIS DI BAWAH JUDUL --}}
            <div class="line-1"></div>

            {{-- INPUT ID --}}
            <div class="input-container">
                <input type="text" name="user_id" class="form-control" placeholder="Enter ID" required value="{{ old("user_id") }}">
                @error("user_id")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- INPUT NAME --}}
            <div class="input-container">
                <input type="text" name="name" class="form-control" placeholder="Enter name" required value="{{ old("name") }}">
                @error("name")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- INPUT PASSWORD --}}
            <div class="input-container">
                <input type="password" name="password" class="form-control" placeholder="Enter password" required value="{{ old("password") }}">
                @error("password")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- BUTTON SIGN UP --}}
            <button type="submit" class="submit" href="">
                Sign Up
                <div class="arrow-wrapper">
                    <div class="arrow"></div>
                </div>
            </button>

        </form>

    </div>
</body>
</html>
