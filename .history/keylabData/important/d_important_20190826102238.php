<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$important_id = $_REQUEST['important_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_important",array("important_id"=>$important_id));
if($status===false){
    $rv->status = false;
}else{
    $rv->status =true;
}
exit(json_encode($rv));
?>