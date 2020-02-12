<?php
include 'includes/config.php';
$obid = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body><br><br>
<center>
<?php $sqlmodal = $db->prepare("SELECT * FROM tbl_ob WHERE ob_id='$obid'");
$sqlmodal->execute(); 
$rowmodal = $sqlmodal->fetch(PDO::FETCH_ASSOC);


?>

            <?php echo $rowmodal['ob_series']."-".$rowmodal['ob_counter']; ?>
       
<table border="1">
            <form action="#" method="post" enctype="multipart/form-data">
            <input type="hidden" name="hidid" value="<?php echo $obid; ?>">
            <input type="hidden" name="hidemp" value="<?php echo $rowmodal['emp_id']; ?>">
            <input type="hidden" name="hidrefnum" value="<?php echo $rowmodal['ob_series']."-".$rowmodal['ob_counter'] ?>">

       <tr>
          <td>
          <input type="file" name="liquidform" class="btn btn-outline-success"><input type="submit" name="liquidate" id="liquidate">
          </td>
      </tr>
        </form>
</table>
</center>

</body>
</html>



<?php 
 if (isset($_POST['hidid'])) {
$hidid = $_POST['hidid'];
$hidrefnum = $_POST['hidrefnum'];
$hidemp = $_POST['hidemp'];

$_FILES['liquidform']['tmp_name'];


$liquidform = $_FILES['liquidform']['tmp_name'];

$path = $_FILES['liquidform']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$ext = ".".$ext;
$newPath = "liquidation/";
echo $newName  = $newPath.$hidrefnum."-".$hidemp.$ext;



$sql2 = $db->prepare("UPDATE tbl_ob SET ob_liquidation='$newName' WHERE ob_id='$hidid'");
if ($sql2->execute()) {

copy($_FILES['liquidform']['tmp_name'] , $newName);
echo "<script>alert('Upload Successfully.');window.close();</script>";
}

} 
 ?>