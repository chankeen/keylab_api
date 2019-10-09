<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$propman_id = $_REQUEST['propman_id'];
$property_id = $_REQUEST['property_id'];
$user_id = $_REQUEST['user_id'];

$rv = new stdClass();

$sql_statment = "select IF(STRCMP(a.position,'保安員') = 0,concat(a.position,'(',c.shift,')'),a.position) as display_position,a.*,b.name_zh,b.name_en,b.login_tel,b.email,c.birth_date,c.cert_due_date,c.cert_no,c.body_check_file,c.shift from keylab_property_propman as a left join keylab_users as b on a.user_id = b.user_id left join keylab_property_propman_security as c on a.propman_id = c.propman_id";
$where = " where ";

if (!empty($propman_id)){
    $where = $where."propman_id = ".$propman_id." and ";
}
if (!empty($property_id)){
    $where = $where."property_id = ".$property_id." and ";
}
if (!empty($user_id)){
    $where = $where."user_id = ".$user_id." and ";
}
$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;

foreach ($rv->list as $item){
    $item->body_check_file = unserialize($item->body_check_file) ?: [];
}

exit(json_encode($rv));
?>