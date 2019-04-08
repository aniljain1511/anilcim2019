@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Blog<a href="{{config('app.url')}}/home" class="btn btn-primary pull-right">Back</a></div>

                <div class="card-body">

                        @include('errors')


                   
                        <form method="post" action="{{config('app.url')}}/blog">

                            {{ csrf_field() }}

                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" name="title" class="form-control" value="{{ old('title') }}">
                
            
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">InActive</option>
                             </select>

                
            
                            </div>
                        </div>

                            

                              <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>

                    

                        </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
