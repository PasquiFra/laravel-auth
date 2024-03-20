@extends('layouts.app')
@section('content')

<h1 class="text-center">I miei progetti</h1>

<section id="guest-index" class="d-flex">

    <h1>{{$project->title}}</h1>
    <div  class="project">
        <p class="text-center"> {{$project->description}} </p>
        <div>
            Vai a GitHub:<a href="{{$project->project_url}}" class="link">{{$project->project_url}}</a>
        </div>
    </div>  
    
</section>

@endsection