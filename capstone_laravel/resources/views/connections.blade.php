<x-menuLayout>

    <head>
        <link rel="stylesheet" href="/styleN.css">
    </head>

    <div>

        <span style="font-size: 35px;">
            <i class="fas fa-star fa-lg md-3"
                style="font-size: 50px; color: #8971f6;margin-left:10%;text-align: start;vertical-align: sub;"></i>
            My Connections</span>
    </div>


    <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
        <div class="container text-center">

            @if ($connections->isEmpty())
                <p>
                <h2>No Current Connections</h2>
                </p>
            @else
                @foreach ($connections as $connection)
                    <div class="row"
                        style="border: 2px solid black; display: flex; align-items: center; border-radius: 5px;">


                        <div class="col-md-2">
                            @php
                                $senderId = $connection->sender->id;
                                $userImage = $userImages[$senderId] ?? null;
                            @endphp
                            @if ($userImage)
                                <img src="{{ asset($userImage) }}"
                                    style="width: 80px;height: 80px;border-radius:50%; margin: 5px; margin-left: 15px;object-fit:cover">
                            @else
                                <img src="{{ asset('images/default_profile.png') }}"
                                    style="width: 100px; margin: 5px; margin-left: 15px;">
                            @endif
                        </div>
                        <div class="col-md-5">

                            <p class="textStyle"
                                style="text-align: left; font-size: 25px; padding: 0; margin: 0;width: max-content;">
                                {{ $connection->sender->name }}</p>
                            <p style="text-align: left; font-weight: lighter; padding: 0;width: max-content">
                                {{ $mutualConnections[$senderId] }} mutual connections</p>
                        </div>
                        <div class="col-md-5">
                            <div class="text-right" style="margin-bottom: 10px;margin-top: 10px;">
                                @if (isset($sentContact[$connection->sender->id]))
                                    <button class="btn btn-primary"
                                        style="border: none;background-color: #579792; color: white; font-size: larger; margin-left: 20px;"
                                        disabled>Shared</button>
                                @else
                                    <a href="#" class="btn"
                                        style="background-color: #579792; color: white; font-size: larger; margin-left: 20px;"
                                        data-bs-toggle="modal" data-bs-target="#contactInfoModal"> Share</a>
                                @endif

                                <a href="{{ route('user.profile', ['id' => $connection->sender->id]) }}"
                                    class="btn"
                                    style="background-color:#FF6F28; color: white; font-size: larger; margin-left: 20px;">View
                                    Profile</a>
                                <a href="{{ route('remove.connection', ['connectionid' => $connection->sender->id]) }}"
                                    class="btn"
                                    style=" background-color: black; color: white; font-size: larger; margin-left: 20px;">Remove</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        @if (!$connections->isEmpty())
            <div class="modal fade" id="contactInfoModal" tabindex="-1" aria-labelledby="contactInfoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('sendContact', ['connectionid' => $connection->sender->id]) }}"
                        method="POST">
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
                                            <input type="text" class="form-control-plaintext" id="phone"
                                                name="phone_number" style="width: 80%;">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="instagram" class="col-sm-4 col-form-label"
                                            style="text-align: left; padding-left: 4.5%;">Instagram</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control-plaintext" id="instagram"
                                                name="instagram" style="width: 80%;">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="phone" class="col-sm-4 col-form-label"
                                            style="text-align: left; padding-left: 4.5%;">Tik Tok</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control-plaintext" id="tiktok"
                                                name="tiktok" style="width: 80%;">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="instagram" class="col-sm-4 col-form-label"
                                            style="text-align: left; padding-left: 4.5%;">linkedIN</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control-plaintext" id="linkedIn"
                                                name="linkedIn" style="width: 80%;">
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
        @endif

    </section>


    </div>

    @if (count($connections) >= 9)
        <footer class="fixed-bottom text-center small text-muted py-2"
            style="position: static; bottom: 0; left: 0; width: 100%; z-index: 1; margin-top: 20px;">
            <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">Friends</a>. All rights reserved.
            </p>
        </footer>
    @else
        <footer class="fixed-bottom text-center small text-muted py-2"
            style="position: fixed; bottom: 0; left: 0; width: 100%; z-index: 1; margin-top: 20px;">
            <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">Friends</a>. All rights
                reserved.
            </p>
        </footer> 
        </footer> 
        
        </footer>
        
    @endif
</x-menuLayout>

