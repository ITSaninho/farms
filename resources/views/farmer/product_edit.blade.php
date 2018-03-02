@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @foreach($products as $product)
            <div class="panel panel-default farm">
                <div class="panel-heading product">
                    <div class="panel-heading">
                    @if (session("slider_status_".$product->id))
                        <div class="alert alert-success">
                            {{ session("slider_status_".$product->id) }}
                        </div>
                    @endif
                    </div>

                    <form class="form-horizontal" method="POST" action="{{route('product_update')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="farm_name" value="{{$product->farm->name}}">

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Name product</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{$product->name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Image product</label>
                            <div class="col-md-9">
                                @if($product->image === 'default.jpg')
                                <img src="/public/data/default/no_product.png">
                                @else
                                <img src="/public/data/farm/{{$product->farm->name}}/{{$product->image}}">
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Change Image product</label>

                            <div class="col-md-9">
                                <input type="file" class="form-control" name="product_img">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Select category</label>

                            <div class="col-md-9">
                                <select name="category_id">
                                    <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                                    @foreach($categories as $category)
                                        @if($category->id != $product->category->id)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary center-block">
                                Update
                            </button>
                        </div>
                    </form>

                    <h3 class="text-center">Slider product image</h3>
                    @foreach($product->product_slider as $product_slider)
                        <div class="my-form">
                            <img class="img-slider" src="/public/data/farm/{{$product->farm->name}}/slider/product_id_{{$product->id}}/{{$product_slider->image}}">
                            <a href="{{route('product_img_slider_delete', ['id' => $product_slider->id])}}" class="btn btn-danger center-block">
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </div>
                    @endforeach

                    <form class="form-horizontal" method="POST" action="{{ route('product_img_slider') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="farm_name" value="{{$product->farm->name}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">

                        <div class="form-group">
                            <div class="col-md-12">
                                <br>
                                <div>
                                    <label for="slider_img" class="col-md-3 control-label">Add image to slider</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="slider_img" required autofocus>
                                </div>
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

            @endforeach

        </div>
    </div>
</div>
@endsection
