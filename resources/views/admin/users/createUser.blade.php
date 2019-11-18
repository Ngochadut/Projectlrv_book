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
					CREATE NEW MEMBER
				</div>
				<div class="panel-body">
					<div class="row">
						<form action="{{route('createuser')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="col-lg-3">
								<div class="form-group">
	                                <label for="input-file">Image</label>
	                                <input type="file" id="input-file" name="img" class="dropify" data-height="275px" data-default-file="{{asset('images/default.png')}}" />
	                            </div>
							</div>
							<div type="hidden" class="col-lg-9">
								@if(session('class'))
								<div class="alert bg-{{session('class')}}" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{session('message')}}</div>
								@endif
								@if($errors->any())
								<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{$errors->first()}}</div>
								@endif
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
											<label>First Name <font color="red">*</font></label>
											<input class="form-control" type="text" name="firstname" value="{{old('firstname')}}" placeholder="Enter the first name">
											@if ($errors->has('firstname'))
											<span class="text-danger">{{ $errors->first('firstname') }}</span>
											@endif
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
											<label>Last Name <font color="red">*</font></label>
											<input class="form-control" type="text" name="lastname" value="{{old('lastname')}}" placeholder="Enter the last name)">
											@if ($errors->has('lastname'))
											<span class="text-danger">{{ $errors->first('lastname') }}</span>
											@endif
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
											<label>User Name <font color="red">*</font></label>
											<input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Enter the name)">
											@if ($errors->has('name'))
											<span class="text-danger">{{ $errors->first('name') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
									<label>Email <font color="red">*</font></label>
									<input class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="Email address (Ex: longdeptrai@gmail.com)">
									@if ($errors->has('email'))
									<span class="text-danger">{{ $errors->first('email') }}</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
									<label>Number Phone<font color="red">*</font></label>
									<input class="form-control" type="text" name="phone" value="{{old('phone')}}" placeholder="Number phone (V/d: 0969999999)">
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
								<div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
									<label>Password <font color="red">*</font></label>
									<input type="password" name="password" class="form-control" placeholder="Password">
									@if ($errors->has('password'))
									<span class="text-danger">{{ $errors->first('password') }}</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
									<label>Confirm password <font color="red">*</font></label>
									<input type="password" name="confirm_password" value="{{old('confirm_password')}}" class="form-control" placeholder="Confirm password">
									@if ($errors->has('confirm_password'))
									<span class="text-danger">{{ $errors->first('confirm_password') }}</span>
									@endif
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" name="address" rows="3" placeholder="120 Xô Viết Nghệ Tĩnh, Đà Nẵng">{{old('address')}}</textarea>
								</div>
								<button type="submit" class="btn btn-primary">Confirm</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/.col-->

	</div><!--/.row-->
</div>	<!--/.main-->>
</div>
	
		
@endsection

@section('cutom-js')
<script type="text/javascript">
	$(document).ready(function(){
		$('.dropify').dropify();
	});
</script>
@endsection
