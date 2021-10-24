<?php
    session_start(); 
    include 'secure/connectdb.php'; // inner join =  การเชื่อม database สองอัน  // oder by = โชว์ข้อมูลตาม id 
    $sql = "SELECT * FROM tbnews INNER JOIN tbnewstype ON tbnews.newstype_id=tbnewstype.newstype_id ORDER BY news_id DESC LIMIT 2"; // desc จากน้อยไปหามาก
    $res_news = mysqli_query($dbcon,$sql); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/jquery.js"></script>
    <script src="js/uikit.min.js"></script>
</head>
<body>
<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
            <?php
                include 'nav.php' ; 
            ?>
   
   <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-3-4"> 
       <?php  // วนลูป แสดง ข้อมูล 
            while($row_news = mysqli_fetch_assoc($res_news)) {
         ?>   
        <article class="uk-article">

            <h1 class="uk-article-title">
                <a href="#"><?php echo $row_news['news_topic'] ; ?></a>
            </h1>

            <p class="uk-article-meta">Written by admin on <?php echo $row_news['news_date'] ; ?>. Posted in <a href="#"><?php echo $row_news['newstype_detail'] ; ?></a></p>

            <p>
                <a href="#"><img class="uk-thumbnail uk-thumbnail-large uk-align-center" src="./news_image/<?php echo $row_news['news_filename'] ; ?>" alt=""></a>
            </p>
            <?php echo $row_news['news_detail'] ; // ข้อมูล ข่าว ?>
        
            </article>
            <?php }?>
        </div>     
            <?php
                include 'right.php' ; // ขวา
            ?>
    </div> <!-- end grid-->
</div>
            <?php
                include 'rs.php'; // responsive 
            ?>

</body>
</html>