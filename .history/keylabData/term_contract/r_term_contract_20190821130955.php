<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$property_id = $_REQUEST['property_id'];

$rv = new stdClass();

$sql_statment = "select * from keylab_property_term_contract";
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
    $item->floor_plan_file = unserialize($item->floor_plan_file) ?: [];
    $item->dmc_file = unserialize($item->dmc_file) ?: [];
}

exit(json_encode($rv));
?>