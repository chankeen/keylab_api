<?php
function c_token($admin_wp_id,$users_id,$token){
    $rv = new stdClass();
    $status = false;
    
    echo('test');
    global $wpdb;
    $status = $wpdb->insert("keylab_users_token",array(
        'admin_wp_id' => $admin_wp_id,
        'users_ud'    => $users_id,
        'token'       => $token
    ), array(
        "%d", "%d",
        "%s"
    ));


    return $status;
}
?>