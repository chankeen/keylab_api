<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_important", array(
    'property_id' => $_REQUEST['property_id'],
    'type' => $_REQUEST['type'],
    'ref_no' => $_REQUEST['ref_no'],
    'known_date' => $_REQUEST['known_date'],
    'deadline' => $_REQUEST['deadline'],
    'content' => $_REQUEST['content'],
    'remarks' => $_REQUEST['remarks'],
    'important_file' => serialize($_REQUEST['important_file']),
    'handler_user_id' => $_REQUEST['handler_user_id']
), array('important_id' => $_POST['important_id']));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>

