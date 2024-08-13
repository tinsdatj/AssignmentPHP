@extends('Template.AdminLayout')
@section('content')

    <h1 class="h3 mb-2 text-gray-800">Add Category</h1>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="container-fluid" action="{{route('add-category')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Name:</label>
                      <input type="text" class="form-control" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>

@endsection
