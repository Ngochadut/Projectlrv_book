@extends('layouts.main')

@section('page-title','Waiting Order')

@section('custom-css')

@endsection

@section('content')

<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
                <br>
                <h3 class="breadcrumb-header">MY ORDER</h3>
                
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->
<div class="container">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                        <div class="table-scrollable">
                        <table class="table table-hover table-checkable order-column full-width" id="example4">
                            <thead>
                                <tr>
                                    <th class="center"> Mã đơn hàng </th>
                                    <th class="center"> Ngày mua </th>
                                    <th class="center">Sản phẩm</th>
                                    <th class="center"> Trạng Thái </th>
                                </tr>
                            </thead> 
                            <tbody>
                               
                            @foreach($orders as $order)
                            <tr class="center ">
                                <td class="center" ><a href="{{route('detail',$order->id)}}">#10278{{$order->id}}</a></td>  
                                <td class="center">{{$order->date_purchase}}</td>  
                                <td class="center">
                                @foreach($order->orderdetail as $product)
                                    {{$product->product->name}},
                                    @endforeach 
                                </td>
                                <td class="center">{{$order->status}}</td>
                            </tr>
                            @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('cutom-js')

@endsection