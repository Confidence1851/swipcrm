@extends('layouts.app')
@if( $mode == 0)
    @php($name = '' )
@elseif($mode == 1)
    @php($name = $product->name )
@endif
@if( $mode == 0)
    @php($price = '' )
@elseif($mode == 1)
    @php($price = $product->price )
@endif

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 ">
            <div class="panel panel-default" id="main" style="padding-bottom:100px;">
                <div class="panel-heading"> 
                        <a class="btn btn-primary"href="{{ route('home')}}">Home</a>
                        <a class="btn btn-primary"href="{{ route('salesummary')}}">Sales History</a>
                        <a class="btn btn-primary"href="{{ route('allusers')}}">Users</a>
                        <a class="btn btn-success"href="{{ route('admincashier')}}">Switch Mode</a>

                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <div class="form">
                                @if($mode == 0)
                                    <form action="{{ route('addproduct')}}" method="post">
                                @elseif( $mode == 1)
                                    <form action="{{ route('updateproduct' , $product->id)}}" method="post">
                                @endif
                                    {{ csrf_field() }}
                                    <div class="form-input">
                                        <label for="name"> Product Name</label>
                                    <input type="text" name="name" id="name" value="{{$name}}" required maxlength="100">
                                    </div>
                                    <div class="form-input">
                                        <label for="name"> Product Price</label>
                                        <input type="number" name="price" id="price" value="{{$price}}"  required maxlength="20">
                                    </div>
                                @if($mode == 0)
                                    <div class="form-button">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                @elseif( $mode == 1)
                                <div class="form-button">
                                        <button class="btn btn-success" type="submit">Update</button>
                                    </div>
                                @endif
                                </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" panel panel-default col-md-7">
                <table class="table table-reponsive">
                    <thead>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <a href="{{ route('editproduct' , $product->id)}}" class="btn btn-primary"> Edit </button> </a>
                            </td>
                            <td>
                                <a href="{{ route('deleteproduct' , $product->id)}}" class="btn btn-warning">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
