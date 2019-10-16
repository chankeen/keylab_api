<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_users", array(
    'status' => $_REQUEST['status'],
    'type' => $_REQUEST['type'],
    'category' => $_REQUEST['category'],
    'name_zh' => $_REQUEST['name_zh'],
    'name_en' => $_REQUEST['name_en'],
    'address_zh' => $_REQUEST['address_zh'],
    'address_en' => $_REQUEST['address_en'],
    'status' => $_REQUEST['status'],
    'login_tel' => $_REQUEST['login_tel'],
    'backup_tel' => $_REQUEST['backup_tel'],
    'email' => $_REQUEST['email'],
    'fax' => $_REQUEST['fax'],
    'created_by' => $_REQUEST['created_by']
), array('user_id' => $_POST['user_id']));
if ($status === false) {
    $rv->status = false;
    $rv->error = $wpdb->last_error;
} else {
    $rv->status = true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>

