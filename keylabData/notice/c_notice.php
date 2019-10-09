<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_notice", array(
    'property_id' => $_REQUEST['property_id'],
    'title' => $_REQUEST['title'],
    'notice_date' => $_REQUEST['notice_date'],
    'notice_file' => serialize($_REQUEST['notice_file']),
    'remarks'   => $_REQUEST['remarks']
), array(
    "%d", "%s",
    "%s", "%s", "%s"
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