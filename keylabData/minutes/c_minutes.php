<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_minutes", array(
    'property_id' => $_REQUEST['property_id'],
    'type' => $_REQUEST['type'],
    'oc_term' => $_REQUEST['oc_term'],
    'minutes_term' => $_REQUEST['minutes_term'],
    'minutes_file' => serialize($_REQUEST['minutes_file']),
    'agenda_file' => serialize($_REQUEST['agenda_file']),
    'meeting_date' => $_REQUEST['meeting_date'],
    'remarks'   => $_REQUEST['remarks']
), array(
    "%d", "%s",
    "%d", "%d", "%s", "%s", "%s","%s"
));

if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));


?>