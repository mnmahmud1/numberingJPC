<?php

require "koneksi.php";
date_default_timezone_set("Asia/Bangkok");

$dateTime = date('Y-m-d H:i:s');
$userCreated = $_COOKIE["_beta_log"];


if (isset($_GET["logout"])) {
    unset($_COOKIE['_beta_log']); 
    setcookie('_beta_log', '', -1, '/'); 
    unset($_COOKIE['_name_log']); 
    setcookie('_name_log', '', -1, '/'); 

    header("Location: login.php");
}