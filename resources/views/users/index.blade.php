@extends('masters.master')
@section('content')
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Users</a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            @can('Add User')
                                <a class="btn custom-button" href="{{ route('users.create') }}">Create New User</a>
                            @endcan
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if (Gate::allows('View User') || Gate::allows('Edit User') || Gate::allows('Delete User'))
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Roles</th>
                            <th>Email</th>
                            <th>Process</th>
                        </tr>
                        @if ($data->count() > 0)
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <span>{{ $v }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @can('Edit User')
                                            <a class="btn custom-button-primary"
                                                href="{{ route('users.edit', $user->id) }}">Edit</a>
                                        @endcan
                                        @can('Delete User')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
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
                        users.</span>
                @endif

                {!! $data->render() !!}
            </div>
        </div>
    @endsection
