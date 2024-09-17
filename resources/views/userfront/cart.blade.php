<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.style')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

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

    <div class="container ">
        <h1 class="text-center my-2">My Cart </h1>
        <!-- Start Cart  -->
        <div class="cart-box-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-main table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $totalprice=0; @endphp
                                    @foreach ($cart as $item)
                                        <tr>
                                            <td class="thumbnail-img">

                                                <img class="img-fluid"
                                                    src="{{ url('public/uploadedimages/product/' . $item->product->image) }}"
                                                    alt="" height="50px" width="50px" />

                                            </td>
                                            <td class="name-pr">
                                                {{ $item->product->name }}

                                            </td>
                                            <td class="price-pr">
                                                {{ $item->product->price }}

                                            </td>
                                            <td class="quantity-box">
                                                {{ $item->quantity }}
                                            </td>
                                            <td>
                                                <p class="total-pr"> {{ $item->product->price * $item->quantity }}
                                                    @php $totalprice+= $item->product->price*$item->quantity ; @endphp
                                                </p>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row my-5">


                </div>
                <form action="{{ url('user/makeorder') }}" method="post">
                    @csrf
                    <div class="row my-5">
                        <h3 class="text-center">Checkout Form</h3>
                        <p class="text-center">Lets fill out below details and place your order </p>
                        <div class="col-lg-8 col-sm-12">
                            <div class="row">
                                <h1>Shipping Details:</h1>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name:</label>
                                        <input type="name" name="name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone:</label>
                                        <input type="number" name="phone" class="form-control" required>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email:</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">City:</label>
                                        <input type="text" name="city" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address:</label>
                                    <input type="text" name="address" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="floatingTextarea">Any addtional details?(optional)</label>
                                    <textarea class="form-control my-1" name="details" style="height:100px;" placeholder="write something"
                                        id="floatingTextarea"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <h1>Order summary</h1>
                            <div class="order-box">
                                <div class="d-flex">
                                    <h4>Sub Total: <span>Rs.{{ $totalprice }}</span></h4>

                                </div>



                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> All Products have free shipping</div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total: <span>Rs.{{ $totalprice }}</span></h5>
                                   
                                </div>
                                <hr>
                                <div>
                                    <h5>Payment Method</h5>
                                    <p>Payment Method is only cash on delivery. You need to pay after delivery.</p>
                                </div>
                                @php $grandtotal= $totalprice;@endphp
                                <input type="hidden" name="grandtotal" value="{{ $grandtotal }}">
                                <input type="hidden" name="cart" value="{{ json_encode($cart) }}">

                                <div>
                                    <a href=""><button class="btn btn-primary">Place Order</button></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>


    {{-- modals here --}}
    @include('userfront.modals.becomeaseller')
    @include('userfront.footer')
</body>

@include('inc.scripts')
<script>

</script>

</html>
