<?php
include 'db_connection/db_connection.php';
include_once 'header.php';
echo '';
$products_q  = "SELECT * from products WHERE id_product not IN (select product_id FROM cart)";
$products_r  = mysqli_query($conn, $products_q);
$products_nr = mysqli_num_rows($products_r);
?>
<table id='table_add_product'>
    <caption>Add Products</caption>
    <tr>
        <th>Product</th>
        <th>Category</th>
        <th>Description</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <tr>
    <form action='index.php' method='POST'>
        <td class='vertical_middle'>
            <input type="text" name='name_product' placeholder="Product name">
        </td>
        <td class='vertical_middle'>
            <input type="text" name='category' placeholder="Category">
        </td>
        <td class='center'>
            <textarea rows='3' cols='25' name='description' placeholder="Description..."></textarea>
        </td>
        <td class='vertical_middle'>
            <input type="number" step="1.00" name='price' placeholder="Price">
        </td>
        <td class='vertical_middle'>
            <button type='submit' class="btn" name='add_product'>Add</button></td>
    </form>
</tr>
</table>

<table id='update_products'>
    <caption>Update products</caption>
    <tr>
        <th>Product</th>
        <th>Category</th>
        <th>Description</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php
    if ($products_nr > 0) {
        while ($row = mysqli_fetch_assoc($products_r)) {
            ?>
            <tr>
            <form action='' method='POST'>
                <td class='left vertical_middle'
                    ><input name="name" placeholder="<?php echo $row['name']; ?>"></td>
                <td class='left vertical_middle'
                    ><input name="category" placeholder="<?php echo $row['category']; ?>"></td>
                <td class='center'><textarea rows='3' cols='25' name="description" placeholder="<?php echo $row['description']; ?>"></textarea></td>
                <td class='right vertical_middle'
                    ><input name="price" placeholder="<?php echo $row['price']; ?>"></td>
                <td class='center vertical_middle'>
                    <input type='hidden' name='id_product' value='<?php echo $row['id_product']; ?>'>
                    <button type='submit'
                            class='btn'
                            style='width: 54px; height: 50px;'
                            name='update'
                            value='<?php echo $row['id_product']; ?>'
                            >Update</button></td>
            </form>
        </tr>

        <?php
        if (isset($_POST['update'])) {
            $id_user     = $_SESSION["u_id"];
            $product_id  = mysqli_real_escape_string($conn, $_POST['id_product']);
            $name        = mysqli_real_escape_string($conn, $_POST['name']);
            $category    = mysqli_real_escape_string($conn, $_POST['category']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $price       = mysqli_real_escape_string($conn, $_POST['price']);

            $actualizeaza_q = "UPDATE products set name = '$name', category = '$category', 
                               description = '$description', price = '$price'  
                               where id_product = $product_id";
            mysqli_query($conn, $actualizeaza_q);
        }
    }
}
echo "</table>";



if (isset($_POST['add_product'])) {

    $name        = mysqli_real_escape_string($_POST['name_product']);
    $category    = mysqli_real_escape_string($_POST['category']);
    $description = mysqli_real_escape_string($_POST['description']);
    $price       = mysqli_real_escape_string($_POST['price']);

    $adauga_q = "INSERT INTO products (name, category, description, price)
                VALUES ('$name','$category', '$description', '$price')";
    mysqli_query($conn, $adauga_q);
}

include_once 'footer.php';
?>        
