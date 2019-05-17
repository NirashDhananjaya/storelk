<?php
/**
 * Created by PhpStorm.
 * User: Nirash
 * Date: 4/1/2019
 * Time: 7:54 PM
 */

$products = unserialize($_COOKIE["productID"], ["allowed_classes" => false]);

var_dump($products);