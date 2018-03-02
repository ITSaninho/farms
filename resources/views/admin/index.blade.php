@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <h1 class="text-center">All farms</h1>
                <div class="panel panel-default">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><a class="btn btn-success" href="{{route('admin_farm_create')}}">Create farm</a></p>
                    @foreach($farms as $farm)
                    <div class="panel-heading farm">
                        @if (session("farm_update_".$farm->id))
                            <div class="alert alert-success">
                                {{ session("farm_update_".$farm->id) }}
                            </div>
                        @endif

                        <span class="pull-left title">
                            <a href="{{route('admin_farm_show', ['id' => $farm->id])}}">{{$farm->name}}</a>
                        </span>

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
                    @endforeach
                </div>
                
            </div>

        </div>
    </div>
</div>
@endsection
