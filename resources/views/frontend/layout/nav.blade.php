<nav class="navbar navbar-expand-lg navbar-light  mainNavBar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ $logo }}" alt="arabianRanches" class="mainLogo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navBarArea" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/arabianRanches_1') }}">Arabian Ranches I</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/arabianRanches_11') }}">Arabian Ranches II</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/arabianRanches_111') }}">Arabian Ranches III</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/properties') }}">Properties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact-us') }}">Contact Us</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
