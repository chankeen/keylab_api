<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$property_id = $_REQUEST['property_id'];

$rv = new stdClass();

$sql_statment = "select * from keylab_property_insurance_claims";
$where = " where ";

if (!empty($property_id)){
    $where = $where."property_id = ".$property_id." and ";
}

$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;
foreach ($rv->list as $item){
    $item->quotation_file = unserialize($item->quotation_file) ?: [];
    $item->adjuster_file = unserialize($item->adjuster_file) ?: [];
    $item->insurance_file = unserialize($item->insurance_file) ?: [];
}
exit(json_encode($rv));
?>