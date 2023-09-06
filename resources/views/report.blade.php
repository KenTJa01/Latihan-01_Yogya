@extends('layouts.main')

@section('containter')
    <link rel="stylesheet" href="CSS/report.css">

    <div class="content">

        <div class="profile">
            <div class="content-filter">
                <div class="filter">
                    <form action="/report" action="/report/export" method="get">
                        @csrf

                        {{-- YEAR FILTER --}}
                        <select name="year_entrance" id="year_entrance">

                            <option value="">None</option>
                            @foreach ($yearDatas as $yearData)
                                <option @php if ($year  != null && $year == $yearData->year_entrance) { echo 'selected=\"selected\"';} @endphp value="{{ $yearData->year_entrance }}">{{ $yearData->year_entrance }}</option>
                            @endforeach

                        </select>

                        {{-- SUBJECT NAME FILTER --}}
                        <select name="subject_name" id="subject_name">

                            <option value="">None</option>
                            @foreach ($subjectDatas as $subjectData)
                                <option @php if ($subject  != null && $subject == $subjectData->subject_name) { echo 'selected=\"selected\"';} @endphp value="{{ $subjectData->subject_name }}">{{ $subjectData->subject_name }}</option>
                            @endforeach

                        </select>

                        {{-- STUDENT NAME FILTER --}}
                        <select name="student_name" id="student_name">

                            <option value="">None</option>
                            @foreach ($studentDatas as $studentData)
                                <option @php if ($student  != null && $student == $studentData->student_name) { echo 'selected=\"selected\"';} @endphp value="{{ $studentData->student_name }}">{{ $studentData->student_name }}</option>
                            @endforeach

                        </select>

                        <button class="btn-submit" type="submit">
                            Filter
                        </button>

                    </form>


                </div>
                <form action="/report/export" method="get">

                    <input type="hidden" name="year_entrance" value="{{ $year }}">
                    <input type="hidden" name="subject_name" value="{{ $subject }}">
                    <input type="hidden" name="student_name" value="{{ $student }}">

                    <button class="btn-export" type="submit">Export</button>

                </form>
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
