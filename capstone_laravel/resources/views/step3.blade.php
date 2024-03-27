<x-stepLayout>

    <div>
      
        <div id="topNav" style="width: 80%;text-align: center;margin: auto;padding-top: 2%;">
            <p style="color:#FF6F28; font-size: 20px;text-align: left;">Step 3</p>
            <p id="textStyle"style ="text-align: left;">Almost There!</p>
          
    
        </div>
        <section id="steps"
            style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
            <!-- <div id="steps"> -->

            <div class="container text-center" style="flex: 1;">
                <div class="row">
                    <div class="col">
                        <img class="animated-element" src={{ asset('images/image1.png') }}>
                        
                        <div id="division1">
                            
                            <h1 id="step-title">What are your top 3 music genres ? </h1>
                            <div class="dropdown" style="padding-top: 5px;">
                                <button class="btn btn-secondary dropdown-toggle" id="musicDropdownMenuButton1"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Genre 1
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="musicItem1">
                                </ul>
                            </div>
                            <div class="dropdown" style="padding-top: 10px;">
                                <button class="btn btn-secondary dropdown-toggle" id="musicDropdownMenuButton2"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Genre 2
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="musicItem2">
                                </ul>
                            </div>
                            <div class="dropdown" style="padding-top: 10px;">
                                <button class="btn btn-secondary dropdown-toggle" id="musicDropdownMenuButton3"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Genre 3
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="musicItem3">
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col">
                        <img class="animated-element" src={{ asset('images/image1.png') }}>
                        <div id="division2" class="input">

                            <h1 id="step-title">What are your 3 movies/series genres ? </h1>
                            <div class="dropdown" style="padding-top: 5px;">
                                <button class="btn btn-secondary dropdown-toggle" id="movieDropdownMenuButton1"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Movie 1
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="movieItem1">
                                </ul>
                            </div>
                            <div class="dropdown" style="padding-top: 10px;">
                                <button class="btn btn-secondary dropdown-toggle" id="movieDropdownMenuButton2"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Movie 2
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="movieItem2">
                                </ul>
                            </div>
                            <div class="dropdown" style="padding-top: 10px;">
                                <button class="btn btn-secondary dropdown-toggle" id="movieDropdownMenuButton3"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="background-color: #579792;border: none;">
                                    Select Movie 3
                                </button>
                                <ul class="dropdown-menu" style="background-color: #579792;width: 90%;border: none;"
                                    id="movieItem3">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <img class="animated-element" src={{ asset('images/image1.png') }}>
                        <div id="division3" class="input" >
                            <h1 id="step-title" style="padding-bottom: 30px">Tell Us More About You</h1>
                            <textarea id="description"
                                style="margin-bottom: 15px; min-height:65% ;vertical-align: top;text-align:top;font-weight:lighter; border-radius: 5px;"></textarea>

                        </div>
                    </div>
                </div>
            </div>

    </div>
    <div id="button-nav">
        <button type="button" onclick="goToPrevPage()" class="btn"
            style="background-color:#a19e9e; width: 15%;border-right:50px;color:white;font-size: larger;">BACK</button>
        <button type="button" onclick="goToNextPage()" class="btn"
            style="background-color:#FF6F28; width: 15%;border-right:30px;color:white;font-size: larger;">NEXT</button>
    </div>
    </section>


    </div>
    <script src="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Array of items for the dropdown
            var musicGenres= [
                "Rap",
                "Metal",
                "Pop",
                "Arabic",
                "Indie"
            ];

            // Get the dropdown menu elements
            var musicDropdownMenu1 = document.getElementById("musicItem1");
            var musicDropdownMenu2 = document.getElementById("musicItem2");
            var musicDropdownMenu3 = document.getElementById("musicItem3");

            // Iterate over the array and create <li> elements for each dropdown
            musicGenres.forEach(function (music) {
                var listItem1 = document.createElement("li");
                var listItem2 = document.createElement("li");
                var listItem3 = document.createElement("li");

                var divider1 = document.createElement("hr");
                var divider2 = document.createElement("hr");
                var divider3 = document.createElement("hr");

                listItem1.innerHTML = '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'musicItem1\', \'musicDropdownMenuButton1\')">' + music + '</a>';
                listItem2.innerHTML = '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'musicItem2\', \'musicDropdownMenuButton2\')">' + music + '</a>';
                listItem3.innerHTML = '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'musicItem3\', \'musicDropdownMenuButton3\')">' + music + '</a>';

                musicDropdownMenu1.appendChild(listItem1);
                musicDropdownMenu1.appendChild(divider1);

                musicDropdownMenu2.appendChild(listItem2);
                musicDropdownMenu2.appendChild(divider2);

                musicDropdownMenu3.appendChild(listItem3);
                musicDropdownMenu3.appendChild(divider3);
            });

            var movies = [
                "Comedy",
                "Romance",
                "Sci-Fi",
                "Horror",
                "Documentary"
            ];

            // Get the dropdown menu elements
            var movieDropdownMenu1 = document.getElementById("movieItem1");
            var movieDropdownMenu2 = document.getElementById("movieItem2");
            var movieDropdownMenu3 = document.getElementById("movieItem3");

            // Iterate over the array and create <li> elements for each dropdown
            movies.forEach(function (movie) {
                var listItem1 = document.createElement("li");
                var listItem2 = document.createElement("li");
                var listItem3 = document.createElement("li");

                var divider1 = document.createElement("hr");
                var divider2 = document.createElement("hr");
                var divider3 = document.createElement("hr");

                listItem1.innerHTML = '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'movieItem1\', \'movieDropdownMenuButton1\')">' + movie + '</a>';
                listItem2.innerHTML = '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'movieItem2\', \'movieDropdownMenuButton2\')">' + movie + '</a>';
                listItem3.innerHTML = '<a class="dropdown-item" href="#" style="color:white;" onclick="updateButtonText(this, \'movieItem3\', \'movieDropdownMenuButton3\')">' + movie + '</a>';

                movieDropdownMenu1.appendChild(listItem1);
                movieDropdownMenu1.appendChild(divider1);

                movieDropdownMenu2.appendChild(listItem2);
                movieDropdownMenu2.appendChild(divider2);

                movieDropdownMenu3.appendChild(listItem3);
                movieDropdownMenu3.appendChild(divider3);
               
            });
        });


        function updateButtonText(selectedItem, dropdownMenuId, dropdownButtonId) {
            var buttonText = $(selectedItem).text();
            var dropdownMenu = document.getElementById(dropdownMenuId);
            var dropdownButton = document.getElementById(dropdownButtonId);


            // Update the button text
            dropdownButton.innerText = buttonText;
        }


        function goToNextPage() {

            window.location.href = "step4.html";
        }
        function goToPrevPage() {

            window.location.href = "step2.html";
        }
    </script>

</x-stepLayout>