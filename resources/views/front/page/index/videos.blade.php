<!DOCTYPE html>
<html lang="en">

<!-- Tiger Cage/index-3.html by g4bbar, Thu, 24 Jan 2019 15:33:51 GMT -->
<head>
<meta charset="utf-8">
<title>Ourland - Real Estate HTML Template | Home Page 03</title>
<!-- Stylesheets -->
<link href="{{asset('realestate/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('realestate/css/style.css')}}" rel="stylesheet">
<link href="{{asset('realestate/css/responsive.css')}}" rel="stylesheet">
<!--Color Switcher Mockup-->
<link href="{{asset('realestate/css/color-switcher-design.css')}}" rel="stylesheet">
<!--Color Themes-->
<link id="theme-color-file" href="realestate/css/color-themes/default-theme.css')}}" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link href="{{asset('ratingcss/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('ratingcss/bootstrap/css/rating.css')}}" rel="stylesheet">
<link href="{{asset('ratingcss/bootstrap/awesome-font/css/fontawesome-all.min.css')}}" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
 <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        window.Laravel={!! json_encode([
            "csrfToken"=>csrf_token(),
         ]) !!};
    </script>
</head>
<body>
<div id="app">
<div class="page-wrapper">
    <!-- Preloader -->
     @php
    use App\Model\Property;
    use App\Comment;
    @endphp
    <div class="preloader"></div>
    
    <!-- Main Header-->
   @include('front.includes.index-header.header-for-videos') 
    <!--End Main Header -->

    <!-- Banner Section -->
    <section class="banner-section full-height" style="background-image: url(images/background/15.jpg);">
     @forelse($recent_tops as $recent_top)
        <div class="content-box">
            <div class="link-box">
                <a href="#">
                <iframe width="100%" height="100%" src="{{$recent_top->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" class="play-now" data-fancybox="gallery" data-caption="" allowfullscreen></iframe>
                <i class="icon la la-play-circle-o" aria-hidden="true"></i><span class="ripple"></span></a>
            </div>
            <div class="title-box">
                <div class="inner-box">
                    <h2>You Watch in Video For Property</h2>                
                </div>
            </div>
        </div>
        @empty
       <h3>No videos</h3>
        @endforelse
    </section>
    <!--End Banner Section -->

    <!-- Property Filter Section -->
    <section class="property-filter-section">
    	<div class="auto-container">
            <!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <div class="upper-box clearfix">
                    <div class="sec-title">
                        <span class="title">FIND YOUR HOUSE IN YOUR CITY</span>
                        <h2>PROPERTY TYPES</h2>
                    </div>

                    <!--Filter-->
                    <div class="filters">
                        <ul class="filter-tabs filter-btns clearfix">
                            <li class="active filter" data-role="button" data-filter="all">All</li>
                            <li class="filter" data-role="button" data-filter=".apprtment">Apprtment</li>
                            <li class="filter" data-role="button" data-filter=".house">House</li>
                            <li class="filter" data-role="button" data-filter=".villa">Villa</li>
                            <li class="filter" data-role="button" data-filter=".form">Form</li>
                            <li class="filter" data-role="button" data-filter=".restaurent">Restaurent</li>
                        </ul>                                    
                    </div>
                </div>

                <div class="filter-list row">
                    @forelse($all_videos as $recent_last_property)
            <div class="property-block col-lg-4 col-md-6 col-sm-12">
                  <div class="inner-box">

                <div class="image-box"> 
                    <figure class="image"><img src="{{asset($recent_last_property->property->image)}}" alt="" style="max-height:320px;min-height:320px"></figure>
                    <span class="for">{{$recent_last_property->property->status}}</span>
                    <span class="featured">{{$recent_last_property->property->property_type}}</span>
                    <div class="video-link">
                        <a href="">

                  <iframe width="100%" height="100%" src="{{$recent_last_property->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>     
                        </a></div>
                    <ul class="info clearfix">
                        <li><a href="{{route('properties')}}"><i class="la la-calendar-minus-o"></i>{{$recent_last_property->property->created_at}}</a></li>
                        <li><a href="#"><i class="la la-user-secret"></i>$ {{$recent_last_property->property->price}}</a></li>
                    </ul>
                </div>
                <div class="lower-content">
                    <ul class="tags">
                        <li><a href="#">{{$recent_last_property->property->views()}} views</a>,</li>
                        <li><a href="#">{{$recent_last_property->property->likes()->count()}} likes</a>,</li>
                        <li><a href="#">{{$recent_last_property->property->comments()->count()}} Coments</a></li>
                        <li>
                            <star-rating 
                            :star-size="20" :read-only="true"
                            :rating="{{$recent_last_property->property->getStarRating()}}"
                            :increment="0.01">
                            </star-rating>
                        ,</li>
                    </ul>
                    <h3><a href="{{route('property.detail',$recent_last_property->property->id)}}">{{$recent_last_property->title}}</a></h3>
                    <div class="lucation"><i class="la la-map-marker"></i>{{$recent_last_property->address}}</div>
                     <ul class="property-info clearfix">
                            <li><i class="flaticon-dimension"></i> {{$recent_last_property->property->area}} sqFt </li>
                            <li><i class="fas fa-truck-moving"></i> {{$recent_last_property->property->property_type}}</li>
                            <li><i class="fas fa-home"></i> {{$recent_last_property->property->category->name}}</li>
                            <li><i class="fas fa-phone-square"></i> {{$recent_last_property->property->phone}}</li>
                        </ul>
                    <div class="property-price clearfix">
                        <div class="read-more"><a href="{{route('property.detail',$recent_last_property->property->id)}}" class="theme-btn">More Detail</a></div>
                        <div class="price">$ {{$recent_last_property->property->price}}</div>
                    </div>
                </div>
               
                </div>
              <br>
        </div>
                   @empty
                 <figure class="image"><img src="image" alt="No Image" ></figure>
                @endforelse
                 </div>
                <!-- Load More -->
                 <div class="load-more-btn text-center">
                   {!! $all_videos->links(); !!}
                </div>
    </section>
    <!--End Property Filter Section -->

    <!-- Process Section -->
    <section class="process-section" style="background-image: url(images/background/9.jpg);">
        <div class="auto-container">
            <div class="sec-title light">
                <span class="title">FIND YOUR HOUSE IN YOUR CITY</span>
                <h2>WORK PROCESS</h2>
            </div>

            <div class="row">
                <!-- Process Block -->
                <div class="process-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="la la-user-secret"></span></div>
                        <h4><a href="about.html">Meet Our Agent</a></h4>
                        <div class="text">You Meet our agent and decuse your property Demand</div>
                    </div>
                </div>

                <!-- Process Block -->
                <div class="process-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="la la-building-o"></span></div>
                        <h4><a href="about.html">Choose Location</a></h4>
                        <div class="text">You Meet our agent and decuse your property Demand</div>
                    </div>
                </div>

                <!-- Process Block -->
                <div class="process-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="la la-map-marker"></span></div>
                        <h4><a href="about.html">Select Your Property</a></h4>
                        <div class="text">You Meet our agent and decuse your property Demand</div>
                    </div>
                </div>

                <!-- Process Block -->
                <div class="process-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="la la-file-text"></span></div>
                        <h4><a href="about.html">Confirmation</a></h4>
                        <div class="text">You Meet our agent and decuse your property Demand</div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
    <!--End Process Section -->

    <!-- Why Choose Us -->
    <section class="why-choose-us">
        <div class="auto-container">
            <div class="sec-title">
                <span class="title">FIND YOUR HOUSE IN YOUR CITY</span>
                <h2>WHY CHOOSE US</h2>
            </div>

            <div class="row">
                <!-- Features BLock -->
                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="icon flaticon-sketching"></span></div>
                        <h4><a href="about.html">Architecture Experience</a></h4>
                        <div class="text">The heart and soul of what we provide. Our comprehensive architectural services include conceptual and schematic design</div>
                    </div>
                </div>

                <!-- Features BLock -->
                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="icon flaticon-worker"></span></div>
                        <h4><a href="about.html">Refinance Calculator</a></h4>
                        <div class="text">The heart and soul of what we provide. Our comprehensive architectural services include conceptual and schematic design</div>
                    </div>
                </div>

                <!-- Features BLock -->
                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="icon flaticon-mixer-with-wheels"></span></div>
                        <h4><a href="about.html">House / Condo Contruction</a></h4>
                        <div class="text">The heart and soul of what we provide. Our comprehensive architectural services include conceptual and schematic design</div>
                    </div>
                </div>

                <!-- Features BLock -->
                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="icon flaticon-award"></span></div>
                        <h4><a href="about.html">Fince Winner</a></h4>
                        <div class="text">The heart and soul of what we provide. Our comprehensive architectural services include conceptual and schematic design</div>
                    </div>
                </div>

                <!-- Features BLock -->
                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="icon flaticon-trophy"></span></div>
                        <h4><a href="about.html">Best House Saller Winner</a></h4>
                        <div class="text">The heart and soul of what we provide. Our comprehensive architectural services include conceptual and schematic design</div>
                    </div>
                </div>

                <!-- Features BLock -->
                <div class="feature-block-two col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="icon flaticon-medal"></span></div>
                        <h4><a href="about.html">Best Support Winner</a></h4>
                        <div class="text">The heart and soul of what we provide. Our comprehensive architectural services include conceptual and schematic design</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Why Choose Us -->

    <!-- App Section -->
    <section class="app-section" style="background-image: url(images/background/17.jpg);">
        <div class="auto-container">
            <div class="row">
                <!-- Image Box -->
                <div class="image-column order-last col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/image-6.png" alt=""></figure>
                        </div>
                    </div>
                </div>

                <!-- Content Box -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>Property Find On Your <br>Finger Tip</h2>
                        <div class="text">consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </div>
                        <div class="link-box">
                            <a href="#"><img src="images/resource/app-store.png" alt=""></a>
                            <a href="#"><img src="images/resource/google-play.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End App Section -->

    <!-- Recent Property Section -->
    <section class="recent-property-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="title">FIND YOUR HOUSE IN YOUR CITY</span>
                <h2>RECENT PROPERTIES</h2>
            </div>

            <div class="single-item-carousel owl-carousel owl-theme">
                <!-- Slide Item -->
                <div class="slide-item">
                    <!-- Property Block -->
                    <div class="property-block-two">
                        <div class="inner-box">
                            <div class="row no-gutters">
                                <div class="image-box col-lg-6 col-md-12 col-sm-12">
                                    <figure class="image"><img src="images/resource/property-7.jpg" alt=""></figure>
                                    <span class="for">FOR SALE</span>
                                    <span class="featured">FEATURED</span>
                                    <ul class="option-box">
                                        <li><a href="images/resource/property-7.jpg" class="lightbox-image" data-fancybox="property"><i class="la la-camera"></i></a></li>
                                        <li><a href="#"><i class="la la-heart"></i></a></li>
                                        <li><a href="#"><i class="la la-retweet"></i></a></li>
                                    </ul>
                                    <ul class="info clearfix">
                                        <li><a href="properties.html"><i class="la la-calendar-minus-o"></i>2 Years Ago</a></li>
                                    </ul>
                                </div>
                                <div class="lower-content col-lg-6 col-md-12 col-sm-12">
                                    <ul class="tags">
                                        <li><a href="property-detail.html">Apartment</a>,</li>
                                        <li><a href="property-detail.html">Bar</a>,</li>
                                        <li><a href="property-detail.html">House</a>,</li>
                                    </ul>
                                    <div class="thumb"><img src="images/resource/thumb-11.jpg" alt=""></div>
                                    <h3><a href="property-detail.html">Single House Near Orland Park.</a></h3>
                                    <div class="lucation"><i class="la la-map-marker"></i> Orland Park, IL 35785, Chicago, United State</div>
                                    <ul class="property-info clearfix">
                                        <li><i class="flaticon-dimension"></i> 356 Sq-Ft</li>
                                        <li><i class="flaticon-bed"></i> 4 Bedrooms</li>
                                        <li><i class="flaticon-car"></i> 2 Garage</li>
                                        <li><i class="flaticon-bathtub"></i> 3 Bathroom</li>
                                    </ul>
                                    <div class="property-price clearfix">
                                        <div class="read-more"><a href="property-detail.html" class="theme-btn">More Detail</a></div>
                                        <div class="price">$ 13,65,000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Block -->
                    <div class="property-block-two">
                        <div class="inner-box">
                            <div class="row no-gutters">
                                <div class="image-box col-lg-6 col-md-12 col-sm-12">
                                    <figure class="image"><img src="images/resource/property-8.jpg" alt=""></figure>
                                    <span class="for">FOR SALE</span>
                                    <span class="featured">FEATURED</span>
                                    <ul class="option-box">
                                        <li><a href="images/resource/property-8.jpg" class="lightbox-image" data-fancybox="property"><i class="la la-camera"></i></a></li>
                                        <li><a href="#"><i class="la la-heart"></i></a></li>
                                        <li><a href="#"><i class="la la-retweet"></i></a></li>
                                    </ul>
                                    <ul class="info clearfix">
                                        <li><a href="properties.html"><i class="la la-calendar-minus-o"></i>2 Years Ago</a></li>
                                    </ul>
                                </div>
                                <div class="lower-content col-lg-6 col-md-12 col-sm-12">
                                    <ul class="tags">
                                        <li><a href="property-detail.html">Apartment</a>,</li>
                                        <li><a href="property-detail.html">Bar</a>,</li>
                                        <li><a href="property-detail.html">House</a>,</li>
                                    </ul>
                                    <div class="thumb"><img src="images/resource/thumb-12.jpg" alt=""></div>
                                    <h3><a href="property-detail.html">Single House Near Orland Park.</a></h3>
                                    <div class="lucation"><i class="la la-map-marker"></i> Orland Park, IL 35785, Chicago, United State</div>
                                    <ul class="property-info clearfix">
                                        <li><i class="flaticon-dimension"></i> 356 Sq-Ft</li>
                                        <li><i class="flaticon-bed"></i> 4 Bedrooms</li>
                                        <li><i class="flaticon-car"></i> 2 Garage</li>
                                        <li><i class="flaticon-bathtub"></i> 3 Bathroom</li>
                                    </ul>
                                    <div class="property-price clearfix">
                                        <div class="read-more"><a href="property-detail.html" class="theme-btn">More Detail</a></div>
                                        <div class="price">$ 13,65,000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide Item -->
                <div class="slide-item">
                    <!-- Property Block -->
                    <div class="property-block-two">
                        <div class="inner-box">
                            <div class="row no-gutters">
                                <div class="image-box col-lg-6 col-md-12 col-sm-12">
                                    <figure class="image"><img src="images/resource/property-7.jpg" alt=""></figure>
                                    <span class="for">FOR SALE</span>
                                    <span class="featured">FEATURED</span>
                                    <ul class="option-box">
                                        <li><a href="images/resource/property-7.jpg" class="lightbox-image" data-fancybox="property"><i class="la la-camera"></i></a></li>
                                        <li><a href="#"><i class="la la-heart"></i></a></li>
                                        <li><a href="#"><i class="la la-retweet"></i></a></li>
                                    </ul>
                                    <ul class="info clearfix">
                                        <li><a href="properties.html"><i class="la la-calendar-minus-o"></i>2 Years Ago</a></li>
                                    </ul>
                                </div>
                                <div class="lower-content col-lg-6 col-md-12 col-sm-12">
                                    <ul class="tags">
                                        <li><a href="property-detail.html">Apartment</a>,</li>
                                        <li><a href="property-detail.html">Bar</a>,</li>
                                        <li><a href="property-detail.html">House</a>,</li>
                                    </ul>
                                    <div class="thumb"><img src="images/resource/thumb-11.jpg" alt=""></div>
                                    <h3><a href="property-detail.html">Single House Near Orland Park.</a></h3>
                                    <div class="lucation"><i class="la la-map-marker"></i> Orland Park, IL 35785, Chicago, United State</div>
                                    <ul class="property-info clearfix">
                                        <li><i class="flaticon-dimension"></i> 356 Sq-Ft</li>
                                        <li><i class="flaticon-bed"></i> 4 Bedrooms</li>
                                        <li><i class="flaticon-car"></i> 2 Garage</li>
                                        <li><i class="flaticon-bathtub"></i> 3 Bathroom</li>
                                    </ul>
                                    <div class="property-price clearfix">
                                        <div class="read-more"><a href="property-detail.html" class="theme-btn">More Detail</a></div>
                                        <div class="price">$ 13,65,000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Block -->
                    <div class="property-block-two">
                        <div class="inner-box">
                            <div class="row no-gutters">
                                <div class="image-box col-lg-6 col-md-12 col-sm-12">
                                    <figure class="image"><img src="images/resource/property-8.jpg" alt=""></figure>
                                    <span class="for">FOR SALE</span>
                                    <span class="featured">FEATURED</span>
                                    <ul class="option-box">
                                        <li><a href="images/resource/property-8.jpg" class="lightbox-image" data-fancybox="property"><i class="la la-camera"></i></a></li>
                                        <li><a href="#"><i class="la la-heart"></i></a></li>
                                        <li><a href="#"><i class="la la-retweet"></i></a></li>
                                    </ul>
                                    <ul class="info clearfix">
                                        <li><a href="properties.html"><i class="la la-calendar-minus-o"></i>2 Years Ago</a></li>
                                    </ul>
                                </div>
                                <div class="lower-content col-lg-6 col-md-12 col-sm-12">
                                    <ul class="tags">
                                        <li><a href="property-detail.html">Apartment</a>,</li>
                                        <li><a href="property-detail.html">Bar</a>,</li>
                                        <li><a href="property-detail.html">House</a>,</li>
                                    </ul>
                                    <div class="thumb"><img src="images/resource/thumb-12.jpg" alt=""></div>
                                    <h3><a href="property-detail.html">Single House Near Orland Park.</a></h3>
                                    <div class="lucation"><i class="la la-map-marker"></i> Orland Park, IL 35785, Chicago, United State</div>
                                    <ul class="property-info clearfix">
                                        <li><i class="flaticon-dimension"></i> 356 Sq-Ft</li>
                                        <li><i class="flaticon-bed"></i> 4 Bedrooms</li>
                                        <li><i class="flaticon-car"></i> 2 Garage</li>
                                        <li><i class="flaticon-bathtub"></i> 3 Bathroom</li>
                                    </ul>
                                    <div class="property-price clearfix">
                                        <div class="read-more"><a href="property-detail.html" class="theme-btn">More Detail</a></div>
                                        <div class="price">$ 13,65,000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Recent Property Section -->

    <!--Clients Section-->
    <section class="clients-section style-three">
        <div class="auto-container">
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure></li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Clients Section-->

    <!-- Testimonial Section Two -->
    <section class="testimonial-section-two" style="background-image: url(images/background/11.jpg);">
        <div class="auto-container">
            <div class="row">
                <!-- Testimonial Column -->
                <div class="testimonial-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="title">OUR WEET TESTIMONIAL</span>
                            <h2>WHAT PEOPLE SAID</h2>
                        </div>
                        
                        <div class="testimonial-carousel-two owl-carousel owl-theme">
                            <!-- Testimonial Block Two -->
                            <div class="testimonial-block-two">
                                <div class="inner-box">
                                    <div class="text">Imagination… What we can easily see is only a small percentage of what is possible. Logistics through innovation, dedication, and technology.</div>
                                    <div class="info-box">
                                        <div class="thumb"><img src="images/resource/thumb-13.jpg" alt=""></div>
                                        <h4 class="name">Jeniffer Burns</h4>
                                        <span class="designation">Project Manager</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimonial Block Two -->
                            <div class="testimonial-block-two">
                                <div class="inner-box">
                                    <div class="text">Imagination… What we can easily see is only a small percentage of what is possible. Logistics through innovation, dedication, and technology.</div>
                                    <div class="info-box">
                                        <div class="thumb"><img src="images/resource/thumb-13.jpg" alt=""></div>
                                        <h4 class="name">Jeniffer Burns</h4>
                                        <span class="designation">Project Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/image-7.png" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Testimonial Section Two -->

     <!-- Call Back Section -->
    <section class="call-back-section" style="background-image: url(images/background/12.jpg);">
        <div class="auto-container clearfix">
            <div class="column">
                <div class="sec-title">
                    <span class="title">CALL TO ACTION</span>
                    <h2>REQUEST CALL BACK</h2>
                </div>
                <div class="request-form">
                    <p>Please complete the form</p>
                    <form >
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Your Name*" required="">
                        </div>
                        
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email*" required="">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="number" placeholder="Contact No*" required="">
                        </div>

                        <div class="form-group">
                            <input type="text" name="location" placeholder="Location**" required="">
                        </div>

                        <div class="form-group">
                            <textarea name="message" placeholder="Massage"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <button class="theme-btn btn-style-two" type="submit" name="submit-form">Submit Now</button>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </section>
    <!--End Call Back Section -->

    <!-- Main Footer -->
    @include('front.includes.full-footer')
    <!-- End Main Footer -->
