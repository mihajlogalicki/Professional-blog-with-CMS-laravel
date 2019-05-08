@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User
            <small>Delete Confirmation</small>
          </h1>
          <ol class="breadcrumb">
            <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
              <li class="active">
                <a href="{{ route('admin.index') }}"> Blog </a>
                <li class="active">Delete Confirmation</li>
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

                                'method' => 'DELETE',
                                'route' => ['admin.destroy', $user->id]

                            ]) !!}

            <div class="col-xs-9">
                <div class="box">
                    <div class="box-body">
                        <p>
                            You have specified this user for deletion:
                        </p>
                        <p>
                            ID # {{ $user->id }}: {{$user->name}}
                        </p>
                        <h4>
                            <input type="checkbox" name="checked" value="1">
                            If you delete this user, it will automatically delete all his posts!
                        </h4>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-danger">Confirm Deletion</button>
                <a href="{{ route('admin.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </div>

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

