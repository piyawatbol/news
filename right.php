<div class="uk-width-medium-1-4">
        <?php
            if(isset($_SESSION['is_member'])){       
        ?>
    <div class="uk-panel">
        <h3 class="uk-panel-title">Infomation Member</h3>
        <p>
            Welcome <?php echo $_SESSION['login_username']; ?>
        </p> 
    </div>
     <?php } ?> 
     <?php 
        $sql2 = "SELECT * FROM tbnewstype" ;
        $res_newstype = mysqli_query($dbcon,$sql2); 
     ?> 

                    <div class="uk-panel">
                        <h3 class="uk-panel-title">หมดหมู่ข่าว</h3>
                        <ul class="uk-list uk-list-line">
                        <?php 
                            while($row_newstype = mysqli_fetch_assoc($res_newstype)) {
                          ?>   
                          <!-- โชว์ชื่อที่ทำการล็อกอิน  -->
                            <li><a href="news.php?newstype_id=<?php echo $row_newstype['newstype_id'] ; ?>"><?php echo $row_newstype['newstype_detail'] ; ?> </a></li>
                            <?php } ?>
                        </ul>
                    </div>
    </div>