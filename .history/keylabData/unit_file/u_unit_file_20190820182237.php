<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_unit_file", array(
    'unit_id' => $_REQUEST['unit_id'],
    'type' => $_REQUEST['type'],
    'remarks' => $_REQUEST['known_date'],
    'unit_file_file' => $_REQUEST['unit_file_file'],
    'instrument_date' => $_REQUEST['instrument_date']
), array('unit_file_id' => $_POST['unit_file_id']));
if ($status === false) {
    $rv->status = false;
} else {
    $rv->status = true;
}
exit(json_encode($rv));
?>

