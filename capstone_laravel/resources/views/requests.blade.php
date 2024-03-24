<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/styleN.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../Assets/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">


</head>

<body>
    <div id="topNav">
        <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample" style="width: 50px;">
            <i class="fas fa-navicon fa-3x" style="color: #579792;"></i>
        </a>
        <img style="width: 10%; height: 50px; padding-bottom: 10px; padding-left: 5%;" src="../Assets/star.png">
        <span style="font-size: 35px;">My Requests</span>
    </div>

    <div>
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
                <div class="row"
                    style="border: 2px solid black; display: flex; align-items: center; border-radius: 5px;">
                    <div class="col-sm-2">
                        <img src="https://orig00.deviantart.net/d7b0/f/2011/166/d/4/avatar_100x100_by_demonfox_zephz-d3iyw6a.png"
                            class="rounded-circle" style="width: 45%; margin: 5px;float: left;margin-left: 15px;">
                    </div>
                    <div class="col-sm-2" style="float: left;">
                        <p class="textStyle" style="text-align: left; font-size: 30px; padding: 0p; margin: 0px;">John
                            Doe</p>
                        <p style="text-align: left; font-weight: lighter; padding: 0px;">7 Mutual friends</p>
                    </div>
                    <div class="col-sm-8" ,>
                        <button type="button" onclick="goToNextPage()" class="btn"
                            style="background-color:#1b413d; width: 25%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">View
                            Profile</button>
                        <button type="button" onclick="goToNextPage()" class="btn"
                            style="background-color:#579792; width: 15%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">Accept</button>

                        <button type="button" class="btn"
                            style=" width: 15%; border-left: 30px; color: white; background-color:#FF6F28;font-size: larger; float: right;">Delete
                        </button>

                    </div>
                </div>

                <div class="row"
                    style="border: 2px solid black; display: flex; align-items: center; border-radius: 5px;border-top: 0px;">
                    <div class="col-sm-2">
                        <img src="https://orig00.deviantart.net/d7b0/f/2011/166/d/4/avatar_100x100_by_demonfox_zephz-d3iyw6a.png"
                            class="rounded-circle" style="width: 45%; margin: 5px;float: left;margin-left: 15px;">
                    </div>
                    <div class="col-sm-2" style="float: left;">
                        <p class="textStyle" style="text-align: left; font-size: 30px; padding: 0p; margin: 0px;">John
                            Doe</p>
                        <p style="text-align: left; font-weight: lighter; padding: 0px;">7 Mutual friends</p>
                    </div>
                    <div class="col-sm-8" ,>
                        <button type="button" onclick="goToNextPage()" class="btn"
                            style="background-color:#1b413d; width: 25%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">View
                            Profile</button>
                        <button type="button" onclick="goToNextPage()" class="btn"
                            style="background-color:#579792; width: 15%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">Accept</button>

                        <button type="button" class="btn"
                            style=" width: 15%; border-left: 30px; color: white; background-color:#FF6F28;font-size: larger; float: right;">Delete
                        </button>

                    </div>
                </div>
                <div class="row"
                    style="border: 2px solid black; display: flex; align-items: center; border-radius: 5px;border-top: 0px;">
                    <div class="col-sm-2">
                        <img src="https://orig00.deviantart.net/d7b0/f/2011/166/d/4/avatar_100x100_by_demonfox_zephz-d3iyw6a.png"
                            class="rounded-circle" style="width: 45%; margin: 5px;float: left;margin-left: 15px;">
                    </div>
                    <div class="col-sm-2" style="float: left;">
                        <p class="textStyle" style="text-align: left; font-size: 30px; padding: 0p; margin: 0px;">John
                            Doe</p>
                        <p style="text-align: left; font-weight: lighter; padding: 0px;">7 Mutual friends</p>
                    </div>
                    <div class="col-sm-8" ,>
                        <button type="button" onclick="goToNextPage()" class="btn"
                            style="background-color:#1b413d; width: 25%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">View
                            Profile</button>
                        <button type="button" onclick="goToNextPage()" class="btn"
                            style="background-color:#579792; width: 15%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">Accept</button>

                        <button type="button" class="btn"
                            style=" width: 15%; border-left: 30px; color: white; background-color:#FF6F28;font-size: larger; float: right;">Delete
                        </button>

                    </div>
                </div>
                <div class="row"
                    style="border: 2px solid black; display: flex; align-items: center; border-radius: 5px;border-top: 0px;">
                    <div class="col-sm-2">
                        <img src="https://orig00.deviantart.net/d7b0/f/2011/166/d/4/avatar_100x100_by_demonfox_zephz-d3iyw6a.png"
                            class="rounded-circle" style="width: 45%; margin: 5px;float: left;margin-left: 15px;">
                    </div>
                    <div class="col-sm-2" style="float: left;">
                        <p class="textStyle" style="text-align: left; font-size: 30px; padding: 0p; margin: 0px;">John
                            Doe</p>
                        <p style="text-align: left; font-weight: lighter; padding: 0px;">7 Mutual friends</p>
                    </div>
                    <div class="col-sm-8" ,>
                        <button type="button" onclick="goToNextPage()" class="btn"
                            style="background-color:#1b413d; width: 25%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">View
                            Profile</button>
                        <button type="button" onclick="goToNextPage()" class="btn"
                            style="background-color:#579792; width: 15%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">Accept</button>

                        <button type="button" class="btn"
                            style=" width: 15%; border-left: 30px; color: white; background-color:#FF6F28;font-size: larger; float: right;">Delete
                        </button>

                    </div>
                </div>

            </div>


        </section>


    </div>
    <script src="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>

        $(function () {
            $('#datepicker').datepicker();
        });

        function goToNextPage() {

            window.location.href = "profile2.html";
        }



    </script>

</body>

</html>