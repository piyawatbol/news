<?php
    include 'secure/connectdb.php';
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
                <p>ต่อต่อเรา</p>
        </div>     
            <?php
                include 'right.php' ;
            ?>
    </div> <!-- end grid-->
</div>
            <?php
                include 'rs.php';
            ?>

</body>
</html>