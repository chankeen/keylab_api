<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_term_contract_related_entity", array(
    'term_contract_id' => $_REQUEST['term_contract_id'],
    'type' => $_REQUEST['type'],
    'related_id' => $_REQUEST['related_id'],
    'role' => $_REQUEST['role']
), array('term_contract_related_entity_id' => $_POST['term_contract_related_entity_id']));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>

