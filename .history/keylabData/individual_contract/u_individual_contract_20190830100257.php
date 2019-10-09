<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property", array(
    'property_id' => $_REQUEST['property_id'],
    'term_contract_id' => $_REQUEST['term_contract_id'],
    'regular_report_id' => $_REQUEST['regular_report_id'],
    'status' => $_REQUEST['status'],
    'tender_start' => $_REQUEST['tender_start'],
    'tender_end' => $_REQUEST['tender_end'],
    'tender_amount' => $_REQUEST['tender_amount'],
    'contractor_user_id' => $_REQUEST['contractor_user_id'],
    'contract_file' => $_REQUEST['contract_file'],
    'unit_amount' => $_REQUEST['unit_amount'],
    'total_size' => $_REQUEST['total_size'],
    'floor_plan_file' => serialize($_REQUEST['floor_plan_file']),
    'dmc_file' => serialize($_REQUEST['dmc_file'])
), array('property_id' => $_POST['property_id']));
if ($status === false) {
    $rv->status = false;
} else {
    $rv->status = true;
}
exit(json_encode($rv));
?>

