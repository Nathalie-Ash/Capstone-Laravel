<x-menuLayout>

    <head>
        <link rel="stylesheet" href="/styleN.css">
    </head>




    <div>
        <img
            style="width: 10%; height: 50px; padding-bottom: 10px; padding-left: 5%;margin-left:5%;"src={{ asset('images/star.png') }}>
        <span style="font-size: 35px;">My Profile</span>
    </div>


    <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
        <div class="container text-center">
            <div class="row">

                <div class="col-6">
                    <div id="division1" style="height: 100%;">
                        <p id="step-title" style="padding-top: 0px;">Account</p>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="{{ $userData->username }}" style="width: 70%;">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-3 col-form-label"
                                style="text-align: left; padding-left: 4.5%;">Email</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="{{ $userData->email }}" style="width: 70%;">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticPass" class="col-sm-3 col-form-label"
                                style="text-align: left; padding-left: 4.5%;">Password</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="password" readonly class="form-control" id="staticPassword"
                                        value="{{ $userData->password }}"
                                        style="width: 50%; background-color: #579792; border-radius: 5%;">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"
                                            style="margin-left: 5px; background-color: #FF6F28; border: none">Reset</button>
                                    </div>
                                </div>
                            </div>


                            <section class="container">
                                <form class="row" style="padding-top: 20px;">
                                    <label for="date" class="col-sm-3 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">Birthday</label>
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
                            </section>
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
                                <div class="col-4" style="width: 50%;">
                                    <button type="submit" class="btn btn-primary mb-3"
                                        style="width: 100%;text-align: center;background-color: transparent; color:#FF6F28; border: none">Delete
                                        Account</button>
                                </div>
                            </div>
                            <div
                                style="display: flex;
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

    <script>
        function goToNextPage() {

            window.location.href = "profile2";
        }
    </script>

</x-menuLayout>
