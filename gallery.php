<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<?php 
 include("./data/db/db.php");
?>
<head>
    <title>V & Y | Gallery</title>
    <?php include("./data/head/Head.php"); ?>
</head>
<body>
    <!-- header -->
    <header>
        <?php include("./data/navbar/NavBar.php"); ?>
    </header>
    <!-- banner -->
    <div class="banner-w3ls-2"></div>
    <!-- page details -->
    <div class="breadcrumb-agile">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
        </ol>
    </div>
    <!-- contact -->
    <div class="gallery pt-5">
        <div class="container pt-xl-5 pt-lg-3">
            <h3 class="title-w3 mb-sm-5 mb-4 text-dark text-center font-weight-bold">Gallery</h3>
            <p class="title-para text-center mx-auto mb-sm-5 mb-4">This our Company gallery, here gives a quick review
                of our company.</p>
            <ul class="demo">
                <?php
                    $result = mysqli_query($link, "SELECT * FROM `gallery`");
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <li>
                    <div class="gallery-grid1">
                        <img src='data:image/jpeg;base64,<?php echo base64_encode($row['data']) ?>' alt=" " class="img-fluid" />
                        <div class="p-mask">
                            <h4><?php echo $row['clientName']  ?></h4>
                            <p><?php echo $row['clientCompnay'] ?></p>
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- footer -->
    <?php include("./data/footer/Footer.php") ?>
</body>
</html>