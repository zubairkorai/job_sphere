<?php 

    include("connection/db.php");
    include("include/header.php");
    include("include/sidebar.php");

    $cat_id = $_GET['edit'];
    $query = mysqli_query($conn, "select * from category where cat_id= '$cat_id'");
    while($row = mysqli_fetch_array($query)) {
        $cat_name = $row['cat_name'];
        $cat_description = $row['cat_description'];
    }


?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="category.php">Category</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Update Category</a></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <a class="btn btn-primary" href="add_customer.php">Add Customer</a> -->
        </div>
    </div>
    <div style="width: 60%; margin-left: 20%; background-color:#F2F4F4;">
        <form action="" method="post" style="margin: 3%; padding: 3%;" name="category_form" id="category_form">
            <div id="msg"></div>

            <div class="form-group">
                <label for="category">Category Name</label>
                <input type="text" name="cat_name" id="cat_name" value="<?php echo $cat_name ?>" class="form-control"
                    placeholder="Enter Category Name">
            </div>

            <div class="form-group">
                <label for="Description">Description</label>
                <textarea name="cat_description" id="cat_description" value="<?php echo $cat_description ?>"
                    class="form-control" cols="30" rows="10"></textarea>
            </div>

            <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $_GET['edit']; ?>">

            <div class="form-group">
                <input type="submit" class="btn btn-block btn-success" placeholder="Update" name="submit" id="submit">
            </div>

        </form>
    </div>

    <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

</main>
</div>
</div>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script>
window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
feather.replace()
</script>
<!-- Datatables plugin-->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script>
// $document.ready(function() {
// $('#example').DataTable();
// })
new DataTable('#example');
</script>
</body>

</html>

<?php 

    include("connection/db.php");
    if(isset($_POST['submit'])){
        $cat_id = $_POST['cat_id'];
        $cat_name = $_POST['cat_name'];
        $cat_description = $_POST['cat_description'];

        $query = mysqli_query($conn, "update category set cat_name='$cat_name', cat_description='$cat_description' where cat_id='$cat_id'");
        if($query) {
            echo "<script>alert('Record has been Updated successfully!!!')</script>";
            header("location:category.php");
        } else {
            echo "<script>alert('Try Again!!!')</script>";
        }
    }
    
?>