<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_individual_contract_work_report", array(
    'individual_contract_id' => $_REQUEST['individual_contract_id'],
    'subject' => $_REQUEST['subject'],
    'file' => serialize($_REQUEST['file']),
    'work_date' => $_REQUEST['work_date'],
    'remarks' => $_REQUEST['remarks']
), array('work_report_id' => $_POST['work_report_id']));

if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>

