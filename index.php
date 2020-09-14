<?php
require('functions.php'); 
authenticate();
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
    <title>Assignment - Dashboard</title>
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
                                    <h2 class="pageheader-title">Dashboard </h2>
                                 </div>
                            </div>
                        </div>

                        <div class="row">
                           

                            <?php
                                $QUERY = "SELECT * FROM ARTICLES";
                                $RESULT = Query($QUERY);

                                while($ARTICLE = mysqli_fetch_assoc($RESULT)){
                                 
                               echo '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">'.$ARTICLE["TITLE"].'</h3>
                                        <p class="card-text">'.substr($ARTICLE["CONTENT"],0,86).' ...</p>
                                        <a href="view_article.php?id='.$ARTICLE["ARTICLE_ID"].'" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>';

                                }

                            ?>
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