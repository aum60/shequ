<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 10:09:50
         compiled from "./Admin/Tpl\Public\login.html" */ ?>
<?php /*%%SmartyHeaderCode:869259360eeeb8efd2-73519601%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '754afcf016435756ef11c645ae70896ba2ab8d15' => 
    array (
      0 => './Admin/Tpl\\Public\\login.html',
      1 => 1490607864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '869259360eeeb8efd2-73519601',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59360eeedd50e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59360eeedd50e')) {function content_59360eeedd50e($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>用户登录</title>
        <link rel="stylesheet" href="__PUBLIC__/css/login.css" type="text/css" charset="utf-8">
        <script src="__PUBLIC__/dwz/js/jquery-1.7.1.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            function fleshVerify(type){ 
	            //重载验证码
	            var timenow = new Date().getTime();
	            if (type){
		            $('#verifyImg').attr("src", '__URL__/verify/adv/1/'+timenow);
	            }else{
		            $('#verifyImg').attr("src", '__URL__/verify/'+timenow);
	            }
            }
        </script>
    </head>
    <body>
        <div id="login">
            <div id="top">
                <div id="top_left">
                    <img src="__PUBLIC__/images/login_03.gif">
                </div>
                <div id="top_center"></div>
            </div>

            <div id="center">
                <div id='center_left'></div>
                <div id="center_middle">
        
                    <form action="__URL__/checkLogin" method="post">
                    <div id="user">用 户
                        <input class='text' type='text' name='username'>
                    </div>
                    <div id="password">密 码
                        <input class='text' type='password' name='password'>
                    </div>
                    <div id="verify">验证码
                        <input class="verifytext" type="text" name="verify">
                        <span><img id="verifyImg" src="__URL__/verify/" onclick="fleshVerify()" border="0" alt="点击刷新验证码" style="cursor:pointer" align="absmiddle"></span>
                    </div>
                    <div id='btn'>
                        <input type='submit' name='sub' value='登 录'>
                        <input type='reset' name='res' value='重 置'>
                    </div>
                    <div id="error">
                        <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['errorinfo']->value;?>
</span>
                    </div>
                    </form>
                </div>
                <div id='center_right'></div>
            </div>

            <div id="down">
                <div id="down_left">
                    <div id="inf">
                        <span class='inf_text'>网通社汽车</span>
                        <span class='copyright'><b>论坛管理系统 2014-2-25</b></span>
                    </div>
                </div>
                <div id='down_center'>
                    <font color="red">
                    <<?php ?>?php
                        //根据错误信息写出对应的错误内容
                        switch($_GET['errno']){
                            case 1: echo "登录账号不存在！";break;
                            case 2: echo "登录密码错误！";break;
                        }
                    ?<?php ?>>
                    </font>
                </div>
            </div>
        </div>
    </body>
</html>
<?php }} ?>