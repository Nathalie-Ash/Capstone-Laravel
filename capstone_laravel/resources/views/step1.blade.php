<x-stepLayout> 
    <div>


        <div id="topNav" style="width: 80%;text-align: center;margin: auto;padding-top: 2%;">
            <p style="color:#FF6F28; font-size: 20px;text-align: left;">Step 1</p>
            <p id="textStyle"style="text-align: left;"> Help Us Find Your Match !</p>
        </div>

        <section id="steps" style="padding-top: 20px;padding-left: 30px">
            <!-- <div id="steps"> -->

            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <img class="animated-element" src={{ asset('images/image1.png') }}>
                        <!-- <div id="division1" >
                                <h1 id ="step-title">Which School Are You In?</h1>
                                <div class="dropdown" style="padding-top: 10px;">
                                    <button class="btn btn-secondary dropdown-toggle"  id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #579792;border: none;">
                                    Select your School
                                    </button>
                                    <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;" >
                                      <li><a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this)">School of Architecture & Design</a></li>
                                      <li><hr class="dropdown-divider"></li>
                                      <li><a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this)">School of Arts and Sciences</a></li>
                                      <li><hr class="dropdown-divider"></li>
                                      <li><a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this)">Adnan Kassar School of Business</a></li>
                                      <li><hr class="dropdown-divider"></li>
                                      <li><a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this)">School of Engineering</a></li>
                                      <li><hr class="dropdown-divider"></li>
                                      <li><a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this)">Gilbert and Rose-Marie Chagoury School of Medicine</a></li>
                                      <li><hr class="dropdown-divider"></li>
                                      <li><a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this)">Alice Ramez Chagoury School of Nursing</a></li>
                                      <li><hr class="dropdown-divider"></li>
                                      <li><a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this)">School of Pharmacy</a></li>
                                    </ul>
                                  </div>
                               
                            </div>-->
                        <div id="division1">
                            <h1 id="step-title">Which School Are You In?</h1>
                            <div class="dropdown" style="padding-top: 10px;">
                                <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select your School
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="dropdownItems">
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <img class="animated-element" src={{ asset('images/image1.png') }}>
                        <div id="division2" class="input">

                            <h1 id="step-title">What is Your Major ?</h1>
                            <input type="text">
                            <h1 id="step-title">Minor (if applicable)</h1>
                            <input type="text">
                        </div>
                    </div>
                    <div class="col">
                        <img class="animated-element" src={{ asset('images/image1.png') }}>
                        <div id="division3">
                            <h1 id="step-title">Which Campus Are You In?</h1>
                            <div class="row" style="width: 100%;">
                                <div class="col">
                                    <div class="form-check-reverse"
                                        style="width: 100%; text-align: left;padding-left: 30px">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1" style="transform: scale(1.5);">
                                        <label class="form-check-label" for="flexRadioDefault1"
                                            style="font-size:larger;font-weight:lighter ;">
                                            Beirut Campus
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="width: 100%;">
                                <div class="col">
                                    <div class="form-check-reverse"
                                        style="width: 100%; text-align: left;padding-left: 30px">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1" style="transform: scale(1.5);">
                                        <label class="form-check-label" for="flexRadioDefault1"
                                            style="font-size:larger; text-align:right;font-weight:lighter ;">
                                            Byblos Campus
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="width: 100%;">
                                <div class="col">
                                    <div class="form-check-reverse"
                                        style="width: 100%; text-align: left;padding-left: 30px">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault3" style="transform: scale(1.5);">
                                        <label class="form-check-label" for="flexRadioDefault3"
                                            style="font-size:larger; font-weight:lighter ;">
                                            Cross-Campus
                                        </label>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>


    </div>
    <div id="button-nav">
        <button type="button" onclick="goToNextPage()" class="btn"
            style="background-color:#FF6F28; width: 15%;border-right:30px;color:white;font-size: larger;">NEXT</button>
    </div>

    </section>


    </div>
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
        < script >
            function updateButtonText(selectedItem) {
                var buttonText = $(selectedItem).text();
                $('#dropdownMenuButton').text(buttonText);
            }

        function goToNextPage() {

            window.location.href = "step2.html";
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Array of items for the dropdown
            var schools = [
                "School of Architecture & Design",
                "School of Arts and Sciences",
                "Adnan Kassar School of Business",
                "School of Engineering",
                "Gilbert and Rose-Marie Chagoury School of Medicine",
                "Alice Ramez Chagoury School of Nursing",
                "School of Pharmacy"
            ];

            // Get the dropdown menu element
            var dropdownMenu = document.getElementById("dropdownItems");

            // Iterate over the array and create <li> elements
            schools.forEach(function(school) {
                var listItem = document.createElement("li");
                listItem.innerHTML =
                    '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this)">' +
                    school + '</a>' + '<li><hr class="dropdown-divider"></li>';
                dropdownMenu.appendChild(listItem);
            });
        });

        function updateButtonText(selectedItem) {
            var buttonText = selectedItem.innerText;
            document.getElementById('dropdownMenuButton').innerText = buttonText;
        }
    </script>

    </x-stepLayout> 