<?php
/**
 * Created by PhpStorm.
 * User: Nirash
 * Date: 5/8/2019
 * Time: 7:50 PM
 */

include_once "../require/require_include.php";
include_once "../classes/classes_include.php";

if (isset($_POST["loginToken"])) {


    $loginToken = $_POST["loginToken"];

    $csrf = selectCSRF($conn, $loginToken);
    echo $csrf;
}
