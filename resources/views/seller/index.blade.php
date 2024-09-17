<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.style')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller Dashboard</title>
</head>

<body>
    @include('seller.header')
    @include('seller.sidebar')
    <main id="main" class="main">
        {{-- messages --}}
        @if (session('message'))
            <div class="alert alert-success flash-message border-0 text-light" style="background: #6AB716" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="pagetitle">
            <h1>Seller Dashboard</h1>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-md-4">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Sales <span>| Today</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>Rs.{{ $todaysales }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->
                        <!-- Revenue Card -->
                        <div class="col-md-4">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title"> Total <span>| Revenue</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>Rs.{{ $totalRevenue }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Revenue Card -->
                        <!-- Customers Card -->
                        <div class="col-md-4">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total <span>| Customer</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>{{ $totalOrders }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Customers Card -->
                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title">All Active <span>| Orders</span></h5>
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <b>Order#</b>
                                                </th>
                                                <th>Product Name</th>
                                                <th>Buyer Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Order Status</th>
                                                <th>Order Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->product->name }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->grandtotal }}</td>
                                                    <td>
                                                        {{ $item->orderstatus }}

                                                    </td>
                                                    <td>
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#AddNewProductModal{{ $item->id }}">

                                                            Details
                                                        </button>
                                                    </td>



                                                </tr>

                                                {{-- Details modals --}}
                                                <div class="modal fade" id="AddNewProductModal{{ $item->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Order
                                                                    #{{ $item->id }} Details</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <h4>Shiping Details:</h4>
                                                                    <div class="col-md-6">
                                                                        <h6>Name:</h6>
                                                                        <h6>Email:</h6>
                                                                        <h6>Phone:</h6>
                                                                        <h6>City:</h6>
                                                                        <h6>Address:</h6>
                                                                        <h6>Price:</h6>
                                                                        <h6>Quantity:</h6>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h6>{{ $item->name }}</h6>
                                                                        <h6>{{ $item->email }}</h6>
                                                                        <h6>{{ $item->phone }}</h6>
                                                                        <h6>{{ $item->city }}</h6>
                                                                        <h6>{{ $item->address }}</h6>
                                                                        <h6>{{ $item->grandtotal }}$</h6>
                                                                        <h6>{{ $item->quantity }}</h6>
                                                                    </div>
                                                                    <h4>Product Details:</h4>
                                                                    <div class="col-md-6">
                                                                        <h6>Name:</h6>
                                                                        <h6>Price:</h6>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h6>{{ $item->product->name }}</h6>

                                                                        <h6>{{ $item->product->price }}$</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Recent Sales -->



                    </div>
                </div><!-- End Left side columns -->



            </div>
        </section>

    </main><!-- End #main -->





</body>
@include('inc.scripts')

</html>
