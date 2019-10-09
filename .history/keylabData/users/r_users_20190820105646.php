<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$user_id = $_REQUEST['user_id'];
$created_by = $_REQUEST['created_by'];

$rv = new stdClass();

$sql_statment = "select * from users";
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