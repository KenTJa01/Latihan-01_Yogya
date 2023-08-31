@extends('layouts.main')

@section('containter')
    <link rel="stylesheet" href="CSS/profile.css">

    <div class="content">
        {{-- <div class="image">
            <img class="pict-profile" alt="pict-profile" src="IMG/pict-profile.jpg" />
        </div> --}}

        {{-- <form class="custom__form">

            <div class="container-img">

                <figure class="image-container">
                    <img id="chosen-image">
                    <figcaption id="file-name">
                    </figcaption>
                </figure>

                <input type="file" id="upload-button" accept="image/*">
                <button type="submit" class="edit-img">
                    Choose a Photo
                </button>
            </div>

            <div class="pict-profile">

            </div>
            <div class="custom__image-container">
                <label id="add-img-label" for="add-single-img">insert image</label>
                <input type="file" id="add-single-img" accept="image/jpeg" />
            </div>
            <input
              type="file"
              id="image-input"
              name="photos"
              accept="image/jpeg"
              multiple
            />
            <br/>
            <button type="submit" class="edit-img">
                edit image
            </button>

        </form> --}}

        <div class="profile">
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

    <script>
        document.getElementById("add-single-img").


        // const imgInputHelper = document.getElementById("add-single-img");
        // const imgInputHelperLabel = document.getElementById("add-img-label");
        // const imgContainer = document.querySelector(".custom__image-container");
        // const imgFiles = [];

        // const addImgHandler = () => {
        //     const file = imgInputHelper.files[0];
        //     if (!file) return;
        //     // Generate img preview
        //     const reader = new FileReader();
        //     reader.readAsDataURL(file);
        //     reader.onload = () => {
        //         const newImg = document.createElement("img");
        //         newImg.src = reader.result;
        //         imgContainer.insertBefore(newImg, imgInputHelperLabel);
        //     };

        //     // Store img file
        //     imgFiles.push(file);
        //     // Reset image input
        //     imgInputHelper.value = "";
        //     return;
        // };
        // imgInputHelper.addEventListener("change", addImgHandler);
    </script>

@endsection
