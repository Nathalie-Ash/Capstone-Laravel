<x-menuLayout>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }
    </style>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <p
                    style="background-color:  rgba(87, 151, 146, 0.5); border-radius: 5%; padding: 4%;width: 90%; height: max-content">
                    Sent Contact Information</p>

                <div class="mb-3 row" style="padding-top: 5%">
                    <label for="user" class="col-sm-1 col-form-label" style="text-align: left; padding-left: 1%;">To:
                    </label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="phone"
                            style="width: 80%; background-color: #579792;border-radius:10%; padding-left: 10px"
                            value="John Doe">
                    </div>
                </div>
            </div>
            <div class="col">
                <p style="background-color:   rgba(87, 151, 146, 0.5); border-radius: 5%; padding: 4%;width: 90%; ">
                    Received Contact Information</p>
                @foreach ($receivedContacts as $contact)
                    
                
                <div class="mb-3 row" style="padding-top: 5%">
                    <label for="user" class="col-sm-1 col-form-label"
                        style="text-align: left; padding-left: 1%;">From: </label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="phone"
                            style="width: 70%; background-color: #579792;border-radius:10%; padding-left: 10px"
                            value={{ $contact->sender->name }}>

                    </div>
                    <div class ="col-sm-2">
                        <a href="#" class="btn"
                            style="background-color: #ff6f28; width: max-content; color: white; font-size: larger; float: right; "
                            data-bs-toggle="modal" data-bs-target="#contactInfoModal"> View contact</a>
                    </div>
                    @endforeach

                </div>
                

                


                </div>
            </div>
        </div>
        <div class="modal fade" id="contactInfoModal" tabindex="-1" aria-labelledby="contactInfoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactInfoModalLabel">View Contact Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Connect with others by contacting them via phone number or instagram.
                        <div style="padding-top: 4%;">
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-4 col-form-label"
                                    style="text-align: left; padding-left: 4.5%;">Phone Number</label>
                                <div class="col-sm-8">
                                    <input type="text"  readonly class="form-control-plaintext" id="phone" style="width: 80%; background-color: #579792;border-radius:10%; padding-left: 10px" value= {{ $contact->phone_number }}>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="instagram" class="col-sm-4 col-form-label"
                                    style="text-align: left; padding-left: 4.5%;">Instagram</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="phone" style="width: 80%;background-color: #579792;border-radius:7%; padding-left: 10px" value={{ $contact->instagram }}>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-4 col-form-label"
                                    style="text-align: left; padding-left: 4.5%;">Tik Tok</label>
                                <div class="col-sm-8">
                                    <input type="text"  readonly class="form-control-plaintext" id="phone" style="width: 80%; background-color: #579792;border-radius:10%; padding-left: 10px" value= {{ $contact->tiktok }}>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="instagram" class="col-sm-4 col-form-label"
                                    style="text-align: left; padding-left: 4.5%;">linkedIn</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="phone" style="width: 80%;background-color: #579792;border-radius:7%; padding-left: 10px" value={{ $contact->linkedIn }}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                    </div>
                </div>
            </div>

        </div>
</x-menuLayout>
