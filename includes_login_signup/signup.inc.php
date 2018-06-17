<?php

if(isset($_POST['submit'])) {
    
    include_once '../db_connection/db_connection.php';
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last  = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid   = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd   = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    // Handler erori.
    // Verifica daca sunt campuri goale.
    
    if(empty($first)|| empty($last)|| empty($email)||
       empty($uid)|| empty($pwd)){
        
       header("Location: ../signup.php?signup=empty");
       exit();
    } else {
        // Verifica patternurile input-urilor.
        if(!preg_match("/^[a-zA-Z]*$/", $first)|| 
            !preg_match("/^[a-zA-Z]*$/", $last)){
            header("Location: ../signup.php?signup=invalid");
            exit();
        }else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../signup.php?signup=email");
                exit();
            } else{
                $uid_q = "SELECT * from users where user_id = '$uid'";
                $uid_r = mysqli_query($conn, $uid_q);
                $uid_check = mysqli_num_rows($uid_r);
                
                if($uid_check > 0){
                    header("Location: ../signup.php?signup=user_already_exists");
                    exit();
                } else {
                    // Criptare default a parolei.
                    $cript_pwd = password_hash($pwd, PASSWORD_DEFAULT);
                    
                    // Inserare utilizator.
                    
                    $insert_q = "INSERT into users (user_first, user_last,
                                 user_email, user_uid, user_pwd) VALUES ('$first',
                                 '$last', '$email', '$uid', '$cript_pwd')";
                    mysqli_query($conn, $insert_q);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
}else{
    header("Location: ../signup.php");
    exit();
}
