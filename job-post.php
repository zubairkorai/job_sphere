<?php session_start(); ?>
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
    <form class="form-signin" method="post" action="job-post.php">
        <img class="mb-4" src="img/logo.png" alt="" width="150" height="150">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required
            autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>
        <input class="btn btn-primary btn-block" type="submit" name="submit" placeholder="Sign in"><br>
        <label for="">Don't have an account?</label><a href="sign_up.php"> Create a account</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2024-2026</p>
    </form>
</body>

</html>

<?php

  include('connection/db.php');
  if(isset($_POST['submit'])) {
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $query=mysqli_query($conn, "select * from job_seeker where email='$email' and password='$pass'");
    
    if($query) {
    
      if(mysqli_num_rows($query)>0) {
        $_SESSION['email']= $email;
        header('location:index.php');
      }else {
        echo "<script>alert('Emair or Password is incorrect, Try again')</script>";
      }
    }
  }

?>