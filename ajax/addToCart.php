<?php
/**
 * Created by PhpStorm.
 * User: Nirash
 * Date: 2/14/2019
 * Time: 8:17 PM
 */

if (isset($_POST["productID"]) && isset($_POST["productCount"])) {

//    unset($_COOKIE['noOfItems']);
//    unset($_COOKIE['productID']);

    $productID = $_POST["productID"];
    $productCount = $_POST["productCount"];


    if (isset($_COOKIE["productID"]) && in_array($productID, array_column(unserialize($_COOKIE["productID"], ["allowed_classes" => false]), 'itemID'))) {
        //H/W - 21 March 2019
        //item is already in array
        //increase item count
        echo count(unserialize($_COOKIE["productID"], ["allowed_classes" => false]));
        die();
    }

    if (isset($_COOKIE["productID"])) {
        $productItems = unserialize($_COOKIE["productID"], ["allowed_classes" => false]);
    } else {
        $productItems = array();
        setcookie("productID", serialize($productItems), time() + (86400 * 1), "/"); // 86400 = 1 day
    }

//    print_r(array_column($userdb, 'uid'));

    array_push($productItems, array('itemID' => $productID, 'count' => $productCount));

//    if (isset($_COOKIE["noOfItems"])) {
//        $noOfItems = $_COOKIE["noOfItems"];
//    } else {
//        $noOfItems = "0";
//    }

    setcookie("productID", serialize($productItems), time() + (86400 * 1), "/"); // 86400 = 1 day
//    setcookie("noOfItems", (int)$noOfItems + 1, time() + (86400 * 1), "/"); // 86400 = 1 day
//    echo $_COOKIE["noOfItems"];
//    echo print_r(unserialize($_COOKIE["productID"], ["allowed_classes" => false]));
    echo count($productItems);
}
