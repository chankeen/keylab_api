<?php
if (isset($_GET['checking_api_file'])) {
    exit();
}
$rv = new stdClass();
$status = false;
$status = $wpdb->update("keylab_property_propman", array(
    'property_id' => $_REQUEST['property_id'],
    'user_id' => $_REQUEST['user_id'],
    'position' => $_REQUEST['position'],
    'remarks' => $_REQUEST['remarks']
), array('propman_id' => $_REQUEST['propman_id']));

if($_REQUEST['position'] == '保安員'){
    $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM keylab_property_propman_security WHERE propman_id = ". $_REQUEST['propman_id']);
    if($rowcount == 0){
        $status = $wpdb->insert("keylab_property_propman_security", array(
            'propman_id' => $_REQUEST['propman_id'],
            'birth_date' => $_REQUEST['birth_date'],
            'shift'     => $_REQUEST['shift'],
            'cert_due_date' => $_REQUEST['cert_due_date'],
            'cert_no' => $_REQUEST['cert_no'],
            'body_check_file' => serialize($_REQUEST['body_check_file'])
        ), array(
            "%d", "%s", "%s",
            "%s", "%s",'%s'
        ));
    }else{
        $status = $wpdb->update("keylab_property_propman_security", array(
            'birth_date' => $_REQUEST['birth_date'],
            'cert_due_date' => $_REQUEST['cert_due_date'],
            'shift'     => $_REQUEST['shift'],
            'cert_no' => $_REQUEST['cert_no'],
            'body_check_file' => serialize($_REQUEST['body_check_file'])
        ), array('propman_id' => $_REQUEST['propman_id'])
        , array(
            "%s", "%s",
            "%s", "%s", "%s"
        ),array(
            "%d"
        ));
    }
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

