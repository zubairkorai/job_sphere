<?php

    include('connection/db.php');

    $company= $_POST['company'];
    $des= $_POST['des'];
    $admin= $_POST['admin'];

    $query = mysqli_query($conn, "insert into company(company, des, admin)values('$company', '$des', '$admin')");

    if($query) {
        echo "Data hasbeen successfully inserted";
    } else {
        echo "Error, Try again";
    }
    
?>