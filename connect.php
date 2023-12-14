<?php
date_default_timezone_set('Asia/Jakarta'); // set default time zone
if (!isset($_SESSION)) session_start(); // check session is initialized or not
$base_url = 'http://localhost/simple-store-native/';

$config = []; // set config to array

// set config array value
$config['db'] = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'database' => 'simple_store_native'
];
$config['app']['name'] = 'Simple Store Native';
$config['app']['url'] = $base_url;
$config['app']['path'] = $_SERVER['DOCUMENT_ROOT'] . '/simple-store-native/'; // set root folder location

$datetime = date('Y-m-d');
$date = date('Y-m-d');
$time = date('H:i:s');

require_once 'class/database.php';

$database = new Database($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['database']);



function redirect($path = '', $time = 0) {
    global $base_url; // set $base_url in global
    print '<meta http-equiv="refresh" content="'.$time.';url=' . $base_url . $path . '" />';
    // header('Location: ' . $base_url . $path);
    exit;
}

function alert($msg = '')
{
    return print "
        <script>
            alert('$msg')
        </script>
    ";
}