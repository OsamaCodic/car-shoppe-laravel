<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Products</title>

    <!-- FAVICON -->
    <link href="{{ asset('frontend-layout') }}/img/favicon.png" rel="shortcut icon">
    <!-- PLUGINS CSS STYLE -->
    <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend-layout') }}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend-layout') }}/plugins/bootstrap/css/bootstrap-slider.css">
    <!-- Font Awesome -->
    <link href="{{ asset('frontend-layout') }}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{ asset('frontend-layout') }}/plugins/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="{{ asset('frontend-layout') }}/plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="{{ asset('frontend-layout') }}/plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
    <link href="{{ asset('frontend-layout') }}/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="{{ asset('frontend-layout') }}/css/style.css" rel="stylesheet">
</head>

<body class="body-wrapper">

    <section>
        @include('frontend_layout.header')
    </section>


    <section class="page-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <form action="{{url('front/advance_search_product')}}" method="get">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <select name="brand_id" class="w-100 form-control">
                                        <option value="">Brand</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <select name="type_id" class="w-100 form-control">
                                        <option value="">Which body you'r looking for?</option>
                                        @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <select class="w-100 form-control" name="engine_cc" id="engine_cc">
                                        <option value="">Search by Engine</option>
                                        <option value="660">660 cc</option>
                                        <option value="800">800 cc</option>
                                        <option value="1000">1000 cc</option>
                                        <option value="1300">1300 cc</option>
                                        <option value="1500">1500 cc</option>
                                        <option value="1800">1800 cc</option>
                                        <option value="2000">2000 cc</option>
                                        <option value="2500">2500 cc</option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <select class="w-100 form-control" name="less_than_price" id="less_than_price">
                                        <option value="">Search by price</option>
                                        <option value="100000">less than 1 lac</option>
                                        <option value="500000">less than 5 lac</option>
                                        <option value="10000000">less than 10 lac</option>
                                        <option value="150000">less than 15 lac</option>
                                        <option value="2000000">less than 20 lac</option>
                                        <option value="2500000">less than 25 lac</option>
                                        <option value="3000000">less than 30 lac</option>
                                        <option value="3500000">less than 35 lac</option>
                                        <option value="4000000">less than 40 lac</option>
                                        <option value="5000000">less than 50 lac</option> 
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <select class="w-100 form-control" name="no_of_doors" id="no_of_doors">
                                        <option value="">Search by doors</option>
                                        <option value="2">2 Doors</option>
                                        <option value="4">4 Doors</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3 mt-2">
                                    <input type="text" name="name" class="form-control my-2 my-lg-0" id="inputLocation4"
                                        placeholder="Search product">
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <input type="number" min="1885" max="2022" name="model" class="form-control my-2 my-lg-0" id="inputLocation4"
                                        placeholder="Search by model year">
                                </div>

                                <div class="col-md-6 mt-2" id="selected_transmission">
                                    <div class="form-group">
                                        <select class="form-control" name="transmission" id="transmission">
                                            <option value="">--Select--</option>
                                            <option value="Automatic" {{ @$product->transmission == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                                            <option value="Mannual" {{ @$product->transmission == 'Mannual' ? 'selected' : '' }}>Mannual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div id="select_gears" class="form-group" style="display: none">
                                        <select class="form-control" name="gears" id="gears">
                                            <option value="">--Select--</option>
                                            <option value="1" {{ @$product->gears == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ @$product->gears == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ @$product->gears == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ @$product->gears == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ @$product->gears == 5 ? 'selected' : '' }}>5</option>
                                            <option value="6" {{ @$product->gears == 6 ? 'selected' : '' }}>6</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div id="select_gears" class="form-group" style="display: none">
                                        <select class="form-control" name="gears" id="gears">
                                            <option value="">--Select--</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-12 mt-2">
                                    <button type="submit" class="btn btn-outline-info btn-block">Search Now <i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="category-sidebar">
                        <div class="widget category-list">
                            <h4 class="widget-header">All Brands</h4>
                            <ul class="category-list">
                              @foreach ($brands as $brand)  
                                <li><a href="{{url('front/products?brand_id='.$brand->id)}}">{{$brand->title}}<span>{{$brand->products->count()}}</span></a></li>
                              @endforeach
                            </ul>
                        </div>

                        <div class="widget category-list">
                            <h4 class="widget-header">All Types</h4>
                            <ul class="category-list">
                              @foreach ($types as $type)  
                                <li><a href="{{url('front/products?type_id='.$type->id)}}">{{$type->title}}<span>{{$type->products->count()}}</span></a></li>
                              @endforeach
                            </ul>
                        </div>

                        <div class="widget product-shorting">
                            <h4 class="widget-header">By Condition</h4>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <a href="{{url('front/products?status=1')}}">New car</a>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <a href="{{url('front/products?status=2')}}">Used Car</a>
                                </label>
                            </div>
                        </div>

                        <div class="widget filter">
                            <h4 class="widget-header">Show Produts</h4>
                            <select name="searchbyBrandRatted" id="searchbyTransmission">
                                <option>Transmission</option>
                                <option value="Automatic">Automatic</option>
                                <option value="Mannual">Mannual</option>
                            </select>
                        </div>

                        {{-- <div class="widget price-range w-100">
                            <h4 class="widget-header">Price Range</h4>
                            <div class="block">
                                <input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000"
                                    data-slider-step="5" data-slider-value="[0,5000]">
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="value">$10 - $5000</span>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="category-search-filter">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Short</strong>
                                <select id="shortbyFilter" name="shortbyFilter">
                                    <option value="">Most Recent</option>
                                    <option value="1">Oldest Models</option>
                                    <option value="2">Latest Models</option>
                                    <option value="3">Lowest Price</option>
                                    <option value="4">Highest Price</option>
                                </select>
                            </div>

                            <div class="col-md-6 ">
                                <a href="{{url('front/products')}}"><button class="btn float-right btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button></a>
                            </div>
                        </div>
                    </div>

                    @foreach ($products as $product)
                      <div class="ad-listing-list mt-20">
                        <div class="row p-lg-3 p-sm-5 p-4">
                            <div class="col-lg-4 align-self-center">
                                <a href="single.html">
                                    <img src="{{asset('storage')}}/images/{{@$product->productImages[0]->image_name}}" class="img-fluid" />
                                </a>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 col-md-10">
                                        <div class="ad-listing-content">
                                            <div>
                                                <a href="single.html" class="font-weight-bold">{{$product->name}}</a>
                                            </div>
                                            <ul class="list-inline mt-2 mb-3">
                                                <li class="list-inline-item"><a href="category.html"> <i
                                                            class="fa fa-folder-open-o"></i> {{$product->brand->title}}</a></li>
                                                <li class="list-inline-item"><a href=""><i
                                                            class="fa fa-calendar"></i> {{$product->type->title}}</a></li>
                                            </ul>
                                            
                                            <p class="pr-5">
                                              @if ($product->description != null)
                                                {!! $product->description !!}
                                              @else
                                                <p class="text-danger">N/A</p>  
                                              @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 align-self-center">
                                        <div class="product-ratings float-lg-right pb-3">
                                          <strong class="text-success">Rs. {{$product->price}}</strong>
                                          <br>
                                          <a href="{{url('front/product/'.$product->id.'/details')}}" class="btn btn-info btn-sm">Buy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @if ($products->count() == 0)
                        <p class="text-danger text-center font-weight-bold mt-5">No products founds...</p>
                    @endif
                    <!-- ad listing list  -->

                    <!-- pagination -->
                    <div class="pagination justify-content-center py-4">
                        <nav aria-label="Page navigation example">
                          {!! $products->links() !!}
                        </nav>
                    </div>
                    <!-- pagination -->
                </div>
            </div>
        </div>
        
    </section>

    

    @include('frontend_layout.footer')

    <!-- JAVASCRIPTS -->
    <script src="{{ asset('frontend-layout') }}/plugins/jQuery/jquery.min.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/bootstrap/js/bootstrap-slider.js"></script>
    <!-- tether js -->
    <script src="{{ asset('frontend-layout') }}/plugins/tether/js/tether.min.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/raty/jquery.raty-fa.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/fancybox/jquery.fancybox.pack.js"></script>
    <script src="{{ asset('frontend-layout') }}/plugins/smoothscroll/SmoothScroll.min.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places">
    </script>
    <script src="{{ asset('frontend-layout') }}/plugins/google-map/gmap.js"></script>
    <script src="{{ asset('frontend-layout') }}/js/script.js"></script>

    @include('frontend_layout.partials.frontend_js')

</body>

</html>
