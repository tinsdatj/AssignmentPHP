@extends('Template.AdminLayout')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                            <th>Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($listproduct as $list)
                        <tr>
                            <td>{{$list->name}}</td>
                            <td>@foreach ($listcate as $cate)
                                @if ($list->category_id === $cate->id)
                                    {{$cate->name}}
                                @endif
                            @endforeach</td>
                            <td><img src="{{asset('storage/'.$list->image)}}" width="30%" alt=""></td>
                            <td>{{number_format($list->price)}} VND</td>
                            <td>{{$list->quantity}}</td>
                            <td>
                            <a href="{{route('edit-product',['id'=>$list->id])}}" class="btn btn-primary">Sửa</a>    
                            <a onclick="return confirm('Bạn có muốn xóa không ?')" href="{{route('delete-product',['id'=>$list->id])}}" class="btn btn-danger">Xóa</a>   
                            </td>   
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection()