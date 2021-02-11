@php
    $printerConfig = globalPrinter();
@endphp
<div class="modal fade" id="printer_setting_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Printer Setting</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route("printer.setting") }}">{{ csrf_field() }}
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Printer Name:</label>
              <input type="text" class="form-control" required name="name" value="{{ $printerConfig->name }}" placeholder="Default Printer">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Printer Model:</label>
              <input type="text" class="form-control" required name="model" value="{{ $printerConfig->model }}" placeholder="XP-58">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Header:</label>
              <input type="text" class="form-control" required name="header" value="{{ $printerConfig->header }}" placeholder="Receipt">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Title:</label>
              <input type="text" class="form-control" required name="title" value="{{ $printerConfig->title }}" placeholder="Global Stores">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Address:</label>
              <input type="text" class="form-control" required name="address" value="{{ $printerConfig->address }}" placeholder="Lekki Lagos">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Footer:</label>
              <input type="text" class="form-control" required name="footer" value="{{ $printerConfig->footer }}" placeholder="Thanks for patronage">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Enable Printing:</label>
              <select  class="form-control"  required name="print" >
                <option value="1" {{ $printerConfig->print == 1 ? "selected" : "" }} >Yes</option>
                <option value="0" {{ $printerConfig->print == 0 ? "selected" : "" }} >No</option>
              </select>
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