<?php

session_start();

if(isset($_POST['submit'])){
    include '../db_connection/db_connection.php';
    $conn = connect_db();
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    // Verifica daca sunt campuri necompletate.
    if(empty($uid) || empty($pwd)){
        header("Location: ../index.php?login=empty");
        exit();
    } else {
        $user_q = "SELECT * from users where user_uid = '$uid' or user_email = '$uid'";
        $user_r = mysqli_query($conn, $user_q);
        $user_check = mysqli_num_rows($user_r);
        
        if($user_check < 1) {
            header("Location: ../index.php?login=error_username");
            exit();
        } else {
            if($row = mysqli_fetch_assoc($user_r)){
                /* Decripteaza parola pentru a verifica daca
                 * parola introdusa in input este cea din baza de date.
                 */
                $decript_pwd = password_verify($pwd, $row["user_pwd"]);
//                echo $cript_pwd;
                if($decript_pwd == FALSE){
                    header("Location: index.php?login=error_password");
                    exit();
                } else if($decript_pwd == TRUE){
                    // Logarea utilizatorului.
                    $_SESSION["u_id"]    = $row["user_id"];
                    $_SESSION["u_first"] = $row["user_first"];
                    $_SESSION["u_last"]  = $row["user_last"];
                    $_SESSION["u_email"] = $row["user_email"];
                    $_SESSION["u_uid"]   = $row["user_uid"];
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }
    
} else {
    header("Location: ../index.php?login=error");
    exit();
}
?>
