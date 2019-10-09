<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_unit_file", array(
    'unit_id' => $_REQUEST['unit_id'],
    'type' => $_REQUEST['type'],
    'remarks' => $_REQUEST['known_date'],
    'unit_file_file' => $_REQUEST['unit_file_file'],
    'instrument_date' => $_REQUEST['instrument_date']
), array(
    "%d", "%s", "%s", "%s", "%s"
));

if ($status === false) {
    $rv->status = false;
    $rv->query = $wpdb->last_query;
} else {
    $rv->status = true;
}
exit(json_encode($rv));


?>