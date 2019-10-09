<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$term_contract_id = $_REQUEST['term_contract_id'];
$rv = new stdClass();

$sql_statment = "SELECT main.*,users.name_zh,users.name_en,users.login_tel FROM `keylab_property_term_contract_related_entity` as main
left join keylab_property_propman as propman on propman.propman_id = main.related_id and main.type = 'propman'
left join keylab_property_contractor as contractor on contractor.contractor_id = main.related_id and main.type = 'contractor'
left join keylab_property_oc as oc on oc.oc_id = main.related_id and main.type = 'oc'
left join keylab_users as users on 
(CASE
    WHEN main.type = 'propman' THEN users.user_id = propman.propman_id
 	WHEN main.type = 'contractor' THEN users.user_id = contractor.contractor_id
    ELSE users.user_id = oc.oc_id
END)";
$where = " where ";

if (!empty($term_contract_id)){
    $where = $where."main.term_contract_id = ".$term_contract_id." and ";
}

$where = substr($where, 0, -5);

if(strlen($where) > 5){
    $sql_statment = $sql_statment.$where;
}

$result = $wpdb->get_results($sql_statment);
$rv->list = $result;
foreach ($rv->list as $item){
    $item->file = unserialize($item->file) ?: [];
}
exit(json_encode($rv));
?>