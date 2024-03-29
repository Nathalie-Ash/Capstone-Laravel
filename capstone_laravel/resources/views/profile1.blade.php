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
                        <label for="staticUsername" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                value="John Doe">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label" style="text-align: left;">Email</label>
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
                                                <i class="fa fa-calendar" id="calendar-icon"></i>
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

        window.location.href = "profile2.html";
    }
</script>

</x-menuLayout>