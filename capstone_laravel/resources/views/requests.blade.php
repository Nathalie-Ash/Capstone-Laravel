<x-menuLayout>

    <head>
        <link rel="stylesheet" href="/styleN.css">
    </head>
    <div>
        <span
            style="font-size: 35px;">
            <i class="fas fa-star fa-lg md-3" style="font-size: 50px; color: #8971f6;margin-left:10%;text-align: start;vertical-align: sub;"></i>
            My Requests</span>
    </div>

    <div>


        <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
            <div class="container text-center">
                @if ($requests->isEmpty())
                    <p>
                    <h2>No Current Requests</h2>
                    </p>
                @else
                    @foreach ($requests as $request)
                        <div class="row"
                            style="border: 2px solid black; display: flex; align-items: center; border-radius: 5px;">
                            <div class="col-sm-2">
                                @php
                                $senderId = $request->sender->id;
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
                                </div>
                            <div class="col-sm-2" style="float: left;">
                                <p class="textStyle"
                                    style="text-align: left; font-size: 30px; padding: 0p; margin: 0px;width: max-content;">
                                    {{ $request->sender->name }}</p>
                                <p style="text-align: left; font-weight: lighter; padding: 0px;width: max-content">{{$mutualConnections[$senderId]}} mutual connections</p>
                            </div>
                            <div class="col-sm-8">
                                <form action="{{ route('user.profile', ['id' => $request->sender->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn"
                                        style="background-color:#1b413d; width: 25%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;margin-top:16px;">View
                                        Profile</button>
                                </form>
                                <form method="POST" action="{{ route('acceptConnection') }}">
                                    @csrf
                                    <input type="hidden" name="connection_id" value="{{ $request->sender->id }}">
                                    <button type="submit" class="btn"
                                        style="background-color:#579792; width: 15%; border-left: 30px; color: white; font-size: larger; float: right;float:bottom; margin-left: 30px;">Accept</button>
                                </form>

                                <form method="POST" action="{{ route('deleteRequest') }}">
                                    @csrf
                                    <input type="hidden" name="connection_id" value="{{ $request->sender->id }}">
                                    <button type="submit" class="btn"
                                        style="background-color:#FF6F28; width: 15%; border-left: 30px; color: white; font-size: larger; float: right;float:bottom; margin-left: 30px;">Delete</button>
                                </form>
                                {{-- <button type="button" class="btn"
                                    style=" width: 15%; border-left: 30px; color: white; background-color:#FF6F28;font-size: larger; float: right;">Delete
                                </button> --}}

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </section>


    </div>


</x-menuLayout>
