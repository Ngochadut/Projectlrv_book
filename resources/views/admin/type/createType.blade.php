@extends('admin.layouts.master')

@section('page-title','Create Type')

@section('custom-css')

@section('content')
<div class="container">
<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					CREATE TYPE
				</div>
				<div class="panel-body">
					<div class="row">
						<form action="{{route('createtype')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div type="hidden" class="col-lg-9">
								@if(session('class'))
								<div class="alert bg-{{session('class')}}" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{session('message')}}</div>
								@endif
								@if($errors->any())
								<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{$errors->first()}}</div>
								@endif
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
											<label>Name <font color="red">*</font></label>
											<input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Enter the first name">
											@if ($errors->has('name'))
											<span class="text-danger">{{ $errors->first('name') }}</span>
											@endif
										</div>
									</div>
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

   
@endsection
