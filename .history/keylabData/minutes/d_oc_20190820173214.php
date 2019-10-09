<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$minutes_id = $_REQUEST['minutes_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_minutes",array("minutes_id"=>$minutes_id));
if($status===false){
    $rv->status = false;
}else{
    $rv->status =true;
}
exit(json_encode($rv));
?>