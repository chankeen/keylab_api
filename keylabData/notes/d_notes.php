<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$note_id = $_REQUEST['note_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_notes",array("note_id"=>$note_id));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>