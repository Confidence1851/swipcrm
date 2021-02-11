@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
@endpush
@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Welcome {{ Auth::user()->name }}</h4>
  </div>
  @include('fragments.sales_date_filter' , ['url' =>  route('home')])
</div>

<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow">

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">All Users</h6>
              <h3 class="mb-2">{{ $stats["all_users"] }}</h3>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">All Products</h6>
              <h3 class="mb-2">{{ $stats["all_products"] }}</h3>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Total Sales</h6>
              <h3 class="mb-2">{{ $stats["total_sales"] }}</h3>
            </div>
          </div>
        </div>
      </div>

     
    </div>
  </div>
</div> <!-- row -->
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Available Products</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Sales</h6>
        <p class="card-description">Sales History</p>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Cashier</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>DateTime</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($sales as $sale)
              <tr>
                <td>{{ $sale->cashier->name ?? $sale->username }}</td>
                <td>{{ $sale->name }}</td>
                <td>₦{{ $sale->price }}</td>
                <td>{{ $sale->quantity }}</td>
                <td>₦{{ $sale->total }}</td>
                <td>{{ date('Y-m-d h:i:A', strtotime($sale->created_at)) }}</td>
              </tr> 
             @endforeach 
              {{-- <tr>
                <td>Yuri Berry</td>
                <td>Chief Marketing Officer (CMO)</td>
                <td>
                  <a href="" class="btn btn-primary">Edit</a>
                  <a href="" class="btn btn-danger ml-3">Delete</a>
                </td>
              </tr> --}}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection

@push('plugin-scripts')
<script src="{{ asset('/assets/plugins/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ asset('/assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('/assets/js/dashboard.js') }}"></script>
<script src="{{ asset('/assets/js/datepicker.js') }}"></script>
@endpush
@push('plugin-scripts')
<script src="{{ asset('/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('/assets/js/data-table.js') }}"></script>
@endpush