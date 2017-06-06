<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:20:48
         compiled from "./Home/Tpl\Index\hot.html" */ ?>
<?php /*%%SmartyHeaderCode:24501593530806429a5-29881635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59714463896fbb0f30a6d123ba7d1fbe44dc32c1' => 
    array (
      0 => './Home/Tpl\\Index\\hot.html',
      1 => 1496657620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24501593530806429a5-29881635',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'time' => 0,
    'list' => 0,
    'k' => 0,
    'v' => 0,
    'common' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59353080d728d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59353080d728d')) {function content_59353080d728d($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>极趣-热门排行</title>
<link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/css/170515/index.css">
</head>
<body class="ina_f0f0f0">
<?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_silde">
    <div class="ina_hotbt">
        <ul>
            <li <?php if ($_smarty_tpl->tpl_vars['time']->value==''){?>class="ina_cur"<?php }?>><a href="__APP__/Index/hot"><i class="ina_icon"></i>7日-帖子排行</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['time']->value=='month'){?>class="ina_cur"<?php }?>><a href="__APP__/Index/hot/time/month"><i class="ina_icon"></i>一个月-帖子排行</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['time']->value=='all'){?>class="ina_cur"<?php }?>><a href="__APP__/Index/hot/time/all"><i class="ina_icon"></i>历史以来排行</a></li>
        </ul>
    </div>
    <div class="ina_hotnr">
        <dl>
            <dt>热门帖子排行榜</dt>
            <dd>
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['k']->value<=2){?>
                    <li>
                        <div class="ina_hot_left"><i class="ina_icon ina_<?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>one<?php }elseif($_smarty_tpl->tpl_vars['k']->value==1){?>two<?php }elseif($_smarty_tpl->tpl_vars['k']->value==2){?>three<?php }?>"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</i></div>
                        <div class="ina_hot_right">
                            <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><img src="http://img.news18a.com/community/image/lazyload_324.jpg" data-original="<?php echo $_smarty_tpl->tpl_vars['v']->value['cover2'];?>
" />
                                <h3><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</h3>
                                <p>
                                    <span class="ina_name"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['picture_path'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</span>
                                    <span class="ina_looked"><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['scan'];?>
</span>
                                </p>
                            </a>
                        </div>
                    </li>
                    <?php }else{ ?>
                    <li>
                        <div class="ina_hot_left"><i class="ina_icon"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</i></div>
                        <div class="ina_hot_right">
                            <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"> <h3><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</h3>
                                <span class="ina_looked"><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['scan'];?>
</span></a>
                        </div>
                    </li>
                    <?php }?>
                    <?php } ?>
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>热门评论排行榜</dt>
            <dd>
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['common']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['k']->value<=2){?>
                    <li>
                        <div class="ina_hot_left"><i class="ina_icon ina_<?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>one<?php }elseif($_smarty_tpl->tpl_vars['k']->value==1){?>two<?php }elseif($_smarty_tpl->tpl_vars['k']->value==2){?>three<?php }?>"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</i></div>
                        <div class="ina_hot_right">
                            <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><img src="http://img.news18a.com/community/image/lazyload_324.jpg" data-original="<?php echo $_smarty_tpl->tpl_vars['v']->value['cover2'];?>
">
                                <h3><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</h3>
                                <p>
                                    <span class="ina_name"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['picture_path'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</span>
                                    <span class="ina_pinglun"><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['pl_num'];?>
</span>
                                </p>
                            </a>
                        </div>
                    </li>
                    <?php }else{ ?>
                    <li>
                        <div class="ina_hot_left"><i class="ina_icon"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</i></div>
                        <div class="ina_hot_right">
                            <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><h3><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</h3>
                                <span class="ina_pinglun"><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['pl_num'];?>
</span></a>
                        </div>
                    </li>
                    <?php }?>
                    <?php } ?>
                </ul>
            </dd>
        </dl>
    </div>
</div>
<div class="ina_fixed"><a href="__APP__/Index/add" target="_blank"><img src="http://img.news18a.com/community/image/fatie.png"></a></div>
<script>
    $("img").lazyload({effect:"fadeIn"});


</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>