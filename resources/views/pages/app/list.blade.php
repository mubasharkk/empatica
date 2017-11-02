@extends('layouts.base')

@section('content')
    <div class="overflow-fix col-md-12">
        <a href="{{route('apps.create')}}" class="btn btn-success pull-right">
            <i class="fa fa-fw fa-plus"></i> Create new Mobile App
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
                    <form action="{{route('apps.destroy', ['app' => $item['id']])}}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-fw fa-trash"></i>
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection('content')