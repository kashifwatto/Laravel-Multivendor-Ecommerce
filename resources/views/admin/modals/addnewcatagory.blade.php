<div class="modal fade" id="AddNewCatagoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Catagory</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('admin/addcatagory') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label  class="form-label">Catagroy Name:</label>
                <input type="text" class="form-control" name="name" required >
              </div>

              <div class="mb-3">
                  <label for="floatingTextarea">Description</label>
                <textarea class="form-control my-1" name="description" style="height:150px;" placeholder="Add Catagory Description In Details" id="floatingTextarea"></textarea>
              </div>

              <div>Add Catagory Image:</div>
              <div class="input-group mb-3">
                <input type="file" name="image" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Catagory</button>
        </div>
    </form>
      </div>
    </div>
  </div>
