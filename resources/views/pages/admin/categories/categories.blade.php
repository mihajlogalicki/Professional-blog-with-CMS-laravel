@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Categories
            <small>Display All Blog Categories</small>
          </h1>
          <ol class="breadcrumb">
            <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
              <li class="active">
                <li class="active">All Categories</li>
              </li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-body ">
                      <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
                          Add Categorie
                          </a>
                    @if(session('message'))
                    <div class="alert alert-success">
                      {{ session('message')}}
                    </div>
                    @endif
                    @if(!$categories->count())
                      <div class="alert alert-warning">
                          <strong>No record found</strong>
                      </div>
                    @else
                      <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Action</td>
                                <td>Category Name</td>
                                <td>Post Count</td>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($categories as $categorie)
                            <tr>
                                <td>
                                <a onclick="return confirm('Are you sure?);" href="{{ route('admin.categories.edit', $categorie->id) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-edit"></i>
                                  </a>
                                  <a href="{{ route('admin.categories.delete', $categorie->id) }}" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>
                                  </a>
                                </td>
                                <td>{{ $categorie->name }}</td>
                                <td>  
                                    {{ $categorie->posts->count() }}
                                </td>
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
                              {{ $categories->render() }}
                          </li>
                        </ul>
                      </div>
                      <div class="pull-right">
                      <small>{{ $categories->count() }} number of categories</small>
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