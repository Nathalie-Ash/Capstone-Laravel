<x-menuLayout>

    <head>
        <link rel="stylesheet" href="/styleN.css">
    </head>
    <div>
        <img
            style="width: 10%; height: 50px; padding-bottom: 10px; padding-left: 5%;margin-left:5%;"src={{ asset('images/star.png') }}><span
            style="font-size: 35px;">My Requests</span>
    </div>

    <div>


        <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
            <div class="container text-center">
                @if ($requests->isEmpty())
                      <p> <h2>No Current Requests</h2></p>
                @else
                    @foreach($requests as $request)
                    <div class="row"
                        style="border: 2px solid black; display: flex; align-items: center; border-radius: 5px;">
                        <div class="col-sm-2">
                            
                            <img src="https://orig00.deviantart.net/d7b0/f/2011/166/d/4/avatar_100x100_by_demonfox_zephz-d3iyw6a.png" class="rounded-circle"
                                style="width: 45%; margin: 5px;float: left;margin-left: 15px;">
                        </div>
                        <div class="col-sm-2" style="float: left;">
                            <p class="textStyle" style="text-align: left; font-size: 30px; padding: 0p; margin: 0px;width: max-content;">
                                {{ $request->sender->name }}</p>
                            <p style="text-align: left; font-weight: lighter; padding: 0px;">7
                                Mutual friends</p>
                        </div>
                        <div class="col-sm-8" >
                            <form action="{{ route('user.profile', ['name' => $request->sender->name]) }}">
                               @csrf
                                <button type="submit" class="btn" style="background-color:#1b413d; width: 25%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;margin-top:16px;">View Profile</button>
                            </form>
                            <form method="POST" action="{{ route('acceptConnection') }}">
                                    @csrf
                                    <input type="hidden" name="connection_id" value="{{ $request->sender->id }}">
                                <button type="submit" class="btn" style="background-color:#579792; width: 15%; border-left: 30px; color: white; font-size: larger; float: right;float:bottom; margin-left: 30px;">Accept</button>
                            </form>
                                
                            <button type="button" class="btn"
                                style=" width: 15%; border-left: 30px; color: white; background-color:#FF6F28;font-size: larger; float: right;">Delete
                            </button>

                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

        </section>


    </div>


</x-menuLayout>
