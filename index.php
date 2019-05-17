<?php
/**
 * Created by PhpStorm.
 * User: Nirash
 * Date: 1/15/2019
 * Time: 7:49 PM
 */


include_once "require/require_include.php";
include_once "classes/classes_include.php";
?>

<?php
$i = 0;
function getAll()
{
   for($i=0; $i<=10; $i++){


     echo " <h1>Helllo</h1>";
   }

}
?>


<html>
<head>

</head>
<body>

<?php

//$page_no = 0;
//$page_no_multiplied =0;
//if (isset($_GET['page']) && $_GET['page'] != "") {
//    $page_no = $_GET['page'];

//}
$products = getAll();

foreach ($products as $product) {


?>



<?php } ?>
</body>
</html>

