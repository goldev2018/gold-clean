<?php
include("includes/config.php");
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

if(isset($_GET['option']))
{
    $option = $_GET['option'];
$data = Array();
    $sql = $db->prepare("SELECT * FROM tbl_project");
    $sql->execute();
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        $proj = $row['project_id'];
    if($option == $proj)
    {
        $sql1 = $db->prepare("SELECT * FROM tbl_project_info WHERE project_id='$proj'");
    $sql1->execute();
    while ($row1 = $sql1->fetch(PDO::FETCH_ASSOC)) {
            $qwe[] = $row1['proj_info_codes']; 
    }

        $data = array('Arsenal', 'Chelsea', 'Liverpool');

    }

    }


    $reply = array('data' => $qwe, 'error' => false);
}
else
{
    $reply = array('error' => true);
}

$json = json_encode($reply);    
echo $json; 
?>