@extends('admin.layouts.master')

@section('page-title','Member')

@section('custom-css')


@endsection

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li>Users Manager</li>
            <li class="active">List Users</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">List Users</h1>
        </div>
        <div class="container">
<div class="col-lg-12">	
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->        
    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
                        <div class="large">120</div>
                        <div class="text-muted">New Orders</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
                        <div class="large">52</div>
                        <div class="text-muted">Comments</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-orange panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                        <div class="large">24</div>
                        <div class="text-muted">New Users</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-red panel-widget ">
                    <div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
                        <div class="large">25.2k</div>
                        <div class="text-muted">Page Views</div>
                    </div>
                </div>
            </div>
        </div>
    <!--/.row-->
</div>
<!--user $users-->
<div class="panel panel-container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">  MEMBER</h1>
        </div>
        <div class="row col-lg-12">
        <div class="col-md-12">
            <div class="card  card-box">
                <div class="card-body ">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table display product-overview mb-30" id="support_table5">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>UserName</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="7"></td>
                                    </tr>
                                    @foreach($users as $user)
                                    <tr data-row="">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>
                                        <button type="button" class="label label-sm label-warning">View</button>
                                        <button type="button" class="label label-sm label-warning">Edit</button>
                                        <button type="button" class="label label-sm label-warning">Delete</button>      
                                                                      </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <button type="button" class="btn btn-danger"><a href="{{ route('create') }}"> CREATE NEW MEMBER</a></button>
                            </table>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </div>
    
</div>
    </div><!--/.row-->
@endsection

@section('cutom-js')

@endsection