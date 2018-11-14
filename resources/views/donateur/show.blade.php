@extends('layouts.app')



    <title>donateur</title>

@section('content')

    @if(Auth::user()->isAdmin   ())

        <ol class='breadcrumb'>
            <li><a href='/'>Home</a></li>
            <li><a href='/donateur'>donateurs</a></li>
            <li><a href='/donateur/create'></a>Create</li>
        </ol>

    @else

        <ol class='breadcrumb'>
            <li><a href='/'>Home</a></li>
            <li><a href='/donateur/create'></a>Create</li>
        </ol>

    @endif



    <h1>{{ $donateur->fullName() }}</h1>

    <hr/>

    <div class="panel panel-default">

        <!-- Table -->
        <table class="table table-striped">
            <tr>

                <th>nr</th>
                <th>volledige naam</th>
                <th>Geslacht</th>
                <th>Geboortedag</th>
                {{--@if(Auth::user()->adminOrCurrentUserOwns($donateur))--}}
                    {{--<th>Edit</th>--}}
                {{--@endif--}}

            </tr>


            <tr>
                <td>{{ $donateur->id }} </td>
                <td> <a href="/donateur/{{ $donateur->id }}/edit">
                        {{ $donateur->fullName() }}</a></td>
                <td>{{ $donateur->showGender($donateur->gender) }}</td>
                <td>{{ $donateur->geboortedag->format('m-d-Y') }}</td>

                @if(Auth::user()->adminOrCurrentUserOwns($donateur))

                    <td> <a href="/donateur/{{ $donateur->id }}/edit">

                            <button type="button" class="btn btn-default">Edit</button></a></td>

                @endif



            </tr>

        </table>


    </div>

@endsection
@section('scripts')
    <script>
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection