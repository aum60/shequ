<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:20:45
         compiled from "D:\pro\new\Home\Tpl\More\boutique.html" */ ?>
<?php /*%%SmartyHeaderCode:106195935307de9ac62-95951309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03f828ae405dfa4d9923eadeaffdc61b16e377d2' => 
    array (
      0 => 'D:\\pro\\new\\Home\\Tpl\\More\\boutique.html',
      1 => 1496373353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106195935307de9ac62-95951309',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vo' => 0,
    'vvv' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5935307e196c6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5935307e196c6')) {function content_5935307e196c6($_smarty_tpl) {?><dl>
    <dd>
        <div class="ina_photo">
            <a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
" target="_blank">
                <img src="<?php echo $_smarty_tpl->tpl_vars['vo']->value['picture_path'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['username'];?>

            </a>
        </div>
        <div class="ina_date"><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['vo']->value['addtime'];?>
</div>
    </dd>
    <dt><a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" target="_blank"><img src="http://img.news18a.com/community/image/lazyload_324.jpg" data-original="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cover2'];?>
" /></a><?php if ($_smarty_tpl->tpl_vars['vo']->value['isbest']){?><em></em><?php }?></dt>
    <dd>
        <h3><a href="#"><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</a></h3>
        <div class="ina_list_jj"><?php echo $_smarty_tpl->tpl_vars['vo']->value['description'];?>
</div>
        <div class="ina_list_bottom">
            <div class="ina_label">
                <?php  $_smarty_tpl->tpl_vars['vvv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vvv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vo']->value['class_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vvv']->key => $_smarty_tpl->tpl_vars['vvv']->value){
$_smarty_tpl->tpl_vars['vvv']->_loop = true;
?>
                <span class="ina_label<?php echo $_smarty_tpl->tpl_vars['vvv']->value['class_num'];?>
"><?php echo $_smarty_tpl->tpl_vars['vvv']->value['class_name'];?>
</span>
                <?php } ?>
            </div>
            <p><span><i class="ina_icon ina_read"></i><?php echo $_smarty_tpl->tpl_vars['vo']->value['scan'];?>
</span><span><i class="ina_icon ina_message"></i><?php echo $_smarty_tpl->tpl_vars['vo']->value['pl_num'];?>
</span><span><i class="ina_icon ina_roar"></i><?php echo $_smarty_tpl->tpl_vars['vo']->value['znum'];?>
</span></p>
        </div>
    </dd>
</dl><?php }} ?>