<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 09:27:16
         compiled from "./Home/Tpl\Users\login.html" */ ?>
<?php /*%%SmartyHeaderCode:9303593604f4cea5a3-09062455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5eb86b5f52faad6893408a91f10736e2d8252303' => 
    array (
      0 => './Home/Tpl\\Users\\login.html',
      1 => 1492167496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9303593604f4cea5a3-09062455',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'auto_login' => 0,
    'is_checked' => 0,
    'weixin_share' => 0,
    'refer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593604f50ad95',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593604f50ad95')) {function content_593604f50ad95($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>极趣-登录</title>
<link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/css/index.css">
</head>
<body class="ina_f5f5f5">
<?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="ina_silde">
    <div class="ina_login">
        <div class="ina_login_top">
            <p>欢迎加入极趣社区，与千万用户一起分享你的兴趣，收获快乐吧。</p>
            <span>Welcome to Ultimate Delight Community. Share your interests with millions of users and harvest happiness.</span>
        </div>
        <form>
            <ul>
                <li><input type="text" id="username" value="<?php echo $_smarty_tpl->tpl_vars['auto_login']->value[0];?>
" placeholder="手机号"><em class="ina_icon ina_mobile"></em><span><i class="ina_icon"></i>请输入正确的手机号码</span></li>
                <li><input type="password" id="userpass" value="<?php echo $_smarty_tpl->tpl_vars['auto_login']->value[1];?>
" placeholder="密码"><em class="ina_icon ina_password"></em><span><i class="ina_icon"></i>密码错误</span></li>
                <li><label><input type="checkbox" id="auto_login" <?php if ($_smarty_tpl->tpl_vars['is_checked']->value){?>checked="checked"<?php }?> />下次自动登录</label></li>
                <li><a href="javascript:;" id="cur" class="cur">登录</a><a href="__URL__/retrieve_password">忘记密码</a>|<a href="__URL__/index">注册</a></li>
            </ul>
        </form>
<!--        <div class="ina_login_bt"><span>or</span></div>
        <div class="ina_three_dl"><a href="__APP__/Users/login/type/qq" class="ina_icon ina_qq"></a><a href="__APP__/Users/login/type/sina" class="ina_icon ina_sina"></a><a href="__APP__/Users/login/type/qq" id="weixin_share" class="ina_icon ina_weixin"></a></div>-->
        <div id="show_weixin_share" style=" display: none; text-align: center;"><img src='<?php echo $_smarty_tpl->tpl_vars['weixin_share']->value;?>
' /></div>
    </div>
</div>
<script type="text/javascript">
            $(function () {

                $(document).keydown(function(event){
                    if(event.keyCode==13) {
                        $("#cur").click();
                    }
                })

                //登录
                $("#cur").click(function () {
                    var auto_login = 0;
                    
                    var username = $("#username").val();
                    var userpass = $("#userpass").val();
                    if($('#auto_login').is(':checked')){
                        auto_login = 1;
                    }
                    if (username == '') {
                        alert('账号不能为空');
                        return;
                    }
                    if (userpass == '') {
                        alert('密码不能为空');
                        return;
                    }
                    $.post("__APP__/Users/dologin", {"auto_login":auto_login, "username": username, "userpass": userpass}, function (data) {
                        data = eval("(" + data + ")");
                        
                        //登录成功执行跳转
                        if(data.status=='0'){
                       
                        window.location.href= "<?php echo $_smarty_tpl->tpl_vars['refer']->value;?>
";
                        }else{
                         ina_tkclose(data.info,"三秒后将自动关闭…")
                        }
                    });

                });
                $("#weixin_share").click(function(){
                        if($("#show_weixin_share").css('display')=='none'){
                            $("#show_weixin_share").css("display","block");
                        }else{
                            $("#show_weixin_share").css("display","none");
                        }

                });
            });
            
        </script>
<script src="http://img.news18a.com/community/js/public.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>