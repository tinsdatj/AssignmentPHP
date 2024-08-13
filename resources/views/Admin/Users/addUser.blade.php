@extends('Template.AdminLayout')
@section('content')

    <h1 class="h3 mb-2 text-gray-800">Add User</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        </div>
        <div class="card-body">
          @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
            <div class="table-responsive">
                <form class="container-fluid" action="{{route('add-user')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                      <label class="form-label">Full Name:</label>
                      <input type="text" class="form-control" name="fullname">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Name:</label>
                        <input type="text" class="form-control" name="username">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="text" class="form-control" name="email">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="text" class="form-control" name="password">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Phone:</label>
                        <input type="text" class="form-control" name="phone">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Address:</label>
                        <input type="text" class="form-control" name="address">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Avatar:</label>
                        <input type="file" class="form-control" name="avatar">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Role:</label>
                        <select name="role" id="">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>

@endsection
