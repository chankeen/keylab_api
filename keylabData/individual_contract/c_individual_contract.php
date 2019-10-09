<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_individual_contract", array(
    'property_id' => $_REQUEST['property_id'],
    'term_contract_id' => $_REQUEST['term_contract_id'],
    'regular_report_id' => $_REQUEST['regular_report_id'],
    'status' => $_REQUEST['status'],
    'amount' => $_REQUEST['amount'],
    'contractor_id' => $_REQUEST['contractor_id'],
    'contract_file' => serialize($_REQUEST['contract_file']),
    'type' => $_REQUEST['type'],
    'tender_file' => serialize($_REQUEST['tender_file']),
    'content' => $_REQUEST['content'],
    'location' => $_REQUEST['location'],
    'waranty_period' => $_REQUEST['waranty_period'],
    'remarks' => $_REQUEST['remarks']
), array(
    "%d", "%d",
    "%d", "%s", "%s", "%d", "%s",
    "%s", "%s", "%s", "%s", "%s", "%s"
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