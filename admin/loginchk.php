<?php 
session_start();
if ($_POST['login']) {

include("includes/config.php");
$uname = $_POST['uname'];
$pass = md5($_POST['pass']);

// if (isset($_POST['remember'])) {
// 	setcookie ("username",$_POST["uname"],time()+ 0);
// 	setcookie ("password",$_POST["pass"],time()+ 0);
// 	echo "Cookies Set Successfuly";
// } else {
// 	setcookie("username","");
// 	setcookie("password","");
// 	echo "Cookies Not Set";
// }
// echo "Please wait...";

$sql = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$uname' AND password='$pass'");
$sql->execute();
$num = $sql->rowCount();
$num;
if ($num!=0) {
$row = $sql->fetch(PDO::FETCH_ASSOC);
$_SESSION['emp_id']=$row['emp_id'];
$_SESSION['fname']=$row['fname'];
$_SESSION['lname']=$row['lname'];
$_SESSION['position']=$row['position'];
$_SESSION['company']=$row['company'];
$_SESSION['department']=$row['department'];
$_SESSION['image']=$row['image'];
$_SESSION['u_type']=$row['u_type'];
$_SESSION['status']=$row['status'];
$_SESSION['is_active']=$row['is_active'];
$_SESSION['uname']=$uname;
$_SESSION['pass']=$pass;
$_SESSION['email']=$email;

if ($row['is_active']==0) {


if ($row['status']==0) {?>
  <script>window.location="newpass.php";</script>
<?php }
else{ ?>
  <script>window.location="dashboard.php?link=home";</script>
<?php }

}else{?>

<script>alert('Account disabled.');
history.back();
</script>";

<?php 
}


}else{ ?>
<script>alert('Try again');
history.back();
</script>";
<?php 
}

}

?>

