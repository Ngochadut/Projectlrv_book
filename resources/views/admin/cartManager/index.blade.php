@extends('admin.layouts.master')

@section('page-title','CartManager')

@section('custom-css')

@section('content')
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
<!-- start page content -->
<div class="container">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <h1>CART MANAGER</h1>
                    </div>
                    <div>
		            @csrf
                    @if(session('class'))
						<div class="alert bg-{{session('class')}}" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{session('message')}}</div>
					@endif
                    <div class="card-body ">
                        <div class="table-scrollable">
                        <!-- <form>
                            <div class="input-group">
                                <input type="text" class="form-control input-md" name="search" placeholder="Search for..." />
                                <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-md" >Search</button></span>
                            </div>
                        </form> -->
                        <table class="table table-hover table-checkable order-column full-width" id="example4">
                            <thead>
                                <tr>
                                    <th class="center">Full Name</th>
                                    <th class="center">Date Purchase</th>
                                    <th class="center">Note</th>
                                    <th class="center">Status</th>
                                    <th class="center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr class="odd gradeX">
                                    <td class="center">{{$order->user->name}}</td>
                                    <td class="center">{{$order->date_purchase}}</td>
                                    <td class="center">{{$order->note}}</td> 
                                    <td class="center">
                                        <select class="acttion_cart" data-cart="" id="status_{{$order->id}}">
                                            @if($order->status === 'PENDING')
                                            <option value="PENDING" selected>Pending</option>
                                            @else
                                            <option value="PENDING">Pending</option>
                                            @endif
                                            @if($order->status === 'CONFIRM')
                                            <option value="CONFIRM" selected>Confirm</option>
                                            @else
                                            <option value="CONFIRM">Confirm</option>
                                            @endif
                                            @if($order->status === 'DELIVERY')
                                            <option value="DELIVERY" selected>Delivery</option>
                                            @else
                                            <option value="DELIVERY">Delivery</option>
                                            @endif 
                                            @if($order->status === 'DONE')
                                            <option value="DONE" selected>Done</option>
                                            @else
                                            <option value="DONE">Done</option>
                                            @endif
                                            @if($order->status === 'CANCEL')
                                            <option value="CANCEL" selected>Cancel</option>
                                            @else
                                            <option value="CANCEL">Cancel</option>
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <button class="btn_save" data-order-id="{{$order->id}}">Save</button>
                                    </td>
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
</div>
@endsection

@section('cutom-js')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('admin_assets/js/cart.js') }}"></script>
   
@endsection
