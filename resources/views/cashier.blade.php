@extends('layout.master')
@section('content')
  <div class="row">
      <div class="col-md-4 col-lg-4 grid-margin stretch-card">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <h2 class="card-title">Create Bill</h2>
                <form class="forms-sample">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Product Name</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option disabled selected value="">Product</option>
                        <option value="admin">fish</option>
                        <option value="cashier">bisquit</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Quantity</label>
                    <input type="number" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Quatity">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">ADD</button>
                </form>
            </div>
        </div>
      </div>
      <div class="col-md-8 col-lg-8">
          <div class="card shadow p-3 mb-5 bg-white rounded">
              <div class="card-body">
        <div class="container-fluid d-flex justify-content-center w-100">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead class="card-title">
                    <tr>
                      <th class="pt-0">Product Name</th>
                      <th class="pt-0">Price</th>
                      <th class="pt-0">Quantity</th>
                      <th class="pt-0">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Fish</td>
                      <td>&#8358;1,000</td>
                      <td>2</td>
                      <td>&#8358;2,000</td>
                    </tr>
                    <tr>
                        <td>Rice</td>
                        <td>&#8358;4,000</td>
                        <td>2</td>
                        <td>&#8358;8,000</td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
          <div class="container-fluid mt-5 w-100">
            <div class="row">
              <div class="col-md-6 ml-auto">
                <div class="card shadow p-3 mb-2 bg-white rounded">
                    <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                        <tbody>
                          <tr>
                            <td>Sub Total</td>
                            <td class="text-right">&#8358; 14,900.00</td>
                          </tr>
                          <tr>
                            <td class="text-bold-800">Total</td>
                            <td class="text-bold-800 text-right">&#8358; 16,688.00</td>
                          </tr>
                        </tbody>
                    </table>
                  </div>
              </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="container-fluid w-100">
            <a href="#" class="btn btn-primary float-right mt-4 ml-2"><i data-feather="printer" class="mr-2 icon-md"></i>Print</a>
          </div>
      </div>
  </div>
@endsection