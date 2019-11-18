@extends('admin.layouts.master')

@section('page-title','Admin')

@section('custom-css')

@section('content')
<div class="container">
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			CREATE AUTHOR
		</div>
		<div class="panel-body">
		    <div class="row">
				<form action="{{route('createAuthor')}}" method="post" enctype="multipart/form-data">
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
											<label>Name Author <font color="red">*</font></label>
											<input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Enter the name category">
											@if ($errors->has('name'))
											<span class="text-danger">{{ $errors->first('name') }}</span>
											@endif
										</div>
                                    </div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
                                            <label> Date of birth </label>
											<input class="form-control" type="date" name="born" value="{{old('born')}}" >
                                        </div>
                                        <div class="form-group">
                                            <label> Date of death </label>
											<input class="form-control" type="date" name="died" value="{{old('died')}}" >
										</div>
                                    </div>
								</div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> Describes <font color="red">*</font></label>
                                            <input class="form-control" type="text" name="describes" value="{{old('describes')}}" placeholder="Enter the Describes">
                                            @if ($errors->has('describes'))
                                            <span class="text-danger">{{ $errors->first('describes') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> Address <font color="red">*</font></label>
                                            <input class="form-control" type="text" name="address" value="{{old('address')}}" placeholder="Enter the address">
                                            @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
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
</div>

@endsection

@section('cutom-js')

   
@endsection
