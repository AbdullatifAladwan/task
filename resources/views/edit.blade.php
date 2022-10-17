@extends('layout')

@section('content')

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('product.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price:</strong>
                        <input type="number" name="price" class="form-control" placeholder="price" value="{{ $product->price }}">
                        @error('Price')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Details:</strong>
                        <input type="text" name="desc" value="{{ $product->desc }}" class="form-control" placeholder="Details">
                        @error('Desc')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                   
                        <img src="{{ url('public/Image/'.$product->img) }}" style="height: 200px;width: 20%;" alt="">
                        <label for="files" class="btn">Select Image</label>
 <input id="files" style="visibility:hidden;" type="file" name="img"class="btn"  >
 </div>

                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>
<script>
$("#files").change(function() {
  filename = this.files[0].name;
  console.log(filename);
});</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


@endsection