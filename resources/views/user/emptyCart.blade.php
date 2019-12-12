@extends('layouts.main')

@section('page-title','Check Out')

@section('custom-css')
<link type="text/css" href="{{ asset('css/image.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Checkout</h3>
				<ul class="breadcrumb-tree">
					<li><a href="{{Request::is('welcome') ? 'active' : ''}}"><a href="{{ route('welcome') }}">Home</a></li>
					<li class="active">Checkout</li>
				</ul>
			</div>
		</div>
		<hr>
		<a class="newsletter-btn" href="{{route('history')}}">Lịch sử đơn hàng</a>
		<!-- /row -->
	</div>
	<!-- /container -->
	
</div>
<!-- /BREADCRUMB -->

<div class="container centerimg ">
	<img src="/image/3.jpg" alt="" height="300px" width="500px">
</div>

<!-- BREADCRUMB -->

@endsection

@section('cutom-js')

@endsection