<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$admin_wp_id = $_REQUEST['admin_wp_id'];

$rv = new stdClass();
$result = $wpdb->get_results("select property_id,type,name_zh,name_en,address_zh,address_en from keylab_property where admin_wp_id = ".$admin_wp_id);
$rv->list = $result;

exit(json_encode($rv));
?>