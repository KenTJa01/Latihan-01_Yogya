<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<nav>
    <div class="">
        <img src="IMG/logo.png" alt="yogya-logo" /><font>Yogya Learning Academy</font>
    </div>
    <ul>
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/student">Student</a>
        </li>
        <li>
            <a href="/subject">Subject</a>
        </li>
        <li>
            <a href="/enrollment">Enrollment</a>
        </li>
        <li>
            <a href="/report">Report</a>
        </li>

        @auth
            <li>
                <div class="dropdown">
                    <button class="dropdown-btn" aria-haspopup="menu">
                        <span>Profile</span>
                        <span class="arrow"></span>
                    </button>
                    <ul class="dropdown-content" role="menu">
                        <div class="drop-div">
                            <li class="profile" style="--delay: 1;"><a href="/profile">Profile</a></li>
                            <li class="user" style="--delay: 2;"><a href="/user">User</a></li>
                        </div>
                    </ul>
                </div>
            </li>
        @else
            <li>
                <a href="/signin">Signin</a>
            </li>
        @endauth
    </ul>
</nav>
