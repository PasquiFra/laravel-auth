@extends('layouts.app')
@section('main-content')

<h1 class="text-center m-3">Home page di Francesco Pasquinoni</h1>

<section id="presents" class="d-flex">

    <a href="{{route('guest.profile')}}" class="card btn">Il mio profilo</a>
    <div class="dropdown card">
        <button class="btn dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          I miei progetti
        </button>
        <ul class="dropdown-menu w-100">
            @forelse ($projects as $project)
            <li  class="dropdown-item w-100 project">
                <a href="{{route('guest.projects.show', $project->id)}}">
                    <h3 class="text-center">{{$project->title}}</h3>
                    <p class="text-center"> {{$project->getShortDescription($project)}} </p>
                    <div>
                        Vai a GitHub:<a href="{{$project->project_url}}" class="link">{{$project->project_url}}</a>
                    </div>
                </a>
            </li>  
            @empty
                <h1>Non ci sono progetti da mostrare</h1>
            @endforelse
        </ul>
    </div>
</section>

@endsection