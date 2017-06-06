<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:03:44
         compiled from "D:\pro\new\Home\Tpl\Public\nav.html" */ ?>
<?php /*%%SmartyHeaderCode:1252559352c80588c66-96445434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c722766610d8d408b6e73db07913a1743662a41' => 
    array (
      0 => 'D:\\pro\\new\\Home\\Tpl\\Public\\nav.html',
      1 => 1496625246,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1252559352c80588c66-96445434',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_name' => 0,
    'pid' => 0,
    'cat' => 0,
    'ty' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59352c806b1aa',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59352c806b1aa')) {function content_59352c806b1aa($_smarty_tpl) {?><div class="ina_daohang">
    <div class="ina_silde">
        <?php if ($_smarty_tpl->tpl_vars['action_name']->value!='boutique'){?><a <?php if (empty($_smarty_tpl->tpl_vars['pid']->value)){?>class="ina_cur"<?php }else{ ?><?php }?> href="__APP__">最新文章</a><?php }?>
        <?php  $_smarty_tpl->tpl_vars['ty'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ty']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ty']->key => $_smarty_tpl->tpl_vars['ty']->value){
$_smarty_tpl->tpl_vars['ty']->_loop = true;
?>
        <a <?php if ($_smarty_tpl->tpl_vars['ty']->value['id']==$_smarty_tpl->tpl_vars['pid']->value){?>class="ina_cur"<?php }else{ ?><?php }?> href="__APP__/Index/column/pid/<?php echo $_smarty_tpl->tpl_vars['ty']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['ty']->value['name'];?>
</a>
        <?php } ?>
    </div>
</div><?php }} ?>