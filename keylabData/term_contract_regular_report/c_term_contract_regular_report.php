<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_term_contract_regular_report", array(
    'term_contract_id' => $_REQUEST['term_contract_id'],
    'subject' => $_REQUEST['subject'],
    'regular_report_file' => serialize($_REQUEST['regular_report_file']),
    'checking_date' => $_REQUEST['checking_date'],
    'remarks' => $_REQUEST['remarks']
), array(
    "%d",
    "%s", "%s", "%s","%s"
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