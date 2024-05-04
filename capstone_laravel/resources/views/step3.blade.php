<x-stepLayout>

    <div id="topNav" style="width: 80%;text-align: center;margin: auto;padding-top: 2%;">
        <p style="color:#FF6F28; font-size: 20px;text-align: left;">Step 3</p>
        <p id="textStyle" style="text-align: left;">Almost There!</p>
    </div>

    <form id="step3Form" method="POST" action="{{ route('step3') }}">
        @csrf
        <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
            <div class="container text-center" style="flex: 1;">
                <div class="row">
                    <div class="col-md-4">
                        <img class="animated-element" src={{ asset('images/image1.png') }}>
                        <div id="division1">
                            <h1 id="step-title">What are your top 3 music genres?</h1>
                            <div class="dropdown" style="padding-top: 5px;">
                                <button class="btn btn-secondary dropdown-toggle" id="musicDropdownMenuButton1"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Genre 1
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none; max-height: 150px; overflow-y: auto;"
                                    id="musicItem1">
                                </ul>
                                <input type="hidden" id="musicItem1Hidden" name="musicItem1">
                            </div>
                            <div class="dropdown" style="padding-top: 10px;">
                                <button class="btn btn-secondary dropdown-toggle" id="musicDropdownMenuButton2"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Genre 2
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none; max-height: 150px; overflow-y: auto;"
                                    id="musicItem2">
                                </ul>
                                <input type="hidden" id="musicItem2Hidden" name="musicItem2">
                            </div>
                            <div class="dropdown" style="padding-top: 10px;">
                                <button class="btn btn-secondary dropdown-toggle" id="musicDropdownMenuButton3"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Genre 3
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none; max-height: 150px; overflow-y: auto;"
                                    id="musicItem3">
                                </ul>
                                <input type="hidden" id="musicItem3Hidden" name="musicItem3">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="animated-element" src={{ asset('images/image1.png') }}>
                        <div id="division2" class="input">
                            <h1 id="step-title">What are your top 3 movies/series genres?</h1>
                            <div class="dropdown" style="padding-top: 5px;">
                                <button class="btn btn-secondary dropdown-toggle" id="movieDropdownMenuButton1"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Movie 1
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none; max-height: 150px; overflow-y: auto;"
                                    id="movieItem1">
                                </ul>
                                <input type="hidden" id="movieItem1Hidden" name="movieItem1">
                            </div>
                            <div class="dropdown" style="padding-top: 10px;">
                                <button class="btn btn-secondary dropdown-toggle" id="movieDropdownMenuButton2"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Movie 2
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none; max-height: 150px; overflow-y: auto;"
                                    id="movieItem2">
                                </ul>
                                <input type="hidden" id="movieItem2Hidden" name="movieItem2">
                            </div>
                            <div class="dropdown" style="padding-top: 10px;">
                                <button class="btn btn-secondary dropdown-toggle" id="movieDropdownMenuButton3"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Movie 3
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none; max-height: 150px; overflow-y: auto;"
                                    id="movieItem3">
                                </ul>
                                <input type="hidden" id="movieItem3Hidden" name="movieItem3">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="animated-element" src={{ asset('images/image1.png') }}>
                        <div id="division1" style="height: 85%;">
                            <h1 id="step-title" style="padding-bottom: 20px">Tell Us More About You</h1>
                            <div class="row " style="height: 80%;max-height: min-content;justify-content: center; ">
                                <textarea id="description" name="description"
                                    style="margin-bottom: 15px; min-height:65% ;vertical-align: top;text-align:top;font-weight:lighter; border-radius: 5px;color: white;width: 100%; max-width: 100%;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="button-nav">
                <button type="submit" onclick="goToNextPage(event)"
                    class="btn" style="background-color:#FF6F28; width: 15%;border-right:30px;color:white;font-size: larger;">NEXT</button>
            </div>
        </section>
    </form>
