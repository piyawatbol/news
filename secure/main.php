<?php
     include 'session.php' ;  
     require 'connectdb.php' ;                                                                                             //asc จากมากไปหาน้อย
     $sql = "SELECT * FROM tbnews INNER JOIN tbnewstype ON tbnews.newstype_id=tbnewstype.newstype_id ORDER BY news_id "; // desc จากน้อยไปหามาก
     $res_news = mysqli_query($dbcon,$sql); 
?>                                                                                                                           
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome admin</title>
    <link href="../lightbox/css/lightbox.min.css" rel="stylesheet">
</head>
<body>
    <h1>ยินดีต้อนรับ</h1>
    <!-- โชว์ ชื่อ กับ อีเมล ที่ล็อกอิน  -->
    <p>คุณ <?php echo $s_login_username ?> อีเมล <?php echo $s_login_email ?></p> 
    <hr>
    <p>
        <a href="frm_news.php">เพิ่มข่าว</a>
    </p><br>
    <table border="1px">
        <tr>
            <td>รหัสข่าว</td>
            <td>หัวข้อข่าว</td>
            <td>สถานะข่าว</td>
            <td>วันที่ประกาศ</td>
            <td>ไฟล์แนบ</td>
            <td>ประเภทข่าว</td>  
            <td>แก้ไข</td>
            <td>ลบข่าว</td>         
        </tr>
         <?php 
            while($row_news = mysqli_fetch_assoc($res_news)) { // วนลูปข้อมูล ใน database ออกมาเป็นตาราง 
         ?>   
        <tr>
            <td><?php echo $row_news['news_id'] ;// รหัสข่าว ?></td>  
            <td><?php echo $row_news['news_topic'] ;// หัวข้อข่าว ?></td>
             <td>   <?php
                    // สถานะข่าว
                    if ($row_news['news_status'] == 0 ){
                        echo "ข่าวปกติ";
                    }else{
                        echo "ข่าวเด่น";
                    }
                ?></td>
            <td><?php echo $row_news['news_date'] ; ?></td>
            <td>   <!-- โชว์รูปภาพ -->
            <a data-lightbox="<?php echo $row_news['news_filename'] ; ?>" data-title="<?php echo $row_news['news_filename'] ; ?>" href="../news_image/<?php echo $row_news['news_filename'] ; ?>"><?php echo $row_news['news_filename'] ; ?></a>
            </td>

            <td><?php echo $row_news['newstype_detail'] ; // ประเภทข่าว ?></td>   
            <td><a href="frm_update_news.php?id=<?=$row_news['news_id']; ?>">แก้ไข</a></td>              
            <!-- ส่งค่า id ไปหน้า delete -->
            <td><a href="delete_news.php?id=<?=$row_news ['news_id'];?>"onclick="return confirm('ต้องการลบใช่หรือไม่');">Delete</a></td> 
        </tr>
        <?php }?>
    </table><br>
    <a href="logout.php">ออกจากระบบ</a>
    <script src="../js/jquery.js"></script>
    <script src="../lightbox/js/lightbox.min.js"></script>
</body>
</html>   