@extends('masters.master')
@section('content')
    <div class="main-panel">

        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Edit Article</a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <a class="btn custom-button" href="{{ route('articles.index') }}">Back</a>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> <br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('articles.update', $article->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" value="{{ $article->name }}" class="form-control"
                                    placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Detail:</strong>
                                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $article->detail }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn custom-button">Submit</button>
                        </div>
                    </div>
                </form>
                <div>
                    <div>
                        <div>
                        @endsection
