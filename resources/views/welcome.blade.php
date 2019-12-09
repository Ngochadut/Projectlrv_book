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
            @foreach($products_newest as $product)
            <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                        @if(count($product->getRelations()['images'])>0)
                        @foreach($product->getRelations()['images'] as $image)
                        <td class="center"><img src="{{$image->name}}" alt="" height="400px" width="5px"></td>
                        @endforeach
                        @else
                        <td class="center"><img src="/images/product/default.png" alt="" height="150px" width="100px"></td>
                        @endif
                        </div>
                        <div class="shop-body">
                            <a href="" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div> 
                    </div>
                </div>
            @endforeach       
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Books</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    
                                    <!-- product $products-->
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
                                            <button class="add-to-cart-btn btn_add_to_cart"  data-product-id="{{$product->id}}"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- /product -->


                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top selling</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab2">Kinh Tế</a></li>
                                <li><a data-toggle="tab" href="#tab2">English</a></li>
                                <li><a data-toggle="tab" href="#tab2">Kỹ Năng</a></li>
                                <li><a data-toggle="tab" href="#tab2">Công Nghệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
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
                                    <!-- /product -->
                                </div>
                               
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>
                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                        <!-- product widget -->
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
                        <!-- /product widget -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>
                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                        <!-- product widget -->
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
                        <!-- /product widget -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                    </div>
                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                        <!-- product widget -->
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
                        <!-- /product widget -->
                        </div>
                    </div>
                    </div>
                </div>
                
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection

@section('cutom-js')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
@endsection


    