@extends('layouts.app')

@section('content')
<div class="container">


        <div class="row">
        <div class="col-md-12 col-md-offset-2">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
        </div>
        </div>
        <div class="row pt-5">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                <div class="panel-heading">
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Return to Dashboard</a>
                        <h3 style="color: black;">Create New Post</h3>
                    </div>
                    <div class="panel-body">
                        <form class="image-upload" method="post" action="{{ route('storePost') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"/>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>  
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" class="textarea" style="width: 730px; height: 200px"></textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror 
                            </div> 
                            <div class="mb-3">
                                <label class="form-label" for="inputImage">Image:</label>
                                <input
                                    type="file"
                                    name="image"
                                    id="inputImage"
                                    class="form-control @error('image') is-invalid @enderror">
                
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


