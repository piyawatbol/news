<?php
    require 'connectdb.php';
    
    $login_username = mysqli_real_escape_string($dbcon,$_POST['username']); // เช็คตัวอักษร พิเศษ 
    $login_password = mysqli_real_escape_string($dbcon,$_POST['password']);
    // เข้ารหัส 
    $salt = 'tikde78uj4ujuhlaoikiksakeidke'; 
    $hash_login_password = hash_hmac('sha256', $login_password, $salt);
    
    $sql = "SELECT * FROM tblogin WHERE login_username=? AND login_password=?";
    $stmt = mysqli_prepare($dbcon, $sql);
    mysqli_stmt_bind_param($stmt,"ss", $login_username,$hash_login_password);
    mysqli_execute($stmt);
    $result_user = mysqli_stmt_get_result($stmt);

    if ($result_user->num_rows == 1) {
        session_start();
        $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
        $_SESSION['login_id'] = $row_user['login_id'];
        if ($row_user['login_status'] == 500){ // ทำการเช็คว่าเป็น admin ไหม
            $_SESSION['is_admin'] = 500;
            header("Location: main.php");
        } else {
            $_SESSION['is_member'] = 0 ; // ทำการเช็คว่าเป็น user ปกติ 
            $_SESSION['login_username'] = $row_user['login_username'];
            header("Location: ../index.php");
        }
        
    } else {
        echo "ผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
    