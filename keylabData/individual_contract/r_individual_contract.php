<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$property_id = $_REQUEST['property_id'];
$indiviual_contract_id = $_REQUEST['indiviual_contract_id'];
$rv = new stdClass();

$sql_statment = "select b.name_zh as contractor_name_zh,a.*, IF(waranty_period != '0000-00-00',CONCAT('還有',DATEDIFF(`waranty_period`,CURDATE()),'天'),'沒有保養') AS display_waranty from keylab_property_individual_contract as a left join keylab_property_contractor as c on a.contractor_id = c.contractor_id left join keylab_users as b on c.user_id = b.user_id";
$where = " where ";

if (!empty($property_id)){
    $where = $where."a.property_id = ".$property_id." and ";
}
if (!empty($indiviual_contract_id)){
    $where = $where."a.indiviual_contract_id = ".$indiviual_contract_id." and ";
}
$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;

foreach ($rv->list as $item){
    $item->tender_file = unserialize($item->tender_file) ?: [];
    $item->contract_file = unserialize($item->contract_file) ?: [];
}

exit(json_encode($rv));
?>