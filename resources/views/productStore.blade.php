@extends('layouts.main')

@section('page-title','Home')

@section('custom-css')

@endsection

@section('content')
<!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">
                        @foreach($categorys as $category)
                        <div class="input-checkbox">
                            <input type="checkbox" >
                            <label for="category">
                                <span></span>
                               {{$category->name}}
                                <small>(120)</small>
                            </label>
                        </div>
                        @endforeach
						</div>
					</div>
                    <div class="aside">
                        <h3 class="aside-title">Top selling</h3>
                        @foreach($products_sell as $product)
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                @if(count($product->images) > 0)
                                <td class="center"><img src="{{$product->images->first()->name}}" alt="" height="50px" width="1px"></td>
                                @else
                                <td class="center"><img src="/images/product/default.png" alt="" height="150px" width="100px"></td>
                                @endif
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{$product->Category['name']}}</p>
                                    <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                                    <h4 class="product-price">{{$product->price}} <del class="product-old-price">{{$product->maket_price}}</del></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        @foreach($products as $product)
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                @if(count($product->images) > 0)
                                    <img src="{{$product->images->first()->name}}" alt="" height="300px" width="auto">
                                @else
                                    <td class="center"><img src="/images/product/default.png" alt="" height="120px" width="auto"></td>
                                @endif
                                    <div class="product-label">
                                        <span class="sale">-30%</span>
                                        <span class="new">NEW</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{$product->Category['name']}}</p>
                                    <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                                    <h4 class="product-price">{{$product->price}}<del class="product-old-price">{{$product->maket_price}}</del></h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-btns">
                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- /product -->

                        
                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing 20-100 products</span>
                        <ul class="store-pagination">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection

@section('cutom-js')

@endsection