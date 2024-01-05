<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- <a class="navbar-brand" href="{{ route('home') }}">Tasks</a> -->

     
        <!-- Contenido de la barra de navegación -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('user') }}">Users </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('address') }}">Addresses</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>