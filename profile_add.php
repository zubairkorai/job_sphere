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
    session_start();
    include('connection/db.php');

    $img=$_FILES['img']['name'];
    $user_email = $_SESSION['email'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $tmp_name=$_FILES['img']['tmp_name'];
    
    $sql = mysqli_query($conn,"select * from profile where user_email='{$_SESSION['email']}'");

    $sql_check = mysqli_num_rows($sql);
    if(!empty($sql_check)) {
        move_uploaded_file($_FILES['img']['tmp_name'], "profile_img/$img");
        $query = mysqli_query($conn, "update profile set img='$img', name='$name', dob='$dob', number='$number', email='$email' where user_email='$user_email'");
        if($query) {
            echo "<h1>Profile Updated successfully !!</h1>";
        } else {
            echo "<h1>Something is wrong !!</h1>";
        }
    } else {
        move_uploaded_file($_FILES['img']['tmp_name'], "profile_img/$img");
        $query = mysqli_query($conn, "insert into profile(img, name, dob, number, email, user_email)values('$img','$name', '$dob', '$number', '$email', '$user_email')");
        if($query) {
            echo "<h1>Profile added successfully !!</h1>";
        } else {
            echo "<h1>Something is wrong !!</h1>";
        }
    } 
?>

            <p class="lead">
                <a href="https://localhost/job_sphere/profile.php" class="btn btn-lg btn-secondary">Go Back</a>
            </p>

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
