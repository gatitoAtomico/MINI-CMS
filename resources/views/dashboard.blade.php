@extends('layouts.app')

@section('content')


<div class="container create-post">
  <a href="{{ url('/post/create') }}" class="btn btn-xs btn-success">ADD POST</a>
</div>

<!-- active posts -->
<div class="container drag-container">
<label class="text-white">ACTIVE POSTS</label>
@foreach ($activePosts as $post)
<p class="draggable flex-container" draggable="true"><span><b>Title:</b> {{$post->title}}</span>
<span class="flex-column">
    <span class="flex-end">
      <a href="{{ url('/post/' . $post->id . '/edit') }}">Edit</a>
      <label class="switch">
      <input onclick="changeStatus('{{$post->id}}', this)" type="checkbox" {{$post->status}}>
      <span class="slider round"></span>
      </label>
    </span>
    {{$post->created_at}}
  </span>
  </p>
@endforeach
</div>

<!-- inactive posts -->
<div class="container drag-container">
<label class="text-white">INACTIVE POSTS</label>
@foreach ($inactivePosts as $post)
<p class="draggable flex-container" draggable="true"><span><b>Title:</b> {{$post->title}}</span>
<span class="flex-column">
    <span class="flex-end">
      <a href="{{ url('/post/' . $post->id . '/edit') }}">Edit</a>
      <label class="switch">
      <input onclick="changeStatus('{{$post->id}}', this)" type="checkbox">
      <span class="slider round"></span>
      </label>
    </span>
    {{$post->created_at}}
  </span>
  </p>
@endforeach
</div>

<script>
    function changeStatus(id,e) {

      let status = '';

      if (e.checked) {
        status = 'checked'
      }else {
        status = '';
      }

            $.ajax( {
          // url:'/settings/profile',
          url:'./updatePostStatus',
          method:'put',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
              postid:id,
              poststatus: status
          },
          success: function( response ) { 
            console.log(response)
              if( response === 'success' ) { 
                  alert('posts status change');
              }else{
                alert('error');
              }   
          },  
          fail: function() {
              alert('NO');
          }   
      }); 
    }
</script>

@endsection


