<?php include 'includes/config.php'; ?>







<html>
<head>
<title>Dynamic Dependent Select Box using jQuery and Ajax</title>
</head>
<body>
<div>
<label>Country :</label>

<select class='custom-select country' id='inputGroupSelect04' name='selproj[]'><option selected value=''>Choose Project</option><?php  $sqlopt = $db->prepare("SELECT * FROM tbl_country"); $sqlopt->execute();while ($rowopt = $sqlopt->fetch(PDO::FETCH_ASSOC)){ ?>
    <optgroup label='<?php echo $rowopt['country_name']; ?>'><?php 
    echo $cou_id = $rowopt['country_id'];
    $sql = $db->prepare("SELECT * FROM tbl_project WHERE country_id='$cou_id'"); $sql->execute();
     while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
      <option value='<?php echo $row['project_id'] ?>'><?php echo $row['project_name'] ?></option><?php }?>
     </optgroup><?php } ?></select>

  <br/><br/>
<!-- <label>City :</label><select name="seljob" class="city">
<option>Select City</option>
</select> -->
<select class='custom-select city' id='inputGroupSelect05' name='seljob[]' required><option>Choose Job Code</option></select>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".country").change(function()
{
var country_id=$(this).val();
var post_id = 'id='+ country_id;
 
$.ajax
({
type: "POST",
url: "ajaxData.php",
data: post_id,
cache: false,
success: function(cities)
{
$(".city").html(cities);
} 
});
 
});
});
</script>
</body>
</html>