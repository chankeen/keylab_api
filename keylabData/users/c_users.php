<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_users", array(
    'status' => $_REQUEST['status'],
    'type' => $_REQUEST['type'],
    'name_zh' => $_REQUEST['name_zh'],
    'name_en' => $_REQUEST['name_en'],
    'login_tel' => $_REQUEST['login_tel'],
    'backup_tel' => $_REQUEST['backup_tel'],
    'email' => $_REQUEST['email'],
    'fax' => $_REQUEST['fax'],
    'created_by' => $_REQUEST['created_by']
), array(
    "%s", "%s","%s",
    "%s", "%d", "%s","%s","%s","%d"
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