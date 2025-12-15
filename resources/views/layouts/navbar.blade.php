<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Pico Laravel</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sensor') ? 'active' : '' }}" href="/sensor">
                        Sensor
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('gps') ? 'active' : '' }}" href="/gps">
                        Lokasi GPS
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>
