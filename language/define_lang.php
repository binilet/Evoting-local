<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();
    //give session when first load page
    //$_SESSION['lang'] = 1;
    
    if(!isset($_SESSION['lang'])){
        $_SESSION['lang']=1;
    }
    
    if($_SESSION['lang']==1){
        include('lang_am.php');
        
    }
    else if ($_SESSION['lang']==2) {
        include('lang_en.php');
    
    }

?>