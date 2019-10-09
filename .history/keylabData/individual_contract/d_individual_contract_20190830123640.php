<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$individual_contract_id = $_REQUEST['individual_contract_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_individual_contract",array("individual_contract_id"=>$individual_contract_id));
var_dump($wpdb);
if($status===false){
    $rv->status = false;
}else{
    $rv->status =true;
}
exit(json_encode($rv));
?>