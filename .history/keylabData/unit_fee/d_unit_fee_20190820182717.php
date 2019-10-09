<?php
if(isset($_GET['checking_api_file'])){
    exit();
}

$unit_id = $_REQUEST['unit_id'];
$unit_file_id = $_REQUEST['unit_file_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_property_unit_fee",array("unit_fee_id"=>$unit_fee_id));
if($status===false){
    $rv->status = false;
}else{
    $rv->status =true;
}
exit(json_encode($rv));
?>