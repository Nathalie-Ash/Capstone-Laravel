<x-menuLayout>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
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

            .card {
                width: 100%;
                margin-bottom: 20px;
            }
        }

        .card {
            width: 90%;
            margin: 0 auto;
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: block;
        }
    </style>
    </head>

    <body>
        <div>
            <img style="width: 10%; height: 50px; padding-bottom: 10px; padding-left: 5%;margin-left:5%;"
                src={{ asset('images/star.png') }}>
            <span style="font-size: 35px;">My Dashboard</span>
            <div
                style="display: inline; float: right; padding-right: 10%; text-align: center; margin-top: 20px; position: relative;">
                <form class="search-form" action="{{ route('dashboard.search') }}" method="GET">
                    <input class="form-control form-control-sm" type="text" name="query" placeholder="Search"
                        aria-label="Search">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>

                    @if (!empty($users))
                        <div class="dropdown-menu show"
                            style="padding-left: 2%; background-color: rgba(87, 151, 146, 0.5);">
                            @foreach ($users as $user)
                                <li>
                                    <a href="{{ route('user.profile', ['name' => $user->name]) }}"
                                        style="text-decoration: none; color: inherit;">
                                        @if (isset($userImages[$user->id]))
                                            <img src="{{ asset($userImages[$user->id]->avatar) }}" alt="Profile Picture"
                                                style="width: 30px; height: 30px; border-radius: 50%; margin-right: 5px;">
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
                            @foreach ($matchedUsers as $matchedUser)
                                @php
                                    // Retrieve the user's name from the users table using their ID
$userName = App\Models\User::find($matchedUser['user_id'])->name;
$userPreferences = App\Models\UserPreferences::where(
    'user_id',
    $matchedUser['user_id'],
                                    )->first();
                                @endphp
                                <div class="col-md-6" style="margin-top: 4%;">
                                    <div class="card" style="background-color:#f7f5f5;">

                                        <img style ="height: 300px;margin-top: 7px;"
                                            src={{ asset($userPreferences->avatar) }} class="card-img-top"
                                            alt="...">


                                        <div class="card-body">
                                            <h1 class="card-title">{{ $userName }}</h1>
                                            <p style="font-size: 15px; font-weight: lighter">
                                                {{ $userPreferences->major }}, {{ $userPreferences->campus }}
                                            <p>
                                            <p class="card-text" style=" font-weight: normal">
                                                {{ $userPreferences->description }} </p>
                                            <div class="progress-container">
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
                                            <div style="display:flex; margin-top:1%; justify-content: space-between">
                                                <a href="{{ route('user.profile', ['name' => $userName]) }}"
                                                    class="btn btn-primary"
                                                    style=" border: none;width:49%; background-color:#ff6f28; color: white">View
                                                    Profile</a>
                                                <a href="#" class="btn btn-primary"
                                                    style="border: none;width:49%; background-color:#ff6f28; color: white">Quick
                                                    Add</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="spacer" style="margin-bottom: 1%"></div>
                            </div>
                        
                        @endforeach
                        @endif
                    </div>
                </div>
            </main>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                const showNavbar = (toggleId, navId, bodyId, headerId) => {
                    const toggle = document.getElementById(toggleId),
                        nav = document.getElementById(navId),
                        bodypd = document.getElementById(bodyId),
                        headerpd = document.getElementById(headerId)

                    if (toggle && nav && bodypd && headerpd) {
                        toggle.addEventListener('click', () => {
                            nav.classList.toggle('show')
                            toggle.classList.toggle('bx-x')
                            bodypd.classList.toggle('body-pd')
                            headerpd.classList.toggle('body-pd')
                        })
                    }
                }

                showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

                const linkColor = document.querySelectorAll('.nav_link')

                function colorLink() {
                    if (linkColor) {
                        linkColor.forEach(l => l.classList.remove('active'))
                        this.classList.add('active')
                    }
                }
                linkColor.forEach(l => l.addEventListener('click', colorLink))
            });
        </script>
</x-menuLayout>
