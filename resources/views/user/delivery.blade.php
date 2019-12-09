@extends('layouts.main')

@section('page-title','Delivery Order')

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
				<h3 class="breadcrumb-header">Cart</h3>
				<ul class="breadcrumb-tree">
					<li><a href="{{Request::is('welcome') ? 'active' : ''}}"><a href="{{ route('welcome') }}">Home</a></li>
					<li class="active">Cart</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-7">
				<!-- Billing Details -->
				<div class="billing-details">
                    <h4>
                    Đơn hàng đã được giao đến quý khách.
                    Cảm ơn quý khách đã sử dụng dịch vụ của BOOKSTORE
                    </h4>
				</div>
			</div>
			<!-- Order Details -->
			<button class="newsletter-btn">Lịch sử đơn hàng</button>
			<!-- /Order Details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<!-- BREADCRUMB -->

@endsection

@section('cutom-js')

@endsection