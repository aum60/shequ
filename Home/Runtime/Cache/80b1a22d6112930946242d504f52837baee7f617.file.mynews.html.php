<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:20:59
         compiled from "./Home/Tpl\Ucenter\mynews.html" */ ?>
<?php /*%%SmartyHeaderCode:295705935308b068f96-71003066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80b1a22d6112930946242d504f52837baee7f617' => 
    array (
      0 => './Home/Tpl\\Ucenter\\mynews.html',
      1 => 1496657878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '295705935308b068f96-71003066',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'count_w' => 0,
    'news_data' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5935308b5c03d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5935308b5c03d')) {function content_5935308b5c03d($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>消息中心-极趣</title>
<link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/css/170515/index.css">
</head>
<body class="ina_f0f0f0">
<?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_silde">
    <div class="ina_messagelist" id="result">
        <div class="ina_message_bt">
            <h3>消息中心</h3>

            <p>Hi，你新收到了 <b><?php echo $_smarty_tpl->tpl_vars['count_w']->value;?>
</b> 条系统通知，请注意查看。<a href="javascript:;;" id="is_reade_all">全部标记为已读</a><a href="javascript:;;" id="delete_all">删除全部</a></p>

            <!--<p>暂无新的系统消息</p>-->

            <!--<a href="javascript:;;" id="is_reade_all">全部标记为已读</a>-->
        </div>
        <?php if ($_smarty_tpl->tpl_vars['news_data']->value){?>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("../More/mynews.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php } ?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['count']->value){?>
        <div class="ina_more_btn">
            <a href="javascript:;;" id="more">查看更多消息<i class="ina_icon"></i></a>
        </div>
        <?php }?>
    </div>
    <div class="ina_right">
        <div class="ina_right_box">
            <div class="ina_rightbt">
                <h3>推荐热门活动：</h3>
            </div>
            <dl>
                <a href="#">
                    <dt><img src="http://img2.news18a.com/site/other/201703/ina_14883270101083114198.jpg"></dt>
                    <dd>
                        <h3>阿斯顿马丁DB11提车，感受速度与激情！</h3>
                    </dd>
                </a>
            </dl>
            <dl>
                <a href="#">
                    <dt><img src="http://img2.news18a.com/site/other/201703/ina_14883270101083114198.jpg"></dt>
                    <dd>
                        <h3>阿斯顿马丁DB11提车，感受速度与激情！</h3>
                    </dd>
                </a>
            </dl>
            <dl>
                <a href="#">
                    <dt><img src="http://img2.news18a.com/site/other/201703/ina_14883270101083114198.jpg"></dt>
                    <dd>
                        <h3>阿斯顿马丁DB11提车，感受速度与激情！</h3>
                    </dd>
                </a>
            </dl>
            <dl>
                <a href="#">
                    <dt><img src="http://img2.news18a.com/site/other/201703/ina_14883270101083114198.jpg"></dt>
                    <dd>
                        <h3>阿斯顿马丁DB11提车，感受速度与激情！</h3>
                    </dd>
                </a>
            </dl>
            <div class="ina_more" style="display: none"><a href="javascript:;;">查看全部</a></div>
        </div>
    </div>
</div>
<div class="ina_fixed"><a href="__APP__/Index/add"><img src="http://img.news18a.com/community/image/fatie.png"></a></div>
<script>


    if ($(".ina_messagelist dl").length > 0) {
        $(".ina_messagelist dl").live("mouseover", function () {
            $(this).find("dd a.ina_delete").show();
        })
        $(".ina_messagelist dl").live("mouseout", function () {
            $(this).find("dd a.ina_delete").hide();
        })
        $(".ina_messagelist dl dd a.ina_delete").live("click", function () {
            $(this).parents("dl").remove();
        })

        $(".ina_messagelist dl").live("click", function () {
            if ($(this).find("dd a.ina_delete").length == 1) {            //点击变成已阅读状态
                var id = $(this).attr("datas");
                var _this = $(this);
                $.post("__APP__/Ucenter/is_reade_all",{'id':id},function(res){
                    if(res==1){
                        //window.location.reload();
                        _this.attr("class","ina_cur");
                    }
                });
            }
        })}

    $(function(){
        $("#delete_all").click(function(){
            ina_tksure("清空消息","本次<b>清空消息</b>后将无法恢复，<br>确定要清空吗？",function(){
                $.post("__APP__/Ucenter/delete_all",function(res){
                    if(res==1){
                        window.location.reload();
                    }
                });
            });

        });
        $("#is_reade_all").click(function(){
            $.post("__APP__/Ucenter/is_reade_all",function(res){
                if(res==1){
                    window.location.reload();
                }
            });
        });

        $(".ina_delete").click(function(){
            var id = $(this).attr('idv');
            $.post("__APP__/Ucenter/delete_all",{'id':id},function(res){
                if(res==1){
                    window.location.reload();
                }
            })
        });
    });

    //获取更多消息
    $("#more").live('click', function(){

        var cont = $(".ina_messagelist dl").length;
        var str = '';
        $.ajax({
            url:'__APP__/More/get_mynews',
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
                    $(".ina_more_btn").before(str);
                }

                if(len<15){
                    $(".ina_more_btn").text("没有更多消息了~");
                }else{
                    //让登陆按钮重新有效
                    $(".ina_more_btn").html('<a href="javascript:;;" id="more">查看更多消息<i class="ina_icon"></i></a>');
                }

            }
        });
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
    function ina_tksure(bt,str,fn){
        $("body").append("<div class='ina_zhezhao' style='display:block;' onclick='$(\".ina_zhezhao,.ina_tksure\").remove();'></div><div class='ina_tksure'><div class='ina_tkbt'><h3>"+bt+"</h3></div><div class='ina_tknr'>"+str+"</div><div class='ina_tkbottom'><a class='ina_close' href='javascript:;' onclick='$(this).parents(\".ina_tksure\").remove();$(\".ina_zhezhao\").remove();'>取消</a><a href='javascript:;' onclick='ina_callback("+fn+")'>确定</a></div></div>");
    }
    function ina_callback(fn){
        if (typeof fn === "function"){
            fn();
        }
    }
</script>
</body>
</html><?php }} ?>