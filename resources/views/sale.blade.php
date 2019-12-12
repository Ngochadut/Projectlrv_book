@extends('layouts.main')

@section('page-title','Sale')

@section('custom-css')

@endsection
  
@section('content') 
<div>
    <img src="/image/TrangTongT12-3_main.jpg" alt="" height="300px" width="1350px">
</div>
<div>
    <img src="/image/sale2.png" alt="" height="300px" width="1350px">
</div>
<div class="container" style="text-align: center">
    <img src="/image/sansale.png" alt="" height="100px" width="500px" >
</div>
 <!-- Products tab & slick -->
<div class="col-md-12">
    <div class="container">
        <div class="products-tabs">
            <!-- tab -->
            <div id="tab2" class="tab-pane fade in active">
                <div class="products-slick" data-nav="#slick-nav-2">
                    <!-- product -->
                    @foreach($products as $product)
                    <div class="product">
                        <div class="product-img">
                        @if(count($product->images) > 0)
                        <td class="center"><img src="{{$product->images->first()->name}}" alt="" height="250px" width="2px"></td>
                        @else
                        <td class="center"><img src="/images/product/default.png" alt="" height="150px" width="100px"></td>
                        @endif
                            <div class="product-label">
                                <span class="sale">-30%</span>
                                <span class="new">NEW</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{$product->Category['name']}}</p>
                            <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                            <h4 class="product-price">{{number_format($product->price, 0, '', ',')}} <del class="product-old-price">{{number_format($product->maket_price, 0, '', ',')}}</del></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i> 
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange" data-book-id="{{$product->id}}"></i><span class="tooltipp">add to comment</span></button>
                                <a href="{{ route('productDetail',$product->id) }}"><button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button></a>
                            </div>
                        </div> 
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                    @endforeach
                    <!-- /product -->
                </div> 
            </div>
                <!-- /tab -->
        </div>
    </div>
</div>
 <!-- /Products tab & slick -->
<div style="text-align: center">
    <img src="/image/salehome.jpg" alt="" height="300px" width="1350px" >
</div>

 <!-- Products tab & slick -->
 <div class="col-md-12">
    <div class="container">
        <div class="products-tabs">
            <!-- tab -->
            <div id="tab2" class="tab-pane fade in active">
                <div class="products-slick" data-nav="#slick-nav-2">
                    <!-- product -->
                    @foreach($products_vh as $product)
                    <div class="product">
                        <div class="product-img">
                        @if(count($product->images) > 0)
                        <td class="center"><img src="{{$product->images->first()->name}}" alt="" height="250px" width="2px"></td>
                        @else
                        <td class="center"><img src="/images/product/default.png" alt="" height="150px" width="100px"></td>
                        @endif
                            <div class="product-label">
                                <span class="sale">-30%</span>
                                <span class="new">NEW</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{$product->Category['name']}}</p>
                            <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                            <h4 class="product-price">{{number_format($product->price, 0, '', ',')}}<del class="product-old-price">{{number_format($product->maket_price, 0, '', ',')}}</del></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i> 
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange" data-book-id="{{$product->id}}"></i><span class="tooltipp">add to comment</span></button>
                                <a href="{{ route('productDetail',$product->id) }}"><button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button></a>
                            </div>
                        </div> 
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                    @endforeach
                    <!-- /product -->
                </div> 
            </div>
                <!-- /tab -->
        </div>
    </div>
</div>
<!-- /Products tab & slick -->
<div class="container" style="text-align: center">
    <img src="/image/sachtiengviet.jpg" alt="" height="100px" width="700px" >
</div>
  <!-- Products tab & slick -->
  <div class="col-md-12">
    <div class="container">
        <div class="products-tabs">
            <!-- tab -->
            <div id="tab2" class="tab-pane fade in active">
                <div class="products-slick" data-nav="#slick-nav-2">
                    <!-- product -->
                    @foreach($products_kn as $product)
                    <div class="product">
                        <div class="product-img">
                        @if(count($product->images) > 0)
                        <td class="center"><img src="{{$product->images->first()->name}}" alt="" height="250px" width="2px"></td>
                        @else
                        <td class="center"><img src="/images/product/default.png" alt="" height="150px" width="100px"></td>
                        @endif
                            <div class="product-label">
                                <span class="sale">-30%</span>
                                <span class="new">NEW</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{$product->Category['name']}}</p>
                            <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                            <h4 class="product-price">{{number_format($product->price, 0, '', ',')}} <del class="product-old-price">{{number_format($product->maket_price, 0, '', ',')}}}</del></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i> 
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange" data-book-id="{{$product->id}}"></i><span class="tooltipp">add to comment</span></button>
                                <a href="{{ route('productDetail',$product->id) }}"><button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button></a>
                            </div>
                        </div> 
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                    @endforeach
                    <!-- /product -->
                </div> 
            </div>
                <!-- /tab -->
        </div>
    </div>
</div>
<div class="container" style="text-align: center">
    <img src="/image/fahasa-s-day-ta-1.png" alt="" height="100px" width="700px" >
</div>
 <!-- Products tab & slick -->
 <div class="col-md-12">
    <div class="container">
        <div class="products-tabs">
            <!-- tab -->
            <div id="tab2" class="tab-pane fade in active">
                <div class="products-slick" data-nav="#slick-nav-2">
                    <!-- product -->
                    @foreach($products as $product)
                    <div class="product">
                        <div class="product-img">
                        @if(count($product->images) > 0)
                        <td class="center"><img src="{{$product->images->first()->name}}" alt="" height="250px" width="2px"></td>
                        @else
                        <td class="center"><img src="/images/product/default.png" alt="" height="150px" width="100px"></td>
                        @endif
                            <div class="product-label">
                                <span class="sale">-30%</span>
                                <span class="new">NEW</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{$product->Category['name']}}</p>
                            <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                            <h4 class="product-price">{{number_format($product->price, 0, '', ',')}} <del class="product-old-price">{{number_format($product->maket_price, 0, '', ',')}}</del></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i> 
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange" data-book-id="{{$product->id}}"></i><span class="tooltipp">add to comment</span></button>
                                <a href="{{ route('productDetail',$product->id) }}"><button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button></a>
                            </div>
                        </div> 
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                    @endforeach
                    <!-- /product -->
                </div> 
            </div>
                <!-- /tab -->
        </div>
    </div>
</div>
<div>
    <img src="/image/sale1.png" alt="" height="300px" width="1350px">
</div>
 <!-- /Products tab & slick -->
@endsection

@section('cutom-js')
    
@endsection