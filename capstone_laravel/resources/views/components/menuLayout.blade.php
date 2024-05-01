<style>
    html,body{
    height: 100%
}
    </style>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"
        integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <div id="topNav">
        <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample" style="width: 50px;">
            <i class="fas fa-bars fa-3x" style="color: #579792;"></i>
        </a>

    </div>



    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"
        style="width: 20%;">
        <div class="offcanvas-header" style="background-color:#579792">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" style="background-color:#579792">

            <div class="list-group list-group-flush mx-3 mt-4" style="background-color:#579792">
                <span style="text-align: center;font-size: large">{{ auth()->user()->name }}</span>

                <a href="/profile1" class="list-group-item list-group-item-action py-2 ripple"
                    style="background-color:#579792">
                    <i class="fas fa-user fa-fw me-3"></i><span>MY PROFILE</span>
                </a>
                <a href="/dashboard" class="list-group-item list-group-item-action py-2 ripple"
                    style="background-color:#579792"><i
                        class="fas fa-th-large fa-fw me-3"></i><span>DASHBOARD</span></a>
                <a href="/connections" class="list-group-item list-group-item-action py-2 ripple"
                    style="background-color:#579792"><i class="fas fa-users fa-fw me-3"></i><span>CONNECTIONS</span></a>
                <a href="/requests" class="list-group-item list-group-item-action py-2 ripple"
                    style="background-color:#579792"><i
                        class="fas fa-user-plus fa-fw me-3"></i><span>REQUESTS</span></a>
                <a href="/contact" class="list-group-item list-group-item-action py-2 ripple"
                    style="background-color:#579792"><i
                        class="fas fa-address-book fa-fw me-3"></i><span>CONTACTS</span></a>
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action py-2 ripple"
                    style="background-color:#579792"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-fw me-3"></i><span style="color:#a43838">Sign Out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>

        </div>
    </div>


    {{ $slot }}
</body>
    <footer class="footer fixed-bottom text-center small text-muted py-2"
    style="position: static; bottom: 0; left: 0; width: 100%; z-index: 1; margin-top: 20px;">
    <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">LAU</a>. All rights reserved.
    </p>
</footer>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script>
        $('[data-toggle="tooltip"]').tooltip()
    </script>
</body>

</html>
