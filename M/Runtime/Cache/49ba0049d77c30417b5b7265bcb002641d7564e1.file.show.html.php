<?php /* Smarty version Smarty-3.1.6, created on 2017-06-14 15:34:25
         compiled from "./M/Tpl\Index\show.html" */ ?>
<?php /*%%SmartyHeaderCode:4739593dfedd5eaa93-08349245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49ba0049d77c30417b5b7265bcb002641d7564e1' => 
    array (
      0 => './M/Tpl\\Index\\show.html',
      1 => 1497425605,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4739593dfedd5eaa93-08349245',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593dfede108d0',
  'variables' => 
  array (
    'list' => 0,
    'vvv' => 0,
    'comments' => 0,
    'com' => 0,
    'tjmess' => 0,
    'vo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593dfede108d0')) {function content_593dfede108d0($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<div class="ina_top_news">
    <div class="ina_top_img"><img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['banner'];?>
"></div>
    <a href="javascript:fanhui();"  class="ina_prev"><img src="http://img.news18a.com/community/mobile/image/pre.png"></a>
    <a href="javascript:;" class="ina_share"><i class="ina_icon"></i></a>
    <p><span><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</span></p>
    <?php if ($_smarty_tpl->tpl_vars['list']->value['isbest']==1){?>
    <div class="ina_jing">
        <span>精华</span>
    </div>
    <?php }?>
</div>
<div class="ina_newsbt">
    <div class="ina_label">
        <?php  $_smarty_tpl->tpl_vars['vvv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vvv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['class_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vvv']->key => $_smarty_tpl->tpl_vars['vvv']->value){
$_smarty_tpl->tpl_vars['vvv']->_loop = true;
?>
        <span class="ina_label<?php echo $_smarty_tpl->tpl_vars['vvv']->value['class_num'];?>
"><?php echo $_smarty_tpl->tpl_vars['vvv']->value['class_name'];?>
</span>
        <?php } ?>
    </div>
    <p><span><i class="ina_icon ina_read"></i><?php echo $_smarty_tpl->tpl_vars['list']->value['pageView'];?>
</span><span><i class="ina_icon ina_message"></i><?php echo $_smarty_tpl->tpl_vars['list']->value['pl_num'];?>
</span><span><i class="ina_icon ina_roar"></i><?php echo $_smarty_tpl->tpl_vars['list']->value['z_num'];?>
</span></p>
</div>
<div class="ina_silde">
    <?php echo $_smarty_tpl->tpl_vars['list']->value['content'];?>

</div>
<div class="ina_end">
    <span>全文完</span>
</div>
<div class="ina_news_author">
    <dl>
        <dt><img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['picture_path'];?>
"></dt>
        <dd>
            <h3><?php echo $_smarty_tpl->tpl_vars['list']->value['username'];?>
</h3>
            <span>发布于 <?php echo $_smarty_tpl->tpl_vars['list']->value['addtime'];?>
</span>
            <p><?php echo $_smarty_tpl->tpl_vars['list']->value['introduce'];?>
</p>
        </dd>
    </dl>
</div>
<div class="ina_comment">
    <div class="ina_bt">精彩评论</div>
    <?php  $_smarty_tpl->tpl_vars['com'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['com']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['com']->key => $_smarty_tpl->tpl_vars['com']->value){
$_smarty_tpl->tpl_vars['com']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['com']->value['id_path']==''){?>
    <dl>
        <dt><img src="<?php echo $_smarty_tpl->tpl_vars['com']->value['tx'];?>
"></dt>
        <dd>
            <div class="ina_comment_top">
                <h3><?php echo $_smarty_tpl->tpl_vars['com']->value['user'];?>
</h3>
                <span><?php echo $_smarty_tpl->tpl_vars['com']->value['sj'];?>
</span>
                <div class="ina_zan"><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['num'];?>
</div>
            </div>
            <div class="ina_comment_bottom"><?php echo $_smarty_tpl->tpl_vars['com']->value['content'];?>
</div>
            <?php if ($_smarty_tpl->tpl_vars['com']->value['len']>100){?>
            <div class="ina_zhankai">展开评论</div>
            <?php }?>
        </dd>
    </dl>
    <?php }else{ ?>
    <dl>
        <dt><img src="<?php echo $_smarty_tpl->tpl_vars['com']->value['tx'];?>
"></dt>
        <dd>
            <div class="ina_comment_top">
                <h3><?php echo $_smarty_tpl->tpl_vars['com']->value['user'];?>
</h3>
                <span><?php echo $_smarty_tpl->tpl_vars['com']->value['sj'];?>
</span>
                <div class="ina_zan"><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['num'];?>
</div>
                <!--<p>5楼</p>-->
            </div>
            <div class="ina_comment_bottom"><?php echo $_smarty_tpl->tpl_vars['com']->value['content'];?>
</div>
            <?php if ($_smarty_tpl->tpl_vars['com']->value['len']>100){?>
            <div class="ina_zhankai">展开评论</div>
            <?php }?>
            <div class="ina_zan"><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['num'];?>
</div>
            <ul>
                <li>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['com']->value['parent_tx'];?>
">
                    <div class="ina_ypl">
                        <span>原评论：<b><?php echo $_smarty_tpl->tpl_vars['com']->value['parent_user'];?>
</b></span>
                        <span>1天前</span>

                        <!--<p>5楼</p>-->
                    </div>
                    <div class="ina_comment_bottom"><?php echo $_smarty_tpl->tpl_vars['com']->value['parent_content'];?>
</div>
                    <?php if ($_smarty_tpl->tpl_vars['com']->value['parent_len']>100){?>
                    <div class="ina_zhankai">展开评论</div>
                    <?php }?>
                </li>
            </ul>
        </dd>
    </dl>
    <?php }?>
    <?php } ?>
    <div class="ina_plbtn"><a href="http://play.news18a.com/index.php/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">查看更多评论，请访问电脑端</a></div>
</div>
<div class="ina_tjread">
    <div class="ina_bt">推荐阅读</div>
    <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tjmess']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
    <dl>
        <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
">
            <dt>
                <img src="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cover2'];?>
">
            </dt>
            <dd>
                <h3><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</h3>
            </dd>
        </a>
    </dl>
    <?php } ?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_fhtop">
    <a href="/m.php"><span><i class="ina_icon"></i>首页</span></a>
    <a href="javascript:;" class="ina_fh_top"><span>顶部</span></a>
</div>
<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="http://img.news18a.com/js/iwt/iwt-min.js"></script>
<script>

    <!--分享功能start-->

    var host = window.location.host,
            url = window.location.href,
            title = '<?php echo ($_smarty_tpl->tpl_vars['list']->value['title']);?>
',
            desc = '<?php echo ($_smarty_tpl->tpl_vars['list']->value['title']);?>
',
            pic = "<?php echo ($_smarty_tpl->tpl_vars['list']->value['banner']);?>
",
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

if($(".ina_top_news").length>0){
    $(".ina_top_news,.ina_top_news p").height($(window).width()/2);
    $(window).resize(function(){
        $(".ina_top_news,.ina_top_news p").height($(window).width()/2);
    })
}
if($(".ina_fh_top").length>0){
    $(".ina_fh_top").click(function(){
        $("html,body").animate({scrollTop:0});
    })
}
if($(".ina_zhankai").length>0){
    $(".ina_zhankai").click(function(){
        $(this).siblings('.ina_comment_bottom').css({maxHeight:"none"});
        $(this).remove();
    })
}
if($(".ina_share").length>0){
    $(".ina_share").click(function(){
        $("body").append("<div class='ina_zhezhao'><img src='http://img.news18a.com/community/mobile/image/bg.png' onclick='$(this).parents(\".ina_zhezhao\").remove();'></div>");
    })
}

function fanhui(){
    window.history.go(-1);
}

    $(function() {
        window.onload = window.onresize = function () {
            resizeIframe();
        }

        var resizeIframe = function () {
            var bodyw = document.body.clientWidth;
            for (var ilength = 0; ilength <= document.getElementsByTagName("iframe").length; ilength++) {
                document.getElementsByTagName("iframe")[ilength].height = bodyw * 9 / 16;//设定高度
                document.getElementsByTagName("iframe")[ilength].width = bodyw-20;//设定宽度
            }
        }
    });


</script>
</body>
</html><?php }} ?>