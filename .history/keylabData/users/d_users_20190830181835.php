<?php
if(isset($_GET['checking_api_file'])){
    exit();
}
$user_id = $_REQUEST['user_id'];

$rv = new stdClass();
$status = $wpdb->delete("keylab_users",array("user_id"=>$user_id));
if($status===false){
    $rv->status = false;
    $rv->wpdb = $wpdb;
}else{
    $rv->status =true;
}
exit(json_encode($rv));
?>