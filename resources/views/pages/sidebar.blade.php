<div class="col-md-4">
    <aside class="right-sidebar">
        <div class="search-widget">
            <div class="input-group align="center"">
             <form {{ route('pages.index') }} method="get">
             <input type="text" class="form-control input-lg"  value="{{ request('search') }}" name="search" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-lg btn-default pull-left" type="submit">
                    <i class="fa fa-search"></i>
                </button>
              </span>
            </div><!-- /input-group -->
        </form>
        </div>
        <div class="widget">
            <div class="widget-heading">
                <h4>Categories</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                    @foreach ($categories as $categorie)
                    <li>
                        <a href="{{ route('category', $categorie->id) }}"><i class="fa fa-angle-right"></i>{{ $categorie->name }}</a>
                        <span class="badge pull-right">{{ $categorie->posts->count() }}</span>
                    </li>    
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="widget">
            <div class="widget-heading">
                <h4>Popular Posts</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                    @foreach($posts as $post)
                    <li>
                        <div class="post-image">
                        <a href="{{ route('preview-blog', $post->id) }}">
                                <img src="{{ asset('img/' . $post->image) }}" />
                            </a>
                        </div>
                        <div class="post-body">
                            <h6><a href="{{ route('preview-blog', $post->id) }}">{{ $post->title }}</a></h6>
                            <div class="post-meta">
                                <span>{{ $post->date}}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="widget">
            <div class="widget-heading">
                <h4>Tags</h4>
            </div>
            <div class="widget-body">
                <ul class="tags">
                    @foreach($tags as $tag)
                     <li><a href="{{ route('tag', $tag->id) }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </aside>
</div>