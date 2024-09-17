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
    @include('seller.header')
    @include('seller.sidebar')
    @include('seller.modals.addnewproduct')


    <main id="main" class="main">
        @if (session('message'))
        <div class="alert alert-success flash-message border-0 text-light" style="background: #6AB716"
            role="alert">
            {{ session('message') }}
        </div>
        @endif

        <div class="pagetitle">
            <h1 class="text-center">Auction Page</h1>
            <p>Add product if you want to sell buy Auction </p>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('/seller/saveoction') }}" method="post" >
@csrf
                                <div class="mb-3">
                                    <label class="form-label">Select Product:</label>
                                    <select class="form-select" name="product" aria-label="Default select example">
                                        <option>Select a product</option>
                                        @foreach ($products as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Oction Ends in how many days:</label>
                                    <select class="form-select" name="days" aria-label="Default select example">
                                        <option>Select days</option>

                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>


                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Start Oction</button>
                            </form>


                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>


</body>
@include('inc.scripts')


</html>
