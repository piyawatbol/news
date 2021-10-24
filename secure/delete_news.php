<?php
    require 'connectdb.php';
    
    $news_id = $_GET['id']; // รับค่า get id มาจากหน้า main ตรงกด delete 
    // ลบรูปออกจาก database 
    $sql_select = "SELECT news_filename FROM tbnews  WHERE news_id='$news_id'"; 
    $res_select = mysqli_query($dbcon, $sql_select);
    $news_image = mysqli_fetch_row($res_select) ;
    $filename = $news_image[0];
    
    unlink('../news_image/'.$filename); // ลบรูปออกจากโฟลเดอร์ 
    
    // ลบข้อมูลออกจาก database 
    $sql  = "DELETE FROM tbnews WHERE news_id='$news_id'";
    $result = mysqli_query($dbcon, $sql);
    if($result) {
        header("Location: main.php");   
    }else{
        echo "เกิดข้อผิดพลาด" . mysqli_error($dbcon);
    }
    mysqli_close($dbcon); // ปิด database 