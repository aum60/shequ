<?php /* Smarty version Smarty-3.1.6, created on 2017-06-12 15:20:14
         compiled from "D:\pro\shequ\M\Tpl\More\search.html" */ ?>
<?php /*%%SmartyHeaderCode:24419593e40aea94e64-99813801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea6b049387187c73f6cbecbdb26e36baf10c0b90' => 
    array (
      0 => 'D:\\pro\\shequ\\M\\Tpl\\More\\search.html',
      1 => 1496798541,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24419593e40aea94e64-99813801',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593e40aec5625',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e40aec5625')) {function content_593e40aec5625($_smarty_tpl) {?><dl>
    <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
">
        <dt>
            <img src="http://img.news18a.com/community/image/lazyload_324.jpg" data-original="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cover2'];?>
">
        <p class="ina_author_date"><?php echo $_smarty_tpl->tpl_vars['vo']->value['username'];?>
<span><?php echo $_smarty_tpl->tpl_vars['vo']->value['addtime'];?>
</span></p>
        <?php if ($_smarty_tpl->tpl_vars['vo']->value['isbest']==1){?><em><i>精</i></em><?php }?>
        </dt>
        <dd class="ina_m12">
            <h3><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</h3>
            <div class="ina_js"><?php echo $_smarty_tpl->tpl_vars['vo']->value['description'];?>
</div>
        </dd>
    </a>
</dl><?php }} ?>