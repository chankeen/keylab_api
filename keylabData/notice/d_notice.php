<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$notice_id = $_REQUEST['notice_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_notice",array("notice_id"=>$notice_id));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>