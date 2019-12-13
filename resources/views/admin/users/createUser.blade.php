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
					CREATE MEMBER
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
						<form action="{{route('createUser')}}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="">
							<div class="col-lg-9">
								@if(session('class'))
								<div class="alert " role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{session('message')}}</div>
								@endif
								@if($errors->any())
								<div class="alert bg-danger" role ="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{$errors->first()}}</div>
								@endif
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>Họ <font color="red">*</font></label>
											<input class="form-control" type="text" name="firstname" value="" placeholder="Enter the first name">
											@if ($errors->has('firstname'))
											<span class="text-danger">{{ $errors->first('firstname') }}</span>
											@endif
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
											<label>Tên <font color="red">*</font></label>
											<input class="form-control" type="text" name="lastname" value="" placeholder="Enter the last name)">
											@if ($errors->has('lastname'))
											<span class="text-danger">{{ $errors->first('lastname') }}</span>
											@endif
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
											<label>Tên người dùng<font color="red">*</font></label>
											<input class="form-control" type="text" name="name" value="" placeholder="Enter the name)">
											@if ($errors->has('name'))
											<span class="text-danger">{{ $errors->first('name') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
									<label>Email <font color="red">*</font></label>
									<input class="form-control" type="email" name="email" value="" placeholder="Email address (Ex: longdeptrai@gmail.com)">
									@if ($errors->has('email'))
									<span class="text-danger">{{ $errors->first('email') }}</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
									<label>Điện thoại<font color="red">*</font></label>
									<input class="form-control" type="text" name="phone" value="" placeholder="Number phone (V/d: 0969999999)">
									@if ($errors->has('phone'))
									<span class="text-danger">{{ $errors->first('phone') }}</span>
									@endif
								</div>
								<div class="form-group">
									<label>Chức vụ <font color="red">*</font></label>
									<div class="radio">
										<label>
											<input type="radio" name="roles" value="2">User
										</label>
										<label>
											<input type="radio" name="roles" value="1">Admin
										</label>
									</div>
								</div>
								<div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
									<label>Mật khẩu <font color="red">*</font></label>
									<input type="password" name="password" class="form-control" placeholder="Mật khẩu">
									@if ($errors->has('password'))
									<span class="text-danger">{{ $errors->first('password') }}</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
									<label>Xác nhận mật khẩu <font color="red">*</font></label>
									<input type="password" name="confirm_password" value="{{old('confirm_password')}}" class="form-control" placeholder="Xác nhận mật khẩu">
									@if ($errors->has('confirm_password'))
									<span class="text-danger">{{ $errors->first('confirm_password') }}</span>
									@endif
								</div>            
								<div class="form-group">
									<label>Địa chỉ</label>
									<textarea class="form-control" name="address" rows="3" placeholder="120 Xô Viết Nghệ Tĩnh, Đà Nẵng"></textarea>
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
                    alertify.error("Hai mật khẩu không giống nhau");
                    e.preventDefault();
                }
                var thisRegexphone = new RegExp('([0-9]+)');
            });
        });
    </script>
@endsection