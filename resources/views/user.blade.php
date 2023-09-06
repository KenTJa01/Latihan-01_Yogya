@extends('layouts.main')

@section('containter')
    <link rel="stylesheet" href="CSS/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <div class="title">
        <div class="ellipse-2" ></div>
        <p>Master Data User</p>
    </div>

    {{-- ERROR --}}
    @if (session()->has('error'))
        <div class="notification">

            <div class="alert alert-danger" role="alert">
                <strong class="error">ID has been used! Try another ID!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        </div>
    @endif

    {{-- SESSION --}}
    @if (session()->has('success'))
        <div class="notification">

            <div class="alert alert-success" role="alert">
                <strong>New User has been added!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        </div>
    @endif

    @if (session()->has('success-edit'))
        <div class="notification">

            <div class="alert alert-success" role="alert">
                <strong class="strong-edit">The User has been updated!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        </div>
    @endif

    @if (session()->has('success-delete'))
        <div class="notification">

            <div class="alert alert-success" role="alert">
                <strong class="strong-edit">The User has been deleted!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        </div>
    @endif

    <div class="add-user">
        <div class="rectangle">
            {{-- FORM ADD NEW ENROLLMENT --}}
            <form class="form" action="/user" method="post">
                @csrf

                {{-- JUDUL --}}
                <p class="form-title-01">Add New User<p>

                {{-- GARIS DI BAWAH JUDUL --}}
                <div class="line-1"></div>

                {{-- INPUT SUBJECT ID --}}
                <div class="input-user-id">
                    <label for="user_id" class="form-label">ID</label>
                    <input type="text" name="user_id" id="user_id" class="form-control @error("user_id") is-invalid @enderror" placeholder="Enter id" required value="{{ old("user_id") }}" autofocus>
                </div>

                {{-- INPUT NAME --}}
                <div class="input-user-name">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error("name") is-invalid @enderror" placeholder="Enter name" required value="{{ old("name") }}">
                </div>

                {{-- INPUT PASSWORD --}}
                <div class="input-user-pass">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error("password") is-invalid @enderror" placeholder="Enter password" required value="{{ old("password") }}" autofocus>
                </div>

                {{-- INPUT STATUS --}}
                <div class="edit-status">
                    <label class="status" for="flag_active">Status</label>
                    <label class="switch" for="flag_active">
                        <input type="checkbox" class="checkbox" name="flag_active" id="flag_active" value=1 >
                        <div class="slider"></div>
                    </label>
                </div>

                {{-- BUTTON SIGN IN --}}
                <button type="submit" class="submit">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg> Add
                    </span>
                </button>

            </form>
        </div>

        <img class="bg-pict-user  animate__animated animate__backInDown" src="IMG/bg-pict-user.png" alt="bg-pict-user">
        <img class="pict-user  animate__animated animate__backInDown" src="IMG/pict-user.png" alt="pict-user">

    </div>

    {{-- TABEL USER --}}
    <div class="list">
        <p align="center">User's Data</p>
        <div class="container" align="center">
            <table class="list-student">
                <thead class="head-list">
                    <tr class="tr-list">
                        <th class="th-list">User ID</th>
                        <th class="th-list">Name</th>
                        <th class="th-list">Email</th>
                        <th class="th-list">Status</th>
                        <th class="th-list">Edit</th>
                        <th class="th-list">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $users as $user )
                    <tr class="tr-list">
                            <td class="td-list">{{ $user->user_id }}</td>
                            <td class="td-list">{{ $user->name }}</td>
                            <td class="td-list">{{ $user->email }}</td>

                            @if ( $user->flag_active == 0 )
                                <td class="td-list" align="center">Non-active</td>
                            @elseif ( $user->flag_active == 1 )
                                <td class="td-list" align="center">Active</td>
                            @endif

                            <td class="td-action" align="center">
                                <button class="edit-button editUser" data-bs-toggle="modal" data-bs-target="#editUser" data-user="{{ $user }}">
                                    <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                    </svg>
                                </button>
                            </td>
                            <td class="td-action" align="center">
                                <button class="delete-button deleteUser" data-bs-toggle="modal" data-bs-target="#deleteUser" data-id="{{ $user->user_id }}">
                                    <svg class="delete-svgIcon" viewBox="0 0 448 512">
                                        <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- MODAL EDIT USER --}}
    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

            {{-- FORM EDIT USER --}}
            <form action="/user/edit" method="post">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editUserLabel">EDIT USER</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td>
                                <div class="edit-user-id">
                                    <label for="user_id" class="form-label">ID</label>
                                    <input type="text" name="user_id" id="userID" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="edit-user-name">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="userName">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="edit-user-email">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="userEmail">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="edit-user-flag">
                                    <label for="user_flag_active" class="form-label">Status</label>
                                    <select name="flag_active" id="user_flag_active">
                                        <option value="1">Active</option>
                                        <option value="0">Non-active</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div height="500px" width="100px" border="1px solid black" class="blank">blank</div>
                </div>
                <div class="modal-footer">
                    <button class="edit-btn-fix">
                        <svg class="edit-svgIcon" viewBox="0 0 512 512">
                            <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                        </svg>
                        Edit Student
                    </button>
                </div>
            </form>

            </div>
        </div>
    </div>

    {{-- MODAL DELETE SUBJECT --}}
    <div class="modal fade" id="deleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                {{-- FORM EDIT SUBJECT --}}
                <form action="/user/delete" method="post">
                    @csrf

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">DELETE USER</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ARE YOU SURE WANT TO DELETE THIS USER?
                        <input type="hidden" value="secret" name="user_id" id="userID_delete">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button  type="submit" class="btn btn-danger">DELETE</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>

        // -- SCRIPT MODAL EDIT
        $('.editUser').click(function(){
            const dataUser = $(this).data('user');
            $('#userID').val(dataUser.user_id);
            $('#userName').val(dataUser.name);
            $('#userEmail').val(dataUser.email);
            $('#user_flag_active').val(dataUser.flag_active);
        })

        // -- SCRIPT MODAL DELETE
        $('.deleteUser').click(function(){
            const dataUser = $(this).data('id');
            $('#userID_delete').val(dataUser);
        })

    </script>

@endsection
