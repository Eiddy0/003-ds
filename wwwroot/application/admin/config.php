<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------
    'template'               => [
        // 模板引擎类型 支持 php think 支持扩展
        'view_suffix'  => 'htm',
    ],

    'view_replace_str'  =>  [
    '__PUBLIC__'=>'/public/',
    '__ROOT__' => '/',
    '__ADMIN__' => '/public/static/admin',
    ],

    
];
