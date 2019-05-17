<?php
/**
 * Created by PhpStorm.
 * User: Nirash
 * Date: 1/18/2019
 * Time: 7:57 PM
 */

require_once "require_include.php";


function validateUser($conn, $username, $password)
{
    try {

        $data = [
            'username' => $username,
            'password' => encryptPassword($conn, $username, $password),

        ];
        $sql = "SELECT * FROM user_details WHERE `username`=:username AND password=:password";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
        $data = $stmt->fetchAll();

        return $data;

    } catch (Exception $e) {
        writeLog($e);
    }

}

function getAllCategories($conn)
{
    try {
        $sql = "SELECT * FROM category";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    } catch (Exception $e) {
        writeLog($e);
    }

}

function getSubCategoriesByCategoryID($conn, $sub_category_id)
{
    try {
        $data = [
            'sub_category_id' => $sub_category_id
        ];
        $sql = "SELECT * FROM sub_category WHERE `id_category`=:sub_category_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
        $data = $stmt->fetchAll();

        return $data;

    } catch (Exception $e) {
        writeLog($e);
    }

}

function getAllItemsByOffset($conn, $offset_value)
{
    try {

        $sql = "SELECT * FROM item LEFT OUTER JOIN promotion p ON item.id_promotion = p.id_promotion LIMIT 12 OFFSET " . $offset_value;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;

    } catch (Exception $e) {
        writeLog($e);
    }

}

function validateNotification($notification, $token)
{
    $decoded = base64_decode($notification);
    $sha_encoded = sha1($decoded);

    return ($sha_encoded == $token) ? true : false;
}

function encryptPassword($conn, $username, $plain_text_password)
{
    try {

        $data = [
            'username' => $username
        ];
        $sql = "SELECT salt FROM user_details WHERE `username`=:username";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);

        $data = $stmt->fetchAll();

//        echo $data[0]['salt'];
        return hash("sha256", $plain_text_password . $data[0]['salt']);

    } catch (Exception $e) {
        writeLog($e);
    }
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function setSessionVariables(user $user)
{
    try {

        session_start();
        $_SESSION['username'] = $user->username;
        $_SESSION['id_user'] = $user->id_user_details;
        $_SESSION['id_role'] = $user->id_role;
        $_SESSION['login_token'] = $user->login_token;


    } catch (Exception $e) {
        writeLog($e);
    }
}

function writeLog(exception $exception)
{
    try {
        $myfile = fopen(__DIR__ . "/../logs/" . date("d-m-y") . ".log", "a");
        $string_to_write = "Line: " . $exception->getLine() . "\n" . "Trace: " . $exception->getTraceAsString() . "\nMessage: " . $exception->getMessage() . "\n\n";
        fwrite($myfile, $string_to_write);
        fclose($myfile);
    } catch (exception $ex) {
        echo 'Message: ' . $ex->getMessage();
        die();
//        return;
    }
}

function writeLogBackup($string_to_write)
{
    try {
        $myfile = fopen(__DIR__ . "\logs\"" . date("d-m-y") . ".log", "w");

        fwrite($myfile, $string_to_write);
        fclose($myfile);
    } catch (exception $ex) {
        echo 'Message: ' . $ex->getMessage();
        die();
//        return;
    }
}

function numberOfDecimals($value)
{
    if ((int)$value == $value) {
        return 0;
    } else if (!is_numeric($value)) {
        // throw new Exception('numberOfDecimals: ' . $value . ' is not a number!');
        return false;
    }

    return strlen($value) - strrpos($value, '.') - 1;
}

function selectItemByID($conn, $item_id)
{
    try {

        $data = [
            'item_id' => $item_id,
        ];
        $sql = "SELECT * FROM item LEFT OUTER JOIN promotion p ON item.id_promotion WHERE  id_item=$item_id;";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);

        $data = $stmt->fetchAll();

//        echo $data[0]['salt'];
        return $data;

    } catch (Exception $e) {
        writeLog($e);
    }
}


function insertLoginDetails($conn, $id_user, $login_csrf, $login_token)
{
    $sql = "INSERT INTO `login` (id_user ,logged_in_timestamp ,login_csrf ,login_token) VALUES ($id_user, NOW(),'$login_csrf', '$login_token');";
    $sth = $conn->prepare($sql);
    $sth->execute();
}

function selectCSRF($conn, $loginToken)
{
    try {

        $data = [
            'login_token' => $loginToken
        ];
        $sql = "SELECT login_csrf FROM login WHERE login_token =:login_token;";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);

        $data = $stmt->fetchAll();

        return $data[0]["login_csrf"];

    } catch (Exception $e) {
        writeLog($e);
    }

}

function isTokenValid($conn, $loginToken, $csrf)
{
    try {

        $data = [
            'login_token' => $loginToken,
            'login_csrf' => $csrf,
        ];
        $sql = "SELECT * FROM login WHERE login_token =:login_token AND login_csrf = :login_csrf ;";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);

        $data = $stmt->fetchAll();

        return count($data) > 0 ? true : false;

    } catch (Exception $e) {
        writeLog($e);
    }

}

//echo __DIR__;
//writeLogBackup("helllo");
//echo base64_encode("hello");
//echo validateUser($conn, "testuser1", "pasan123")
?>