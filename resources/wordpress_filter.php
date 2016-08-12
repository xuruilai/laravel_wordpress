<?php
/**
 * Created by IntelliJ IDEA.
 * User: jackylai
 * Date: 10/8/2016
 * Time: 上午11:29
 */


add_filter('all', function($tag, $value = null){


//    if($tag == 'query'){
//        throw new Exception();
//    }

    if($tag ==  'gettext' || $tag == 'gettext_with_context' || $tag == 'get_post_metadata'){
        return;
    }

    switch(true)
    {
        case is_array($value):
            \Log::error(sprintf("%s => array", $tag, var_export($value, true)));
            break;
        case is_object($value):
            \Log::error(sprintf("%s => %s", $tag, get_class($value)));
            break;
        default:  \Log::error(sprintf("%s => %s", $tag, $value));
    }

});


add_filter('pre_get_site_by_path', function(){
    $site = new stdClass();
    $site->blog_id = 1;
    $site->site_id = 1;
    $site->domain = 'blog.coding.lxr';
    $site->path = '/';

    return $site;
});


add_filter('pre_site_option_site_name', function(){
   return '修改完的Blog';
});

add_filter('pre_site_option_ms_files_rewriting', function(){
    return 1;
});

add_filter('pre_site_option_active_sitewide_plugins', function(){
    return [];
});

add_filter('pre_site_option_siteurl', function(){
    return 'blog.coding.lxr';
});
