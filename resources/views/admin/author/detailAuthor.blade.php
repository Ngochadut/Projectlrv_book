@extends('admin.layouts.master')

@section('page-title','EditAuthor')

@section('custom-css')


@endsection

@section('content')
<div class="container">
    <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					DETAIL AUTHOR
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
						<form action="{{route('editauthor')}}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="{{$author->id}}">
							<div class="col-lg-9">
								@if(session('class'))
								<div class="alert " role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{session('message')}}</div>
								@endif
								@if($errors->any())
								<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{$errors->first()}}</div>
								@endif
                                <div class="row">
									<div class="col-lg-6">
										<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
											<label>Name Author <font color="red">*</font></label>
											<input class="form-control" type="text" name="name" value="{{$author->name}}" placeholder="Enter the name category">
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
											<input class="form-control" type="date" name="born" value="{{$author->born}}" >
                                        </div>
                                        <div class="form-group">
                                            <label> Date of death </label>
											<input class="form-control" type="date" name="died" value="{{$author->died}}" >
										</div>
                                    </div>
								</div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> Describes <font color="red">*</font></label>
                                            <input class="form-control" type="text" name="describes" value="{{$author->describes}}}" placeholder="Enter the Describes">
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
                                            <input class="form-control" type="text" name="address" value="{{$author->address}}" placeholder="Enter the address">
                                            @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</form>
					</div>
		        </div><!--/.col-->
	        </div><!--/.row-->
        </div>	<!--/.main-->
    </div>
</div>

@endsection

@section('cutom-js')

@endsection