<nav class="navbar navbar-expand-lg bg-dark navbar-dark bg-body-tertiary">
    <div class="container">
        <div class="">
            <a class="navbar-brand" href="{{ route('frontend.home') }}">
                Oraska <font class="text-success">L</font> MS
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('frontend.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('frontend.home') }}">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('frontend.instructor') }}">Instructor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('frontend.home') }}">Home</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <div class="input-group">
                    <input type="text" class="form-control rounded-0" placeholder="Search Here">
                    <button class="input-group-text btn btn-success rounded-0">Search</button>
                </div>
            </form>&nbsp;&nbsp;&nbsp;
            @if(auth()->check())
                @if(auth()->user()->type == 'student')
                    <a href="{{route('student.dashboard')}}" class="input-group-text btn btn-success rounded-0">Account</a>
                @endif
            @else
                <a href="{{route('login')}}" class="input-group-text btn btn-success rounded-0">Login</a>
            @endif
        </div>
    </div>
</nav>
