<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$work_report_id = $_REQUEST['work_report_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_individual_contract_work_report",array("work_report_id"=>$work_report_id));

if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>