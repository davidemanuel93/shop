<?php
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

