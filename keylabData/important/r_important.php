<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$important_id = $_REQUEST['important_id'];
$property_id = $_REQUEST['property_id'];

$rv = new stdClass();

$sql_statment = "select a.*,b.name_zh,b.name_en,b.login_tel,b.status,IFNULL(c.deadline,a.deadline) as latest_deadline, DATEDIFF(IFNULL(c.deadline,a.deadline),CURDATE()) as date_left  from keylab_property_important as a left join keylab_users as b on a.handler_user_id = b.user_id left join (SELECT * FROM `keylab_property_important_deadline` as a where important_deadline_id = (select max(important_deadline_id) from keylab_property_important_deadline where a.important_id = important_id)) as c on a.important_id = c.important_id";
$where = " where ";

if (!empty($property_id)){
    $where = $where."property_id = ".$property_id." and ";
}
if (!empty($important_id)){
    $where = $where."important_id = ".$important_id." and ";
}

$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;
foreach ($rv->list as $item){
    $item->important_file = unserialize($item->important_file) ?: [];
}
exit(json_encode($rv));
?>