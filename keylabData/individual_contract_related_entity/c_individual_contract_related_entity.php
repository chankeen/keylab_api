<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_individual_contract_related_entity", array(
    'individual_contract_id' => $_REQUEST['individual_contract_id'],
    'type' => $_REQUEST['type'],
    'related_id' => $_REQUEST['related_id'],
    'role' => $_REQUEST['role']
), array(
    "%d", "%s","%d","%s"
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