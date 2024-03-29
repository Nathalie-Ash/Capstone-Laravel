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
    <div>
        <img
            style="width: 10%; height: 50px; padding-bottom: 10px; padding-left: 5%;margin-left:5%;"src={{ asset('images/star.png') }}>
        <span style="font-size: 35px;">User Profile</span>
    </div>
    <main class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="background-color:#f7f5f5;">
                        <img src={{ asset('images/placeholder.png') }} class="card-img-top" style="height: 20%;">

                        <div class="card-body">
                            <h1 class="card-title" style="font-size: 30px;">John Doe</h1>
                            <p style="font-size: 15px; font-weight: lighter">Computer Science, Beirut Campus
                            <p>
                            <p class="card-text" style=" font-weight: normal">A first year computer science student who
                                is looking for people who
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
                                <a href="#" class="btn btn-primary"
                                    style=" border: none;width:49%; background-color:#579792; color: white">ADD
                                    FRIEND</a>
                                <a href="#" class="btn btn-primary"
                                    style="border: none;width:49%; background-color:#ff6f28; color: white">REMOVE</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="margin-top: -40px">
                    <div>
                        <div class="text-center">

                            <img class="animated-element" src={{ asset('images/image1.png') }}>
                        </div>
                        <div class="col" id="div1">Outdoor Activites
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

                        <div class="text-center">

                            <img class="animated-element" src={{ asset('images/image1.png') }}>
                        </div>
                        <div class="col" id="div2">Indoor Activites
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
                    </div>
                </div>
                <div class="col-md-4" style="margin-top: -40px">
                    <div>
                        <div class="text-center">

                            <img class="animated-element" src={{ asset('images/image1.png') }}>
                        </div>
                        <div class="col" id="div3">Movies/Series
                            <div class="mb-3 row" style="margin-top: 10px;">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre 1</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                        value="Comedy">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre 2</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                        value="Romance">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre 3</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                        value="Sci-Fi">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">

                            <img class="animated-element" src={{ asset('images/image1.png') }}>
                        </div>
                        <div class="col" id="div4">Music Genres

                            <div class="mb-3 row" style="margin-top: 10px;">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre 1</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                        value="Rap">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre 2</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                        value="Indie">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre 3</label>
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
    </main>

    </body>

    </html>

</x-menuLayout>
