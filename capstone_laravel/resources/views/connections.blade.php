<x-menuLayout>
<head>
    <link rel="stylesheet" href="/styleN.css">
</head>

    <div >
        <img style="width: 10%; height: 50px; padding-bottom: 10px; padding-left: 5%;margin-left:5%;"src={{ asset('images/star.png') }}
        >
        <span style="font-size: 35px;">My Connections</span>
    </div>
 
        
        <section id="steps" style="padding-top: 20px;padding-left: 30px;display: flex; flex-direction: column;">
            <div class="container text-center">
                @if ($connections->isEmpty())
                   <p> <h2>No Current Connections</h2></p>
                @else
                    @foreach($connections as $connection)
                    <div class="row" style="border: 2px solid black; display: flex; align-items: center; border-radius: 5px;">
                        <div class="col-sm-2">
                            <img src="https://orig00.deviantart.net/d7b0/f/2011/166/d/4/avatar_100x100_by_demonfox_zephz-d3iyw6a.png" style="width: 45%; margin: 5px; float: left; margin-left: 15px;">
                        </div>
                        <div class="col-sm-2" style="float: left;">
                            <p class="textStyle" style="text-align: left; font-size: 30px; padding: 0; margin: 0;">{{ $connection->sender->name }}</p>
                            <p style="text-align: left; font-weight: lighter; padding: 0;">7 Mutual friends</p>
                        </div>
                        <div class="col-sm-8">
                            <a href="{{ route('user.profile', ['name' => $connection->sender->name]) }}" class="btn" style="background-color:#FF6F28; width: 25%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">View Profile</a>
                            <button type="button" class="btn btn-secondary" style="width: 15%; border-left: 30px; color: white; font-size: larger; float: right; margin-left: 30px;">Remove</button>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>


    </section>


    </div>
    <script src="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>

        $(function () {
            $('#datepicker').datepicker();
        });

        // function goToNextPage() {

        //     window.location.href = "profile2";
        // }


</x-menuLayout>