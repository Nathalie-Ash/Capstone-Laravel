
<html>
    
    

    <!doctype html>
    <html lang="en">
      <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="./styles/stylej.css"> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
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
        header{
            margin-left: 18%;
        }
        @media (min-width: 992px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                width: 240px;
                padding-top: 58px; /* Height of navbar */
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
            width: 100%; /* Adjusted width */
           /* max-width: 300px;  Added max-width */
            margin: 0 auto; /* Center the card */
            border-radius: 10px;
            overflow: hidden;
            /* max-height: 150px; Adjusted max-height */
            overflow-y: auto;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .progress-container {
            display: flex;
            align-items: center; /* Center items vertically */
        }
        .progress-bar {
            background-color: #579792; /* Set the desired color */
        }
        .progress-wrapper {
            flex: 1; /* Take up remaining space */
            margin-left: 10px; /* Add some space between MATCH and progress bar */
        }
        
        .progress {
            width: 100%;
        }
        
       /*  .card-img-top {
            width: 70%;
            height:75%;
            margin: 0 auto;
        }*/
        #div1.col, #div2.col, #div3.col, #div4.col{
    
            color: black;
            background-color: #DCDCDF;
            border: white solid px;
            border-radius: 5%;
            margin: 5px;
            padding: 20px;
            margin-top: 30px;
            height: 85%;
            width: 49%;
        }
        #input-text, textarea { 
            background-color: #579792;
        }
        

    </style>
    </head>
    <body>
     <main class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="card"  style="background-color:#f7f5f5;">
                        <img  src="../Assets/placeholder.png" class="card-img-top" alt="...">
                    
                        <div class="card-body">
                        <h1 class="card-title">JOHN DOE</h1>
                        <H4>COMPUTER SCIENCE, BEIRUT CAMPUS</H4>
                        <p class="card-text">A first year computer science student who is looking for people who like video games, board games and chess </p>
                   
                            <div class="progress-container">
                                <span>MATCH:</span>
                                <div class="progress-wrapper">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="background-color:#579792;"></div>
                                    </div>
                                </div>
                                <span>80%</span>
                            </div>
                            
                          
                        <div style="display:flex; margin-top:1%; justify-content: space-between">
                            <a href="#" class="btn btn-primary" style=" border: none;width:49%; background-color:#ff6f28; color: white">VIEW PROFILE</a>
                            <a href="#" class="btn btn-primary" style="border: none;width:49%; background-color:#ff6f28; color: white" >QUICK ADD</a>

                        </div>
                        </div>
                     </div>
                </div>
                <div class="col-md-7">
                
                    <div class="container text-center" style="width: 100%;">
                        <div class="row row-cols-2">
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
        </div>
    </main>

</body>
</html>
  
<script>
    
</script>