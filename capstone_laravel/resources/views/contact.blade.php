<x-menuLayout>


    <head>
        <link rel="stylesheet" href="/styleN.css">
    </head>

    <div>
        <span style="font-size: 35px;"> <i class="fas fa-star fa-lg md-3"
                style="font-size: 50px; color: #8971f6;margin-left:10%;text-align: start;vertical-align: sub;"></i>
            My Received Contacts</span>
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
                            $userId = $contact->receiver_id;
                            $senderAvatar = \App\Models\userPreferences::where('user_id', $userId)->value('avatar');

                        @endphp

                        @if ($senderAvatar)
                            <img src="{{ asset($senderAvatar) }}"
                                style="width: 100px;height: 50px;border-radius:50%; margin: 5px; float: left; margin-left: 15px;object-fit:cover">
                        @else
                            <img src="{{ asset('images/default_profile.png') }}"
                                style="width: 100px; margin: 5px; float: left; margin-left: 15px;object-fit:cover">
                        @endif


                        <div class="col-sm-2" style="float: left;">
                            <p class="textStyle"
                                style="text-align: left; font-size: 25px; padding: 0; margin: 0;width: max-content;">
                                {{ $contact->receiver_name }}</p>
                        </div>
                        <div class="col-sm-8">

                            @if ($receivedContacts->isEmpty())
                                <p> No info shared</p>
                            @else
                                <a href="#" class="btn"
                                    style="background-color: #579792; width: max-content; border-left: 20px; color: white; font-size: larger; float: right; margin-left: 20px;"
                                    data-bs-toggle="modal" data-bs-target="#contactInfoModal"> View Contact
                                    Information</a>
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
                            Connect with others by contacting them via phone number or Instagram.
                            <div style="padding-top: 4%;">
                                <div class="mb-3 row">
                                    <label for="phone" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">Phone Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="phone"
                                            style="width: 80%; background-color: #579792;border-radius:10%; padding-left: 10px"
                                            value="{{ $contact->phone_number }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="instagram" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">Instagram</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="instagram"
                                            style="width: 80%;background-color: #579792;border-radius:7%; padding-left: 10px"
                                            value="{{ $contact->instagram }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tiktok" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">Tik Tok</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="tiktok"
                                            style="width: 80%; background-color: #579792;border-radius:10%; padding-left: 10px"
                                            value="{{ $contact->tiktok }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="linkedIn" class="col-sm-4 col-form-label"
                                        style="text-align: left; padding-left: 4.5%;">LinkedIn</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="linkedIn"
                                            style="width: 80%;background-color: #579792;border-radius:7%; padding-left: 10px"
                                            value="{{ $contact->linkedIn }}">
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
        @if(count($receivedContacts)>=9)
            <footer class="fixed-bottom text-center small text-muted py-2"
                style="position: static; bottom: 0; left: 0; width: 100%; z-index: 1; margin-top: 20px;">
                <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">Friends</a>. All rights reserved.
                </p>
            </footer>
            @else
                <footer class="fixed-bottom text-center small text-muted py-2"
                style="position: fixed; bottom: 0; left: 0; width: 100%; z-index: 1; margin-top: 20px;">
                <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">Friends</a>. All rights reserved.
                </p>
            </footer> 
            
        @endif
</x-menuLayout>
