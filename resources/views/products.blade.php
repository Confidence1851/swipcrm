@extends('layout.master')

@section('content')
@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}">
@endpush
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
          <h6 class="card-title">Products</h6>
          <p class="card-description">Products Available</p>
          <div class="table-responsive">
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Products Name</th>
                  <th>Product Price</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i =0; ?>
                @foreach ($products as $product)
                <?php $i++; ?>
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->price }}</td>
                  <td>
                    <form action="{{ route('deleteproduct' , $product->id) }}" method="post">{{ csrf_field() }}
                      <a href="" class="btn btn-primary"  data-toggle="modal" data-target="#editProductModal_{{ $product->id}}" >Edit</a>
                      <button class="btn btn-danger ml-3">Delete</button>
                    </form>
                    @include('fragments.add_edit_products_modal' , ['product' => $product])
                  </td>
                </tr>  
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
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