<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:22:06
         compiled from "./Home/Tpl\Ucenter\uspace.html" */ ?>
<?php /*%%SmartyHeaderCode:3060593530ce06c3a3-75713449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c3589c30d4ecc0e86c6f41e23485baaee33c66e' => 
    array (
      0 => './Home/Tpl\\Ucenter\\uspace.html',
      1 => 1496399483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3060593530ce06c3a3-75713449',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'v' => 0,
    'count' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593530ce601ff',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593530ce601ff')) {function content_593530ce601ff($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>个人中心-兴趣社区</title>
<link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/css/170515/index.css">
</head>
<body class="ina_f0f0f0">
<?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("../Public/user_head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_silde">
    <div class="ina_author">
            <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
        <div class="ina_list_search" id="result">
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
</span><span><i class="ina_icon ina_message"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['pl_num'];?>
</span></p>
                        </div>
                    </a>
                    <?php if ($_smarty_tpl->tpl_vars['v']->value['isbest']){?><em></em><?php }?>
                </dt>
                <dd>
                    <h3><a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a></h3>
                    <div class="ina_label">
                        <span class="ina_label<?php echo $_smarty_tpl->tpl_vars['v']->value['pid_class'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['pid_name'];?>
</span>
                        <p><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value['addtime'];?>
</p>
                    </div>
                </dd>
            </dl>
            <?php } ?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['count']->value){?>
        <div class="ina_more_btn">
            <a href="javascript:;;">查看更多兴趣<i class="ina_icon"></i></a>
        </div>
        <?php }?>
        <?php }else{ ?>
        <div class="ina_author_no">
            <p>搞什么嘛！啥都没有~</p>
            <img src="http://img.news18a.com/community/image/author_tieno.png">
        </div>
        <?php }?>
    </div>
</div>
<div class="ina_fh"><img src="http://img.news18a.com/community/image/170515/fh.png"></div>
<div class="ina_fixed"><a href="__APP__/Index/add" target="_blank"><img src="http://img.news18a.com/community/image/fatie.png"></a></div>
<script type="text/javascript">
    $(function() {


        //
        //添加关注
        $(".tianjiagz").live("click", function () {
            var id = $(this).attr('uid');
            var _this = $(this);
            $.post("/index.php/Ucenter/add_attention", {'id': id}, function (data) {
                data_json = eval("(" + data + ")");
                if (data_json.res == 1) {
                    if (data_json.status == 1) {//互粉
                        _this.attr("class", "quxiao ina_huguanzhu");
                        _this.html('<i class="ina_icon"></i><b>互关注</b><em>取  消</em>');
                    } else {//已关注
                        _this.attr("class", "quxiao ina_yiguanzhu");
                        _this.html('<i class="ina_icon"></i><b>已关注</b><em>取  消</em>');
                    }
                } else if (data_json.res == 4) {
                    ina_tksure("提示信息", "登录或注册网通社兴趣社区<br>即可进行此操作^_^", function () {
                        window.location.href = "__APP__/Users/login";
                    });
                } else {
                    ina_tkclose("关注失败", "三秒后将自动关闭…")
                }
            });
        });

        //取消关注
        $(".quxiao").live("click", function () {
            var id = $(this).attr('uid');
            var _this = $(this);
            $.post("/index.php/Ucenter/cancel_attention", {'id': id}, function (data) {
                if (data == 1) {
                    _this.attr("class", "tianjiagz ina_jia");
                    _this.html('<i class="ina_icon"></i>加关注')
                }
                if (data == 2) {
                    ina_tkclose("取消失败", "三秒后将自动关闭…")
                }
            });

        });


        $(".ina_more_btn a").click(function () {
            var cont = $(".ina_list_search dl").length;
            var str = '';
            $.ajax({
                url: '__APP__/More/getuspaceinfo',
                type: 'get',
                dataType: 'json',
                data: {
                    go: cont,
                    uid: "<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"
                },
                success: function (data) {
                    var len = data.length;
                    if (len < 10) {
                        $(".ina_more_btn a").replaceWith("没有更多内容了~");
                    }
                    for (var i = 0; i < len; i++) {
                        str = data[i];
                        $("#result").append(str);
                    }
                    loadImage();
                }
            });
        });
        loadImage();


        function ina_tk(str, btn, href) {
            var height = $(window).height();
            if (href == undefined || href == null) {
                href = "javascript:;"
            }
            var html = "<div class='ina_tkbg' style='height:" + height + "px'></div><div class='ina_tk'><a href='javascript:;' class='ina_close'>&times;</a><p>" + str + "</p><div class='ina_tkbtn'><i></i><a href='" + href + "'>" + btn + "</a></div></div>";
            $("body").append(html)
            $(".ina_tkbg,.ina_close,.ina_tk .ina_tkbtn a").live("click", function () {
                $(".ina_tk,.ina_tkbg").remove();
            })
        }

    });
</script>
<script>

</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>