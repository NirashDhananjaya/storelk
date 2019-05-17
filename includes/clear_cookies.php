<?php
/**
 * Created by PhpStorm.
 * User: Nirash
 * Date: 3/21/2019
 * Time: 9:11 PM
 */

//$_COOKIE["productID"] = null;
//unset($_COOKIE["productID"]);
// empty value and expiration one hour before
$res = setcookie("productID", null, time() + (86400 * 1),"/");