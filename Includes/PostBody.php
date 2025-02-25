<?php
// Include the database connection
include("Includes/Connection.php");
date_default_timezone_set("Asia/Karachi");

// Check if the slug exists in the URL
if (isset($_GET['slug'])) {
    $PostSlug = ValidateFormData($_GET['slug']);
    // Fetch the Post ID using the slug
    $Query = "SELECT Post_ID FROM blog_post WHERE Post_Slug = '$PostSlug' LIMIT 1";
    $Result = $Connection->query($Query);

    if ($Result && $Result->num_rows > 0) {
        $Row = $Result->fetch_assoc();
        $PostID = $Row['Post_ID'];
    } else {
        echo "<p>Post not found for slug: $PostSlug</p>";
        header("Location: index.php");
        exit();
    }
} else {
    echo "<p>No slug provided.</p>";
    header("Location: index.php");
    exit();
}

// Update Post Stats
$Query = "SELECT * FROM post_visits WHERE Post_ID = '$PostID'";
$Result = $Connection->query($Query);

if ($Result && $Result->num_rows > 0) {
    $Query = "UPDATE post_visits SET Post_Visits = Post_Visits + 1 WHERE Post_ID = '$PostID'";
    $Connection->query($Query);
} else {
    $Query = "INSERT INTO post_visits(Post_ID, Post_Visits) VALUES($PostID, 1)";
    $Connection->query($Query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sapthagiri Super Speciality Hospitals">

    <!-- ========== Page Title ========== -->
    <title>Sapthagiri Super Speciality Hospitals</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../assets/css/themify-icons.css" rel="stylesheet" />
    <link href="../assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="../assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="../assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="../assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="../assets/css/animate.css" rel="stylesheet" />
    <link href="../assets/css/bootsnav.css" rel="stylesheet" />
    <link href="../style.css" rel="stylesheet">
    <link href="../assets/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->
    <link rel="stylesheet" href="../blog_pages/styles.css">
    <link rel="stylesheet" href="../assets_blog/style.css">

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;600;700;800&display=swap"
        rel="stylesheet">

</head>

<body>
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-sticky bootsnav">

            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav extra-color">
                    <ul>
                        <li class="contact">
                            <i class="fas fa-stethoscope"></i>
                            <p>Emergency <a href="tel: +91 8884439132"><strong>+91 8884439132</strong></p></a>,
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header" style="width: 25%;">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a href="index.php">
                        <img class="logo-lg" src="../assets/img/logo.jpg" class="logo" alt="Logo">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li>
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="../about-us.php">About Us</a>
                        </li>
                        <li>
                            <a href="../department.php">Departments</a>
                        </li>
                        <li>
                            <a href="../doctors.php">Doctors</a>
                        </li>
                        <li>
                            <a href="../blog.php">Blog</a>
                        </li>
                        <li>
                            <a href="../contact.php">Contact</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <div class="page-wrapper">
        <!-- End Page Title -->

        
         <!-- Start Breadcrumb 
    ============================================= -->
        <div class="breadcrumb-area bg-gradient text-center">
            <!-- Fixed BG -->
            <div class="fixed-bg" style="background-image: url(assets/img/shape/9.png);"></div>
            <!-- Fixed BG -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h1>Blog</h1>
                        <ul class="breadcrumb">
                            <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                            <li class="active">Discover Your blogs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <!-- start post-body -->
        <div class="w3-row">
            <div class="w3-container"><?php echo isset($CommentMessage) ? $CommentMessage : ""; ?></div>
            <div class="w3-col l8 s12">
                <!-- Display the post content -->
                <?php DisplayPost($PostID); ?>

                <!-- COMMENTS -->
                <div class="w3-margin">
                    <div class="w3-container">
                        <h4><b>Comments</b></h4>
                        <hr>
                    </div>
                    <form method="post" action="" class="w3-container"
                        style="background-color:aliceblue;padding:30px 10px">
                        <div class="w3-row-padding">
                            <p class="w3-text-red"> <?php echo isset($NameError) ? $NameError : ""; ?></p>
                            <p class="w3-text-red"> <?php echo isset($CommentError) ? $CommentError : ""; ?></p>
                            <div class="w3-quarter">
                                <input name="Name" class="w3-input w3-round" type="text" placeholder="Your Name"
                                    required>
                            </div>
                            <div class="w3-rest">
                                <textarea name="Comment" style="resize: none;" rows="1" class="w3-input w3-round"
                                    placeholder="Your Comment" required></textarea>
                            </div>
                            <input name="PostId" value="<?php echo $PostID ?>" type="hidden">
                            <div style="margin-left:10px;margin-top:20px">
                                <button style="background-color:#001D4C;color:white;padding:15px 40px" name="AddComment"
                                    type="submit" class="w3-button w3-white w3-border"><b>Comment</b></button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <?php DisplayComments($PostID); ?>
                </div>
                <!-- END COMMENTS -->
            </div>

            <!-- Sidebar -->
            <div class="w3-col l4">
                <div class="w3-card w3-margin">
                    <div class="w3-container w3-padding">
                        <h4>Popular Posts</h4>
                    </div>
                    <ul class="w3-ul w3-hoverable w3-white">
                        <?php PopularPosts(); ?>
                    </ul>
                </div>
                <hr>
                <div class="w3-card w3-margin">
                    <div class="w3-container w3-padding">
                        <h4>Tags</h4>
                    </div>
                    <div class="w3-container w3-white">
                        <p><?php Tags(); ?></p>
                    </div>
                </div>
            </div>
            <!-- END Sidebar -->
        </div>
        <!-- end post-body -->


    </div><!-- /.page-wrapper -->
</body>
<footer class="bg-dark text-light">
    <div class="container">
        <div class="f-items default-padding">
            <div class="row">
                <div class="col-lg-4 col-md-6 item">
                    <div class="f-item about">
                        <img style="background-color: aliceblue;width: 200px;" src="../assets/img/logo.jpg" alt="Logo">
                        <p>
                            With over 1,700 beds, a dedicated team of 800+ Doctors and 2700+ highly skilled staff
                            members, and state-of-the-art facilities, Sapthagiri Hospital is your trusted
                            superspecialty healthcare partner.
                        </p>
                        <div class="address">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-email"></i>
                                    </div>
                                    <div class="info">
                                        <h5>Email:</h5>
                                        <a href="mailto:helpdesk@simsrc.edu.in"><a
                                                href="mailto:helpdesk@simsrc.edu.in"><span>helpdesk@simsrc.edu.in</span></a></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-call"></i>
                                    </div>
                                    <div class="info">
                                        <h5>Phone:</h5>
                                        <span>+91 8884439132</span>
                                        <span>+91 9606997351</span><br>
                                        <span>+91 9606997352</span>
                                        <span>+91 9606997353</span><br>
                                        <span>+91 9606997355</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="single-item col-lg-2 col-md-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Department</h4>
                        <ul>
                            <li>
                                <a href="pediatric.php">Pediatrics</a>
                            </li>
                            <li>
                                <a href="general-surgery.php">General Surgery</a>
                            </li>
                            <li>
                                <a href="orthopaedic.php">Orthopaedics</a>
                            </li>
                            <li>
                                <a href="gynecology.php">Obstetrics & Gynecology</a>
                            </li>
                            <li>
                                <a href="general-medicine.php">
                                    General Medicine</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="single-item col-lg-2 col-md-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Usefull Links</h4>
                        <ul>
                            <li>
                                <a href="#">Ambulance</a>
                            </li>
                            <li>
                                <a href="#">Emergency</a>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>
                            <li>
                                <a href="#">Gallery</a>
                            </li>
                            <li>
                                <a href="about-us.php">About Us</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="single-item col-lg-4 col-md-6 item">
                    <div class="f-item branches">
                        <div class="branches">
                            <ul>
                                <li>
                                <li>
                                    <strong>Bengaluru Branch:</strong>
                                    <a href="https://maps.app.goo.gl/AxUfgY1QqHp9DpMk8"><span>Shree Sapthagiri Super
                                            Speciality Hospitals 15, Hesarghatta Rd, Navy Layout, Chikkasandra,
                                            Chikkabanavara, Bengaluru, Karnataka 560090</span></a>
                                </li>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6">
                    <p>Copyright &copy; 2024. Designed by <a href="#">Ikontel Solutions Pvt Ltd</a></p>
                </div>
                <div class="col-lg-6 text-right social">
                    <ul>
                        <li>
                            <a target="_blank" href="https://www.facebook.com/sapthagirihospital"><i
                                    class="fab fa-facebook-f"></i>
                                Facebook</a>
                        </li>
                        <li>
                            <a target="_blank" href="https://x.com/SapthagiriH"><i class="fab fa-twitter"></i>
                                Twitter</a>
                        </li>
                        <li>
                            <a target="_blank" href="https://youtube.com/@sapthagirihospitalblr?si=aX-iQ-40tsGuiOEq"><i
                                    class="fab fa-youtube"></i>
                                Youtube</a>
                        </li>
                        <li>
                            <a target="_blank"
                                href="https://www.instagram.com/sapthagirihospitalofficial/?fbclid=IwZXh0bgNhZW0CMTEAAR1BDvEVyOGewn3p3ZmfKkP14HOR5Tfyrd65_iXNfgwklELDV8VT_-E-UO8_aem_xyI4se_PTVIr_rMvL_1umw"><i
                                    class="fab fa-instagram"></i> Insta</a>
                        </li>
                        <!--<li>-->
                        <!--    <a href="https://www.linkedin.com/company/sapthagiri-super-speciality-hospital/about/"><i-->
                        <!--            class="fab fa-linkedin-in"></i> linkedin</a>-->
                        <!--</li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>


<script src="../blog_pages/script-log.js"></script>
<!-- jequery plugins -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/owl.js"></script>
<script src="../assets/js/wow.js"></script>
<script src="../assets/js/validation.js"></script>
<script src="../assets/js/jquery.fancybox.js"></script>
<script src="../assets/js/appear.js"></script>
<script src="../assets/js/scrollbar.js"></script>
<script src="../assets/js/jquery.nice-select.min.js"></script>
<script src="../assets/js/jquery-ui.js"></script>

<!-- main-js -->
<script src="../assets/js/script.js"></script>
<script>
    // Feedback Notification
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            document.querySelectorAll('.alert').forEach(alert => alert.classList.add("bounceOutUp"));
        }, 3000);

        setTimeout(function () {
            document.querySelectorAll('.alert').forEach(alert => alert.remove());
        }, 4000);
    });
</script>
</body>

</html>