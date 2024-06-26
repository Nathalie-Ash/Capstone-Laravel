<html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <title>Sign Up</title>
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
    <section class="vh-100">
        <div class="container py-5 h-100" style="padding: 0%">
            <div class="row d-flex align-items-center justify-content-center">


                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1"
                    style ="border-radius: 3%;background-color: #f7f5f5; padding:1.25%">
                    <form action ="/signup" method ="POST">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Full name</label>
                            <input type="text" name = "name" id="form1Example13"
                                class="form-control form-control-lg" style="background-color:#dcdcdf;" />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">LAU Email</label>
                            <input type="email" name="email" id="form1Example123" class="form-control form-control-lg" style="background-color:#dcdcdf;" />
                            <span id="emailAvailability" style="color: red; margin-left:0.5%"></span>
                            <span id="emailAvailability1" style="color: black;"></span>
                            <br>
                            <span id="emailFormatError" style="color: red;"></span>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Username</label>
                            <input type="text" name = "username" id="form1Example1234"
                                class="form-control form-control-lg" style="background-color:#dcdcdf;" />
                            <span id="usernameAvailability" style="color: red; margin-left:0.5%"></span>
                            <span id="usernameAvailability1" style="color: black;"></span>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Password</label>
                            <input type="password" name ="password" id="form1Example23"
                                class="form-control form-control-lg" style="background-color:#dcdcdf;" />
                            <span id="passwordStrengthFeedback" style="color: red;"></span>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Confirm Password</label>
                            <input type="password"name="password_confirmation" id="form1Example234"
                                class="form-control form-control-lg" style="background-color:#dcdcdf;" />
                            <span id="passwordMatchError" style="color: red;"></span>
                        </div>
                        <div style ="text-align: center;">

                            <button id="nextButton" type= "submit" class="btn btn-primary btn-lg btn-block"
                                style="border: none;background-color:#ff6f28;">NEXT</button>

                            </br>
                            <span>Already have an account? </span><a href="/"
                                style="text-decoration: none; color:#ff6f28;">LOG IN</a>
                        </div>

                    </form>
                </div>

                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="text">
                        <h2>Build Your Profile</h2>
                    </div>
                    <img src={{ asset('images/stairs.png') }} class="img-fluid" alt="Phone image"
                        style="height:500px; margin-left: 60px;">


                </div>
            </div>
        </div>
    </section>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    
    $(document).ready(function() {
        $('#form1Example123').on('input', function() {
            var email = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('checkEmail') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "email": email
                },
                success: function(response) {
                    console.log(response);
                    if (response.trim() === 'taken') {
                        $('#emailAvailability').html("Email is already taken.");
                        $('#emailAvailability1').html("");
                        $('#nextButton').prop('disabled', true);
                    } else {
                        $('#emailAvailability1').html("Email is available.");
                        $('#emailAvailability').html("");
                        $('#nextButton').prop('disabled', false);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr.responseText);
                }
            });
        });
        $('#form1Example1234').on('input', function() {
            var username = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('checkUsername') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "username": username
                },
                success: function(response) {
                    console.log(response);
                    if (response.trim() === 'taken') {
                        $('#usernameAvailability').html("Username is already taken.");
                        $('#usernameAvailability1').html("");
                        $('#nextButton').prop('disabled', true);
                    } else {
                        $('#usernameAvailability1').html("Username is available.");
                        $('#usernameAvailability').html("");
                        $('#nextButton').prop('disabled', false);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr.responseText);
                }
            });
        });
        $('#form1Example123').on('blur', function() {
        var email = $(this).val();
        var emailRegex = /^[a-z]+\.[a-z]+(?:[0-9]+)?@lau\.edu$/i; // Regular expression for LAU email
        if (!emailRegex.test(email)) {
            $('#emailFormatError').html("Wrong Email format");
            $('#emailAvailability').html("");
            $('#emailAvailability1').html("");
            $('#nextButton').prop('disabled', true);
        } else {
            $('#emailFormatError').html("");
            $('#nextButton').prop('disabled', false);
        }
    });
        $('#form1Example23', '#form1Example234').on('input', function() {
            let password = $('#form1Example23').val();
            let confirmPassword = $('#form1Example234').val();

            if (password !== confirmPassword) {
                $('#passwordMatchError').html("Passwords do not match");
                $('#nextButton').prop('disabled', true);
            } else {
                $('#passwordMatchError').html("");
                if ($('#emailAvailability').html() === "" && $('#usernameAvailability').html() === "") {
                    $('#nextButton').prop('disabled', false);
                }
            }
        });
    });
</script>





<script>
    document.addEventListener('DOMContentLoaded', function() {
        let passwordInput = document.getElementById('form1Example23');
        let confirmPasswordInput = document.getElementById('form1Example234');
        let passwordStrengthFeedback = document.getElementById('passwordStrengthFeedback');
        let passwordMatchError = document.getElementById('passwordMatchError');

        confirmPasswordInput.addEventListener('input', function() {
            let password = passwordInput.value;
            let confirmPassword = confirmPasswordInput.value;

            if (password !== confirmPassword) {
                passwordMatchError.innerText = "Passwords do not match";
            } else {
                passwordMatchError.innerText = "";
            }
        });

        passwordInput.addEventListener('input', function() {
            let password = passwordInput.value;
            let strength = calculatePasswordStrength(password);
            if (strength === 'weak') {
                passwordStrengthFeedback.innerText =
                    "Password must be at least 8 characters long, containing at least one uppercase letter, one number, and one special character.";
            } else {
                passwordStrengthFeedback.innerText = "";
            }
        });
    });

    function calculatePasswordStrength(password) {
        let hasUppercase = /[A-Z]/.test(password);
        let hasLowercase = /[a-z]/.test(password);
        let hasNumber = /\d/.test(password);
        let hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);

        if (password.length < 8 || !hasUppercase || !hasLowercase || !hasNumber || !hasSpecialChar) {
            return 'weak';
        } else {
            return 'strong';
        }
    }
</script>



</body>

</html>
