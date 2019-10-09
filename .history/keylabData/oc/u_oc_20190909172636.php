<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_oc", array(
    'property_id' => $_REQUEST['property_id'],
    'user_id' => $_REQUEST['user_id'],
    'year_from' => $_REQUEST['year_from'],
    'year_to' => $_REQUEST['year_to'],
    'term' => $_REQUEST['term'],
    'position' => $_REQUEST['position'],
    'elected_date' => $_REQUEST['elected_date'],
    'remarks' => $_REQUEST['remarks']
), array('oc_id' => $_POST['oc_id']));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>

