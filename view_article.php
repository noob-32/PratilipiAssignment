<?php
require('functions.php'); 
authenticate();
$ARTICLE_ID = $_GET['id'];


//Checking if Article really exists.



//Fetching the Article from Database
$QUERY = "SELECT * FROM ARTICLES WHERE ARTICLE_ID = '".$ARTICLE_ID."'";
$ARTICLE = mysqli_fetch_assoc(Query($QUERY));



//Inserting Total Read Count
$QUERY = "INSERT INTO article_user_view(USER_ID,ARTICLE_ID) VALUES('".$_SESSION['USER_ID']."','".$ARTICLE_ID."')";
Query($QUERY);


//Inserting for Live Count
$QUERY = "INSERT INTO live_article_views(ARTICLE_ID) VALUES('".$ARTICLE_ID."')";
Query($QUERY);


?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <title>Assignment - Article View</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       
        <?php include('header.php');?>
      
         <?php include('sidebar.php'); ?>
      
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                      
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">Article View</h2>
                                 </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-section" id="overview">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h2><?php echo $ARTICLE['TITLE']; ?></h2>
                                            <p class="lead">Total Views: <?php echo GetArticleReadCount($ARTICLE_ID); ?>
                                                </p>
                                            <p class="lead">Live Views: <?php echo GetArticleLiveCount($ARTICLE_ID); ?></p>
                                            <p class="content"><?php echo $ARTICLE['CONTENT'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                  
                </div>
            </div>
           
             <?php require('footer.php'); ?>
           
        </div>
    </div>
   
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src='../assets/libs/js/main-js.js'></script>
   
</body>
 
</html>