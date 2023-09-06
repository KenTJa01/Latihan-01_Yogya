@extends('layouts.main')

@section('containter')
    <link rel="stylesheet" href="CSS/enrollment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    {{-- JUDUL MASTER DATA ENROLLMENT --}}
    <div class="title">
        <div class="ellipse-2" ></div>
        <p>Master Data Enrollment</p>
    </div>

    {{-- SESSION --}}
    @if (session()->has('success'))
        <div class="notification">

            <div class="alert alert-success" role="alert">
                <strong>New Enrollment has been added!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        </div>
    @endif

    {{-- ADD NEW ENROLLMENT --}}
    <div class="add-enrollment">
        <div class="rectangle">

            {{-- FORM --}}
            <form class="form" action="/enrollment" method="post">
                @csrf

                {{-- JUDUL --}}
                <p class="form-title-01">Add New Enrollment<p>

                {{-- GARIS DI BAWAH JUDUL --}}
                <div class="line-1"></div>

                {{-- INPUT SUBJECT ID --}}
                <div class="input-subject-id">
                    <label for="subject_id" class="form-label">Subject ID</label>
                    <select name="subject_id" id="subject_id">
                        <option>Please select the option ..</option>
                        @foreach ( $subjects as $subject )
                            <option class="form-select" value="{{ $subject->subject_id }}">{{ $subject->subject_id . " - " . $subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- INPUT STUDENT ID --}}
                <div class="input-student-id">
                    <label for="student_id" class="form-label">Student ID</label>
                    <select name="student_id" id="student_id">
                        <option>Please select the option ..</option>
                        @foreach ( $students as $student )
                            <option class="form-select" value="{{ $student->student_id }}">{{ $student->student_id . " - " . $student->student_name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- INPUT ENROLLMENT START DATE --}}
                <div class="input-start-date">
                    <label for="enroll_start_date" class="form-label">Start Date</label>
                    <input type="date" name="enroll_start_date" id="enroll_start_date" class="form-control @error("enroll_start_date") is-invalid @enderror" placeholder="Enter start date" required value="{{ old("enroll_start_date") }}">
                </div>

                {{-- INPUT ENROLLMENT END DATE --}}
                <div class="input-end-date">
                    <label for="enroll_end_date" class="form-label">End Date</label>
                    <input type="date" name="enroll_end_date" min="{{ old("enroll_start_date") }}" id="enroll_end_date" class="form-control @error("enroll_end_date") is-invalid @enderror" placeholder="Enter end date" required value="{{ old("enroll_end_date") }}">
                </div>

                {{-- INPUT STATUS --}}
                <div class="input-status">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status">
                        <option>Please select the option ..</option>
                        <option class="form-select" value="Passed">Passed</option>
                        <option class="form-select" value="Fail">Fail</option>
                    </select>
                </div>

                {{-- INPUT GRADE --}}
                <div class="input-grade">
                    <label for="grade" class="form-label">Grade</label>
                    <input type="text" class="form-control" name="grade" id="grade" placeholder="Enter grade">
                </div>

                {{-- BUTTON SUBMIT --}}
                <button type="submit" class="submit">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg> Add
                    </span>
                </button>

            </form>
        </div>

        <img class="bg-pict-enrollment  animate__animated animate__backInDown" src="IMG/bg-pict-enrollment.png" alt="bg-pict-enrollment">
        <img class="pict-enrollment  animate__animated animate__backInDown" src="IMG/pict-enrollment.png" alt="pict-enrollment">

    </div>

    {{-- TABEL ENROLLMENT --}}
    <div class="list">
        <p align="center">Enrollment's Data</p>
        <div class="container" align="center">
            <table class="list-enrollment">
                <thead class="head-list">
                    <tr class="tr-list">
                        <th class="th-list">Subject ID</th>
                        <th class="th-list">Student ID</th>
                        <th class="th-list">Start Date</th>
                        <th class="th-list">End Date</th>
                        <th class="th-list">Status</th>
                        <th class="th-list">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $enrollments as $enrollment )
                        <tr class="tr-list">
                            <td class="td-list">{{ $enrollment->subject_id }}</td>
                            <td class="td-list">{{ $enrollment->student_id }}</td>
                            <td class="td-list">{{ $enrollment->enroll_start_date }}</td>
                            <td class="td-list">{{ $enrollment->enroll_end_date }}</td>
                            <td class="td-list">{{ $enrollment->status }}</td>
                            <td class="td-list">{{ $enrollment->grade }}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
