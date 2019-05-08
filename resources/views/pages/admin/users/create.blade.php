@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Users
            <small>Add Users</small>
          </h1>
          <ol class="breadcrumb">
            <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
              <li class="active">
                <a href="{{ route('admin.index') }}"> Blog </a>
                <li class="active">Add User</li>
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

                                'method' => 'POST',
                                'route' => 'admin.store',
                                'files' => TRUE
                            ]) !!}

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                {!! Form::label('name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}

                                @if($errors->has('email'))
                                 <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                {!! Form::label('email') !!}
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}

                                @if($errors->has('email'))
                                 <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                {!! Form::label('password') !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
  
                                @if($errors->has('password'))
                                 <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                           </div>
                           <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                              {!! Form::label('password_confirmation') !!}
                              {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
  
                              @if($errors->has('password_confirmation'))
                               <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                              @endif
                         </div>

                              <hr>

                            {!! Form::submit('Create new User', ['class' => 'btn btn-primary']) !!}

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

