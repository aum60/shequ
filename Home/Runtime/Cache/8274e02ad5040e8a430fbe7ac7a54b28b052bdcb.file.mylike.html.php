<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:19:03
         compiled from "./Home/Tpl\Ucenter\mylike.html" */ ?>
<?php /*%%SmartyHeaderCode:2600159353017ce5e54-48998950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8274e02ad5040e8a430fbe7ac7a54b28b052bdcb' => 
    array (
      0 => './Home/Tpl\\Ucenter\\mylike.html',
      1 => 1496657893,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2600159353017ce5e54-48998950',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'value' => 0,
    'v' => 0,
    'count' => 0,
    'pageinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5935301828d88',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5935301828d88')) {function content_5935301828d88($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>我的收藏-极趣</title>
<link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/css/170515/index.css">
</head>
<body class="ina_f0f0f0">
<?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("../Public/user_head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_silde">
    <div class="ina_author">
        <?php echo $_smarty_tpl->getSubTemplate ("../Public/user_nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="ina_list_search">
            <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['value']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <dl>
                <dt>
                    <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><img src="http://img.news18a.com/community/image/lazyload_324.jpg" data-original="<?php echo $_smarty_tpl->tpl_vars['v']->value['cover2'];?>
" />

                <div class="ina_list_bottom">
                            <div class="ina_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['picture_path'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</div>
                            <p><span><i class="ina_icon ina_read"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['scan'];?>
</span><span><i class="ina_icon ina_message"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['pl_num'];?>
</span></p>
                        </div>
                    </a>
                    <?php if ($_smarty_tpl->tpl_vars['v']->value['isbest']){?><em></em><?php }?>
                    <span class="ina_delete" style="display: none;" data="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">&times;</span>
                </dt>
                <dd>
                    <h3><a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a></h3>
                    <div class="ina_label">
                        <span class="ina_label<?php echo $_smarty_tpl->tpl_vars['v']->value['pid_class'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['pid'];?>
</span>
                        <p><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['addtime'];?>
</p>
                    </div>
                </dd>
            </dl>
        <?php } ?>
            <?php } ?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['count']->value){?>
        <div class="ina_page">
        <?php echo $_smarty_tpl->tpl_vars['pageinfo']->value;?>

        </div>
        <!--<div class="ina_more_btn">
            <a href="#">查看更多兴趣<i class="ina_icon"></i></a>
        </div>-->
        <?php }?>
        <?php }else{ ?>
        <div class="ina_boxno">
            <img src="http://img.news18a.com/community/image/shoucang.jpg">
            <span>什么鬼都没有还怎么混？去<a href="__APP__/Index" target="_blank">收藏</a></span>
        </div>
        <?php }?>
    </div>
</div>
<div class="ina_fixed"><a href="__APP__/Index/add" target="_blank"><img src="http://img.news18a.com/community/image/fatie.png"></a></div>
<script>
    $(".ina_list_search dl dt").live("mouseover",function(){
        $(this).find("span").show();
    })
    $(".ina_list_search dl dt").live("mouseout",function(){
        $(this).find("span").hide();
    });


    $(".ina_list_search dl dt span").live("click",function(){
        var _this = $(this);
        ina_tksure("提示信息","确定要取消收藏吗？",function(_this){
            var id = _this.attr('data');
            $.post("/index.php/Index/del_like",{"id":id},function(res){
                if(res==1){
                    _this.parents("dl").remove();
                    $(".ina_zhezhao").css("display","none");
                    $(".ina_tksure").css("display","none");
                    window.location.reload();
                }
            });
        },_this);
    });
    function ina_tk(str,btn,href){
        var height=$(window).height();
        if(href==undefined||href==null){href="javascript:;"}
        var html="<div class='ina_tkbg' style='height:"+height+"px'></div><div class='ina_tk'><a href='javascript:;' class='ina_close'>&times;</a><p>"+str+"</p><div class='ina_tkbtn'><i></i><a href='"+href+"'>"+btn+"</a></div></div>";
        $("body").append(html)
        $(".ina_tkbg,.ina_close,.ina_tk .ina_tkbtn a").live("click",function(){
            $(".ina_tk,.ina_tkbg").remove();
        })
    }
</script>
<script>
    $("img").lazyload({effect:"fadeIn"});

</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>