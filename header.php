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
        <?php if($_SERVER['REQUEST_URI'] == "/Shop/index.php"){
                    $link_index = 'href="index.php"';
                    $link_admin = 'href="administrare/administrare.php"';
                    $link_cart = 'href="cart/cart.php"';
                    $style = 'href="styles/style.css"';
                } else{
                    $link_index = 'href="../index.php"';
                    $link_admin = 'href="../administrare/administrare.php"';
                    $link_cart = 'href="../cart/cart.php"';
                    $style = 'href="../styles/style.css"';
                }?>
        <link rel="stylesheet" type="text/css" <?php echo $style; ?> >
    </head>
    <body>
        <header>
            <nav>
                <div class="main_wrapper">
                    
                    <?php if(isset($_SESSION['u_id'])){ ?>
                    <form action="index.php" method="POST">
                        <button name="home" style="margin-top: 20px; margin-left: 5px;"
                                class="head_btn"><a <?php echo $link_index; ?>>Home</a></button>
                        <button name="admin"
                            style="margin-top: 20px; margin-left: 5px;"
                            class="head_btn"><a <?php echo $link_admin; ?>>Administrate</a></button>
                        <button name="cart"
                            style="margin-top: 20px; margin-left: 5px;"
                            class="head_btn"><a <?php echo $link_cart; ?>>Cart</a></button>
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

