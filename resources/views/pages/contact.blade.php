@extends('layouts.app')
@section('content')
    <h1> contact</h1>

    {!! Form::open(['url' => 'contact/submit']) !!}

       <div class="form-group1">

           {{Form::label('naam')}}
           {{Form::text('naam')}}

       </div>
    <div class="form-group2">
        {{Form::label('achternaam')}}
        {{Form::text('achternaam')}}

    </div>
    <div class="form-group3">
        {{Form::label('vraag')}}
        {{Form::textarea('vraag')}}

    </div>
    {{Form::submit('Verstuur Post',array('class' =>'btn btn-success btn-block', 'style' =>'margin-top'))}}
    </div>

    {!! Form::close() !!}

@endsection