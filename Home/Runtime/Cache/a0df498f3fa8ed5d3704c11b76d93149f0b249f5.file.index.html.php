<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:14:40
         compiled from "./Home/Tpl\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1766859352c7fb6c734-63718273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0df498f3fa8ed5d3704c11b76d93149f0b249f5' => 
    array (
      0 => './Home/Tpl\\Index\\index.html',
      1 => 1496657524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1766859352c7fb6c734-63718273',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59352c8007bbb',
  'variables' => 
  array (
    'row_list' => 0,
    'v' => 0,
    'list2' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59352c8007bbb')) {function content_59352c8007bbb($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>极趣-首页</title>
    <link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/css/170515/index.css">
</head>
<body class="ina_f0f0f0">
<?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_focus">
    <div class="ina_silde">
        <?php if ($_smarty_tpl->tpl_vars['row_list']->value){?>
        <div class="ina_prev"><i class="ina_icon"></i></div>
        <div class="ina_focusnr" id="banner">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['message_link'];?>
" target="_blank"><img src="http://img.news18a.com/community/image/lazyload_1000_400.jpg"  data-original="<?php echo $_smarty_tpl->tpl_vars['v']->value['cover2'];?>
" /><span><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</span></a>
            <?php } ?>
        </div>
        <div class="ina_next"><i class="ina_icon"></i></div>
        <div class="ina_focus_tab">
            <ul>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <li><img src="http://img.news18a.com/community/image/lazyload_324.jpg" data-original="<?php echo $_smarty_tpl->tpl_vars['v']->value['cover2'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</span></li>
                <?php } ?>
            </ul>
        </div>
        <?php }?>
    </div>
</div>
<div class="ina_hot">
    <div class="ina_silde">
        <div class="ina_hot_bt"><h3><i class="ina_icon"></i>热门活动</h3><a href="#" class="ina_more" style="display: none"><i class="ina_icon"></i></a></div>
        <ul>
            <li><a href="#"><img src="http://img.news18a.com/community/image/list.jpg"></a></li>
            <li><a href="#"><img src="http://img.news18a.com/community/image/list.jpg"></a></li>
            <li><a href="#"><img src="http://img.news18a.com/community/image/list.jpg"></a></li>
            <li><a href="#"><img src="http://img.news18a.com/community/image/list.jpg"></a></li>
        </ul>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_silde">
    <div class="ina_list" id="result">
        <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("../More/index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php } ?>
    </div>
    <div class="ina_more_btn">
        <a href="javascript:;;" id="more">查看更多兴趣<i class="ina_icon"></i></a>
    </div>
</div>
<div class="ina_fixed"><a href="__APP__/Index/add" target="_blank"><img src="http://img.news18a.com/community/image/fatie.png"></a></div>
<div class="ina_fh"><img src="http://img.news18a.com/community/image/170515/fh.png"></div>
<script src="http://img.news18a.com/community/js/public.js"></script>
<script>



    $(function(){

        //获取更多消息
        $("#more").live('click', function(){

            var cont = $(".ina_list dl").length;
            var str = '';
            $.ajax({
                url:'__APP__/More/index',
                type:'get',
                dataType:'json',
                data:{
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

    });


    $(".ina_focus_tab ul li").live('click',function(){
        //加载图片
        loadImage();
    });



    if($(".ina_focus").length>0){
        for(var i=0;i<$(".ina_focus").length;i++){
            $(".ina_focus").eq(i).tab({
                nr:".ina_focusnr a",
                daohang:".ina_focus_tab li",
                prev:".ina_prev",
                next:".ina_next",
                display:"left",
                auto:"true"
            })
        }
    }

</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>