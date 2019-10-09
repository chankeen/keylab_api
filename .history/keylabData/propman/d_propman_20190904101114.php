<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$propman_id = $_REQUEST['propman_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_propman",array("propman_id"=>$propman_id));
if($status===false){
    $rv->status = false;
    $rv->error = $wpdb->last_error;
}else{
    $rv->status =true;
}
    $rv->wpdb = $wpdb;
exit(json_encode($rv));
?>