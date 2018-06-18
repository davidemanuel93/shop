<?php

function insert_product($conn, $name, $category, $description, $price) {
    $name = mysqli_real_escape_string($conn, $name);
    $category = mysqli_real_escape_string($conn, $category);
    $description = mysqli_real_escape_string($conn, $description);
    $price = mysqli_real_escape_string($conn, $price);

    $insert_q = "INSERT INTO products (name, category, description, price)
             VALUES ('$name','$category', '$description', '$price')";
    mysqli_query($conn, $insert_q);
}

function update_products($conn, $product_id, $name, $category, $description, $price) {
    $product_id  = mysqli_real_escape_string($conn, $product_id);
    $name        = mysqli_real_escape_string($conn, $name);
    $category    = mysqli_real_escape_string($conn, $category);
    $description = mysqli_real_escape_string($conn, $description);
    $price       = mysqli_real_escape_string($conn, $price);

    $actualizeaza_q = "UPDATE products set name = '$name', category = '$category', 
                       description = '$description', price = '$price'  
                       where id_product = $product_id";
    mysqli_query($conn, $actualizeaza_q);
}