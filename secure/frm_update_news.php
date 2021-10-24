<?php   
        include 'session.php' ;  
        include 'connectdb.php' ; 
        $news_id = $_GET['id']; // รับค่ามาจากหน้า main เพื่อ ใช้เลือกว่า จะ แก้ไข เลขไหน
        // ดึงข้อมูลในตารางที่เก็บไว้ออกมา 
        $sql = "SELECT * FROM tbnews WHERE news_id='$news_id'" ;
        $res_news = mysqli_query($dbcon,$sql); 
        $row_news = mysqli_fetch_assoc($res_news);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
    <style>
        label{
            display :block ; 
        }
    </style>
   <script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
   
            <h1>แก้ไข รายละเอียดข่าว <?php echo $news_id; //โชว์ เลขข่าว  ?></h1>
            <!-- ฟอร์ม -->
            <form id="form1" action="update_news.php" method="post" enctype="multipart/form-data"> 
                <label for="newstype">เลือกประเภทข่าว</label>
                <select name="newstype">
                    <?php
                    
                        $sqlnews_type = "SELECT * FROM tbnewstype"; 
                        $res_newstype =mysqli_query($dbcon,$sqlnews_type);
                        while($row_newstype = mysqli_fetch_assoc($res_newstype)){
                            // โชว์ หัวข้อชื่อเรื่องข่าว 
                            if($rpws_newstype['newstype_detail'] == $row_news['newstype_id']){
                                echo  '<option value="'.$row_newstype['newstype_id'].'" selected>'.$row_newstype['newstype_detail'].'</option>' ;
                            }

                       echo  '<option value="'.$row_newstype['newstype_id'].'">'.$row_newstype['newstype_detail'].'</option>' ;
                        }
                    ?>
                   
                </select><br>
                <label for="news_topic">หัวข้อข่าว </label>
                <input type="text"  name="news_topic" value="<?php echo $row_news['news_topic'] ; ?>" require size="20px">  
                <label for="news_detail">เนื้อหาข่าว</label>
                <textarea name="news_detail" id="news_detail" rows="10" cols="80"> 
                <?php echo $row_news['news_detail'] ; ?>
                </textarea>
                    <script>
                         CKEDITOR.replace('news_detail' , {
                                language: 'th',
                                uiColor: '#9AB8F3',
                                width : 550
                    });
                    </script><br>
                <img src="../news_image/<?php echo $row_news['news_filename']; ?>"width="100px" hight="100px">    <!-- รูปแสดงว่าเป็นรูปอะไรก่อนจะเปลี่ยน  -->
                <label for="news_filename">ภาพประกอบข่าว </label>
                <!-- เลือกรูปเพื่อเปลี่ยน -->
                <input type="file" name="news_filename">   

                <label for="news_status">สถานะข่าว</label>

            <!-- แสดงสถานะข่าว   -->
                <?php 
                    if ($row_news['news_status'] == 0){
                        echo '<input type="radio" value="0" checked name="news_status"> ข่าวทั่วไป <br>';
                        echo '<input type="radio" value="1" name="news_status"> ข่าวเด่น <br>' ; 

                    }else{
                        echo '<input type="radio" value="0"  name="news_status"> ข่าวทั่วไป <br>';
                        echo '<input type="radio" value="1" checked name="news_status"> ข่าวเด่น <br>' ; 
                    }
                 ?>
    
                <input type="hidden" name="news_id" value="<?php echo $row_news['news_id'];?>" >
                
              <br>
             <input type="submit" value="Save">

            


            </form>
    
</body>
</html>