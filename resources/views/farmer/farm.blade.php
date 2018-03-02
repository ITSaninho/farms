@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @foreach($farms as $farm)
            <div class="panel panel-default farm">

                @if (session('farm_status'))
                    <div class="alert alert-success">
                        {{ session('farm_status') }}
                    </div>
                @endif

                <div class="panel-heading">
                    
                    <span class="pull-left title">Name: {{$farm->name}}</span>
                    <a href="{{route('farm_edit', ['id' => $farm->id])}}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-pencil"></i></a>
                    <form method="post" action="{{route('farm_destroy')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$farm->id}}">
                        <button type="submit" class="btn btn-danger">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    </form>
                    
                    <p>Description: {{$farm->description}}</p>
                    <p>Location: {{$farm->location}}</p>
                </div>
            </div>

            <div class="panel panel-default">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="panel-heading">Add product</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('product_add', ['id' => $farm->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="farm_name" value="{{$farm->name}}">

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Name product</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Image product</label>

                            <div class="col-md-9">
                                <input type="file" class="form-control" name="product_img" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Select category</label>

                            <div class="col-md-9">
                                <select name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary center-block">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <h1 class="text-center">Your products</h1>
            <div class="panel panel-default farm">
                @foreach($farm->products as $product)

                <div class="panel-heading product">
                    <div class="panel-heading">
                    @if (session("slider_status_".$product->id))
                        <div class="alert alert-success">
                            {{ session("slider_status_".$product->id) }}
                        </div>
                    @endif
                    @if (session("status_product_".$product->id))
                        <div class="alert alert-success">
                            {{ session("status_product_".$product->id) }}
                        </div>
                    @endif
                    </div>

                    <span class="pull-left title">Name: {{$product->name}}</span>

                    <a href="{{route('product_edit', ['id' => $farm->id, 'product_id' => $product->id])}}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-pencil"></i></a>
                    <form method="post" action="{{route('farm_destroy')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$farm->id}}">
                        <button type="submit" class="btn btn-danger">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    </form>

                    <p>Category: {{$product->category->name}}</p>
                    <p>Image:</p>
                    @if($product->image === 'default.jpg')
                    <img src="/public/data/default/no_product.png">
                    @else
                    <img src="/public/data/farm/{{$farm->name}}/{{$product->image}}">
                    @endif

                    @foreach($product->product_slider as $product_slider)
                        @if ($loop->first)
                        <p>Slider product image:</p>
                        @endif
                        <img src="/public/data/farm/{{$farm->name}}/slider/product_id_{{$product->id}}/{{$product_slider->image}}">
                    @endforeach

                    <p>Додати картинку до слайдеру</p>
                    <form class="form-horizontal" method="POST" action="{{ route('product_img_slider') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="farm_name" value="{{$farm->name}}">
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
                @endforeach
            </div>

            @endforeach

        </div>
    </div>
</div>
@endsection
