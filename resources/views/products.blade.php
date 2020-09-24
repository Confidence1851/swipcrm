@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" id="main" style="padding-bottom:200px;">
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

                <div class="col-md-12">
                    <table class="table table-reponsive">
                        <thead>
                            <th>Product Name</th>
                            <th>Price</th>
                            
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
