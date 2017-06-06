<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:20:45
         compiled from "./Home/Tpl\Index\boutique.html" */ ?>
<?php /*%%SmartyHeaderCode:296335935307dc02ac3-60748754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '929ad55bc31adeacef51c0a19336dd68aeae4935' => 
    array (
      0 => './Home/Tpl\\Index\\boutique.html',
      1 => 1496657584,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '296335935307dc02ac3-60748754',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'pid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5935307de67fd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5935307de67fd')) {function content_5935307de67fd($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>极趣-精华</title>
<link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/css/170515/index.css">
</head>
<body class="ina_f0f0f0">
<?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_head ina_jinghua"></div>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_silde">
    <div class="ina_list" id="result">
        <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("../More/boutique.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php } ?>
    </div>
    <div class="ina_more_btn">
        <a href="javascript:;;"  id="more">查看更多兴趣<i class="ina_icon"></i></a>
    </div>
</div>
<div class="ina_fixed"><a href="__APP__/Index/add" target="_blank"><img src="http://img.news18a.com/community/image/fatie.png"></a></div>
<div class="ina_fh"><img src="http://img.news18a.com/community/image/170515/fh.png"></div>
<script>
    $(function(){

        /**获取更多消息start****/
        $("#more").live('click', function(){

            var cont = $(".ina_list dl").length;
            var str = '';
            $.ajax({
                url:'__APP__/More/boutique',
                type:'get',
                dataType:'json',
                data:{
                    pid:"<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
",
                    go:cont
                },

                beforeSend: function () {
                    //给用户提供友好状态提示
                    $(".ina_more_btn").text('正在加载中...');
                },

                success:function(data){
                    var len = data.length;
                    for(var i=0; i<len; i++){
                        str = data[i];
                        $("#result").append(str);
                    }

                    //加载图片
                    loadImage();

                    if(len<10){
                        $(".ina_more_btn").text("没有更多内容了~");
                    }else{
                        //让点击按钮重新有效
                        $(".ina_more_btn").html('<a href="javascript:;;" id="more">查看更多兴趣<i class="ina_icon"></i></a>');
                    }

                }
            });
        });
        /*******end*********/

    });


</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>