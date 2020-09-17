<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Posts') }}
        </h2>
    </x-slot>

    @extends('home.home')
    @section('content')
    @endsection

    @php $id = Auth::id(); $current_user = App\Models\User::find($id);@endphp

    @foreach($posts as $post)
        @foreach($users as $user)
            @if($user->id == $post->user_id)
                <div class="post">
                    <div class="controls">
                        <a href="/posts/{{$post->id}}/edit" class="edit"><i class="fa fa-edit"></i></a>

                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'style' => 'margin: 0']) !!}
                    <a class="delete"><span><i class='fa fa-trash'></i><input type="submit" value=""></span></a>
                        {!! Form::close() !!}

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
                        <a href="#"><i class="fa fa-thumbs-up"></i>Like</a>
                        <a href="#"><i class="fa fa-comment"></i>Conmment</a>
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

                            {!! Form::hidden('routing_of_pages', 'go_to_main_page', ['placeholder' => 'Write a comment']) !!}
                            <input type="submit" name="send" value="Send";>
                        {!! Form::Close() !!}


                    </div>

                    
                    <div class="commentsSection">
                        @foreach($comments as $comment)
                            @if($comment->post_id == $post->id)
                                <div class="singleComment">
                                    @php $current_user = App\Models\User::find($comment->user_id) @endphp
                                    <span class="name">{{$current_user->name}}</span>
                                    <img src="img/{{$user->img}}">
                                    <p>{{$comment->commentbody}}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>




                </div>
            @endif
        @endforeach
    @endforeach


</x-app-layout>
