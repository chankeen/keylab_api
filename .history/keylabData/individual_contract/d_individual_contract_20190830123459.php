<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$indiviual_contract_id = $_REQUEST['indiviual_contract_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_indiviual_contract",array("indiviual_contract_id"=>$indiviual_contract_id));
var_dump($wpdb);
if($status===false){
    $rv->status = false;
}else{
    $rv->status =true;
}
exit(json_encode($rv));
?>