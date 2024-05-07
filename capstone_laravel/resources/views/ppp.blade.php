<html>
<h1>it works!</h1>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        /* CSS styles here */
    </style>
</head>

<body>

    <x-menuLayout>
        <header>
            <span style="font-size: 35px;">
                <i class="fas fa-star fa-lg md-3"
                    style="font-size: 50px; color: #8971f6;margin-left:10%;text-align: start;vertical-align: sub;"></i>
                User Profile
            </span>
        </header>

        <main class="main-content">
            <div class="container">
                <div class="row">
                    <!-- Card 1: User Profile -->
                    <div class="col-md-4">
                        <div class="card" style="background-color:#f7f5f5;margin-bottom: 40px;">
                            <!-- User's Avatar -->
                            <img src="{{ asset($userPreferences->avatar) }}" class="card-img-top"
                                style="height: 285px;object-fit: cover;">

                            <div class="card-body">
                                <!-- User's Name, Major, Campus, Description -->
                                <h1 class="card-title" style="font-size: 25px;">{{ $user->name }}</h1>
                                <p style="font-size: 15px; font-weight: lighter; margin-bottom: 0px;">
                                    {{ $userPreferences->major }}, {{ $userPreferences->campus }}</p>
                                <div class="scrollable-description" style="max-height: 100px; overflow-y: auto;">
                                    <p class="card-text" style="font-weight: normal; font-size: 13px;">
                                        {{ $userPreferences->description }}</p>
                                </div>
                                <!-- Matching Percentage -->
                                <div class="progress-container">
                                    <span>MATCH:</span>
                                    <div class="progress-wrapper">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $matchingPercentage }}%"
                                                aria-valuenow="{{ $matchingPercentage }}" aria-valuemin="0"
                                                aria-valuemax="100" style="background-color:#579792;"></div>
                                        </div>
                                    </div>
                                    <span>{{ $matchingPercentage }}%</span>
                                </div>
                                <!-- Connection Buttons -->
                                <div style="display:flex; margin-top:1%; justify-content: space-between">
                                    @if ($isConnection)
                                        <a href="#" class="btn"
                                            style="background-color: #579792; width: 55%; color: white; font-size: larger; float: right;"
                                            data-bs-toggle="modal" data-bs-target="#contactInfoModal"> View contact</a>
                                        <a href="{{ route('remove.connection', ['connectionid' => $userPreferences->user_id]) }}"
                                            class="btn btn-primary"
                                            style="border: none;width:40%; background-color:#ff6f28; color: white;">REMOVE</a>
                                    @else
                                        @if ($existingConnection)
                                            <button class="btn btn-primary"
                                                style="border: none;width:98%; background-color:#579792; color: white"
                                                disabled>Requested</button>
                                        @else
                                            <a href="{{ route('add.profile', ['profileId' => $userPreferences->user_id]) }}"
                                                class="btn btn-primary"
                                                style="border: none;width:98%; background-color:#579792; color: white">ADD
                                                FRIEND</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Outdoor Activities -->
                    <div class="col-md-4">
                        <div style="margin-top: -40px;margin-bottom: 40px;">
                            <div class="text-center">
                                <img class="animated-element" src="{{ asset('images/image1.png') }}">
                            </div>
                            <div class="col" id="div1">Outdoor Activites
                                <!-- List of Outdoor Activities -->
                                <div class="mb-3 row" style="margin-top: 10px;">
                                    <label for="staticUsername" class="col-sm-2 col-form-label"
                                        style="width:fit-content;">Activity 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext"
                                            id="staticUsername" value="{{ $userPreferences->outdoorItem1 }}">
                                    </div>
                                </div>
                                <div class="mb-3 row" style="margin-top: 10px;">
                                    <label for="staticUsername" class="col-sm-2 col-form-label"
                                        style="width:fit-content;">Activity 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext"
                                            id="staticUsername" value="{{ $userPreferences->outdoorItem2 }}">
                                    </div>
                                </div>
                                <div class="mb-3 row" style="margin-top: 10px;">
                                    <label for="staticUsername" class="col-sm-2 col-form-label"
                                        style="width:fit-content;">Activity 3</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext"
                                            id="staticUsername" value="{{ $userPreferences->outdoorItem3 }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Indoor Activities -->
                    <div class="col-md-4">
                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="staticUsername" class="col-sm-2 col-form-label"
                                style="width:fit-content;">Activity 1</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="{{ $userPreferences->indoorItem1 }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label"
                                style="width:fit-content;">Activity 2</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="{{ $userPreferences->indoorItem2 }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticUsername" class="col-sm-2 col-form-label"
                                style="width:fit-content;">Activity 3</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                    value="{{ $userPreferences->indoorItem3 }}">
                            </div>
                        </div>
                    </div>

                    <!-- Card 4: Movies/Series -->
                    <div class="col-md-4">
                        <div style ="margin-top: -40px;margin-bottom: 40px;">
                            <div class="text-center">
    
                                <img class="animated-element" src={{ asset('images/image1.png') }}>
                            </div>
                            <div class="col" id="div3">Movies/Series
                                <div class="mb-3 row" style="margin-top: 10px;">
                                    <label for="staticUsername" class="col-sm-2 col-form-label"
                                        style="width:fit-content;">Genre 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                            value="{{ $userPreferences->movieItem1 }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticUsername" class="col-sm-2 col-form-label"
                                        style="width:fit-content;">Genre 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                            value="{{ $userPreferences->movieItem2 }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticUsername" class="col-sm-2 col-form-label"
                                        style="width:fit-content;">Genre 3</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                            value="{{ $userPreferences->movieItem3 }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 5: Music Genres -->
                    <div class="col-md-4">
                        <!-- Similar structure as Card 2 -->
                        <div class="text-center">

                            <img class="animated-element" src={{ asset('images/image1.png') }}>
                        </div>
                        <div class="col" id="div4">Music Genres

                            <div class="mb-3 row" style="margin-top: 10px;">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre 1</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                        value="{{ $userPreferences->musicItem1 }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre 2</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                        value="{{ $userPreferences->musicItem2 }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label"
                                    style="width:fit-content;">Genre 3</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="staticUsername"
                                        value="{{ $userPreferences->musicItem3 }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 6: Timetable -->
                    <div class="col-md-4">
                        <div style ="margin-top: -40px;margin-bottom: 40px;">
                            <!-- Timetable Content -->
                            <div class="text-center">
                                <img class="animated-element" src="{{ asset('images/image1.png') }}">
                            </div>
                            <div class="col" id="div3">Timetable
                                
                <div class="mb-3 row" style="margin-top: 10px;">
                    <div style="display: flex; align-items: center;">
                        @if ($isConnection)
                            @if ($userPreferences->timetable_path)
                                <p
                                    style="border-radius: 5%; padding: 5px; font-weight: normal; margin-right: 10px;">
                                    Find out if you have common classes or similar free times!
                                </p>
                                <a href="{{ asset($userPreferences->timetable_path) }}"
                                    style="padding-bottom: 14px;">View Timetable</a>
                            @else
                                <p>User time table not available</p>
                            @endif
                       
                    </div>
                  @else
                            <p style="border-radius: 5%; padding: 5px; font-weight: normal; margin-right: 10px;"> 
                                Add user as a connection to view their time table!!</p> 

                    @endif

                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Contact Info Modal -->
        <div class="modal fade" id="contactInfoModal" tabindex="-1" aria-labelledby="contactInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactInfoModalLabel">View Contact Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @if($sharedContact)
                        <div class="modal-body">
                            Connect with others by contacting them via phone number or Instagram.
                            <div style="padding-top: 4%;">
                                <div class="mb-3 row">
                                    <label for="phone" class="col-sm-4 col-form-label" style="text-align: left; padding-left: 4.5%;">Phone Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="phone" style="width: 80%; background-color: #579792; border-radius:10%; padding-left: 10px" value="{{ $sharedContact->phone_number }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="instagram" class="col-sm-4 col-form-label" style="text-align: left; padding-left: 4.5%;">Instagram</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="instagram" style="width: 80%; background-color: #579792; border-radius:7%; padding-left: 10px" value="{{ $sharedContact->instagram }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tiktok" class="col-sm-4 col-form-label" style="text-align: left; padding-left: 4.5%;">Tik Tok</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="tiktok" style="width: 80%; background-color: #579792; border-radius:10%; padding-left: 10px" value="{{ $sharedContact->tiktok }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="linkedIn" class="col-sm-4 col-form-label" style="text-align: left; padding-left: 4.5%;">LinkedIn</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="linkedIn" style="width: 80%; background-color: #579792; border-radius:7%; padding-left: 10px" value="{{ $sharedContact->linkedIn }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p style="padding: 2%;">No shared contact information available.</p>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="fixed-bottom text-center small text-muted py-2"
            style="position: static; bottom: 0; left: 0; width: 100%; z-index: 1; margin-top: 20px;">
            <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">Friends</a>. All rights
                reserved.</p>
        </footer>
    </x-menuLayout>

</body>

</html>
