@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h3>Create a new App</h3>
        <form method="post" action="{{route('apps.store')}}">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" required class="form-control" name="app_id" placeholder="Applicatoin Id"/>
            </div>

            <div class="form-group row">
                <span class="col-md-6">
                    <input type="submit" value="Create" class="btn btn-success btn-block"/>
                </span>
                <span class="col-md-6">
                    <a href="{{route('apps.index')}}" class="btn btn-default btn-block">Cancel</a>
                </span>
            </div>
        </form>
    </div>
</div>
@endsection('content')