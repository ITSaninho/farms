@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">Add product</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin_product_store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="farm_id" value="{{$farm_id}}">

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

        </div>
    </div>
</div>
@endsection