</div>
<!--End pagewrapper-->
</div>
<!-- Color Palate / Color Switcher -->
<div class="color-palate">
    <div class="color-trigger">
        <i class="la la-cog"></i>
    </div>
    <div class="color-palate-head">
        <h6>Choose Your Color</h6>
    </div>
    <div class="various-color clearfix">
        <div class="colors-list">
            <span class="palate default-color active" data-theme-file="realestate/css/color-themes/default-theme.css"></span>
            <span class="palate green-color" data-theme-file="realestate/css/color-themes/green-theme.css"></span>
            <span class="palate blue-color" data-theme-file="realestate/css/color-themes/blue-theme.css"></span>
            <span class="palate orange-color" data-theme-file="realestate/css/color-themes/orange-theme.css"></span>
            <span class="palate purple-color" data-theme-file="realestate/css/color-themes/purple-theme.css"></span>
            <span class="palate teal-color" data-theme-file="realestate/css/color-themes/teal-theme.css"></span>
            <span class="palate brown-color" data-theme-file="realestate/css/color-themes/brown-theme.css"></span>
            <span class="palate redd-color" data-theme-file="realestate/css/color-themes/redd-color.css"></span>
        </div>
    </div>
    <ul class="box-version option-box"> <li>Full width</li> <li class="box">Boxed</li> </ul>
    <ul class="rtl-version option-box"> <li>LTR Version</li> <li class="rtl">RTL Version</li> </ul>
    <div class="palate-foo">
        <span>You will find much more options for colors and styling in admin panel. This color picker is used only for demonstation purposes.</span>
    </div>
    <a href="#" class="purchase-btn">Purchase now $17</a>
