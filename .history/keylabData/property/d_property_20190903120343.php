<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$property_id = $_REQUEST['property_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property",array("property_id"=>$property_id));
if($status===false){
    $rv->status = false;
    $rv->error = $wpdb->last_error;
}else{
    $rv->status =true;
}
exit(json_encode($rv));
?>