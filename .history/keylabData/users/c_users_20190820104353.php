<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_users", array(
    'status' => $_REQUEST['status'],
    'name_zh' => $_REQUEST['name_zh'],
    'name_en' => $_REQUEST['name_en'],
    'status' => $_REQUEST['status'],
    'login_tel' => $_REQUEST['login_tel'],
    'email' => $_REQUEST['email'],
    'created_by' => $_REQUEST['created_by']
), array(
    "%s", "%s",
    "%s", "%s", "%d", "%s", "%d"
));

if ($status === false) {
    $rv->status = false;
    $rv->query = $wpdb->last_query;
} else {
    $rv->status = true;
}
exit(json_encode($rv));


?>