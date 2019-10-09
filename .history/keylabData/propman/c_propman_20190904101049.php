<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_propman", array(
    'property_id' => $_REQUEST['property_id'],
    'user_id' => $_REQUEST['user_id'],
    'position' => $_REQUEST['position']
), array(
    "%d", "%d",
    "%s"
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