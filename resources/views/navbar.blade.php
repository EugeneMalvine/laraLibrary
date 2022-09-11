<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ route('home') }}">HOME</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggle">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('card.self') }}">My Cards</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">My Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Library</a>
            </li>
        </ul>
            <div class="pr-2">  <strong>Balance:</strong> {{ Auth::user()->balance ?: 0 }}</div>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>