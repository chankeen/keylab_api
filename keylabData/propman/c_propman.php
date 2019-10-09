<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property_propman", array(
    'property_id' => $_REQUEST['property_id'],
    'user_id' => $_REQUEST['user_id'],
    'position' => $_REQUEST['position'],
    'remarks' => $_REQUEST['remarks']
), array(
    "%d", "%d",
    "%s", "%s"
));

if($_REQUEST['position'] == '保安員'){
    $status = $wpdb->insert("keylab_property_propman_security", array(
        'propman_id' => $wpdb->insert_id,
        'shift'      => $_REQUEST['shift'],
        'birth_date' => $_REQUEST['birth_date'],
        'cert_due_date' => $_REQUEST['cert_due_date'],
        'cert_no' => $_REQUEST['cert_no'],
        'body_check_file' => serialize($_REQUEST['body_check_file'])
    ), array(
        "%d", "%s",'%s',
        "%s", "%s",'%s'
    ));
}
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));


?>