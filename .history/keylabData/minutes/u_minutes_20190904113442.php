<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_minutes", array(
    'property_id' => $_REQUEST['property_id'],
    'type' => $_REQUEST['type'],
    'oc_term' => $_REQUEST['oc_term'],
    'minutes_term' => $_REQUEST['minutes_term'],
    'minutes_file' => serialize($_REQUEST['minutes_file']),
    'meeting_date' => $_REQUEST['meeting_date']
), array('minutes_id' => $_POST['minutes_id']));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>

