<x-stepLayout>
    <div>

        <div id="topNav" style="width: 80%;text-align: center;margin: auto;padding-top: 2%;">
            <p style="color:#FF6F28; font-size: 20px;text-align: left;">Step 4</p>
            <p id="textStyle"style="text-align: left;">Final Step!</p>


        </div>
        <form method="POST" action="{{ route('step4') }}">
            @csrf
            <section id="steps"
                style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column; margin-bottom: 10px;">
                <!-- <div id="steps"> -->

                <div class="container text-center" style="flex: 1;">
                    <div class="row">
                        <div class="col">
                            <img src={{ asset('images/image4.png') }}>
                        </div>
                        <div class="col">
                            <h1 id="step-title" style="text-align: left;">Add your image below</h1>
                            <div id="imageContainer">
                                <img id="imagePlaceholder" src={{ asset('images/placeholder.png') }}>
                                <input type="file" id="fileInput" accept="image/*"
                                    onchange="handleFileSelect(event)">
                            </div>
                        </div>
                        <div class="col">
                            <img class="animated-element" src={{ asset('images/image1.png') }}>
                            <div id="division3" class="input" style ="height:min-content;">
                                <h1 id="step-title">Display Username</h1>
                                <input type="text" id="display-username"
                                    name ="displayName"style="margin-bottom: 15px;">
                            </div>
                        </div>
                    </div>
                </div>

    </div>
    <div id="button-nav" style="padding-top: 0px; padding-bottom: 30px;">
        <button type="button" onclick="goToPrevPage()" class="btn"
            style="background-color:#a19e9e; width: 15%;border-right:50px;color:white;font-size: larger;">BACK</button>

        <button type="submit" class="btn"
            style="background-color:#FF6F28; width: 25%;border-right:30px;color:white;font-size: larger;">Make Profile
            Public</button>
    </div>

    </section>
    </form>

    </div>
    <script src="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateButtonText(selectedItem) {
            var buttonText = $(selectedItem).text();
            $('#dropdownMenuButton').text(buttonText);
        }

        function goToNextPage() {

            window.location.href = "dashboard";
        }

        function goToPrevPage() {

            window.location.href = "step3";
        }

        function handleFileSelect(event) {
            const fileInput = event.target;
            const imagePlaceholder = document.getElementById('imagePlaceholder');

            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePlaceholder.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

</x-stepLayout>
