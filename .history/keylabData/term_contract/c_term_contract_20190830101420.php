<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_term_contract", array(
    'property_id' => $_REQUEST['property_id'],
    'type' => $_REQUEST['type'],
    'contract_start_date' => $_REQUEST['contract_start_date'],
    'contract_end_date' => $_REQUEST['contract_end_date'],
    'amount' => $_REQUEST['amount'],
    'contractor_user_id' => $_REQUEST['contractor_user_id'],
    'content' => $_REQUEST['content'],
    'contract_file' => serialize($_REQUEST['contract_file']),
    'work_start_date' => $_REQUEST['work_start_date'],
    'work_end_date' => $_REQUEST['work_end_date'],
    'work_file' => serialize($_REQUEST['work_file']),
    'propman_user_id' => $_REQUEST['propman_user_id'],
    'contract_approval_user_id' => $_REQUEST['contract_approval_user_id'],
    'buyer_user_id' => $_REQUEST['buyer_user_id'],
    'job_period_unit' => $_REQUEST['job_period_unit'],
    'job_period_value' => $_REQUEST['job_period_value']
), array(
    "%d", "%d",
    "%s", "%s", "%s", "%s", "%s",
    "%s", "%s", "%s", "%s", "%s", "%s", "%s"
));

if ($status === false) {
    $rv->status = false;
    $rv->query = $wpdb->last_query;
} else {
    $rv->status = true;
}
exit(json_encode($rv));


?>