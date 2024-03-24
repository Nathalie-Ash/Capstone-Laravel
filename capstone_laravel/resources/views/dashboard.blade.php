<html>



<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../Assets/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./styles/stylej.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <title>Sign Up</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }

        .text {
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }

        body {
            background-color: #fbfbfb;
        }

        header {
            margin-left: 18%;
        }

        @media (min-width: 992px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                width: 240px;
                padding-top: 58px;
                /* Height of navbar */
                box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
                background-color: #fff;
                z-index: 600;
                overflow-y: auto;
            }

            .main-content {


                padding: 20px;
                display: flex;
                justify-content: space-between;
            }

            .card {
                flex: 0 0 calc(50% - 10px);
            }
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
                position: static;
                padding-top: 0;
            }

            .main-content {
                padding: 20px;
                display: flex;
                flex-direction: column;
            }

            .card {
                width: 100%;
                margin-bottom: 20px;
            }
        }

        .card {
            width: 90%;
            /* Adjusted width */
            /* max-width: 300px;  Added max-width */
            margin: 0 auto;
            /* Center the card */
            border-radius: 10px;
            overflow: hidden;
            /* max-height: 150px; Adjusted max-height */
            overflow-y: auto;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .progress-container {
            display: flex;
            align-items: center;
            /* Center items vertically */
        }

        .progress-bar {
            background-color: #579792;
            /* Set the desired color */
        }

        .progress-wrapper {
            flex: 1;
            /* Take up remaining space */
            margin-left: 10px;
            /* Add some space between MATCH and progress bar */
        }

        .progress {
            width: 100%;
        }

        .card-img-top {
            width: 70%;
            height: 75%;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div id="topNav">
        <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample" style="width: 50px;">
            <i class="fas fa-navicon fa-3x" style="color: #579792;"></i>
        </a>
        <img style="width: 10%; height: 50px; padding-bottom: 10px; padding-left: 5%;" src="../Assets/star.png">
        <span style="font-size: 35px;padding-top: 20px;">My Dashboard</span>
        <div style="display:inline ;float: right; padding-right: 10%;text-align: center;margin-top: 20px;">
            <!-- <i class="fas fa-search fa-sm ml-2" aria-hidden="true"></i> -->
            <input class="form-control form-control-sm" type="text" placeholder="Search" aria-label="Search">

        </div>





    </div>



    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"
        style="width: 20%;">
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
                <a href="" class="list-group-item list-group-item-action py-2 ripple" style="background-color:#579792">
                    <i class="fas bi-box-arrow-right" style="background-color: black;"></i><span
                        style="color:#a43838">SIGN OUT</span>
                </a>
            </div>

        </div>
    </div>




    <main class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="background-color:#f7f5f5;">
                        <img src="../Assets/placeholder.png" class="card-img-top" alt="...">

                        <div class="card-body">
                            <h1 class="card-title">JOHN DOE</h1>
                            <H4>Computer Science, Beirut Campus</H4>
                            <p class="card-text">A first year computer science student who is looking for people who
                                like video games, board games and chess </p>

                            <div class="progress-container">
                                <span>MATCH:</span>
                                <div class="progress-wrapper">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                            style="background-color:#579792;"></div>
                                    </div>
                                </div>
                                <span>80%</span>
                            </div>


                            <div style="display:flex; margin-top:1%; justify-content: space-between">
                                <a href="./userprofile.html" class="btn btn-primary"
                                    style=" border: none;width:49%; background-color:#ff6f28; color: white">View
                                    Profile</a>
                                <a href="#" class="btn btn-primary"
                                    style="border: none;width:49%; background-color:#ff6f28; color: white">Quick Add</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- <div class="card mb-3"> -->
                    <div class="card" style="background-color:#f7f5f5;">
                        <img src="../Assets/placeholder.png" class="card-img-top" alt="...">

                        <div class="card-body">
                            <h1 class="card-title">JOHN DOE</h1>
                            <H4>Computer Science, Beirut Campus</H4>
                            <p class="card-text">A first year computer science student who is looking for people who
                                like video games, board games and chess </p>

                            <div class="progress-container">
                                <span>MATCH:</span>
                                <div class="progress-wrapper">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                            style="background-color:#579792;"></div>
                                    </div>
                                </div>
                                <span>80%</span>
                            </div>


                            <div style="display:flex; margin-top:1%; justify-content: space-between">
                                <a href="./userprofile.html" class="btn btn-primary"
                                    style=" border: none;width:49%; background-color:#ff6f28; color: white">View
                                    Profile</a>
                                <a href="#" class="btn btn-primary"
                                    style="border: none;width:49%; background-color:#ff6f28; color: white">Quick Add</a>

                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </main>

</body>

</html>
<script src="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function (event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId)

            // Validate that all variables exist
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    // show navbar
                    nav.classList.toggle('show')
                    // change icon
                    toggle.classList.toggle('bx-x')
                    // add padding to body
                    bodypd.classList.toggle('body-pd')
                    // add padding to header
                    headerpd.classList.toggle('body-pd')
                })
            }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
            if (linkColor) {
                linkColor.forEach(l => l.classList.remove('active'))
                this.classList.add('active')
            }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))

        // Your code to run since DOM is loaded and ready
    });
</script>