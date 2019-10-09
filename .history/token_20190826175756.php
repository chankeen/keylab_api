<?php
function c_token($admin_wp_id,$users_id,$token){
    $rv = new stdClass();
    $status = false;

    global $wpdb;
    $status = $wpdb->insert("keylab_users_token",array(
        'admin_wp_id' => $admin_wp_id,
        'users_ud'    => $users_id,
        'token'       => $token
    ), array(
        "%d", "%d",
        "%s"
    ));

    if ($status === false) {
        $rv->status = false;
        $rv->query = $wpdb->last_query;
    } else {
        $rv->status = true;
    }
}
?>