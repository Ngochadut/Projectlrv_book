@extends('admin.layouts.master')

@section('page-title','EditCategory')

@section('custom-css')


@endsection

@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					DETAIL CATEGORY
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
						<form action="{{route('editcategory')}}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="{{$category->id}}">
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
											<label> Name <font color="red">*</font></label>
											<input class="form-control" type="text" name="name" value="{{$category->name}}" placeholder="Enter the Category">
											@if ($errors->has('name'))
											<span class="text-danger">{{ $errors->first('name') }}</span>
											@endif
										</div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label> Describes <font color="red">*</font></label>
											<input class="form-control" type="text" name="desrcibes" value="{{$category->describes}}" placeholder="Enter the Describes">
										</div>
                                    </div>
								</div>
                                <div class="row col-lg-6 form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                                    <label>Type <font color="red">*</font></label>
                                    <select name="parent_id" class="form-control">
										<option>Select a category</option>

                                        @foreach($types as $type)
                                            @if($category->parent_category && $type->id === $category->parent_category->id)
                                                <option value="{{$type->id}}" selected=true>{{$type->name}}</option>
                                            @else
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endif
										@endforeach
                                    </select>
                                    @if ($errors->has('type'))
                                    <span class="text-danger">{{ $errors->first('type') }}</span> 
								</div>
								@endif
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
        });
    </script>
@endsection