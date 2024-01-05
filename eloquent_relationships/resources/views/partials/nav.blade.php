<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- <a class="navbar-brand" href="{{ route('home') }}">Tasks</a> -->

            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('user') }}">Users </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('address') }}">Addresses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post') }}">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subject') }}">Subjects</a>
                </li>
            </ul>
    </div>
</nav>