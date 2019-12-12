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
                <h3 class="breadcrumb-header">LỊCH SỬ ĐƠN HÀNG</h3>
                
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
                                    <th class="center"> Tên Sách </th>
                                    <th class="center"> Ngày </th>
                                    <th class="center"> Giá </th>
                                    <th class="center"> Trạng Thái </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($historyOder as $history)
                                @foreach($history->orderdetail as $detail)
                                <tr class="odd gradeX">
                                    <td class="center">{{$detail->product->name}}</td>
                                    <td class="center">{{$history->date_purchase}}</td>
                                    <td class="center">{{$detail->product->price}}</td>
                                    <td class="center">{{$history->status}}</td>
                                </tr>
                                @endforeach
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