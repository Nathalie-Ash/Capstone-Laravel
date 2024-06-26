<x-menuLayout>

    <head>
        <title>Dashboard</title>
    </head>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }

        #textStyle {
            color: #000;
            font-size: 20px;
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

            .card {
                flex: 0 0 calc(50% - 15px);
                /* Adjusted width */
                margin-right: 10px;
                /* Added margin */
                margin-left: 5px;
                /* Added margin */
            }
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
                position: static;
                padding-top: 0;
            }

            .card {
                width: 100%;
                margin-bottom: 20px;
            }
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
            overflow-y: auto;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .progress-container {
            display: flex;
            align-items: center;
        }

        .progress-bar {
            background-color: #579792;
        }

        .progress-wrapper {
            flex: 1;
            margin-left: 10px;
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

        .fa-filter {
            color: black;
        }

        .btn-primary {
            background-color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #f0f0f0;
        }

        .search-form {
            margin-bottom: 0%;
            padding-bottom: 0%;
            display: flex;
            align-items: center;
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 5px);
            left: 0;
            z-index: 999;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-shadow: 0 2px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .dropdown-menu.show {
            padding: 0px;
        }
    </style>
    </head>

    <body>
        <div style="display: flex; align-items: center;">
            <i class="fas fa-star fa-lg md-3"
                style="font-size: 50px; color: #8971f6;margin-left:10%;text-align: start;vertical-align: sub;"></i>
            <span style="font-size: 35px; margin-left: 10px;">My Dashboard</span>
            <div style="margin-left: auto; ">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdownButton"
                        data-bs-toggle="dropdown" aria-expanded="false"
                        style="margin-right: 2px; height: 30px; background-color:#579792; text-align: center;padding-top: 0px; padding-bottom: 0px; padding-left: 7px;">
                        Filter
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="filterDropdownButton"
                        style="padding-bottom:0%;margin-bottom:0%">

                        <form class="filter-form" id="filterForm" action="{{ route('dashboard.filter') }}"
                            style="margin:0" method="GET">
                            <input type="hidden" name="category" id="category">
                            <input type="hidden" name="value" id="value">
                            <li>
                                <select class="form-control form-control-sm" name="campus" id="campusSelect"
                                    onchange="changeCategory('campus', this.value)">
                                    <option value="" selected disabled>By Campus</option>
                                    @foreach ($campuses as $campus)
                                        <option value="{{ $campus }}">{{ $campus }}</option>
                                    @endforeach
                                    <option value="Both">Both</option>
                                </select>
                            </li>
                            <li>
                                <select class="form-control form-control-sm" name="outdoor" id="outdoorSelect"
                                    onchange="changeCategory('outdoor', this.value)">
                                    <option value="" selected disabled>By Outdoor Activity</option>
                                    @foreach ($outdoors as $outdoor)
                                        <option value="{{ $outdoor }}">{{ $outdoor }}</option>
                                    @endforeach
                                </select>
                            </li>
                            <li>
                                <select class="form-control form-control-sm" name="indoor" id="indoorSelect"
                                    onchange="changeCategory('indoor', this.value)">
                                    <option value="" selected disabled>By Indoor Activity</option>
                                    @foreach ($indoors as $indoor)
                                        <option value="{{ $indoor }}">{{ $indoor }}</option>
                                    @endforeach
                                </select>
                            </li>
                            <li>
                                <select class="form-control form-control-sm" name="music" id="musicSelect"
                                    onchange="changeCategory('music', this.value)">
                                    <option value="" selected disabled>By Music Genre </option>
                                    @foreach ($musics as $music)
                                        <option value="{{ $music }}">{{ $music }}</option>
                                    @endforeach
                                </select>
                            </li>
                            <li>
                                <select class="form-control form-control-sm" name="movie" id="movieSelect"
                                    onchange="changeCategory('movie', this.value)">
                                    <option value="" selected disabled>By Movie Genre</option>
                                    @foreach ($movies as $movie)
                                        <option value="{{ $movie }}">{{ $movie }}</option>
                                    @endforeach
                                </select>
                            </li>

                        </form>


                    </ul>
                </div>
            </div>

            <div style="padding-right: 10%; text-align: center; position: relative;">
                <form class="search-form" action="{{ route('dashboard.search') }}" method="GET">
                    <input class="form-control form-control-sm" type="text" name="query" placeholder="Search"
                        aria-label="Search">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>

                    @if (!empty($users))
                        <div class="dropdown-menu show" id ="searchDropdown"
                            style="padding-left: 2%; background-color: rgba(87, 151, 146);padding: 0px;">
                            @foreach ($users as $user)
                                <li>
                                    <a href="{{ route('user.profile', ['id' => $user->id]) }}"
                                        style="text-decoration: none; color: inherit;">
                                        @php
                                            $senderId = $user->id;
                                            $userImage = $userImages[$senderId] ?? null;
                                        @endphp

                                        @if ($userImage)
                                            <img src="{{ asset($userImage) }}" alt="Profile Picture"
                                                style="width: 40px; height: 40px; border-radius: 50%; margin-right: 5px; object-fit:scale; padding: 5px;">
                                        @else
                                            <img src="{{ asset('images/default_profile.png') }}"
                                                alt="Default Profile Picture"
                                                style="width: 30px; height: 30px; border-radius: 50%; margin-right: 5px;">
                                        @endif
                                        {{ $user->name }}
                                    </a>
                                </li>
                            @endforeach

                        </div>
                    @endif
                </form>
            </div>
        </div>

        <div>
            <main class="main-content">
                <div class="container">
                    <div class="row">
                        @if (!empty($matchedUsers))
                            @php
                                $userCount = count($matchedUsers);
                            @endphp
                            @for ($i = 0; $i < $userCount; $i += 2)
                                <div class="row">
                                    @for ($j = $i; $j < min($userCount, $i + 2); $j++)
                                        @php
                                            $matchedUser = $matchedUsers[$j];
                                            $userName = App\Models\User::find($matchedUser['user_id'])->name;
                                            $userPreferences = App\Models\UserPreferences::where(
                                                'user_id',
                                                $matchedUser['user_id'],
                                            )->first();
                                        @endphp
                                        <div class="col-md-6" style="margin-top: 1%;">

                                            <div class="card" style="background-color:#f7f5f5; height:550px">
                                                <img style="height: 300px;margin-top: 7px; object-fit:cover"
                                                    src="{{ asset($userPreferences->avatar) }}" class="card-img-top"
                                                    alt="...">
                                                <div class="card-body d-flex flex-column">
                                                    <h1 class="card-title" style="font-size: 25px;">{{ $userName }}
                                                    </h1>
                                                    <p style="font-size: 15px; font-weight: lighter">
                                                        {{ $userPreferences->major }}, {{ $userPreferences->campus }}
                                                        Campus
                                                    </p>
                                                    <p class="card-text" style=" font-weight: normal; height: 20%;">
                                                        {{ $userPreferences->description }}</p>
                                                    <div class="progress-container mt-auto">
                                                        <span>MATCH:</span>
                                                        <div class="progress-wrapper">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: {{ $matchedUser['matching_percentage'] }}%"
                                                                    aria-valuenow="{{ $matchedUser['matching_percentage'] }}"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    style="background-color:#579792;"></div>
                                                            </div>
                                                        </div>
                                                        <span>{{ $matchedUser['matching_percentage'] }}%</span>
                                                    </div>
                                                    <div class="mt-3">
                                                        <div style="display:flex; justify-content: space-between">
                                                            <a href="{{ route('user.profile', ['id' => $userPreferences->user_id]) }}"
                                                                class="btn btn-primary"
                                                                style=" border: none;width:49%; background-color:#ff6f28; color: white">View
                                                                Profile</a>
                                                            <a href="{{ route('add.profile', ['profileId' => $userPreferences->user_id]) }}"
                                                                class="btn btn-primary"
                                                                style="border: none;width:49%; background-color:#ff6f28; color: white">Quick
                                                                Add</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                <div class="spacer" style="margin-bottom: 1%"></div>
                            @endfor
                        @endif
                    </div>
                </div>
            </main>


            @if (session('session_about_to_expire'))
                <script>
                    alert("Your session is about to expire!");
                </script>
            @endif

        </div>

        <script>
            var sessionExpiryTime = "{{ session('expires_at') }}";
            var now = new Date();
            console.log("Current time: " + now);
            console.log("Session expiry time: " + sessionExpiryTime);

            function changeCategory(category, value) {

                document.getElementById('category').value = category;
                document.getElementById('value').value = value;
            }


            // Function to show the navbar
            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId);

                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        nav.classList.toggle('show');
                        toggle.classList.toggle('bx-x');
                        bodypd.classList.toggle('body-pd');
                        headerpd.classList.toggle('body-pd');
                    });
                }
            };


            // Call the function to show the navbar
            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header');

            // Function to handle link color
            const linkColor = document.querySelectorAll('.nav_link');


            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink));


            document.querySelectorAll('.filter-form select').forEach(select => {
                select.addEventListener('change', function() {
                    var category = this.name;
                    var value = this.value;
                    var filterForm = document.getElementById('filterForm');
                    filterForm.action = "{{ route('dashboard.filter') }}?category=" + category +
                        "&value=" + encodeURIComponent(value);
                    filterForm.submit();
                });
            });

            document.addEventListener('DOMContentLoaded', function() {

                document.querySelector('.search-form button[type="submit"]').addEventListener('click', function(event) {
                    var searchInput = document.querySelector('.search-form input[type="text"]');
                    var dropdownMenu = document.querySelector('.searchDropdown');

                    if (searchInput.value.trim() === '') {
                        event.preventDefault();
                        return;
                    }

                    dropdownMenu.classList.add('show');
                });

            });
            document.addEventListener('click', function(event) {
                var dropdownMenu = document.getElementById('searchDropdown');
                var searchInput = document.querySelector('.search-form input[type="text"]');
                var searchButton = document.querySelector('.search-form button[type="submit"]');

                var isClickedInsideDropdown = dropdownMenu.contains(event.target);
                var isClickedInsideSearch = searchInput.contains(event.target) || searchButton.contains(event.target);

                if (!isClickedInsideDropdown && !isClickedInsideSearch) {
                    dropdownMenu.classList.remove('show');
                }
            });
        </script>


        @if (count($matchedUsers) >= 1)
            <footer class="fixed-bottom text-center small text-muted py-2"
                style="position: static; bottom: 0; left: 0; width: 100%; z-index: 1; margin-top: 20px;">
                <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">Friends</a>. All rights
                    reserved.
                </p>
            </footer>
        @else
            <footer class="fixed-bottom text-center small text-muted py-2"
                style="position: fixed; bottom: 0; left: 0; width: 100%; z-index: 1; margin-top: 20px;">
                <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">Friends</a>. All rights
                    reserved.
                </p>
            </footer>
        @endif

</x-menuLayout>
