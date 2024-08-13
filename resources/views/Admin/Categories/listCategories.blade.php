@extends('Template.AdminLayout')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Categories</h6>
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
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($listcate as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->name}}</td>
                            <td>
                            <a href="{{route('edit-category',['id'=>$list->id])}}" class="btn btn-primary">Sửa</a>
                            <a onclick="return confirm('Bạn có muốn xóa không ?')" href="{{route('delete-category',['id'=>$list->id])}}" class="btn btn-danger">Xoá</a>
                            </td>
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection()