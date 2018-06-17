<?php

session_start();

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
    </head>
    <body>
        <header>
            <nav>
                <div class="main_wrapper">
                    
                    <?php if(isset($_SESSION['u_id'])){ ?>
                    <form action="index.php" method="POST">
                        <button name="home" style="margin-top: 20px; margin-left: 5px;"
                                class="head_btn">Home</button>
                        <button name="admin"
                            style="margin-top: 20px; margin-left: 5px;"
                            class="head_btn">Administrate</button>
                        <button name="cart"
                            style="margin-top: 20px; margin-left: 5px;"
                            class="head_btn">Cart</button>
                    </form>
                      <?php } ?>
                    <div class="nav-login">
                        <?php
                        if(isset($_SESSION['u_id'])){
                            echo '<form action="includes_login_signup/logout.inc.php" method="POST">
                                    <button type="submit" name="submit">Logout</button>
                                </form>';
                        }else{
                            echo '<form action="includes_login_signup/login.inc.php" method="POST">
                                    <input type="text" name="uid" placeholder="Username/email">
                                    <input type="password" name="pwd" placeholder="password">
                                    <button type="submit" name="submit">Login</button>
                                    <button 
                                    style="margin-left: 5px;"
                                    class="head_btn"
                                    ><a href="signup.php">Sign up</a></button>
                                </form>';
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </header>

