<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SITE META -->
    <title>Coupon</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <!-- FAVICONS -->

    {{--    <link rel="apple-touch-icon" sizes="152x152" href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/images/apple-touch-icon-152x152.png">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
</head>
<body>

<!-- ******************************************
START SITE HERE
********************************************** -->

<div id="wrapper">
    <div class="header">
        <div class="menu-wrapper ab-menu">
            <div class="container">
                <div class="hovermenu ttmenu menu-color">
                    <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/index.html"><img src="{{ asset('img_coupon/logo.png') }}" alt=""></a>
                        </div><!-- end navbar-header -->

                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li><a class="active" href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/index.html" title="">Home</a></li>
                                <li class="dropdown hasmenu">
                                    <a href="/" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="fa fa-angle-down"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/store-single.html">Store Single</a></li>
                                        <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/coupon-single.html">Coupon Single</a></li>
                                        <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/category-single.html">Category Single</a></li>
                                        <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/single.html">Blog Single</a></li>
                                        <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/page-contact.html">Contact us</a></li>
                                        <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/page.html">Default Page</a></li>
                                        <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/page-404.html">Not Found</a></li>
                                        <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/page-elements.html">All Elements</a></li>
                                    </ul>
                                </li>
                                <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/coupons.html" title="">Coupons</a></li>
                                <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/printable.html" title="">Printable</a></li>
                                <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/categories.html" title="">Categories</a></li>
                                <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/stores.html" title="">Stores</a></li>
                                <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/blog.html" title="">Blog</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown hasmenu userpanel">
                                    <a href="/" class="dropdown-toggle" data-toggle="dropdown"><img src="coupon-v1/uploads/testi_03.png" alt="" class="img-circle"> <span class="fa fa-angle-down"></span></a>
                                    <ul class="dropdown-menu start-right" role="menu">
                                        <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/user-dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                        <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/user-favorites.html"><i class="fa fa-star"></i> Favorite Stores</a></li>
                                        <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/user-saved.html"><i class="fa fa-heart-o"></i> Saved Coupons</a></li>
                                        <li><a href="https://psdconverthtml.com/live/yourcoupon/coupon-v1/user-submit.html"><i class="fa fa-bullhorn"></i> Submit Coupon</a></li>
                                        <li><a href="/"><i class="fa fa-lock"></i> Sign Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div><!-- end navbar navbar-default clearfix -->
                </div><!-- end menu 1 -->
            </div><!-- end container -->
        </div><!-- / menu-wrapper -->
    </div><!-- end header -->
    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h4>Email Newsletter</h4>
                        </div>

                        <div class="newsletter">
                            <p>Your email is safe with us and we hate spam as much as you do. Lorem ipsum dolor sit amet et dolore.</p>
                            <form class="">
                                <input type="text" class="form-control" placeholder="Enter your name..">
                                <input type="email" class="form-control" placeholder="Enter your email..">
                                <button type="submit" class="btn btn-primary">SUBSCRIBE</button>
                            </form>
                        </div>
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h4>Twitter Feed's</h4>
                        </div>
                        <div class="twitter-widget">
                            <ul class="twitter_feed">
                                <li><span></span><p>Envato Market wishes you and your family a merry Christmas and a happy new! You are awesome! <a href="/">about 2 days ago</a></p></li>
                                <li><span></span><p>PSD Convert HTML, thanks for support and a merry Christmas and a happy new years! <a href="/">about 9 days ago</a></p></li>
                            </ul><!-- end twiteer_feed -->
                        </div>
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class="col-md-2 col-sm-12 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h4>Company Info</h4>
                        </div>

                        <ul class="footer-links">
                            <li><a href="/">About us</a></li>
                            <li><a href="/">Contact us</a></li>
                            <li><a href="/">Terms of Usage</a></li>
                            <li><a href="/">Copyrights</a></li>
                            <li><a href="/">Coupon a Report</a></li>
                            <li><a href="/">License</a></li>
                            <li><a href="/">Trademarks</a></li>
                        </ul><!-- end links -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h4>Frequently Asked Questions</h4>
                        </div>

                        <div class="first_accordion withicon withcolorful panel-group" id="accordion5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion5" href="/collapse115">
                                            <i class="fa fa-angle-down"></i> How to Use Coupon Codes?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse115" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiolore. consectetur adipisicing elit, sed do eiusmod tempor ut labore et dolor.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion5" href="/collapse215">
                                            <i class="fa fa-angle-down"></i> Can I submit My Coupons?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse215" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiolore. consectetur adipisicing elit, sed do eiusmod tempor ut labore et dolor.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary last">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion5" href="/collapse315">
                                            <i class="fa fa-angle-down"></i> Coupon Submission free?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse315" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiolore. consectetur adipisicing elit, sed do eiusmod tempor ut labore et dolor.</p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end panel -->
                    </div><!-- end widget -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="copylinks">
                        <ul class="list-inline">
                            <li><a href="/">Home</a></li>
                            <li><a href="/">About</a></li>
                            <li><a href="/">Contact</a></li>
                            <li><a href="/">Terms of Usage</a></li>
                            <li><a href="/">Trademark</a></li>
                            <li><a href="/">License</a></li>
                        </ul><!-- end ul -->
                        <p>YourCoupon &copy; 2016 - Designed by <a href="http://psdconverthtml.com">PSD to HTML</a></p>
                    </div><!-- end links -->
                </div><!-- end col -->

                <div class="col-md-6 col-sm-6">
                    <div class="footer-social text-right">
                        <ul class="list-inline social-small">
                            <li><a href="/"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="/"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="/"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="/"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="/"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="/"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end copyrights -->
</div><!-- end wrapper -->

<!-- ******************************************
/END SITE
********************************************** -->

<!-- ******************************************
DEFAULT JAVASCRIPT FILES
********************************************** -->
<script src="{{ asset('js/home.js') }}"></script>
<script src="{{ asset('style_coupon/js/all.js') }}"></script>
<script src="{{ asset('style_coupon/js/custom.js') }}"></script>
<script src="{{ asset('style_coupon/switcher/switcher.js') }}"></script>
</body>
</html>
