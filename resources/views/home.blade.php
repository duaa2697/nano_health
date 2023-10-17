@extends('masters.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body" style="margin-top: 15%;margin-left: 15%;">
                        <div style="text-align: center;">
                            <p style="font-size: 24px; font-weight: bold; margin-bottom: revert;">
                                {{ __('Welcome to Nano Health Dashboard') }}
                            </p>
                            <img src="{{ asset('images/nano.png') }}" alt="Your Image">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
