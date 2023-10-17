@extends('masters.master')
@section('content')
    <div class="main-panel">

        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Articles</a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            @can('Add Article')
                                <a class="btn custom-button" href="{{ route('articles.create') }}"> Create New Article</a>
                            @endcan
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if (Gate::allows('View Article') || Gate::allows('Edit Article') || Gate::allows('Delete Article'))
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Process</th>
                        </tr>
                        @if ($articles->count() > 0)
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $article->name }}</td>
                                    <td>{{ $article->detail }}</td>
                                    <td>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                            @can('Edit Article')
                                                <a class="btn custom-button-primary"
                                                    href="{{ route('articles.edit', $article->id) }}">Edit</a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('Delete Article')
                                                <button type="submit" class="btn custom-button-danger">Delete</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                @else
                    <span style="font-size: 16px; font-weight: bold; color: red;">You do not have permission to view
                        articles.</span>
                @endif

                {!! $articles->links() !!}
            </div>
        </div>
    </div>
@endsection
