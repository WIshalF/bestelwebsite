@extends('layouts.app')

@section('title')

    <title>Wordt donateur</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li class='active'>Wordt Donateur</li>
    </ol>

    <h2>Wordt donateur</h2>

    <hr/>

    <form class="form" role="form" method="POST" action="{{ url('/donateur') }}">


    {{ csrf_field() }}

    <!-- first_name Form Input -->

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

            <label class="control-label">Voornaam</label>

            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

            @if ($errors->has('first_name'))

                <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
                </span>

            @endif

        </div>

        <!-- last_name Form Input -->

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">

            <label class="control-label">Last Name</label>

            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

            @if ($errors->has('last_name'))

                <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
                </span>

            @endif

        </div>

        <!-- birthdate Form Input -->

        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">

            <label class="control-label">Geboortedag</label>

            <div>

                {{  Form::date('birthdate') }}

            </div>

            @if ($errors->has('birthdate'))

                <span class="help-block">
                <strong>{{ $errors->first('birthdate') }}</strong>
                </span>

            @endif

        </div>

        <!-- geslacht Form Input -->

        <div class="form-group{{ $errors->has('geslacht') ? ' has-error' : '' }}">

            <label class="control-label">Geslacht</label>


            <select class="form-control" id="geslacht" name="geslacht">

                <option value="{{old('geslacht')}}">
                    {{ ! is_null(old('geslacht')) ?
                    (old('geslacht') == 1 ? 'Man' :'Vrouw')
                    : 'Selecteer je geslacht'}}</option>
                <option value="1">Man</option>
                <option value="0">Vrouw</option>

            </select>


            @if ($errors->has('geslacht'))

                <span class="help-block">
                <strong>{{ $errors->first('geslacht') }}</strong>
                </span>

            @endif

        </div>


        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-lg">

                maak

            </button>

        </div>

    </form>

@endsection