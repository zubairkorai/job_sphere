<?php

    include('connection/db.php');

    $email= $_POST['admin_email'];
    $password= $_POST['admin_password'];
    $username= $_POST['admin_username'];
    $firstname= $_POST['first_name'];
    $lastname= $_POST['last_name'];
    $admin_type= $_POST['admin_type'];

    $query = mysqli_query($conn, "insert into admin_login(admin_email, admin_password,  
    admin_username, first_name, last_name, admin_type)values('$email', '$password', '$username', 
    '$firstname', '$lastname', '$admin_type')");

    if($query) {
        echo "<div class='alert alert-success'>Data hasbeen successfully inserted</div>";
    } else {
        echo "<div class='alert alert-danger'>Error, Try again</div>";
    }
    
?>