@extends('layout')

@section('content')
    <h1 class="title">Edit Project</h1>

    <form method="POST" action="/projects/{{$project->id}}" style="margin-bottom: 1em">
        @method('PATCH')
       @csrf
        <label for="title" class="label">title</label>
        <div class="control">
            <input type="text" name="title" placeholder="Title" class="input" value="{{$project->title}}">
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>
        </div>

        <div class="control">
            <textarea name="description" class="textarea" cols="30" rows="10">{{$project->description}}</textarea>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Updates Project</button>
            </div>

        </div>
    </form>

    @include('errors')


   <form method="POST" action="/projects/{{$project->id}}">
       @method('DELETE')
       @csrf

        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete Project</button>
            </div>
        </div>
    </form>


@endsection
