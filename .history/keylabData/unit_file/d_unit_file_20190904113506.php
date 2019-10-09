<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$unit_file_id = $_REQUEST['unit_file_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_unit_file",array("unit_file_id"=>$unit_file_id));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>