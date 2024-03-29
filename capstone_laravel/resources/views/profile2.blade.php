
<x-menuLayout>
<head>
   <link rel="stylesheet" href="/styleN.css">
   

</head>

    <div id="topNav" style="width: 80%;text-align: center;margin: auto;">

        <img style="width: 8%; height: 50px; padding-bottom: 10px;float:left;margin-top: 10px;" src={{ asset('images/star.png') }}>
        <span style="font-size: 35px;padding-top: 20px;margin-top: 10px;">Personal Information</span>
        <div style="display:inline;float: right;text-align: right;margin-top: 10px;width: 50%;">
            <button type="button" onclick="goToNextPage()" class="btn"
                style="background-color:#FF6F28; width: 20%;border-right:30px;color:white;font-size: larger; margin-left: 30px;">Edit</button>

            <button type="button" class="btn btn-secondary"
                style=" width: 20%;color:white;font-size: larger;">Save</button>

        </div>


    </div>

    <section id="steps" style="padding-top:0px;padding-left: 30px;display: flex; flex-direction: column;">
        <div class="container text-center">

            <div class="container text-center" style="width: 100%;">
                <div class="row row-cols-2">

                    <div class="col" id="div1">Info
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label">School</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="School of Arts and Sciences">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label">Major</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Computer Science">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label">Minor</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Mathematics">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label">Campus</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Beirut">
                            </div>
                        </div>
                    </div>
                    <div class="col" id="div2"
                        style="display: flex; flex-direction: column; justify-content: center; align-items: center; ">
                        Bio
                        <input class="form-control" type="text" value="Readonly input here..."
                            aria-label="readonly input example"
                            style="background-color: #c2c2c2; height: 90%; width: 95%; text-align: left;">
                    </div>

                    <div class="col" id="div3">Outdoor Activites
                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="staticUsername" class="col-sm-2 col-form-label"
                                style="width:fit-content;">Activity 1</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Running">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label"
                                style="width:fit-content;">Activity 2</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Swimming">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label"
                                style="width:fit-content;">Activity 3</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Skiing">
                            </div>
                        </div>
                    </div>
                    <div class="col" id="div4">Indoor Activites
                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="staticUsername" class="col-sm-2 col-form-label"
                                style="width:fit-content;">Activity 1</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Reading">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label"
                                style="width:fit-content;">Activity 2</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Playing Music">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label"
                                style="width:fit-content;">Activity 3</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Knitting">
                            </div>
                        </div>
                    </div>
                    <div class="col" id="div5">Movies/Series
                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="staticUsername" class="col-sm-2 col-form-label" style="width:fit-content;">Genre
                                1</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Comedy">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label" style="width:fit-content;">Genre
                                2</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Romance">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label" style="width:fit-content;">Genre
                                3</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Sci-Fi">
                            </div>
                        </div>
                    </div>
                    <div class="col" id="div6">Music Genres

                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="staticUsername" class="col-sm-2 col-form-label" style="width:fit-content;">Genre
                                1</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Rap">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label" style="width:fit-content;">Genre
                                2</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="Indie">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label" style="width:fit-content;">Genre
                                3</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="RnB">
                            </div>
                        </div>
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

</x-menuLayout>