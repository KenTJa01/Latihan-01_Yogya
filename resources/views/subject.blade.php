@extends('layouts.main')

@section('containter')
    <link rel="stylesheet" href="CSS/subject.css">

    {{-- JUDUL MASTER DATA SUBJECT --}}
    <div class="title">
        <div class="ellipse-2" ></div>
        <p>Master Data Subject</p>
    </div>

    {{-- SESSION --}}
    @if (session()->has('success'))
        <div class="notification">

            <div class="alert alert-success" role="alert">
                <strong>New Subject has been added!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        </div>
    @endif

    @if (session()->has('success-edit'))
        <div class="notification">

            <div class="alert alert-warning" role="alert">
                <strong class="strong-edit">New Subject has been updated!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        </div>
    @endif


    {{-- ADD NEW SUBJECT --}}
    <div class="add-subject">
        <div class="rectangle">

            {{-- FORM --}}
            <form class="form" action="/subject" method="post">
                @csrf

                {{-- JUDUL --}}
                <p class="form-title-01">Add New Subject<p>

                {{-- GARIS DI BAWAH JUDUL --}}
                <div class="line-1"></div>

                {{-- INPUT SUBJECT ID --}}
                <div class="input-id">
                    <label for="subject_id" class="form-label">ID</label>
                    <input type="text" name="subject_id" id="subject_id" class="form-control @error("subject_id") is-invalid @enderror" placeholder="Enter id" required value="{{ old("subject_id") }}" autofocus>
                    @error("subject_id")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- INPUT NAME --}}
                <div class="input-name">
                    <label for="subject_name" class="form-label">Name</label>
                    <input type="text" name="subject_name" id="subject_name" class="form-control @error("subject_name") is-invalid @enderror" placeholder="Enter name" required value="{{ old("subject_name") }}">
                    @error("subject_name")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- INPUT CREDIT --}}
                <div class="input-credit">
                    <label for="credit" class="form-label">Credit</label>
                    <input type="number" name="credit" id="credit" class="form-control @error("credit") is-invalid @enderror" placeholder="Enter name" required value="{{ old("credit") }}">
                    @error("credit")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- INPUT PRE-REQUIRED --}}
                <div class="input-preRequired">
                    <label for="subject_pre_required" class="form-label">Pre-required</label>
                    <select class="form-select" name="subject_pre_required" id="subject_pre_required">
                        <option value="null">Please select the option ..</option>
                        @foreach ( $subjects as $subject )
                            @if (old("subject_pre_required") == $subject->subject_id)
                                <option value="{{ $subject->subject_id }}" selected>{{ $subject->subject_id . " - ". $subject->subject_name }}</option>
                            @else
                                <option value="{{ $subject->subject_id }}">{{ $subject->subject_id . " - ". $subject->subject_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                {{-- BUTTON SUBMIT --}}
                <button type="submit" class="submit">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg> Add
                    </span>
                </button>

            </form>
        </div>

        <img class="bg-pict-subject" src="IMG/bg-pict-subject.png" alt="bg-pict-subject">
        <img class="pict-subject" src="IMG/pict-subject.png" alt="pict-subject">

    </div>

    {{-- TABEL SUBJECT --}}
    <div class="list">
        <p align="center">Subject's Data</p>
        <div class="container" align="center">
            <table class="list-subject">
                <thead class="head-list">
                    <tr class="tr-list">
                        <th class="th-list">Subject ID</th>
                        <th class="th-list">Subject Name</th>
                        <th class="th-list">Credit</th>
                        <th class="th-list">Pre-required</th>
                        <th class="th-list">Edit</th>
                        <th class="th-list">Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ( $subjects as $subject )
                    <tr class="tr-list">
                        <td class="td-list">{{ $subject->subject_id }}</td>
                        <td class="td-list">{{ $subject->subject_name }}</td>
                        <td class="td-list">{{ $subject->credit }}</td>
                        <td class="td-list">{{ $subject->subject_pre_required }}</td>
                        <td class="td-action" align="center">
                            <button class="edit-button" data-bs-toggle="modal" data-bs-target="#editSubject{{ $subject->subject_id }}">
                                <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                </svg>
                            </button>
                        </td>
                        <td class="td-list" align="center">
                            <button class="delete-button" data-bs-toggle="modal" data-bs-target="#deleteSubject{{ $subject->subject_id }}">
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

    {{-- MODAL EDIT SUBJECT --}}
    @foreach ( $subjects as $subject )

        {{-- DIV MODAL TARGETING FROM BUTTON --}}
        <div class="modal fade" id="editSubject{{ $subject->subject_id }}" tabindex="-1" aria-labelledby="editSubjectLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                {{-- FORM EDIT SUBJECT --}}
                <form action="/subject/edit" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editSubjectLabel">EDIT SUBJECT</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tr>
                                <td>
                                    <div class="edit-id">
                                        <label for="subject_id" class="form-label">ID</label>
                                        <input type="text" value="{{ $subject->subject_id }}" name="subject_id" id="subject_id" placeholder="Enter id" required value="{{ old("subject_id") }}" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="edit-name">
                                        <label for="subject_name" class="form-label">Name</label>
                                        <input type="text" value="{{ $subject->subject_name }}" name="subject_name" id="subject_name" placeholder="Enter name" required value="{{ old("subject_name") }}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="edit-credit">
                                        <label for="credit" class="form-label">Credit</label>
                                        <input type="number" value="{{ $subject->credit }}" name="credit" id="credit" placeholder="Enter name" required value="{{ old("credit") }}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="edit-preRequired">
                                        <label for="subject_pre_required" class="form-label">Pre-required</label>
                                        <select name="subject_pre_required" id="subject_pre_required">
                                            <option value="{{ $subject->subject_pre_required }}">{{ $subject->subject_pre_required }}</option>
                                            @foreach ( $subjects as $subject )
                                                <option value="{{ $subject->subject_id }}">{{ $subject->subject_id . " - " . $subject->subject_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div height="200px" width="100px" border="1px solid black" class="blank">blank</div>
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

    @endforeach

    {{-- MODAL DELETE SUBJECT --}}
    @foreach ( $subjects as $subject )

        {{-- DIV MODAL TARGETING FROM BUTTON --}}
        <div class="modal fade" id="deleteSubject{{ $subject->subject_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    {{-- FORM EDIT SUBJECT --}}
                    <form action="/subject/delete" method="post">
                        @csrf

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">DELETE SUBJECT</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ARE YOU SURE WANT TO DELETE THIS SUBJECT?
                            <input type="text" value="{{ $subject->subject_id }}" name="subject_id" id="subject_id" placeholder="Enter id" hidden readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-danger">DELETE</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    @endforeach

@endsection
