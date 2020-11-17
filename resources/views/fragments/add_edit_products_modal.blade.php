
<div class="modal fade" id="{{ empty($product) ? 'addProductModal' : 'editProductModal_'.$product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ empty($product) ? 'Add New Product' : 'Edit Product'}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ empty($product) ? route('addproduct') : route('updateproduct', $product->id) }}">{{ csrf_field() }}
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Product Name:</label>
              <input type="text" class="form-control" id="recipient-name" required name="name" value="{{ $product->name ?? '' }}">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Price:</label>
              <input type="text" class="form-control" id="recipient-name" required name="price" value="{{ $product->price ?? '' }}">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
      </div>
    </div>
  </div>