@extends('layouts.app')
@if( $mode == 0)
    @php($name = '' )
@elseif($mode == 1)
    @php($name = $user->email )
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
                                    <form action="{{ route('adduser')}}" method="post">
                                @elseif( $mode == 1)
                                    <form action="{{ route('updateuser' , $user->id)}}" method="post">
                                @endif
                                    {{ csrf_field() }}
                                    <div class="form-input">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email"> User Name</label>
                                            <input type="text" name="email" id="email" value="{{$name}}" required maxlength="100">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                This name is already taken.
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="form-input">
                                        <label for="role"> User Role</label>
                                        <select name="role" id="" required>
                                            <option disabled selected value="">Select Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="cashier">Cashier</option>
                                        </select>
                                    </div>
                                    <div class="form-input">
                                        <label for="name"> Password</label>
                                        <input type="password" name="password" id="password" placeholder="password" required maxlength="20">
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
        <div class="panel panel-default col-md-7">
                <table class="table table-reponsive">
                    <thead>
                        <th>User Name</th>
                        <th>Role</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                <a href="{{ route('edituser' , $user->id)}}" class="btn btn-primary"> Edit </button> </a>
                            </td>
                            <td>
                                <a href="{{ route('deleteuser' , $user->id)}}" class="btn btn-warning">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
