<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('pages.index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('articles.index') }}">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('articles.create') }}">Create</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('articles.featured') }}">Featured</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('articles.index') }}">
            <input class="form-control mr-sm-2 my-sm-0" type="text" placeholder="Search" name="search">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
