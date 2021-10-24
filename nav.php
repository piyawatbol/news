<nav class="uk-navbar uk-margin-large-bottom">
                <a class="uk-navbar-brand uk-hidden-small" href="index.php">piyawat</a>
                <ul class="uk-navbar-nav uk-hidden-small">
                    <li class="uk-active">
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="news_all.php">All News</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <?php 
                        // ถ้าเป็น สมาชิกให้ โชว์ แค่ logout 
                        // ถ้าไม่เป็นให้ โชว์ Login กับ regis 
                        if(isset($_SESSION['is_member'])){
                    ?>
                     
                    <li>
                        <a href="logout.php">Logout</a>
                    </li> 
                    <?php } else { ?>
                    <li> 
                        <a href="secure/index.php">Login</a>
                    </li>
                    <li>
                        <a href="frm_register.php">Register</a>
                    </li>
                    <?php } ?>
                </ul>
                <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
                <div class="uk-navbar-brand uk-navbar-center uk-visible-small">piyawt</div>
            </nav>