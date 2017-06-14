<?php /* Smarty version Smarty-3.1.6, created on 2017-06-13 16:12:22
         compiled from "D:\pro\shequ\M\Tpl\More\index.html" */ ?>
<?php /*%%SmartyHeaderCode:22063593dfed3897f74-35107094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afadfec08ab67f3af066e791e68693255f7812a1' => 
    array (
      0 => 'D:\\pro\\shequ\\M\\Tpl\\More\\index.html',
      1 => 1497340956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22063593dfed3897f74-35107094',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593dfed3a97b7',
  'variables' => 
  array (
    'vo' => 0,
    'vvv' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593dfed3a97b7')) {function content_593dfed3a97b7($_smarty_tpl) {?><dl>
    <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
">
        <dd>
            <div class="ina_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['vo']->value['picture_path'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['username'];?>
</div>
            <div class="ina_date"><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['vo']->value['addtime'];?>
</div>
        </dd>
        <dt>
            <img src="http://img.news18a.com/community/image/lazyload_1000.jpg" data-original="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cover2'];?>
">
            <?php if ($_smarty_tpl->tpl_vars['vo']->value['isbest']==1){?><em><i>精</i></em><?php }?>
        <p><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</p>
        </dt>
        <dd class="ina_m12">
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
            <div class="ina_list_bottom">
                <p><span><i class="ina_icon ina_read"></i><?php echo $_smarty_tpl->tpl_vars['vo']->value['scan'];?>
</span><span><i class="ina_icon ina_message"></i><?php echo $_smarty_tpl->tpl_vars['vo']->value['pl_num'];?>
</span><span><i class="ina_icon ina_roar"></i><?php echo $_smarty_tpl->tpl_vars['vo']->value['znum'];?>
</span></p>
            </div>
        </dd>
    </a>
</dl><?php }} ?>