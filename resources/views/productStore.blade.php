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
                            <label for="category">
                                <span>{{$category->name}}</span>
                            </label>
                        </div>
                       @endforeach
						</div>
                    </div>
                    <div class="aside">
                        <h3 class="aside-title">Top selling</h3>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                
                                <td class="center"><img src="" alt="" height="50px" width="1px"></td>
                              
                                </div>
                                <div class="product-body">
                                    <p class="product-category"></p>
                                    <h3 class="product-name"><a href="#"></a></h3>
                                    <h4 class="product-price"> <del class="product-old-price"></del></h4>
                                </div>
                            </div>
                        
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    @if(count($products) == 0 )
            
                    <div>Không tìm thấy sản phẩm !!</div>
                    @else
                     <!-- store products -->
                     <div class="row">
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
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
                                <h4 class="product-price">{{$product->price}} <del class="product-old-price">{{$product->maket_price}}</del></h4>
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
                        </div>  
                    @endif
                </div>
                <div>
                    <img src="/image/giangsing.jpg" alt="" height="300px" width="900px">
                </div><!-- /store products -->
                
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