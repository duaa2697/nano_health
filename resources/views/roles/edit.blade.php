@extends('masters.master')
@section('content')
    <div class="main-panel">

        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Edit Role</a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <a class="btn custom-button" href="{{ route('roles.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error !</strong><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br />
                            <select id="permissionSelect" class="selectpicker" name="permission[]" data-live-search="true"
                                data-actions-box="true" data-tick-icon="glyphicon-plus" data-width="100%" multiple>
                                @foreach ($permission as $value)
                                    <option value="{{ $value->id }}"
                                        {{ in_array($value->id, $rolePermissions) ? 'selected' : '' }}>
                                        {{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
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
    <script src="{{ asset('js/view-model.js') }}"></script>
