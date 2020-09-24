@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> 
                        <a class="btn btn-primary"href="{{ route('home')}}">Home</a>
                        <a class="btn btn-primary"href="{{ route('agreement')}}">License & Agreement</a>
                        <p class="pull-right"> Version 1.0</p>
                </div>

                <div class="panel-body">
                        <div class="row text-center">
                            <h2>Software Information </h2>
                            <h3>Features</h3>
                            <p>Admin Dashboard</p>
                            <p>Cashier Dashboard</p>
                            <p>Print Receipt</p>
                            <p>Add Cashier</p>
                            <p>Add to Stock</p>
                            <p>Edit / Delete Cashier</p>
                            <p>Edit / Delete Item from Stock</p>
                            <p>Reset Password for cashier </p>
                        </div>
                    </div>
                </div>
           </div>   
        </div>
    </div>
</div>
@endsection
