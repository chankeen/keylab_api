<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_regular_report", array(
    'type' => $_REQUEST['type']
), array('regular_report_id' => $_POST['regular_report_id']));
if ($status === false) {
    $rv->status = false;
} else {
    $rv->status = true;
}
exit(json_encode($rv));
?>

