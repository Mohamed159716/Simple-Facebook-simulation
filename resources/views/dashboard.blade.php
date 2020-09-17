<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Posts') }}
        </h2>
    </x-slot>

    @php
        $id = Auth::id();
        $user = App\Models\User::find($id);
        $comments = App\Models\Comment::all();
    @endphp

    @extends('home.home')
    @section('content')
    @endsection


    @foreach($user->post as $post)

                <div class="post">
                    <div class="controls">
                        <a href="/posts/{{$post->id}}/edit" class="edit"><i class="fa fa-edit"></i></a>

                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'style' => 'margin: 0']) !!}
                    <a class="delete"><span><i class='fa fa-trash'></i><input type="submit" value=""></span></a>
                        {!! Form::close() !!}

                        <!-- <a href="{{route('posts.edit', $post->id)}}" class="delete"><i class='fa fa-trash'></i></a> -->

                        <a href="/posts/{{$post->id}}" class="show"><i class="fa fa-eye"></i></a>
                    </div>
                    <div class="mainInfo">
                        <img src="img/{{$user->img}}">
                        <p class="name">{{$user->name}}</p>
                        <p class="id">{{$user->id}}</p>
                    </div>
                    <div class="postbody">
                        <p class="title">{{$post->title}}</p>
                        {{$post->postbody}}
                    </div>
                    <!-- <div class="tools">
                        <a href="actionbtn/3/edit"><i class="fa fa-thumbs-up"></i>Like</a>
                        <a href="actionbtn"><i class="fa fa-comment"></i>Conmment</a>
                    </div> -->
                    <div class="comment">
                        <!-- <form>
                            <input type="text" name='comment' placeholder="Write a comment">
                            <input type="submit" name="send" value="Send";>
                        </form> -->


                        {!! Form::open(['url' => 'comments', 'method' => 'POST']) !!}

                            {!! Form::text('commentbody', '', ['placeholder' => 'Write a comment']) !!}
                            <!-- <input type="text" name='comment' placeholder="Write a comment"> -->

                            {!! Form::hidden('user_id', $post->user_id, ['placeholder' => 'Write a comment']) !!}

                            {!! Form::hidden('post_id', $post->id, ['placeholder' => 'Write a comment']) !!}

                            {!! Form::hidden('routing_of_pages', 'go_to_personal_page', ['placeholder' => 'Write a comment']) !!}
                            <input type="submit" name="send" value="Send";>
                        {!! Form::Close() !!}


                    </div>

                    
                    <div class="commentsSection">
                        @foreach($comments as $comment)
                            @if($comment->post_id == $post->id)
                                <div class="singleComment">
                                    @php $current_user = App\Models\User::find  ($comment->user_id) @endphp

                                    <span class="name">{{$current_user->name}}</span>
                                    <img src="img/{{$user->img}}">
                                    <p>{{$comment->commentbody}}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>


                    <!-- <div class="commentsSection">
                        <h1>{{$post->id}}</h1>
                        <h1>{{$post->user_id}}</h1>
                        <div class="singleComment">
                            <img src="{{asset('img/01.png')}}">
                            <p>Hello Mohamed How are you today? Are you OK?</p>
                        </div>

                    </div> -->
                </div>
    @endforeach
</x-app-layout>
