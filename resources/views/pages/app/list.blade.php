@extends('layouts.base')

@section('content')
    <div class="overflow-fix col-md-12">
        <a href="{{route('apps.create')}}" class="btn btn-success pull-right">
            <i clas="fa fa-fw"></i> Create new Mobile App
        </a>
    </div>
<div class="table-responsive col-md-12">

    <table class="table table-hover">
        <thead>
        <tr>
            <th>App ID</th>
            <th>Created By</th>
            <th>Status</th>
            <th>Create At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list as $item)
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item['created_by']}}</td>
                <td>{!! $item['status'] ? '<span class="label label-success">Enabled</span>' : '<span class="label label-danger">Disabled</span>' !!}</td>
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