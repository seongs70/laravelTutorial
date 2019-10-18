@extends('layout')

@section('content')
<h1 class="title">Create a New Project</h1>
<form action="/projects" method="POST">
    {{csrf_field()}}
    <div class="field">
        <label for="title" class="label">Project Title</label>
        <div class="control">
            <input class="input  {{ $errors->has('title') ? 'is-danger' : ''  }}" required type="text" name="title" value="{{old('title')}}" required>
        </div>
    </div>
    <div class="field">
        <label for="description" class="label">Project Description</label>
        <div class="control">
            <textarea class="textarea" name="description" placeholder="Project description" id="" cols="30" rows="10">{{old('description')}}</textarea>
        </div>
    </div>
    <div>
        <button class="button" type="submit">Create Project</button>
    </div>
    @include ('errors')
</form>
@endsection
