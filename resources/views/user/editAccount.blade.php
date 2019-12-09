@extends('layouts.main')

@section('page-title','Edit Information Account')

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
        <div class="col-6 container">
        <div class="panel-body">
            <div class="row">
            <form action="{{route('account_update')}}" method="get" enctype="multipart/form-data">
							@csrf
            <form action="" method="post" enctype="multipart/form-data" >
             @csrf
            <div class="row">
                <div class="col-sm-3 col-md-2 col-5" style="margin-left: 10px">
                    <label style="font-weight:bold;">Email</label>
                </div>
                <div class="col-md-8 col-6">
                    <input id="email" name="email" type="text" placeholder="Your name" class="form-control" readonly="readonly" value="{{ Auth::user()->email }}"> 
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3 col-md-2 col-5" style="margin-left: 10px">
                    <label style="font-weight:bold;">Name</label>
                </div>
                <div class="col-md-8 col-6">
                <input id="name" name="name" type="text" placeholder="Your Name" class="form-control" value="{{ Auth::user()->name }}">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3 col-md-2 col-5" style="margin-left: 10px">
                    <label style="font-weight:bold;">First Name</label>
                </div>
                <div class="col-md-8 col-6">
                <input id="firstname" name="firstname" type="text" placeholder="Your FirstName" class="form-control" value="{{ Auth::user()->firstname }}">
                    @if ($errors->has('firstname'))
                    <span class="invalid-feedback" style="display: block" role="alert">
                        <strong>{{ $errors->first('firstname') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3 col-md-2 col-5" style="margin-left: 10px">
                    <label style="font-weight:bold;">Last Name</label>
                </div>
                <div class="col-md-8 col-6">
                <input id="lastname" name="lastname" type="text" placeholder="Your LastName" class="form-control" value="{{ Auth::user()->lastname }}">
                    @if ($errors->has('lastname'))
                    <span class="invalid-feedback" style="display: block" role="alert">
                        <strong>{{ $errors->first('lastname') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3 col-md-2 col-5" style="margin-left: 10px">
                    <label style="font-weight:bold;">Phone</label>
                </div>
                <div class="col-md-8 col-6">
                <input id="phone" name="phone" type="text" placeholder="Your Phone" class="form-control" value="{{ Auth::user()->phone }}">
                @if ($errors->has('phone'))
                <span class="invalid-feedback" style="display: block" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
                @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3 col-md-2 col-5" style="margin-left: 10px">
                    <label style="font-weight:bold;">Address</label>
                </div>
                <div class="col-md-8 col-6">
                <input id="address" name="address" type="text" placeholder="Your Address" class="form-control" value="{{ Auth::user()->address }}">
                    @if ($errors->has('address'))
                    <span class="invalid-feedback" style="display: block" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <hr>
            <div class="form-group checkbox">
            <label>
                <input type="checkbox" id="changepass" name="changepass" class="pt-3">Change the password
            </label>
            </div>  
            <div class= "col-3 container "id="newpass" style="display: none;">
                <div class="form-group row">
                    <label class="col-md-2 pt-3">Mật khẩu cũ</label>
                    <input type="password" id="oldpass" name="oldpass" class="form-control"
                            placeholder="Mật khẩu cũ"
                            disabled>
            </div>
            <div class="form-group row">
                <label class="col-md-2 pt-3">Mật khẩu</label>
                <input type="password" id="password" name="password"  class="form-control"
                        placeholder="Mật khẩu"
                        disabled>
            </div>
            <div class="form-group row">
                <label class="col-md-2 pt-3">Xác nhận mật khẩu</label>
                <input type="password" id="confirm_password" name="confirm_password" value="" class="form-control"
                        placeholder="Xác nhận mật khẩu" disabled>
            </div>
            </form>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </div>          
    </div>
    </div>
</div>
</div></div></div></div></div>
@endsection

@section('cutom-js')
<script>
        $(document).ready(function () {
            $('#changepass').click(function () { 
                if ($(this).is(':checked')) {
                    $('#newpass input').removeAttr('disabled');
                    $('#newpass').show('slow');
                } else {
                    $('#newpass').hide('slow');
                    $('#newpass input').attr('disabled', '');
                }
            });
            $('.edit_account').on('click',function(e){
                let phone = $('#phone').val();
                let link_fb = $('#link_fb').val();
                let password = $('#password').val();
                let confirm_password = $('#confirm_password').val();
                if (password !== confirm_password){
                    alertify.error("Wrong !!");
                    e.preventDefault();
                }
                var thisRegexphone = new RegExp('([0-9]+)');
            });
        });
    </script>
@endsection
