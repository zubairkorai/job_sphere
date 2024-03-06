<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Job Sphere</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
    <style>
    /*
 * Globals
 */

    /* Links */
    a,
    a:focus,
    a:hover {
        color: #fff;
    }

    /* Custom default button */
    .btn-secondary,
    .btn-secondary:hover,
    .btn-secondary:focus {
        color: #333;
        text-shadow: none;
        /* Prevent inheritance from `body` */
        background-color: #fff;
        border: .05rem solid #fff;
    }


    /*
 * Base structure
 */

    html,
    body {
        height: 100%;
        background-color: #333;
    }

    body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-pack: center;
        -webkit-box-pack: center;
        justify-content: center;
        color: #fff;
        text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
        box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
    }

    .cover-container {
        max-width: 42em;
    }


    /*
 * Header
 */
    .masthead {
        margin-bottom: 2rem;
    }

    .masthead-brand {
        margin-bottom: 0;
    }

    .nav-masthead .nav-link {
        padding: .25rem 0;
        font-weight: 700;
        color: rgba(255, 255, 255, .5);
        background-color: transparent;
        border-bottom: .25rem solid transparent;
    }

    .nav-masthead .nav-link:hover,
    .nav-masthead .nav-link:focus {
        border-bottom-color: rgba(255, 255, 255, .25);
    }

    .nav-masthead .nav-link+.nav-link {
        margin-left: 1rem;
    }

    .nav-masthead .active {
        color: #fff;
        border-bottom-color: #fff;
    }

    @media (min-width: 48em) {
        .masthead-brand {
            float: left;
        }

        .nav-masthead {
            float: right;
        }
    }


    /*
 * Cover
 */
    .cover {
        padding: 0 1.5rem;
    }

    .cover .btn-lg {
        padding: .75rem 1.25rem;
        font-weight: 700;
    }


    /*
 * Footer
 */
    .mastfoot {
        color: rgba(255, 255, 255, .5);
    }
    </style>
</head>

<body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <main role="main" class="inner cover">
            <?php 
    include('connection/db.php');
    if(isset($_POST['submit'])) {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $dob = $_POST['dob'];
        $file = $_FILES['file']['name'];
        $number = $_POST['mobile_number'];
        
        $tmp_name = $_FILES['file']['tmp_name'];
        $id_job = $_POST['id_job'];
        $job_seeker = $_POST['job_seeker'];

        move_uploaded_file($_FILES["file"]["tmp_name"], `/files`.$file);

        $sql = mysqli_query($conn, "select * from job_apply where job_seeker = '$job_seeker' and id_job = '$id_job'");
        if(mysqli_num_rows($sql)>0) {
            echo "<h1>Already applied!!</h1>";
        } else {

            $target_dir = "files/";
            $target_file = $target_dir . basename($_FILES["file"]["tmp_name"]);

            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            $query = mysqli_query($conn, "insert into job_apply(first_name, last_name, dob, file, id_job, job_seeker, mobile_number)
            values('$first_name','$last_name','$dob','$file', '$id_job', '$job_seeker', '$number')");
            if($query) { ?>
            <p class="lead">Your form successfully submited!</p>
            <p class="lead">
                <a href="https://localhost/job_sphere" class="btn btn-lg btn-secondary">Go Back</a>
            </p>
            <?php } else {
                echo "Something is wrong!";
            }
        }
    }
?>

        </main>
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
</body>

</html>