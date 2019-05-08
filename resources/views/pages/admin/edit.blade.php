@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Blog
            <small>Edit Blog</small>
          </h1>
          <ol class="breadcrumb">
            <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
              <li class="active">
                <a href="{{ route('admin.index') }}"> Blog </a>
                <li class="active">Edit blog</li>
              </li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                    <div class="box-content">
                            {!! Form::model($post, [

                                'method' => 'PUT',
                                'route' => ['admin.update.blog', $post->id],
                                'files' => TRUE

                            ]) !!}
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                {!! Form::label('title') !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                @if($errors->has('title'))
                                 <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
                                {!! Form::label('text') !!}
                                {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
                                @if($errors->has('text'))
                                 <span class="help-block">{{ $errors->first('text') }}</span>
                                @endif
                           </div>
                           <div class="form-group  {{ $errors->has('published_at') ? 'has-error' : '' }}">
                               {!! Form::label('published_at', 'Publish blog') !!}
                               {!! Form::checkbox('published_at', 1, ['checked' => 'checked']) !!}
                               @if($errors->has('published_at'))
                                 <span class="help-block">{{ $errors->first('published_at') }}</span>
                                @endif
                           </div>
                           <div class="form-group {{ $errors->has('categorie_id') ? 'has-error' : '' }}">
                                  {!! Form::label('categorie_id', 'Category') !!}
                                  {!! Form::select('categorie_id', App\Categorie::pluck('name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Choose category']) !!}

                                  @if($errors->has('categorie_id'))
                                  <span class="help-block">{{ $errors->first('categorie_id') }}</span>
                                 @endif
                            </div>

                              <hr>

                            {!! Form::submit('Update blog', ['class' => 'btn btn-primary']) !!}

                            {!! Form::close() !!}
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
