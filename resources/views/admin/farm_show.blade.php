@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default farm">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="panel-heading">
                    
                    <span class="pull-left title">Name: {{$farm->name}}</span>
                    <a href="{{route('admin_farm_edit', ['id' => $farm->id])}}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-pencil"></i></a>
                    <form method="post" action="{{route('admin_farm_destroy')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$farm->id}}">
                        <button type="submit" class="btn btn-danger">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    </form>
                    
                    <p>Description: {{$farm->description}}</p>
                    <p>Owner: {{$farm->user->name}}</p>
                    <p>Registration farm: {{$farm->created_at}}</p>
                    <p>Location: {{$farm->location}}</p>
                </div>
            </div>

            <h1 class="text-center">Your products</h1>
            <div class="panel panel-default farm">
                @if (session('status_product'))
                    <div class="alert alert-success">
                        {{ session('status_product') }}
                    </div>
                @endif
                <p><a class="btn btn-success" href="{{route('admin_product_create', ['id' => $farm->id])}}">Add product</a></p>
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

                    <a class="pull-left title" href="{{route('admin_product_show', ['id' => $farm->id, 'product_id' => $product->id])}}">Name: {{$product->name}}</a>

                    <a href="{{route('admin_product_edit', ['id' => $farm->id, 'product_id' => $product->id])}}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-pencil"></i></a>
                    <form method="post" action="{{route('admin_product_destroy')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$product->id}}">
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
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection