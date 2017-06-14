<?php /* Smarty version Smarty-3.1.6, created on 2017-06-14 13:49:19
         compiled from "D:\pro\shequ\M\Tpl\More\hot.html" */ ?>
<?php /*%%SmartyHeaderCode:283965940ce5f48a367-62581590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd882dfbc33563a8588fdbed4dca981094409839' => 
    array (
      0 => 'D:\\pro\\shequ\\M\\Tpl\\More\\hot.html',
      1 => 1497418589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '283965940ce5f48a367-62581590',
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
  'unifunc' => 'content_5940ce5f6b4ee',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5940ce5f6b4ee')) {function content_5940ce5f6b4ee($_smarty_tpl) {?><dl>
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