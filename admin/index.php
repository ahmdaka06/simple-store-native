<?php
require '../connect.php';
// check if hasn't session admin redirect to login
if (!isset($_SESSION['admin'])) {
    redirect('admin/login.php');
}
redirect('admin/dashboard.php');