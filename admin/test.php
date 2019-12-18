<!-- <iframe src="http://docs.google.com/viewer?url=http://goldphilippines.com/admin/forms/EXCUSE LETTER.docx&embedded=true" width="600" height="780" style="border: none;"></iframe>

<iframe src="http://docs.google.com/viewer?url=http://goldphilippines.com/admin/forms/Explain Letter.docx&embedded=true" width="600" height="780" style="border: none;"></iframe>

<iframe id="iframe1" src="http://docs.google.com/viewer?url=http://goldphilippines.com/admin/forms/WTS_PDF FORM_01.04.2019.pdf&embedded=true" width="600" height="780" style="border: none;">

 -->

<?php 
include 'includes/config.php';
session_start();
$emp_id = $_SESSION['emp_id'];
          $sql1 = $db->prepare("SELECT * FROM tbl_leave WHERE emp_id='GOLD-AR-01'");
          $sql1->execute();
          while ($row = $sql1->fetch(PDO::FETCH_ASSOC)) {


// header("Content-type: application/pdf");


 ?>
<iframe src="http://docs.google.com/viewer?url=http://goldphilippines.com/admin/forms/template.pdf&embedded=true" width="600" height="780" style="border: none;"></iframe>
<iframe src="http://docs.google.com/viewer?url=http://goldphilippines.com/admin/excuse_letter/LEAVE-GOLD-19-0001 -GOLD-AR-01.docx&embedded=true" width="600" height="780" style="border: none;"></iframe>

<?php } ?>

<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="uploadfile">
<input type="submit" name="submit">
</form>
<?php 
// if (isset($_POST['submit'])) {
//   $path = $_FILES['uploadfile']['name'];
// $ext = pathinfo($path, PATHINFO_EXTENSION);
// echo $ext = ".".$ext;
// }
 ?>

<link rel="stylesheet" type="text/css" href="css/timepicker.css" />


	From:<input type="text" id="from" name="from" value="10:00 AM" size="10">
	To:<input type="text" id="to" name="to" value="12:00 PM" size="10">

    </p>

	<div class="sliders_step1">
        <div id="slider-range"></div>
    </div>



    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>



<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js">
</script>

<script src="js/timepicker.js"></script>




<?php 
$row2 = array();
$sql2 = $db->prepare("SELECT * FROM tbl_timesheetinfo WHERE ts_id='1' ORDER BY tsinfo_id ASC");
$sql2->execute();
while ($row2[] = $sql2->fetch(PDO::FETCH_ASSOC)) {

// tsinfo_id, tsinfo_desc, tsinfo_time, tsinfo_day, tsinfo_week, tsinfo_total, tsinfo_date, tsinfo_status, ts_id, project_id, proj_info_id
echo json_encode($row2);
}
 ?>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ca2222;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.on, .off
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}

input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;}
</style>
<!--  <label class="switch">
  <input type="checkbox" id="myCheck" onclick="myFunction()">
  <span class="slider round"></span>
</label> -->
<!--  <label class="switch">
  <input type="checkbox" id="myCheck"  onclick="myFunction()" checked>
  <span class="slider round"></span> 
</label> -->

<label class="switch"><input type="checkbox" id="togBtn" onclick="myFunction()" checked><div class="slider round"><!--ADDED HTML --><span class="on">On</span><span class="off">Off</span><!--END--></div></label>



<script>
  function myFunction() {
  var x = document.getElementById("togBtn").checked;
  if (x==true) {
    alert("1");
  }else{
    alert("2");    
  }
  // alert(x);
}
</script>

