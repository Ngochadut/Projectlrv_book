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
                        <form action=" /searchProduct" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-md" name="search" placeholder="Search for..." />
                                        <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-md" >Search</button></span>
                                    </div>
                                </form>
                        <table class="table table-hover table-checkable order-column full-width" id="example4">
                            <thead>
                            
                                <tr>
                                    <th class="center">ID</th>
                                    <th class="center">Image</th>
                                    <th class="center"> Name Books </th>
                                    <th class="center"> Category </th>
                                    <th class="center"> Author</th>
                                    <th class="center"> Price </th>
                                    <th class="center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($product_images as $product)
                                <tr class="odd gradeX">
                                    <td class="center">{{$product->id}}</td>
                                    @if(count($product->getRelations()['images'])>0)
                                    @foreach($product->getRelations()['images'] as $image)
                                    <td class="center"><img src="{{$image->name}}" alt="" height="150px" width="100px"></td>
                                    @endforeach
                                    @else
                                    <td class="center"><img src="/images/product/default.png" alt="" height="150px" width="100px"></td>
                                    @endif
                                    <td class="center">{{$product->name}}</td>
                                    <td class="center">{{$product->Category['name']}}</td>
                                    <td class="center">{{$product->Author['name']}}</td>
                                    <td class="center">{{$product->price}}</td>
                                    <td class="center">
                                        <button><a href="{{route('detailProduct', $product->id)}}">view</a></button>
                                        <form action="{{ route('deleteProduct',$product->id) }}" method="POST"> 
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
                    {{ $product_images->links() }}
                </div>	
            </div>
        </div>
    </div>
</div>
@endsection
@section('cutom-js')
@endsection
