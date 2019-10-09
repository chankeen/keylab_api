<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$oc_id = $_REQUEST['oc_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_oc",array("oc_id"=>$oc_id));
if($status===false){
    $rv->status = false;
}else{
    $rv->status =true;
}
exit(json_encode($rv));
?>