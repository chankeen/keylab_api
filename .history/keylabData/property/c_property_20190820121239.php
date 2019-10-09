<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property", array(
    'admin_wp_id' => $_REQUEST['admin_wp_id'],
    'build_year' => $_REQUEST['build_year'],
    'agm_date' => $_REQUEST['agm_date'],
    'status' => $_REQUEST['status'],
    'name_zh' => $_REQUEST['name_zh'],
    'name_en' => $_REQUEST['name_en'],
    'address_zh' => $_REQUEST['address_zh'],
    'address_en' => $_REQUEST['address_en'],
    'type' => $_REQUEST['type'],
    'floor_amount' => $_REQUEST['floor_amount'],
    'unit_amount' => $_REQUEST['unit_amount'],
    'total_size' => $_REQUEST['total_size']
), array(
    "%d", "%d",
    "%s", "%s", "%s", "%s", "%s",
    "%s", "%s", "%s", "%s", "%s"
));

if ($status === false) {
    $rv->status = false;
    $rv->query = $wpdb->last_query;
} else {
    $rv->status = true;
}
exit(json_encode($rv));


?>