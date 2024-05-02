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

    <head>
        <link rel="stylesheet" href="/styleN.css">
    </head>


<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
{{-- <div id="topNav" style="margin-top: 1.5%;">
    <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
        aria-controls="offcanvasExample" >
        
    </a>

</div>
    <div>
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action py-2 ripple"
        style="background-color:#579792"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt fa-fw me-3"></i><span style="color:#a43838">Sign Out</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form> --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img id="avatarImage" style="height: 5%; width: 5%; object-fit: scale; border-radius: 50%;"
                     src="/images/Logo.png">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">LAU Connect</a>
                    </li>
    
                </ul>
                
              

                <a href="{{ route('logout') }}" class="btn btn-primary"
                style=" border: none;width:max-content; background-color:rgba(87, 151, 146); color: white; margin-left: 20px;"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    LOG OUT
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
        
        <span style="font-size: 35px;">
            <i class="fas fa-star fa-lg md-3" style="font-size: 50px; color: #8971f6;margin-left:10%;text-align: start;vertical-align: sub;"></i>
            The Users</span>
    </div>


    <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
        <div class="container text-center">

            @if ($users->isEmpty())
                <p>
                <h2>No Current Users</h2>
                </p>
            @else
                @foreach ($users as $user)
                    <div class="row"
                        style="border: 2px solid black; display: flex; align-items: center; border-radius: 5px;">


                        @php
                            $userImage = $userImages[$user->id];
                        @endphp
                        <img src="{{ asset($userImage) }}"
                            style="width: 100px;height: 50px;border-radius:50%; margin: 5px; float: left; margin-left: 15px;">


                        <div class="col-sm-2" style="float: left;">
                            <p class="textStyle"
                                style="text-align: left; font-size: 30px; padding: 0; margin: 0;width: max-content;">
                                {{ $user->name }}</p>
                            {{-- <p style="text-align: left; font-weight: lighter; padding: 0;">{{$mutualConnections[$user->id]}} mutual connections</p> --}}
                        </div>
                        <div class="col-sm-8">

                            <!-- No connection exists, display "Add Friend" button -->
                            {{-- <a href="#" class="btn"
                                style="background-color: #579792; width: 15%; border-left: 20px; color: white; font-size: larger; float: right; margin-left: 20px;"
                                data-bs-toggle="modal" data-bs-target="#contactInfoModal"> Share</a> --}}

                            <a href="{{ route('admin.profile', ['id' => $user->id]) }}" class="btn"
                                style="background-color:#FF6F28; width: 25%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 20px;">View
                                Profile</a>
                            {{-- <a href="{{ route('remove.connection', ['connectionid' => $user->id]) }}" class="btn" 
                                style=" background-color: black;width: 15%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">Remove</a> --}}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {{-- <div class="modal fade" id="contactInfoModal" tabindex="-1" aria-labelledby="contactInfoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('sendContact', ['connectionid' => $user->id]) }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contactInfoModalLabel">Enter Contact Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Enter your phone number and/or instagram to help others connect with you.
                            <div style="padding-top: 4%;">
                                <div class="mb-3 row">
                                    <label for="phone" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">Phone Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="phone" name ="phone_number"
                                            style="width: 80%;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="instagram" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">Instagram</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="instagram" name ="instagram"
                                            style="width: 80%;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="phone" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">Tik Tok</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="tiktok" name ="tiktok"
                                            style="width: 80%;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="instagram" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">linkedIN</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="linkedIn" name ="linkedIn"
                                            style="width: 80%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                            <button type="submit" class="btn btn-secondary"
                                style="background-color:#FF6F28 ">Send</button>

                        </div>
                    </div>
                </form>
            </div>
        </div> --}}

    </section>

</body>
    <footer class="fixed-bottom text-center small text-muted py-2"
    style="position: unset; bottom: 0; left: 0; width: 100%; z-index: 1; margin-top: 20px;">
    <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">Friends</a>. All rights reserved.
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

