<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$admin_wp_id = $_REQUEST['admin_wp_id'];
$property_id = $_REQUEST['property_id'];
$rv = new stdClass();
$result = $wpdb->get_results("select * from keylab_property where admin_wp_id = ".$admin_wp_id);
$rv->list = $result;

exit(json_encode($rv));
?>