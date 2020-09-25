{{--  @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
        <div class="panel panel-default" id="main" style="padding-bottom:100px;">
                <div class="panel-heading"> 
                    @if (Auth::user()->role == 'admin')
                        <a class="btn btn-primary  btn-sm" href="{{ route('admincashier')}}">Create Bill</a>
                    @else
                        <a class="btn btn-primary btn-sm" href="{{ route('home')}}">Create Bill</a>
                    @endif
                        <a class="btn btn-primary  btn-sm" href="{{ route('products')}}">Product Info</a>
                        <a class="btn btn-primary btn-sm "href="{{ route('cashiersales')}}">Sales</a>
                    @if (Auth::user()->role == 'admin')
                        <a class="btn btn-success  btn-sm"href="{{ route('home')}}">Switch Mode</a>
                     @endif
	
                </div>

                <div class="panel-body">
                    <div class="col-md-12">
                    <table class="table table-reponsive">
                        <thead>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Cashier</th>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                            <tr>
                                <td>{{$sale->name}}</td>
                                <td>{{$sale->price}}</td>
                                <td>{{$sale->quantity}}</td>
                                <td>{{$sale->total}}</td>
                                <td>{{ date('D , d F Y h:i:s A',strtotime($sale->created_at) ) }}</td>
                                <td>{{$sale->username}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
			<h4 class="pull-right"><b>Total = NGN {{$total}}</b></h4>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}
