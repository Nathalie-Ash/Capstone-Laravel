<x-menuLayout>

    <head>
        <link rel="stylesheet" href="/styleN.css">
    </head>

    <div>

        <span style="font-size: 35px;">
            <i class="fas fa-star fa-lg md-3" style="font-size: 50px; color: #8971f6;margin-left:10%;text-align: start;vertical-align: sub;"></i>
            The Users</span>
    </div>


    <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
        <div class="container text-center">

            @if ($users->isEmpty())
                <p>
                <h2>No Current Users</h2>
                </p>
            @else
                @foreach ($users as $user)
                    <div class="row"
                        style="border: 2px solid black; display: flex; align-items: center; border-radius: 5px;">


                        @php
                            $userImage = $userImages[$user->id];
                        @endphp
                        <img src="{{ asset($userImage) }}"
                            style="width: 100px;height: 50px;border-radius:50%; margin: 5px; float: left; margin-left: 15px;">


                        <div class="col-sm-2" style="float: left;">
                            <p class="textStyle"
                                style="text-align: left; font-size: 30px; padding: 0; margin: 0;width: max-content;">
                                {{ $user->name }}</p>
                            {{-- <p style="text-align: left; font-weight: lighter; padding: 0;">{{$mutualConnections[$user->id]}} mutual connections</p> --}}
                        </div>
                        <div class="col-sm-8">

                            <!-- No connection exists, display "Add Friend" button -->
                            {{-- <a href="#" class="btn"
                                style="background-color: #579792; width: 15%; border-left: 20px; color: white; font-size: larger; float: right; margin-left: 20px;"
                                data-bs-toggle="modal" data-bs-target="#contactInfoModal"> Share</a> --}}

                            <a href="{{ route('user.profile', ['id' => $user->id]) }}" class="btn"
                                style="background-color:#FF6F28; width: 25%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 20px;">View
                                Profile</a>
                            {{-- <a href="{{ route('remove.connection', ['connectionid' => $user->id]) }}" class="btn" 
                                style=" background-color: black;width: 15%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">Remove</a> --}}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {{-- <div class="modal fade" id="contactInfoModal" tabindex="-1" aria-labelledby="contactInfoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('sendContact', ['connectionid' => $user->id]) }}" method="POST">
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
        </div> --}}

    </section>

</x-menuLayout>
