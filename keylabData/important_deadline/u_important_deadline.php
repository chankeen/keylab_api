<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_important_deadline", array(
    'important_id' => $_REQUEST['important_id'],
    'deadline' => $_REQUEST['deadline'],
    'file' => $_REQUEST['ref_no']
), array('important_deadline_id' => $_POST['important_deadline_id']));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>

