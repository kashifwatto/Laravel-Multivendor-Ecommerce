@php
    use Carbon\Carbon;

@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.style')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auction</title>

</head>

<body>
    @include('userfront.header')
    @if (session('message'))
        <div class="alert alert-success flash-message border-0 text-light" style="background: #6AB716" role="alert">
            {{ session('message') }}
        </div>
    @elseif (session('loginfailedmessage'))
        <div class="alert alert-success flash-message border-0 text-light" style="background: #ee0909" role="alert">
            {{ session('loginfailedmessage') }}
        </div>
    @elseif (session('formerrors'))
        <div class="alert alert-success flash-message border-0 text-light" style="background: #ee0909" role="alert">
            @if (Session::has('formerrors'))
                <ul>
                    @foreach (Session::get('formerrors') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif

    <div class="container-fluid px-3 py-3 productcontainer">
        <h4 class="text-center">Auction Page</h4>

        <div class="row mx-3">

            @foreach ($oction as $item)
                @php
                    // use Carbon\Carbon;
                    $startDate = Carbon::parse($item->created_at);
                    $numberOfDays = $item->days;
                    $endDate = $startDate->copy()->addDays($numberOfDays);
                    $now = Carbon::now();
                    $daysLeft = $endDate->diffInDays($now);
                    if ($daysLeft <= 0) {
                        continue;
                    }
                @endphp

                @php
                    if (session('userid') == $item->userid) {
                        continue;
                    }
                @endphp
                <div class="col-md-4 ">
                    <div class="card" style="">
                        <img src="{{ url('public/uploadedimages/product/' . $item->product->image) }}"
                            class="card-img-top" height="300px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product->name }}</h5>
                            <p class="card-text">{{ $item->product->description }} </p>
                            <p class="card-text">Heighest Bid Rang: Rs.{{ $item->amount }}</p>



                            <p>{{ $daysLeft }} days left in oction.</p>
                            <form action="{{ url('user/openbid') }}" method="post">
                                @csrf
                                <div style="margin:5px 0px;">

                                    <input type="number" placeholder="Enter your bid amount" name="amount">
                                    <input type="hidden" name="octionid" value="{{ $item->id }}">
                                </div>
                                <button type="button" id="addtocartbtn"class="btn btn-primary"
                                    onclick="checkusersession()">Open Bid </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    <div class="container-fluid px-3 py-3 productcontainer">
        <h4 class="text-center">Your Opened Bids</h4>


        <div class="row mx-3">

            @foreach ($oction as $item)
                @php
                    // use Carbon\Carbon;
                    $startDate = Carbon::parse($item->created_at);
                    $numberOfDays = $item->days;
                    $endDate = $startDate->copy()->addDays($numberOfDays);
                    $now = Carbon::now();
                    $daysLeft = $endDate->diffInDays($now);
                    if ($daysLeft <= 0) {
                        continue;
                    }
                @endphp

                @php
                    if (session('userid') == $item->userid) {

                    }else{
                        continue;
                    }
                @endphp
                <div class="col-md-4 ">
                    <div class="card" style="">
                        <img src="{{ url('public/uploadedimages/product/' . $item->product->image) }}"
                            class="card-img-top" height="300px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product->name }}</h5>
                            <p class="card-text">{{ $item->product->description }} </p>
                            <p class="card-text">Your Bid Rang: Rs.{{ $item->amount }}</p>




                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

    @include('userfront.modals.becomeaseller')
    @include('userfront.footer')
</body>
@if (!session('userid'))
    <script>
        function checkusersession() {
            alert("Please login first before Biding");
            // e.preventDefault();

        }
    </script>
@else
    <script>
        function checkusersession() {
            const addtocartbtn = document.getElementById('addtocartbtn');
            addtocartbtn.type = 'submit';
        }
    </script>
@endif

@include('inc.scripts')

</html>
