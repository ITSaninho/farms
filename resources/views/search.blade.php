@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('search') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="farm" class="col-md-3 control-label">Name farm</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="farm" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Location farm</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="location">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Product</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="product">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary center-block">
                                Search go
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div>
                <h1 class="text-center">Categories</h1>
                @foreach($categories as $category)
                <div class="col-md-4 text-center panel panel-default panel-body">
                    <p>
                        <a href="{{route('product_category', ['id' => $category->id])}}">{{$category->name}}</a>
                    <p>
                </div>
                @endforeach
            </div>

            @isset($farms)
                <h2 class="text-center">Farms</h2>
                @foreach($farms as $farm)
                <div class="col-md-12 panel panel-default panel-body">
                    <p>
                        <a href="{{route('farm_show', ['id' => $farm->id])}}">{{$farm->name}}</a>
                    <p>
                    <p>{{$farm->location}}</p>
                </div>
                @endforeach
            @endisset

            @if($products)
                <h2 class="text-center">Products</h2>
                @foreach($products as $product)
                <div class="col-md-12 panel panel-default panel-body">
                    <p>
                        <a href="{{route('farm_show', ['id' => $product->farm->id])}}">Farm: {{$product->farm->name}}</a>
                    <p>
                    <p>Product: {{$product->name}}</p>
                    @if($product->image === 'default.jpg')
                    <img class="my-product" src="/public/data/default/no_product.png">
                    @else
                    <img class="my-product" src="/public/data/farm/{{$product->farm->name}}/{{$product->image}}">
                    @endif
                    <p>Location: {{$product->farm->location}}</p>
                </div>
                @endforeach
            @endif
            
        </div>
    </div>
</div>
@endsection
