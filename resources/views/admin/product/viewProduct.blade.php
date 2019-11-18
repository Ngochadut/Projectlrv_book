@extends('admin.layouts.master')
@section('page-title','Product')
@section('custom-css')
@section('content')
<!-- start page content -->
<div class="container">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <h1>PRODUCT</h1>
                    </div>
                    <div class="card-body ">
                        <div class="row p-b-20">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group">
                                    <a href="{{route('create_product')}}" id="addRow" class="btn btn-info">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-scrollable">
                        <table class="table table-hover table-checkable order-column full-width" id="example4">
                            <thead>
                            
                                <tr>
                                    <th class="center">ID</th>
                                    <th class="center"> Name Books </th>
                                    <th class="center"> Category </th>
                                    <th class="center"> Author</th>
                                    <th class="center"> Price </th>
                                    <th class="center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr class="odd gradeX">
                                    <td class="center">{{$product->id}}</td>
                                    <td class="center">{{$product->name}}</td>
                                    <td class="center">{{$product->Category['name']}}</td>
                                    <td class="center">{{$product->Author['name']}}</td>
                                    <td class="center">{{$product->price}}</td>
                                    <td class="center">
                                        <button><a href="{{route('detailProduct', $product->id)}}">view</a></button>
                                        <form action="" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center">
                    {{ $products->links() }}
                </div>	
            </div>
        </div>
    </div>
</div>
@endsection
@section('cutom-js')
@endsection
