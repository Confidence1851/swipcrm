@extends('layout.master')
@section('content')
  <div class="row">
      <div class="col-md-4 col-lg-4 grid-margin stretch-card">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <h2 class="card-title">Create Bill</h2>
                <form class="forms-sample" method="post" action="{{ route('additem') }}">{{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Product Name</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="name" required>
                        <option disabled selected value="">Product</option>
                        @foreach ($products as $product)
                          <option value="{{ $product->name }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Quantity</label>
                    <input type="number" class="form-control" id="exampleInputUsername1" name="quantity" required autocomplete="off" placeholder="Quantity">
                  </div>
                  <button type="submit" class="btn btn-success mr-2">ADD</button>
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
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->name }}</td>
                        <td>₦{{ $sale->price }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>₦{{ $sale->total }}</td>
                        <td>
                          <form action="{{ route('deleteitem' , $sale->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?');">{{ csrf_field() }}
                            <button class="btn btn-danger btn-xs"><i data-feather="trash"></i></button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>₦{{ $summary['price'] }}</th>
                      <th>{{ $summary['quantity'] }}</th>
                      <th>₦{{ $summary['total'] }}</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            </div>
          </div>
          {{-- <div class="container-fluid mt-5 w-100">
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
          </div> --}}
          <div class="container-fluid w-100">
            <a href="{{ route('savesaledetails') }}" class="btn btn-primary float-right mt-4 ml-2"><i data-feather="printer" class="mr-2 icon-md"></i>Save and Print</a>
          </div>
      </div>
  </div>
@endsection