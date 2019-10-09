<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}

$rv = new stdClass();
$status = false;

$status = $wpdb->insert("keylab_property", array(
    'term_contract_id' => $_REQUEST['term_contract_id'],
    'extra_contract' => $_REQUEST['extra_contract'],
    'type' => $_REQUEST['type'],
    'handler' => $_REQUEST['status'],
    'regular_report_file' => $_REQUEST['regular_report_file']
), array(
    "%d", "%d",
    "%s", "%s", "%s"
));

if ($status === false) {
    $rv->status = false;
    $rv->query = $wpdb->last_query;
} else {
    $rv->status = true;
}
exit(json_encode($rv));


?>