<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:06:24
         compiled from "./Home/Tpl\More\comment.html" */ ?>
<?php /*%%SmartyHeaderCode:2496159352d20850588-39180107%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78cbfb443c3fe4062bd680b507db96b60a9f0091' => 
    array (
      0 => './Home/Tpl\\More\\comment.html',
      1 => 1496403918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2496159352d20850588-39180107',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
    'vv' => 0,
    'kk' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59352d20b712c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59352d20b712c')) {function content_59352d20b712c($_smarty_tpl) {?><dl>
    <dt><a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['picture_path'];?>
"></a></dt>
    <dd>
        <div class="ina_comment_top">
            <h3><a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</a></h3>
            <span class="ina_date"><?php echo $_smarty_tpl->tpl_vars['v']->value['addtime'];?>
</span>
            <p>
                <span>
                    <a href="javascript:;;"  class="ding" datas="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><i style="font-style: normal; width: 15px;">顶</i><span class="znum" style="padding-left: 0px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['pz'];?>
</span></a></span><span><a href="javascript:;;" class="ina_huifu_a" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><i class="ina_icon ina_huifu"></i></a>
                </span>
            </p>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['v']->value['history']){?>
        <ul>
            <?php  $_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vv']->_loop = false;
 $_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['history']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vv']->key => $_smarty_tpl->tpl_vars['vv']->value){
$_smarty_tpl->tpl_vars['vv']->_loop = true;
 $_smarty_tpl->tpl_vars['kk']->value = $_smarty_tpl->tpl_vars['vv']->key;
?>
            <li>
                <div class="ina_li_top">
                    <h3><a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['vv']->value['uid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['vv']->value['username'];?>
</a></h3>
                    <p><span><a href="javascript:;;"  class="ding" datas="<?php echo $_smarty_tpl->tpl_vars['vv']->value['id'];?>
"><i style="font-style: normal; width: 15px;">顶</i><span class="znum" style="padding-left: 0px;"><?php echo $_smarty_tpl->tpl_vars['vv']->value['pz'];?>
</span></a></span><span><a href="javascript:;;" class="ina_huifu_ra" pid ="<?php echo $_smarty_tpl->tpl_vars['vv']->value['id'];?>
"><i class="ina_icon ina_huifu"></i></a></span></p>
                </div>
                <div class="ina_linr">
                    <?php echo $_smarty_tpl->tpl_vars['vv']->value['content'];?>

                </div>
                <div class="ina_floor"><span><?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
楼</span><i></i></div>
            </li>
            <?php } ?>
        </ul>
        <?php }?>
        <div class="ina_comment_bottom"><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</div>
    </dd>
</dl>
<?php }} ?>