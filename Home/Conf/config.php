<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/4/28
 * Time: 10:04
 */

$SITE_URL = "http://shequ.news18a.com/";
define('URL_CALLBACK', "" . $SITE_URL . "Index/callback?type=");
return array(
    //从库配置
    'DB_TYPE' => 'mysql', // 数据库类型
//    'DB_HOST' => '10.19.200.55', // 服务器地址
//    'DB_NAME' => 'shequ', // 数据库名
//    'DB_USER' => 'shequ', // 用户名
//    'DB_PWD' => 'shEQu_Pwd', // 密码

//    'DB_HOST' => 'localhost', // 服务器地址
//    'DB_NAME' => 'bbs', // 数据库名
//    'DB_USER' => 'root', // 用户名
//    'DB_PWD' => '', // 密码

    'DB_HOST' => '127.0.0.1', // 服务器地址
    'DB_NAME'               => 'cms', // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => 'root',          // 密码

    'DB_PORT' => '3306', // 端口
    'DB_PREFIX' => 'bbs_', // 数据库表前缀
    'DB_CHARSET' => 'utf8',
    //URL模式 PATHINFO模式（默认模式）
    'URL_MODEL' => 1,
    'URL_PATHINFO_DEPR' => '/', //设置URL地址中参数之间的分隔符
    //'SHOW_PAGE_TRACE' =>true, // 显示页面Trace信息（调试）
    //"USER_AUTH_KEY" => "user1",
    'USER_AUTH_KEY' => 'user', //前台登录用户SESSION的下标值
    //设置表单令牌
    //'TOKEN_ON'=>true,//是否开启令牌验证


    /* Smarty模板的配置 */
    //开启Smarty模板的支持
    //使用的模板引擎名
    'TMPL_ENGINE_TYPE' => 'Smarty',
    //url不区分大小写
    'URL_CASE_INSENSITIVE' => false,
    //模板引擎相关的设置
    'TMPL_ENGINE_CONFIG' => array(
        //是否缓存模板
        'caching' => false,
        //模板目录
        'template_dir' => TMPL_PATH,
        //模板编译目录
        'compile_dir' => CACHE_PATH,
        //缓存目录
        'cache_dir' => TEMP_PATH,
        //左定界符
        'left_delimiter' => '<{',
        //右定界符
        'right_delimiter' => '}>',
    ),
    //自定义跳转页面
    'TMPL_ACTION_SUCCESS' => 'Public:jump',
    'TMPL_ACTION_ERROR' => 'Public:jump',
    //主库配置
    'DB_CONFIG2' => array(
        'DB_TYPE' => 'mysql', // 数据库类型
//        'DB_HOST' => '10.19.200.60', // 服务器地址
//        'DB_NAME' => 'shequ', // 数据库名
//        'DB_USER' => 'shequ', // 用户名
//        'DB_PWD' => 'shEQu_Pwd', // 密码

//        'DB_HOST' => 'localhost', // 服务器地址
//        'DB_NAME' => 'bbs', // 数据库名
//        'DB_USER' => 'root', // 用户名
//        'DB_PWD' => '', // 密码

        'DB_HOST' => '127.0.0.1', // 服务器地址
        'DB_NAME'               => 'cms', // 数据库名
        'DB_USER'               => 'root',      // 用户名
        'DB_PWD'                => 'root',          // 密码

        'DB_PORT' => '3306', // 端口
        'DB_PREFIX' => 'bbs_', // 数据库表前缀
        'DB_CHARSET' => 'utf8'// 数据库编码默认采用utf8
//        'DB_PARAMS' => array(), // 数据库连接参数
//        'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志
//        'DB_FIELDS_CACHE' => true, // 启用字段缓存
//        'DB_CHARSET' => 'utf8', // 数据库编码默认采用utf8
//        'DB_DEPLOY_TYPE' => 0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
//        'DB_RW_SEPARATE' => false, // 数据库读写是否分离 主从式有效
//        'DB_MASTER_NUM' => 1, // 读写分离后 主服务器数量
//        'DB_SLAVE_NO' => '', // 指定从服务器序号
    ),
    /* 第三方登录配置 */
    'URL_ROUTER_ON' => true,
    'URL_ROUTE_RULES' => array(
        '/^login/' => 'Login/lists',
    ),
    //腾讯QQ登录配置
    'THINK_SDK_QQ' => array(
        'APP_KEY' => '1105517665', //应用注册成功后分配的 APP ID
        'APP_SECRET' => 'Au2LGcUGUKiBzLU8', //应用注册成功后分配的KEY
        'CALLBACK' => URL_CALLBACK . 'qq',
    ),
    //新浪微博配置
    'THINK_SDK_SINA' => array(
        'APP_KEY' => '120967331', //应用注册成功后分配的 APP ID
        'APP_SECRET' => '8aa15f65593eaf9e787baec45a801296', //应用注册成功后分配的KEY
        'CALLBACK' => URL_CALLBACK . 'sina',
    ),
    //人人网配置
    'THINK_SDK_RENREN' => array(
        'APP_KEY' => '', //应用注册成功后分配的 APP ID
        'APP_SECRET' => '', //应用注册成功后分配的KEY
        'CALLBACK' => URL_CALLBACK . 'renren',
    )
);
