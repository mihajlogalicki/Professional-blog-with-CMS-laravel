@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if(! $posts->count())
                <div class="alert alert-warning">
                    <p>Nothing Found</p>
                </div>
                @endif
            </div>
            <div class="col-md-8">
                    @include('pages.alert')  
                @foreach($posts as $post)
                
                <article class="post-item">
                    <div class="post-item-image">
                        <a href="{{ route('preview-blog', $post->id) }}">
                                <img src="{{ asset('img/' . $post->image) }}" />
                        </a>
                    </div>
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h2><a href="{{ route('preview-blog', $post->id) }}">{{ $post->title }}</a></h2>
                            <p>{{ $post->excerpt }}</p>
                        </div>
                        <div class="post-meta padding-10 clearfix">
                            <div class="pull-left">
                                <ul class="post-meta-group">
                                <li><i class="fa fa-user"></i><a href="{{ route('author', $post->author->id) }}">{{ $post->author->name }}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time>{{ $post->date }}</time></li>
                                    <li><i class="fa fa-folder"></i>
                                        <a href="{{ route('category', $post->category->id) }}">
                                             {{ $post->category->name }}
                                        </a></li>
                                    <li><i class="fa fa-tag"></i>{!! $post->tags_html !!}</li>
                                    <li><i class="fa fa-comments"></i><a href="{{ route('preview-blog', $post->id) }}#post-comments">{{ $post->comments->count() }} comments</a></li>
                                </ul>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('preview-blog', $post->id) }}">Continue Reading &raquo;</a>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
                <nav>
                  {{ $posts->links() }}
                </nav>
            </div>
            @include('pages.sidebar')
        </div>
    </div>
@endsection
