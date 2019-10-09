<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property", array(
    'property_id' => $_REQUEST['property_id'],
    'term_contract_id' => $_REQUEST['term_contract_id'],
    'regular_report_id' => $_REQUEST['regular_report_id'],
    'status' => $_REQUEST['status'],
    'tender_start' => $_REQUEST['tender_start'],
    'tender_end' => $_REQUEST['tender_end'],
    'tender_amount' => $_REQUEST['tender_amount'],
    'contractor_user_id' => $_REQUEST['contractor_user_id'],
    'contract_file' => serialize($_REQUEST['contract_file']),
    'type' => $_REQUEST['type'],
    'quotation_file' => serialize($_REQUEST['quotation_file']),
    'content' => $_REQUEST['content'],
    'location' => $_REQUEST['location'],
    'waranty_period' => $_REQUEST['waranty_period']
), array(
    "%d", "%d",
    "%d", "%s", "%s", "%s", "%s",
    "%d", "%s", "%s", "%s", "%s", "%s", "%s"
));

if ($status === false) {
    $rv->status = false;
    $rv->query = $wpdb->last_query;
} else {
    $rv->status = true;
}
exit(json_encode($rv));


?>