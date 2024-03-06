<?php 

    include("include/header.php");
    include("include/sidebar.php");

    include('connection/db.php');
    echo $edit = $_GET['edit'];
    $query = mysqli_query($conn, "select * from all_jobs where jobs_id='$edit'");
    while($row = mysqli_fetch_array($query)) {
        $title = $row['job_title'];
        $description = $row['description'];
        $country = $row['country'];
        $state = $row['state'];
        $city = $row['city'];
        $keyword = $row['keyword'];
        $category = $row['category'];
    }

?>
<?php 
    include('connection/db.php');
    $query = mysqli_query($conn, 'select * from category');
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="job_create.php">All Job List</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit Job</a></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit JOB</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <a class="btn btn-primary" href="add_customer.php">Add Customer</a> -->
        </div>
    </div>
    <div style="width: 60%; margin-left: 20%; background-color:#F2F4F4;">
        <form action="" method="post" style="margin: 3%; padding: 3%;" name="job_form" id="job_form">
            <div id="msg"></div>

            <div class="form-group">
                <label for="job title">Job title</label>
                <input type="text" value="<?php echo $title; ?>" name="job_title" id="job_title" class="form-control"
                    placeholder="Enter Job title">
            </div>

            <div class="form-group">
                <label for="description">Enter Description</label>
                <textarea name="description" id="description" class="form-control" cols="30"
                    rows="10"><?php echo "$description"; ?></textarea>
            </div>

            <div class="form-group">
                <label for="keyword">Enter Keyword</label>
                <input type="text" value="<?php echo $keyword; ?>" name="keyword" id="keyword" class="form-control"
                    placeholder="Enter keyword">
            </div>

            <div class="form-group">
                <label for="">Select Category</label>
                <select name="category" class="form-control" id="category">
                    <option value=""><?php echo $category; ?></option>
                    <?php 
                        while($row = mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?=$row['cat_id']; ?>"><?=$row['cat_name']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>

            <input type="hidden" id="id" name="id" value="<?php echo $_GET['edit']; ?>">
            <div class="form-group">
                <label for="Country">Country</label>
                <select name="country" class="form-control country" id="countryId" onchange="loadStates()">
                    <option value=""><?php echo "$country"; ?></option>
                </select>
            </div>

            <div class="form-group">
                <label for="State">State</label>
                <select name="state" class="form-control state" id="stateId" onchange="loadCities()">
                    <option value=""><?php echo "$state"; ?></option>
                </select>
            </div>

            <div class="form-group">
                <label for="State">City</label>
                <select name="city" class="form-control city" id="cityId">
                    <option value=""><?php echo "$city"; ?></option>
                </select>
            </div>
            <script src="countryState.js"></script>

            <div class="form-group">
                <input type="submit" class="btn btn-block btn-success" placeholder="Save" name="submit" id="submit">
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
<script>
$(document).ready(function() {
    $('#submit').click(function() {
        // var job_form = $('#job_form').val();
        // var customer_email = $('#customer_email').val();
        var job_title = $('#job_title').val();
        var description = $('#description').val();
        var countryId = $('#countryId').val();
        var stateId = $('#stateId').val();
        var cityId = $('#cityId').val();
        if (job_title == '') {
            alert("Enter Job Title !!");
            return false;
        }
        if (description == '') {
            alert("Enter Description !!");
            return false;
        }
        if (countryId == '') {
            alert("Select Country !!");
            return false;
        }
        if (stateId == '') {
            alert("Select State !!");
            return false;
        }
        if (cityId == '') {
            alert("Select City !!");
            return false;
        }
        var data = $('#job_form').serialize();
    });
});
</script>
</body>

</html>

<?php 

        include("connection/db.php");

        if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $job_title = $_POST['job_title'];
        $description = $_POST['description'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];

        $query = mysqli_query($conn, "update all_jobs set job_title='$job_title', description='$description', 
        country='$country', state='$state', city='$city'where job_id='$id'");
        if($query) {
            echo "<script>alert('Record has been Updated successfully!!!')</script>";
            header("location:customers.php");
        } else {
            echo "<script>alert('Try Again!!!')</script>";
        }
    }

?>