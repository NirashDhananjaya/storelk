<?php
/**
 * Created by PhpStorm.
 * User: Nirash
 * Date: 2/14/2019
 * Time: 8:17 PM
 */

if (isset($_POST["productID"])) {

//    unset($_COOKIE['noOfItems']);
//    unset($_COOKIE['productID']);

    $productID = $_POST["productID"];

    if (isset($_COOKIE["productID"])) {
        $productItems = unserialize($_COOKIE["productID"], ["allowed_classes" => false]);
    } else {
        $productItems = array();
        setcookie("productID", serialize($productItems), time() + (86400 * 1), "/"); // 86400 = 1 day
    }

    $productItems = removeElementWithValue($productItems, "itemID", $productID);
//    array_push($productItems, array('itemID' => $productID, 'count' => $productCount));

    setcookie("productID", serialize($productItems), time() + (86400 * 1), "/"); // 86400 = 1 day
    echo count($productItems);
}


function removeElementWithValue($array, $key, $value){
    foreach($array as $subKey => $subArray){
        if($subArray[$key] == $value){
            unset($array[$subKey]);
        }
    }
    return $array;
}

