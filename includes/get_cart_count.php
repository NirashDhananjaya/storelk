<?php
/**
 * Created by PhpStorm.
 * User: Nirash
 * Date: 3/21/2019
 * Time: 8:50 PM
 */

if (isset($_COOKIE["productID"])) {
    $products = unserialize($_COOKIE["productID"], ["allowed_classes" => false]);
    echo count($products);
} else {
    echo "0";
}
?>