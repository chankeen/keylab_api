<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$minutes_id = $_REQUEST['minutes_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_minutes",array("minutes_id"=>$minutes_id));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>