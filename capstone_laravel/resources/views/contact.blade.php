<x-menuLayout>

    <head>
        <link rel="stylesheet" href="/styleN.css">
    </head>

    <div>
        <img
            style="width: 10%; height: 50px; padding-bottom: 10px; padding-left: 5%;margin-left:5%;"src={{ asset('images/star.png') }}>
        <span style="font-size: 35px;">My Received Contacts</span>
    </div>


    <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
        <div class="container text-center">


            @if ($receivedContacts->isEmpty())
                <p>
                <h2>No Current Received Contacts</h2>
                </p>
            @else
                @foreach ($receivedContacts as $contact)
                    <div class="row"
                        style="border: 2px solid black; display: flex; align-items: center; border-radius: 5px;">


                        @php
                            $senderId = $contact->sender->id;
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
                                {{ $contact->receiver_name }}</p>
                        </div>
                        <div class="col-sm-8">

                            @if ($receivedContacts->isEmpty())
                                <p> No info shared</p>
                            @else
                                <!-- No connection exists, display "Add Friend" button -->
                                <a href="#" class="btn"
                                    style="background-color: #579792; width: max-content; border-left: 20px; color: white; font-size: larger; float: right; margin-left: 20px;"
                                    data-bs-toggle="modal" data-bs-target="#contactInfoModal"> View Contact Information</a>
                            @endif

                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="modal fade" id="contactInfoModal" tabindex="-1" aria-labelledby="contactInfoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactInfoModalLabel">View Contact Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    @if (!$receivedContacts->isEmpty())
                        
                        <div class="modal-body">
                            Connect with others by contacting them via phone number or instagram.
                            <div style="padding-top: 4%;">
                                <div class="mb-3 row">
                                    <label for="phone" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">Phone Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="phone"
                                            style="width: 80%; background-color: #579792;border-radius:10%; padding-left: 10px"
                                            value={{ $contact->phone_number }}>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="instagram" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">Instagram</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="phone"
                                            style="width: 80%;background-color: #579792;border-radius:7%; padding-left: 10px"
                                            value={{ $contact->instagram }}>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="phone" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">Tik Tok</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="phone"
                                            style="width: 80%; background-color: #579792;border-radius:10%; padding-left: 10px"
                                            value={{ $contact->tiktok }}>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="instagram" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">linkedIn</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="phone"
                                            style="width: 80%;background-color: #579792;border-radius:7%; padding-left: 10px"
                                            value={{ $contact->linkedIn }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @else
                        <p>No shared contact information available.</p>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                    </div>
                </div>
            </div>

        </div>
</x-menuLayout>
