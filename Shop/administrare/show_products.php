<?php
include 'db_connection/db_connection.php';
include_once 'header.php';

$products_q  = "SELECT * from products WHERE id_product not IN (select product_id FROM cart)";
$products_r  = mysqli_query($conn, $products_q);
$products_nr = mysqli_num_rows($products_r);
echo "
    <table id='products'>
    <caption>Products</caption>
<tr>
<th>Product</th>
<th>Category</th>
<th>Description</th>
<th>Price</th>
<th>Action</th>
</tr>";
if ($products_nr > 0) {
while($row = mysqli_fetch_assoc($products_r)){
    echo "<tr><form action='index.php' method='POST'>
            <td class='left vertical_middle'>".$row['name']."</td>
            <td class='left vertical_middle'>".$row['category']."</td>
            <td class='center'><textarea rows='3' cols='25'>".$row['description']."</textarea></td>
            <td class='right vertical_middle'>".$row['price']." RON</td>
            <td class='center vertical_middle'>
            <input type='hidden' name='id_product' value='".$row['id_product']."'>
            <button type='submit' class='btn' style='width: 54px; height: 50px;' name='add' value='".$row['id_product']."'>Add to cart</button></td>
            </form></tr>";

}
    if(isset($_POST['id_product']) && isset($_POST['add'])){
        $id_user    = $_SESSION["u_id"];
        $product_id = $_POST['id_product'];

        $cart_insert_q = "INSERT INTO cart (id_user, product_id)
                          VALUES ('$id_user','$product_id')";
        mysqli_query($conn, $cart_insert_q);
    }
echo "</table>";
} else {
    echo 'nu sunt produse';
}
include_once 'footer.php';

?>

