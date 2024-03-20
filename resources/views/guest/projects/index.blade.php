@extends('layouts.app')
@section('main-content')

<h1 class="text-center">I miei progetti</h1>

<section id="guest-index" class="d-flex">

    <ul class="w-100">
        @forelse ($projects as $project)
        <li  class="project">
            <a href="{{route('guest.projects.show', $project->id)}}">
                <h3 class="text-center">{{$project->title}}</h3>
                <p class="text-center"> {{$project->description}} </p>
                <div>
                    Vai a GitHub:<a href="{{$project->project_url}}" class="link">{{$project->project_url}}</a>
                </div>
            </a>
        </li>  
        @empty
            <h1>Non ci sono progetti da mostrare</h1>
        @endforelse
    </ul>

</section>

@endsection