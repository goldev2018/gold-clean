<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
     var initialSrc = "images/gold-logo2.png";
var scrollSrc = "images/gold-logo.png";

function myFunction() {
var host = window.location.pathname;

if (host=="/goldv2/index.php")
      $(".logo").attr("src", initialSrc),
      $("#navbar").removeClass("head1");

      $(window).scroll(function() {
   var value = $(this).scrollTop();
      var host = window.location.pathname;
   if (value > 100)
      $(".logo").attr("src", scrollSrc),
      $("#navbar").addClass("head1");
   else
      $(".logo").attr("src", initialSrc),
      $("#navbar").removeClass("head1");
}); 

}
</script>



        <header class="header">
           <br style="display: block; content: ''; margin-top: 10px;">
            <div class="container">

                <nav class="navbar navbar-default yamm">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="logo-normal img-responsive">
                            <a href="index.php"><img class="logo" src="images/gold-logo.png" alt=""></a>
                        </div>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse head1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="project.php">Projects</a></li>
                            <!-- <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Project <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="blog.html">Blog Right Sidebar</a></li>
                                    <li><a href="blog-1.html">Blog Left Sidebar</a></li>
                                    <li><a href="blog-2.html">Blog Grid Sidebar</a></li>
                                    <li><a href="blog-3.html">Blog Grid Fullwidth</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li> -->

                            <li><a href="whoweare.php">Who We Are</a></li>

                            <li><a href="careers.php">Careers</a></li>

                            <!-- <li><a href="events.html">Contact Us</a></li> -->
                        </ul>
                    </div>
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>