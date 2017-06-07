<?php

//ThinkPHP框架入口
//开启调试模式
define("APP_DEBUG", true);

//1.定义我们的项目名称
define("APP_NAME", "home");

//2.定义当前项目的路径
define("APP_PATH", "./Home/");
//定义绝对路径
define("Cover_Upload_Path", dirname(__FILE__) . DIRECTORY_SEPARATOR . "Public" . DIRECTORY_SEPARATOR . "Uploads" . DIRECTORY_SEPARATOR . "cover" . DIRECTORY_SEPARATOR);
ini_set('session.gc_maxlifetime', 3600 * 24 * 15);
//3.导入入口文件
require("./ThinkPHP/ThinkPHP.php");
