@extends('layouts.main')

@section('page-title','Home')

@section('custom-css')
 
@endsection

@section('content')

<!-- /NAVIGATION -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2"> 
                <div id="product-main-img">
                
                @foreach($products_view->images as $image)
                    @if(count($products_view->images) > 0)
                        <td class="product-preview"><img src="{{$image->name}}" alt="" height="250px" width="2px"></td>
                    @else
                        <td class="center"><img src="/images/product/default.png" alt="" height="150px" width="100px"></td>
                    @endif
                @endforeach
                  </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                @foreach($products_view->images as $image)
                    @if(count($products_view->images)>0)
                    <div class="product-preview">
                        <img src="{{$image->name}}" alt="" height="150px" width="100px">
                    </div>
                    @else
                    <td class="center"><img src="/images/product/default.png" alt="" height="150px" width="100px"></td>
                    @endif
                @endforeach
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
            
                <div class="product-details">
                    <h2 class="product-name"></h2>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="review-link" href="#">10 Review(s) | Add your review</a>
                    </div>
                    <div>
                        <h3 class="product-price">{{number_format($products_view->price, 0, '', ',')}} VNĐ<del class="product-old-price">{{number_format($products_view->price, 0, '', ',')}} VNĐ</del></h3>
                    </div>
                    <p>{{$products_view->describes}}</p>

                    <div class="product-options">
                        <label>
                            Number
                            <input class="form-control" type="number" id="product_quantity" value="1" min="1" max="5" onKeyDown="return false">
                        </label>
                    </div>

                    <div class="add-to-cart">
                        <button class="add-to-cart-btn btn_add_to_cart"  data-product-id="{{$products_view->id}}">
                        <div class="add-to-cart"> 
                            @if(!Auth::check())
                                <a class="fa fa-shopping-cart" href="/login">BUY NOW</a>
                            @else
                            <i class="fa fa-shopping-cart"></i>BUY NOW
                            @endif
                        </div>
                        </button>
                    </div>

                    <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-exchange"></i> add to comment</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
   
                </div>
              
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
          
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                        <li><a data-toggle="tab" href="#tab2">Details</a></li>
                        <li><a data-toggle="tab" href="#tab3">Reviews</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>{{$products_view->describes}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <table style="border: 1px solid black; border-collapse: collapse;">
                                        <tr>
                                        <th class="col-md-3"> Name :<td class="data">" {{$products_view->name}} "</td></th>
                                        </tr>
                                        <tr>
                                        <th  class="col-md-3">Describes :<td class="data">{{$products_view->describes}}</td></th>
                                        </tr>
                                        <tr>
                                        <th  class="col-md-3">Publisher :<td class="data">{{$products_view->publisher}}</td></th>
                                        </tr>
                                        <tr>
                                        <th  class="col-md-3">Author :<td class="data">{{$products_view->Author['name']}}</td></th>
                                        </tr>
                                        <tr>
                                        <th  class="col-md-3">Categories :<td class="data">{{$products_view->Category['name']}}</td></th>
                                        </tr>
                                        <tr>
                                        <th  class="col-md-3">Price :<td class="data">{{number_format($products_view->price, 0, '', ',')}} VNĐ</td></th>
                                        </tr>
                                        <tr>
                                        <th  class="col-md-3">Maket Price :<td class="data">{{number_format($products_view->maket_price, 0, '', ',')}} VNĐ</td></th>
                                        </tr>
                                        <tr>
                                        <th  class="col-md-3">Cover type :<td class="data">{{$products_view->cover_type}}</td></th>
                                        </tr>  
                                        <tr>
                                        <th  class="col-md-3">Numpage :<td class="data">{{$products_view->num_page}}</td></th>
                                        </tr> 
                                        <tr>
                                        <th class="col-md-3">SKU :<td class="data">{{$products_view->SKU}}</td></th>
                                        </tr>    
                                        <tr>
                                        <th class="col-md-3">Size<td class="data">{{$products_view->size}}</td></th>
                                        </tr>                              
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /tab2  -->

                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span>4.5</span>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 80%;"></div>
                                                </div>
                                                <span class="sum">3</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 60%;"></div>
                                                </div>
                                                <span class="sum">2</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->

                                 <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="reviews-pagination">
                                            <li class="active">1</li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Reviews -->

                                <!-- Review Form -->
                                <div class="col-md-3">
                                    <div id="review-form">
                                        <form class="review-form">
                                            <input class="input" type="text" placeholder="Your Name">
                                            <input class="input" type="email" placeholder="Your Email">
                                            <textarea class="input" placeholder="Your Review"></textarea>
                                                <div class="input-rating">
                                                    <span>Your Rating: </span>
                                                    <div class="stars">
                                                        <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                        <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                        <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                        <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                        <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                    </div>
                                                </div>
                                            <button class="primary-btn">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
         
            <!-- /product tab -->
        </div>
				<!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Sách Gợi Ý</h3>
                </div>
            </div>
            <!-- product -->
            @foreach($product_category as $product)
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    @if(count($product->images) > 0)
                    <div class="product-img">
                        <img src="{{$product->images->first()->name}}" alt=""height="300px" width="70px">
                        <div class="product-label"> 
                            <span class="sale">-30%</span>
                        </div>
                    </div>
                    @else
                    <td class="center"><img src="/images/product/default.png" alt="" height="300px" width="100px"></td>
                    @endif
                    <div class="product-body">
                        <p class="product-category">{{$product->Category['name']}}</p>
                        <h3 class="product-name">{{$product->name}}<a href="#"></a></h3>
                        <h4 class="product-price">{{number_format($product->price, 0, '', ',')}} VNĐ <del class="product-old-price">{{number_format($product->maket_price, 0, '', ',')}} VNĐ</del></h4>
                        <div class="product-rating">
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
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>

    <!-- /Section -->	        
@endsection

@section('cutom-js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
@endsection