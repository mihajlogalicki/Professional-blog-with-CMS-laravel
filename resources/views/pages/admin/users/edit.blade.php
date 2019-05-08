@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User
            <small>Edit User</small>
          </h1>
          <ol class="breadcrumb">
            <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
              <li class="active">
                <a href="{{ route('admin.index') }}"> Blog </a>
                <li class="active">Edit User</li>
              </li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                    <div class="box-content">
                            {!! Form::model($user, [

                                'method' => 'PUT',
                                'route' => ['admin.update', $user->id],
                                'files' => TRUE

                            ]) !!}

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                {!! Form::label('name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}

                                @if($errors->has('name'))
                                 <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                {!! Form::label('email') !!}
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}

                                @if($errors->has('email'))
                                 <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                           </div>
                           <div class="form-group {{ $errors->has('bio') ? 'has-error' : '' }}">
                              {!! Form::label('bio') !!}
                              {!! Form::text('bio', null, ['class' => 'form-control']) !!}

                              @if($errors->has('bio'))
                               <span class="help-block">{{ $errors->first('bio') }}</span>
                              @endif
                          </div>

                              <hr>

                            {!! Form::submit('Update categorie', ['class' => 'btn btn-primary']) !!}

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
