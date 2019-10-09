<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_unit_list", array(
    'property_id' => $_REQUEST['property_id'],
    'floor' => $_REQUEST['floor'],
    'unit' => $_REQUEST['unit']
), array('unit_id' => $_POST['unit_id']));
if ($status === false) {
    $rv->status = false;
} else {
    $rv->status = true;
}
exit(json_encode($rv));
?>

