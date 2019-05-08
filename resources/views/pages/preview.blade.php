@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post-item post-detail">
                    <div class="post-item-image">
                            <img src="{{ asset('img/' . $post->image) }}" />
                    </div>
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h1>{{ $post->title }}</h1>
                            <div class="post-meta no-border">
                                <ul class="post-meta-group">
                                <li><i class="fa fa-user"></i><a href="{{ route('author', $post->author->id) }}"> {{ $post->author->name }}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> {{ $post->date }}</time></li>
                                <li><i class="fa fa-folder"></i><a href="{{ route('category', $post->category->id) }}"> {{ $post->category->name }}</a></li>
                                <li><i class="fa fa-tag"></i>{!! $post->tags_html !!}</li>
                                <li><i class="fa fa-comments"></i><a href="#post-comments">{{ $post->comments->count() }} comments</a></li>
                                </ul>
                            </div>
                            <p>{{ $post->text }}</p>
                        </div>
                    </div>
                </article>
                <article class="post-author padding-10">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                                <img src="{{ asset('img/author.jpg') }}" alt="">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="{{ route('author', $post->author->id) }}">{{ $post->author->name }}</a></h4>
                        <div class="post-author-count">
                          <a href="{{ route('author', $post->author->id) }}">
                              <i class="fa fa-clone"></i>
                              {{ $post->author->posts()->published()->count() }}
                          </a>
                        </div>
                        <p>{{ $post->author->bio }}</p>
                      </div>
                    </div>
                </article>
                <!-- comments -->
                @include('pages.comments')
            </div>
           
            @include('pages.sidebar')
            
        </div>
    </div>
@endsection