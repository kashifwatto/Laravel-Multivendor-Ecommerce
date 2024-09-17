<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.style')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>

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
    {{-- MAIN INDEX START --}}


    {{-- Featured Product start  --}}
    <div class="container-fluid ml-4 mr-4 mb-4 p-4 mt-0 productcontainer">
        <h1 class="text-center">All Products</h1>

        <div class="row mx-3">
            @foreach ($products as $item)
                <div class="col-md-3 ">
                    <div class="card home-product-card" style="">
                        <img src="{{ url('public/uploadedimages/product/' . $item->image) }}" class="card-img-top"
                            height="200px;">
                        <div class="card-body">
                            <h5 class="card-title lh-1">{{ $item->name }}</h5>
                            <p class="card-text fs-6 lh-1">{{ $item->description }}</p>
                            <p class="card-text lh-1">Price:{{ $item->price }}</p>
                            <a href="{{ 'productdetails/' . $item->id }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-center">

        </div>
    </div>
    {{-- Featured Product End --}}




    {{-- MAIN INDEX END --}}

    {{-- modals here --}}
    @include('userfront.modals.becomeaseller')
    @include('userfront.footer')
</body>
@include('inc.scripts')

</html>
