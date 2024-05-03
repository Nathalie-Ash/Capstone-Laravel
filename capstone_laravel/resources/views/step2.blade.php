
<x-stepLayout>

    <div id="topNav" style="width: 80%;text-align: center;margin: auto;padding-top: 2%;">
        <p style="color:#FF6F28; font-size: 20px;text-align: left;">Step 2</p>
        <p id="textStyle"style="text-align: left;">Tell Us More About You!</p>


    </div>
    <form id="step2Form" method="POST" action="{{ route('step2') }}">


        @csrf


        <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">

            <div class="container text-center" style="flex: 1;">

                <div class="row">
                    <div class="col-md-4">

                        <div>
                            <img src={{ asset('images/friends_picture.png') }} style="height: 350px;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="animated-element" src={{ asset('images/image1.png') }}>
                        <div id="division1">
                            <h1 id="step-title">Pick 3 Outdoor Activities You Enjoy</h1>
                            <div class="dropdown" style="padding-top: 5px;">
                                <button class="btn btn-secondary dropdown-toggle" id="outdoorDropdownMenuButton1"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Activity 1
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="outdoorItem1" name="outdoorItem1">
                                </ul>
                                <input type="hidden" id="outdoorItem1Hidden" name="outdoorItem1">

                            </div>
                            <div class="dropdown" style="padding-top: 10px;">
                                <button class="btn btn-secondary dropdown-toggle" id="outdoorDropdownMenuButton2"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Activity 2
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="outdoorItem2" name="outdoorItem2">
                                </ul>
                                <input type="hidden" id="outdoorItem2Hidden" name="outdoorItem2">

                            </div>
                            <div class="dropdown" style="padding-top: 10px;">
                                <button class="btn btn-secondary dropdown-toggle" id="outdoorDropdownMenuButton3"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Activity 3
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="outdoorItem3" name="outdoorItem3">
                                </ul>
                                <input type="hidden" id="outdoorItem3Hidden" name="outdoorItem3">

                            </div>


                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="animated-element" src={{ asset('images/image1.png') }}>
                        <div id="division2" class="input">

                            <h1 id="step-title">Pick 3 Indoor Activities You Enjoy</h1>
                            <div class="dropdown" style="padding-top: 5px;">
                                <button class="btn btn-secondary dropdown-toggle" id="indoorDropdownMenuButton1"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Activity 1
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="indoorItem1">
                                </ul>
                                <input type="hidden" id="indoorItem1Hidden" name="indoorItem1">

                            </div>
                            <div class="dropdown" style="padding-top: 10px;">
                                <button class="btn btn-secondary dropdown-toggle" id="indoorDropdownMenuButton2"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Activity 2
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="indoorItem2">
                                </ul>
                                <input type="hidden" id="indoorItem2Hidden" name="indoorItem2">

                            </div>
                            <div class="dropdown" style="padding-top: 10px;">
                                <button class="btn btn-secondary dropdown-toggle" id="indoorDropdownMenuButton3"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Activity 3
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="indoorItem3">

                                </ul>
                                <input type="hidden" id="indoorItem3Hidden" name="indoorItem3">

                            </div>
                        </div>
                    </div>


                </div>
            </div>


            </div>
            <div id="button-nav">
                <button type="submit" onclick="goToNextPage(event)" class="btn" style="background-color:#FF6F28; width: 15%;border-right:30px;color:white;font-size: larger;">NEXT</button>

                {{-- <button type="submit" onclick="goToNextPage()" class="btn"
                    style="background-color:#FF6F28; width: 15%;border-right:30px;color:white;font-size: larger;">NEXT</button> --}}
            </div>

        </section>
        <script>
            function storeStep2Data() {
                var formData = {
                    outdoorItem1: document.getElementById('outdoorItem1Hidden').value,
                    outdoorItem2: document.getElementById('outdoorItem2Hidden').value,
                    outdoorItem3: document.getElementById('outdoorItem3Hidden').value,
                    indoorItem1: document.getElementById('indoorItem1Hidden').value,
                    indoorItem2: document.getElementById('indoorItem2Hidden').value,
                    indoorItem3: document.getElementById('indoorItem3Hidden').value,
                };
                localStorage.setItem('step2Data', JSON.stringify(formData));
            }
        </script>


    </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            var outdoorActivities = [
                "Running",
                "Swimming",
                "Basketball",
                "Ziplining",
                "Football"
            ];

            var outdoorDropdownMenu1 = document.getElementById("outdoorItem1");
            var outdoorDropdownMenu2 = document.getElementById("outdoorItem2");
            var outdoorDropdownMenu3 = document.getElementById("outdoorItem3");

            outdoorActivities.forEach(function(outdoorActivity) {
                var listItem1 = document.createElement("li");
                var listItem2 = document.createElement("li");
                var listItem3 = document.createElement("li");

                var divider1 = document.createElement("hr");
                var divider2 = document.createElement("hr");
                var divider3 = document.createElement("hr");

                listItem1.innerHTML =
                    '<a class="dropdown-item" style="color:white;" onclick="updateButtonText(this, \'outdoorItem1\', \'outdoorDropdownMenuButton1\')">' +
                    outdoorActivity + '</a>';
                listItem2.innerHTML =
                    '<a class="dropdown-item"  style="color:white;" onclick="updateButtonText(this, \'outdoorItem2\', \'outdoorDropdownMenuButton2\')">' +
                    outdoorActivity + '</a>';
                listItem3.innerHTML =
                    '<a class="dropdown-item" style="color:white;" onclick="updateButtonText(this, \'outdoorItem3\', \'outdoorDropdownMenuButton3\')">' +
                    outdoorActivity + '</a>';

                outdoorDropdownMenu1.appendChild(listItem1);
                if (outdoorActivity != "Football") {
                    outdoorDropdownMenu1.appendChild(divider1);
                }

                outdoorDropdownMenu2.appendChild(listItem2);
                if (outdoorActivity != "Football") {
                    outdoorDropdownMenu2.appendChild(divider2);
                }

                outdoorDropdownMenu3.appendChild(listItem3);
                if (outdoorActivity != "Football") {
                    outdoorDropdownMenu3.appendChild(divider3);
                }
            });

            var indoorActivities = [
                "Reading",
                "Writing",
                "Waching TV",
                "Drawing",
                "Meditating"
            ];

            var indoorDropdownMenu1 = document.getElementById("indoorItem1");
            var indoorDropdownMenu2 = document.getElementById("indoorItem2");
            var indoorDropdownMenu3 = document.getElementById("indoorItem3");

            indoorActivities.forEach(function(indoorActivity) {
                var listItem1 = document.createElement("li");
                var listItem2 = document.createElement("li");
                var listItem3 = document.createElement("li");

                var divider1 = document.createElement("hr");
                var divider2 = document.createElement("hr");
                var divider3 = document.createElement("hr");

                listItem1.innerHTML =
                    '<a class="dropdown-item" style="color:white;" onclick="updateButtonText(this, \'indoorItem1\', \'indoorDropdownMenuButton1\')">' +
                    indoorActivity + '</a>';
                listItem2.innerHTML =
                    '<a class="dropdown-item" style="color:white;" onclick="updateButtonText(this, \'indoorItem2\', \'indoorDropdownMenuButton2\')">' +
                    indoorActivity + '</a>';
                listItem3.innerHTML =
                    '<a class="dropdown-item" style="color:white;" onclick="updateButtonText(this, \'indoorItem3\', \'indoorDropdownMenuButton3\')">' +
                    indoorActivity + '</a>';


                indoorDropdownMenu1.appendChild(listItem1);
                if (indoorActivity != "Meditating") {
                    indoorDropdownMenu1.appendChild(divider1);
                }

                indoorDropdownMenu2.appendChild(listItem2);
                if (indoorActivity != "Meditating") {
                    indoorDropdownMenu2.appendChild(divider2);
                }

                indoorDropdownMenu3.appendChild(listItem3);
                if (indoorActivity != "Meditating") {
                    indoorDropdownMenu3.appendChild(divider3);
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

                console.log(selectedItems);
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
            populateStep2Fields();
        });




        function updateButtonText(selectedItem, dropdownMenuId, dropdownButtonId) {
            var buttonText = $(selectedItem).text();
            var dropdownMenu = document.getElementById(dropdownMenuId);
            var dropdownButton = document.getElementById(dropdownButtonId);
            dropdownButton.innerText = buttonText;
        }

        function populateStep2Fields() {
            var step2Data = JSON.parse(localStorage.getItem('step2Data'));
            if (step2Data) {
                var dropdownMenu = document.getElementById(dropdownMenuId);
                var dropdownButton = document.getElementById(dropdownButtonId);

                document.getElementById('outdoorDropdownMenuButton1').value = step2Data.outdoorItem1;
                document.getElementById('outdoorDropdownMenuButton2').value = step2Data.outdoorItem2;
                document.getElementById('outdoorDropdownMenuButton3').value = step2Data.outdoorItem3;
                document.getElementById('indoorItem1Hidden').value = step2Data.indoorItem1;
                document.getElementById('indoorItem2Hidden').value = step2Data.indoorItem2;
                document.getElementById('indoorItem3Hidden').value = step2Data.indoorItem3;

            }
        }




        function goToNextPage() {
            storeStep2Data();
            window.location.href = "{{ route('step2') }}";
        }

        function storeStep2Data() {

            var formData = {
                outdoorItem1: document.getElementById('outdoorItem1Hidden').value,
                outdoorItem2: document.getElementById('outdoorItem2Hidden').value,
                outdoorItem3: document.getElementById('outdoorItem3Hidden').value,
                indoorItem1: document.getElementById('indoorItem1Hidden').value,
                indoorItem2: document.getElementById('indoorItem2Hidden').value,
                indoorItem3: document.getElementById('indoorItem3Hidden').value,
            };
            localStorage.setItem('step2Data', JSON.stringify(formData));
        }

        function validateStep2() {
            var outdoorItem1 = document.getElementById('outdoorItem1Hidden').value;
            var outdoorItem2 = document.getElementById('outdoorItem2Hidden').value;
            var outdoorItem3 = document.getElementById('outdoorItem3Hidden').value;
            var indoorItem1 = document.getElementById('indoorItem1Hidden').value;
            var indoorItem2 = document.getElementById('indoorItem2Hidden').value;
            var indoorItem3 = document.getElementById('indoorItem3Hidden').value;

            if (!outdoorItem1 || !outdoorItem2 || !outdoorItem3 || !indoorItem1 || !indoorItem2 || !indoorItem3) {
                $('#myModal').modal('show');
                return false;
            }

            return true;
        }

        function goToNextPage(event) {
        event.preventDefault(); // Prevent form submission and page refresh

        // Validate Step 2
        var isValid = validateStep2();
        if (isValid) {
            // Store Step 2 data before navigating to the next step
            storeStep2Data();
            // Submit the form
            document.getElementById("step2Form").submit();
        }
    }
    $(document).ready(function() {
        $('#cancelButton').click(function() {
            $('#myModal').modal('hide');
        });
    });
    </script>


</x-stepLayout>

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
