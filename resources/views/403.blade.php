@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Blogs <a href="{{config('app.url')}}/home" class="btn btn-primary pull-right">Back</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Unauthorized to access</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
