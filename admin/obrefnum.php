<?php 
include 'includes/config.php';
session_start();
// $date = date('y\-');
// leave_id, leave_series, leave_counter, leave_period, leave_total, leave_nature, leave_reason, leave_date, leave_docu, emp_id, annual_id
$series = date('\O\B\-\G\O\L\D\-y');
$sql = $db->prepare("SELECT ob_counter FROM tbl_ob WHERE ob_series LIKE '%$series%'");
$sql->execute();
$val = $sql->rowcount();
// $val = 102;
$num = str_pad($val,4,"0",STR_PAD_LEFT);

// $str = "ABC000001";
$number = "";
$prefix = "";
$strArray = str_split($num);
foreach ($strArray as $char) {  
    if (is_numeric($char))  {
        $number .= $char;   
    } else {
        $prefix .= $char;   
    }
}
$length = strlen($number);

$number = sprintf('%0' . $length . 'd', $number + 1);
// $prefix . $number;
echo $ordernumber = date('\O\B\-\G\O\L\D\-y-'.$number.' ');

$_SESSION['obrefnumber']=$number;


 ?>