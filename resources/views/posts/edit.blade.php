@extends('home.home')

@section('content')

    {!! Form::open(['route' =>['posts.update', $post->id], 'method' => 'PUT', 'class'=>"formedit"]) !!}
        <div class="form-row">
            <div class="col">
                <label>Title</label>
                {!! Form::text('title', $post->title, ['placeholder' => 'Title']) !!}
            </div>
            <div class="col bodypost">
                <label>Body</label>
            {!! Form::text('postbody', $post->postbody, ['placeholder' => 'Body']) !!}
            </div>
            <div class="col">
            <input type="submit" class="form-control" value="Create">
            </div>
        </div>
    {!! Form::close() !!}

@endsection