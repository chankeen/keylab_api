<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$user_id = $_REQUEST['user_id'];
$admin_wp_id = $_REQUEST['admin_wp_id'];

$rv = new stdClass();

$sql_statment = "select * from keylab_users";
$where = " where ";
if (!empty($user_id)){
    $where = $where."user_id = ".$user_id." and ";
}
if (!empty($admin_wp_id)){
    $where = $where."created_by = ".$admin_wp_id." and ";
}
$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;

exit(json_encode($rv));
?>