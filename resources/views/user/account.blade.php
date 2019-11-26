@extends('layouts.main')

@section('page-title','Information Account')

@section('custom-css')

@endsection
    
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                INFORMATION ACCOUNT
            </div>  
            @if(session('class'))
            <div class="alert alert-{{session('class')}} alert-dismissible fade show">
                <li>{{session('message')}}</li>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="col-9 container">
            <div class="panel-body">
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data" >
                         @csrf
                        <div class="col-lg-9" style="margin-left: 10px">
                            <div class="panel panel-default">
                            <div class="tab-content ml-1" id="myTabContent">
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5" style="margin-left: 10px">
                                    <label style="font-weight:bold;">Name</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{Auth::user()->name}} 
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5" style="margin-left: 10px">
                                    <label style="font-weight:bold;">Email</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{Auth::user()->email}} 
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5"style="margin-left: 10px">
                                    <label style="font-weight:bold;">First Name</label>
                                </div>
                                <div class="col-md-8 col-5">
                                    {{Auth::user()->firstname}}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5" style="margin-left: 10px">
                                    <label style="font-weight:bold;">Last Name</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{Auth::user()->lastname}}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5" style="margin-left: 10px">
                                    <label style="font-weight:bold;">Phone</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{Auth::user()->phone}}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5" style="margin-left: 10px">
                                    <label style="font-weight:bold;">Address</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{Auth::user()->address}}
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-9 container">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-md pull-right">Save Change</button>
                    </div>
                    <div>
                        <p class="help"><i class="required">(*)</i> : Required Input !</p>
                        <p class="help">Click avatar to change your avatar !</p>
                    </div>
                    </div>
                </form>
            </div>
            </div>
            </div>
        </div>>
    </div>
</div>
		
@endsection

@section('cutom-js')

@endsection
