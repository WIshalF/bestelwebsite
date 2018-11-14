@extends('layouts.app');
@section('content');
<h1><Center>Edit hier je quote</Center></h1>
<form action="{{ route('post.index') }}"> <input type="submit" value="Ga terug">
</form>
<form action="{{ route('post.update',$post->id) }}" method="POST">
    @csrf
    @method('PUT')
<div class="form-group">
    {{Form::textarea('post')}}

</div>
    <button type="submit">Edit</button>
<div>
    {!! Form::close() !!}
</div>

@if( count( $errors ) > 0 )
    @foreach($errors->all() as $error)
        <strong>Sorry, je moet toch iets invullen :(</strong>

    @endforeach
@endif

@endsection


