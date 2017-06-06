<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:18:59
         compiled from "./Home/Tpl\Ucenter\mymess.html" */ ?>
<?php /*%%SmartyHeaderCode:473259352f83ae06d2-85344524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '096fdf6658e82507b01814147fae10acdd4e0ccf' => 
    array (
      0 => './Home/Tpl\\Ucenter\\mymess.html',
      1 => 1496657831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '473259352f83ae06d2-85344524',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59352f8448f5e',
  'variables' => 
  array (
    'list' => 0,
    'v' => 0,
    'wsh_list' => 0,
    'count_page' => 0,
    'flag' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59352f8448f5e')) {function content_59352f8448f5e($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>个人中心-极趣</title>
<link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/css/170515/index.css">
</head>
<body class="ina_f0f0f0">
<?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("../Public/user_head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_silde">
    <div class="ina_author">
        <?php echo $_smarty_tpl->getSubTemplate ("../Public/user_nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="ina_center_tiezi">
            <a href="javascript:;;" class="ina_cur" id="yes">已审核</a>
            <a href="javascript:;;" id="no">未审核</a>
        </div>
        <div class="ina_list_search" id="yes_div">
            <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <dl>
                <dt>
                    <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['cover2'];?>
" />
                        <div class="ina_list_bottom">
                            <p><span><i class="ina_icon ina_read"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['scan'];?>
</span><span><i class="ina_icon ina_message"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['plnum'];?>
</span></p>
                        </div>
                    </a>
                    <span class="ina_delete" style="display: none;" name="yes" data="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
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
            <?php }else{ ?>
            <div class="ina_boxno">
                <img src="http://img.news18a.com/community/image/tiezi.jpg">
                <span>DA爷今天心情不错，<a href="__APP__/Index/add">发个帖子</a>去O(∩_∩)</span>
            </div>
            <?php }?>
        </div>

        <div class="ina_list_search" id="no_div" style="display: none">
            <?php if ($_smarty_tpl->tpl_vars['wsh_list']->value){?>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wsh_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <dl>
                <dt>
                    <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['cover2'];?>
" />
                        <div class="ina_list_bottom">
                            <!--<p><span><i class="ina_icon ina_read"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['scan'];?>
</span><span><i class="ina_icon ina_message"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['plnum'];?>
</span></p>-->
                        </div>
                    </a>
                    <span class="ina_delete" style="display: none;" name="no" data="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
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
            <?php }else{ ?>
            <div class="ina_boxno">
                <img src="http://img.news18a.com/community/image/tiezi.jpg">
                <span>DA爷今天心情不错，<a href="__APP__/Index/add">发个帖子</a>去O(∩_∩)</span>
            </div>
            <?php }?>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['count_page']->value){?>
        <div class="ina_more_btn">
            <a href="javascript:;;">查看更多兴趣<i class="ina_icon"></i></a>
        </div>
        <?php }?>
    </div>
</div>
<div class="ina_fixed"><a href="__APP__/Index/add" target="_blank"><img src="http://img.news18a.com/community/image/fatie.png"></a></div>
<div class="ina_fh"><img src="http://img.news18a.com/community/image/170515/fh.png"></div>
<script>

    $(function(){
        if('no' == "<?php echo $_smarty_tpl->tpl_vars['flag']->value;?>
"){
            $('#no').addClass('ina_cur');
            $('#yes').removeClass('ina_cur');
            $('#no_div').show();
            $('#yes_div').hide();
        }
    });

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
            var flag = _this.attr('name');
            $.post("/index.php/Index/del_mess",{"id":id},function(res){
                if(res==1){
                    _this.parents("dl").remove();
                    $(".ina_zhezhao").css("display","none");
                    $(".ina_tksure").css("display","none");
                    getmymess(flag);
//                    window.location.href="__APP__/Ucenter/mymess?flag=" + flag;
                }
            });
        },_this);
    });

    //加载更多,暂时未开放，后期可能用到
//    $("#yes").click(function(){
//        var cont = $(".ina_list_search dl").length;
//        var str = '';
//        $.ajax({
//            url:'__APP__/More/get_my_mess',
//            type:'get',
//            dataType:'json',
//            data:{
//                go:cont,
//                flag:'yes',
//                uid:"<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"
//            },
//            success:function(data){
//                var len = data.length;
//                if(len<10){$(".ina_more_btn a").replaceWith("没有更多内容了~");}
//                for(var i=0; i<len; i++){
//                    str = data[i];
//                    $("#yes_div").append(str);
//                }
//                loadImage();
//            }
//        });
//    });
//

    function ina_tk(str,btn,href){
        var height=$(window).height();
        if(href==undefined||href==null){href="javascript:;"}
        var html="<div class='ina_tkbg' style='height:"+height+"px'></div><div class='ina_tk'><a href='javascript:;' class='ina_close'>&times;</a><p>"+str+"</p><div class='ina_tkbtn'><i></i><a href='"+href+"'>"+btn+"</a></div></div>";
        $("body").append(html)
        $(".ina_tkbg,.ina_close,.ina_tk .ina_tkbtn a").live("click",function(){
            $(".ina_tk,.ina_tkbg").remove();
        })
    }

    function getmymess(flag){

        var cont = $("#"+flag+"_div dl").length;
        var str = '';
        $.ajax({
            url:'__APP__/More/get_my_mess',
            type:'get',
            dataType:'json',
            data:{
                go:cont,
                flag:flag,
                uid:"<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"
            },
            success:function(data){
                var len = data.length;
//                if(len<10){$(".ina_more_btn a").replaceWith("没有更多内容了~");}
                for(var i=0; i<len; i++){
                    str += data[i];
                }
                $("#"+flag+"_div").html(str);
                loadImage();
            }
        });
    }
</script>
<script type="text/javascript">
    $('.ina_center_tiezi a').bind('click', function(){
        $(this).addClass('ina_cur').siblings().removeClass('ina_cur');
    });

    $('#yes').click(function () {
        $('#yes_div').show();
        $('#no_div').hide();
        $('#no_fatie').hide();
    })

    $('#no').click(function () {
        $('#no_div').show();
        $('#no_fatie').show();
        $('#yes_div').hide();
    })
</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>