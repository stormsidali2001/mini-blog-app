@extends("layouts.app")
@section("content")
    <div class="container">
        @auth
        <form class="post_form" method="POST" action="{{route("posts")}}">
            @csrf
            <h2 class="title">New Post</h2>
            @error("body")
            <div class="error">
                {{$message}}
            </div>
            @enderror
            <textarea name="body" class="post_description" placeholder="description..."></textarea>
            <button type="submit">Publish</button>
        </form>
        @endauth

        <div class="posts_container">
            @if( $posts->count()  !=0)
                @foreach( $posts as $post)
                    <div class="post_container">
                       
                        <div class="post_head">
                            <div class="user">
                                <div class="avatar">
                                    {{$post->user->firstName[0]}}
                                </div>
                                <div class="user_info">
                                    <div class="username">@ {{$post->user->username}}</div>
                                    <div class="date">{{$post->created_at->diffForHumans()}}</div>
                                </div>

                            </div>
                            @auth
                            @if($post->user->id == auth()->user()->id)
                            <div class="post_action_buttons">
                             
                                <form action="{{route("posts.delete",$post)}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="delete-btn">delete</button>
                                    </form>
                            </div>
                            @endif
                            @endauth
                        </div>
                        <div class="body">
                            {{$post->body}}
                        </div>
                      
                            @csrf
                            @auth
                            @if(!$post->likedBy(auth()->user()))
                            <form method="POST" action="{{route("posts.likes",$post)}}">
                            @csrf
                            {{$post->likes()->count()}} likes , <button  class="like-btn" type="submit">Like</button>
                            </form>
                            @else
                            <form method="post" action="{{route("posts.likes",$post)}}">
                            @csrf
                            @method("DELETE")
                            {{$post->likes()->count()}} likes , <button  class="like-btn" type="submit">Unlike</button>
                            @endif
                            </form>

                            @endauth
                          
                        
                        
                        
                    </div>
                @endforeach
                
            @else
                there are no posts!
            @endif
           

        </div>
    </div>
@endsection

@section("head")
<link rel="stylesheet" href="{{ asset('css/posts.css') }}">
@endsection