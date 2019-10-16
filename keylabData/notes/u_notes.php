<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_notes", array(
    'property_id' => $_REQUEST['property_id'],
    'title' => $_REQUEST['title'],
    'content' => $_REQUEST['content'],
    'note_file' => serialize($_REQUEST['note_file'])
), array('note_id' => $_POST['note_id']));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>

