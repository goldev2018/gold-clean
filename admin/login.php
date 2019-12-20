<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GOLD Admin - Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js" charset="UTF-8"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <?php include("favicon.php"); ?>
<style type="text/css">
  .login-form {
    width: 340px;
      margin: 50px auto;
  }
    .login-form form {
      margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action="loginchk.php" method="post">
        <h2 class="text-center"><img src="img/gold-logo.png" width="80%"></center></h2>       
        <div class="form-group">
          <?php if(isset($_COOKIE["username"])) {  ?>
            <input type="text" class="form-control" name="uname" placeholder="Username" required="required" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
          <?php } else{ ?>
            <input type="text" class="form-control" name="uname" placeholder="Username" required="required" autocomplete="off">
          <?php } ?>
        </div>
        <div class="form-group">
            <!-- <input type="password" class="form-control" name="pass" placeholder="Password" required="required" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
            <span toggle="#password-field" class="glyphicon glyphicon-eye-open field-icon toggle-password"></span> -->
            <input id="password-field" type="password" class="form-control"  name="pass" placeholder="Password" required="required" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
              <span toggle="#password-field" class="glyphicon glyphicon-eye-open field-icon toggle-password"></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning btn-block" value="Log in" name="login">
        </div>
        <div class="clearfix">
            <!-- <label class="pull-left checkbox-inline"><input type="checkbox" name="remember" value="1"> Remember me</label> -->
            <a class="pull-right" data-toggle="modal" href="#myModal" style="color:#8a6d3b;">Forgot Password?</a>
        </div>        
    </form>
</div>
</body>
</html>






<div class="container">


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Forgot Password</h4>
        </div>
        <div class="modal-body">
          
            <form action="requestreset.php" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Enter Employee ID" name="reqEmpID">
          <div class="input-group-btn">
          <button class="btn btn-default" type="submit" name="reqSubmit">Send 
          <i class="glyphicon glyphicon-send"></i></button>
          </div>
          </div>
            </form>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="glyphicon glyphicon-remove"></i></button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<style type="text/css">
  .field-icon {
  float: right;
  margin-left: -30px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}
</style>

<!-- <div class="container">
<div class="row">
  <div class="col-md-8 col-md-offset-2">

    <div class="panel panel-default">
      <div class="panel-body">
        <form class="form-horizontal" method="" action="">

          <div class="form-group">
            <label class="col-md-4 control-label">Email</label>
            <div class="col-md-6">
              <input type="email" class="form-control" name="email" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Password</label>
            <div class="col-md-6">
              <input id="password-field" type="password" class="form-control" name="password" value="secret">
              <span toggle="#password-field" class="glyphicon glyphicon-eye-open field-icon toggle-password"></span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div> -->

          <script type="text/javascript">
            $(".toggle-password").click(function() {

  $(this).toggleClass("glyphicon-eye-close");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
          </script>