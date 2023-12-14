<?php

$base_url = 'http://localhost/simple-store-native/';

$config = []; // set to array

// set array value
$config['db'] = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'database' => 'simple_store_native'
];
$config['app']['name'] = 'Simple Store Native';
$config['app']['url'] = $base_url;

require_once 'class/database.php';

$database = new Database($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['database']);

if (!isset($_SESSION)) session_start(); // check session is initialized or not

function redirect($path = '') {
    global $base_url; // set $base_url in global
    header('Location: ' . $base_url . $path);
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