@extends('admin.layouts.master')

@section('page-title','Admin')

@section('custom-css')

@section('content')
<div class="container">
<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					CREATE CATEGORY
				</div>
				<div class="panel-body">
					<div class="row">
						<form action="{{route('createCategory')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="col-lg-9">
								@if(session('class'))
								<div class="alert bg-{{session('class')}}" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{session('message')}}</div>
								@endif
								@if($errors->any())
								<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{$errors->first()}}</div>
								@endif
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
											<label>Name Category <font color="red">*</font></label>
											<input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Enter the name category">
											@if ($errors->has('name'))
											<span class="text-danger">{{ $errors->first('name') }}</span>
											@endif
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group {{ $errors->has('describes') ? 'has-error' : '' }}">
											<label>Describes <font color="red">*</font></label>
											<input class="form-control" type="text" name="describes" value="{{old('describes')}}" placeholder="Enter the describes)">
											@if ($errors->has('describes'))
											<span class="text-danger">{{ $errors->first('describes') }}</span>
											@endif
										</div>
									</div>
									<div class="col-lg-6 form-group {{ $errors->has('type') ? 'has-error' : '' }}">
										<label>Type <font color="red">*</font></label>
										<select name="parent_id" class="form-control">
											@foreach($types as $type)
											<option value="{{$type->id}}">{{$type->name}}</option>
											@endforeach
										</select>
										@if ($errors->has('type'))
										<span class="text-danger">{{ $errors->first('type') }}</span>
										@endif
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Confirm</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/.col-->
</div>

@endsection

@section('cutom-js')

   
@endsection
