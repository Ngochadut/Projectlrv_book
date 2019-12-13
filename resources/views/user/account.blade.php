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
                <div><button><a href="{{ route('account_edit',Auth::user()->id) }}">Edit</a></button></div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div> 
</div>

		
@endsection

@section('cutom-js')

@endsection
