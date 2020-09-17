@extends('home.home');

@section('content')

<table cellpadding = '15' cellspacing = '15' border = 1>
    <tr bgcolor="#696161" style="color: #fff">
        <th>ID</th>
        <th>Title</th>
        <th>Body</th>
    </tr>
    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->postbody}}</td>
    </tr>
    <tr>
        <td style="background:#7b0e0e; text-align: center;" colspan="3">
            <a style="color: #d2d2d2" href="{{route('posts.index')}}">Back to Posts</a>
        </td>
    </tr>
</table>

@endsection