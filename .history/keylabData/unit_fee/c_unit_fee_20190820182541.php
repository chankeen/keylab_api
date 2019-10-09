<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_unit_fee", array(
    'unit_id' => $_REQUEST['unit_id'],
    'type' => $_REQUEST['type'],
    'amount' => $_REQUEST['amount'],
    'payment_status' => $_REQUEST['payment_status'],
    'payment_type' => $_REQUEST['payment_type'],
    'remarks' => $_REQUEST['remarks'],
    'receive_date' => $_REQUEST['receive_date']
), array(
    "%d", "%s",
    "%s", "%s", "%s", "%s", "%s"
));

if ($status === false) {
    $rv->status = false;
    $rv->query = $wpdb->last_query;
} else {
    $rv->status = true;
}
exit(json_encode($rv));


?>