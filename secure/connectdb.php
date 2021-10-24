<?php

    $dbcon = mysqli_connect('localhost','root','','news'); 
    
    if (mysqli_connect_error()) {
        echo "ไม่สามารถติดต่อฐานข้อมูล MySQL ได้".  mysqli_connect_error();
        exit;
    }
    mysqli_set_charset($dbcon,'utf8'); // แปลงหน้าเว็บเป็นภาษาไทย 
?>