@extends('layouts.main')

@section('page-title','Waiting Order')

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
                <div class="">
                    <h4>
                    Đơn hàng đã sẵn sàng để giao đến quý khách 
                    Chúng tôi vừa bàn giao đơn hàng của quý khách đến đối tác vận chuyển BookStore Team. Đơn hàng của quý khách sẽ được giao trong ngày hôm nay 25/09/2019
                    </h4>
				</div>
				</div>
			</div>
			<!-- Order Details -->
			<div class="col-md-5 order-details">
				<div class="section-title text-center">
					<h3 class="title">Your Order</h3>
				</div>
				<div class="order-summary">
					<div class="order-col">
						<div><strong>PRODUCT</strong></div>
						<div><strong>TOTAL</strong></div>
					</div>
					<div class="order-products">
						<div class="order-col">
							<div>1x Product Name Goes Here</div>
							<div>$980.00</div>
						</div>
						<div class="order-col">
							<div>2x Product Name Goes Here</div>
							<div>$980.00</div>
						</div>
					</div>
					<div class="order-col">
						<div>Shiping</div>
						<div><strong>FREE</strong></div>
					</div>
					<div class="order-col">
						<div><strong>TOTAL</strong></div>
						<div><strong class="order-total">$2940.00</strong></div>
					</div>
				</div>
				<div>
                    <h5>
                        You can cancel the order directly before the Admin has confirmed the order
                    </h5>
				</div>
			</div>
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