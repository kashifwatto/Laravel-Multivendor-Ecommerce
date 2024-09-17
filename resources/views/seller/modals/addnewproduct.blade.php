<div class="modal fade" id="AddNewProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('seller/addproduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <input type="text" name="name" class="form-control" required>
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
                    <button type="submit" class="btn btn-primary">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
