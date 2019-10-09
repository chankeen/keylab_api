<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property", array(
    'admin_wp_id' => $_POST['admin_wp_id'],
    'build_year' => $_POST['build_year'],
    'agm_date' => $_POST['agm_date'],
    'status' => $_POST['status'],
    'name_zh' => $_POST['name_zh'],
    'name_en' => $_POST['name_en'],
    'address_zh' => $_POST['address_zh'],
    'address_en' => $_POST['address_en'],
    'type' => $_POST['type'],
    'floor_amount' => $_POST['floor_amount'],
    'unit_amount' => $_POST['unit_amount'],
    'total_size' => $_POST['total_size']
), array(
    "%d", "%d",
    "%s", "%s", "%s", "%s", "%s",
    "%s", "%s", "%s", "%s", "%s",
));

if ($status === false) {
    $rv->status = false;
    $rv->query = $wpdb->last_query;
} else {
    $rv->status = true;
}
exit(json_encode($rv));


?>