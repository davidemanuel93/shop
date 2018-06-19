<?php
/**
 * First page
 *
 * PHP version 5
 *
 * @category PHP
 * @package  Shop
 * @author   Emi
 * @license  Emi
 * @version  GIT:
 * @link     http://localhost/Shop/index.php
 */
include_once 'header.php';
?>
<section class="main-container">
    <div class="main-wrapper">
        <?php
        if (isset($_SESSION['u_id'])){

//            if(isset($_POST['home'])){
                
                require "administrare/show_products.php";
//            }

//            if(isset($_POST['admin'])){
                
//                require "administrare/administrare.php";
//            }
            
//            if(isset($_POST['cart'])){
//                require "cart/cart.php";
//            }
        }
        ?>
    </div>
</section>
<?php
include_once 'footer.php';
?>

