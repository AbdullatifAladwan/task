@extends('layout')
     
@section('content')
<body>
   
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add product</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Details:</strong>
                        <input type="text" name="desc" class="form-control" placeholder="Desc">
                        @error('desc')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Price:</strong>
                        <input type="number" name="price" class="form-control" placeholder="Price ">
                        @error('price')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                   
                        <div>
  <label for="files" class="btn">Select Image</label>
 

                    <input id="files" style="visibility:hidden;" type="file" name="img"class="btn"  >
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>
@endsection
<script>
$("#files").change(function() {
  filename = this.files[0].name;
  console.log(filename);
});</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
