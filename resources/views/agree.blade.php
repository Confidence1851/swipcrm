@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> 
                        <a class="btn btn-primary"href="{{ route('home')}}">Home</a>
                        <a class="btn btn-primary"href="{{ route('about')}}">About</a>
                        <p class="pull-right"> Version 1.0</p>
                </div>

                <div class="panel-body">
                        <div class="row text-center">
                            <h2>Agreement </h2>
                            <h4>POS (Point of Sale) Software & Agreement is effective from Tue , 10 Sept 2019</h4>
                            <p>Between Pengwin Software Company and Gpower Frozen Foods.</p>
                            <p>Develpoment and deployment of this POS Software.</p>
                            <p>Gpower agrees to pay a fee of $50 for software upgrades or modifications.</p>
                            <p>Pengwin would not be responsible for any Software damages.</p>
                           <hr>
                           <h2>Licence</h2>
                           <p>Pengwin hereby grants a non-exclusive and non-transferable licence to Gpower Foods for the licence material.</p> 
                           <p>This Software may not be distributed or transferred.</p>
                        </div>
                    </div>
                </div>
           </div>   
        </div>
    </div>
</div>
@endsection
