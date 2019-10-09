<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$contractor_id = $_REQUEST['contractor_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_contractor",array("contractor_id"=>$contractor_id));
if($status===false){
    $rv->status = false;
    $rv->error = $wpdb->last_error;
}else{
    $rv->status =true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>