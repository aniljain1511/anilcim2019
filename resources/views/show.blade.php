@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Blog Details <a href="{{config('app.url')}}/home" class="btn btn-primary pull-right">Back</a></div>

                <div class="card-body">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                               <div class="form-control datadiv">{{$blog->title}}</div>
                
            
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                              <div class="form-control datadiv"> {{$blog->description}}</div>
            
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Author</label>

                            <div class="col-md-6">
                                <div class="form-control datadiv">{{$blog->name}}</div>
                             </select>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Date</label>

                            <div class="col-md-6">
                                <div class="form-control datadiv">{{date('Y-m-d',strtotime($blog->created_at))}}</div>
                             </select>


                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6">
                                <div class="form-control datadiv">{{$blog->status == 1?'Active':'Inactive'}}</div>
                             </select>


                            </div>
                        </div>
                   
                        
                           


                </div>
            </div>
        </div>
    </div>
</div>


@endsection
