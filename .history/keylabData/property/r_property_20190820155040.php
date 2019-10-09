<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$admin_wp_id = $_REQUEST['admin_wp_id'];
$property_id = $_REQUEST['property_id'];

$rv = new stdClass();

$sql_statment = "select * from keylab_property as a left join keylab_users as b on a.user_id = b.user_id";
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

exit(json_encode($rv));
?>