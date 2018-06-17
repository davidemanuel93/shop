<?php

$adauga_q = "INSERT INTO products (name, category, description, price)
             VALUES ('$name','$category', '$description', '$price')";
mysqli_query($conn, $adauga_q);

