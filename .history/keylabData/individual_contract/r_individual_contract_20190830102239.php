<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$property_id = $_REQUEST['property_id'];
$indiviual_contract_id = $_REQUEST['indiviual_contract_id'];
$rv = new stdClass();

$sql_statment = "select * from keylab_property_individual_contract";
$where = " where ";

if (!empty($property_id)){
    $where = $where."property_id = ".$property_id." and ";
}
if (!empty($indiviual_contract_id)){
    $where = $where."indiviual_contract_id = ".$indiviual_contract_id." and ";
}
$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;

foreach ($rv->list as $item){
    $item->quotation_file = unserialize($item->quotation_file) ?: [];
    $item->contract_file = unserialize($item->contract_file) ?: [];
}

exit(json_encode($rv));
?>