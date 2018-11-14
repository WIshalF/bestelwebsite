@extends('layouts.app')

@section('title')

    <title>Edit a Donateur</title>

@endsection

@section('content')

    @if(Auth::user()->isAdmin())

        <ol class='breadcrumb'>
            <li><a href='/'>Home</a></li>
            <li><a href='/Donateur'>Donateurs</a></li>
            <li><a href='/Donateur/{{ $Donateur->id }}'>{{ $Donateur->voornaam() }}</a></li>
        </ol>

    @else

        <ol class='breadcrumb'>
            <li><a href='/'>Home</a></li>
            <li><a href='/Donateur/{{ $Donateur->id }}'>{{ $Donateur->voornaam() }}</a></li>
        </ol>

    @endif

    <h2>Edit Your Donateur</h2>

    <hr/>

    <form class="form" role="form" method="POST" action="{{ url('/Donateur/'. $Donateur->id) }}">

        <input type="hidden" name="_method" value="patch">

    {{ csrf_field() }}

    <!-- first_name Form Input -->

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

            <label class="control-label">First Name</label>

            <input type="text" class="form-control" name="first_name" value="{{ $Donateur->first_name }}">

            @if ($errors->has('first_name'))

                <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
                </span>

            @endif

        </div>

        <!-- last_name Form Input -->

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">

            <label class="control-label">Last Name</label>

            <input type="text" class="form-control" name="last_name" value="{{  $Donateur->last_name }}">

            @if ($errors->has('last_name'))

                <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
                </span>

            @endif

        </div>

        <!-- birthdate Form Input -->

        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">

            <label class="control-label">Birthdate</label>

            <div>

                {{  Form::date('birthdate', $Donateur->birthdate) }}

            </div>


            @if ($errors->has('birthdate'))

                <span class="help-block">
                <strong>{{ $errors->first('birthdate') }}</strong>
                </span>

            @endif

        </div>

        <!-- Gender Form Input -->

        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">

            <label class="control-label">Gender</label>


            <select class="form-control" id="gender" name="gender">
                <option value="{{ $Donateur->gender }}">{{ $Donateur->showGender($Donateur->gender) }}</option>
                <option value="1">Male</option>
                <option value="0">Female</option>
            </select>


            @if ($errors->has('gender'))

                <span class="help-block">
                <strong>{{ $errors->first('gender') }}</strong>
                </span>

            @endif

        </div>


        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-lg">

                Update

            </button>

        </div>

    </form>

@endsection