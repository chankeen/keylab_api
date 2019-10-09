<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_minutes", array(
    'property_id' => $_REQUEST['property_id'],
    'type' => $_REQUEST['type'],
    'oc_term' => $_REQUEST['oc_term'],
    'minutes_term' => $_REQUEST['minutes_term'],
    'minutes_file' => $_REQUEST['minutes_file']
), array('minutes_id' => $_POST['minutes_id']));
if ($status === false) {
    $rv->status = false;
} else {
    $rv->status = true;
}
exit(json_encode($rv));
?>

