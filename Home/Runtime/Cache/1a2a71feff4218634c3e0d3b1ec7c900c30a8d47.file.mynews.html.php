<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:20:59
         compiled from "D:\pro\new\Home\Tpl\More\mynews.html" */ ?>
<?php /*%%SmartyHeaderCode:78375935308b5fad62-93578332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a2a71feff4218634c3e0d3b1ec7c900c30a8d47' => 
    array (
      0 => 'D:\\pro\\new\\Home\\Tpl\\More\\mynews.html',
      1 => 1496367306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78375935308b5fad62-93578332',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5935308b85087',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5935308b85087')) {function content_5935308b85087($_smarty_tpl) {?><dl <?php if ($_smarty_tpl->tpl_vars['v']->value['status']==1){?>class="ina_cur"<?php }?> datas="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
<dt><?php if ($_smarty_tpl->tpl_vars['v']->value['message_type']=='文章消息'){?>
    <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['photo'];?>
">
    <?php }elseif($_smarty_tpl->tpl_vars['v']->value['message_type']=='互动消息'){?>
    <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['photo'];?>
">
    <?php }else{ ?>
    <img src="http://img.news18a.com/community/image/170515/logo_50.png">
    <?php }?>
</dt>
<dd>
    <h3><?php echo $_smarty_tpl->tpl_vars['v']->value['message_type'];?>
</h3>
    <span><?php echo $_smarty_tpl->tpl_vars['v']->value['create_time'];?>
</span>
    <a href="javascript:;;" id="delete_notic" idv="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="ina_delete">&times;</a>
    <p><?php echo $_smarty_tpl->tpl_vars['v']->value['message'];?>
 <?php if ($_smarty_tpl->tpl_vars['v']->value['message_type']!='互动消息'){?><?php if ($_smarty_tpl->tpl_vars['v']->value['systemid']==0){?><a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['message_id'];?>
/see/1">查看文章</a><?php }?><?php }?></p></dd>
</dl><?php }} ?>