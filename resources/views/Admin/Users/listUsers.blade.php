@extends('Template.AdminLayout')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Fullname</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($listUser as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->fullname}}</td>
                            <td>{{$list->username}}</td>
                            <td>{{$list->email}}</td>
                            <td>{{$list->phone}}</td>
                            <td>{{$list->address}}</td>
                            <td>{{$list->role}}</td>
                            <td>
                            <a href="{{route('edit-user',['id'=>$list->id])}}" class="btn btn-primary">Sửa</a>
                            @if ($list->id === $userADmin->id)
                            <a onclick="return alert('Bạn Không thể xóa bản thân ?')"class="btn btn-danger">Xoá</a>
                            @else
                            <a onclick="return confirm('Bạn có muốn xóa không ?')" href="{{route('delete-user',['id'=>$list->id])}}" class="btn btn-danger">Xoá</a>
                            @endif
                            </td>
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection()