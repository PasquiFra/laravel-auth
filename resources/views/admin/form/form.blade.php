<section id="form-section">
    
    <h1 class="text-center py-3">
        @if (Route::is('admin.projects.create')) Aggiungi un nuovo fumetto
        @else Modifica {{$project->title}} @endif 
    </h1>
    
    @include('admin.form.validation')
    
    @if ($project->exists)
        <form action="{{route('admin.projects.update', $project->id  ) }}" method="post" 
            class="flex container py-4 justify-content-center" enctype="multipart/form-data">
        @method('put')
    @else
        <form action="{{route('admin.projects.store')}}" method="post" 
        class="flex container py-4 justify-content-center"  enctype="multipart/form-data">
    @endif
        
        @csrf
        
    <div class="input-group mb-3 w-50 p-1 d-flex">
        <label class="form-label label" for="title">Titolo</label>
        <input type="text" required id="title" name="title" class="form-control @error('title') is-invalid @elseif(old('title')) is-valid @enderror" 
        value="{{old('title', $project->title)}}" 
        placeholder="Inserisci titolo...">
        @error('title')
        <div class="invalid-feedback">
            {{$message}}
        </div>   
        @else        
        <div class="valid-feedback">
            Campo corretto
        </div>      
        @enderror       
    </div>

    <div class="input-group mb-3 w-50 p-1 d-flex">
        <label class="form-label label" for="slug">Slug</label>
        <input type="text" id="slug" name="slug" class="form-control" 
        value="{{$project->slug }}" 
        disabled>    
    </div>

    <div class="input-group mb-3 w-100 p-1">
       <label class="form-label label" for="description">Descrizione</label>
       <textarea id="description" name="description" id="description" cols="50" rows="3" 
            placeholder="Inserisci una descrizione..." 
            class="w-100 @error('description') is-invalid @elseif(old('description')) is-valid @enderror">
            {{old('description', $project->description)}}
        </textarea>
    </div>
    
    <div class="d-flex w-100 mb-3 load-image">
        <div class="w-75">
            <div class="input-group p-1 d-flex">
                <label class="form-label label" for="image">Url Immagine</label>
                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @elseif(old('image')) is-valid @enderror">
                @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>   
                @else        
                <div class="valid-feedback">
                    Campo corretto
                </div>      
                @enderror       
            </div>
        </div>

        <div class="" id="preview-section">
            <img id="preview" src="{{ old('image', $project->image) 
            ? asset('storage/' . old('image', $project->image)) 
            : 'https://t4.ftcdn.net/jpg/05/17/53/57/360_F_517535712_q7f9QC9X6TQxWi6xYZZbMmw5cnLMr279.jpg'}}" 
            alt="{{$project->slug}}">
        </div>
    </div>

    <div class="input-group mb-3 w-100 p-1 d-flex">
        <label class="form-label label" for="project_url">Url progetto</label>
        <input type="text" required id="project_url" name="project_url" class="form-control @error('project_url') is-invalid @elseif(old('project_url')) is-valid @enderror" 
        value="{{old('project_url', $project->project_url)}}" 
        placeholder="Inserisci url progetto...">
        @error('project_url')
        <div class="invalid-feedback">
            {{$message}}
        </div>   
        @else        
        <div class="valid-feedback">
            Campo corretto
        </div>      
        @enderror       
    </div>

    <div class="input-group mb-3 w-50 p-1 d-flex">
        <label class="form-label label" for="tags">Tags</label>
        <input type="text" required id="tags" name="tags" class="form-control @error('tags') is-invalid @elseif(old('tags')) is-valid @enderror" 
        value="{{old('tags', $project->tags)}}" 
        placeholder="Inserisci i linguaggi e/o i framework utilizzati...">
        @error('tags')
        <div class="invalid-feedback">
            {{$message}}
        </div>   
        @else        
        <div class="valid-feedback">
            Campo corretto
        </div>      
        @enderror       
    </div>

    <div class="ps-5 d-flex w-50">
        <div class="form-check px-5 pt-5">
            <input class="form-check-input" type="radio" name="is_published" value="1" id="radio-public"
            {{$project->is_published == 1 ? 'checked' : ''}}>
            <label class="form-check-label" for="radio-public">
              Pubblica
            </label>
        </div>
        <div class="form-check pt-5">
            <input class="form-check-input" type="radio" name="is_published" value="0" id="radio-edit" 
            {{$project->is_published == 0 ? 'checked' : ''}}>
            <label class="form-check-label" for="radio-edit">
              Bozza
            </label>
        </div>
    </div>

    <div class="w-100 pt-4">
        <button type="submit" class="btn btn-success me-3">Salva</button>
        <button type="reset" class="btn btn-danger">Svuota</button>
    </div>

</form>

</section>

@include('scripts.slug')
@include('scripts.preview-image')