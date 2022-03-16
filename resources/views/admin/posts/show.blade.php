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

            {{ $post['content'] }}

          </div>
          <div class="my-3 ml-3">
            Utente: {{ $post->user->name }}
            <br>
            Email: {{ $post->user->email }}
          </div>

          @if ($post->category !== null)
            <div class="my-3 ms-3">
              Categoria: {{ $post->category->name}}
              <br>
              Descrizione: {{ $post->category->description }}
            </div>
          @endif
            {{-- <div>
              Categoria:{{$post->category->name}}
              Descrizione:{{$post->category->descrizione}}
            </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection