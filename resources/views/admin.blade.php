@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-light">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">

<!-- LIST of User Profiles -->
<br>
<br>
<div class=col-md-12>
    
    <form id="form-list-client">
            <legend>List of User Profiles</legend>
    
    <div class="pull-right">
        <a class="btn btn-default-btn-xs btn-primary"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
        <a class="btn btn-default-btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> New</a>
    </div>
    <table class="table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <td>Name</td>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
                
        </thead>
        <tbody id="form-list-client-body">
            <tr>
                <td>x</td>
                <td>x</td>
                <td>Active/Inactive </td>
                <td>
                    <a title="view this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-eye-open text-primary"></i> </a>
                    <a title="edit this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-edit text-primary"></i> </a>
                    <a title="delete this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-trash text-danger"></i> </a>
                   
                </td>
            </tr>
        </tbody>
    </table>
    </form>

    
</div>

<!-- Profile Active/Inactive Button Switch -->
<div class="form-group">
  <label class="col-md-4 control-label" for="client-status">Client status</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="client-status-0">
      <input type="radio" name="client-status" id="client-status-0" value="active" checked="checked">
      Active
    </label>
	</div>
  <div class="radio">
    <label for="client-status-1">
      <input type="radio" name="client-status" id="client-status-1" value="inactive">
      Inactive
    </label>
	</div>
  </div>
</div>
@endsection