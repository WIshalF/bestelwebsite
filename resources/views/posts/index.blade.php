@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message')}}</div>;
            @endif
            <div class="posts">
     <table class="table">
        <tr>
            <th>Quote</th>
            <th>Actie</th>
        </tr>

       @foreach($posts as $post)
           <tr>
               <td> {{$post->post }} </td>

              <td>
                  {!! Form::open(array('route'=>['post.destroy',$post->id],'method'=>'DELETE')) !!}
                  {{link_to_route('post.show','show',[$post->id],['class'=>'btn btn-primary'])}}
                  {{link_to_route('post.edit','edit',[$post->id],['class'=>'btn btn-primary'])}}
                    {!! Form::button('Delete',['class'=>'btn btn-secondary', 'type'=>'submit']) !!}
                    {!! Form::close() !!}
              </td>
           @endforeach
     </table>
    </div>
        </div>
    </div>

        <form action="searchPost" method="get">
            <div class="Post-group">
                <input type="search" name="search" class="form-control"
                       placeholder="Search Post"> <span class="input-group-btn">
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-search">Search</span>
					</button>
    {{link_to_route('post.create','Voeg nieuwe Quote',null,['class'=>'btn btn-primary'])}}

    @endsection
