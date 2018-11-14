@extends('layouts.app')

@section('title')

    <title>donateurs</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>donateurs</li>
    </ol>

    <h2>donateurs</h2>

    <hr/>

    @if($donateurs->count() > 0)

        <table class="table table-hover table-bordered table-striped">

            <thead>
            <th>nr</th>
            <th>Volledige Naam</th>
            <th>Geslacht</th>
            <th>Geboortedag</th>
            </thead>

            <tbody>

            @foreach($donateurs as $donateur)

                <tr>
                    <td>{{ $donateur->id }}</td>
                    <td><a href="/donateur/{{ $donateur->id }}">{{ $donateur->fullName() }}</a></td>
                    <td>{{ $donateur->showGender($donateur->gender) }}</td>
                    <td>{{ $donateur->geboortedag->format('m-d-Y') }}</td>

                </tr>

            @endforeach

            </tbody>

        </table>



    @else

        <div>Sorry, no donateurs</div>

    @endif

    {{ $donateurs->links() }}



@endsection