<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" action="sign_up.php" method="post">
        <img class="mb-4" src="img/logo.png" alt="" width="150" height="150">
        <h1 class="h3 mb-3 font-weight-normal">Sign up</h1>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required
            autofocus>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" required
            autofocus>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" required
            autofocus>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="date" id="dob" name="dob" class="form-control" placeholder="Date of Birth" required autofocus>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="Number" id="mobile_number" name="mobile_number" class="form-control" placeholder="Mobile number"
            required autofocus>

        <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Sign up"><br>
        <label for="">Already have an account?</label><a href="job-post.php"> Sign in</a>

        <p class="mt-5 mb-3 text-muted">&copy; 2024-2026</p>
    </form>
</body>

</html>

<?php 

    include("connection/db.php");
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $dob = $_POST['dob'];
        $mobile_number = $_POST['mobile_number'];
        $query = mysqli_query($conn, "insert into job_seeker(email, password, first_name, last_name, dob, mobile_number)
        values('$email', '$password', '$first_name', '$last_name', '$dob', '$mobile_number')");

        if($query) {
            echo  "<script>alert('Now you can login!')</script>";
            header("Location: job-post.php");
        } else {
            echo  "<script>alert('Try again!')</script>";
        }
    }

?>