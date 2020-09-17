@extends('home.home')

@section('content')

    {!! Form::open(['url' => 'posts', 'method' => 'post']) !!}
        <div class="form-row">
            <div class="col">
                <label>Title</label>
                {!! Form::text('title', '', ['placeholder' => 'Enter your post title']) !!}
            </div>
            <div class="col">
                <label>Body</label>
            {!! Form::text('postbody', '', ['placeholder' => 'Enter your post']) !!}
            </div>
            <div class="col">
            <input type="submit" class="form-control" value="Create">
            </div>
        </div>
    {!! Form::close() !!}

@endsection