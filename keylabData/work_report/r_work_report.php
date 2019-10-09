<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$individual_contract_id = $_REQUEST['individual_contract_id'];

$rv = new stdClass();

$sql_statment = "select * from keylab_property_individual_contract_work_report";
$where = " where ";

if (!empty($individual_contract_id)){
    $where = $where."individual_contract_id = ".$individual_contract_id." and ";
}
$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;

foreach ($rv->list as $item){
    $item->file = unserialize($item->file) ?: [];
}

exit(json_encode($rv));
?>