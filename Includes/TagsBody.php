<?php

if (isset($_GET['Tag'])) {
    $TagID = $_GET['Tag'];
} else {
    header("Location: index.php");
}

?>

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
                            <li class="active">Tag / <?php TagByID($TagID); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb -->


        <!-- <div class="container"> -->
        <!-- Grid -->
        <div class="w3-row">

            <!-- Blog entries -->
            <div class="w3-col l8 s12">
                <!-- Blog entry -->
                <?php DisplayPostsTag($TagID); ?>
                <!-- END BLOG ENTRIES -->
            </div>

            <!-- Introduction menu -->
            <div class="w3-col l4">

                <!-- Posts -->
                <div class="w3-card w3-margin">
                    <div class="w3-container w3-padding">
                        <h4>Popular Posts</h4>
                    </div>
                    <ul class="w3-ul w3-hoverable w3-white">
                        <?php PopularPosts(); ?>
                    </ul>
                </div>
                <hr>

                <!-- Labels / tags -->
                <div class="w3-card w3-margin">
                    <div class="w3-container w3-padding">
                        <h4>Tags</h4>
                    </div>
                    <div class="w3-container w3-white">
                        <p><?php Tags(); ?></p>
                    </div>
                </div>

                <!-- END Introduction Menu -->
            </div>

            <!-- END GRID -->
        </div>
        <!-- </div> -->


    </div><!-- /.page-wrapper -->