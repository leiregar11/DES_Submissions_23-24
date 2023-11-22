<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Tasks</a>

        <!-- Botón de hamburguesa para dispositivos pequeños -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido de la barra de navegación -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('addTask') }}">Add Task  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('showList') }}">Task List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('search') }}">Search</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>