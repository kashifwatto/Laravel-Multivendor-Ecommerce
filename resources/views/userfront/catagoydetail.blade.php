<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.style')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $catagory->name }}</title>

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

    <div class="container-fluid m-4 p-4 productcontainer">
        <h1 class="text-center">{{ $catagory->name }}</h1>
        <p class="text-center">{{ $catagory->description }}</p>

        <div class="row mx-3">
            @if ($products->isEmpty())
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        No products availble in this catagory.
                    </div>
                </div>
            @else
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
            @endif
        </div>

    </div>






    {{-- modals here --}}
    @include('userfront.modals.becomeaseller')
    @include('userfront.footer')
</body>
@include('inc.scripts')

</html>
