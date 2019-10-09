<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$important_id = $_REQUEST['important_id'];
$property_id = $_REQUEST['property_id'];

$rv = new stdClass();

$sql_statment = "select * from keylab_property_important";
$where = " where ";

if (!empty($property_id)){
    $where = $where."property_id = ".$property_id." and ";
}
if (!empty($important_id)){
    $where = $where."important_id = ".$important_id." and ";
}

$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;

exit(json_encode($rv));
?>