@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" id="main" style="padding-bottom:100px;">
                <div class="panel-heading"> 
                        <a class="btn btn-primary"href="">Sales History</a>
                        <a class="btn btn-primary"href="">Stocks</a>
                        <a class="btn btn-primary"href="">Users</a>

                </div>
236 223 * 26247 * 2760
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form">
                        <form action="" method="post">
                            <div class="form-input">
                                <label for="name"> Product Name</label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="form-input">
                                <label for="name"> Product Price</label>
                                <input type="number" name="price" id="price">
                            </div>
                            <div class="form-button">
                                 <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
