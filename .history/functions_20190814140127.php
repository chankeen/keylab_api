<?php
add_theme_support('post-thumbnails'); // 缩略图支持

function add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','add_cors_http_header');
/**
 * 注册post类型，用于获取缩略图信息
 * @return [type] [description]
 */
function yt_setup_post()
{
    $args_block = array(
        'label'        => __('大廈', 'ormedia'),
        'show_ui'      => true,
        'show_in_menu' => true,
        'supports'     => array('title', 'author'),
    );
    $args_entity = array(
        'label'        => __('個人或公司', 'ormedia'),
        'show_ui'      => true,
        'show_in_menu' => true,
        'supports'     => array('title', 'editor', 'author'),
    );
    $args_contract = array(
        'label'        => __('物業合約', 'ormedia'),
        'show_ui'      => true,
        'show_in_menu' => true,
        'supports'     => array('title', 'author'),
    );
    register_post_type('orm_block', $args_block);
    register_post_type('orm_entity', $args_entity);
    register_post_type('orm_contract', $args_contract);
}

add_action('init', 'yt_setup_post');
?>
