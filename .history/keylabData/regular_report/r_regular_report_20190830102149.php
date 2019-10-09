<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$term_contract_id = $_REQUEST['term_contract_id'];

$rv = new stdClass();

$sql_statment = "select * from keylab_property_regular_report";
$where = " where ";

if (!empty($term_contract_id)){
    $where = $where."term_contract_id = ".$term_contract_id." and ";
}
$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;

foreach ($rv->list as $item){
    $item->work_file = unserialize($item->work_file) ?: [];
    $item->contract_file = unserialize($item->contract_file) ?: [];
}

exit(json_encode($rv));
?>