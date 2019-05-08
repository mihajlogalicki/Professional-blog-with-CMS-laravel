<article class="post-comments" id="post-comments">
    <h3><i class="fa fa-comments"></i>{{ $post->comments->count() }}</h3>

    <div class="comment-body padding-10">
        <ul class="comments-list">
            @foreach($post->comments as $comment)
             <li class="comment-item">
                    <div class="comment-heading clearfix">
                    <div class="comment-author-meta">
                    <h4>{{ $comment->author_name }} <small>{{ $comment->date }}</small></h4>
                    </div>
                </div>
                <div class="comment-content">
                  {{ $comment->text }}
                </div>
             </li>
            @endforeach


            {{-- <li class="comment-item">
                <div class="comment-heading clearfix">
                    <div class="comment-author-meta">
                        <h4>John Doe <small>January 14, 2016</small></h4>
                    </div>
                </div>
                <div class="comment-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio nesciunt nulla est, atque ratione nostrum cumque ducimus maxime, amet enim tempore ipsam. Id ea, veniam ipsam perspiciatis assumenda magnam doloribus!</p>
                    <p>Quibusdam iusto culpa, necessitatibus, libero sequi quae commodi ea ab non facilis enim vitae inventore laborum hic unde esse debitis. Adipisci nostrum reprehenderit explicabo, non molestias aliquid quibusdam tempore. Vel.</p>

                    <ul class="comments-list-children">
                        <li class="comment-item">
                            <div class="comment-heading clearfix">
                                <div class="comment-author-meta">
                                    <h4>John Doe <small>January 14, 2016</small></h4>
                                </div>
                            </div>
                            <div class="comment-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio nesciunt nulla est, atque ratione nostrum cumque ducimus maxime, amet enim tempore ipsam. Id ea, veniam ipsam perspiciatis assumenda magnam doloribus!</p>
                                <p>Quibusdam iusto culpa, necessitatibus, libero sequi quae commodi ea ab non facilis enim vitae inventore laborum hic unde esse debitis. Adipisci nostrum reprehenderit explicabo, non molestias aliquid quibusdam tempore. Vel.</p>
                            </div>
                        </li>

                        <li class="comment-item">
                            <div class="comment-heading clearfix">
                                <div class="comment-author-meta">
                                    <h4>John Doe <small>January 14, 2016</small></h4>
                                </div>
                            </div>
                            <div class="comment-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio nesciunt nulla est, atque ratione nostrum cumque ducimus maxime, amet enim tempore ipsam. Id ea, veniam ipsam perspiciatis assumenda magnam doloribus!</p>
                                <p>Quibusdam iusto culpa, necessitatibus, libero sequi quae commodi ea ab non facilis enim vitae inventore laborum hic unde esse debitis. Adipisci nostrum reprehenderit explicabo, non molestias aliquid quibusdam tempore. Vel.</p>

                                <ul class="comments-list-children">
                                    <li class="comment-item">
                                        <div class="comment-heading clearfix">
                                            <div class="comment-author-meta">
                                                <h4>John Doe <small>January 14, 2016</small></h4>
                                            </div>
                                        </div>
                                        <div class="comment-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio nesciunt nulla est, atque ratione nostrum cumque ducimus maxime, amet enim tempore ipsam. Id ea, veniam ipsam perspiciatis assumenda magnam doloribus!</p>
                                            <p>Quibusdam iusto culpa, necessitatibus, libero sequi quae commodi ea ab non facilis enim vitae inventore laborum hic unde esse debitis. Adipisci nostrum reprehenderit explicabo, non molestias aliquid quibusdam tempore. Vel.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li> --}}
        </ul>

    </div>

    <div class="comment-footer padding-10">
        <h3>Leave a comment</h3>
        @if(session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
        @endif
        {!! Form::open(['route' => ['blog.comment', $post->id]]) !!}
            <div class="form-group required {{ $errors->has('author_name') ? 'has-error' : '' }}">
                <label for="name">Name</label>
                {!! Form::text('author_name', null, ['class' => 'form']) !!}
                @if($errors->has('author_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('author_name') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group required {{ $errors->has('author_email') ? 'has-error' : '' }}">
                <label for="email">Email</label>
                {!! Form::text('author_email', null, ['class' => 'form']) !!}
                @if($errors->has('author_email'))
                <span class="help-block">
                    <strong>{{ $errors->first('author_email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group required {{ $errors->has('text') ? 'has-error' : '' }}">
                <label for="comment">Comment</label>
                {!! Form::textarea('text', null, ['row' => 6, 'class' => 'form-control']) !!}
                @if($errors->has('text'))
                <span class="help-block">
                    <strong>{{ $errors->first('text') }}</strong>
                </span>
                @endif
            </div>
            <div class="clearfix">
                <div class="pull-left">
                    <button type="submit" class="btn btn-lg btn-success">Submit</button>
                </div>
                <div class="pull-right">
                    <p class="text-muted">
                        <span class="required">*</span>
                        <em>Indicates required fields</em>
                    </p>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

</article>