</x-stepLayout>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        var musicGenres = [
            "Rap",
            "Metal",
            "Pop",
            "Arabic",
            "Rock",
            "Country",
            "Classical",
            "R&B",
            "Punk",
            "Alternative",
            "Classical",
            "Indie"
        ];

        var musicDropdownMenu1 = document.getElementById("musicItem1");
        var musicDropdownMenu2 = document.getElementById("musicItem2");
        var musicDropdownMenu3 = document.getElementById("musicItem3");

        musicGenres.forEach(function(music) {
            var listItem1 = document.createElement("li");
            var listItem2 = document.createElement("li");
            var listItem3 = document.createElement("li");

            var divider1 = document.createElement("hr");
            var divider2 = document.createElement("hr");
            var divider3 = document.createElement("hr");


            listItem1.innerHTML =
                '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'musicItem1\', \'musicDropdownMenuButton1\')">' +
                music + '</a>';
            listItem2.innerHTML =
                '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'musicItem2\', \'musicDropdownMenuButton2\')">' +
                music + '</a>';
            listItem3.innerHTML =
                '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'musicItem3\', \'musicDropdownMenuButton3\')">' +
                music + '</a>';


            musicDropdownMenu1.appendChild(listItem1);
            if (music != "Indie") {
                musicDropdownMenu1.appendChild(divider1);
            }

            musicDropdownMenu2.appendChild(listItem2);
            if (music != "Indie") {
                musicDropdownMenu2.appendChild(divider2);
            }

            musicDropdownMenu3.appendChild(listItem3);
            if (music != "Indie") {
                musicDropdownMenu3.appendChild(divider3);
            }
        });


        var movies = [
            "Comedy",
            "Romance",
            "Sci-Fi",
            "Horror",
            "Thriller",
            "Mystery",
            "Fantasy",
            "Animation",
            "Historical",
            "Romance",
            "Musical",
            "Sports",
            "Documentary"
        ];
        var movieDropdownMenu1 = document.getElementById("movieItem1");
        var movieDropdownMenu2 = document.getElementById("movieItem2");
        var movieDropdownMenu3 = document.getElementById("movieItem3");


        movies.forEach(function(movie) {
            var listItem1 = document.createElement("li");
            var listItem2 = document.createElement("li");
            var listItem3 = document.createElement("li");

            var divider1 = document.createElement("hr");
            var divider2 = document.createElement("hr");
            var divider3 = document.createElement("hr");

            listItem1.innerHTML =
                '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'movieItem1\', \'movieDropdownMenuButton1\')">' +
                movie + '</a>';
            listItem2.innerHTML =
                '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'movieItem2\', \'movieDropdownMenuButton2\')">' +
                movie + '</a>';
            listItem3.innerHTML =
                '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'movieItem3\', \'movieDropdownMenuButton3\')">' +
                movie + '</a>';


            movieDropdownMenu1.appendChild(listItem1);
            if (movie != "Documentary") {
                movieDropdownMenu1.appendChild(divider1);
            }

            movieDropdownMenu2.appendChild(listItem2);
            if (movie != "Documentary") {
                movieDropdownMenu2.appendChild(divider2);
            }

            movieDropdownMenu3.appendChild(listItem3);
            if (movie != "Documentary") {
                movieDropdownMenu3.appendChild(divider3);
            }

        });

        function updateHiddenInput(selectedItem, hiddenInputId) {
            var selectedValue = selectedItem.textContent.trim();
            document.getElementById(hiddenInputId).value = selectedValue;
        }
        var selectedItems = [];

        function updateDropdowns(selectedActivity, currentDropdownId) {
            var allDropdowns = document.querySelectorAll(".dropdown-menu");


            selectedItems = selectedItems.filter(item => item.dropdownId !== currentDropdownId);

            if (selectedItems.some(item => item.value === selectedActivity && item.dropdownId !==
                    currentDropdownId)) {
                selectedItems = selectedItems.filter(item => item.value !== selectedActivity);
            } else {
                selectedItems.push({
                    value: selectedActivity,
                    dropdownId: currentDropdownId
                });
            }

            allDropdowns.forEach(function(dropdown) {
                for (var i = 0; i < dropdown.children.length; i++) {
                    var listItem = dropdown.children[i];
                    if (selectedItems.some(item => item.value === listItem.textContent.trim() && item
                            .dropdownId !== dropdown.id)) {
                        listItem.style.opacity = '0.5';
                        listItem.style.pointerEvents = 'none';
                        listItem.style.cursor = 'not-allowed';
                    } else {
                        listItem.style.opacity = '1';
                        listItem.style.pointerEvents = 'auto';
                        listItem.style.cursor = 'pointer';
                    }
                }
            });

        }


        function handleDropdownItemClick(event, dropdownMenuId, hiddenInputId) {
            var selectedItem = event.target;
            var currentDropdownId = dropdownMenuId.substring(8);
            updateHiddenInput(selectedItem, hiddenInputId);
            var selectedActivity = selectedItem.textContent.trim();
            updateDropdowns(selectedActivity, currentDropdownId);
        }

        function addEventListenersToDropdowns() {
            var dropdownMenus = document.querySelectorAll(".dropdown-menu");
            dropdownMenus.forEach(function(dropdownMenu) {
                dropdownMenu.addEventListener("click", function(event) {
                    var dropdownMenuId = dropdownMenu.id;
                    var hiddenInputId = dropdownMenuId + "Hidden";
                    handleDropdownItemClick(event, dropdownMenuId, hiddenInputId);
                });
            });
        }

        addEventListenersToDropdowns();

    });


    function updateButtonText(selectedItem, dropdownMenuId, dropdownButtonId) {
        var buttonText = $(selectedItem).text();
        var dropdownMenu = document.getElementById(dropdownMenuId);
        var dropdownButton = document.getElementById(dropdownButtonId);

        dropdownButton.innerText = buttonText;
    }
</script>

<script>
    function storeStep3Data() {
        var formData = {
            musicItem1: document.getElementById('musicItem1Hidden').value,
            musicItem2: document.getElementById('musicItem2Hidden').value,
            musicItem3: document.getElementById('musicItem3Hidden').value,
            movieItem1: document.getElementById('movieItem1Hidden').value,
            movieItem2: document.getElementById('movieItem2Hidden').value,
            movieItem3: document.getElementById('movieItem3Hidden').value,
            description: document.getElementById('description').value
        };
        localStorage.setItem('step3Data', JSON.stringify(formData));
    }

    function validateStep3() {
        var musicItem1 = document.getElementById('musicItem1Hidden').value;
        var musicItem2 = document.getElementById('musicItem2Hidden').value;
        var musicItem3 = document.getElementById('musicItem3Hidden').value;
        var movieItem1 = document.getElementById('movieItem1Hidden').value;
        var movieItem2 = document.getElementById('movieItem2Hidden').value;
        var movieItem3 = document.getElementById('movieItem3Hidden').value;

        if (!musicItem1 || !musicItem2 || !musicItem3 || !movieItem1 || !movieItem2 || !movieItem3) {
            $('#myModal').modal('show');
            return false;
        } else {
            return true;
        }
    }

    function goToNextPage(event) {
        event.preventDefault(); // Prevent form submission and page refresh

        // Validate Step 3
        var isValid = validateStep3();
        if (isValid) {
            // Store Step 3 data before navigating to the next step
            storeStep3Data();
            // Submit the form
            document.getElementById("step3Form").submit();
        }
    }

    $(document).ready(function() {
        $('#cancelButton').click(function() {
            $('#myModal').modal('hide');
        });
    });
</script>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Please select all options before moving to the next step.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelButton" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
