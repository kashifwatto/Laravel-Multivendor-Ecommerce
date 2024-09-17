<!DOCTYPE html>
<html lang="en">
<head>
    @include('inc.style')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Active Bids</title>
</head>
<body>
    @include('seller.header')
    @include('seller.sidebar')
    @include('seller.modals.addnewproduct')
    <main id="main" class="main">
        @if (session('message'))
            <div class="alert alert-success flash-message border-0 text-light" style="background: #6AB716" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="pagetitle">
            <h1 class="text-center">All Active Bids</h1>
            <p>Add product if you want to sell buy oction </p>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mx-3">
                                @foreach ($oction as $item)
                                    <div class="col-md-4 my-2">
                                        <div class="card" style="">
                                            <img src="{{ url('public/uploadedimages/product/' . $item->product->image) }}"
                                                class="card-img-top" height="300px;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->product->name }}</h5>
                                                <p class="card-text">{{ $item->product->description }} </p>
                                                <p class="card-text">Heighest Bid Rang: Rs.{{ $item->amount }}</p>
                                                <a href="{{ url('seller/closeauction/' . $item->id) }}"> <button
                                                        type="button" class="btn btn-primary">Close Auction
                                                    </button></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
@include('inc.scripts')
</html>
