@extends('layouts.master')

@section('title')
    <title>{{ $user->name }}</title>
@endsection

@section('content')


    @if(Auth::user()->isAdmin())

        <ol class='breadcrumb'>
            <li><a href='/'>Home</a></li>
            <li><a href='/user'>Users</a></li>
            <li><a href='/user/{{ $user->id }}'>{{ $user->name }}</a></li>
        </ol>

    @else

        <ol class='breadcrumb'>
            <li><a href='/'>Home</a></li>
            <li><a href='/user/{{ $user->id }}'>{{ $user->name }}</a></li>
        </ol>

    @endif

    <br>

    <h1>User:  {{ $user->name }}</h1>

    <hr/>

    <div class="panel panel-default">
        <!-- Default panel contents -->

        <!-- Table -->
        <table class="table table-striped">
            <thead>
            <tr>

                <th>Id</th>
                <th>Name</th>
                <th>Profile</th>
                <th>Email</th>
                <th>Subscribed</th>
                <th>Admin</th>
                <th>Status</th>
                <th>Created</th>
                @if(Auth::user()->adminOrCurrentUserOwns($user))
                    <th>Edit</th>
                @endif
                <th>Delete</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $user->id }} </td>

                <td> <a href="/user/{{ $user->id }}/edit">
                        {{ $user->name }}</a></td>

                @if (isset($profile->id))

                    <td> <a href="/profile/{{ $profile->id }}">
                            {{$user->profile->fullName()}}</a></td>
                @else

                    <td>none</td>

                @endif

                <td>{{ $user->email }}</td>
                <td>{{ $user->showNewsletterStatusOf($user) }}</td>
                <td>{{ $user->showAdminStatusOf($user) }}</td>
                <td>{{ $user->showStatusOf($user) }}</td>
                <td>{{ $user->created_at->format('m-d-Y') }}</td>
                @if(Auth::user()->adminOrCurrentUserOwns($user))

                    <td> <a href="/user/{{ $user->id }}/edit">

                            <button type="button" class="btn btn-default">Edit</button></a></td>

                @endif


                <td>
                    <div class="form-group">

                        <form class="form" role="form" method="POST" action="{{ url('/user/'. $user->id) }}">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}

                            <input class="btn btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">

                        </form>
                    </div>
                </td>
            </tr>
            </tbody>

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