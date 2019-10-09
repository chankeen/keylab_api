<?php
//Template Name: api-login

define(_e('URL parameter missing', 'orm_keylab' ),-1);
define(_e('Username not exist', 'orm_keylab' ),-2);
define(_e('Password incorrect', 'orm_keylab' ),-3);
define(_e('Success', 'orm_keylab' ),1);
define(_e('Unknown failure', 'orm_keylab' ),-4);

$rv = new stdClass();
$rv->rc = 0;
$rv->msg ="";
if (!empty($_POST['login'])&&!empty($_POST['password'])) {
    $creds = array();
    $creds['user_login'] = $_POST['login'];
    $creds['user_password'] = $_POST['password'];
    $creds['remember'] = false;
    $user = wp_signon( $creds, false );
    if (!is_wp_error($user)) {
        wp_set_current_user( $user->ID, $user->user_login );
        wp_set_auth_cookie( $user->ID );
        do_action( 'wp_login', $user->user_login );
        $current_user =  wp_get_current_user();
        $rv->token = bin2hex(random_bytes(64));
        $_SESSION['token'] =$rv->token;
        $rv->rc = constant(_e('Success', 'orm_keylab' ));
        $rv->msg = _e('Success', 'orm_keylab' );
    } else {
        $rv->rc = constant(_e('Unknown failure', 'orm_keylab' ));
        $rv->msg = "Unknown failure";
        if(strpos($user->get_error_message(),'Invalid')>-1){
            $rv->rc = constant('name Invalid');
            $rv->msg = 'name Invalid';
        }else if(strpos($user->get_error_message(),'incorrect')>-1){
            $rv->rc = constant('psw incorrect');
            $rv->msg = 'password incorrect';
        }
    }
}else{
    $rv->rc = constant('url参数不全');
    $rv->msg = 'url参数不全';
}
echo json_encode($rv);
?>



