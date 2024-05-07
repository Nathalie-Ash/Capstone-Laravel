<x-menuLayout>

    <head>
        <link rel="stylesheet" href="/styleN.css">
        <title>Profile </title>
        <style>
            input[type="text"] {
                color: black;
            }

         
        </style>



    </head>

    <div id="topNav" style="width: 80%;text-align: center;margin: auto;">
        <span style="font-size: 35px;padding-top: 20px;margin-top: 10px;"> <i class="fas fa-star fa-lg md-3"
                style="font-size: 50px; color: #8971f6;text-align: start;vertical-align: sub;"></i>
            Personal Information</span>
        <div style="display:inline;float: right;text-align: right;margin-top: 10px;width: 50%;">
            <button type="button" id="editButton" class="btn"
                style="background-color:#FF6F28; width: 20%;border-right:30px;color:white;font-size: larger; margin-left: 30px;min-width: max-content">Edit</button>

            <button type="button" id="saveButton" class="btn btn-secondary"
                style=" width: 20%;color:white;font-size: larger;min-width: max-content">Save</button>

        </div>


    </div>

    <section id="steps"
        style="padding-top:20px;padding-left: 30px;display: flex; flex-direction: column; color: black;">
        <div class="container text-center">

            <div class="container text-center" style="width: 100%;">
                <div class="row" style="padding-top: 20px;">

                    <div class="col-md-6" style="padding-top: 20px;">
                        <div id="division1" style="height: 100%;">
                            <p id="step-title" style="padding-top: 0px;">Info</p>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="text-align: left">School</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="school"
                                        value="{{ $userData->school }}" style="background-color: #c2c2c2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="text-align: left">Major</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="major"
                                        value="{{ $userData->major }}" style="background-color: #c2c2c2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="text-align: left">Minor</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="minor"
                                        value="{{ $userData->minor }}" style="background-color: #c2c2c2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label" style="width: min-content">Campus</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="campus" value="{{ $userData->campus }}" style="background-color: #c2c2c2;">
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-6" style="padding-top: 20px;">
                        <div id="division1" style="height: 302px">
                            <p id="step-title" style="padding-top: 0px;">Bio</p>
                            <div class="row description-container" style="height: 90%; max-height: min-content; justify-content: center;">
                                <textarea readonly id="description" class="description-text"
                                    style="background-color: #c2c2c2; text-align: top; border-bottom: 5px; width: 90%; height: 80%; margin-bottom: 3px;font-weight: normal; border-radius: 5%; border: none;">{{ $userData->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    
                    


                </div>
                <div class ="row" style="padding-top: 20px;">


                    <div class="col-md-6" style="padding-top: 20px;">
                        <div id="division1" style="height: 100%;">
                            <p id="step-title" style="padding-top: 0px;">Outdoor Activites</p>
                            <div class="mb-3 row" style="margin-top: 10px;">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Activity 1</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="outdoorItem1"
                                        value="{{ $userData->outdoorItem1 }}" style="background-color: #c2c2c2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Activity 2</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="outdoorItem2"
                                        value="{{ $userData->outdoorItem2 }}" style="background-color: #c2c2c2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Activity 3</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="outdoorItem3"
                                        value="{{ $userData->outdoorItem3 }}" style="background-color: #c2c2c2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" style="padding-top: 20px;">
                        <div id="division1" style="height: 100%;">
                            <p id="step-title" style="padding-top: 0px;">Indoor Activities</p>
                            <div class="mb-3 row" style="margin-top: 10px;">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Activity 1</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="indoorItem1"
                                        value="{{ $userData->indoorItem1 }}" style="background-color: #c2c2c2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Activity 2</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="indoorItem2"
                                        value="{{ $userData->indoorItem2 }}" style="background-color: #c2c2c2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Activity 3</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="indoorItem3"
                                        value="{{ $userData->indoorItem3 }}" style="background-color: #c2c2c2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "row" style="padding-top: 20px;">

                    <div class="col-md-6" style="padding-top: 20px;">
                        <div id="division1" style="height: 100%;">
                            <p id="step-title" style="padding-top: 0px;">Movies/Series Genre</p>
                            <div class="mb-3 row" style="margin-top: 10px;">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre
                                    1</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="movieItem1"
                                        value="{{ $userData->movieItem1 }}" style="background-color: #c2c2c2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre
                                    2</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="movieItem2"
                                        value="{{ $userData->movieItem2 }}" style="background-color: #c2c2c2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre
                                    3</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="movieItem3"
                                        value="{{ $userData->movieItem3 }}" style="background-color: #c2c2c2">

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6" style="padding-top: 20px;">
                        <div id="division1" style="height: 100%;">
                            <p id="step-title" style="padding-top: 0px;">Music Genre</p>

                            <div class="mb-3 row" style="margin-top: 10px;">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre
                                    1</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="musicItem1"
                                        value="{{ $userData->musicItem1 }}" style="background-color: #c2c2c2">

                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre
                                    2</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="musicItem2"
                                        value="{{ $userData->musicItem2 }}" style="background-color: #c2c2c2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre
                                    3</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="musicItem3"
                                        value="{{ $userData->musicItem3 }}" style="background-color: #c2c2c2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        </div>



    </section>


    </div>
    <footer class="fixed-bottom text-center small text-muted py-2"
        style="position: static; bottom: 0; left: 0; width: 100%; z-index: 1; margin-top: 20px;">
        <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">Friends</a>. All rights
            reserved.
        </p>
    </footer>
    <script>
        function goToNextPage() {

            window.location.href = "profile2";
        }
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById("editButton").addEventListener("click", function() {

                enableFormFields();
                changeTextBackground();
            });


            document.getElementById("saveButton").addEventListener("click", function() {

                var updatedData = {
                    school: document.getElementById("school").value,
                    major: document.getElementById("major").value,
                    minor: document.getElementById("minor").value,
                    campus: document.getElementById("campus").value,
                    description: document.getElementById("description").value,
                    outdoorItem1: document.getElementById("outdoorItem1").value,
                    outdoorItem2: document.getElementById("outdoorItem2").value,
                    outdoorItem3: document.getElementById("outdoorItem3").value,
                    indoorItem1: document.getElementById("indoorItem1").value,
                    indoorItem2: document.getElementById("indoorItem2").value,
                    indoorItem3: document.getElementById("indoorItem3").value,
                    musicItem1: document.getElementById("musicItem1").value,
                    musicItem2: document.getElementById("musicItem2").value,
                    musicItem3: document.getElementById("musicItem3").value,
                    movieItem1: document.getElementById("movieItem1").value,
                    movieItem2: document.getElementById("movieItem2").value,
                    movieItem3: document.getElementById("movieItem3").value
                };

                saveUserData(updatedData);
            });
        });


        function enableFormFields() {


            document.getElementById("school").removeAttribute("readonly");
            document.getElementById("major").removeAttribute("readonly");
            document.getElementById("minor").removeAttribute("readonly");
            document.getElementById("campus").removeAttribute("readonly");
            document.getElementById("description").removeAttribute("readonly");
            document.getElementById("outdoorItem1").removeAttribute("readonly");
            document.getElementById("outdoorItem2").removeAttribute("readonly");
            document.getElementById("outdoorItem3").removeAttribute("readonly");
            document.getElementById("indoorItem1").removeAttribute("readonly");
            document.getElementById("indoorItem2").removeAttribute("readonly");
            document.getElementById("indoorItem3").removeAttribute("readonly");
            document.getElementById("musicItem1").removeAttribute("readonly");
            document.getElementById("musicItem2").removeAttribute("readonly");
            document.getElementById("musicItem3").removeAttribute("readonly");
            document.getElementById("movieItem1").removeAttribute("readonly");
            document.getElementById("movieItem2").removeAttribute("readonly");
            document.getElementById("movieItem3").removeAttribute("readonly");
        }


        function saveUserData(data) {

            fetch("{{ route('saveUserData') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (response.ok) {

                        resetTextBackground();
                        window.location.href = "profile1";
                    } else {
                        alert("Failed to save user data.");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("An error occurred while saving user data.");
                });
        }


        function changeTextBackground() {
            document.getElementById("school").style.backgroundColor = "#579792";
            document.getElementById("major").style.backgroundColor = "#579792";
            document.getElementById("minor").style.backgroundColor = "#579792";
            document.getElementById("campus").style.backgroundColor = "#579792";
            document.getElementById("description").style.backgroundColor = "#579792";
            document.getElementById("outdoorItem1").style.backgroundColor = "#579792";
            document.getElementById("outdoorItem2").style.backgroundColor = "#579792";
            document.getElementById("outdoorItem3").style.backgroundColor = "#579792";
            document.getElementById("indoorItem1").style.backgroundColor = "#579792";
            document.getElementById("indoorItem2").style.backgroundColor = "#579792";
            document.getElementById("indoorItem3").style.backgroundColor = "#579792";
            document.getElementById("musicItem1").style.backgroundColor = "#579792";
            document.getElementById("musicItem2").style.backgroundColor = "#579792";
            document.getElementById("musicItem3").style.backgroundColor = "#579792";
            document.getElementById("movieItem1").style.backgroundColor = "#579792";
            document.getElementById("movieItem2").style.backgroundColor = "#579792";
            document.getElementById("movieItem3").style.backgroundColor = "#579792";
        }



        function resetTextBackground() {
            document.getElementById("school").style.backgroundColor = "#c2c2c2";
            document.getElementById("major").style.backgroundColor = "#c2c2c2";
            document.getElementById("minor").style.backgroundColor = "#c2c2c2";
            document.getElementById("campus").style.backgroundColor = "#c2c2c2";
            document.getElementById("description").style.backgroundColor = "#c2c2c2";
            document.getElementById("outdoorItem1").style.backgroundColor = "#c2c2c2";
            document.getElementById("outdoorItem2").style.backgroundColor = "#c2c2c2";
            document.getElementById("outdoorItem3").style.backgroundColor = "#c2c2c2";
            document.getElementById("indoorItem1").style.backgroundColor = "#c2c2c2";
            document.getElementById("indoorItem2").style.backgroundColor = "#c2c2c2";
            document.getElementById("indoorItem3").style.backgroundColor = "#c2c2c2";
            document.getElementById("musicItem1").style.backgroundColor = "#c2c2c2";
            document.getElementById("musicItem2").style.backgroundColor = "#c2c2c2";
            document.getElementById("musicItem3").style.backgroundColor = "#c2c2c2";
            document.getElementById("movieItem1").style.backgroundColor = "#c2c2c2";
            document.getElementById("movieItem2").style.backgroundColor = "#c2c2c2";
            document.getElementById("movieItem3").style.backgroundColor = "#c2c2c2";
        }
    </script>

</x-menuLayout>
