@extends('masters.master')
@section('content')
    <div class="main-panel">

        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Roles</a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left" style="margin-bottom: 30px;">
                            @can('Add Role')
                                <a class="btn custom-button" href="{{ route('roles.create') }}"> Create New Role</a>
                            @endcan
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if (Gate::allows('View Role') || Gate::allows('Edit Role') || Gate::allows('Delete Role'))

                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Process</th>
                        </tr>
                        @if ($roles->count() > 0)
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @can('Edit Role')
                                            <a class="btn custom-button-primary"
                                                href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                        @endcan
                                        @can('Delete Role')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn custom-button-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                @else
                    <span style="font-size: 16px; font-weight: bold; color: red;">You do not have permission to view
                        roles.</span>
                @endif
                {!! $roles->render() !!}
            </div>
        </div>
    @endsection
