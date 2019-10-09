<?php
//Template Name: api-login

define(__('URL parameter missing', 'orm_keylab' ),-1);
define(__('Username not exist', 'orm_keylab' ),-2);
define(__('Password incorrect', 'orm_keylab' ),-3);
define(__('Success', 'orm_keylab' ),1);
define(__('Unknown failure', 'orm_keylab' ),-4);

//INPUT
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$rv = new stdClass();
$rv->rc = 0;
$rv->msg ="";
echo $username;
echo $password;

if (!empty($username)&&!empty($password)) {
    $creds = array();
    $creds['user_login'] = $username;
    $creds['user_password'] = $password;
    $creds['remember'] = false;
    $user = wp_signon( $creds, false );
    if (!is_wp_error($user)) {
        wp_set_current_user( $user->ID, $user->user_login );
        wp_set_auth_cookie( $user->ID );
        do_action( 'wp_login', $user->user_login );
        $current_user =  wp_get_current_user();
        $rv->token = bin2hex(random_bytes(64));
        $_SESSION['token'] =$rv->token;
        $rv->rc = constant(__('Success', 'orm_keylab' ));
        $rv->msg = __('Success', 'orm_keylab' );
    } else {
        $rv->rc = constant(__('Unknown failure', 'orm_keylab' ));
        $rv->msg = _('Unknown failure', 'orm_keylab' );
        if(strpos($user->get_error_message(),'Invalid')>-1){
            $rv->rc = constant(__('Username not exist', 'orm_keylab' ));
            $rv->msg = __('Username not exist', 'orm_keylab' );
        }else if(strpos($user->get_error_message(),'incorrect')>-1){
            $rv->rc = constant(__('Password incorrect', 'orm_keylab' ));
            $rv->msg = __('Password incorrect', 'orm_keylab' );
        }
    }
}else{
    $rv->rc = constant(__('URL parameter missing', 'orm_keylab' ));
    $rv->msg = __('URL parameter missing', 'orm_keylab' );
}
echo json_encode($rv);
?>



