<?php
/**
 * Created by PhpStorm.
 * User: Nirash
 * Date: 1/18/2019
 * Time: 7:55 PM
 */

include_once "require/require_include.php";
include_once "classes/classes_include.php";
//var_dump($_POST);

$username = $_POST['username'];
$password = $_POST['password'];

try {
//    writeLogBackup($e);
    $return_array = validateUser($conn, $username, $password);

    $is_user_valid = count($return_array);

    if ($is_user_valid >= 1) {
        //Initiate login
        $u = new user();
        $u->setUsername($username);
        $u->setIdRole($return_array[0]['id_role']);
        $u->setIdUserDetails($return_array[0]['id_user_details']);

        $loginToken = time() . "_" . $return_array[0]['id_user_details'];
        $csrf = sha1($loginToken);

//        setcookie("loginToken", $loginToken, time() + (86400 * 1), "/"); // 86400 = 1 day
        setcookie("loginToken", $loginToken, time() + (86400 * 1), "/"); // 86400 = 1 day

        $u->setLoginToken($csrf);

        setSessionVariables($u);
        insertLoginDetails($conn, $return_array[0]['id_user_details'], $csrf, $loginToken);
        //setSessionUserID($row["id_user_details"]);


        $noti = new notification();
        $noti->setNotificationType(NOTIFICATION_TYPE_MESSAGE);
        $noti->setNotificationText($welcome_to_store_lk);

        header("location:home.php" . $noti->getEncodedNotification());
    } else {
        //Redirect

        $noti = new notification();
        $noti->setNotificationType(NOTIFICATION_TYPE_ERROR);
        $noti->setNotificationText($invalid_username_password);

        header("location:login.php" . $noti->getEncodedNotification());

    }

} catch (Exception $e) {
    writeLog($e);
//    echo 'Message: ' . $e->getMessage();

}


?>