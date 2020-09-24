@extends('layouts.app')
@if( $mode == 0)
    @php($name = '' )
@elseif($mode == 1)
    @php($p = App\Sale::where('name' , $item->name)->first() )
    @php($name = $p->name )
@endif
@if( $mode == 0)
    @php($quantity = '' )
@elseif($mode == 1)
    @php($quantity = $item->quantity )
@endif
@php( $total = App\Sale::where('status' , 0)->sum('total'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
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
                    
                    <div class="form">
                        @if($mode == 0)
                        <form action="{{ route('additem')}}" method="post">
                            {{ csrf_field()}}
                            <div class="form-input">
                                <label for="name"> Product Name</label>
                                <select type="input" name="name" id="name" required>
                                    <option value="" selected disabled>Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{$product->name}}">{{$product->name.' (NGN '.$product->price.')'}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-input">
                                <label for="name"> Quantity</label>
                                <input type="number" name="quantity" id="quantity">
                            </div>
                            <div class="form-button">
                                 <button class="btn btn-primary" type="submit">Add</button>
                            </div>
                        </form>
                    @else
                    <form action="{{ route('updateitem' , $item->id)}}" method="post">
                            {{ csrf_field()}}
                            <div class="form-input">
                                <label for="name"> Product Name</label>
                                <input type="text" name="name" id="name" value="{{$name}}" disabled>                                
                            </div>
                            <div class="form-input">
                                <label for="name"> Quantity</label>
                                <input type="number" name="quantity" id="quantity" value="{{$quantity}}" required>
                            </div>
                            <div class="form-button">
                                 <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    @endif
                    </div>
                    <div class="totalsummary">
                        <h4>Total = NGN {{$total}}</h4>
                        @if($total < 1)
                             <a href="{{ route('savesaledetails')}}" id="printbtn" class="btn btn-primary disabled">Print</a>
                        @else                        
                            <a href="{{ route('savesaledetails')}}" id="printbtn" class="btn btn-primary">Print</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default col-md-8">
        <table class="table table-reponsive">
                        <thead>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                            <tr>
                                <td>{{$sale->name}}</td>
                                <td>NGN {{$sale->price}}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td>NGN {{$sale->total}}</td>
                                <td><a href="{{ route('edititem' , $sale->id)}}" class="btn btn-primary">Edit</a></td>
                                <td><a href="{{ route('deleteitem' , $sale->id)}}" class="btn btn-warning">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
    </div>
</div>
@endsection
