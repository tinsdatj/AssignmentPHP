@extends('Template.AdminLayout')
@section('content')

    <h1 class="h3 mb-2 text-gray-800">Add Products</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
        </div>
        <div class="card-body">
          @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
            <div class="table-responsive">
                <form class="container-fluid" action="{{route('add-product')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                      <label class="form-label">Name:</label>
                      <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price:</label>
                        <input type="text" class="form-control" name="price">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Quantity:</label>
                        <input type="text" class="form-control" name="quantity">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Size:</label>
                        <select class="form-select" aria-label="Default select example" name='size'>
                          <option selected>Size</option>
                          <option value="S">S</option>
                          <option value="M">M</option>
                          <option value="L">L</option>
                          <option value="XL">XL</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Category:</label>
                        <select class="form-select" aria-label="Default select example" name='category_id'>
                          <option selected>Category</option>
                          @foreach ($cate as $cate )
                          <option value="{{$cate->id}}">{{$cate->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Image:</label>
                        <input type="file" class="form-control" name="image">
                      </div>
                      <div class="mb-3">
                        <div class="form-floating">
                          <textarea class="form-control" placeholder="Description" name="description" id="floatingTextarea2" style="height: 100px"></textarea>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>

@endsection
