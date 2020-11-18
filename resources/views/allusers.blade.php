@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card shadow p-3 mb-2 bg-white rounded">
                  <div class="card-body">
                    <h6 class="card-title">{{ empty($user) ? 'Add New User' : 'Edit User' }}</h6>
                    <form class="forms-sample" method="POST" action="{{ empty($user) ? route('adduser') : route('updateuser' , $user->id) }}"> {{ csrf_field() }}
                      <div class="form-group">
                        <label for="exampleInputUsername1">User Full Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="name" autocomplete="off" required value="{{ $user->name ?? '' }}" placeholder="Cashier Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="username" autocomplete="off" {{ !empty($user) ? 'readonly' : '' }} value="{{ $user->username ?? '' }}" required placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">User Role</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="role" required>
                            <option disabled selected value="">Select Role</option>
                            <option value="admin" {{ !empty($user) ? $user->role == 'admin' ? 'selected' : '' : '' }}>Admin</option>
                            <option value="cashier" {{ !empty($user) ? $user->role == 'cashier' ? 'selected' : '' : '' }}>Cashier</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" value="" name="password" {{ empty($user) ? 'required' : '' }} placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-success mr-2">Submit</button>
                      <a href="{{ route('allusers') }}" class="btn btn-light">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-md-8 col-xl-8 stretch-card">
                <div class="card shadow p-3 mb-2 bg-white rounded">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                      <h6 class="card-title mb-0">Users</h6>
                      {{-- <div class="dropdown mb-2">
                        <button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                        </div>
                      </div> --}}
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover mb-0">
                        <thead>
                          <tr>
                            <th class="pt-0">#</th>
                            <th class="pt-0">User Name</th>
                            <th class="pt-0">UserName</th>
                            <th class="pt-0">Start Date</th>
                            <th class="pt-0">Role</th>
                            <th class="pt-0">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i =0; ?>
                          @foreach ($users as $user)
                          <?php $i++; ?>
                          <tr>
                            <td><?php echo $i ?></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ date('Y/m/d' , strtotime($user->created_at)) }}</td>
                            <td><span class="badge badge-success p-2">{{ ucfirst($user->role) }}</span></td>
                            @if ($user->id == auth()->id())
                            <td>
                                <a href="{{ route('edituser', $user->id) }}" class="btn btn-success">Update Profile</a>
                            </td>
                            @else
                            <td>
                              <form action="{{ route('deleteuser' , $user->id) }}" method="post">{{ csrf_field() }}
                                <a href="{{ route('edituser', $user->id) }}" class="btn btn-primary">Edit</a>
                                <button class="btn btn-danger ml-3">Delete</button>
                              </form>
                            </td>
                            @endif
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