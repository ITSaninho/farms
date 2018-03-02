@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                @if (session('farm_destrot'))
                    <div class="alert alert-success">
                        {{ session('farm_destrot') }}
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="panel-heading">Create farm</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('farmer_create') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Name farm</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Description</label>

                            <div class="col-md-10">
                                <textarea name="description" class="form-control" rows="3" required autofocus></textarea>
                            </div>
                        </div>
                        <div id="map_canvas"></div>

                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Location</label>

                            <div class="col-md-10">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d25571780.26362899!2d-96.55597425!3d38.52096802215552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1suk!2s!4v1519858767271" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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

            <h1 class="text-center">Your farms</h1>
            <div class="panel panel-default">
                @foreach($farms as $farm)
                <div class="panel-heading farm">
                    <span class="pull-left title">
                        <a href="{{route('farm', ['id' => $farm->id])}}">{{$farm->name}}</a>
                    </span>

                    <a href="{{route('farm_edit', ['id' => $farm->id])}}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-pencil"></i></a>
                    <form method="post" action="{{route('farm_destroy')}}">
                        <input type="hidden" name="id" value="{{$farm->id}}">
                        <button type="submit" class="btn btn-danger">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    </form>

                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
