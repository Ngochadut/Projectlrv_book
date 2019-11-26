@extends('admin.layouts.master')

@section('page-title','Admin')

@section('custom-css')

@section('content')
<div class="container">
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			CREATE PRODUCT
		</div>
		<div class="panel-body">
			<div class="row">
				<form action="{{route('createProduct')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="col-lg-3">
						<div class="form-group">
							<label for="input-file">Image</label>
							<input type="file" id="input-file" name="imgs[]" class="dropify" data-height="275px" data-default-file="{{asset('images/default.png')}}" multiple />
						</div>
					</div>
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
									<label>Name Product <font color="red">*</font></label>
									<input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Enter the name product">
									@if ($errors->has('name'))
									<span class="text-danger">{{ $errors->first('name') }}</span>
									@endif
								</div>
							</div>

							<div class="col-lg-6 form-group {{ $errors->has('Author') ? 'has-error' : '' }}">
								<label>Author <font color="red">*</font></label>
								<select name="author_id" class="form-control">
									@foreach($authors as $author)
									<option value="{{$author->id}}">{{$author->name}}</option>
									@endforeach
								</select>
								@if ($errors->has('author'))
								<span class="text-danger">{{ $errors->first('author') }}</span>
								@endif
							</div>
							<div class="col-lg-6 form-group {{ $errors->has('category') ? 'has-error' : '' }}">
								<label>Categories <font color="red">*</font></label>
								<select name="category_id" class="form-control">
									@foreach($categorys as $category)
									<option value="{{$category->id}}">{{$category->name}}</option>
									@endforeach
								</select>
								@if ($errors->has('category'))
								<span class="text-danger">{{ $errors->first('category') }}</span>
								@endif
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
							<div class="col-lg-6">
								<div class="form-group {{ $errors->has('publisher') ? 'has-error' : '' }}">
									<label>Publisher <font color="red">*</font></label>
									<input class="form-control" type="text" name="publisher" value="{{old('publisher')}}" placeholder="Enter the publisher)">
									@if ($errors->has('publisher'))
									<span class="text-danger">{{ $errors->first('publisher') }}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
									<label>Price <font color="red">*</font></label>
									<input class="form-control" type="text" name="price" value="{{old('price')}}" placeholder="Enter the price)">
									@if ($errors->has('price'))
									<span class="text-danger">{{ $errors->first('price') }}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group {{ $errors->has('maket_price') ? 'has-error' : '' }}">
									<label>Maket Price <font color="red">*</font></label>
									<input class="form-control" type="text" name="maket_price" value="{{old('maket_price')}}" placeholder="Enter the maket price)">
									@if ($errors->has('maket_price'))
									<span class="text-danger">{{ $errors->first('maket_price') }}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group {{ $errors->has('cover_type') ? 'has-error' : '' }}">
									<label>Cover Type <font color="red">*</font></label>
									<input class="form-control" type="text" name="cover_type" value="{{old('cover_type')}}" placeholder="Enter the cover type)">
									@if ($errors->has('cover_type'))
									<span class="text-danger">{{ $errors->first('cover_type') }}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group {{ $errors->has('num_page') ? 'has-error' : '' }}">
									<label>Num page <font color="red">*</font></label>
									<input class="form-control" type="number" name="num_page" value="{{old('num_page')}}" placeholder="Enter the num page)">
									@if ($errors->has('num_page'))
									<span class="text-danger">{{ $errors->first('num_page') }}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group {{ $errors->has('SKU') ? 'has-error' : '' }}">
									<label>SKU <font color="red">*</font></label>
									<input class="form-control" type="text" name="SKU" value="{{old('SKU')}}" placeholder="Enter the SKU)">
									@if ($errors->has('SKU'))
									<span class="text-danger">{{ $errors->first('SKU') }}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
									<label>Size <font color="red">*</font></label>
									<input class="form-control" type="text" name="size" value="{{old('size')}}" placeholder="Enter the size)">
									@if ($errors->has('size'))
									<span class="text-danger">{{ $errors->first('size') }}</span>
									@endif
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
									<label>Number  <font color="red">*</font></label>
									<input class="form-control" type="text" name="number" value="{{old('number')}}" placeholder="Enter the number)">
									@if ($errors->has('number'))
									<span class="text-danger">{{ $errors->first('number') }}</span>
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
