<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.style')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>All Customers</title>

</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

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
                            <p>Here is list of Customers</p>

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
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($customers as $items)
                                        <tr>
                                            <td>{{ $items['name'] }}</td>
                                            <td>{{ $items['email'] }}</td>
                                            <td>{{ $items['totalOrders'] }}</td>
                                            <td>{{ $items['totalAmount'] }}</td>
                                            <td>
                                                <select name="orderstatus" class="changeorderstatus"
                                                data-order-id="{{$items['id']  }}" >
                                                    <option value="{{ $items['status'] }}" selected>
                                                        {{ $items['status']}}</option>
                                                        @if ( $items['status'] !== 'Active')
                                                        <option value="Active">Active</option>
                                                    @endif
                                                    @if ( $items['status']!== 'Suspend')
                                                        <option value="Suspend">Suspend</option>
                                                    @endif
                                                </select>
                                            </td>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $(document).ready(function() {
            $('.changeorderstatus').change(function() {
                var status = $(this).val();
                var orderId = $(this).data('order-id');
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                // alert(orderId);
                if (confirm('Are you sure you want to change the customer status to ' + status +
                        '?')) {
                    $.ajax({
                        url: 'changecustomerstatus',
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

</html>

