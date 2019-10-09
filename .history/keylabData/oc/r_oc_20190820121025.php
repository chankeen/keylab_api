<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$oc_id = $_REQUEST['oc_id'];
$property_id = $_REQUEST['property_id'];
$user_id = $_REQUEST['user_id'];

$rv = new stdClass();

$sql_statment = "select * from keylab_property_oc";
$where = " where ";

if (!empty($oc_id)){
    $where = $where."oc_id = ".$oc_id." and ";
}
if (!empty($property_id)){
    $where = $where."property_id = ".$property_id." and ";
}
if (!empty($user_id)){
    $where = $where."user_id = ".$user_id." and ";
}
$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;

exit(json_encode($rv));
?>