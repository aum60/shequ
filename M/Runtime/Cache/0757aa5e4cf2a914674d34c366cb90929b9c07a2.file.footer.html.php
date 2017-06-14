<?php /* Smarty version Smarty-3.1.6, created on 2017-06-14 15:29:05
         compiled from "D:\pro\shequ\M\Tpl\Public\footer.html" */ ?>
<?php /*%%SmartyHeaderCode:1720593dfed3abec79-38333507%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0757aa5e4cf2a914674d34c366cb90929b9c07a2' => 
    array (
      0 => 'D:\\pro\\shequ\\M\\Tpl\\Public\\footer.html',
      1 => 1497425333,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1720593dfed3abec79-38333507',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593dfed3d04d8',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593dfed3d04d8')) {function content_593dfed3d04d8($_smarty_tpl) {?><!--<script type="text/javascript" src="__PUBLIC__/js/jquery.lazyload.min.js"></script>-->
<div class="ina_footer">
    <p>
        <a href="http://play.news18a.com"><i class="ina_icon ina_pc"></i>访问电脑端</a>
        <!--<a href="http://www.news18a.com/app/download.php"><i class="ina_icon ina_app"></i>下载客户端</a>-->
    </p>
    <p>Copyright © 2003-2017聚众网通(北京)科技有限公司版权所有</p>
</div>
<script>

    $.fn.extend({
        lazyload:function(opt,callback){
            if(!opt){};
            _this=this,effect=opt.effect||"show";
            function size(){
                var _top=$(window).scrollTop();
                _this.each(function(){
                    var height=$(this).height(),img_top=$(this).offset().top;
                    if(_top>=img_top-$(window).height()&&_top<=img_top+height){
                        if($(this).attr("data-original")!=null&&$(this).attr("data-original")!=undefined){
                            if($(this).is(":visible")){
                                $(this).attr("src",$(this).attr("data-original"));
                                $(this).removeAttr('data-original');
                                $(this).effect;
                            }
                        }
                    }
                })
            }
            size();
            $(window).resize(function(){
                size();
            })
            $(window).scroll(function(){
                size();
            })
        }
    })

    $(function(){
        lazy();
    })

    function lazy(){
        $("img").lazyload({effect:"fadeIn"});
    }


    (function(){
        var browser = {
            versions: function() {
                var u = navigator.userAgent,
                        app = navigator.appVersion;
                return { //移动终端浏览器版本信息
                    trident: u.indexOf('Trident') > -1, //IE内核
                    presto: u.indexOf('Presto') > -1, //opera内核
                    webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                    gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                    mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
                    ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                    android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
                    iPhone: u.indexOf('iPhone') > -1, //是否为iPhone或者QQHD浏览器
                    iPad: u.indexOf('iPad') > -1, //是否iPad
                    webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部
                };
            }(),
            language: (navigator.browserLanguage || navigator.language).toLowerCase()
        }
        var _top=$(".ina_sydaohang").offset().top;
        $(window).scroll(function(){
            if (browser.versions.android){
                if($(window).scrollTop()>=_top){
                    $(".ina_sydaohang").css({position:"fixed",top:"0",left:"0",zIndex:999});
                    $(".ina_sydaohang").next().css({paddingTop:$(".ina_sydaohang").height()+12});
                }
                else{
                    $(".ina_sydaohang").css({position:"static"});
                    $(".ina_sydaohang").next().css({paddingTop:0});
                }
            }
        })
    })();

</script><?php }} ?>