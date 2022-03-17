@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <div class="ml-3">  Lista Post </div>
                <a href="{{route('admin.posts.create')}}" class="mr-3">Aggiungi</a>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($posts as $post)
                            <li class="list-group-item">{{$post->title}}</li>
                            {{-- @if ($post->getDifferenceHour($post->created_at))
                                <div class="ml-3 mt-3"> Creato il: {{$post->getFormattedDate($post->created_at)}} </div>
                                <div class="ml-3 mt-3"> Ultima modifica: {{$post->getFormattedDate($post->updated_at)}} </div>
                            @endif --}}
                            @if ($post->getDifferenceHour($post->created_at))
                            <div class="ml-3 mt-3">Creato il: {{$post->getFormattedDate($post->created_at)}} </div>
                            <div class="ml-3 mt-3"> Ultima modifica: {{$post->actualTime($post->updated_at)}} </div>
                            @else
                            <div class="ml-3 mt-3"> Creato il: {{$post->getFormattedDate($post->created_at)}} </div>
                            <div class="ml-3 mt-3"> Ultima modifica: {{$post->getFormattedDate($post->updated_at)}} </div>
                            @endif 
                                <div class="d-flex align-items-center">               
                                    <a href="{{route('admin.posts.show',$post->slug)}}" title="Visualizza"><i class="fa fa-eye mr-4 ml-3"></i></a>
                                    <a href="{{route('admin.posts.edit',$post->slug)}}" title="Modifica"><i class="fas fa-edit mr-3"></i></a>
                                    @include('partials.deleteBtn',[
                                        "id"=>$post->id,
                                        "route"=>"admin.posts.destroy"
                                    ])
                                </div> 
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
