<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <title>Login</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }

        .text {
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
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
                <form class="d-flex">
                    <a href="#logIn" class="btn btn-primary"
                        style=" border: none;width:max-content; background-color:rgba(87, 151, 146); color: white; ">LOG
                        IN</a>
                    <a href="{{ route('signup') }}" class="btn btn-primary"
                        style=" border: none;width:max-content; background-color:#ff6f28; color: white; margin-left: 20px;">SIGN
                        UP</a>
                </form>
            </div>
        </div>
    </nav>
    <section class="vh-100" style="margin-bottom: 50px;">

        <div class="container">
            <div class="container py-5 h-100">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-md-9">
                        <div class="text">
                            <h2>Welcome to LAU Connect!</h2>
                        </div>
                        <div>
                            <h2 style="color: rgba(87, 151, 146);text-align: left">About Us</h2>
                            <p>At LAU Connect, we're dedicated to making your experience at Lebanese American University
                                (LAU)
                                an unforgettable one by helping you connect with fellow students who share your
                                interests,
                                passions, and goals. College is not just about academics; it's also about forming
                                lifelong
                                friendships and creating lasting memories. That's where we come in.</p>
                            <h2 style="text-align: left; color:rgba(87, 151, 146);">How It Works</h2>
                            <ul>

                                <li><span style="color: #ff6f28;">Step 1:</span> Create Your Profile</li>
                                <li><span style="color: #ff6f28;">Step 2:</span> Discover Common Interests</li>


                                <li><span style="color: #ff6f28;">Step 3:</span> Connect With Peers</li>

                            </ul>
                            <h2 style="text-align: left; color:rgba(87, 151, 146);">Our Mission</h2>
                            <p>At LAU Connect, we believe that forming meaningful connections is essential to a
                                fulfilling
                                college
                                experience. Whether you're looking for study buddies, gym partners, or simply someone to
                                grab coffee
                                with between classes, we're here to help you find your tribe.</p>
                            <h2 style="text-align: left; color:rgba(87, 151, 146);">Get Started Today!</h2>

                            <p>Don't wait to start building your network at LAU. Join LAU Connect now and take the first
                                step
                                towards creating friendships that will last a lifetime.</p>
                            <p><span style="color: #ff6f28;padding-right: 2px">Contact Us: </span>
                                nathalie.elashkar@lau.edu, jana.albardan@lau.edu</p>

                        </div>
                        <br><br>
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('images/anawjana.png') }}" class="img-fluid" style="height: 100%;">
                        <img src="{{ asset('images/squiggle.png') }}" class="img-fluid" style="height: 100%;">

                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('images/aboutUs.png') }}" class="img-fluid">
                    </div>
                    <div class="col-md-6" id="logIn">
                        <div style="border-radius: 3%;background-color: #f7f5f5; padding: 3%">

                            <form method="POST" action="{{ route('login') }}" id="login-form">
                                @csrf


                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form1Example13">Username</label>
                                    <input type="text" name="username" id="form1Example13" class="form-control" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form1Example23">Password</label>
                                    {{-- <input type="password" id="form1Example23" name="password"
                                class="form-control form-control-lg" style="background-color:#dcdcdf;" /> --}}
                                    <input id="password" type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    <div class="invalid-feedback" style="display:none; color: red; margin-left:0.5%"
                                        role="alert" id="invalid-feedback">
                                        <strong>Authentication failed! Retry Again.</strong>
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="invalid-feedback" style="display:none; color: red; margin-left:0.5%"
                                        role="alert" id="invalid-feedback">
                                        <strong>Authentication failed! Retry Again.</strong>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-around align-items-center mb-4">

                                    <div class="form-check">
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}
                                            style="color:#ff6f28;">


                                    </div>


                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" style="color:#ff6f28;"
                                            href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>

                                <div style="text-align: center">

                                    <button type="submit" class="btn btn-primary btn-lg btn-block"
                                        style="border: none;background-color:#ff6f28;">SIGN IN</button>
                                    </br>
                                    </br>


                                    <span>Don't have an account? </span><a href="{{ route('signup') }}"
                                        style="text-decoration: none; color:#ff6f28;">SIGN UP</a>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    

    <script>
        function login() {
            var un = document.getElementById("un").value;
            var pass = document.getElementById("pass").value;
            if (un === "" || pass === "") {
                alert("You must fill in the username and the password!");
            } else {
                document.getElementById("login-form").submit();
            }
        }

        function ClearForm() {
            document.getElementById("un").value = "";
            document.getElementById("pass").value = "";
        }

        function checkEnter(event, nextField) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById(nextField).focus();

                if (nextField === 'login-form') {
                    login();
                }
            }
        }

        $(document).ready(function(){
        $('#login-form').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission behavior
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route('login') }}',
                data: formData,
                success: function (response) {
                    if (response.status === 'error') {
                        if (response.message === 'Your account has been deleted') {
                            $('#myModal').modal('show');
                            $('.modal-body').html(response.message); // Set the error message in the modal
                        } else {
                            $('#invalid-feedback').show(); // Show the error message
                            $('#invalid-feedback').text(response.message);
                        }
                    } else {
                        window.location.href = '{{ url('/dashboard') }}';
                    }
                },
                error: function (xhr, status, error) {
                    if(xhr.responseJSON && xhr.responseJSON.message === 'Your account has been deleted') {
                        $('#myModal').modal('show');
                       // $('.modal-body').html(xhr.responseJSON.message); // Set the error message in the modal
                    } else {
                        $('#invalid-feedback').show(); // Show the error message
                        $('#invalid-feedback').text('Authentication failed! Retry Again.');
                    }
                }
            });
        });
    });
    $(document).ready(function() {
        $('#cancelButton').click(function() {
            $('#myModal').modal('hide');
        });
        $('#retrieveAccountButton').click(function () {
    window.location.href = '{{ route('send-verification-email') }}';
});




   
    });
    </script>
  
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    Your account has been deleted
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelButton" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="retrieveAccountButton"   style="background-color:#FF6F28;border:none">Retrieve Account</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
