<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$individual_contract_id = $_REQUEST['individual_contract_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_individual_contract",array("individual_contract_id"=>$individual_contract_id));

if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>