<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$property_id = $_REQUEST['property_id'];
$unit_id = $_REQUEST['unit_id'];
$unit_fee_id = $_REQUEST['unit_fee_id'];

$rv = new stdClass();

$sql_statment = "select a.unit_fee_id,a.unit_id,a.type,a.amount,a.payment_status,a.payment_type,a.remarks,a.receive_date,a.unit_fee_file from keylab_property_unit_fee as a left join keylab_property_unit_list as b on a.unit_id = b.unit_id left join keylab_property as c on c.property_id = b.property_id";
$where = " where ";

if (!empty($unit_id)){
    $where = $where."a.unit_id = ".$unit_id." and ";
}

if (!empty($unit_fee_id)){
    $where = $where."a.unit_fee_id = ".$unit_fee_id." and ";
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
foreach ($rv->list as $item){
    $item->unit_fee_file = unserialize($item->unit_fee_file) ?: [];
}
exit(json_encode($rv));
?>