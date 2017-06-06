<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:19:05
         compiled from "./Home/Tpl\Ucenter\myfri.html" */ ?>
<?php /*%%SmartyHeaderCode:1675659353019889170-38066888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82dee3e3ae3fd3e265e5ddf829750d0f83cf4d19' => 
    array (
      0 => './Home/Tpl\\Ucenter\\myfri.html',
      1 => 1496657918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1675659353019889170-38066888',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'count' => 0,
    'v' => 0,
    'count_check' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59353019f3820',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59353019f3820')) {function content_59353019f3820($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\pro\\new\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>我的关注-极趣</title>
<link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/css/170515/index.css">
</head>
<body class="ina_f0f0f0">
<?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("../Public/user_head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_silde">
    <div class="ina_author">
        <?php echo $_smarty_tpl->getSubTemplate ("../Public/user_nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
        <div class="ina_centerbt">
            <h3>共关注<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
位作者</h3>
        </div>
        <div class="ina_list_fans">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <dl>
                <dt>
                    <a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['fid'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['picture_path'];?>
"></a>
                    <span class="ina_sex">
                        <i class="ina_icon <?php if ($_smarty_tpl->tpl_vars['v']->value['sex']=='1'){?>ina_man<?php }else{ ?>ina_women<?php }?>"></i>
                    </span>
                </dt>
                <dd>
                    <a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['fid'];?>
" target="_blank" style="padding:10px;"><h3><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</h3></a>
                    <ul>
                        <li><span>发帖</span><a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['fid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['num_data'][0];?>
</a></li>
                        <li><span>关注</span><a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['fid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['num_data'][1];?>
</a></li>
                        <li class="ina_last"><span>粉丝</span><a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['fid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['num_data'][2];?>
</a></li>
                    </ul>
                    <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['introduce'],16,"...");?>
</p>
                </dd>
                <div class="ina_dl_edit">
                    <a href="javascript:;;" uid="<?php echo $_smarty_tpl->tpl_vars['v']->value['fid'];?>
" types="list" class="quxiao <?php if ($_smarty_tpl->tpl_vars['v']->value['like']=='y'){?>ina_huguanzhu<?php }else{ ?>ina_yiguanzhu<?php }?>">
                        <i class="ina_icon"></i><b><?php if ($_smarty_tpl->tpl_vars['v']->value['like']=='y'){?>互关注<?php }else{ ?>已关注<?php }?></b><em>取&nbsp;&nbsp;消</em></a>
                    <!--<a href="javascript:;" class="quxiao ina_yiguanzhu"><i class="ina_icon"></i><b>已关注</b><em>取&nbsp;&nbsp;消</em></a>-->
                </div>
            </dl>
            <?php } ?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['count_check']->value){?>
        <div class="ina_more_btn">
            <a href="#">查看更多兴趣<i class="ina_icon"></i></a>
        </div>
        <?php }?>
        <?php }else{ ?>
        <div class="ina_boxno">
            <img src="http://img.news18a.com/community/image/guanzhu.jpg">
            <span>嗯哼！去<a href="#">关注</a>点帅哥美女刷刷存在感！</span>
        </div>
        <?php }?>
    </div>
</div>
<div class="ina_fixed"><a href="#"><img src="http://img.news18a.com/community/image/fatie.png"></a></div>
<div class="ina_fh"><img src="http://img.news18a.com/community/image/170515/fh.png"></div>
<script type="text/javascript">
    $(function(){
        //添加关注
        $(".tianjiagz").live("click",function(){
            var id = $(this).attr('uid');
            var _this = $(this);
            $.post("/index.php/Ucenter/add_attention",{'id':id},function(data){
                data_json = eval("(" + data + ")");
                if(data_json.res==1){

                    if(data_json.status==1){//互粉
                        if(_this.attr("types")!='list'){
                            change_user_info();
                        }else{
                            _this.attr("class","quxiao ina_huguanzhu");
                            _this.html('<i class="ina_icon"></i><b>互关注</b><em>取  消</em>');
                        }
                    }else{//已关注
                        if(_this.attr("types")!='list'){
                            change_user_info();
                        }else{
                            _this.attr("class","quxiao ina_yiguanzhu");
                            _this.html('<i class="ina_icon"></i><b>已关注</b><em>取  消</em>');
                        }
                    }
                    //ina_tk("关注成功","确定");
                    window.location.reload();
                }else if(data_json.res==4){
                    ina_tk("登录或注册网通社兴趣社区<br>即可进行此操作^_^","登录","__APP__/Users/login");
                }else{
                    ina_tk("关注失败","确定");
                }
            });
        });
        //取消关注
        $(".quxiao").live("click",function(){
            var id = $(this).attr('uid');
            var _this = $(this);
            $.post("/index.php/Ucenter/cancel_attention",{'id':id},function(data){
                if(data==1){
                    _this.attr("class","tianjiagz ina_jia");
                    _this.html('<i class="ina_icon"></i>加关注');
                    _this.parents("div.ina_grjj").remove();
                }
                if(data==2){
                    ina_tk("取消失败","确定");
                }
            });
        });

        //换一个
        $("#change_another").click(function(){
            change_user_info()
        });


    });
    //换一个
    function change_user_info(){
        $.post("__APP__/Ucenter/get_random_user",function(data){
            $("#show_change_user").empty();
            $("#show_change_user").html(data);
        });
    }
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
<?php echo $_smarty_tpl->getSubTemplate ("../Public/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>