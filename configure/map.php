<?php

// +----------------------------------------------------------------------
// | LinkPHP [ Link All Thing ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 http://linkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liugene <liujun2199@vip.qq.com>
// +----------------------------------------------------------------------
// |               映射文件
// +----------------------------------------------------------------------

return [
    //psr4命名空间注册
    'autoload_namespace_psr4'   =>  [
	    'app'         =>  array(ROOT_PATH . 'application'),
        'linkphp\\'               =>  array(ROOT_PATH . 'framework/linkphp'),
        //'extend\\helper\sms'               =>  array(EXTEND_PATH . 'helper/sms'),
    ],
    //psr0命名空间
    'autoload_namespace_psr0' => [
        //'命名空间' => '映射路径地址'
    ],
    //指定自动加载机制排序
    'autoload_namespace_file' => [
        //'文件名' => '映射路径地址'
        'app_func'                => LOAD_PATH . 'auto/functions.php',
        'framework_func'          => BOOT_PATH . 'functions.php'
    ],
    'class_autoload_map' => [
        //'类名' => '类文件地址'
        'Configure'  => CORE_PATH . 'Configure' . EXT,
    ],
];