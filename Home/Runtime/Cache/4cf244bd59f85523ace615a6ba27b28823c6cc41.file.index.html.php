<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 09:28:05
         compiled from "./Home/Tpl\Ucenter\index.html" */ ?>
<?php /*%%SmartyHeaderCode:19678593605250f6d04-28071517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4cf244bd59f85523ace615a6ba27b28823c6cc41' => 
    array (
      0 => './Home/Tpl\\Ucenter\\index.html',
      1 => 1495683496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19678593605250f6d04-28071517',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'v' => 0,
    'wsh_list' => 0,
    'count_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5936052573877',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5936052573877')) {function content_5936052573877($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>消息中心-兴趣社区</title>
    <link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/css/170515/index.css">
</head>
<body class="ina_f0f0f0">
<?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("../Public/user_head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_silde">
    <div class="ina_author">
        <?php echo $_smarty_tpl->getSubTemplate ("../Public/user_nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
        <div class="ina_center_tiezi">
            <a href="javascript:;;" class="ina_cur" id="yes">已审核</a>
            <a href="javascript:;;" id="no">未审核</a>
        </div>
        <div class="ina_list_search" id="yes_div">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <dl>
                <dt>
                    <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><img src="http://img.news18a.com/community/image/lazyload_324.jpg" data-original="<?php echo $_smarty_tpl->tpl_vars['v']->value['cover2'];?>
" />
                        <div class="ina_list_bottom">
                            <p><span><i class="ina_icon ina_read"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['scan'];?>
</span><span><i class="ina_icon ina_message"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['plnum'];?>
</span></p>
                        </div>
                    </a>
                    <span class="ina_delete" style="display: none;" data="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">&times;</span>
                    <?php if ($_smarty_tpl->tpl_vars['v']->value['isbest']){?><em></em><?php }?>
                </dt>
                <dd>
                    <h3><a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a></h3>
                    <div class="ina_label">
                        <span class="ina_label<?php echo $_smarty_tpl->tpl_vars['v']->value['class_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['p_name'];?>
</span>
                        <p><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['addtime'];?>
</p>
                    </div>
                </dd>
            </dl>
            <?php } ?>
        </div>
        <div class="ina_list_search" id="no_div" style="display: none">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wsh_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <dl>
                <dt>
                    <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><img src="http://img.news18a.com/community/image/lazyload_324.jpg" data-original="<?php echo $_smarty_tpl->tpl_vars['v']->value['cover2'];?>
" />
                        <div class="ina_list_bottom">
                            <!--<p><span><i class="ina_icon ina_read"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['scan'];?>
</span><span><i class="ina_icon ina_message"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['plnum'];?>
</span></p>-->
                        </div>
                    </a>
                    <span class="ina_delete" style="display: none;" data="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">&times;</span>
                    <?php if ($_smarty_tpl->tpl_vars['v']->value['isbest']){?><em></em><?php }?>
                </dt>
                <dd>
                    <h3><a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a></h3>
                    <div class="ina_label">
                        <span class="ina_caogao"><?php echo $_smarty_tpl->tpl_vars['v']->value['status'];?>
</span>
                        <p><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['addtime'];?>
</p>
                    </div>
                </dd>
            </dl>
            <?php } ?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['count_page']->value){?>
        <div class="ina_more_btn">
            <a href="#">查看更多兴趣<i class="ina_icon"></i></a>
        </div>
        <?php }?>
        <?php }else{ ?>
        <div class="ina_boxno">
            <img src="http://img.news18a.com/community/image/tiezi.jpg">
            <span>DA爷今天心情不错，<a href="#">发个帖子</a>去O(∩_∩)</span>
        </div>
        <?php }?>
    </div>
</div>
<div class="ina_fixed"><a href="#"><img src="http://img.news18a.com/community/image/fatie.png"></a></div>
<div class="ina_fh"><img src="http://img.news18a.com/community/image/170515/fh.png"></div>
<script>
    $(".ina_list_search dl dt").live("mouseover",function(){
        $(this).find("span").show();
    })
    $(".ina_list_search dl dt").live("mouseout",function(){
        $(this).find("span").hide();
    })
    $(".ina_list_search dl dt span").live("click",function(){
        var _this = $(this);
        ina_tksure("提示信息","确定要删除该文章吗？",function(_this){
            var id = _this.attr('data');
            $.post("/index.php/Index/del_mess",{"id":id},function(res){
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
<script type="text/javascript">
    $('.ina_center_tiezi a').bind('click', function(){
        $(this).addClass('ina_cur').siblings().removeClass('ina_cur');
    });

    $('#yes').click(function () {
        $('#yes_div').show();
        $('#no_div').hide();
    })

    $('#no').click(function () {
        $('#no_div').show();
        $('#yes_div').hide();
    })
</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>