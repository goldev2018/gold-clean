<?php 
	include 'includes/config.php';
	$empID = $_GET['resetid'];
	$hashpass = md5($empID);
	$sql1 = $db->prepare("UPDATE tbl_user SET password='$hashpass', status='0', request='0' WHERE emp_id='$empID'");
	if ($sql1->execute()) { ?>

<p style="text-align:center"><b>Account reset.</b><br>Please wait...<br>This window will close automatically within <span id="counter">5</span> second(s).</p>
<script type="text/javascript">



 function countdown() {

    var i = document.getElementById('counter');

    i.innerHTML = parseInt(i.innerHTML)-1;

 if (parseInt(i.innerHTML)<=0) {

  window.close();

 }

}

setInterval(function(){ countdown(); },1000);

</script>


	<?php }


 ?>

 