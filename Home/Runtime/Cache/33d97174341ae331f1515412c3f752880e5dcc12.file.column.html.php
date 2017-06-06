<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:16:21
         compiled from "./Home/Tpl\Index\column.html" */ ?>
<?php /*%%SmartyHeaderCode:927759352f75b045c4-73399183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33d97174341ae331f1515412c3f752880e5dcc12' => 
    array (
      0 => './Home/Tpl\\Index\\column.html',
      1 => 1496657593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '927759352f75b045c4-73399183',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lanmu_info' => 0,
    'list' => 0,
    'flag' => 0,
    'pid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59352f76036cd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59352f76036cd')) {function content_59352f76036cd($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>极趣-<?php echo $_smarty_tpl->tpl_vars['lanmu_info']->value['name'];?>
</title>
<link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/css/170515/index.css">
</head>
<body class="ina_f0f0f0">
<?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_head">
    <div class="ina_silde">
        <?php if ($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==1){?>
        <img src="http://img.news18a.com/community/image/head2.jpg">
        <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==2){?>
        <img src="http://img.news18a.com/community/image/head8.jpg">
        <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==3){?>
        <img src="http://img.news18a.com/community/image/head7.jpg">
        <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==4){?>
        <img src="http://img.news18a.com/community/image/head6.jpg">
        <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==5){?>
        <img src="http://img.news18a.com/community/image/head4.jpg">
        <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==6){?>
        <img src="http://img.news18a.com/community/image/head3.jpg">
        <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==7){?>
        <img src="http://img.news18a.com/community/image/head9.jpg">
        <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==8){?>
        <img src="http://img.news18a.com/community/image/head1.jpg">
        <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==999){?>
        <img src="http://img.news18a.com/community/image/head10.jpg">
        <?php }else{ ?>
        <img src="http://img.news18a.com/community/image/head5.jpg">
        <?php }?>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_silde">
    <div class="ina_list" id="result">
        <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_smarty_tpl->tpl_vars['kye'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
 $_smarty_tpl->tpl_vars['kye']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("../More/column.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php } ?>
    </div>
    <div class="ina_more_btn">
        <a href="javascript:;;" id="more"><?php if ($_smarty_tpl->tpl_vars['flag']->value){?>没有更多内容了~<?php }else{ ?>查看更多兴趣<i class="ina_icon"></i><?php }?></a>
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
                url:'__APP__/More/column',
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