

<?php

$db = mysqli_connect("localhost", "root", "") or die("Error connect!");
mysqli_select_db($db,"lang_db") or die("Error Select db!"); 
mysqli_query("SET NAMES 'UTF8'");

include('define_lang.php');
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>language</title>
        <meta http-equiv="content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div style="width:600px; margin:0 auto; height:400px; background-color:#CC;">
            <a href="switch_lang.php?lang=1">Amharic</a> | <a href="switch_lang.php?lang=2">English</a>
            <div style="widht:500px; padding: 5px;">
                <?php echo _t_home;?> | <?php echo _t_product;?> | <?php echo _t_contact;?> | 
                <?php echo _t_register; ?>
                <hr/>
                <?php
                $select = mysqli_query("select * from tblang");
                $numrow = mysqli_num_rows($select);
                if($numrow > 0){
                    //$row = mysqli_fetch_object($select);
                    while ($row = mysqli_fetch_object($select)){
                        if($_SESSION['lang'] == 1){
                        $how = $row ->am;
                        }
                        else if($_SESSION['lang'] == 2){
                            $how = $row ->en;
                        }
                        echo $how. '<br>';
                    }
                    
                }
                
                ?>
                
            </div>
        </div>
    </body>
</html>
