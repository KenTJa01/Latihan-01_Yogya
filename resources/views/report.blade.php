@extends('layouts.main')

@section('containter')
    <link rel="stylesheet" href="CSS/report.css">



    <div class="content">
        <form action="/report/export" method="get">

            <input type="text" name="year_entrance" value="{{ $year }}" hidden>
            <input type="text" name="subject_name" value="{{ $subject }}" hidden>
            <input type="text" name="student_name" value="{{ $student }}" hidden>

            <button type="submit">Export</button>

        </form>

        <div class="profile">
            <div class="content-filter">
                <div class="filter">
                    <form action="/report" action="/report/export" method="get">
                        {{-- <form action="/report/filter" method="get"> --}}
                        @csrf
                        {{-- YEAR FILTER --}}
                        <select name="year_entrance" id="year_entrance">
                            @if ($year != null)

                                <option value="{{ $year }}">{{ $year }}</option>

                            @endif

                            <option value="">Select Year</option>
                            @foreach ( $entrances as $entrance )

                                <option value="{{ $entrance->year_entrance }}">{{ $entrance->year_entrance }}</option>

                            @endforeach

                        </select>


                        {{-- SUBJECT NAME FILTER --}}
                        <select name="subject_name" id="subject_name">

                            @if ($subject != null)

                                <option value="{{ $subject }}">{{ $subject }}</option>

                            @endif

                            <option value="">Select Subject's Name</option>
                            @foreach ( $subjects as $subject )

                                <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>

                            @endforeach

                        </select>

                        {{-- STUDENT NAME FILTER --}}
                        <select name="student_name" id="student_name">

                            @if ($student != null)

                                <option value="{{ $student }}">{{ $student }}</option>

                            @endif

                            <option value="">Select Student's Name</option>
                            @foreach ( $students as $student )

                                <option value="{{ $student->student_name }}">{{ $student->student_name }}</option>

                            @endforeach

                        </select>

                        <button class="btn-submit" type="submit">
                            <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                            </svg>
                            Edit Student
                        </button>


                    </form>

                </div>
            </div>

            <div class="table-filter">

                <table class="list-filter">
                    <thead class="head-list">
                        <tr class="tr-list">
                            <th class="th-list">Subject ID</th>
                            <th class="th-list">Subject Name</th>
                            <th class="th-list">Student ID</th>
                            <th class="th-list">Student Name</th>
                            <th class="th-list">Year</th>
                            <th class="th-list">Grade</th>
                            <th class="th-list">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $reports as $report )

                            <tr class="tr-list">
                                <td class="td-list">{{ $report->subject_id }}</td>
                                <td class="td-list">{{ $report->subject_name }}</td>
                                <td class="td-list">{{ $report->student_id }}</td>
                                <td class="td-list">{{ $report->student_name }}</td>
                                <td class="td-list">{{ $report->year_entrance }}</td>
                                <td class="td-list">{{ $report->grade }}</td>
                                <td class="td-list">{{ $report->status }}</td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

            </div>



        </div>
    </div>



@endsection
