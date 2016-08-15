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

