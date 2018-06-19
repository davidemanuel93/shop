<?php
include '../db_connection/db_connection.php';
include_once '../administrare/actions.php';
include_once '../header.php';
$conn = connect_db();
echo '';
$chart_q  = "SELECT p.* from products as p "
           . "inner join cart as c on c.product_id = p.id_product";
$chart_r  = mysqli_query($conn, $chart_q);
$chart_nr = mysqli_num_rows($chart_r);

echo "<table id='cart'>
        <caption>Cart</caption>
        <tr>
        <th>Product</th>
        <th>Category</th>
        <th>Description</th>
        <th>Price</th>
        <th>Action</th>
        </tr>";
if ($chart_nr > 0) {
while($row = mysqli_fetch_assoc($chart_r)){
    echo "<tr><form action='' method='POST'>
            <td class='left vertical_middle'>".$row['name']."</td>
            <td class='left vertical_middle'>".$row['category']."</td>
            <td class='center'><textarea rows='3' cols='25'>".$row['description']."</textarea></td>
            <td class='right vertical_middle'>".$row['price']."</td>
            <td class='center vertical_middle'>
            <input type='hidden' name='id_product' value='".$row['id_product']."'>
            <button type='submit' class='btn' style='width: 54px; height: 50px;' name='delete' value='".$row['id_product']."'>Delete from cart</button></td>
            </form></tr>";
}
    if(isset($_POST['delete'])){
//        $product_id = $_POST['id_product'];
//
//        $cart_insert_q = "DELETE from cart where product_id = $product_id";
//        mysqli_query($conn, $cart_insert_q);
        delete_from_cart($conn, $_POST['id_product']);
    }
echo "</table>";
} else {
    echo 'nu sunt produse';
}
include_once '../footer.php';

?>

