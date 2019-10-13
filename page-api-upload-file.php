<?php
/*Template Name: upload-file*/
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );
$rv = new stdClass();
if(isset($_FILES['orm_file'])){
    $uploadedfile = $_FILES['orm_file'];
    $filename = basename($uploadedfile['name']);
    $allowed = array('jpeg','gif','png' ,'jpg','pdf','bmp','docx','doc','xls');
    $etx = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    if(!in_array($etx,$allowed)){
        $error = true;
        $rv->etx = $etx;
        $rv->error_msg = "File type no supported";
    }
    if($error==false){
        $attachment_id = media_handle_upload('orm_file',0);
        if(!is_wp_error($attachment_id)){
            $rv->error = false;
            $rv->id  = $attachment_id;
            $rv->name=$_FILES['orm_file']['name'];
            $post = get_post($attachment_id);
            $rv->url = $post->guid;
            $post->post_excerpt = $rv->type.",".$rv->year;
            wp_update_post($post);
            update_post_meta($attachment_id,'file_info',$_FILES['orm_file']);
        }else{
            $rv->error = true;
            $rv->error_msg = $attachement_id->get_error_messages();
        }
    }
}
echo json_encode($rv);
?>
