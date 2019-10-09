<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_term_contract", array(
    'property_id' => $_REQUEST['property_id'],
    'status' => $_REQUEST['status'],
    'type' => $_REQUEST['type'],
    'contract_start_date' => $_REQUEST['contract_start_date'],
    'contract_end_date' => $_REQUEST['contract_end_date'],
    'amount' => $_REQUEST['amount'],
    'contractor_id' => $_REQUEST['contractor_id'],
    'content' => $_REQUEST['content'],
    'tender_file' => serialize($_REQUEST['tender_file']),
    'contract_file' => serialize($_REQUEST['contract_file']),
    'job_period_unit' => $_REQUEST['job_period_unit'],
    'job_period_value' => $_REQUEST['job_period_value'],
    'remarks' => $_REQUEST['remarks']
), array('term_contract_id' => $_POST['term_contract_id']));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>

