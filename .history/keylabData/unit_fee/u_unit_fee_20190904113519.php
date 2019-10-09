<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_unit_fee", array(
    'unit_id' => $_REQUEST['unit_id'],
    'type' => $_REQUEST['type'],
    'amount' => $_REQUEST['amount'],
    'payment_status' => $_REQUEST['payment_status'],
    'payment_type' => $_REQUEST['payment_type'],
    'remarks' => $_REQUEST['remarks'],
    'receive_date' => $_REQUEST['receive_date'],
    'unit_fee_file' => serialize($_REQUEST['unit_fee_file']),
), array('unit_fee_id' => $_POST['unit_fee_id']));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>

