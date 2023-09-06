@extends('layouts.main')

@section('containter')
    <link rel="stylesheet" href="CSS/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


    {{-- JUDUL MASTER DATA STUDENT --}}
    <div class="title">
        <div class="ellipse-2" ></div>
        <p class="">Master Data Student</p>
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
                <strong>New Student has been added!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        </div>
    @endif

    @if (session()->has('success-edit'))
        <div class="notification">

            <div class="alert alert-success" role="alert">
                <strong class="strong-edit">New Student has been updated!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        </div>
    @endif

    @if (session()->has('success-delete'))
        <div class="notification">

            <div class="alert alert-success" role="alert">
                <strong class="strong-edit">New Student has been deleted!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        </div>
    @endif

    {{-- ADD NEW STUDENT --}}
    <div class="add-student">
        <div class="rectangle">

            {{-- FORM --}}
            <form class="form" action="/student" method="post">
                @csrf

                {{-- JUDUL --}}
                <p class="form-title-01">Add New Student<p>

                {{-- GARIS DI BAWAH JUDUL --}}
                <div class="line-1"></div>

                {{-- INPUT STUDENT ID --}}
                <div class="input-id">
                    <label for="student_id" class="form-label">ID</label>
                    <input type="text" name="student_id" id="student_id" class="form-control @error("student_id") is-invalid @enderror" placeholder="Enter id" required value="{{ old("student_id") }}" autofocus>
                    @error("student_id")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- INPUT NAME --}}
                <div class="input-name">
                    <label for="student_name" class="form-label">Name</label>
                    <input type="text" name="student_name" id="student_name" class="form-control @error("student_name") is-invalid @enderror" placeholder="Enter name" required value="{{ old("student_name") }}" autofocus>
                    @error("student_name")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- INPUT DATE OF BIRTH --}}
                <div class="input-birth">
                    <label for="date_of_birth" class="form-label">Birth Date</label>
                    <input type="date" name="date_of_birth" max="2023-08-01" id="date_of_birth" class="form-control" placeholder="Enter birth date" required value="{{ old("date_of_birth") }}">
                    @error("date_of_birth")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- INPUT PASSWORD --}}
                <div class="input-entrance">
                    <label for="year_entrance" class="form-label">Entrance</label>
                    <input type="number" name="year_entrance" id="year_entrance" class="form-control" placeholder="Enter year_entrance" required value="{{ old("year_entrance") }}">
                    @error("year_entrance")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- BUTTON SUBMIT --}}
                <button type="submit" class="submit">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg> Add
                    </span>
                </button>

            </form>
        </div>

        <img class="bg-pict-student  animate__animated animate__backInDown" src="IMG/bg-pict-student.png" alt="bg-pict-student">
        <img class="pict-student  animate__animated animate__backInDown" src="IMG/pict-student.png" alt="pict-student">

    </div>

    {{-- TABEL STUDENT --}}
    <div class="list">
        <p align="center">Student's Data</p>
        <div class="container" align="center">
            <table class="list-student">
                <thead class="head-list">
                    <tr class="tr-list">
                        <th class="th-list">Student ID</th>
                        <th class="th-list">Student Name</th>
                        <th class="th-list">Date of Birth</th>
                        <th class="th-list">Year Entrance</th>
                        <th class="th-list">Edit</th>
                        <th class="th-list">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $students as $student )
                    <tr class="tr-list">
                        <td class="td-list">{{ $student->student_id }}</td>
                        <td class="td-list">{{ $student->student_name }}</td>
                        <td class="td-list">{{ $student->date_of_birth }}</td>
                        <td class="td-list">{{ $student->year_entrance }}</td>
                        <td class="td-action" align="center">
                            <button class="edit-button editStudent" data-bs-toggle="modal" data-bs-target="#editStudents" data-stu="{{ $student }}">
                                <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                </svg>
                            </button>
                        </td>
                            <td class="td-list" align="center">
                                <button class="delete-button deleteStudent" data-bs-toggle="modal" data-bs-target="#deleteStudents" data-id="{{ $student }}">
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

    {{-- MODAL EDIT STUDENT --}}

        {{-- DIV MODAL TARGETING FROM BUTTON --}}
        <div class="modal fade" id="editStudents" tabindex="-1" aria-labelledby="editStudentLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                {{-- FORM EDIT STUDENT --}}
                <form action="/student/edit" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editStudentLabel">EDIT STUDENT</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tr>
                                <td>
                                    <div class="edit-id">
                                        <label for="student_id" class="form-label">ID</label>
                                        <input type="text" name="student_id" id="studentID" required readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="edit-name">
                                        <label for="student_name" class="form-label">Name</label>
                                        <input type="text" name="student_name" id="studentName" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="edit-birth">
                                        <label for="date_of_birth" class="form-label">Birth Date</label>
                                        <input type="date" name="date_of_birth" id="dateOfBirth" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="edit-entrance">
                                        <label for="year_entrance" class="form-label">Entrance</label>
                                        <input type="number" name="year_entrance" id="yearEntrance" required>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div height="200px" width="100px" border="1px solid black" class="blank">blank</div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="edit-btn-fix">
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

    {{-- MODAL DELETE STUDENT --}}
    @foreach ( $students as $student )

        {{-- DIV MODAL TARGETING FROM BUTTON --}}
        <div class="modal fade" id="deleteStudents" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    {{-- FORM EDIT STUDENT --}}
                    <form action="/student/delete" method="post">
                        @csrf

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">DELETE STUDENT</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ARE YOU SURE WANT TO DELETE THIS STUDENT?
                            <input type="hidden" value="secret" name="student_id" id="studentID_delete">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    @endforeach

    <script>

        // -- SCRIPT MODAL EDIT
        $('.editStudent').click(function(){
            const dataStudent = $(this).data('stu');
            $('#studentID').val(dataStudent.student_id);
            $('#studentName').val(dataStudent.student_name);
            $('#dateOfBirth').val(dataStudent.date_of_birth);
            $('#yearEntrance').val(dataStudent.year_entrance);
            $('#flag_active').val(dataStudent.flag_active);
        })

        // -- SCRIPT MODAL DELETE
        $('.deleteStudent').click(function(){
            const dataStudent = $(this).data('id');
            $('#studentID_delete').val(dataStudent.student_id);
        })
    </script>

@endsection
