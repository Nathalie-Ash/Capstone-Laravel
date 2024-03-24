
<html>
    <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel ="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <script src ="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>  
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">   
    <title>Additional Information</title>
    <style>
        *{
        font-family: 'Poppins', sans-serif;
        font-weight: bold ;
    }
    .text{
        text-align: center;
        font-family: 'Poppins', sans-serif;
        font-weight: bold ;
    }
    .ui-datepicker {
        background-color: white;
    }
     /* Change the color of the numbers */
     .ui-datepicker-calendar td a {
        color: black; /* Change the color to black */
    }
    ::placeholder {
        color: white;
        font-weight: normal; /* Set the placeholder color to white */
    }
    /* Adjust the width of the datepicker */
    .ui-datepicker {
        width: 15%; /* Set the width to your desired value */
    }

    /* Remove the underline from the numbers */
    .ui-state-default {
        text-decoration: none;
    }
    .ui-datepicker-calendar td {
        width: calc(100% / 7); /* Set each date cell to take up equal width */
    }
    .ui-datepicker-prev, .ui-datepicker-next {
        color: black; /* Change the color of the buttons */
        text-decoration: none; /* Remove underline */
    }
    .dropdown .dropdown-menu .dropdown-item:hover {
        background-color: #c2c2c4 ;
    }
    </style>
    </head>
    <body>
        <section class="vh-100">
            <div class="container py-5 h-100">
              <div class="row d-flex align-items-center justify-content-center">
              <div class="text">
                  <h2>Few Questions Left!</h2>
              </div>
              <div class="col-md-8 col-lg-7 col-xl-3">
                <img src="../Assets/image4.png"
                  class="img-fluid" alt="Phone image" style="height: 500px">
            
        
              </div>
              
              <!-- <img class="animated-element" src="../Assets/image1.png" style="height:20px; width:20px"> -->
                <div class="col-md-7 col-lg-5 col-xl-6 offset-xl-1" style ="border-radius: 3%;background-color: #f7f5f5; padding: 3%">
                    <div id="date-picker-example" class="md-fofvrm md-outline input-with-post-icon datepicker" inline="true">
                        <label for="birthdate"><h1>When is your birthday?</h1></label>
                        <br>
                        <input placeholder = "Select your birthdate" type="text" id="birthdate" name="birthdate" class="txtfield" style="border-radius:5%;border:none ;background-color:#579792; color:white">
                        <br>
                    </div>
                <div class="col">
                        
                        <div id="division1">
                            <h1 id="step-title">What is your gender?</h1>
                            
                            <div class="dropdown" style="padding-top: 5px;">
                                <button class="btn btn-secondary dropdown-toggle" id="genderDropdownButton"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Gender
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="genderDropdownMenu">
                                </ul>
                            </div>
                           
                            

                        </div>
                    </div>
                    <div class="col">
                    
                            
                            <div id="division2">
                                
                                <h1 id="step-title">What is your sexual orientation?</h1>
                                <div class="dropdown" style="padding-top: 5px;">
                                    <button class="btn btn-secondary dropdown-toggle" id="orientationDropdownButton"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="background-color: #579792;border: none;">
                                        Select Option
                                    </button>
                                    <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                        id="orientationDropdownMenu">
                                    </ul>
                                </div>
                               
                                
    
                            </div>
                        </div>
                        <div style ="text-align: center;">
                  <button type= "submit" class="btn btn-primary btn-lg btn-block" style="border: none;background-color:#ff6f28;"><a href = "./step1.html" style="text-decoration:none; color:black" >SUBMIT</a></button>
                  </div>
                </div>
            
              </div>
            </div>
          </section>
    </body>
    <script src="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Datepicker
            $("#birthdate").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: 'c-100:c', // Allows selecting from 100 years ago to the current year
                dateFormat: 'yy-mm-dd' // Sets the date format to YYYY-MM-DD
            });
        });
        
        document.addEventListener("DOMContentLoaded", function () {
        
            // Array of gender options
            var genders = [
                "Male",
                "Female",
                "Other"
            ];
        
            // Get the dropdown menu element for gender
            var genderDropdownMenu = document.getElementById("genderDropdownMenu");
        
            // Iterate over the array and create <li> elements for the gender dropdown
            genders.forEach(function (gender) {
                var listItem = document.createElement("li");
                var divider = document.createElement("hr");
        
                listItem.innerHTML = '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'genderDropdownMenu\', \'genderDropdownButton\')">' + gender + '</a>';
        
                genderDropdownMenu.appendChild(listItem);
                genderDropdownMenu.appendChild(divider);
            });
        
            // Array of sexual orientation options
            var orientations = [
                "Heterosexual",
                "Homosexual",
                "Bisexual",
                "Pansexual",
                "Asexual"
            ];
        
            // Get the dropdown menu element for sexual orientation
            var orientationDropdownMenu = document.getElementById("orientationDropdownMenu");
        
            // Iterate over the array and create <li> elements for the orientation dropdown
            orientations.forEach(function (orientation) {
                var listItem = document.createElement("li");
                var divider = document.createElement("hr");
        
                listItem.innerHTML = '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'orientationDropdownMenu\', \'orientationDropdownButton\')">' + orientation + '</a>';
        
                orientationDropdownMenu.appendChild(listItem);
                orientationDropdownMenu.appendChild(divider);
            });
        });
        
        function updateButtonText(selectedItem, dropdownMenuId, dropdownButtonId) {
            var buttonText = $(selectedItem).text();
            var dropdownButton = document.getElementById(dropdownButtonId);
        
            // Update the button text
            dropdownButton.innerText = buttonText;
        }
        </script>
    
</body>
</html>