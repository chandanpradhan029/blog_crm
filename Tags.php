<?php

include("Includes/Connection.php");
include("Includes/Functions_Index.php");

//Update Website Stat
$Query = "UPDATE total_visits SET Total_Visits=Total_Visits+1";
$Result = $Connection->query($Query);

if (isset($_GET['PostID'])) {
    $PostID = $_GET['PostID'];
    GetTitle($PostID);
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
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/themify-icons.css" rel="stylesheet" />
    <link href="assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/animate.css" rel="stylesheet" />
    <link href="assets/css/bootsnav.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->
    <link rel="stylesheet" href="./blog_pages/styles.css">
    <link rel="stylesheet" href="assets_blog/style.css">
    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;600;700;800&display=swap"
        rel="stylesheet">

</head>

<body>

    <div class="page-wrapper">
        

        <?php

        include("header.php");
        include("Includes/TagsBody.php");
        include("footer.php");

        ?>



        <script src="./blog_pages/script-log.js"></script>
        <!-- jQuery Frameworks
    ============================================= -->
        <script src="assets/js/jquery-1.12.4.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.appear.js"></script>
        <script src="assets/js/jquery.easing.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/modernizr.custom.13711.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/count-to.js"></script>
        <script src="assets/js/jquery.nice-select.min.js"></script>
        <script src="assets/js/bootsnav.js"></script>
        <script src="assets/js/main.js"></script>
</body>

</html>