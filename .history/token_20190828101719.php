<?php
function insert_token($admin_wp_id,$user_id,$token){
    if(r_token($admin_wp_id,$user_id)){
        u_token($admin_wp_id,$user_id,$token);
        echo 'hi';
    }else{
        c_token($admin_wp_id,$user_id,$token);
    }
    return true;
}
function r_token($admin_wp_id,$users_id){
    $rv = new stdClass();
    $status = false;
    
    global $wpdb;
    if($admin_wp_id == 0 ){
        $sql_statement = 'select * from keylab_users_token where admin_wp_id = '.$admin_wp_id;
        return $wpdb->get_row($sql_statement);
    }else{
        $sql_statement = 'select * from keylab_users_token where users_id = '.$users_id;
        return $wpdb->get_row($sql_statement);
    }
}
function c_token($admin_wp_id,$users_id,$token){
    $rv = new stdClass();
    $status = false;
    
    global $wpdb;
    $status = $wpdb->insert("keylab_users_token",array(
        'admin_wp_id' => $admin_wp_id,
        'users_id'    => $users_id,
        'token'       => $token
    ), array(
        "%d", "%d",
        "%s"
    ));

    return $status;
}
function u_token($admin_wp_id,$users_id,$token){
    $rv = new stdClass();
    $status = false;
    
    global $wpdb;
    if($admin_wp_id == 0 ){
        $status = $wpdb->update("keylab_users_token",array(
            'token'       => $token,
            'token_creation_timestamp'  => time()
        ), array(
            'users_id'    => $users_id
        ));
    }else{
        $status = $wpdb->update("keylab_users_token",array(
            'token'       => $token,
            'token_creation_timestamp'  => time()
        ), array(
            'admin_wp_id'    => $users_id
        ));
    }
    var_dump($wpdb);
    return $status;
}
?>