<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$property_id = $_REQUEST['property_id'];
$unit_id = $_REQUEST['unit_id'];
$unit_file_id = $_REQUEST['unit_file_id'];

$rv = new stdClass();

$sql_statment = "select a(*) from keylab_property_unit_fee as a left join keylab_property_unit_list as b on a.unit_id = b.unit_id left join keylab_property as c on c.property_id = b.property_id";
$where = " where ";

if (!empty($unit_id)){
    $where = $where."a.unit_id = ".$unit_id." and ";
}

if (!empty($unit_file_id)){
    $where = $where."a.unit_file_id = ".$unit_file_id." and ";
}

if (!empty($property_id)){
    $where = $where."b.property_id = ".$property_id." and ";
}

$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;

exit(json_encode($rv));
?>