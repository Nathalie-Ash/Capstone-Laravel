<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"
        integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<head>
    <link rel="stylesheet" href="/styleN.css">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }

        #textStyle {

            color: #000;
            font-size: 25px;
        }

        header {
            margin-left: 18%;
        }

        @media (min-width: 992px) {


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

            width: 100%;
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

        #div1.col,
        #div2.col,
        #div3.col,
        #div4.col {

            color: black;
            background-color: #DCDCDF;
            border: white solid px;
            border-radius: 5%;
            padding: 20px;
            width: 100%;
        }

        #input-text,
        textarea {
            background-color: #579792;
        }

        #staticUsername {
            border-radius: 5px;
            color: white;
            background-color: #579792;
            padding-left: 3%;
            font-weight: normal;
        }

        .animated-element {
            text-align: center;

            height: 40;
            animation: fadeInOut 2s infinite;
            padding-bottom: 0%;
            margin-bottom: 0%;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img id="avatarImage" style="height: 5%; width: 5%; object-fit: scale; border-radius: 50%;"
                src="/images/Logo.png">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">LAU Connect</a>
                    </li>

                </ul>

                <a href="/admin" class="btn btn-primary"
                    style=" border: none;width:max-content; background-color:#ff6f28; color: white; ">
                    BACK</a>
                <a href="{{ route('logout') }}" class="btn btn-primary"
                    style=" border: none;width:max-content; background-color:rgba(87, 151, 146); color: white; margin-left: 20px;"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    LOG OUT
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>


            </div>
        </div>
    </nav>

    <div>
        <span style="font-size: 35px;">
            <i class="fas fa-star fa-lg md-3"
                style="font-size: 50px; color: #8971f6;margin-left:10%;text-align: start;vertical-align: sub;"></i>
            Admin View</span>
    </div>
    <main class="main-content">
        <div class="container">
            <div class="row">
                
                <div class="col-md-6">
                    <div class="card" style="background-color:#f7f5f5;">
                        <img src={{ asset($userPreferences->avatar) }} class="card-img-top" style="height: 285px;object-fit:contain">

                        <div class="card-body">
                            <h1 class="card-title" style="font-size: 30px;">{{ $user->name }}</h1>
                            <p style="font-size: 15px; font-weight: lighter">{{ $userPreferences->major }},
                                {{ $userPreferences->campus }}
                            <p>
                            <p class="card-text" style=" font-weight: normal">{{ $userPreferences->description }} </p>

                            <div style="display:flex; margin-top:1%; justify-content: space-between">

                                <a href="#" class="btn"
                                    style="background-color: #579792; width: 33%; color: white; font-size: 20px; float: right; "
                                    data-bs-toggle="modal" data-bs-target="#editBioModal">Edit Description</a>

                                <form id="delete-avatar-form"
                                    action="{{ route('delete.avatar', ['userid' => $user->id]) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <form id="idc-form"
                                action="{{ route('retrieve.acc', ['id' => $user->id]) }}" method="POST"
                                style="display: none;">
                                @csrf
                        
                            </form>
                                <a href="#" class="btn"
                                    style="background-color: #7d9757; width: 33%; color: white; font-size: 20px; float: right;text-align: center "
                                    onclick="event.preventDefault(); document.getElementById('delete-avatar-form').submit();">Delete
                                    Avatar</a>


                                 @if(!$user->deleted)
                                <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                    class="btn btn-primary"

                                    style="border: none;width:33%; background-color:#ff6f28; color: white;font-size: larger; float: right;">Delete
                                    Account</a>
                                @else  
                                <a href="#" onclick="event.preventDefault(); document.getElementById('idc-form').submit();"
                                    class="btn"
                                    style="border: none;width:33%; background-color:#ff6f28; color: white;font-size: larger; float: right;">Retreive
                                    Account</a>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="height: 485px;">
                    <div class="card" style="background-color:#f7f5f5; height: 100%;">
                        @if (!$userPreferences->timetable_path)
                        <img src='/images/default_document.png' class="card-img-top" style="height:80%;text-align: center; object-fit: contain;">
                        @else
                        <iframe src="{{ asset($userPreferences->timetable_path) }}" width="100%" height="80%" style="border: none;"></iframe>
                        @endif
                        
                
                            <div style="display:flex; margin-top:1%; justify-content: space-between">
                                <form id="delete-timetable-form" action="{{ route('delete.timetable', ['userid' => $user->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="#" class="btn" style="background-color: #7d9757; width: 100%; height: min-content; color: white; font-size: larger; float: right; margin: 20px;" onclick="event.preventDefault(); document.getElementById('delete-timetable-form').submit();">Delete Timetable</a>
                
                            </div>
                       
                    </div>
                </div>
                
                
                
            </div>
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this account?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('softDeleteUser', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger" style="background-color:#FF6F28 ">Yes,
                                    Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           


            <!-- Edit Bio Modal -->
            <div class="modal fade" id="editBioModal" tabindex="-1" aria-labelledby="editBioModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editBioModalLabel" style = "font-size: 20px;">Edit Description</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('edit.bio', ['userid' => $user->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="bio">Description:</label>
                                    <textarea class="form-control" id="bio" name="bio" rows="3">{{ $userPreferences->bio }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal" >Cancel</button>
                                <button type="submit" class="btn btn-danger" style="background-color:#FF6F28 ">Save
                                    Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </main>

</body>

</html>
<footer class="fixed-bottom text-center small text-muted py-2"
    style="position: fixed; bottom: 0; left: 0; width: 100%; z-index: 1; margin-top: 20px;">
    <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">Friends</a>. All rights reserved.
    </p>
</footer>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<script>
    $('[data-toggle="tooltip"]').tooltip()
</script>
