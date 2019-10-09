<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property", array(
    'build_year' => $_REQUEST['build_year'],
    'agm_date' => $_REQUEST['agm_date'],
    'status' => $_REQUEST['status'],
    'name_zh' => $_REQUEST['name_zh'],
    'name_en' => $_REQUEST['name_en'],
    'address_zh' => $_REQUEST['address_zh'],
    'address_en' => $_REQUEST['address_en'],
    'oc_exist' => $_REQUEST['oc_exist'],
    'type' => $_REQUEST['type'],
    'floor_amount' => $_REQUEST['floor_amount'],
    'unit_amount' => $_REQUEST['unit_amount'],
    'total_size' => $_REQUEST['total_size'],
    'floor_plan_file' => serialize($_REQUEST['floor_plan_file']),
    'dmc_file' => serialize($_REQUEST['dmc_file'])
), array('property_id' => $_POST['property_id']), array(
    "%d",
    "%s", "%s", "%s", "%s", "%d", "%s",
    "%s", "%s", "%s", "%s", "%s", "%s", "%s"
));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
    $rv->wpdb = $wpdb;
}
exit(json_encode($rv));
?>

