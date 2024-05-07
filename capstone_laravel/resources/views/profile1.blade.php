<x-menuLayout>

    <head>
        <link rel="stylesheet" href="/styleN.css">
        <title>Profile </title>
    </head>
    <style>
        input[type="file"] {
            color: transparent;
        }

    
        #fileContainer {
            display: flex;
            flex-direction: column;
        }

        
        #fileContainer a {
            color: #333;
         
            text-decoration: none;
          
        }

        
        #fileContainer p {
            margin-bottom: 4px;
          
        }
    </style>




    <div>
        <span style="font-size: 35px;">
            <i class="fas fa-star fa-lg md-3"
                style="font-size: 50px; color: #8971f6;margin-left:10%;text-align: start;vertical-align: sub;"></i>
            My Profile</span>
    </div>


    <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
        <div class="container text-center">
            <div class="row">

                <div class="col-md-5" style="padding-top: 10px;">
                    <div id="division1" style="height: 100%;">
                        <p id="step-title" style="padding-top: 0px;">Account</p>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-3 col-form-label"
                                style="text-align: left;">Username</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="{{ $userData->username }}" style="width: 100%;">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-3 col-form-label"
                                style="text-align: left; ">Email</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="{{ $userData->email }}" style="width: 100%; margin-right: 5px;">
                            </div>
                        </div>
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">

                                <label for="staticPass" class="col-sm-3 col-form-label" style="text-align: left; "
                                    name="password">Password</label>

                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" readonly class="form-control" id="staticPassword"
                                            value="{{ substr($userData->password, 0, 13) }}"
                                            style="width: min-content; background-color: #579792; border-radius: 5px; color: white;font-weight: larger;">

                                        <div class="input-group-append">
                                            <a href="{{ route('password.request') }}" class="btn"
                                                style="background-color: #FF6F28;  margin-left: 5px; color: white;border: none">
                                                Reset<a>

                                        </div>
                                    </div>
                                </div>
                        </form>



                        <form class="mb-3 row" style="padding-top: 20px;">
                            <label class="col-sm-3 col-form-label" style="text-align: left;">Birthday</label>
                            <div class="col-5">
                                <div class="input-group">
                                    <input type="text" id="birthdate" value="{{ $userData->birthdate }}"
                                        name="birthdate" class="form-control" style="color: white;" readonly>
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar" style="color: #579792;"></i>
                                    </span>
                                </div>
                            </div>
                        </form>

                        <div class="row justify-content-between">
                            <div class="col-4">

                                <a href="{{ route('logout') }}"
                                    class="list-group-item list-group-item-action py-2 ripple"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span style="color:#FF6F28; font-weight: normal">Sign
                                        Out</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        
                            <div class="col-4">

                                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                                    data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                    <span style="color:#FF6F28; font-weight: normal; width: max-content">Delete
                                        Account</span>
                                </a>


                            </div>


                            <!-- Confirm Delete Modal -->
                            <div class="modal fade" id="confirmDeleteModal" tabindex="-1"
                                aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete your account?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('softDeleteUser', ['id' => $userData->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    style="background-color:#FF6F28 ">Yes, Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <form action="{{ route('profile2') }}" method="GET" id="editPersonalInfoForm">
                            @csrf
                            <div
                                style="display: flex;
                                        align-items: center;
                                        justify-content: center;">
                                <button type="button" onclick="goToNextPage()" class="btn btn-primary"
                                    style="width: 60%;text-align: center;background-color: #FF6F28; border: none;text-align: center;">Edit
                                    Personal Information </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-md-4" style="padding-top: 10px;">
                <div id="division1" style="height: 100%;">
                    <form action="{{ route('updateUserData') }}" method="POST">
                        @csrf
                        <p id="step-title" style="padding-top: 0px;">Click on image to change your profile picture</p>
                        <div id="imageContainer" style="display: inline-block;">
                            @if ($userImage)
                                <img id="avatarImage" style="height: 100%; width: 100%; object-fit: scale;"
                                    src="{{ asset($userImage->avatar) }}">
                            @else
                                <img id="avatarImage" style="height: 100%; width: 100%;"
                                    src="{{ asset('images/placeholder.png') }}" alt="Placeholder Image">
                            @endif
                            <input type="file" id="fileInput" accept=".png, .jpg, .jpeg"
                                onchange="handleFileSelect(event)" name="avatar">
                        </div>
                </div>
            </div>

            <div class="col-md-3 " style="padding-top: 10px;">
                <div id="division1" style="height: 100%;">
                    <p id="step-title" style="padding-top: 0px;">Add Time table</p>
                    <div id="fileContainer" style="display: flex; flex-direction: column;">
                        <input type="file" id="timetablePath" name="timetable_path" accept=".pdf,.doc,.docx"
                            style="margin-bottom: 10px;" onchange="handleTableSelect(event)">
                        @if ($userTimetable->timetable_path)
                            <iframe src="{{ asset($userTimetable->timetable_path) }}" width="100%" 
                                style="padding-bottom: 4px; color: #333;text-align: left;height: 300px"></iframe>
                        @else
                            <img src='/images/default_document.png'
                                style="max-width: 100%;max-height: 100%; 
                    object-fit: contain;">
                        @endif
                    </div>
                </div>
            </div>
            </form>
        </div>


        </div>

        </div>


        </div>



    </section>


    </div>

    <script>
        function goToNextPage() {
            document.getElementById('editPersonalInfoForm').submit();
        }

        function handleFileSelect(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const avatarImage = document.getElementById('avatarImage');
                    avatarImage.src = e.target.result;
                };
                reader.readAsDataURL(file);

                const formData = new FormData();
                formData.append('avatar', file);
                updateUserData(formData);
            }
        }

        function handleTableSelect(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];

            if (file) {
                const formData = new FormData();
                formData.append('timetable_path', file);
                updateUserData(formData);
            }
        }

        function updateUserData(formData) {
            // Send a POST request to the backend endpoint with the updated data
            fetch("{{ route('updateUserData') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}" 
                    },
                    body: formData
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = "profile1";
                    } else {
                       
                        alert("Failed to save user data.");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("An error occurred while saving user data.");
                });
        }
    </script>

    <footer class="fixed-bottom text-center small text-muted py-2"
        style="position: static; bottom: 0; left: 0; width: 100%; z-index: 1; margin-top: 20px;">
        <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">Friends</a>. All rights reserved.
        </p>
    </footer>
</x-menuLayout>
