<?php
    include('include/header.php');
    include('include/h-header.php');
  $id=$_GET['id'];
  $query = mysqli_query($conn, "select * from all_jobs where jobs_id='$id'");
  while($row = mysqli_fetch_array($query)) {
    $title=$row['job_title'];
    $description=$row['$description'];
    $country=$row['country'];
    $state=$row['state'];
    $city=$row['city'];
    $id_job=$row['jobs_id'];
  }
  if(isset($_SESSION['email'])==true) {

  } else {
      header('location:job-post.php');
  }
?>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ftco-animate">
                <h2 class="mb-3">
                    <td><?php echo $title ?></td>
                </h2>
                <h5><?php echo $country; ?>, <?php echo $state; ?>, <?php echo $city; ?></h5>
                <p><?php echo $description; ?></p>

                <form action="apply_job.php" method="post" id="jobPortal" enctype="multipart/form-data"
                    style="border: 1px solid gray">
                    <div style="padding: 2%;">
                        <div class="row">
                            <input type="hidden" name="job_seeker" value="<?php echo $_SESSION['email']; ?>"
                                id="job_seeker">
                            <input type="hidden" name="id_job" value="<?php echo $id_job; ?>" id="id_job">
                            <div class="col-sm-6">
                                <label for="">Enter your First name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Enter your Last name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Enter your Date of birth</label>
                                <input type="date" class="form-control" name="dob" placeholder="Date of Birth">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Enter your contact No.</label>
                                <input type="number" class="form-control" name="mobile_number" id="mobile_number"
                                    placeholder="Mobile No.">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Choose Resume</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" disabled
                                    value="<?php echo $_SESSION['email']; ?>">
                            </div>
                        </div> <br>
                        <input type="submit" class="btn btn-primary btn-block" name="submit" value="submit"
                            placeholder="Submit">
                    </div>
                </form>

                <div class="tagcloud">
                    <a href="#" class="tag-cloud-link">Life</a>
                    <a href="#" class="tag-cloud-link">Sport</a>
                    <a href="#" class="tag-cloud-link">Tech</a>
                    <a href="#" class="tag-cloud-link">Travel</a>
                </div>
            </div>

            <div class="pt-5 mt-5">
                <h3 class="mb-5">6 Comments</h3>
                <ul class="comment-list">
                    <li class="comment">
                        <div class="vcard bio">
                            <img src="images/person_1.jpg" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                            <h3>John Doe</h3>
                            <div class="meta">October 03, 2018 at 2:21pm</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                            <p><a href="#" class="reply">Reply</a></p>
                        </div>
                    </li>

                    <li class="comment">
                        <div class="vcard bio">
                            <img src="images/person_1.jpg" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                            <h3>John Doe</h3>
                            <div class="meta">October 03, 2018 at 2:21pm</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                            <p><a href="#" class="reply">Reply</a></p>
                        </div>

                        <ul class="children">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">October 03, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                        laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe
                                        enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                    </p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>


                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="images/person_1.jpg" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>John Doe</h3>
                                            <div class="meta">October 03, 2018 at 2:21pm</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                                                quidem laborum necessitatibus, ipsam impedit vitae autem, eum
                                                officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                                                impedit necessitatibus, nihil?</p>
                                            <p><a href="#" class="reply">Reply</a></p>
                                        </div>

                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>John Doe</h3>
                                                    <div class="meta">October 03, 2018 at 2:21pm</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Pariatur quidem laborum necessitatibus, ipsam impedit vitae
                                                        autem, eum officia, fugiat saepe enim sapiente iste iure!
                                                        Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                    <p><a href="#" class="reply">Reply</a></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="comment">
                        <div class="vcard bio">
                            <img src="images/person_1.jpg" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                            <h3>John Doe</h3>
                            <div class="meta">October 03, 2018 at 2:21pm</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                            <p><a href="#" class="reply">Reply</a></p>
                        </div>
                    </li>
                </ul>
                <!-- END comment-list -->

                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">Leave a comment</h3>
                    <form action="#" class="p-5 bg-light">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" class="form-control" id="website">
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section> <!-- .section -->

<section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2>Subcribe to our Newsletter</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts. Separated they live in</p>
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

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Employers</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">How it works</a></li>
                        <li><a href="#" class="py-2 d-block">Register</a></li>
                        <li><a href="#" class="py-2 d-block">Post a Job</a></li>
                        <li><a href="#" class="py-2 d-block">Advance Skill Search</a></li>
                        <li><a href="#" class="py-2 d-block">Recruiting Service</a></li>
                        <li><a href="#" class="py-2 d-block">Blog</a></li>
                        <li><a href="#" class="py-2 d-block">Faq</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Workers</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">How it works</a></li>
                        <li><a href="#" class="py-2 d-block">Register</a></li>
                        <li><a href="#" class="py-2 d-block">Post Your Skills</a></li>
                        <li><a href="#" class="py-2 d-block">Job Search</a></li>
                        <li><a href="#" class="py-2 d-block">Emploer Search</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">Sector 34/A Sector 34 A
                                    Gulzar E Hijri Scheme 33, Karachi</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+92 306 8262
                                        280</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span
                                        class="text">info@jobsphere.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                    </script> All rights reserved | <i class="icon-heart text-danger" aria-hidden="true"></i> by <a
                        href="https://colorlib.com" target="_blank"></a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
            stroke="#F96D00" />
    </svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
</script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>

</html>