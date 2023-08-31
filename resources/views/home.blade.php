@extends('layouts.main')

@section('containter')
    <link rel="stylesheet" href="CSS/home.css">

    <div class="container-home">
        <div class="poster">
            <img class="img-1" alt="Img" src="IMG/img-01.jpg" />
            <img class="img-2" alt="Img" src="IMG/img-02.png" />
        </div>

        {{-- HOME CONTENT --}}
        <div class="overlap">

            {{-- BEST STUDENT --}}
            <div class="side">
                <img class="circle" alt="Circle" src="IMG/circle-04.png" />
                <img class="circle-2" alt="Circle" src="IMG/circle-03.png" />
                <img class="circle-3" alt="Circle" src="IMG/circle-02.png" />
                <img class="circle-4" alt="Circle" src="IMG/circle-01.png" />
            </div>
            <div class="overlap-2">
                <img class="star-medal" alt="Star medal" src="IMG/star-medal-1.png" />
                <div class="text-wrapper-7">Best Student</div>
                <div class="text-wrapper-8">of The Year 2022/2023</div>
            </div>
            <div class="div-wrapper">
                <div class="text-wrapper-9">10005 - Anne</div>
            </div>

            {{-- CALENDER --}}
            <div class="calender-div">
                <font class="calender-title">Calender</font>
                <div class="calendar">
                    <!-- Week days -->
                    <div class="calendar__weekday">Mon</div>
                    <div class="calendar__weekday">Tue</div>
                    <div class="calendar__weekday">Wed</div>
                    <div class="calendar__weekday">Thu</div>
                    <div class="calendar__weekday">Fri</div>
                    <div class="calendar__weekday">Sat</div>
                    <div class="calendar__weekday">Sun</div>

                    <!-- Days of the previous month -->
                    <div class="calendar__day calendar__day--disabled">30</div>
                    <div class="calendar__day calendar__day--disabled">31</div>

                    <!-- Days of the current month -->
                    <div class="calendar__day">1</div>
                    <div class="calendar__day">2</div>
                    <div class="calendar__day">3</div>
                    <div class="calendar__day">4</div>
                    <div class="calendar__day">5</div>
                    <div class="calendar__day">6</div>
                    <div class="calendar__day">7</div>
                    <div class="calendar__day">8</div>
                    <div class="calendar__day">9</div>
                    <div class="calendar__day">10</div>
                    <div class="calendar__day">11</div>
                    <div class="calendar__day">12</div>
                    <div class="calendar__day">13</div>
                    <div class="calendar__day">14</div>
                    <div class="calendar__day">15</div>
                    <div class="calendar__day">16</div>
                    <div class="calendar__day">17</div>
                    <div class="calendar__day">18</div>

                    <!-- The current day -->
                    <div class="calendar__day calendar__day--current">19</div>

                    <div class="calendar__day">20</div>
                    <div class="calendar__day">21</div>
                    <div class="calendar__day">22</div>
                    <div class="calendar__day">23</div>
                    <div class="calendar__day">24</div>
                    <div class="calendar__day">25</div>
                    <div class="calendar__day">26</div>
                    <div class="calendar__day">27</div>
                    <div class="calendar__day">28</div>
                    <div class="calendar__day">29</div>
                    <div class="calendar__day">30</div>
                    <div class="calendar__day">31</div>

                    <!-- Days of the next month -->
                    <div class="calendar__day calendar__day--disabled">1</div>
                    <div class="calendar__day calendar__day--disabled">2</div>
                </div>
            </div>
        </div>


    </div>

@endsection
