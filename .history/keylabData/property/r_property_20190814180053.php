<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$admin_wp_id = $_REQUEST['admin_wp_id'];
$property_id = $_REQUEST['property_id'];

$rv = new stdClass();

$sql_statment = "select * from keylab_property";
$where = " where ";
if (!empty($admin_wp_id))
$result = $wpdb->get_results("sql_statment");
$rv->list = $result;

exit(json_encode($rv));
?>