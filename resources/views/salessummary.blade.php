@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
        <div class="panel panel-default" id="main" style="padding-bottom:100px;">
                <div class="panel-heading"> 
                        <a class="btn btn-primary"href="{{ route('home')}}">Home</a>
                        <a class="btn btn-primary"href="{{ route('salesummary')}}">Sales History</a>
                        <a class="btn btn-primary"href="{{ route('allusers')}}">Users</a>
                        <a class="btn btn-success"href="{{ route('admincashier')}}">Switch Mode</a>
                        <span style="float:right">
                            <form action="{{ route('filtersalesummary')}}" method="get">
                                {{ csrf_field() }}
                                <span style=";margin-right:5px;"><b>From</b></span>
                                <input type="date" name="start" id="">
                                <span style="margin-left:20px;margin-right:5px;"><b>To</b></span>                            
                                <input type="date" name="to" id="">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </form>
                        </span>
	
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
                            <th></th>
                            <th></th>
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
                                <td><a href="{{ route('deletesalesummaryitem' , $sale->id) }}" class="btn btn-danger btn-sm">x</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </form>

                    @if($mode == 0)
                    <a href="{{ route('deleteallsalesummary')}}" class=" pull-right btn btn-danger btn-sm">Delete All</a>
                    @endif
                <hr>
                <hr>
			<h4 class="pull-right"><b>Total = NGN {{$total}}</b></h4>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
