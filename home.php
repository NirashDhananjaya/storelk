<?php
/**
 * Created by PhpStorm.
 * User: Nirash
 * Date: 1/18/2019
 * Time: 9:40 PM
 */


//echo base64_decode($_GET['message']);

include_once "require/require_include.php";
include_once "classes/classes_include.php";
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Store.lk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<!--<div class="colorlib-loader"></div>-->

<div id="page">
    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="colorlib-logo"><a href="index.html">Store</a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="has-dropdown active">
                                <a href="shop.html">Shop</a>
                                <ul class="dropdown">
                                    <li><a href="product-detail.html">Product Detail</a></li>
                                    <li><a href="cart.html">Shipping Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="order-complete.html">Order Complete</a></li>
                                    <li><a href="add-to-wishlist.html">Wishlist</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="cart.php"><i class="icon-shopping-cart"></i> Cart [0]</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside id="colorlib-hero" class="breadcrumbs" style="margin-bottom: 60px!important;">
        <div class="flexslider">
            <ul class="slides">
                <li style="background-image: url(images/cover-img-1.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h1>Products</h1>
                                    <h2 class="bread"><span><a href="index.html">Home</a></span> <span>Shop</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <h2 style="text-align: center">
                <?php
                if (isset($_GET['message']) && $_GET['token']) {
                    if (validateNotification($_GET['message'], $_GET['token'])) {
                        echo base64_decode($_GET['message']);
                    }
                }
                ?>
            </h2>
        </div>

    </aside>

    <div class="colorlib-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-push-2">
                    <div class="row row-pb-lg">


                        <?php

                        $page_no = 0;
                        $page_no_multiplied = 0;
                        if (isset($_GET['page']) && $_GET['page'] != "") {
                            $page_no = $_GET['page'];
                            $page_no_multiplied = $page_no * 12;
                        }
                        $products = getAllItemsByOffset($conn, $page_no_multiplied);

                        foreach ($products as $product) {

                            $show_promo = $product['promo_text'] != null ? true : false;
                            ?>

                            <div class="col-md-4 text-center">
                                <div class="product-entry">
                                    <!--                                    <a href="product-detail.php?product_id=-->
                                    <?php //echo $product['id_item']; ?><!--">-->
                                    <div class="product-img" 
                                         onclick="window.open('product-detail.php?item_id=<?php echo
                                         $product['id_item']; ?>');"
                                         style="background-image: url(<?php echo $product['image_url']; ?>);cursor: pointer;">

                                        <?php
                                        if ($show_promo) {
                                            ?>
                                            <p class="tag"><span class="new"
                                                                 style="background-color: <?php echo $product['promo_text_colour'] ?>!important"><?php echo $product['promo_text'] ?></span>
                                            </p>
                                        <?php } ?>

                                        <div class="cart">
                                            <p>
                                            <span class="addtocart"><a href="cart.html"><i
                                                            class="icon-shopping-cart"></i></a></span>
                                                <span><a href="product-detail.html"><i
                                                                class="icon-eye"></i></a></span>
                                                <span><a href="#"><i class="icon-heart3"></i></a></span>
                                                <span><a href="add-to-wishlist.html"><i
                                                                class="icon-bar-chart"></i></a></span>
                                            </p>
                                        </div>
                                    </div>
                                    <!--                                    </a>-->
                                    <div class="desc">
                                        <h3>
                                            <a href="product-detail.html"><?php echo $product['item_description']; ?></a>
                                        </h3>
                                        <p class="price"><span>Rs. <?php echo $product['price']; ?></span></p>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <?php
                            $item_count = 100;
                            //                            $item_count = count($products);
                            $setsOf12 = floor($item_count / 12);
                            //                            echo $page_no;
                            //                            die();
                            $backURL = "home.php?page=" . (string)((int)$page_no - 1);
                            $frontURL = "home.php?page=" . (string)((int)$page_no + 1);
                            ?>

                            <ul class="pagination">

                                <li class="<?php echo $page_no == 0 ? "disabled" : "" ?>">

                                    <a href="<?php echo $page_no == 0 ? "#" : $backURL; ?>">&laquo;</a>
                                </li>

                                <?php
                                $pagCount = 0;

                                for ($i = $page_no; $i < $setsOf12; $i++) {
                                    if ($pagCount == 5) {
                                        break;
                                    }
                                    ?>
                                    <li class="<?php echo $page_no == $i ? "active" : ""; ?>"><a
                                                href="<?php echo "home.php?page=" . $i; ?>"><?php echo $i + 1 ?></a>
                                    </li>

                                    <?php
                                    $pagCount++;
                                } ?>

                                <li class="<?php echo $page_no == $setsOf12 - 1 ? "disabled" : "" ?>">
                                    <a href="<?php echo $frontURL; ?>">&raquo;</a></li>

                            </ul>
                        </div>
                    </div>
                </div>



                <div class="col-md-2 col-md-pull-10">
                    <div class="sidebar">
                        <div class="side">


                            <!--                ********CATEGORIES Loading ***************-->
                            <h2>Categories</h2>
                            <div class="fancy-collapse-panel">


                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                    <?php

                                    $categories = getAllCategories($conn);

                                    $i = 0;

                                    foreach ($categories as $category) {
                                        ?>

                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab"
                                                 id="heading<?php echo $category['id_category'] ?>">
                                                <h4 class="panel-title">

                                                    <a data-toggle="collapse" data-parent="#accordion"
                                                       href="#collapse<?php echo $category['id_category'] ?>"
                                                       aria-expanded="<?php echo $i == 0 ? "true" : "false"; ?>"
                                                       aria-controls="collapse<?php echo $category['id_category'] ?>"
                                                        <?php echo $i == 0 ? "class=\"collapsed\"" : "" ?>
                                                    >
                                                        <?php echo $category['category_name']; ?>

                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse<?php echo $category['id_category'] ?>"
                                                 class="panel-collapse collapse" role="tabpanel"
                                                 aria-labelledby="heading<?php echo $category['id_category'] ?>">
                                                <div class="panel-body">
                                                    <ul>
                                                        <?php
                                                        $sub_categories = getSubCategoriesByCategoryID($conn, $category['id_category']);

                                                        foreach ($sub_categories as $sub_category) {
                                                            ?>
                                                            <li>
                                                                <a href="#"><?php echo $sub_category['sub_category_name']; ?></a>
                                                            </li>



                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        $i++;
                                    }
                                    ?>

                                </div>


                            </div>
                        </div>
                        <!--                ***********************-->


                        <div class="side">
                            <h2>Price Range</h2>
                            <form method="post" class="colorlib-form-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="guests">Price from:</label>
                                            <div class="form-field">
                                                <i class="icon icon-arrow-down3"></i>
                                                <select name="people" id="people" class="form-control">
                                                    <option value="#">1</option>
                                                    <option value="#">200</option>
                                                    <option value="#">300</option>
                                                    <option value="#">400</option>
                                                    <option value="#">1000</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="guests">Price to:</label>
                                            <div class="form-field">
                                                <i class="icon icon-arrow-down3"></i>
                                                <select name="people" id="people" class="form-control">
                                                    <option value="#">2000</option>
                                                    <option value="#">4000</option>
                                                    <option value="#">6000</option>
                                                    <option value="#">8000</option>
                                                    <option value="#">10000</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="side">
                            <h2>Color</h2>
                            <div class="color-wrap">
                                <p class="color-desc">
                                    <a href="#" class="color color-1"></a>
                                    <a href="#" class="color color-2"></a>
                                    <a href="#" class="color color-3"></a>
                                    <a href="#" class="color color-4"></a>
                                    <a href="#" class="color color-5"></a>
                                </p>
                            </div>
                        </div>
                        <div class="side">
                            <h2>Size</h2>
                            <div class="size-wrap">
                                <p class="size-desc">
                                    <a href="#" class="size size-1">xs</a>
                                    <a href="#" class="size size-2">s</a>
                                    <a href="#" class="size size-3">m</a>
                                    <a href="#" class="size size-4">l</a>
                                    <a href="#" class="size size-5">xl</a>
                                    <a href="#" class="size size-5">xxl</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--                ***********************-->
        </div>
    </div>

    <div id="colorlib-subscribe">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="col-md-6 text-center">
                        <h2><i class="icon-paperplane"></i>Sign Up for a Newsletter</h2>
                    </div>
                    <div class="col-md-6">
                        <form class="form-inline qbstp-header-subscribe">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-0">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email"
                                               placeholder="Enter your email">
                                        <button type="submit" class="btn btn-primary">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="colorlib-footer" role="contentinfo">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-3 colorlib-widget">
                    <h4>About Store</h4>
                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta
                        adipisci architecto culpa amet.</p>
                    <p>
                    <ul class="colorlib-social-icons">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    </ul>
                    </p>
                </div>
                <div class="col-md-2 colorlib-widget">
                    <h4>Customer Care</h4>
                    <p>
                    <ul class="colorlib-footer-links">
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Returns/Exchange</a></li>
                        <li><a href="#">Gift Voucher</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Special</a></li>
                        <li><a href="#">Customer Services</a></li>
                        <li><a href="#">Site maps</a></li>
                    </ul>
                    </p>
                </div>
                <div class="col-md-2 colorlib-widget">
                    <h4>Information</h4>
                    <p>
                    <ul class="colorlib-footer-links">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Order Tracking</a></li>
                    </ul>
                    </p>
                </div>

                <div class="col-md-2">
                    <h4>News</h4>
                    <ul class="colorlib-footer-links">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Exhibitions</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h4>Contact Information</h4>
                    <ul class="colorlib-footer-links">
                        <li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
                        <li><a href="tel://1234567920">+ 1235 2355 98</a></li>
                        <li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
                        <li><a href="#">yoursite.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>

							<span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i
                                        class="icon-heart2" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                                                                          target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                        <span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a
                                    href="http://pexels.com/" target="_blank">Pexels.com</a></span>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>


<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>
<!-- Owl carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<!-- Date Picker -->
<script src="js/bootstrap-datepicker.js"></script>
<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>

</body>
</html>


