<?php
//Template Name: logout
wp_logout();
$user = wp_get_current_user();
$rv = new stdClass();

if($user->ID==0){
$rv->status = true;
$rv->msg = "success";

}else{
    $rv->status = false;
    $rv->msg = "failed";
}
exit(json_encode($rv))
?>