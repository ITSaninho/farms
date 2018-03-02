@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default farm">

                <div class="panel-heading product">
                    <div class="panel-heading">
                    @if (session("slider_status_".$product->id))
                        <div class="alert alert-success">
                            {{ session("slider_status_".$product->id) }}
                        </div>
                    @endif
                    @if (session("status"))
                        <div class="alert alert-success">
                            {{ session("status") }}
                        </div>
                    @endif
                    </div>

                    <span class="pull-left title">Name: {{$product->name}}</span>

                    <a href="{{route('admin_product_edit', ['id' => $product->farm_id, 'product_id' => $product->id])}}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-pencil"></i></a>
                    <form method="post" action="{{route('farm_destroy')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$product->farm_id}}">
                        <button type="submit" class="btn btn-danger">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    </form>

                    <p>Category: {{$product->category->name}}</p>
                    <p>Image:</p>
                    @if($product->image === 'default.jpg')
                    <img src="/public/data/default/no_product.png">
                    @else
                    <img src="/public/data/farm/{{$product->farm->name}}/{{$product->image}}">
                    @endif

                    @foreach($product->product_slider as $product_slider)
                        @if ($loop->first)
                        <p>Slider product image:</p>
                        @endif
                        <img src="/public/data/farm/{{$product->farm->name}}/slider/product_id_{{$product->id}}/{{$product_slider->image}}">
                    @endforeach

                    <p>Додати картинку до слайдеру</p>
                    <form class="form-horizontal" method="POST" action="{{ route('product_img_slider') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="farm_name" value="{{$product->farm->name}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="slider_img" required autofocus>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary center-block">
                                Add
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