</div><!-- End Color Switcher -->

<script src="{{asset('realestate/js/jquery.js')}}"></script> 
<script src="{{asset('realestate/js/popper.min.js')}}"></script>
<script src="{{asset('realestate/js/bootstrap.min.js')}}"></script>
<script src="{{asset('realestate/js/jquery-ui.js')}}"></script>
<script src="{{asset('realestate/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('realestate/js/owl.js')}}"></script>
<script src="{{asset('realestate/js/wow.js')}}"></script>
<script src="{{asset('realestate/js/isotope.js')}}"></script>
<script src="{{asset('realestate/js/mixitup.js')}}"></script>
<script src="{{asset('realestate/js/appear.js')}}"></script>
<script src="{{asset('realestate/js/script.js')}}"></script>
<!-- Color Setting -->
<script src="{{asset('realestate/js/color-settings.js')}}"></script>

<script src="{{asset('ratingcss/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('ratingcss/bootstrap/js/jquery.min.js')}}"></script>
<script src="{{asset('ratingcss/bootstrap/js/rating.js')}}"></script>    
<script>
$('.ratings').rating(function(vote,event){
  $.ajax({
    method:"POST",
    url:'{{ url('edit-star') }}',
    data:{vote:vote}
  }).done(function(info){
    $('.info').html("your vote: <b>"+info+"<b>")
  })
})
</script>
</body>
</html>