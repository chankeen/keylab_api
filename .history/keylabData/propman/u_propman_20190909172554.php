<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_propman", array(
    'property_id' => $_REQUEST['property_id'],
    'user_id' => $_REQUEST['user_id'],
    'position' => $_REQUEST['position'],
    'remarks' => $_REQUEST['remarks']
), array('propman_id' => $_REQUEST['propman_id']));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>

