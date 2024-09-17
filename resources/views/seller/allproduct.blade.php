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
        <div>
            <a data-bs-toggle="modal" data-bs-target="#AddNewProductModal">
                <button class="btn btn-primary">
Add New Product
                </button>
            </a>

        </div>
        <div class="pagetitle">
            <h1 class="text-center">All Products</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <p>Here is list of all Prodcuts</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable" id="allproductdatatable">
                                <thead>
                                    <tr>
                                        <th>
                                            <b>Name</b>
                                        </th>
                                        <th>Price</th>
                                        <th>Catagory</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                @foreach ($catagory as $cata)
                                                    @if ($cata->id == $item->catagory_id)
                                                        {{ $cata->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td><img src="{{ url('public/uploadedimages/product/' . $item->image) }}"
                                                    class="img-fluid" style="height: 50px; width: 50px" alt="">
                                            </td>
                                            <td>
                                                <a data-bs-toggle="modal" data-bs-target="#EditProductModal"
                                                    class="editproduct" data-product-id="{{ $item->id }}"
                                                    data-product-name="{{ $item->name }}"
                                                    data-product-price="{{ $item->price }}"
                                                    data-product-description="{{ $item->description }}"
                                                    data-product-image="{{ $item->image }}"
                                                    data-product-catagory="{{ $item->catagory_id }}"> <button
                                                        type="button" class="btn btn-primary">Edit</button></a>
                                                <a href="{{ 'productdelete/' . $item->id }}"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">
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
    {{-- edit product modal  --}}
    <div class="modal fade" id="EditProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('seller/editproduct') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Name:</label>
                                    <input type="text" name="name" class="form-control" required>
                                    <input type="hidden" name="id" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Price:</label>
                                    <input type="number" name="price" class="form-control" required>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Select Catagory:</label>
                            <select class="form-select" name="catagory" aria-label="Default select example">
                                <option>Select a Catagory</option>
                                @foreach ($catagory as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="floatingTextarea">Description</label>
                            <textarea class="form-control my-1" name="description" style="height:100px;"
                                placeholder="Add Catagory Description In Details" id="floatingTextarea"></textarea>
                        </div>

                        <div>Upload Product Image:</div>
                        <div class="input-group mb-3">
                            <input type="file" name="image" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
@include('inc.scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        function editproductevent(e) {
        const button = e.currentTarget;
        const id = button.getAttribute('data-product-id');
        const name = button.getAttribute('data-product-name');
        const price = button.getAttribute('data-product-price');
        const description = button.getAttribute('data-product-description');
        const catagory = button.getAttribute('data-product-catagory');

        const image = button.getAttribute('data-product-image');
        const EditProductModal = document.getElementById('EditProductModal');
        console.log(catagory);
        EditProductModal.querySelector('input[name="id"]').value = id;
        EditProductModal.querySelector('input[name="name"]').value = name;
        EditProductModal.querySelector('input[name="price"]').value = price;
        EditProductModal.querySelector('select[name="catagory"]').value = catagory;
        EditProductModal.querySelector('textarea[name="description"]').value = description;

    }
        var editproductbtn = document.querySelectorAll('.editproduct');
        editproductbtn.forEach(button => {
        button.addEventListener('click', editproductevent);
    });
    });



</script>

</html>
