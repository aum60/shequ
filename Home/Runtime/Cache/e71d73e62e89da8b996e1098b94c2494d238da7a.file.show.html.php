<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:05:50
         compiled from "./Home/Tpl\Index\show.html" */ ?>
<?php /*%%SmartyHeaderCode:1060859352cfe0b7234-49560781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e71d73e62e89da8b996e1098b94c2494d238da7a' => 
    array (
      0 => './Home/Tpl\\Index\\show.html',
      1 => 1496407852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1060859352cfe0b7234-49560781',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'vvv' => 0,
    'm_num' => 0,
    'recommend' => 0,
    'k' => 0,
    'v' => 0,
    'comm_list' => 0,
    'comm_count' => 0,
    'count_mess' => 0,
    'count_f' => 0,
    'count_s' => 0,
    'another_message' => 0,
    'class_info' => 0,
    'other_hot' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59352cffe638f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59352cffe638f')) {function content_59352cffe638f($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
-极趣</title>
<link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/css/170515/index.css">
</head>
<body class="ina_f0f0f0">
<?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_silde">
    <div class="ina_left">
        <div class="ina_news">
            <div class="ina_news_bt">
                <h3><?php if ($_smarty_tpl->tpl_vars['list']->value['isbest']==1){?><i class="ina_icon"></i><?php }?><a href="#"><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</a></h3>
                <div class="ina_news_btleft">
                    <?php  $_smarty_tpl->tpl_vars['vvv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vvv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['class_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vvv']->key => $_smarty_tpl->tpl_vars['vvv']->value){
$_smarty_tpl->tpl_vars['vvv']->_loop = true;
?>
                    <span class="ina_label<?php echo $_smarty_tpl->tpl_vars['vvv']->value['class_num'];?>
"><?php echo $_smarty_tpl->tpl_vars['vvv']->value['class_name'];?>
</span>
                    <?php } ?>
                    <p><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['list']->value['addtime'];?>
</p>
                </div>
                <div class="ina_news_btright">
                    <?php if ($_smarty_tpl->tpl_vars['list']->value['status']==1){?>
                    <span><i class="ina_icon ina_look"></i><?php echo $_smarty_tpl->tpl_vars['list']->value['scan'];?>
</span>
                    <span><i class="ina_icon ina_talk"></i><?php echo $_smarty_tpl->tpl_vars['list']->value['comm_num'];?>
</span>
                    <?php }?>
                </div>
            </div>
            <div class="ina_news_nr">
                <?php echo stripslashes($_smarty_tpl->tpl_vars['list']->value['content']);?>

            </div>
            <div class="ina_share"  id="ina_share" style="position: relative;">
                <?php if ($_smarty_tpl->tpl_vars['list']->value['is_give']){?><span><a href="javascript:;;" id="next_give_id" class="ina_cur u_give"><i class="ina_icon"></i>点赞(<div style="display: inline;" id="zhan_num"><?php echo $_smarty_tpl->tpl_vars['m_num']->value;?>
</div>)</a></span><?php }else{ ?><span><a href="javascript:;;" id="next_give_id" class="give"><i class="ina_icon"></i>点赞(<div style="display: inline;" id="zhan_num"><?php echo $_smarty_tpl->tpl_vars['m_num']->value;?>
</div>)</a></span><?php }?>
                <p>分享至：<a name="abc" href="<?php echo $_smarty_tpl->tpl_vars['list']->value['share_qq'];?>
" class="ina_icon ina_qq"></a><a href="<?php echo $_smarty_tpl->tpl_vars['list']->value['share_weibo'];?>
"
                                                                                              class="ina_icon ina_sina"></a><a
                        href="javascript:;;" id="weixin_share" class="ina_icon ina_weixin"></a>
                <div id="show_weixin_share"
                     style=" width:230px; background: #FFF; display: none; position: absolute; right: 0; top: 40px; z-index: 999999; text-align: center; padding: 10px; border: 1px solid #CCC; font-size: 12px;">
                    <img src='<?php echo $_smarty_tpl->tpl_vars['list']->value['share_weixin'];?>
'/><br>打开微信，点击底部的“发现”，使用“扫一扫”即可将网页分享到我的朋友圈。
                </div>
                </p>
            </div>

        </div>
        <div class="ina_comment" id="comment">
            <div class="ina_bt"><h3><i class="ina_icon ina_tuijian"></i>推荐阅读</h3></div>
            <div class="ina_tjlook">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['recommend']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['k']->value%3==0&&$_smarty_tpl->tpl_vars['k']->value!=0){?></ul><ul><?php }?>
                    <li>
                        <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['cover2'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</span></a>
                        <?php if ($_smarty_tpl->tpl_vars['v']->value['isbest']==1){?><em></em><?php }?>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="ina_bt"><h3><i class="ina_icon ina_wzpl"></i>文章评论</h3></div>
            <div class="ina_pldl">
            <?php if ($_SESSION['user']){?>
                <div class="ina_yidl">
                    <textarea placeholder="200字以内更容易插队啦！" id="content_message"></textarea>
                    <span>您还可以输入<b>200</b>个字符</span>
                    <a href="javascript:;;" id="submit_message">提交</a>
                </div>
                <?php }else{ ?>
                <div class="ina_nodl">
                    <p>注册或登录网通社极趣社区即可发表评论</p>
                    <p><a href="__APP__/Users/login" class="ina_cur">登录</a><a href="__APP__/Users/index">注册</a></p>
                </div>
                <?php }?>
                <!-- <div class="ina_nodl">
                    <p>注册或登录网通社兴趣社区即可发表评论</p>
                    <p><a href="#" class="ina_cur">登录</a><a href="#">注册</a></p>
                </div> -->
            </div>
            <div class="ina_comment_list">
                <div class="ina_comment_bt">
                    <h3>全部评论(<?php echo $_smarty_tpl->tpl_vars['list']->value['comm_num'];?>
)</h3>
                    <p><a href="javascript:;;" class="ina_cur" id="new_comm">最新</a><span>|</span><a href="javascript:;;" id="old_comm">最早</a></p>
                </div>
                <div  class="ina_comment_nr" id="result">
                    <?php if ($_smarty_tpl->tpl_vars['comm_list']->value['data']){?>
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comm_list']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                    <?php echo $_smarty_tpl->getSubTemplate ("../More/comment.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php } ?>
                    <?php }else{ ?>
                    <span style="font-size:14px; color: #CCC; text-align: center; display: block; padding: 10px; width: 630px;">暂无评论</span>
                    <?php }?>
                </div>


            </div>

            <?php if ($_smarty_tpl->tpl_vars['comm_count']->value){?>
            <div class="ina_more_btn">
                <a href="javascript:;;">查看更多评论<i class="ina_icon"></i></a>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="ina_right">
        <div class="ina_right_box">
            <div class="ina_grjj">
                <div class="ina_touxiang">
                    <div class="ina_touxiang_left"><a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['list']->value['userid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['picture_path'];?>
"></a></div>
                    <div class="ina_touxiang_right">
                        <p><a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['list']->value['userid'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['list']->value['username'];?>
</span></a>
                            <span class="ina_guanzhu">
                                <?php if ($_SESSION['user']['id']!=$_smarty_tpl->tpl_vars['list']->value['userid']){?>
                                <?php if ($_smarty_tpl->tpl_vars['list']->value['follow']=='1'){?>
                                <a href="javascript:;;" class="quxiao ina_yiguanzhu" uid="<?php echo $_smarty_tpl->tpl_vars['list']->value['userid'];?>
"><i class="ina_icon"></i><b>已关注</b><em>取&nbsp;&nbsp;消</em></a>
                                <?php }elseif($_smarty_tpl->tpl_vars['list']->value['follow']=='2'){?>
                                <a href="javascript:;;" class="quxiao ina_huguanzhu" uid="<?php echo $_smarty_tpl->tpl_vars['list']->value['userid'];?>
"><i class="ina_icon"></i><b>互关注</b><em>取消</em></a>
                                <?php }else{ ?>
                                <a href="javascript:;;" class="tianjiagz ina_jia" uid="<?php echo $_smarty_tpl->tpl_vars['list']->value['userid'];?>
"><i class="ina_icon"></i>加关注</a>
                                <?php }?>
                                <?php }?>
                            </span></p>
                        <span class="ina_sex"><i class="ina_icon <?php if ($_smarty_tpl->tpl_vars['list']->value['sex']=='1'){?>ina_man<?php }else{ ?>ina_women<?php }?>"></i></span>
                    </div>
                </div>
                <div class="ina_grjjbt">个人简介</div>
                <div class="ina_grjjnr"><?php echo $_smarty_tpl->tpl_vars['list']->value['introduce'];?>
</div>
                <ul>
                    <li><span>发帖数</span><p><a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['list']->value['userid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['count_mess']->value;?>
</a></p></li>
                    <li><span>关注</span><p><a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['list']->value['userid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['count_f']->value;?>
</a></p></li>
                    <li class="ina_last"><span>粉丝</span><p><a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['list']->value['userid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['count_s']->value;?>
</a></p></li>
                </ul>
            </div>
        </div>
        <div class="ina_right_box">
            <div class="ina_rightbt">
                <h3>该作者其他文章：</h3>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['another_message']->value){?>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['another_message']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <dl>
                <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank">
                    <dt><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['cover2'];?>
" /></dt>
                    <dd>
                        <h3><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</h3>
                    </dd>
                </a>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['isbest']){?><em></em><?php }?>
            </dl>
            <?php } ?>
            <div class="ina_more"><a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['list']->value['userid'];?>
" target="_blank">查看全部</a></div>
            <?php }else{ ?>
            <span style=" font-size: 14px; padding-left: 12px; color: #b3afaf;">暂无其他文章</span>
            <?php }?>
        </div>
        <div class="ina_right_box">
            <div class="ina_rightbt">
                <h3><?php echo $_smarty_tpl->tpl_vars['class_info']->value['name'];?>
栏目其他热门文章：</h3>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['other_hot']->value){?>
            <dl>
                <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['other_hot']->value[0]['id'];?>
" target="_blank">
                    <dt><img src="<?php echo $_smarty_tpl->tpl_vars['other_hot']->value[0]['cover2'];?>
" /></dt>
                    <dd>
                        <h3><?php echo $_smarty_tpl->tpl_vars['other_hot']->value[0]['title'];?>
</h3>
                    </dd>
                </a>
            <?php if ($_smarty_tpl->tpl_vars['other_hot']->value[0]['isbest']){?><em></em><?php }?>
            </dl>
            <ul>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['other_hot']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['k']->value>0){?>
                <li>
                    <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['user_info']['photo'];?>
">
                        <h3><?php if ($_smarty_tpl->tpl_vars['v']->value['isbest']){?><em></em><?php }?><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</h3>
                        <p>
                            <span class="ina_looked"><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['scan'];?>
</span>
                            <span class="ina_message"><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['pl_num'];?>
</span>
                        </p>
                    </a>
                </li>
                <?php }?>
            <?php } ?>
            </ul>
            <?php }else{ ?>
            <span style=" font-size: 14px; padding-left: 12px; color: #b3afaf;">暂无其他文章</span>
            <?php }?>
        </div>
    </div>
</div>
<div class="ina_right_fixed">
    <a href="javascript:;;" class="<?php if ($_smarty_tpl->tpl_vars['list']->value['is_give']==1){?>ina_cur u_give<?php }else{ ?>give<?php }?>"><i class="ina_icon ina_fixed1 give" id="right_give_id" <?php if ($_smarty_tpl->tpl_vars['list']->value['is_give']==1){?>style="background-position:0 -90px;"<?php }?>></i></a>
    <a href="javascript:;;" class="<?php if ($_smarty_tpl->tpl_vars['list']->value['is_like']==1){?>collection_un<?php }else{ ?>collection<?php }?>"><i class="ina_icon ina_fixed2" <?php if ($_smarty_tpl->tpl_vars['list']->value['is_like']==1){?>style="background-position:-30px -90px;"<?php }?>></i></a>
    <!--<a href="#"><i class="ina_icon ina_fixed3"></i></a>-->
    <a href="#comment"><i class="ina_icon ina_fixed4"></i></a>
    <a href="javascript:;" class="ina_scrolltop"><i class="ina_icon ina_fixed5"></i></a>
</div>
<div class="ina_fixed"><a href="__APP__/Index/add" target="_blank"><img src="http://img.news18a.com/community/image/fatie.png"></a></div>
<script src="http://img.news18a.com/community/js/public.js"></script>
<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="http://img.news18a.com/js/iwt/iwt-min.js"></script>
<script>
    if($(".ina_comment .ina_tjlook").length>0){
        $(".ina_comment .ina_tjlook").Focus({
            qhys:"ul",
            display:"left"
        })
    }
    $(".ina_scrolltop").click(function(){
        $("html,body").stop().animate({scrollTop:0})
    })



    $(function(){
        <!--img加链接 start-->
        $('.ina_news_nr img').wrap(function(){
            return '<a href="' + this.src + '" title="' + this.alt + '" target="_blank"></a>';
        });
        <!--img链接 end-->

        <!--分享功能start-->

        var host = window.location.host,
                url = window.location.href,
                title = '<?php echo ($_smarty_tpl->tpl_vars['list']->value['title']);?>
',
                desc = '<?php echo ($_smarty_tpl->tpl_vars['list']->value['title']);?>
',
                pic = '<?php echo ($_smarty_tpl->tpl_vars['list']->value['banner']);?>
',
                id = '<?php echo ($_smarty_tpl->tpl_vars['list']->value['id']);?>
';

        url = url.replace("&", "%26");
        $.getJSON('http://api.news18a.com/init.php?m=api&c=share&a=wxapi&url=' + url + '&callback=?', function(data) {
            if(data) {
                wx.config({
                    debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
                    appId: data.appId, // 必填，公众号的唯一标识
                    timestamp: data.timestamp, // 必填，生成签名的时间戳
                    nonceStr: data.nonceStr, // 必填，生成签名的随机串
                    signature: data.signature,// 必填，签名，见附录1
                    jsApiList: [
                        'onMenuShareTimeline',
                        'onMenuShareAppMessage',
                        'onMenuShareQQ',
                        'onMenuShareWeibo',
                        'onMenuShareQZone'
                    ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
                });

                wx.ready(function () {
                    wx.onMenuShareTimeline({
                        title: title, // 分享标题
                        link: url, // 分享链接
                        imgUrl: pic // 分享图标
                    });

                    wx.onMenuShareAppMessage({
                        title: title, // 分享标题
                        desc: desc, // 分享描述
                        link: url, // 分享链接
                        imgUrl: pic, // 分享图标
                        type: '', // 分享类型,music、video或link，不填默认为link
                        dataUrl: '' // 如果type是music或video，则要提供数据链接，默认为空
                    });

                    wx.onMenuShareQQ({
                        title: title, // 分享标题
                        desc: desc, // 分享描述
                        link: url, // 分享链接
                        imgUrl: pic // 分享图标
                    });

                    wx.onMenuShareWeibo({
                        title: title, // 分享标题
                        desc: desc, // 分享描述
                        link: url, // 分享链接
                        imgUrl: pic // 分享图标
                    });

                    wx.onMenuShareQZone({
                        title: title, // 分享标题
                        desc: desc, // 分享描述
                        link: url, // 分享链接
                        imgUrl: pic // 分享图标
                    });
                });
            }
        });
        <!--分享功能end-->

        //提交评论数据
        $("#submit_message").click(function(){
            var content_message = $("#content_message").val();
            if(content_message != ''){

                if(content_message.length > 200){
                    ina_tkclose("评论长度超出200字","三秒后将自动关闭…")
                    return false;
                }

                var id = '<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
';
                $.post("__APP__/Index/comment",{"id":id,"content_message":content_message},function(returns){
                    if(returns==100){
                        ina_tkclose("您已被禁言","三秒后将自动关闭…")
                    }
                    if(returns==101){
                        ina_tkclose("请先完善信息","三秒后将自动关闭…",function(){
                            window.location.href="__APP__/Ucenter/euserinfo";
                        })
                        return;
                    }
                    if(returns==22){
                        ina_tkclose("未审核的帖子不能进行此操作","三秒后将自动关闭…")
                    }
                    returns_json = eval("(" + returns + ")");
                    if(returns_json.status == 1){
                        $("#content_message").val('');
                        //ina_tkclose("评论成功","三秒后将自动关闭…")
                        $(".ina_pldl textarea").parents(".ina_yidl").find("span b").html(200);
                        $(".ina_comment_list").html('载入中。。。');
                        $.post("__APP__/Index/get_comm_data_html",{'mid':id},function(data){
                            var data_json = eval("(" + data + ")");
                            $(".ina_comment_list").html(data_json.html);
                        });
                        var old_int = $("#count_rep_comm_1").text();

                        var new_int = (parseInt(old_int) + 1);
                        //$("#count_rep_comm").text(new_int.toString());
                        $("#count_rep_comm_1").text(new_int);
                    }else if(returns_json.status == 3){
                        ina_tksure("提示信息","登录或注册网通社兴趣社区<br>即可进行此操作^_^",function(){
                            window.location.href="__APP__/Users/login";
                        });
                    }
                });
            }else{
                ina_tk("填写评论后才能提交","确定");
            }
        });

        //提交评论回复
        $('.ina_huifu_a').live('click',function(){
            <?php if ($_SESSION['user']){?>
                $("div.ina_huifu_textarea").remove();
                var pid = $(this).attr('pid');
                var cid = $(this).attr('cid');
                var html = '<div class="ina_huifu_textarea"><textarea id="textarea_' + pid + '" class="ina_textarea"></textarea><span>您还可以输入<b>200</b>个字符</span><p><a href="javascript:textarea_submit(' + pid + ');" class="ina_red">确认回复</a><a href="javascript:;;" class="cancel_reply">取消回复</a></p></div>';
                $(this).parents('dd').append(html);
                var element = $(".ina_textarea");
                if("\v"=="v") {
                    if(/msie/i.test(navigator.userAgent)){element[0].onpropertychange = myfun;}
                }else{
                    element[0].addEventListener("input",myfun,false);
                }
            <?php }else{ ?>
                ina_tksure("提示信息","登录或注册网通社兴趣社区<br>即可进行此操作^_^",function(){
                    window.location.href="__APP__/Users/login";
                });
            <?php }?>
                });
                //提交回复的回复
                $('.ina_huifu_ra').live('click',function(){
                    <?php if ($_SESSION['user']){?>
                        $("div.ina_huifu_textarea").remove();

                        //评论id
                        var pid = $(this).attr('pid');
                        var cid = $(this).attr('cid');
                        var html = '<div class="ina_huifu_textarea"><textarea id="textarea_' + pid + '" class="ina_textarea"></textarea><span>您还可以输入<b>200</b>个字符</span><p><a href="javascript:textarea_submit(' + pid + ');" class="ina_red">确认回复</a><a href="javascript:;;" class="cancel_reply">取消回复</a></p></div>';
                        $(this).parents('li').find('div.ina_floor').after(html);
                        var element = $(".ina_textarea");
                        if("\v"=="v") {
                            if(/msie/i.test(navigator.userAgent)){element[0].onpropertychange = myfun;}
                        }else{
                            element[0].addEventListener("input",myfun,false);
                        }

                    <?php }else{ ?>
                        ina_tksure("提示信息","登录或注册网通社兴趣社区<br>即可进行此操作^_^",function(){
                            window.location.href="__APP__/Users/login";
                        });
                    <?php }?>
                        });


                        //取消
                        $(".cancel_reply").live("click",function(){
                            $(this).parents("div.ina_huifu_textarea").remove();
                        });
                        //帖子点赞
                        $(".give").live("click",function(){
                            $.post('__APP__/Index/message_give',{'mid':"<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"},function(res){
                        if(res==1){
                            var old_int = $("#zhan_num").text();
                            var new_int = parseInt(old_int) + 1;
                            $("#zhan_num").text(new_int.toString());
                            $("#next_give_id").attr('class','ina_cur u_give');
                            $("#right_give_id").css("background-position","0 -90px");
                            $("#right_give_id").parent('a').attr("class","ina_cur u_give")
//                            ina_tkclose("已点赞","三秒后将自动关闭…")
                        }
                        if(res==4){
                        //重复点赞不做提示
                        }
                        if(res==3){
                            ina_tksure("提示信息","登录或注册网通社兴趣社区<br>即可进行此操作^_^",function(){
                                window.location.href="__APP__/Users/login";
                            });
                        }
                        if(res==22){
                            ina_tkclose("未审核的帖子不能进行此操作","三秒后将自动关闭…")
                        }
                    });
                });
                //取消点赞
                $(".u_give").live("click",function(){
                    $.post('__APP__/Index/message_u_give',{'mid':"<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"},function(res){
                if(res==1){
                    var old_int = $("#zhan_num").text();
                    var new_int = parseInt(old_int) - 1;
                    $("#zhan_num").text(new_int.toString());
                    $("#next_give_id").attr('class','give');
                    $("#right_give_id").css("background-position","0 -60px");
                    $("#right_give_id").parent('a').attr("class","give")
                    ina_tkclose("已取消点赞","三秒后将自动关闭…")
                }
                if(res==2){
                    ina_tkclose("还没点赞哦","三秒后将自动关闭…")
                }

            });
        });

        //添加关注
        $(".tianjiagz").live("click",function(){
            var id = $(this).attr('uid');
            var _this = $(this);
            $.post("/index.php/Ucenter/add_attention",{'id':id},function(data){
                data_json = eval("(" + data + ")");
                if(data_json.res==1){
                    if(data_json.status==1){//互粉
                        _this.attr("class","quxiao ina_huguanzhu");
                        _this.html('<i class="ina_icon"></i><b>互关注</b><em>取  消</em>');
                    }else{//已关注
                        _this.attr("class","quxiao ina_yiguanzhu");
                        _this.html('<i class="ina_icon"></i><b>已关注</b><em>取  消</em>');
                    }
                }else if(data_json.res==4){
                    ina_tksure("提示信息","登录或注册网通社兴趣社区<br>即可进行此操作^_^",function(){
                        window.location.href="__APP__/Users/login";
                    });
                }else{
                    ina_tkclose("关注失败","三秒后将自动关闭…")
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
                    _this.html('<i class="ina_icon"></i>加关注')
                }
                if(data==2){
                    ina_tkclose("取消失败","三秒后将自动关闭…")
                }
            });


        });


        //对用户的评论点赞
        $('.ding').live('click', function(){
            var self = $(this);
            var id = self.attr('datas');
            var znum = parseInt($('>.znum',this).text());
            //防止多次点击请求多次
            self.attr('class','false');

           //返回点赞请求结果
            $.post('__APP__/Index/comm_give',{'id':id,'num':znum},function(res){
                if(res==1) { //点赞成功

                    self.find('.znum').text(parseInt(znum)+1)
                    self.attr('class','ding');
                }
                if(res==2){
                    ina_tksure("提示信息","登录或注册网通社兴趣社区<br>即可进行此操作^_^",function(){
                        window.location.href="__APP__/Users/login";
                    });
                }

                if(res==3){ //取消点赞
                    self.find('.znum').text(parseInt(znum)-1);
                    self.attr('class','ding');
                    //window.location.reload();
                }
            });

        });


    });




                    //提交回复
    function textarea_submit(pid){
        //获取内容
        var content = $("#textarea_"+pid).val();
        if(content != ''){
            if(content.length > 200){
                ina_tkclose("回复字数超出200字","三秒后将自动关闭…")
                return false;
            }
            var id = '<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
';
            $.post("__APP__/Index/comment",{"id":id,"pid":pid,"content_message":content},function(returns){
                if(returns==100){
                    ina_tkclose("您已被禁言","三秒后将自动关闭…")
                    return;
                }
                if(returns==101){
                    ina_tkclose("请先完善信息","三秒后将自动关闭…")
                    return;
                }

                returns_json = eval("(" + returns + ")");
                if(returns_json.status==1){
                    //ina_tkclose("回复成功","三秒后将自动关闭…")
                    $(".ina_comment_list").html('载入中。。。');
                    $.post("__APP__/Index/get_comm_data_html",{'mid':id},function(data){
                        var data_json = eval("(" + data + ")");
                        $(".ina_comment_list").html(data_json.html);
                    });
                    var old_int = $("#count_rep_comm").text();
                    var new_int = parseInt(old_int) + 1;
                    $("#count_rep_comm").text(new_int.toString());
                }else if(returns_json.status==3){
                    ina_tksure("提示信息","登录或注册网通社兴趣社区<br>即可进行此操作^_^",function(){
                        window.location.href="__APP__/Users/login";
                    });
                }

            });
        }
    }



    //收藏
    $(".collection").live("click",function(){
        var _this = $(this);
        $.post('__APP__/Index/add_like',{'id':"<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" },function(res){
        if(res==1){
            _this.attr("class","collection_un");
            _this.find("i").css("background-position","-30px -90px");
            ina_tkclose("收藏成功","文章已收藏成功…")
        }
        if(res==3){
            ina_tkclose("不要重复收藏","三秒后将自动关闭…")
        }
        if(res==2){
            ina_tksure("提示信息","登录或注册网通社兴趣社区<br>即可进行此操作^_^",function(){
                window.location.href="__APP__/Users/login";
            });
        }
        if(res==4){
            ina_tkclose("收藏失败请重试","三秒后将自动关闭…")
        }
        if(res==22){
            ina_tkclose("未审核的帖子不能进行此操作","三秒后将自动关闭…")
        }
    });
    });
    //取消收藏
    $(".collection_un").live("click",function(){
        var _this = $(this);
        $.post('__APP__/Index/del_like',{'id':"<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" },function(res){
        if(res==1){
            _this.attr("class","collection");
            _this.find("i").css("background-position","-30px -60px");
        }
        if(res==2){
            ina_tkclose("取消收藏失败","三秒后将自动关闭…")
        }

    });
    });

    /////最新和最早按钮样式///////
    $('.ina_comment_bt a').live('click', function(){
        $(this).addClass('ina_cur').siblings().removeClass('ina_cur');
    });

    //最早回复
    $("#old_comm").live('click',function(){
        var str = '';
        $(".ina_more_btn").addClass('more_comm_old').removeClass('more_comm_new');
        $.ajax({
            url:'__APP__/More/get_comm_list',
            type:'get',
            dataType:'json',
            data:{
                go:0,
                flag:'old',
                id:"<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"
            },
            success:function(data){
                var len = data.length;
                if(len<10){
                    $(".ina_more_btn a").replaceWith("没有更多内容了~");
                }else{
                    $(".ina_more_btn a").replaceWith('<a href="javascript:;;">查看更多评论<i class="ina_icon"></i></a>');
                }
                for(var i=0; i<len; i++){
                    str+= data[i];
                }
                $("#result").html(str);
            }
        });
    });

    //最新回复
    $("#new_comm").live('click',function(){
        var str = '';
        $(".ina_more_btn").addClass('more_comm_new').removeClass('more_comm_old');
        $.ajax({
            url:'__APP__/More/get_comm_list',
            type:'get',
            dataType:'json',
            data:{
                go:0,
                flag:'new',
                id:"<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"
            },
            success:function(data){
                var len = data.length;
                if(len<10){
                    $(".ina_more_btn a").replaceWith("没有更多内容了~");
                }else{
                    $(".ina_more_btn a").replaceWith('<a href="javascript:;;">查看更多评论<i class="ina_icon"></i></a>');
                }
                for(var i=0; i<len; i++){
                    str += data[i];
                }
                document.getElementById('result').innerHTML = str;
            }
        });
    });
    /////end///////
    //查看更多评论
    $(".ina_more_btn a").live('click',function(){
        var flag = 'new';

        if($(".ina_more_btn").hasClass("more_comm_old")){
            flag = 'old';
        }
        var cont = $(".ina_comment_nr dl").length;
        var str = '';
        $.ajax({
            url:'__APP__/More/get_comm_list',
            type:'get',
            dataType:'json',
            data:{
                flag:flag,
                go:cont,
                id:"<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"
            },
            success:function(data){
                var len = data.length;
                if(len<10){$(".ina_more_btn a").replaceWith("没有更多内容了~");}
                for(var i=0; i<len; i++){
                    str = data[i];
                    $("#result").append(str);
                }
            }
        });
    });
    ///////
    $("#weixin_share").click(function(){
        if($("#show_weixin_share").css('display')=='none'){
            $("#show_weixin_share").css("display","block");
        }else{
            $("#show_weixin_share").css("display","none");
        }

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
    function myfun(){
        var val=$(".ina_textarea").val();
        if(val.length>200){
            $(".ina_textarea").val(val.substr(0,200));
            return false;
        }
        else{
            $(".ina_textarea").parents(".ina_huifu_textarea").find("span b").html(200-val.length);
        }
    }
    var element = $(".ina_yidl textarea");
    if("\v"=="v") {
        if(/msie/i.test(navigator.userAgent)){element[0].onpropertychange = myfun1;}
    }else{
        element[0].addEventListener("input",myfun1,false);
    }
    function myfun1(){
        var val=$(".ina_pldl textarea").val();
        if(val.length>200){
            $(".ina_pldl textarea").val(val.substr(0,200));
            return false;
        }
        else{
            $(".ina_pldl textarea").parents(".ina_yidl").find("span b").html(200-val.length);
        }
    }
</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>