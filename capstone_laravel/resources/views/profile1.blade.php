<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../Assets/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">

    <link href="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/styleN.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../Assets/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">


</head>

<body>

    <div>
        <div id="topNav">
            <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                aria-controls="offcanvasExample" style="width: 50px;">
                <i class="fas fa-navicon fa-3x" style="color: #579792;"></i>
            </a>
            <img style="width: 10%; height: 50px; padding-bottom: 10px; padding-left: 5%;" src={{ asset('images/star.png') }}>
            <span style="font-size: 35px;">My Profile</span>
        </div>



        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel" style="width: 20%;">
            <div class="offcanvas-header" style="background-color:#579792">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="background-color:#579792">

                <div class="list-group list-group-flush mx-3 mt-4" style="background-color:#579792">
                    <span style="text-align: center;font-size: large">JOHN DOE</span>

                    <a href="./profile1.html" class="list-group-item list-group-item-action py-2 ripple"
                        style="background-color:#579792">
                        <i class="fas fa-user fa-fw me-3"></i><span>MY PROFILE</span>
                    </a>
                    <a href="./dashboard.html" class="list-group-item list-group-item-action py-2 ripple"
                        style="background-color:#579792"><i
                            class="fas fa-th-large fa-fw me-3"></i><span>DASHBOARD</span></a>
                    <a href="./connections.html" class="list-group-item list-group-item-action py-2 ripple"
                        style="background-color:#579792"><i
                            class="fas fa-address-book fa-fw me-3"></i><span>CONNECTIONS</span></a>
                    <a href="./requests.html" class="list-group-item list-group-item-action py-2 ripple"
                        style="background-color:#579792"><i
                            class="fas fa-user-plus fa-fw me-3"></i><span>REQUESTS</span></a>
                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                        style="background-color:#579792">
                        <i class="fas bi-box-arrow-right" style="background-color: black;"></i><span
                            style="color:#a43838">SIGN OUT</span>
                    </a>
                </div>

            </div>
        </div>

        <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
            <div class="container text-center">
                <div class="row">

                    <div class="col-6">
                        <div id="division1" style="height: 100%;">
                            <p id="step-title" style="padding-top: 0px;">Account</p>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                        value="John Doe">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label"
                                    style="text-align: left;">Email</label>
                                <div class="col-sm-10" style="padding-left:10px ;">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                        value="email@example.com">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticPass" class="col-sm-2 col-form-label"
                                    style="text-align: left;">Password</label>
                                <div class="col-sm-10" style="padding-left:10px ;width:58%;">
                                    <input type="text" readonly class="form-control-plaintext" id="staticPass"
                                        value="password">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3"
                                        style="width: 70px;text-align: center;background-color: #FF6F28; border: none">Reset
                                    </button>
                                </div>
                                <section class="container">
                                    <form class="row">
                                        <label for="date" class="col-sm-2 col-form-label">Birthday</label>
                                        <div class="col-5">
                                            <div class="input-group date" id="datepicker">
                                                <input type="text" class="form-control" id="date" />
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-light d-block">
                                                        <i class="fa fa-calendar" id="calendar-icon"  ></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                                <div class="row justify-content-between">
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary mb-3"
                                            style="width: 100%;text-align: center;background-color: transparent; color:#FF6F28; border: none">Sign
                                            Out </button>
                                    </div>
                                    <div class="col-4" style="width: 50%;">
                                        <button type="submit" class="btn btn-primary mb-3"
                                            style="width: 100%;text-align: center;background-color: transparent; color:#FF6F28; border: none">Delete
                                            Account</button>
                                    </div>
                                </div>
                                <div style="display: flex;
                                align-items: center;
                                justify-content: center;">
                                    <button type="submit" onclick="goToNextPage()" class="btn btn-primary "
                                        style="width: 60%;text-align: center;background-color: #FF6F28; border: none;text-align: center;">Edit
                                        Personal Information </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col">
                        <p id="step-title" style="padding-top: 0px;">Change your profile picture</p>
                        <div id="imageContainer" style="    display: inline-block;">
                            <img id="imagePlaceholder" src={{ asset('images/placeholder.png') }}>
                            <input type="file" id="fileInput" accept="image/*" onchange="handleFileSelect(event)">
                        </div>
                    </div>
                </div>

            </div>


    </div>


    </section>


    </div>
    <script src="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
   
    <script>

      

        function goToNextPage() {

            window.location.href = "profile2.html";
        }



    </script>

</body>

</html>