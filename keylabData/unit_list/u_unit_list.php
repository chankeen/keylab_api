<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_unit_list", array(
    'property_id' => $_REQUEST['property_id'],
    'block' => $_REQUEST['block'],
    'floor' => $_REQUEST['floor'],
    'unit' => $_REQUEST['unit'],
    'file' => serialize($_REQUEST['file']),
    'remarks' => $_REQUEST['remarks']
), array('unit_id' => $_POST['unit_id']));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>

