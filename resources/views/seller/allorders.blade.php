<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.style')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>All Order</title>

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
            <h1 class="text-center">All Orders</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <p>Here is list of all Orders</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable" >
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
                                                <select name="orderstatus" class="changeorderstatus"
                                                    data-order-id="{{ $item->id }}">
                                                    <option value="{{ $item->orderstatus }}" selected>
                                                        {{ ucfirst($item->orderstatus) }}</option>
                                                    @if ($item->orderstatus !== 'Delivered')
                                                        <option value="Delivered">Delivered</option>
                                                    @endif
                                                    @if ($item->orderstatus !== 'Cancel')
                                                        <option value="Cancel">Cancel</option>
                                                    @endif
                                                </select>

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
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Order
                                                            #{{ $item->id }} Details</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
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
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $(document).ready(function() {
                $('.changeorderstatus').change(function() {
                    var status = $(this).val();
                    var orderId = $(this).data('order-id');
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    // alert(orderId);
                    if (confirm('Are you sure you want to change the order status to ' + status +
                            '?')) {
                        $.ajax({
                            url: 'changeorderstatus',
                            type: 'POST',
                            data: {
                                _token: csrfToken,
                                order_id: orderId,
                                orderstatus: status
                            },
                            success: function(response) {
                                if (response.success) {
                                    location.reload();
                                } else {
                                    alert('Failed to update order status');
                                }
                            },
                            error: function() {
                                alert('An error occurred while updating order status');
                            }
                        });
                    } else {
                        // Reset the select to its previous value if the user cancels the action
                        $(this).val($(this).find('option[selected]').val());
                    }
                });
            });
        });
    </script>

</body>
@include('inc.scripts')


</html>
