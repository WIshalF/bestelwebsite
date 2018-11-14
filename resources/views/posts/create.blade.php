@extends('layouts.app');
@section('content');
    <h1>Post hier je quote</h1>
    {!! Form::open(array('route' => 'post.store')) !!}

    <div class="form-group">
        {{Form::textarea('post')}}

    </div>
  {{Form::submit('Verstuur quote',array('class' =>'btn btn-success btn-block', 'style' =>'margin-top'))}};
<div>
    {!! Form::close() !!}
    </div>

    @if( count( $errors ) > 0 )
      @foreach($errors->all() as $error)
      <strong>Sorry, je moet toch iets invullen :(</strong>

    @endforeach
 @endif

    @endsection


