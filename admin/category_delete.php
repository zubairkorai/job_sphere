<?php 

    include("connection/db.php");
    $del = $_GET['del'];

    $query = mysqli_query($conn, "delete from category where cat_id = '$del'");
    if($query) {
        echo "<script>alert('Record has been deleted successfully!!!')</script>";
        header("location:category.php");
    }else{
        echo "<script>alert('Failed to delete record!!!')</script>";
        header("location:category.php");
    }
?>