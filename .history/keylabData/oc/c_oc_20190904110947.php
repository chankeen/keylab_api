<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_oc", array(
    'property_id' => $_REQUEST['property_id'],
    'user_id' => $_REQUEST['user_id'],
    'year_from' => $_REQUEST['year_from'],
    'year_to' => $_REQUEST['year_to'],
    'term' => $_REQUEST['term'],
    'position' => $_REQUEST['position'],
    'elected_date' => $_REQUEST['elected_date'],
    'introduction' => $_REQUEST['introduction']
), array(
    "%d", "%d",
    "%d", "%d", "%d", "%s", "%s", "%s"
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