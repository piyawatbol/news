<?php

include 'connectdb.php';
// รับค่า post มาจากหน้า frm_news
$newstype_id = $_POST['newstype'];
$news_topic = $_POST['news_topic'];
$news_detail = $_POST['news_detail'];
$news_status = $_POST['news_status'];

// insert รูปภาพ 
$image_ext = pathinfo(basename($_FILES['news_filename']['name']),PATHINFO_EXTENSION); 
$new_image_name = 'new_'.uniqid().".".$image_ext; // ชื่อภาพใหม่
$image_path = "../news_image/"; // ที่เก็บของภาพ
$image_upload_path  = $image_path.$new_image_name; // ระบุที่ยุไฟล์ กับ ชื่อใหม่ของภาพ
$success = move_uploaded_file($_FILES['news_filename']['tmp_name'], $image_upload_path);
// เพิ่ม ภาพในไปไปใน database และ โฟลเดอร์ ที่เก็บ
if ($success==false){
    echo "ไม่สามารถ upload รูปภาพได้";
    exit();
}
//insert ข้อมูลไปยัง database 
$sql = "INSERT INTO tbnews (news_topic,news_detail,news_filename,news_status,news_date,newstype_id)";

$sql .= " VALUES ('$news_topic','$news_detail','$new_image_name','$news_status',NOW(),'$newstype_id')";

$result = mysqli_query($dbcon,$sql);

if($result){
   // echo "บันทึกข้อมูลเรียบร้อย";
    header("Location: main.php");
}else{
    echo "เกิดข้อผิดพลาด". mysqli_error($dbcon);
}
