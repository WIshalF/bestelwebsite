<!doctype html>
<html lang="html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hoopp</title>

    <!-- Maps -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script> --}}
{{-- <script> key=AIzaSyAdPParCuBkYmnjyZDzfLiENHbhpk7bhKo </script> --}}

<!-- Fonts -->
    <!-- Styles -->
    <style>
    </style>
</head>

<body>

<form action="searchpost" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
               placeholder="Search post"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search">Search</span>
					</button>
				</span>
    </div>
</form>

<div class="row">
    <div class="leftcolumn">
        @if(isset($details))
            @foreach ($details as $post)
                <div class="card">
                    <h2>{{$post->title}}</h2>
                    <h5>{{$post->description}}, {{$post->created_at}}</h5>
                    <div class="fakeimg" style="height:200px;">Image</div>
                    <p>
                        <button>
                            <a href='post/{{$post->id}}'>
                                Click for full post
                            </a>
                        </button>
                    </p>
                </div>
            @endforeach
        @elseif(isset($message))
            <p>{{ $message }}</p>
        @endif
    </div>


    <div class="rightcolumn">
        <div class="card">
            <h2>Share your own journey</h2>
            {{-- <button><a href="post/create">Create here</a></button> --}}
        </div>
        <div class="card">
            <h3>Popular Post</h3>
            <div class="fakeimg">Image</div><br>
            <div class="fakeimg">Image</div><br>
            <div class="fakeimg">Image</div>
        </div>
        <div class="card">
            <h3>Follow Me</h3>
            <p>Some text..</p>
        </div>
    </div>
</div>
<br>
{{-- <div class="pagination">
  {{$post->links()}}
</div> --}}
</body>
<footer>
    <div class="footer">
        <button class="button hoverButton">
            <a href="{{ url('/') }}">
                Home Page
            </a>
        </button>
        <button class="button hoverButton">
            <a href="{{ url('/post') }}">
                post page
            </a>
        </button>
        <button class="button hoverButton">
            <a href="{{ url('/contact') }}">
                Contact
            </a>
        </button>
    </div>
</footer>
</html>
@stop