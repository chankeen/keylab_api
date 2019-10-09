<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$propman_id = $_REQUEST['propman_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_propman",array("propman_id"=>$propman_id));
if($status===false){
    $rv->status = false;
}else{
    $rv->status =true;
}
exit(json_encode($rv));
?>