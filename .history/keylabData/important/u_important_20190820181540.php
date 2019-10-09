<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_important", array(
    'property_id' => $_REQUEST['property_id'],
    'type' => $_REQUEST['type'],
    'known_date' => $_REQUEST['known_date'],
    'deadline' => $_REQUEST['deadline'],
    'content' => $_REQUEST['content'],
    'remarks' => $_REQUEST['remarks'],
    'important_file' => $_REQUEST['important_file']
), array('important_id' => $_POST['important_id']));
if ($status === false) {
    $rv->status = false;
} else {
    $rv->status = true;
}
exit(json_encode($rv));
?>

