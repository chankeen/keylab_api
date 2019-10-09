<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$term_contract_id = $_REQUEST['term_contract_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_term_contract",array("term_contract_id"=>$term_contract_id));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>