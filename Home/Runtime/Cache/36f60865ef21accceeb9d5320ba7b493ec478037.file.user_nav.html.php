<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:16:36
         compiled from "D:\pro\new\Home\Tpl\Public\user_nav.html" */ ?>
<?php /*%%SmartyHeaderCode:102559352f84b32af3-11786451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36f60865ef21accceeb9d5320ba7b493ec478037' => 
    array (
      0 => 'D:\\pro\\new\\Home\\Tpl\\Public\\user_nav.html',
      1 => 1495178312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102559352f84b32af3-11786451',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTION_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59352f84c5b93',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59352f84c5b93')) {function content_59352f84c5b93($_smarty_tpl) {?><div class="ina_center_daohang">
    <ul>
        <li <?php if ($_smarty_tpl->tpl_vars['ACTION_NAME']->value=='mymess'){?>class="ina_cur"<?php }?> ><a href="__APP__/Ucenter/mymess">我的帖子</a></li>
        <li <?php if ($_smarty_tpl->tpl_vars['ACTION_NAME']->value=='draft'){?>class="ina_cur"<?php }?> ><a href="__APP__/Ucenter/draft">我的草稿</a></li>
        <li <?php if ($_smarty_tpl->tpl_vars['ACTION_NAME']->value=='mylike'){?>class="ina_cur"<?php }?> ><a href="__APP__/Ucenter/mylike">我的收藏</a></li>
        <li <?php if ($_smarty_tpl->tpl_vars['ACTION_NAME']->value=='myfri'){?>class="ina_cur"<?php }?> ><a href="__APP__/Ucenter/myfri">我的关注</a></li>
        <li <?php if ($_smarty_tpl->tpl_vars['ACTION_NAME']->value=='myfans'){?>class="ina_cur"<?php }?> ><a href="__APP__/Ucenter/myfans">我的粉丝</a></li>
    </ul>
</div><?php }} ?>