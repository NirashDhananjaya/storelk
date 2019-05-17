<?php
/**
 * Created by PhpStorm.
 * User: Nirash
 * Date: 4/1/2019
 * Time: 9:56 PM
 */

function cURL()
{

    // Create a new cURL resource
    $curl = curl_init();

    if (!$curl) {
        die("Couldn't initialize a cURL handle");
    }

    // Set the file URL to fetch through cURL
    curl_setopt($curl, CURLOPT_URL, "http://data.fixer.io/api/latest?access_key=4e00c77701a2551af2375421b876e8ec&format=1");

    // Set a different user agent string (Googlebot)
    curl_setopt($curl, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');

    // Follow redirects, if any
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

    // Fail the cURL request if response code = 400 (like 404 errors)
    curl_setopt($curl, CURLOPT_FAILONERROR, true);

    // Return the actual result of the curl result instead of success code
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    // Wait for 10 seconds to connect, set 0 to wait indefinitely
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);

    // Execute the cURL request for a maximum of 50 seconds
    curl_setopt($curl, CURLOPT_TIMEOUT, 50);

    // Do not check the SSL certificates
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    // Fetch the URL and save the content in $html variable
    $html = curl_exec($curl);

    // Check if any error has occurred
    if (curl_errno($curl)) {
        echo 'cURL error: ' . curl_error($curl);
    } else {
        // cURL executed successfully
//        print_r(curl_getinfo($curl));
    }

    // close cURL resource to free up system resources
    curl_close($curl);

//    echo $html;

    $arr =  json_decode($html, true);
    echo $arr["rates"]["LKR"];
}

cURL();