@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card shadow p-3 mb-2 bg-white rounded">
                  <div class="card-body">
                    <h6 class="card-title">Add new Cashier</h6>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Email</label>
                        <input type="email" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">User Role</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option disabled selected value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="cashier">Cashier</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-md-8 col-xl-8 stretch-card">
                <div class="card shadow p-3 mb-2 bg-white rounded">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                      <h6 class="card-title mb-0">Users</h6>
                      <div class="dropdown mb-2">
                        <button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover mb-0">
                        <thead>
                          <tr>
                            <th class="pt-0">#</th>
                            <th class="pt-0">User-Name</th>
                            <th class="pt-0">User-Email</th>
                            <th class="pt-0">Start Date</th>
                            <th class="pt-0">Role</th>
                            <th class="pt-0">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Daniel Chisonum</td>
                            <td>Danielchisonum@gmail.com</td>
                            <td>26/04/2019</td>
                            <td><span class="badge badge-success">Cashier</span></td>
                            <td>
                              <a href="" class="btn btn-primary btn-sm">Edit</a>
                              <a href="" class="btn btn-danger ml-3 btn-sm">Delete</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div> 
                </div>
              </div>
        </div>
    </div>
@endsection