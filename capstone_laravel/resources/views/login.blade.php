<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./styles/stylej.css"> -->
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

    <section class="vh-100" style="margin-bottom: 50px;">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="text">
                        <h2>Welcome to LAU Connect!</h2>
                    </div>
                    <div>
                        <h1>About Us</h1>
                        <p>At LAU Connect, we're dedicated to making your experience at Lebanese American University
                            (LAU)
                            an unforgettable one by helping you connect with fellow students who share your interests,
                            passions, and goals. College is not just about academics; it's also about forming lifelong
                            friendships and creating lasting memories. That's where we come in.</p>
                        <p style="text-align: center">How It Works</p>
                        <ul>
                            <li>Step 1: Create Your Profile</li>
                            <li>Step 2: Discover Common Interests</li>
                            <li>Step 3: Connect with Peers</li>
                        </ul>
                        <p style="text-align: center">Our Mission</p>
                        <p>At LAU Connect, we believe that forming meaningful connections is essential to a fulfilling
                            college
                            experience. Whether you're looking for study buddies, gym partners, or simply someone to
                            grab coffee
                            with between classes, we're here to help you find your tribe.</p>
                        <p style="text-align: center">Get Started Today!</p>
                        <p>Don't wait to start building your network at LAU. Join LAU Connect now and take the first
                            step
                            towards creating friendships that will last a lifetime.</p>
                        <p>Contact Us:<br>
                            Email: nathalie.elashkar@lau.edu, jana.albardan@lau.edu</p>
                    </div>
                </div>
                <div class="col-md-6" >
                    <img src="{{ asset('images/aboutUs.png') }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <div style="border-radius: 3%;background-color: #f7f5f5; padding: 3%">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example13">Username</label>
                                <input type="text" name = "username" id="form1Example13"
                                    class="form-control form-control-lg" style="background-color:#dcdcdf;" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example23">Password</label>
                                <input type="password" id="form1Example23" name="password"
                                    class="form-control form-control-lg" style="background-color:#dcdcdf;" />
                            </div>

                            <div class="d-flex justify-content-around align-items-center mb-4">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3"
                                        style = "color:#ff6f28;"checked />
                                </div>
                                <a href="#!" style="color:#ff6f28;">Forgot password?</a>
                            </div>

                            <!-- Submit button -->
                            <div style="text-align: center">
                                <button type="submit" class="btn btn-primary btn-lg btn-block"
                                    style="border: none;background-color:#ff6f28;">SIGN IN</button>
                                {{-- </div> --}}
                                </br>
                                </br>


                                <span>Don't have an account? </span><a href="{{ route('signup') }}"
                                    style="text-decoration: none; color:#ff6f28;">SIGN UP</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
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
    </script>
</body>
<footer class="fixed-bottom text-center small text-muted py-2" style="position: fixed; bottom: 0; left: 0; width: 100%; z-index: 1;">
  <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">Friends</a>. All rights reserved.</p>
</footer>


</html>
