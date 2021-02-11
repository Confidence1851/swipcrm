@extends('layout.master')
@section('content')
@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}">
@endpush
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Sales Table</a></li>
      <li class="breadcrumb-item active" aria-current="page">Sales Summary</li>
    </ol>
  </nav>


  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0"></h4>
    </div>
    @include('fragments.sales_date_filter' , ['url' => route('salesummary')])
  </div>
  
  
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
                {{-- <th></th> --}}
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
                {{-- <td>
                  <a href="{{ route("printsale" , $sale->id) }}" class="bt btn-primary btn-sm">Print</a>
                </td> --}}
              </tr> 
             @endforeach 
            </tbody>
            <tfoot>
              <tr>
                <th></th>
                <th></th>
                <th>₦{{ $summary['price'] }}</th>
                <th>{{ $summary['quantity'] }}</th>
                <th>₦{{ $summary['total'] }}</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="container text-center">
   <div class="row">
    {!! $sales->links() !!}
   </div>
  </div>
</div>

@endsection

@push('plugin-scripts')
<script src="{{ asset('/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('/assets/js/data-table.js') }}"></script>
@endpush