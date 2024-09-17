<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.style')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>

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
    <div class="container my-3 ">
        <h4>Your Inprogrees Order</h4>
        <p>All Orders in the below list will be delivered within 3 days of placing order.If you have any issue. Contact with support.</p>
        <table class="table frontdatatable">
            <thead>
                <tr>
                    <th>
                        <b>Order#</b>
                    </th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Order Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->grandtotal }}</td>
                        <td>
                            {{ $item->orderstatus }}

                        </td>




                    </tr>


                @endforeach


            </tbody>
        </table>
    </div>
    <div class="container my-3 ">
        <h4>Your Completed Orders</h4>
        <p>List of all completed orders</p>
        <table class="table frontdatatable">
            <thead>
                <tr>
                    <th>
                        <b>Order#</b>
                    </th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Complition Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($completedorder as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->grandtotal }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('d F Y') }}

                        </td>




                    </tr>


                @endforeach


            </tbody>
        </table>
    </div>





    @include('userfront.modals.becomeaseller')
    @include('userfront.footer')
</body>


@include('inc.scripts')

</html>
