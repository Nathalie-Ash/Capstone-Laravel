<html>

<head>
    {{-- <link href="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/styleN.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="main.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">


</head>

<body>

    <div>
        
        <div id="topNav" style="width: 80%;text-align: center;margin: auto;padding-top: 2%;">
            <p style="color:#FF6F28; font-size: 20px;text-align: left;">Step 4</p>
            <p id="textStyle"style ="text-align: left;">Final Step!</p>
          
    
        </div>

        <section id="steps"
            style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column; margin-bottom: 10px;">
            <!-- <div id="steps"> -->

            <div class="container text-center" style="flex: 1;">
                <div class="row">
                    <div class="col">
                        <img  src="../Assets/image4.png">
                    </div>
                    <div class="col">
                        <h1 id="step-title" style="text-align: left;">Add your image below</h1>
                        <div id="imageContainer">
                            <img id="imagePlaceholder" src="../Assets/placeholder.png" >
                            <input type="file" id="fileInput" accept="image/*" onchange="handleFileSelect(event)">
                        </div>
                    </div>
                    <div class="col" >
                        <img class="animated-element" src="../Assets/image1.png">
                        <div id="division3" class="input" style ="height:min-content;">
                            <h1 id="step-title">Display Username</h1>
                            <input type="text" id="display-username" style="margin-bottom: 15px;">
                        </div>
                    </div>
                </div>
            </div>

    </div>
    <div id="button-nav">
        <button type="button" onclick="goToPrevPage()" class="btn"
            style="background-color:#a19e9e; width: 15%;border-right:50px;color:white;font-size: larger;">BACK</button>

        <button type="button" onclick="goToNextPage()" class="btn"
            style="background-color:#FF6F28; width: 25%;border-right:30px;color:white;font-size: larger;">Make Profile Public</button>
    </div>

    </section>


    </div>
    <script src="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateButtonText(selectedItem) {
            var buttonText = $(selectedItem).text();
            $('#dropdownMenuButton').text(buttonText);
        }

        function goToNextPage() {

            window.location.href = "step4.html";
        }
        function goToPrevPage() {

            window.location.href = "step3.html";
        }
        function handleFileSelect(event) {
            const fileInput = event.target;
            const imagePlaceholder = document.getElementById('imagePlaceholder');

            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePlaceholder.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

</body>

</html>