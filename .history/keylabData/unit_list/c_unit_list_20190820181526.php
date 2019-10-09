<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_unit_list", array(
    'property_id' => $_REQUEST['property_id'],
    'floor' => $_REQUEST['type'],
    'unit' => $_REQUEST['known_date']
), array(
    "%d", "%s",
    "%s"
));

if ($status === false) {
    $rv->status = false;
    $rv->query = $wpdb->last_query;
} else {
    $rv->status = true;
}
exit(json_encode($rv));


?>