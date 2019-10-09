<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$contractor_id = $_REQUEST['contractor_id'];
$property_id = $_REQUEST['property_id'];
$user_id = $_REQUEST['user_id'];

$rv = new stdClass();

$sql_statment = "select a.*,b.name_zh,b.name_en,b.login_tel,b.email from keylab_property_contractor as a left join keylab_users as b on a.user_id = b.user_id";
$where = " where ";

if (!empty($contractor_id)){
    $where = $where."contractor_id = ".$contractor_id." and ";
}
if (!empty($property_id)){
    $where = $where."property_id = ".$property_id." and ";
}
if (!empty($user_id)){
    $where = $where."user_id = ".$user_id." and ";
}
$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;

exit(json_encode($rv));
?>