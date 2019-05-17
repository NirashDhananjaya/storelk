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
    <title>Store Template</title>
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

    <!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
    <link rel="stylesheet" type="text/css" href="css/style_wow.css"/>


</head>

<body>

<div id="page">

    <?php

    if (!isset($_COOKIE["productID"])) {
        header("location:home.php");
        die();
    } else {
        $products = unserialize($_COOKIE["productID"], ["allowed_classes" => false]);

        $productList = "";
//            var_dump($_COOKIE["productID"]);
        foreach ($products as $product) {
//        $productList += $product['itemID'] . ",";
            //echo $product['itemID'] . "<br/>";
            //echo $product['count'] . "<br/>";


        }
        //REMOVE COMMA

        //LOOP DATABASE RESULTS
        //SEARCH ARRAY - array_search

//        die();
        //                            var_dump()}
    }
    ?>

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
                            <li><a href="cart.html"><i class="icon-shopping-cart"></i> Cart [0]</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside id="colorlib-hero" class="breadcrumbs">
        <div class="flexslider">
            <ul class="slides">
                <li style="background-image: url(images/cover-img-1.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h1>Shopping Cart</h1>
                                    <h2 class="bread"><span><a href="index.html">Home</a></span> <span><a
                                                    href="shop.html">Product</a></span> <span>Shopping Cart</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>

    <?php
    $action = isset($_GET['action']) ? $_GET['action'] : "shopping_cart";

    ?>

    <div class="colorlib-shop">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-10 col-md-offset-1">
                    <div class="process-wrap">

                        <div class="process text-center <?php echo $action == "shopping_cart" ? "active" : ""; ?>">
                            <p><span>01</span></p>
                            <h3>Shopping Cart</h3>
                        </div>
                        <div class="process text-center <?php echo $action == "checkout" ? "active" : ""; ?>">
                            <a href="cart.php?action=checkout"><p><span>02</span></p></a>
                            <h3>Checkout</h3>
                        </div>
                        <div class="process text-center <?php echo $action == "oc" ? "active" : ""; ?>">
                            <p><span>03</span></p>
                            <h3>Order Complete</h3>
                        </div>
                    </div>
                </div>
            </div>

            <?php

            if ($action == "shopping_cart") {
                ?>
                <div class="row row-pb-md">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="product-name">
                            <div class="one-forth text-center">
                                <span>Product Details</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Price</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Quantity</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Total</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Remove</span>
                            </div>
                        </div>
                        <?php
                        $total = 0;
                        $total_discount = 0;
                        foreach ($products as $product) {

                            $currentProduct = selectItemByID($conn, $product["itemID"]);
//                        var_dump( $currentProduct[0]["action"]);
//die();
                            if ($currentProduct[0]["action"] != null) {
                                $discount = (double)$currentProduct[0]["action"] * (double)$currentProduct[0]["price"];
                                $total_discount = (double)$total_discount + (double)$discount;
                                $total_price = (double)$currentProduct[0]["price"] - $total_discount;
                            }
                            ?>

                            <div class="product-cart"
                                 id="<?php echo "idProductRow-" . $currentProduct[0]["id_item"] ?>">
                                <div class="one-forth">
                                    <div class="product-img"
                                         style="background-image: url(<?php echo $currentProduct[0]["image_url"]; ?>);">
                                    </div>
                                    <div class="display-tc">
                                        <h3><?php echo $currentProduct[0]["item_title"]; ?></h3> <br/>
                                        <span> <?php echo $currentProduct[0]["action"] != "" ? "Eligible for " .
                                                $currentProduct[0]["promo_text"] : "";
                                            ?></span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span class="price"><?php echo $currentProduct[0]["price"]; ?></span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <input type="text" id="quantity" name="quantity"
                                               class="form-control input-number text-center"
                                               value="<?php echo $product["count"]; ?>" min="1" max="100">
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                    <span class="price"><?php

                                        $subTotal = (int)$product["count"] * (double)$currentProduct[0]["price"];
                                        $total = $total + $subTotal;
                                        echo number_format($subTotal, 2);
                                        ?></span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc"
                                         onclick="removeItem(<?php echo $currentProduct[0]["id_item"]; ?>)">
                                        <b><p class="flaticon-cross" style="cursor: pointer;">x</p></b>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="total-wrap">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="#">
                                        <div class="row form-group">
                                            <div class="col-md-9">
                                                <input type="text" name="quantity" class="form-control input-number"
                                                       placeholder="Your Coupon Number...">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="submit" value="Apply Coupon" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3 col-md-push-1 text-center">

                                    <form id="idShoppingCart" action="cart.php?action=checkout" method="post">
                                        <div class="total">
                                            <div class="sub">
                                                <p><span>Subtotal:</span> <span><?php echo number_format($total, 2);
                                                        ?></span></p>
                                                <p><span>Delivery:</span> <span>$0.00</span></p>
                                                <p><span>Discount:</span>
                                                    <span><?php echo number_format($total_discount, 2);
                                                        ?></span></p>
                                            </div>
                                            <div class="grand-total">
                                                <p><span><strong>Total:</strong></span> <input type="text"
                                                                                               name="totalPayment"
                                                                                               value="<?php
                                                                                               echo
                                                                                               number_format(
                                                                                                   (double)$total - (double)$total_discount, 2)
                                                                                               ?>" readonly="readonly">
                                                </p>
                                            </div>


                                        </div>
                                        <div class="col-md-3">
                                            <input type="submit" value="Confirm Order" class="btn btn-danger">
                                        </div>
                                    </form>

                                    <script>

                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } else if ($action == "checkout") { ?>
                <div class="row row-pb-md">
                    <div class="col-md-10 col-md-offset-1">

                        <?php

                        $csrf = $_POST['loginToken'];
                        $loginToken = $_COOKIE['loginToken'];
                        if (isTokenValid($conn, $loginToken, $csrf)){
                        ?>


                        <h2>Checkout</h2>
                        <?php $a = $_POST['totalPayment']; ?>
                        <h3>Total Payment :<?php echo $a ?> </h3>
                    </div>

                    <div class="col-md-3">
                        <form action="cart.php?action=oc" method="post">
                            <input type="submit" value="Complete Your Order" class="btn btn-danger">


                        </form>
                    </div>
                    <?php } else { ?>
                        <h2>Error</h2>
                    <?php } ?>
                </div>

            <?php } else if ($action == "oc") { ?>

                <div class="row row-pb-md">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="product-name">
                            <div class="one-forth text-center">
                                <span>Product Details</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Price</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Quantity</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Total</span>
                            </div>

                        </div>
                        <?php
                        $total = 0;
                        $total_discount = 0;
                        foreach ($products as $product) {

                            $currentProduct = selectItemByID($conn, $product["itemID"]);
//                        var_dump( $currentProduct[0]["action"]);
//die();
                            if ($currentProduct[0]["action"] != null) {
                                $discount = (double)$currentProduct[0]["action"] * (double)$currentProduct[0]["price"];
                                $total_discount = (double)$total_discount + (double)$discount;
                                $total_price = (double)$currentProduct[0]["price"] - $total_discount;
                            }
                            ?>

                            <div class="product-cart"
                                 id="<?php echo "idProductRow-" . $currentProduct[0]["id_item"] ?>">
                                <div class="one-forth">
                                    <div class="product-img"
                                         style="background-image: url(<?php echo $currentProduct[0]["image_url"]; ?>);">
                                    </div>
                                    <div class="display-tc">
                                        <h3><?php echo $currentProduct[0]["item_title"]; ?></h3> <br/>
                                        <span> <?php echo $currentProduct[0]["action"] != "" ? "Eligible for " .
                                                $currentProduct[0]["promo_text"] : "";
                                            ?></span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span class="price"><?php echo $currentProduct[0]["price"]; ?></span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <input type="text" id="quantity" name="quantity"
                                               class="form-control input-number text-center"
                                               value="<?php echo $product["count"]; ?>" min="1" max="100">
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                    <span class="price"><?php

                                        $subTotal = (int)$product["count"] * (double)$currentProduct[0]["price"];
                                        $total = $total + $subTotal;
                                        echo number_format($subTotal, 2);
                                        ?></span>
                                    </div>
                                </div>

                            </div>

                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="total-wrap">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="#">
                                        <div class="row form-group">
                                            <div class="col-md-9">
                                                <input type="text" name="quantity" class="form-control input-number"
                                                       placeholder="Your Coupon Number...">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="submit" value="Apply Coupon" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3 col-md-push-1 text-center">


                                    <div class="total">
                                        <div class="sub">
                                            <p><span>Subtotal:</span> <span><?php echo number_format($total, 2);
                                                    ?></span></p>
                                            <p><span>Delivery:</span> <span>$0.00</span></p>
                                            <p><span>Discount:</span>
                                                <span><?php echo number_format($total_discount, 2);
                                                    ?></span></p>
                                        </div>
                                        <div class="grand-total">
                                            <p><span><strong>Total:</strong></span> <span><?php
                                                    echo
                                                    number_format(
                                                        (double)$total - (double)$total_discount, 2);
                                                    ?></span>
                                            </p>
                                            <p><span><strong>Status:</strong></span> <span>PAID</span>
                                            </p>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <?php } ?>
        </div>
    </div>

    <div class="colorlib-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                    <h2><span>Recommended Products</span></h2>
                    <p>We love to tell our successful far far away, behind the word mountains, far from the countries
                        Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="product-entry">
                        <div class="product-img" style="background-image: url(images/item-5.jpg);">
                            <p class="tag"><span class="new">New</span></p>
                            <div class="cart">
                                <p>
                                    <span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
                                    <span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
                                    <span><a href="#"><i class="icon-heart3"></i></a></span>
                                    <span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
                                </p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3><a href="shop.html">Floral Dress</a></h3>
                            <p class="price"><span>$300.00</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="product-entry">
                        <div class="product-img" style="background-image: url(images/item-6.jpg);">
                            <p class="tag"><span class="new">New</span></p>
                            <div class="cart">
                                <p>
                                    <span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
                                    <span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
                                    <span><a href="#"><i class="icon-heart3"></i></a></span>
                                    <span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
                                </p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3><a href="shop.html">Floral Dress</a></h3>
                            <p class="price"><span>$300.00</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="product-entry">
                        <div class="product-img" style="background-image: url(images/item-7.jpg);">
                            <p class="tag"><span class="new">New</span></p>
                            <div class="cart">
                                <p>
                                    <span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
                                    <span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
                                    <span><a href="#"><i class="icon-heart3"></i></a></span>
                                    <span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
                                </p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3><a href="shop.html">Floral Dress</a></h3>
                            <p class="price"><span>$300.00</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="product-entry">
                        <div class="product-img" style="background-image: url(images/item-8.jpg);">
                            <p class="tag"><span class="new">New</span></p>
                            <div class="cart">
                                <p>
                                    <span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
                                    <span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
                                    <span><a href="#"><i class="icon-heart3"></i></a></span>
                                    <span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
                                </p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3><a href="shop.html">Floral Dress</a></h3>
                            <p class="price"><span>$300.00</span></p>
                        </div>
                    </div>
                </div>
            </div>
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

<script>
    function removeItem(itemIDString) {
        $.ajax({
            url: "ajax/deleteFromCart.php",
            type: "POST",
            data: {
                productID: itemIDString,
            },
            cache: false,
            async: false,
            beforeSend: function () {
                //$("#overlay").show();
            },
            success: function (data) {
                if (String(data) !== null) {
                    location.reload();
                    // $('#idProductRow-' + itemIDString).fadeOut();
                }
            },
            error: function (data) {
                console.log("error");
            }
        });


    }

    function findGetParameter(parameterName) {
        var result = null,
            tmp = [];
        location.search.substr(1).split("&").forEach(function (item) {
            tmp = item.split("=");
            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
        return result;
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    $(document).ready(function () {
        if (findGetParameter("action") == "shopping_cart") {
            $.ajax({
                url: "ajax/getLoginToken.php",
                type: "POST",
                data: {
                    loginToken: getCookie("loginToken"),
                },
                cache: false,
                async: false,
                beforeSend: function () {
                    //$("#overlay").show();
                },
                success: function (data) {
                    if (String(data) !== null) {
                        $('<input>').attr({
                            type: 'hidden',
                            id: 'idLoginToken',
                            name: 'loginToken',
                            value: String(data)
                        }).appendTo('#idShoppingCart');
                    }
                },
                error: function (data) {
                    console.log("error");
                }
            });
        }

    });
</script>
</body>
</html>