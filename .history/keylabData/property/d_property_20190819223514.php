<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$rv = new stdClass();
$status = $wpdb->delete("keylab_property",array("property_id"=>$_POST['property_id']));
if($status===false){
    $rv->status = false;
}else{
    $rv->status =true;
}
exit(json_encode($rv));
?>