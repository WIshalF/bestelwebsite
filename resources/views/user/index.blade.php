@extends('layouts.master')

@section('title')

    <title>Users</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Users</li>
    </ol>

    <h2>Users</h2>

    <hr/>

    @if($users->count() > 0)

        <table class="table table-hover table-bordered table-striped">

            <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Admin</th>
            <th>Status</th>
            <th>Newsletter</th>
            <th>Date Created</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>

            <tbody>

            @foreach($users as $user)

                <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="/user/{{ $user->id }}">{{ $user->name }}</a></td>
                    <td>{{ $user->showAdminStatusOf($user) }}</td>
                    <td>{{ $user->showStatusOf($user) }}</td>
                    <td>{{ $user->showNewsletterStatusOf($user) }}</td>
                    <td>{{ $user->created_at->format('m-d-Y') }}</td>


                    <td> <a href="/user/{{ $user->id }}/edit">

                            <button type="button" class="btn btn-default">Edit</button></a></td>

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

            @endforeach

            </tbody>

        </table>



    @else

        Sorry, no Users

    @endif

    {{ $users->links() }}




@endsection