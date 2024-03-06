<?php 

    include("connection/db.php");
    include("include/header.php");
    include("include/sidebar.php");

    $company_id = $_GET['edit'];
    $query = mysqli_query($conn, "select * from company where company_id= '$company_id'");
    while($row = mysqli_fetch_array($query)) {
        $company = $row['company'];
        $des = $row['des'];
        $admin = $row['admin'];
    }

    include("connection/db.php");
    $query = mysqli_query($conn, "select * from admin_login where admin_type='2'");

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="create_company.php">Company</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Update Company</a></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Company</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <a class="btn btn-primary" href="add_customer.php">Add Customer</a> -->
        </div>
    </div>
    <div style="width: 60%; margin-left: 20%; background-color:#F2F4F4;">
        <form action="" method="post" style="margin: 3%; padding: 3%;" name="company_form" id="company_form">
            <div id="msg"></div>

            <div class="form-group">
                <label for="Company">Company Name</label>
                <input type="text" name="company" id="company" value="<?php echo $company ?>" class="form-control"
                    placeholder="Enter Customer Name">
            </div>

            <div class="form-group">
                <label for="Description">Description</label>
                <textarea name="des" id="des" value="<?php echo $des ?>" class="form-control" cols="30"
                    rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="admin">Select Admin</label>
                <select name="admin" class="form-control" id="admin">
                    <?php 
                                while($row = mysqli_fetch_array($query)) { ?>
                    <option value="<?=$row['admin_email']; ?>"><?=$row['admin_email']; ?></option>
                    <?php
                                 }
                            ?>
                </select>
            </div>

            <input type="hidden" name="company_id" id="company_id" value="<?php echo $_GET['edit']; ?>">

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
        $company_id = $_POST['company_id'];
        $company = $_POST['company'];
        $des = $_POST['des'];
        $admin = $_POST['admin'];

        $query = mysqli_query($conn, "update company set company='$company', des='$des', admin='$admin' where company_id='$company_id'");
        if($query) {
            echo "<script>alert('Record has been Updated successfully!!!')</script>";
            header("location:create_company.php");
        } else {
            echo "<script>alert('Try Again!!!')</script>";
        }
    }
    
?>