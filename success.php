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
           
         <?php     // รับค่า get มาจากหน้า register 
                   if($_GET['code']==1){ 
                       echo '<div class="uk-alert uk-alert-success"> Register Succes Fully  </div>' ;
                   }
                   if($_GET['code']==2){
                    echo '<div class="uk-alert uk-alert-danger"> Member Only Please Regisger </div>' ;
                }
         
         ?>
        </div> <!-- end grid-->
</div>
<?php  
    include 'rs.php';
?>

</body>
</html>