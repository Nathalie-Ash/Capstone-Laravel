<x-menuLayout>
    <style>
      *{
    font-family: 'Poppins', sans-serif;
    font-weight: bold ;
}
#textStyle {
    
    color: #000;
    font-size: 25px;
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
/* 
            .main-content {


                padding: 20px;
                display: flex;
                justify-content: space-between;
            } */

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

            /* .main-content {
                padding: 20px;
                display: flex;
                flex-direction: column;
            } */

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
    
        .fa-search {
    color: black;
}

/* Set the background of the search icon button */
.btn-primary {
    background-color: white;
    border: none; /* Set the border color */
}

/* Set the hover effect */
.btn-primary:hover {
    background-color: #f0f0f0; /* Light grey */
}.search-form {
    margin-bottom: 0%;
    padding-bottom:0%; 
    display: flex;
    align-items: center;
    position: relative; /* Position container relatively */
}
.dropdown-menu {
    position: absolute;
    top: calc(100% + 5px);
    left: 0;
    z-index: 999;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    width:100%; /* Adjust width as needed */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    /* padding: 5px 0; */
    display: block; /* Always display the dropdown */
}
#user-list {
    display: none; /* Hide the user list by default */
}


    /* Position the search icon next to the search input */
     
    </style>
    </head>

    <body>
        <div>
            <img
                style="width: 10%; height: 50px; padding-bottom: 10px; padding-left: 5%;margin-left:5%;"src={{ asset('images/star.png') }}>
            <span style="font-size: 35px;">My Dashboard</span>
            <div style="display: inline; float: right; padding-right: 10%; text-align: center; margin-top: 20px; position: relative;">
                <form class="search-form" action="{{ route('dashboard.search') }}" method="GET">
                    <input class="form-control form-control-sm" type="text" name="query" placeholder="Search" aria-label="Search">
                    <button id="search-button" type="button" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                    
                    <div class="dropdown-menu" id="user-list">
                        @if (!empty($users))
                            @foreach ($users as $user)
                                <li><a href="{{ route('user.profile', ['name' => $user->name]) }}">{{ $user->name }}</a></li>
                            @endforeach
                        @endif
                    </div>
                </form>
            
               
                
            
               
            </div>
            
        </div>
        <div>
        <main class="main-content" style="margin-bottom:2%; ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card" style="background-color:#f7f5f5;">
                            <img src={{ asset('images/placeholder.png') }} class="card-img-top" alt="...">

                            <div class="card-body">
                                <h1 class="card-title">John Doe</h1>
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
                                    <a href="/userprofile" class="btn btn-primary"
                                        style=" border: none;width:49%; background-color:#ff6f28; color: white">View
                                        Profile</a>
                                    <a href="#" class="btn btn-primary"
                                        style="border: none;width:49%; background-color:#ff6f28; color: white">Quick
                                        Add</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- <div class="card mb-3"> -->
                        <div class="card" style="background-color:#f7f5f5;">
                            <img src={{ asset('images/placeholder.png') }} class="card-img-top" alt="...">

                            <div class="card-body">
                                <h1 class="card-title">John Doe</h1>
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
                                    <a href="/userprofile" class="btn btn-primary"
                                        style=" border: none;width:49%; background-color:#ff6f28; color: white">View
                                        Profile</a>
                                    <a href="#" class="btn btn-primary"
                                        style="border: none;width:49%; background-color:#ff6f28; color: white">Quick
                                        Add</a>

                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </main>
    </div>


        <script src="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function(event) {

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
            document.addEventListener("DOMContentLoaded", function(event) {
    const searchButton = document.getElementById('search-button');
    const userList = document.getElementById('user-list');

    searchButton.addEventListener('click', function() {
        event.preventDefault();
        userList.style.display = (userList.style.display === 'block') ? 'none' : 'block';
    });
});

    
        </script>
  
    
    
        


</x-menuLayout>