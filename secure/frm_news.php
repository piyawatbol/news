<?php
        include 'connectdb.php' ; // เชื่อม database 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News</title>
    <style> 
        label{
            display :block ; 
        }
    </style>
   <script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
   <h1>Add News</h1>  
    <!--ฟอร์ม-->
    <form id="form1" action="insert_news.php" method="post" enctype="multipart/form-data"> 
        <label for="newstype">เลือกประเภทข่าว</label>
        <!-- เมนูเลือก -->
        <select name="newstype"> 
            <option value="">-- กรูณาเลือกประเภทข่าว --</option> <!--หัวข้อ-->
            <?php
                $sqlnews_type = "SELECT * FROM tbnewstype"; 
                $res_newstype =mysqli_query($dbcon,$sqlnews_type);
                // วนลูปหัวข้อข่าว
                while($row_newstype = mysqli_fetch_assoc($res_newstype)){
                echo  '<option value="'.$row_newstype['newstype_id'].'">'.$row_newstype['newstype_detail'].'</option>' ;
                }
            ?>         
        </select><br>
        <label for="news_topic">หัวข้อข่าว </label>
        <input type="text"  name="news_topic" require>  
        <label for="news_detail">เนื้อหาข่าว</label>
        <!-- ckeditor --> 
        <textarea name="news_detail" id="news_detail" rows="10" cols="80"> 
        </textarea>
            <script>
                    CKEDITOR.replace('news_detail' , {
                        language: 'th',
                        uiColor: '#9AB8F3',
                        width : 550
            });
            </script>
        <label for="news_filename">ภาพประกอบข่าว </label>
        <input type="file" name="news_filename">
        <label for="news_status">สถานะข่าว</label>
            <!-- ปุ่ม ติกเลือก -->
        <input type="radio" value="0" checked name="news_status"> ข่าวทั่วไป <br>
        <input type="radio" value="1" name="news_status"> ข่าวเด่น <br>

        <input type="submit" value="Save">

    


    </form>
    
</body>
</html>