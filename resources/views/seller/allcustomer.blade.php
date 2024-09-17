<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.style')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>All Your Customers</title>

</head>

<body>
    @include('seller.header')
    @include('seller.sidebar')

    <main id="main" class="main">
        @if (session('message'))
            <div class="alert alert-success flash-message border-0 text-light" style="background: #6AB716"
                role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="pagetitle">
            <h1 class="text-center">All Customers</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <p>Here is list of canceled orders</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            <b>Name</b>
                                        </th>
                                        <th> Email</th>
                                        <th>Number of Orders</th>
                                        <th>Total Price</th>
                                        <th>Contact</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($customers as $items)
                                        <tr>
                                            <td>{{ $items['name'] }}</td>
                                            <td>{{ $items['email'] }}</td>
                                            <td>{{ $items['totalOrders'] }}</td>
                                            <td>{{ $items['totalAmount'] }}</td>

                                            <td><a href="{{ url('seller/sendmessagetobuyer/' . $items['id']) }}"><button
                                                        class="btn btn-primary">Message</button></a></td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
    <script></script>

</body>
@include('inc.scripts')


</html>
