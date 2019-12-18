<?php 
session_start();
date_default_timezone_set("Asia/Manila");
echo $todate = date("l M d Y h:m s A");
$_SESSION['todate']=$todate;
 ?>