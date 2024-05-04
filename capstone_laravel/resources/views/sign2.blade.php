<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Additional Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"
        integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous">
    </script>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .input-group input::placeholder {
            color: white;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #cccccc;
            color: #000000;
        }

        .datepicker-dropdown {
            z-index: 1051 !important;
        }

        .input-group {
            width: max-content;
            border-radius: 5%;
        }

        .form-control {
            background-color: #579792;
        }

        .date-selected .form-control {
            background-color: #579792;
        }

        .dropdown .dropdown-menu .dropdown-item:hover {
            background-color: #c2c2c4;
        }

        .dropdown-menu.scrollable {
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="text">
                    <h2>Set Up Your Profile</h2>
                </div>
                <div class="col-md-8 col-lg-7 col-xl-3">
                    <img src="images/image4.png" class="img-fluid" alt="Phone image" style="height: 500px">
                </div>

                <div class="col-md-7 col-lg-5 col-xl-6 offset-xl-1"
                    style="border-radius: 3%;background-color: #f7f5f5; padding: 3%">
                    <form action="/sign2" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="birthdate">
                                <h3>When is your birthday?</h3>
                            </label>
                            <div class="input-group">
                                <input placeholder="Select your birthdate" type="text" id="birthdate"
                                    name="birthdate" class="form-control" style="color: white;">
                                <span class="input-group-text">
                                    <i class="fas fa-calendar" style="color: #579792;"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col">
                            <div id="division1" style="padding-top: 2%;">
                                <h3 id="step-title">What is your gender?</h3>
                                <!-- Gender Dropdown -->
                                <div class="dropdown" style="padding-top: 5px;">
                                    <button class="btn btn-secondary dropdown-toggle" id="genderDropdownButton"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="background-color: #579792;border: none;">
                                        Select Gender
                                    </button>
                                    <br>
                                    <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                        id="genderDropdownMenu">
                                    </ul>
                                    <input type="hidden" name="gender" id="gender">
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div id="division2" style="padding-top: 2%;">
                                <h3 id="step-title">What is your sexual orientation?</h3>
                                <div class="dropdown" style="padding-top: 5px;">
                                    <button class="btn btn-secondary dropdown-toggle" id="orientationDropdownButton"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="background-color: #579792;border: none;">
                                        Select Option
                                    </button>
                                    <ul class="dropdown-menu scrollable"
                                        style="background-color: #579792;width: 90%;border: none;"
                                        id="orientationDropdownMenu">
                                    </ul>
                                    <input type="hidden" name="sexualorientation" id="sexualorientation">
                                </div>
                            </div>
                        </div>

                        <div style="text-align: center;">
                            <form action="{{ route('verification.send') }}" method="POST">
                                @csrf
                                <input type="hidden" name="email" value="{{ $signupEmail }}">

                                <button type="submit" class="btn btn-primary btn-lg btn-block"
                                    style="border: none;background-color:#ff6f28; color:black">SUBMIT</button>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#birthdate").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: 'c-100:c',
                dateFormat: 'yy-mm-dd',
                orientation: 'bottom'
            });
        });
    </script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var genders = [
            "Male",
            "Female",
            "Prefer Not To Say",
        ];

        // Get the dropdown menu element for gender
        var genderDropdownMenu = document.getElementById("genderDropdownMenu");
        // Add click event listener to dropdown items
        genderDropdownMenu.addEventListener("click", function(event) {
            if (event.target && event.target.classList.contains("dropdown-item")) {
                var selectedgender = event.target.innerText;
                document.getElementById('genderDropdownButton').innerText =
                    selectedgender; // Update dropdown button text
                document.getElementById('gender').value =
                    selectedgender; // Set the selected school name to the hidden input field
            }
        });
        // Iterate over the array and create <li> elements for the gender dropdown
        genders.forEach(function(gender) {
            var listItem = document.createElement("li");
            var divider = document.createElement("hr");

            listItem.innerHTML =
                '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'genderDropdownMenu\', \'genderDropdownButton\')">' +
                gender + '</a>';

            genderDropdownMenu.appendChild(listItem);
            if (gender != "Prefer Not To Say") {
                genderDropdownMenu.appendChild(divider);
            }
        });

        // Array of sexual orientation options
        var orientations = [
            "Heterosexual",
            "Homosexual",
            "Bisexual",
            "Pansexual",
            "Asexual",
            "Other",
            "Prefer Not To Specify"
        ];

        // Get the dropdown menu element for sexual orientation
        var orientationDropdownMenu = document.getElementById("orientationDropdownMenu");

        // Add click event listener to dropdown items
        orientationDropdownMenu.addEventListener("click", function(event) {
            if (event.target && event.target.classList.contains("dropdown-item")) {
                var selectedorient = event.target.innerText;
                document.getElementById('orientationDropdownButton').innerText =
                    selectedorient; // Update dropdown button text
                document.getElementById('sexualorientation').value =
                    selectedorient; // Set the selected school name to the hidden input field
            }
        });
        // Iterate over the array and create <li> elements for the orientation dropdown
        orientations.forEach(function(orientation) {
            var listItem = document.createElement("li");
            var divider = document.createElement("hr");

            listItem.innerHTML =
                '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'orientationDropdownMenu\', \'orientationDropdownButton\')">' +
                orientation + '</a>';

            orientationDropdownMenu.appendChild(listItem);
            if (orientation != "Prefer Not To Specify") {
                orientationDropdownMenu.appendChild(divider);
            }
        });
    });

    function updateButtonText(selectedItem, dropdownMenuId, dropdownButtonId) {
        var buttonText = $(selectedItem).text();
        var dropdownButton = document.getElementById(dropdownButtonId);

        // Update the button text
        dropdownButton.innerText = buttonText;
    }
</script>

</html>
