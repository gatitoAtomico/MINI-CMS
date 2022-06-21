@extends('layouts.app')

@section('content')

<div class="container">
    @foreach ($activePosts as $post)
    <div class="card m-3">
    <div class="card-header">
    {{ $post->title }}
    </div>
    <div class="card-body parent">
        <p class="card-text">@php echo html_entity_decode($post->content) @endphp</p>
        <div class="card-image">
        <img  width="100" height="100" src={{ asset('storage/'.$post->image) }}/>
        </div>
    </div>
        <div class="card-footer text-right">
        @php
           echo date_format($post->created_at,"d/m/Y")
        @endphp
        </div>
    </div>
  

    @endforeach
</div>


@endsection