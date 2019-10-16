<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$insurance_claims_id = $_REQUEST['insurance_claims_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_insurance_claims",array("insurance_claims_id"=>$insurance_claims_id));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>