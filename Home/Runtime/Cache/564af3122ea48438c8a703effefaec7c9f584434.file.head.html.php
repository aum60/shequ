<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 10:09:43
         compiled from "D:\pro\bbs_admin\Home\Tpl\Public\head.html" */ ?>
<?php /*%%SmartyHeaderCode:512259360ee7186df3-31749581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '564af3122ea48438c8a703effefaec7c9f584434' => 
    array (
      0 => 'D:\\pro\\bbs_admin\\Home\\Tpl\\Public\\head.html',
      1 => 1496312673,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '512259360ee7186df3-31749581',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_name' => 0,
    'ms_count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59360ee74bf24',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59360ee74bf24')) {function content_59360ee74bf24($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\pro\\bbs_admin\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("./head_top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="http://img.news18a.com/js/jquery-1.7.2.min.js"></script>
<div class="ina_top">
    <div class="ina_silde">
        <div class="ina_top_left">
            <a href="/"><img src="http://img.news18a.com/community/image/logo.png"></a>
            <a href="/" <?php if ($_smarty_tpl->tpl_vars['action_name']->value=='index'){?>class="cur"<?php }else{ ?><?php }?>>首页</a>
            <a href="__APP__/Index/boutique" <?php if ($_smarty_tpl->tpl_vars['action_name']->value=='boutique'){?>class="cur"<?php }else{ ?><?php }?>>精华</a>
            <!--<a href="__APP__/Index/activity" <?php if ($_smarty_tpl->tpl_vars['action_name']->value=='activity'){?>class="cur"<?php }else{ ?><?php }?>>活动</a>-->
            <a href="__APP__/Index/hot" <?php if ($_smarty_tpl->tpl_vars['action_name']->value=='hot'){?>class="cur"<?php }else{ ?><?php }?>>热门排行</a>
        </div>
        <div class="ina_top_right">
            <div class="ina_search">
                <input id="search_con" placeholder="搜索文章标题">
                <a id="search" href="javascript:;;"><i class="ina_icon"></i></a>
                <script type="text/javascript">
                    $(function () {
                        $("#search").click(function () {
                            var search_con = encodeURIComponent(encodeURIComponent($("#search_con").val()));
                            window.location.href = "__APP__/Index/search/q/" + search_con;
                        });

                    });
                </script>
            </div>
            <?php if ($_SESSION['user']){?>
            <p>
                <a class="ina_icon ina_top_message" href="__APP__/Ucenter/mynews"><?php if ($_smarty_tpl->tpl_vars['ms_count']->value!='0'){?><i></i><?php }?></a>
                <span><a href="__APP__/Ucenter/mymess"><?php if ($_SESSION['user']['name']){?><?php echo smarty_modifier_truncate($_SESSION['user']['name'],12,'...',true);?>
<?php }else{ ?><?php echo smarty_modifier_truncate($_SESSION['user']['username'],12,'...',true);?>
<?php }?></a></span>
                <a href="__APP__/Users/loginout">退出</a>
                <!--<em>|</em>-->
                <!--<a href="__APP__/Ucenter" class="ina_red">个人中心</a>-->
            </p>

            <?php }else{ ?>
            <p>
                <a class="ina_denglu" href="__APP__/Users/login">登录</a>

                <a href="__APP__/Users/index">注册</a>
            </p>
            <?php }?>
        </div>
    </div>
</div><?php }} ?>