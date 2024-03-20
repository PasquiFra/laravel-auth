@extends('layouts.app')
@section('content')

<h1 class="text-center my-3">{{$project->title}}</h1>

<section id="show-index" class="d-flex">
    <div class="edits">

        <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-warning">
            <i class="fa-solid fa-pen"></i>
            <span>Modifica</span>
        </a>
        <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" 
            class="btn btn-danger" id="form-delete">
            @method('delete')
            @csrf
            <i class="fa-solid fa-trash"></i>
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>

    </div>

    <div  class="project">
        <div>
            Descrizione: 
            <p> {{$project->description}} </p>
        </div>
        <ul>
            <li>
                Vai a GitHub: <a href="{{$project->project_url}}" class="link">{{$project->project_url}}</a>
            </li>
            <li>
                Stato: <span class="{{$project->is_published ? 'text-success' : 'text-warning'}}">{{$project->is_published ? 'Pubblicato' : 'Bozza'}}</span>
            </li>
            <li>
                Creato il: {{$project->created_at}}
            </li>
            <li>
                Ultima modifica: {{$project->updated_at}}
            </li>
        </ul>
    </div>  
    
</section>

@endsection


@section('scripts')
    @include('scripts.delete-confirmation')
@endsection