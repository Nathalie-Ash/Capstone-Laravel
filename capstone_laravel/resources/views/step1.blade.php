<x-stepLayout>

    <head>
        <title>Step 1</title>
    </head>
    <div>


        <div id="topNav" style="width: 80%;text-align: center;margin: auto;padding-top: 2%;">
            <p style="color:#FF6F28; font-size: 20px;text-align: left;">Step 1</p>
            <p id="textStyle"style="text-align: left;"> Help Us Find Your Match !</p>
        </div>

        <form method="POST" action="{{ route('step1') }}">
            @csrf
            <section id="steps" style="padding-top: 20px;padding-left: 30px">

                <div class="container text-center">
                    <div class="row">
                        <div class="col-md-4" style="padding-top:10px ">
                            <img class="animated-element" src={{ asset('images/image1.png') }}>

                            <div id="division1">
                                <h1 id="step-title">Which School Are You In?</h1>
                                <div class="dropdown" style="padding-top: 10px;">
                                    <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="background-color: #579792;border: none;">
                                        Select your School
                                    </button>
                                    <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                        id="dropdownItems">
                                    </ul>
                                    <input type="hidden" name="school" id="school">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="padding-top:15px ">
                            <img class="animated-element" src={{ asset('images/image1.png') }}>
                            <div id="division2" class="input">

                                <h1 id="step-title">What is Your Major ?</h1>
                                <input name="major" id="major" type="text">
                                <h1 id="step-title">Minor (if applicable)</h1>
                                <input name="minor" id="minor" type="text">
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-top:15px ">
                            <img class="animated-element" src="{{ asset('images/image1.png') }}">
                            <div id="division3">
                                <h1 id="step-title">Which Campus Are You In?</h1>
                                <div class="row" style="width: 100%;">
                                    <div class="col">
                                        <div class="form-check-reverse"
                                            style="width: 100%; text-align: left;padding-left: 30px">
                                            <input class="form-check-input" type="radio" name="campus"
                                                id="beirutCampus" value="Beirut" style="transform: scale(1.5);">
                                            <label class="form-check-label" for="beirutCampus"
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
                                            <input class="form-check-input" type="radio" name="campus"
                                                id="byblosCampus" value="Byblos" style="transform: scale(1.5);">
                                            <label class="form-check-label" for="byblosCampus"
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
                                            <input class="form-check-input" type="radio" name="campus"
                                                id="crossCampus" value="Cross" style="transform: scale(1.5);">
                                            <label class="form-check-label" for="crossCampus"
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
        <button type="submit" onclick ="goToNextPage()" class="btn"
            style="background-color:#FF6F28; width: 15%;border-right:30px;color:white;font-size: larger;margin-bottom: 20px;">NEXT</button>
    </div>

    </section>


    </form>


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
        document.addEventListener("DOMContentLoaded", function() {
            var schools = [
                "School of Architecture & Design",
                "School of Arts and Sciences",
                "Adnan Kassar School of Business",
                "School of Engineering",
                "Gilbert and Rose-Marie Chagoury School of Medicine",
                "Alice Ramez Chagoury School of Nursing",
                "School of Pharmacy"
            ];

            var dropdownMenu = document.getElementById("dropdownItems");

            dropdownMenu.addEventListener("click", function(event) {
                if (event.target && event.target.classList.contains("dropdown-item")) {
                    var selectedSchool = event.target.innerText;
                    document.getElementById('dropdownMenuButton').innerText =
                        selectedSchool;
                    document.getElementById('school').value =
                        selectedSchool;
                }
            });

            schools.forEach(function(school, index) {
                var listItem = document.createElement("li");
                listItem.innerHTML =
                    '<a class="dropdown-item" href="#" style="color:white;">' +
                    school + '</a>';

                dropdownMenu.appendChild(listItem);

                if (index < schools.length - 1) {
                    var divider = document.createElement("div");
                    divider.className = "dropdown-divider";
                    dropdownMenu.appendChild(divider);
                }
            });


            var campusRadios = document.querySelectorAll('input[name="campus"]');
            var campusInput = document.getElementById("campus_id");
            campusRadios.forEach(function(radio) {
                radio.addEventListener("change", function() {
                    if (this.checked) {
                        campusInput.value = this
                            .value;
                        console.log("Selected Campus ID:", campusInput
                            .value);
                    }
                });
            });

            populateStep1Fields();
        });

        function populateStep1Fields() {
            var step1Data = JSON.parse(localStorage.getItem('step1Data'));
            if (step1Data) {
                document.getElementById('school').value = step1Data.school;
                document.getElementById('major').value = step1Data.major;
                document.getElementById('minor').value = step1Data.minor;
                var campusRadios = document.querySelectorAll('input[name="campus"]');
                campusRadios.forEach(function(radio) {
                    if (radio.value === step1Data.campus) {
                        radio.checked = true;
                    }
                });
            }
        }


        function sendStep1Data() {
            var formData = {
                school: document.getElementById('school').value,
                major: document.getElementById('major').value,
                minor: document.getElementById('minor').value,
                campus: document.querySelector('input[name="campus"]:checked').value
            };
            fetch("{{ route('step1') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = "{{ route('step2') }}";
                    } else {
                        console.error('Failed to send Step 1 data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>

</x-stepLayout>
