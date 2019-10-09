<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$regular_report_id = $_REQUEST['regular_report_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_term_contract_regular_report",array("regular_report_id"=>$regular_report_id));

if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>