<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_individual_contract_work_report", array(
    'individual_contract_id' => $_REQUEST['individual_contract_id'],
    'subject' => $_REQUEST['subject'],
    'file' => serialize($_REQUEST['file']),
    'work_date' => $_REQUEST['work_date'],
    'remarks' => $_REQUEST['remarks']
), array(
    "%d", "%s",
    "%s", "%s", "%s"
));

if ($status === false) {
    $rv->status = false;
    $rv->query = $wpdb->last_query;
} else {
    $rv->status = true;
}
exit(json_encode($rv));


?>