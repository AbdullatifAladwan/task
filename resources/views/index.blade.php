@extends('layout')
     
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Product</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('product.create') }}"> Create Product</a>
                </div>
            </div>
        </div>
            <div class="row">
                @foreach ($product as $pro)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-product mb-60">
                        <div class="product-img">
                        <a href="{{ route('product.show',$pro->id ) }}">  <img src="{{ url('public/Image/'.$pro->img) }}" style="height: 200px;width: 50%;" alt=""></a>
                        </div>
                        <div class="product-caption">
                            <h4 >{{ $pro->name }}</h4>
                            <!-- Product desc-->
                            <span class="fw-bolder"> {{ $pro->desc }}</span>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-primary" href="{{ route('product.edit',$pro->id ) }}">Edit</a></div>
                            </div>
                            <a href="javascript:void(0)"   data-token="{{ csrf_token() }}" data-id="{{ $pro->id }}" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
   
    <script>
$(".deleteProduct").click(function(){
    var id = $(this).data("id")
    var token = $(this).data("token");
    confirm("Are You sure want to delete !");
   
    $.ajax(
    {
        url: "product/"+id,
        type: 'delete',
        dataType: "JSON",
        data: {
            "id": id ,
            "_token": token,
        },
        success: function (response)
        {
            console.log(response); // see the reponse sent
            window.location.reload();
        },
        error: function(xhr) {
         console.log(xhr.responseText); // this line will save you tons of hours while debugging
        // do something here because of error
       }
    });
});
</script>


</body>
  

@endsection