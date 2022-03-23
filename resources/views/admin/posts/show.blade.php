@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex">
            Dettagli post {{ $post['title'] }}
          </div>
          <a href="{{route('admin.posts.edit',$post->slug)}}" class="ml-3 mt-3">Modifica</a>
          <div class="card-body">
            @if ($post->coverImg)
            <img src="{{asset("storage/" . $post->coverImg)}}" class="img-fluid">
            @else
            <img src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640" class="img-fluid" alt="">
            @endif
           
            {{ $post['content'] }}

          </div>
          <div class="my-3 ml-3">
            Utente: {{ $post->user->name }}
            <br>
            Email: {{ $post->user->email }}
            <br>
            Creato il: {{$post->user->created_at}}
          </div>

          @if ($post->category !== null)
            <div class="my-3 ms-3">
            <span class="ml-3">  Categoria: {{ $post->category->name}} </span>
            </div>
          @endif
          @if ($post->tags !==null)
            <div class="my-3 ms-3">
              <span class="ml-3 mr-3"> tags: </span>
              @foreach ($post->tags as $tag)
                  <span class="bg-light mr-3">{{$tag->name}}</span>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection