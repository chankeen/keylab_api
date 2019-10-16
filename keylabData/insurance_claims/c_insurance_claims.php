<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_insurance_claims", array(
    'property_id' => $_REQUEST['property_id'],
    'status' => $_REQUEST['status'],
    'event_date' => $_REQUEST['event_date'],
    'unit' => $_REQUEST['unit'],
    'type' => $_REQUEST['type'],
    'amount' => $_REQUEST['amount'],
    'quotation_file' => serialize($_REQUEST['quotation_file']),
    'adjuster_file' => serialize($_REQUEST['adjuster_file']),
    'insurance_file' => serialize($_REQUEST['insurance_file'])
), array(
    "%d", 
    "%s", "%s", "%s", "%s",
    "%s", "%s", "%s", "%s",
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