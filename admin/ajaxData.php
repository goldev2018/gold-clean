<?php 
// Include the database config file 
 include 'includes/config.php';
 

if($_POST['id']){
$id=$_POST['id'];
if($id==0){
 echo "<option>Select City</option>";
}else{
 $sql = $db->query("SELECT * FROM tbl_project_info WHERE project_id='$id'");
 $count = $sql->rowCount();
 if($count==0){
$sql = $db->query("SELECT * FROM tbl_project_info");
while($row = $sql->fetch(PDO::FETCH_ASSOC)){
 echo '<option value="'.$row['proj_info_id'].'">'.$row['proj_info_codes'].' - '.$row['proj_info_building'].'</option>';
 }

 }else{
     while($row = $sql->fetch(PDO::FETCH_ASSOC)){
     	if ($row['proj_info_building']=="") {
     	echo '<option value="'.$row['proj_info_id'].'">'.$row['proj_info_codes'];'</option>';
     	}
     	else{
     		 echo '<option value="'.$row['proj_info_id'].'">'.$row['proj_info_codes'].' - '.$row['proj_info_building'].'</option>';
     	}

 }

 }

 }
}
?>