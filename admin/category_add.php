<?php

    include('connection/db.php');

    $cat_name= $_POST['cat_name'];
    $cat_description= $_POST['cat_description'];

    $query = mysqli_query($conn, "insert into category(cat_name, cat_description)values('$cat_name', '$cat_description')");

    if($query) {
        echo "Data hasbeen successfully inserted !!";
    } else {
        echo "Error, Try again !!";
    }
    
?>