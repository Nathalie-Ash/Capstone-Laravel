<x-menuLayout>

    <head>
        <link rel="stylesheet" href="/styleN.css">
    </head>

    <div>
        <img
            style="width: 10%; height: 50px; padding-bottom: 10px; padding-left: 5%;margin-left:5%;"src={{ asset('images/star.png') }}>
        <span style="font-size: 35px;">My Connections</span>
    </div>


    <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
        <div class="container text-center">

            {{-- <div class="row" style="border: 2px solid black; display: flex; align-items: center; border-radius: 5px;">
                <div class="col-sm-2">
                    <img src="https://orig00.deviantart.net/d7b0/f/2011/166/d/4/avatar_100x100_by_demonfox_zephz-d3iyw6a.png"
                        style="width: 45%; margin: 5px; float: left; margin-left: 15px;">
                </div>
                <div class="col-sm-2" style="float: left;">
                    <p class="textStyle" style="text-align: left; font-size: 30px; padding: 0; margin: 0;">John Doe</p>
                    <p style="text-align: left; font-weight: lighter; padding: 0;">7 Mutual friends</p>
                </div>
                <div class="col-sm-8">
                    <a href="#" class="btn"
                        style="background-color: #579792; width: 15%; border-left: 20px; color: white; font-size: larger; float: right; margin-left: 20px;"
                        data-bs-toggle="modal" data-bs-target="#contactInfoModal"> Share</a>

                    <a class="btn"
                        style="background-color:#FF6F28; width: 25%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 20px;">View
                        Profile</a>
                    <button type="button" class="btn btn-secondary"
                        style="width: 15%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">Remove</button>

                </div>
            </div> --}}
            @if ($connections->isEmpty())
                <p>
                <h2>No Current Connections</h2>
                </p>
            @else
                @foreach ($connections as $connection)
                    <div class="row"
                        style="border: 2px solid black; display: flex; align-items: center; border-radius: 5px;">


                        @php
                            $senderId = $connection->sender->id;
                            $userImage = $userImages[$senderId] ?? null;
                        @endphp
                        @if ($userImage)
                            <img src="{{ asset($userImage) }}"
                                style="width: 100px;height: 50px;border-radius:50%; margin: 5px; float: left; margin-left: 15px;">
                        @else
                            <!-- Display a default image if no user image is available -->
                            <img src="{{ asset('images/default_profile.png') }}"
                                style="width: 100px; margin: 5px; float: left; margin-left: 15px;">
                        @endif



                        <div class="col-sm-2" style="float: left;">
                            <p class="textStyle"
                                style="text-align: left; font-size: 30px; padding: 0; margin: 0;width: max-content;">
                                {{ $connection->sender->name }}</p>
                            <p style="text-align: left; font-weight: lighter; padding: 0;">7 Mutual friends</p>
                        </div>
                        <div class="col-sm-8">

                            @if ($sentContact)
                            <!-- Connection exists, display "Requested" button -->
                            {{-- <a class="btn" style="background-color: #579792; width: 15%; border-left: 20px; color: white; font-size: larger; float: right; margin-left: 20px;"
                            data-bs-toggle="modal" data-bs-target="#contactInfoModal" disabled> Shared</a> --}}
                            <button class="btn btn-primary" style="border: none;background-color: #579792; width: 15%; border-left: 20px; color: white; font-size: larger; float: right; margin-left: 20px;" disabled>Shared</button>
                        @else
                            <!-- No connection exists, display "Add Friend" button -->
                            <a href="#" class="btn"
                            style="background-color: #579792; width: 15%; border-left: 20px; color: white; font-size: larger; float: right; margin-left: 20px;"
                            data-bs-toggle="modal" data-bs-target="#contactInfoModal"> Share</a>
                        @endif
                          
                            <a href="{{ route('user.profile', ['id' => $connection->sender->id]) }}" class="btn"
                                style="background-color:#FF6F28; width: 25%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 20px;">View
                                Profile</a>
                            {{-- <button type="button" class="btn btn-secondary"
                                style="width: 15%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">Remove</button> --}}
                        
                                <a href="{{ route('remove.connection', ['connectionid' => $connection->id]) }}" class="btn" 
                                    style=" background-color: black;width: 15%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">Remove</a>
                                
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="modal fade" id="contactInfoModal" tabindex="-1" aria-labelledby="contactInfoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('sendContact') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contactInfoModalLabel">Enter Contact Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Enter your phone number and/or instagram to help others connect with you.
                            <div style="padding-top: 4%;">
                                <div class="mb-3 row">
                                    <label for="phone" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">Phone Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="phone" name ="phone_number"
                                            style="width: 80%;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="instagram" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">Instagram</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="instagram" name ="instagram"
                                            style="width: 80%;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="phone" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">Tik Tok</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="tiktok" name ="tiktok"
                                            style="width: 80%;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="instagram" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">linkedIN</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="linkedIn" name ="linkedIn"
                                            style="width: 80%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                            <button type="submit" class="btn btn-secondary"
                                style="background-color:#FF6F28 ">Send</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>


    </div>


        </x-menuLayout>
