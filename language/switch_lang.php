<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

//get current url
$goback = $_SERVER['HTTP_REFERER'];
$lang = $_GET['lang'];
//echo $lang;
$_SESSION['lang'] = $lang;
//echo $goback;

//go to current url
header("location: $goback");

?>
