@extends('layouts.base')

@section('content')
    <div class="overflow-fix">
        <a href="{{route('apps.create')}}" class="btn btn-success pull-right">
            Create new Mobile App
        </a>
    </div>
<div class="table-responsive">

    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>App ID</th>
            <th>Created By</th>
            <th>Create At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list as $item)
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item['app_id']}}</td>
                <td>{{$item['created_by']}}</td>
                <td>{{$item['created_at']}}</td>
                <td>
                    <a hre="#" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection('content')