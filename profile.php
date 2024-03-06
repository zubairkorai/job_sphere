<?php 
include("connection/db.php");
include("include/header.php");
  include("include/my_profile.php");
  $query = mysqli_query($conn, "select * from profile where user_email='$_SESSION[email]'");
while ($row = mysqli_fetch_array($query)) {
    $img =$row['img'];
    $name =$row['name'];
    $dob = $row['dob'];
    $number = $row['number'];
    $email = $row['email'];
}
?>
<br>
<div style="margin-left: 25%; width: 50%; border: 1px solid gray; padding: 10px;"> <br>
    <form action="profile_add.php" method="post" name="profile_form" id="profile_form" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4" style="margin-left: 30%;">
                <img src="profile_img/<?php if(!empty($img)) { echo $img; } else { echo 'profile.jpg'; }?>" alt="profile" class="img-thumbnail rounded-circle">
            </div>
        </div> <br>

        <div>
            <div class="row">
                <div class="col-md-6" style="margin-left: 30%;">
                    <input type="file" name="img" id="img">
                </div>
            </div><br>

            <div class="row">
                <div class="col-md-6">
                    <td>Your Name : </td>
                </div>
                <div class="col-md-6">
                    <td><input type="text" class="form-control" name="name" id="name" value="<?php if(!empty($name)) echo $name; ?>" placeholder="Enter your name">
                    </td>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <td>Your Date of Birth : </td>
                </div>
                <div class="col-md-6">
                    <td><input type="date" class="form-control" name="dob" id="dob" value="<?php if(!empty($dob)) echo $dob; ?>" placeholder="Date of Birth ....">
                    </td>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <td>Your Mobile Number : </td>
                </div>
                <div class="col-md-6">
                    <td><input type="number" class="form-control" name="number" id="number" value="<?php if(!empty($number)) echo $number; ?>"
                            placeholder="Enter your number"></td>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <td>Your Email : </td>
                </div>
                <div class="col-md-6">
                    <td><input type="text" class="form-control" name="email" id="email" value="<?php if(!empty($email)) echo $email; ?>" placeholder="Enter your email">
                    </td>
                </div>
            </div> <br>

            <div class="row">
                <div class="col-md-4" style="margin-left: 28%">
                    <input type="submit" class="btn btn-success form-control" name="submit" id="submit"
                        placeholder="Update" value="Update">
                </div>
            </div>
        </div>
    </form>
</div> <br>

<section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2>Subcribe to our Newsletter</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in</p>
                    <div class="row d-flex justify-content-center mt-4 mb-4">
                        <div class="col-md-8">
                            <form action="#" class="subscribe-form">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control" placeholder="Enter email address">
                                    <input type="submit" value="Subscribe" class="submit px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
  include("include/footer.php");
?>

<script>
$(document).ready(function() {
    $('#submit').click(function() {
        var data = $('#profile_form').serialize();

        $.ajax({
            type: "POST",
            url: "profile_add.php",
            data: data,
            success: function(data) {
                alert(data);
            }
        })
    });
});
</script>