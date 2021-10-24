<?php
    session_start();
    
    if (session_destroy()) {  // ทำลาย session ในการล็อกอิน 
        header("Location: index.php");
    }
    
    
