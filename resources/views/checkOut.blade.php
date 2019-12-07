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
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
	<form action="{{route('submit_cart')}}" method="post">
		@csrf
		<!-- row -->
		<div class="row">
			<div class="col-md-7">
				<!-- Billing Details -->
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Billing address</h3>
					</div>
					<div class="form-group">
						<div class="input" type="text" name="first-name">{{$user->name}}</div>
					</div>
					<div class="form-group">
						<div class="input" type="email" name="email" placeholder="Email">{{$user->email}}</div>
					</div>
					<div class="form-group">
						<div class="input" type="tel" name="tel" placeholder="Telephone">{{$user->phone}}</div>
					</div>
					<div class="form-group">
						<div class="input" type="tel" name="tel" placeholder="Adrress">{{$user->adrress}}</div>
					</div>
				</div>
				<!-- /Billing Details -->

				<!-- Shiping Details -->
				<div class="shiping-details">
					<div class="section-title">
						<h3 class="title">Shiping address</h3>
					</div>
					<div class="input-checkbox">
						<input type="checkbox" id="shiping-address">
						<label for="shiping-address">
							<span></span>
							Ship to a diffrent address?
						</label>
						<div class="caption">
							<div class="form-group">
								<input class="input" type="text" name="first-name" placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last-name" placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telephone">
							</div>
						</div>
					</div>
				</div>
				<!-- /Shiping Details -->

				<!-- Order notes -->
				<div class="order-notes">
					<textarea class="input" name="note" placeholder="Order Notes"></textarea>
				</div>
				<!-- /Order notes -->
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
					@foreach($products as $product)
					<div class="order-products">
						<div class="order-col">
							<div data-product-id="{{$product->id}}">
							<button class="add-to-cart-btn btn_delete"  data-product-id="{{$product->id}}"><i class="fa fa-trash"></i></button>
								<button class="add-to-cart-btn btn_decreament"  data-product-id="{{$product->id}}">-</button>
								<span id='quantity' data-product-id="{{$product->id}}">{{$product->quaility}}</span>
								<input type="text" name="quantity" value="{{$product->quantity}}" hidden>
								<button class="add-to-cart-btn btn_increament"  data-product-id="{{$product->id}}">+</button>
								 x {{$product->name}}
							 </div>
							<div>{{$product->productTotal}}</div>
							
						</div>
					</div>
					@endforeach
					<div class="order-col">
						<div>Shiping</div>
						<div><strong>FREE</strong></div>
					</div>
					<div class="order-col">
						<div><strong>TOTAL</strong></div>
						<div><strong class="order-total">${{$total}}</strong></div>
					</div>
				</div>
				<div class="payment-method">
					<div class="input-radio" >
						<input type="radio" name="payment" id="payment-1">
						<label for="payment-1">
							<span></span>
							Direct Bank Transfer
						</label>
						<div class="caption">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-2">
						<label for="payment-2">
							<span></span>
							Cheque Payment
						</label>
						<div class="caption">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-3">
						<label for="payment-3">
							<span></span>
							Paypal System
						</label>
						<div class="caption">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
				</div>
			
				<button type="submit"  class="primary-btn order-submit">Place order</button>
			</div>
			<!-- /Order Details -->
		</div>
		</form>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

@endsection

@section('cutom-js')
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
@endsection