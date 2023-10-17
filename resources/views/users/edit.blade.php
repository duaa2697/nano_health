@extends('masters.master')
@section('content')
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Edit User</a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <a class="btn custom-button" href="{{ route('users.index') }}">Back</a>
                        </div>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <strong>Password:</strong>
                            {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <strong>Confirm Password:</strong>
                            {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <strong>Role:</strong>
                            {!! Form::select('roles[]', $roles, $userRole, [
                                'class' => 'form-control selectpicker',
                                'data-live-search' => 'true',
                                'data-actions-box' => 'true',
                                'data-tick-icon' => 'glyphicon-plus',
                                'data-width' => '100%',
                                'multiple' => 'multiple',
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn custom-button">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    @endsection
