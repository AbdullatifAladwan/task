@extends('layout')

@section('content')


<div class="content">

    <div class="container ">
        <div class="row mb-5 ">
            <div class="col-12 text-center">
                <h2 class="my-5">Product</h2>
            </div>
        </div>
    </div>


    <div class="site-section bg-left-half mb-5">
        <div class="container owl-2-style">
            <h2 style="text-align:right" class="my-5"> <a class="btn btn-success" href="{{ route('product.create') }}"> Add Product</a></h2>

            <div class="owl-carousel owl-2">
                @foreach ($product as $pro)
                <div class="media-29101"> <a href="javascript:void(0)" data-token="{{ csrf_token() }}" data-id="{{ $pro->id }}" data-original-title="Delete" class="fa fa-remove deleteProduct"></a>
                    <a href="{{ route('product.show',$pro->id ) }}"> <img src="{{ url('public/Image/'.$pro->img) }}" alt="Image" style="height: 100px;width: 50%;" class="img-fluid"></a>
                    <h3><a href="{{ route('product.show',$pro->id ) }}">{{ $pro->name }}</a></h3>
                    <p>{{ $pro->desc }}</p>
                    <div class="text-center"><a class="btn btn-primary" href="{{ route('product.edit',$pro->id ) }}">Edit</a></div>

                </div>

                @endforeach
            </div>

        </div>
    </div>

</div>
@endsection