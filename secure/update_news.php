<?php
    include 'connectdb.php' ; 

    $news_id = $_POST['news_id'] ; 
    $newstype_id = $_POST['newstype'];
    $news_topic = $_POST['news_topic'];
    $news_detail = $_POST['news_detail'];
    $news_status = $_POST['news_status'];

    if (is_uploaded_file($_FILES['news_filename']['tmp_name'])) {
    // ลบรูปเก่า
    $sql_select = "SELECT news_filename FROM tbnews WHERE news_id='$news_id'";
    $result_image = mysqli_query($dbcon,$sql_select) ;
    $row_image = mysqli_fetch_assoc($result_image);
    $image_old = $row_image['news_filename'] ;
    unlink("../news_image/".$image_old);
    //อัปโหลด ไฟล์ 

        $image_ext = pathinfo(basename($_FILES['news_filename']['name']), PATHINFO_EXTENSION);
        $new_image_name = 'news_'.uniqid().".".$image_ext;
        $image_path = "../news_image/";
        $image_upload_path  = $image_path.$new_image_name;
        $success = move_uploaded_file($_FILES['news_filename']['tmp_name'], $image_upload_path);
        $sql_image = "UPDATE tbnews SET news_filename='$new_image_name' WHERE news_id='$news_id'";
        mysqli_query($dbcon,$sql_image);

        if ($success==false){
            echo "ไม่สามารถ upload รูปภาพได้";
            exit();      
        }
    }

     
  
    //update data 
    $sql = "UPDATE tbnews SET news_topic='$news_topic',news_detail='$news_detail',news_status='$news_status',news_date=NOW(),newstype_id='$newstype_id'"; 
    $sql .= " WHERE news_id='$news_id'" ;

    $result = mysqli_query($dbcon,$sql);

    if($result) {
       // echo "บันทึกข้อมูลเรียบร้อย";
       header("location: main.php"); 
    }else{
       echo "เกิดข้อผิดพลาด". mysqli_error($dbcon);
    }
?>