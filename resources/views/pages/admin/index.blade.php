@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Blog
            <small>Display All Blog Posts</small>
          </h1>
          <ol class="breadcrumb">
            <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
              <li class="active">
                <a href="{{ route('admin.index') }}"> Blog </a>
                <li class="active">All Posts</li>
              </li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <!-- /.box-header -->
                  <div class="box-header">
                    <div class="pull-left">
                    <a href="{{ route('admin.create.blog') }}" class="btn btn-success">
                    Add blog
                    </a>
                    </div>
                  </div>
                  <div class="box-body ">
                    @if(session('message'))
                    <div class="alert alert-success">
                      {{ session('message')}}
                    </div>
                    @endif
                    @if(!$posts->count())
                      <div class="alert alert-warning">
                          <strong>No record found</strong>
                      </div>
                    @else
                      <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Action</td>
                                <td>Title</td>
                                <td>Author</td>
                                <td>Category</td>
                                <td>Date</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                          @foreach ($posts as $post)
                            <tr>
                                <td>
                                @if(Auth::user()->id == $post->author->id || Auth::user()->hasRole('ROLE_ADMIN'))
                                  <a href="{{ route('admin.edit.blog', $post->id) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-edit"></i>
                                  </a>
                                  <a href="{{ route('admin.delete.blog', $post->id) }}" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>
                                  </a>
                                @endif
                                </td>
                                  <td>{{ $post->title }}</td>
                                  <td>{{ $post->author->name }}</td>
                                 <td>{{ $post->category->name}}</td>
                                <td>
                                <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> |
                                @if($post->published_at == null)
                                    <span class="label label-warning">Not Published</span>
                                @else
                                    <span class="label label-success">Published</span>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                      </table>
                
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer clearfix">
                      <div class="pull-left">
                        <ul class="pagination no-margin">
                          <li>
                              {{ $posts->render() }}
                          </li>
                        </ul>
                      </div>
                      <div class="pull-right">
                      <small>{{ $posts->count() }} number of posts</small>
                      </div>
                  </div>
                </div>
                <!-- /.box -->
              </div>
            </div>
          <!-- ./row -->
        </section>
        <!-- /.content -->
      </div>
@endsection