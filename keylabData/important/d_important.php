<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$important_id = $_REQUEST['important_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_important",array("important_id"=>$important_id));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>