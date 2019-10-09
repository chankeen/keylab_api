<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_important_deadline", array(
    'important_id' => $_REQUEST['important_id'],
    'deadline' => $_REQUEST['deadline'],
    'file' => serialize($_REQUEST['file'])
), array(
    "%d", "%s","%s"
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