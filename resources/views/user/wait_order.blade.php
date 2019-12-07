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
                    <p order-col>Cảm ơn quý khách đã đặt hàng tại BookStore,
						BookStore rất vui thông báo đơn hàng của quý khách đã được tiếp nhận và đang trong quá trình xử lý. BookStore sẽ thông báo đến quý khách ngay khi hàng chuẩn bị được giao.</p>
                </div>
                <div class="order-col">
                        <div><strong>PHƯƠNG THỨC THANH TOÁN </strong> : Tiền mặt</div>
                        <hr>
                </div>
                <div class="order-col">
                        <div><strong>THỜI GIAN GIAO HÀNG DỰ KIẾN : </strong> 3 ngày kể từ ngày xác nhận đơn hàng</div>
                        <hr>
                </div>
                <div class="order-col">
                        <div><strong>PHÍ VẬN CHUYỂN : </strong> Miễn phí</div>
                        <hr>
                </div>
                <div class="order-col">
                        <div><strong>SỬ DỤNG BỌC SÁCH CAO CẤP BOOKSTORE : </strong> Có</div>
                        <hr>
                </div>
                <div class="order-col">
						<div><i>Lưu ý: Đối với đơn hàng đã được thanh toán trước, nhân viên giao nhận có thể yêu cầu người nhận hàng cung cấp CMND / giấy phép lái xe để chụp ảnh hoặc ghi lại thông tin.</i></div>
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
					@foreach($orders->orderdetail as $order)
					<div class="order-products">
						<div class="order-col">
							<div>{{$order->quantity}} x {{$order->product->name}}</div>
							<div>{{$order->product->price}}</div>
						</div>
					</div>
					@endforeach
					<div class="order-col">
						<div>Shiping</div>
						<div><strong>FREE</strong></div>
					</div>
					<div class="order-col">
						<div><strong>TOTAL</strong></div>
					<div><strong class="order-total">{{$order->total_price}}</strong></div>
					</div>
				</div>
				<div>
                    <h5>
                        You can cancel the order directly before the Admin has confirmed the order
                    </h5>
				</div>
				<a href="#" class="primary-btn order-submit">Cancel Order</a>
			</div>
			<!-- /Order Details -->
        </div>
        <hr>
		<!-- /row -->
    </div>
    
    <div class="container">
    Trường hợp quý khách có những băn khoăn về đơn hàng, có thể xem thêm mục các câu hỏi thường gặp.

Từ ngày 14/2/2015, BookStore sẽ không gởi tin nhắn SMS khi đơn hàng của bạn được xác nhận thành công. Chúng tôi chỉ liên hệ trong trường hợp đơn hàng có thể bị trễ hoặc không liên hệ giao hàng được.

Bạn cần được hỗ trợ ngay? Chỉ cần email hotro@BookStore.vn , hoặc gọi số điện thoại 19xxxxxxx5 (8-21h cả T7,CN). Đội ngũ BookStore Care luôn sẵn sàng hỗ trợ bạn bất kì lúc nào.

 
Một lần nữa BookStore cảm ơn quý khách.
    </div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<!-- BREADCRUMB -->

@endsection

@section('cutom-js')

@endsection