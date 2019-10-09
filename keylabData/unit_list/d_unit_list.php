<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$unit_id = $_REQUEST['unit_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_unit_list",array("unit_id"=>$unit_id));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>