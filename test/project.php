<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js " lang="en"> <!--<![endif]-->
<head>



<!-- /*projects overlay*/ -->
    <style type="text/css">
.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.proj1:hover .image {
  opacity: 0.3;
}

.proj1:hover .middle {
  opacity: 1;
}

.proj2:hover .image {
  opacity: 0.3;
}

.proj2:hover .middle {
  opacity: 1;
}

.proj3:hover .image {
  opacity: 0.3;
}

.proj3:hover .middle {
  opacity: 1;
}

.proj4:hover .image {
  opacity: 0.3;
}

.proj4:hover .middle {
  opacity: 1;
}

.proj5:hover .image {
  opacity: 0.3;
}

.proj5:hover .middle {
  opacity: 1;
}

.proj6:hover .image {
  opacity: 0.3;
}

.proj6:hover .middle {
  opacity: 1;
}

.text {
  /*background-color: #4CAF50;*/
  color: white;
  font-size: 16px;
  padding: 16px 32px;
  color: #543E17;
}

.text a:hover{
  color: #C7902B;

}
    </style>
<!-- /*projects overlay*/ -->


    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Site Meta -->
    <title>Projects | Great Ocean Lake Development</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <?php include("favicon.php"); ?>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet"> 
    
    <!-- Custom & Default Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="style.css">

    <!--[if lt IE 9]>
        <script src="js/vendor/html5shiv.min.js"></script>
        <script src="js/vendor/respond.min.js"></script>
    <![endif]-->

</head>
<body>  

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="images/loader.gif" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <br><br><br><br>

    <div id="wrapper">
       

        <?php include("header.php"); ?>   


        <section class="section gb nopadtop">
            <div class="container">
                <center><h4 style="color: #543E17; font-size: 30px;">Projects</h4></center><br><br>
                <div class="row">

                    <div class="col-md-6 proj1">
                        <div class="box">
                            <img src="images/project/Grand Hotel Excelsior Malta Refurbishment.jpg" alt="Avatar" class="image" style="width:100%">
                            <div class="middle">
                              <div class="text"><a href="project_info.php?info=1">Grand Hotel Excelsior Malta Refurbishment</a></div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6 proj2">
                        <div class="box">
                            <img src="images/project/Grand Hotel Excelsior.jpg" alt="Avatar" class="image" style="width:100%">
                            <div class="middle">
                              <div class="text"><a href="project_info.php?info=2">Grand Hotel Excelsior Philippines</a></div>
                            </div>
                        </div>
                    </div><!-- end col -->


                    <div class="col-md-6 proj3">
                        <div class="box">
                            <img src="images/project/Royal Marines Museum.jpg" alt="Avatar" class="image" style="width:100%">
                            <div class="middle">
                              <div class="text"><a href="project_info.php?info=3">Royal Swan Hotel Royal Marines Museum Eastney Esplanade</a></div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6 proj4">
                        <div class="box">
                            <img src="images/project/Royal Swan Hotel.jpg" alt="Avatar" class="image" style="width:100%">
                            <div class="middle">
                              <div class="text"><a href="project_info.php?info=4">Royal Swan Hotel Southampton</a></div>
                            </div>
                        </div>
                    </div><!-- end col -->


                    <div class="col-md-6 proj5">
                        <div class="box">
                            <img src="images/project/Eromanga Motel and Caraval Park.jpg" alt="Avatar" class="image" style="width:100%">
                            <div class="middle">
                              <div class="text"><a href="project_info.php?info=5">Eromanga Motel and Caraval Park</a></div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6 proj6">
                        <div class="box">
                            <img src="images/project/Royal Swan Hotel Ipswich.jpg" alt="Avatar" class="image" style="width:100%">
                            <div class="middle">
                              <div class="text"><a href="project_info.php?info=6">Royal Swan Hotel Ipswich</a></div>
                            </div>
                        </div>
                    </div><!-- end col -->


                </div><!-- end row -->
            </div>
        </section>


       


  
<?php include("footer.php"); ?>
 
    </div><!-- end wrapper -->

    <!-- jQuery Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>
    <!-- VIDEO BG PLUGINS -->
    <script src="js/videobg.js"></script>

</body>
</html>