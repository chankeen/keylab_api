<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_contractor", array(
    'property_id' => $_REQUEST['property_id'],
    'user_id' => $_REQUEST['user_id'],
    'type' => $_REQUEST['type'],
    'remarks' => $_REQUEST['remarks']
), array(
    "%d", "%d",
    "%s", "%s"
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