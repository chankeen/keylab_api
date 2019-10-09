<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_important", array(
    'property_id' => $_REQUEST['property_id'],
    'type' => $_REQUEST['type'],
    'known_date' => $_REQUEST['known_date'],
    'deadline' => $_REQUEST['deadline'],
    'content' => $_REQUEST['content'],
    'remarks' => $_REQUEST['remarks'],
    'important_file' => serialize($_REQUEST['important_file'])
), array(
    "%d", "%s",
    "%s", "%s", "%s", "%s", "%s"
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