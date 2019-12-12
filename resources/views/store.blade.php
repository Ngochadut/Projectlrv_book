@extends('layouts.main')

@section('page-title','Home')

@section('custom-css')

@endsection
  
@section('content') 
<div>
    <div style="text-align: center">
        <img src="/image/store.png" alt="" height="300px" width="1350px" >
    </div>
    <div class="container" style="text-align: center">
        <img src="/image/tiengviet.png" alt="" height="150px" width="600px" >
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
                                    <h4 class="product-price">{{$product->price}}VNĐ <del class="product-old-price">{{$product->maket_price}} VNĐ</del></h4>
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
        <img src="/image/tienganh.png" alt="" height="150px" width="600px" >
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
                                    <h4 class="product-price">{{$product->price}} VNĐ <del class="product-old-price">{{$product->maket_price}}VNĐ</del></h4>
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
</div>
@endsection

@section('cutom-js')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
@endsection