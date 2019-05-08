@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Display All Blog Users</small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
          <li class="active">
            <li class="active">All Users</li>
          </li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-body ">
                  <a href="{{ route('admin.user.create') }}" class="btn btn-success">
                      Add Users
                      </a>
                @if(session('message'))
                <div class="alert alert-success">
                  {{ session('message')}}
                </div>
                @endif
                @if(!$users->count())
                  <div class="alert alert-warning">
                      <strong>No record found</strong>
                  </div>
                @else
                  <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Action</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>Number of posts</td>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                        <tr>
                            <form action="{{ route('admin.assign') }} method="post">
                            <td>
                            <a onclick="return confirm('Are you sure?);" href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                              </a>
                              <a href="{{ route('admin.confirm', $user->id) }}" class="btn btn-xs btn-danger">
                                    <i class="fa fa-times"></i>
                              </a>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles[0]->display_name }}</td>
                            <td>{{ $user->posts->count() }}</td>
                          </form>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  @endif
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                  <div class="pull-left">
                    <ul class="pagination no-margin">
                      <li>
                          {{ $users->render() }}
                      </li>
                    </ul>
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