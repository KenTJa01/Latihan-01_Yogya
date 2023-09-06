@extends('layouts.main')

@section('containter')
    <link rel="stylesheet" href="CSS/profile.css">

    <div class="content">

        <div class="container-profile">

            {{-- BUTTON LOGOUT --}}
            <form action="/logout" method="post">
                @csrf

                <button type="submit" class="logout">
                    Logout
                    <div class="arrow-wrapper-end">
                        <div class="arrow-end"></div>
                    </div>
                </button>

            </form>

            <form action="/profile" method="post" enctype="multipart/form-data">
                @csrf

                {{-- INPUT IMAGE PROFILE --}}
                <div class="input-img">

                    <div class="plus">
                        <strong>+</strong>
                    </div>
                    <div class="d-flex justify-content-center" id="button-image">
                        <div class="btn btn-primary btn-rounded">
                            <label class="form-label text-white m-1" for="image">Upload Image</label>
                            <input type="file" class="form-control d-none" name="image" id="image" />
                        </div>
                    </div>

                    @if (auth()->user()->image  != null)

                        <img src="storage/{{ auth()->user()->image }}">

                     @endif

                    <p class="info" align="center">
                        After uploading the image, you need to click the "Edit" button to show your image on this page
                    </p>
                </div>

                <div class="form-profile">

                    <p>Profile</p>

                    {{-- GARIS DI BAWAH JUDUL --}}
                    <div class="line-1"></div>

                    <div class="content-form-profile">
                        <input type="text" name="user_id" value="{{ auth()->user()->user_id }}" hidden>
                        <input type="text" name="password" value="{{ auth()->user()->password }}" hidden>
                        <input type="text" name="flag_active" value="{{ auth()->user()->flag_active }}" hidden>
                        <table class="table-profile">
                            <tr>
                                <td for="name">Name</td>
                                <td><input type="text" name="name" id="name" class="input-profile" value="{{ auth()->user()->name }}" placeholder="Enter name"></td>
                            </tr>
                            <tr>
                                <td for="birth_date">Birth Date</td>
                                <td><input type="date" name="birth_date" id="birth_date" class="input-profile" value="{{ auth()->user()->birth_date }}" placeholder="Enter date"></td>
                            </tr>
                            <tr>
                                <td for="address">Address</td>
                                <td><input type="text" name="address" id="address" class="input-profile" value="{{ auth()->user()->address }}" placeholder="Enter address"></td>
                            </tr>
                            <tr>
                                <td for="email">Email</td>
                                <td><input type="email" name="email" id="email" class="input-profile" value="{{ auth()->user()->email }}" placeholder="Enter email"></td>
                            </tr>
                            <tr>
                                <td for="religion">Religion</td>
                                <td><input type="text" name="religion" id="religion" class="input-profile" value="{{ auth()->user()->religion }}" placeholder="Enter religion"></td>
                            </tr>
                        </table>
                    </div>

                </div>

                <button type="submit" class="edit">
                    Edit
                </button>

            </form>

        </div>
    </div>

@endsection
