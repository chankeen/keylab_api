<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$admin_wp_id = $_REQUEST['admin_wp_id'];
$property_id = $_REQUEST['property_id'];

$rv = new stdClass();

$sql_statment = "select * from keylab_property";
$where = " where ";
if (!empty($admin_wp_id)){
    $where = $where."admin_wp_id = ".$admin_wp_id." and ";
}
if (!empty($property_id)){
    $where = $where."property_id = ".$property_id." and ";
}
$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;
$rv->sql = $sql_statment;

foreach ($rv->list as $item){
    $item->floor_plan_file = unserialize($item->floor_plan_file) ?: [];
    $item->dmc_file = unserialize($item->dmc_file) ?: [];
}

exit(json_encode($rv));
?>