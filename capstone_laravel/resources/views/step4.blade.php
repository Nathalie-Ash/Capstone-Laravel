<x-stepLayout>

    <head>
        <title>Step 4</title>
    </head>
    <div>

        <div id="topNav" style="width: 80%;text-align: center;margin: auto;padding-top: 2%;">
            <p style="color:#FF6F28; font-size: 20px;text-align: left;">Step 4</p>
            <p id="textStyle"style="text-align: left;">Final Step!</p>


        </div>
        <form method="POST" action="{{ route('step4') }}" enctype="multipart/form-data">
            @csrf
            <section id="steps"
                style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column; margin-bottom: 10px;">

                <div class="container text-center" style="flex: 1;">
                    <div class="row">
                        <div class="col">
                            <img src={{ asset('images/image4.png') }}>
                        </div>
                        <div class="col">
                            <h1 id="step-title" style="text-align: left;">Add your image below</h1>
                            <div id="imageContainer">
                                <img id="imagePlaceholder" src={{ asset('images/placeholder.png') }}>
                                <input type="file" id="fileInput" accept=".png, .jpg, .jpeg"
                                    onchange="handleFileSelect(event)" name = "avatar">
                            </div>
                        </div>
                        <div class="col">
                            <img class="animated-element" src={{ asset('images/image1.png') }}>



                            <div id="division3" class="input" style ="height:min-content; ">
                                <h1 id="step-title" style="padding-top: 5px;">Upload Your Timetable</h1>
                                <p
                                    style="background-color: #579792; border-radius: 5%; padding: 5px; font-weight: normal">
                                    Upload your schedules to help others know your free time and any potential common
                                    classes !
                                    Accepted formats are in .pdf, .doc, .docx
                                    <input type="file" id="timetable" name="timetable_path" accept=".pdf,.doc,.docx"
                                        style="margin-bottom: 15px;">
                            </div>


                        </div>

                    </div>
                </div>

    </div>
    <div id="button-nav" style="padding-top: 0px; padding-bottom: 30px;">
        <button type="submit" class="btn"
            style="background-color:#FF6F28; width: 20%;border-right:30px;color:white;font-size: larger;">Make Profile
            Public</button>
    </div>

    </section>
    </form>

    </div>
    <script>
        function updateButtonText(selectedItem) {
            var buttonText = $(selectedItem).text();
            $('#dropdownMenuButton').text(buttonText);
        }

        function goToNextPage() {

            window.location.href = "dashboard";
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
