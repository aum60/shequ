<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 10:09:43
         compiled from "D:\pro\bbs_admin\Home\Tpl\More\index.html" */ ?>
<?php /*%%SmartyHeaderCode:113459360ee7693ea3-58022128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4eebb18a385da5fd7f22f9372d864aef2149149' => 
    array (
      0 => 'D:\\pro\\bbs_admin\\Home\\Tpl\\More\\index.html',
      1 => 1496310791,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113459360ee7693ea3-58022128',
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
  'unifunc' => 'content_59360ee78d613',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59360ee78d613')) {function content_59360ee78d613($_smarty_tpl) {?><dl>
    <dd>
        <div class="ina_photo"><a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
" target="_blank">
            <img src="<?php echo $_smarty_tpl->tpl_vars['vo']->value['picture_path'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['username'];?>
</a></div>
        <div class="ina_date"><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['vo']->value['addtime'];?>
</div>
    </dd>
    <dt><a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" target="_blank"><img src="http://img.news18a.com/community/image/lazyload_324.jpg" data-original="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cover2'];?>
" /></a><?php if ($_smarty_tpl->tpl_vars['vo']->value['isbest']){?><em></em><?php }?></dt>
    <dd>
        <h3><a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
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