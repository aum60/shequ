<?php
return array(
    //'配置项'=>'配置值'
    /* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型
//    'DB_HOST'               => '10.19.200.60', // 服务器地址
//    'DB_NAME'               => 'shequ', // 数据库名
//    'DB_USER'               => 'shequ',      // 用户名
//    'DB_PWD'                => 'shEQu_Pwd',          // 密码

//	'DB_HOST'               => 'localhost', // 服务器地址
//	'DB_NAME'               => 'bbs', // 数据库名
//	'DB_USER'               => 'root',      // 用户名
//	'DB_PWD'                => '',          // 密码

    'DB_HOST'               => '127.0.0.1', // 服务器地址
    'DB_NAME'               => 'cms', // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => 'root',          // 密码

    'DB_PORT'               => '3306',        // 端口
    'DB_PREFIX'             => 'bbs_',    // 数据库表前缀
    'DB_CHARSET' => 'utf8',


    //URL模式 PATHINFO模式（默认模式）
    'URL_MODEL'=>1,
    'URL_PATHINFO_DEPR'=>'/',//设置URL地址中参数之间的分隔符

    //'SHOW_PAGE_TRACE' =>true, // 显示页面Trace信息（调试）
    'SUPERMAN' => array('admin','zenghaitao'), //后台管理员name
    'ADMIN_ID' => array(55,337),    //后台管理员id
    'USER_AUTH_KEY' => 'adminuser',//后台登录用户SESSION的下标值

    //设置表单令牌
    //'TOKEN_ON'=>true,//是否开启令牌验证


    /*Smarty模板的配置*/
    //开启Smarty模板的支持
    //使用的模板引擎名
    'TMPL_ENGINE_TYPE'     => 'Smarty',
    //url不区分大小写
    'URL_CASE_INSENSITIVE' => false,
    //模板引擎相关的设置
    'TMPL_ENGINE_CONFIG'   => array(
        //是否缓存模板
        'caching'          => false,
        //模板目录
        'template_dir'     => TMPL_PATH,
        //模板编译目录
        'compile_dir'      => CACHE_PATH,
        //缓存目录
        'cache_dir'        => TEMP_PATH,
        //左定界符
        'left_delimiter'   => '<{',
        //右定界符
        'right_delimiter'  => '}>',
    ),
    //自定义跳转页面
    'TMPL_ACTION_SUCCESS' => 'Public:jump',
    'TMPL_ACTION_ERROR' => 'Public:jump',
);
?>
