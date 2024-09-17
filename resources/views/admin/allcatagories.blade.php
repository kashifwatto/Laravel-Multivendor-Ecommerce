<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.style')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Products</title>

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
            <h1 class="text-center">All Catagaries</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <p>Here is list of all catageris</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable" id="allproductdatatable">
                                <thead>
                                    <tr>
                                        <th>
                                            <b>Name</b>
                                        </th>
                                        <th>Number of products</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($catagory as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>1</td>

                                            <td><img src="{{ url('public/uploadedimages/catagory/' . $item->image) }}"
                                                    class="img-fluid" style="height: 50px; width: 50px" alt="">
                                            </td>
                                            <td>

                                                <a href="{{ 'catagorydelete/' . $item->id }}"
                                                    onclick="return confirm('Are you sure you want to delete this catagory?')">
                                                    <button type="button" class="btn btn-danger">Delete</button></a>
                                               

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

</body>
@include('inc.scripts')


</html>
