@extends('admin.layouts.master')

@section('page-title','Member')

@section('custom-css')


@endsection

@section('content')

<div class="container">
<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					DETAIL MEMBER
				</div>
				@if(session('class'))
				<div class="alert alert-{{session('class')}} alert-dismissible fade show">
					<li>{{session('message')}}</li>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
				<div class="col-9 infocontainer">
				<div class="panel-body">
					<div class="row">
						<form action="{{route('edituser')}}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="{{$user->id}}">
							<div class="col-lg-9">
								@if(session('class'))
								<div class="alert " role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{session('message')}}</div>
								@endif
								@if($errors->any())
								<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{$errors->first()}}</div>
								@endif
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>First Name <font color="red">*</font></label>
											<input class="form-control" type="text" name="firstname" value="{{$user->firstname}}" placeholder="Enter the first name">
											@if ($errors->has('firstname'))
											<span class="text-danger">{{ $errors->first('firstname') }}</span>
											@endif
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
											<label>Last Name <font color="red">*</font></label>
											<input class="form-control" type="text" name="lastname" value="{{$user->lastname}}" placeholder="Enter the last name)">
											@if ($errors->has('lastname'))
											<span class="text-danger">{{ $errors->first('lastname') }}</span>
											@endif
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
											<label>User Name <font color="red">*</font></label>
											<input class="form-control" type="text" name="name" value="{{$user->name}}" placeholder="Enter the name)">
											@if ($errors->has('name'))
											<span class="text-danger">{{ $errors->first('name') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
									<label>Email <font color="red">*</font></label>
									<input class="form-control" type="email" name="email" value="{{$user->email}}" placeholder="Email address (Ex: longdeptrai@gmail.com)">
									@if ($errors->has('email'))
									<span class="text-danger">{{ $errors->first('email') }}</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
									<label>Number Phone<font color="red">*</font></label>
									<input class="form-control" type="text" name="phone" value="{{$user->phone}}" placeholder="Number phone (V/d: 0969999999)">
									@if ($errors->has('phone'))
									<span class="text-danger">{{ $errors->first('phone') }}</span>
									@endif
								</div>
								<div class="form-group">
									<label>Chức vụ <font color="red">*</font></label>
									<div class="radio">
										<label>
											<input type="radio" name="roles" value="0" {{ old('roles') != 1 ? 'checked' : '' }}>User
										</label>
										<label>
											<input type="radio" name="roles" value="1" {{ old('roles') == 1 ? 'checked' : '' }}>Admin
										</label>
									</div>
								</div>
								<div class="form-group checkbox">
                            <label>
                                <input type="checkbox" id="changepass" name="changepass" class="pt-3">Change the password
                            </label>
                        </div>  
                        <div id="newpass" style="display: none;">
                            <div class="form-group row">
                                <label class="col-md-2 pt-3">Mật khẩu cũ</label>
                                <input type="password" id="oldpass" name="oldpass" class="form-control col-md-10"
                                       placeholder="Mật khẩu cũ"
                                       disabled>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 pt-3">Mật khẩu</label>
                                <input type="password" id="password" name="password"  class="form-control col-md-10"
                                       placeholder="Mật khẩu"
                                       disabled>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 pt-3">Xác nhận mật khẩu</label>
                                <input type="password" id="confirm_password" name="confirm_password" value="" class="form-control col-md-10"
                                       placeholder="Xác nhận mật khẩu" disabled>
                            </div>
                        </div>
								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" name="address" rows="3" placeholder="120 Xô Viết Nghệ Tĩnh, Đà Nẵng">{{$user->address}}</textarea>
								</div>
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</form>
					</div>
		</div><!--/.col-->

	</div><!--/.row-->
</div>	<!--/.main-->
</div>
		
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