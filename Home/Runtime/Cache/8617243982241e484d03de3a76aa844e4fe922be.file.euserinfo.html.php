<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 09:28:03
         compiled from "./Home/Tpl\Ucenter\euserinfo.html" */ ?>
<?php /*%%SmartyHeaderCode:292715935305bd81b91-34039550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8617243982241e484d03de3a76aa844e4fe922be' => 
    array (
      0 => './Home/Tpl\\Ucenter\\euserinfo.html',
      1 => 1496710644,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '292715935305bd81b91-34039550',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5935305cd0108',
  'variables' => 
  array (
    'userinfo' => 0,
    'session_id' => 0,
    'user' => 0,
    'xingzuo' => 0,
    'v' => 0,
    'name' => 0,
    'province' => 0,
    'city' => 0,
    'cat' => 0,
    'time' => 0,
    'token' => 0,
    'ftp_img_path' => 0,
    'show_foot' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5935305cd0108')) {function content_5935305cd0108($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>完善信息-极趣</title>
<link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/css/170515/index.css">
</head>
<body class="ina_f0f0f0">
<?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/uploadify.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery.uploadify.js"></script>
<link rel="stylesheet" href="__PUBLIC__/css/jquery.Jcrop.css" type="text/css" />
<script src="__PUBLIC__/js/jquery.Jcrop.js"></script>
<div class="ina_silde">
    <div class="ina_perfect">
        <div class="ina_perfect_top">
            <div class="ina_perfect_bt"><h3>完善信息</h3></div>
            <p>Hi，新朋友，完善以下内容，让车友们更方便找到和关注你。</p>
        </div>
        <div class="ina_perfect_bottom">
            <ul>
                <li>
                    <label class="ina_name">上传头像</label>
                    <div class="ina_file" id="default_div_show">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['picture_path'];?>
">
                        <input type="file" id="file_upload">
                    </div>
                    <label class="ina_name" style="width: 230px;padding-left: 20px;">图片应为200*200的jpg和jpeg格式</label>
                </li>
                <li id="cut_pic_1"  style="display:none;">
                    <div id="cut_pic_1_2">
                        <img id="cropbox_1" src="" />
                    </div>
                    <a href="javascript:;;" id="cut_pic_button_1" style="background: #ff5a60 repeat scroll 0 0;border-radius: 12px;color: #fff;line-height: 30px; margin-top:10px; float:left;padding:5px 10px;">剪裁</a>
                    <input type="hidden" id="x_1" name="x" />
                    <input type="hidden" id="y_1" name="y" />
                    <input type="hidden" id="w_1" name="w" />
                    <input type="hidden" id="h_1" name="h" />
                    <input type="hidden" id="showpicval_1" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['picture'];?>
" />
                    <input type="hidden" id="is_cut"  />
                    <input type="hidden" id="showpicval_1_old" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['picture'];?>
" />
                    <input type="hidden" id="sessionID" value="<?php echo $_smarty_tpl->tpl_vars['session_id']->value;?>
" />
                </li>
                <li>
                    <label>性别</label>
                    <span class="ina_sex <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['sex']==1){?>ina_cur<?php }?>" data="1"><b><i></i></b>男</span>
                    <span class="ina_sex <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['sex']==2){?>ina_cur<?php }?>" data="2"><b><i></i></b>女</span>
                </li>
                <li>
                    <label>昵称</label>
                    <input <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['name']!=''){?>disabled="disabled"<?php }?> type="text" id="nickname" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['name'];?>
" placeholder="我要起个帅气的名字(⊙o⊙)…">
                    <p>此昵称用于展示，填写后将无法修改,最长16个字符</p>
                </li>
                <li>
                    <label>星座</label>
                    <!--&lt;!&ndash;<input id="ina_date" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['birthday'];?>
" type="date">&ndash;&gt;-->
                    <!--<input id="ina_date" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['birthday'];?>
">-->
                    <!--<input onclick="laydate()">-->
                    <select id="xingzuo">
                        <option value="0">请选择星座</option>
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['xingzuo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['xingzuo']==$_smarty_tpl->tpl_vars['v']->value){?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</option>
                        <?php } ?>
                    </select>
                </li>
                <li>
                    <label>省份</label>
                    <select id="province">
                        <option value="0">请选择省份</option>
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['province']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['provinceID'];?>
" <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['province']==$_smarty_tpl->tpl_vars['v']->value['provinceID']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['provinceNameC'];?>
</option>
                        <?php } ?>
                    </select>
                    <label>城市</label>
                    <select id="city">
                        <option>请选择城市</option>
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['cityID'];?>
" <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['city']==$_smarty_tpl->tpl_vars['v']->value['cityID']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['cityNameC'];?>
</option>
                        <?php } ?>
                    </select>
                </li>
                <li>
                    <label>兴趣</label>
                    <div class="ina_xingqu">
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                         <span data="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['v']->value['id'],$_smarty_tpl->tpl_vars['userinfo']->value['interest'])){?>class="ina_cur"<?php }else{ ?>class=""<?php }?> ><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span>
                        <?php } ?>
                    </div>
                </li>
                <li>
                    <label>个人简介</label>
                    <textarea placeholder="写点啥好呢？(⊙o⊙)…" id="ina_textarea"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['introduce'];?>
</textarea>
                    <p>还可以输入<b id="show_num"><?php echo (200-mb_strlen($_smarty_tpl->tpl_vars['userinfo']->value['introduce']));?>
</b>个字</p>
                </li>
                <li><label>&nbsp;</label><a href="javascript:;" id="sure_edit">确定</a></li>
            </ul>
        </div>
    </div>
</div>
<style type="text/css">
    .button_style{ background: none; border:0;}
    .button_style:hover{ background: none;}
    .uploadify-button:hover{ background: none;}
    .uploadify object{ left: 0; top: 0;}
</style>
<script src="http://img.news18a.com/community/js/laydate.js"></script>
<script>

    //城市切换
    $(function () {

        $("#province").change(function(){
            $("#city").attr("disabled",true);
            $.post("__APP__/Ucenter/getcitybyprovince",{'province':$(this).val()},function(data){
                var data_json = eval("(" + data + ")");
                var city_html = "<option value='0'>请选择城市</option>";
                $.each(data_json,function(a,b){
                    city_html += "<option value='"+b.cityID+"'>"+b.cityNameC+"</option>";
                    return;
                });
                $("#city").attr("disabled",false).html(city_html);
            })
        });


        /************uploadify start***************/

            $('#file_upload').uploadify({
                'formData': {
                    'timestamp': '<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
',
                    'token': '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
',
                    'sessionid': '<?php echo $_smarty_tpl->tpl_vars['session_id']->value;?>
',
                    'sizeproportion':3
                },
                'swf': '__PUBLIC__/js/uploadify.swf',
                'auto': true, //是否自动上传
                'uploader': 'http://192.168.0.117/index.php/Comment/add_uploadpic/',
                'fileTypeExts': '*.jpg;*.jpeg',
                'buttonText': '',
                'removeTimeout': 0,
                'height'        : 150,
                'width'        : 150,
                'buttonClass': "button_style",
                'onUploadStart':function(){
                    $("#cut_pic_1").slideDown(500);
                    $("#cut_pic_1_2").html("<img id='cropbox_1' src='http://img.news18a.com/community/image/lazyload_154.jpg' />");
                },
                'onInit': function () {
                    //隐藏上传进度
                    $("#file_upload").hide();
                },
                'onInit': function () {
                    $("#file_upload-queue").hide();
                },
                'onUploadSuccess': function (file, data, respone) {
                    if(data == 'no'){
                        ina_tk("请选择200*200的jpg、jpeg格式图片","确定");
                        return;
                    }

                    if(data == 'type'){
                        ina_tk("请选择jpg、jpeg格式图片","确定");
                        return;
                    }

                    //$("#cut_pic_1").empty();
                    var data_str = eval("("+data+")");
                    $("#cut_pic_1_2").empty();
                    $("#cut_pic_1_2").html("<img id='cropbox_1' src='<?php echo $_smarty_tpl->tpl_vars['ftp_img_path']->value;?>
" + data_str.pic + "' />");
                    $("#showpicval_1").val(data_str.pic);
                    //调用裁剪插件
                    $('#cropbox_1').Jcrop({
                        aspectRatio: 1,
                        onSelect: updateCoords_1,
                        minSize:[150,150],
                        setSelect:[0,0,150,150],
                        onRelease:function(){
                            return;
                        }
                    });
                }
            });

        /********uploadfiy end********/


    });

    //性别样式
    $(".ina_perfect .ina_perfect_bottom ul li .ina_sex").click(function(){
        <?php if (empty($_smarty_tpl->tpl_vars['userinfo']->value['picture'])){?>
            var data = $(this).attr('data');
            if(data==1){
                $("#default_div_show img").attr('src','http://img.news18a.com/community/image/man.png');
            }else{
                $("#default_div_show img").attr('src','http://img.news18a.com/community/image/women.png');
            }
        <?php }?>

                $(this).addClass('ina_cur').siblings('.ina_sex').removeClass('ina_cur');
            });


            //兴趣样式
            $(".ina_perfect .ina_perfect_bottom ul li .ina_xingqu span").click(function(){
                $(this).toggleClass('ina_cur');
            });


            //个人简绍样式
            var element = document.getElementById("ina_textarea");
            if("\v"=="v") {
                if(/msie/i.test(navigator.userAgent)){element.onpropertychange = myfun;}
            }else{
                element.addEventListener("input",myfun,false);
            }

            function myfun(){
                var val=element.value;
                if(val.length>200){
                    $("#ina_textarea").val(val.substr(0,200));
                    $("#ina_textarea").parents("li").find("p b").html(0);
                    ina_tkclose("提示信息","简介长度超过200个字，三秒后将自动关闭…")
                    return false;
                }
                else{
                    $("#ina_textarea").parents("li").find("p b").html(200-val.length);
                }
            }



            $("#cut_pic_button_1").live('click',function(){
                if (parseInt($('#w_1').val())){
                    var pn =  $('#showpicval_1').val();
                    var x = $('#x_1').val();
                    var y = $('#y_1').val();
                    var w = $('#w_1').val();
                    var h = $('#h_1').val();
                    $.post("__APP__/Index/cut_pic_size",{'pic_times':1,'pn':pn,'x':x,'y':y,'w':w,'h':h,'type':1},function(res){
                        $("#cut_pic_1").slideUp(500);
                        $("#default_div_show").html("<img src='<?php echo $_smarty_tpl->tpl_vars['ftp_img_path']->value;?>
" + res + "' width='150' height='150'>" + "<input type='file' style='display: none;' id='file_upload'>");
                        $('#showpicval_1').val(res);
                        $("#is_cut").val(1);
                    });
                }else{
                    ina_tk("请选择一个裁剪区域","确定");
                }

            });
            function updateCoords_1(c){
                $('#x_1').val(c.x);
                $('#y_1').val(c.y);
                $('#w_1').val(c.w);
                $('#h_1').val(c.h);
            }
            function strlen(str){
                var len = 0;
                for (var i=0; i<str.length; i++) {
                    var c = str.charCodeAt(i);
                    //单字节加1
                    if ((c >= 0x0001 && c <= 0x007e) || (0xff60<=c && c<=0xff9f)) {
                        len++;
                    }
                    else {
                        len+=2;
                    }
                }
                return len;
            }



            $("#sure_edit").click(function(){

                var showpicval = $("#showpicval_1").val();
                var sex = $(".ina_cur").attr('data');
                var ina_date = $("#ina_date").val();
                var nickname = $("#nickname").val();
                var nickname_len = strlen(nickname);
                var province = $("#province").val();
                var xingzuo = $("#xingzuo").val();
                var city = $("#city").val();
                var inter = '';
                $(".ina_xingqu .ina_cur").each(function(){
                    inter += $(this).attr('data')+'-';
                });

                var ina_textarea = $("#ina_textarea").val();
//    if(showpicval==''){
//          ina_tk("请上传头像","确定");
//        return;
//    }
                if($("#is_cut").val()==''){
                    showpicval = $("#showpicval_1_old").val();
                }
                if($("#nickname").attr("disabled")==undefined||$("#nickname").attr("disabled")==null){
                    if(nickname==''){
                        ina_tkclose("提示信息","请填写昵称，三秒后将自动关闭…")
                        return;
                    }
                    if(nickname_len > 16){
                        ina_tkclose("提示信息","用户名长度大于16个字符，三秒后将自动关闭…")
                        return;
                    }
                }

                if(sex==''){
                    ina_tk("请选择性别","确定");
                    return;
                }
                if(xingzuo==''){
                    ina_tkclose("提示信息","请选择星座，三秒后将自动关闭…")
                    return;
                }
                if(province==0){
                    ina_tkclose("提示信息","请选择省份，三秒后将自动关闭…")
                    return;
                }
                if(city==0){
                    ina_tkclose("提示信息","请选择城市，三秒后将自动关闭…")
                    return;
                }
                if(inter==''){
                    ina_tkclose("提示信息","请选择兴趣，三秒后将自动关闭…")
                    return;
                }
                $.post("__APP__/Ucenter/update_userinfo",{"showpicval":showpicval,"sex":sex,"nickname":nickname,'xingzuo':xingzuo,'province':province,'city':city,'inter':inter,"ina_textarea":ina_textarea},function(res){
                    if(res==1){
                        window.location.href="__APP__/Ucenter/mymess"
                    }
                    if(res==2){
                        ina_tkclose("提示信息","昵称已存在请重新填写，三秒后将自动关闭…")
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
            };

</script>
<script src="http://img.news18a.com/community/js/public.js"></script>
<?php if ($_smarty_tpl->tpl_vars['show_foot']->value){?>
<div class="ina_footer ">
    <div class="ina_silde">
        <div class="ina_footer_top">
            <div class="ina_footer_logo"><img src="http://img.news18a.com/image/auto/160630/logo.png"></div>
            <dl>
                <dt>新车资讯</dt>
                <dd><a href="http://auto.news18a.com/news/more_list_column_2285_1.html" title="新车资讯">新车资讯</a></dd>
                <dd><a href="http://auto.news18a.com/news/hangyexinwen.html" title="行业资讯">行业资讯</a></dd>
                <dd><a href="http://auto.news18a.com/news/more_list_column_47_1.html" title="行业评论">行业评论</a></dd>
                <dd><a href="http://auto.news18a.com/news/zlgz.html" title="质量关注">质量关注</a></dd>
                <dd><a href="http://auto.news18a.com/news/kjqz.html" title="科技前沿">科技前沿</a></dd>
                <dd><a href="http://auto.news18a.com/news/more_list_column_608_1.html" title="高管动态">高管动态</a></dd>
                <dd><a href="http://auto.news18a.com/news/more_list_column_2297_1.html" title="高端访谈">高端访谈</a></dd>
            </dl>
            <dl>
                <dt>选车购车</dt>
                <dd><a href="http://auto.news18a.com/select_car/" title="车型大全">车型大全</a></dd>
                <dd><a href="http://auto.news18a.com/compare/0/" title="车型对比">车型对比</a></dd>
                <dd><a href="http://auto.news18a.com/news/more_list_column_42_1.html" title="评测试驾">评测试驾</a></dd>
                <dd><a href="http://auto.news18a.com/news/daogou.html" title="选车导购">选车导购</a></dd>
                <dd><a href="http://auto.news18a.com/news/more_list_column_65_1.html" title="各地行情">各地行情</a></dd>
                <dd><a href="http://auto.news18a.com/prd_baojia/" title="汽车报价">汽车报价</a></dd>
                <dd><a href="http://auto.news18a.com/calculator/quankuan_0_0_0/" title="购车计算器">购车计算器</a></dd>
            </dl>
            <dl>
                <dt>精选</dt>
                <dd><a href="http://auto.news18a.com/lianding/editor_1.html" title="社长论道">社长论道</a></dd>
                <dd><a href="http://auto.news18a.com/news/more_list_column_2279_1.html" title="车王特供">车王特供</a></dd>
                <dd><a href="http://v.news18a.com/" title="视频频道">视频频道</a></dd>
                <dd><a href="http://auto.news18a.com/prd_tupian/" title="精彩车图">精彩车图</a></dd>
                <dd><a href="http://auto.news18a.com/news/more_list_column_2179_1.html" title="一图解析">一图解析</a></dd>
            </dl>
        </div>
    </div>
</div>
<?php }?>
<div class="ina_footer">
    <div class="ina_silde">
        <div class="ina_footer_bottom">
            <p><a href="http://www.news18a.com/about.php">公司简介</a>|<a href="http://www.news18a.com/custom.php">客户信息</a>|<a href="http://www.news18a.com/join.php">加入我们</a>|<a href="http://www.news18a.com/connect.php">联系我们</a>|<a href="http://www.news18a.com/customers.php">合作媒体</a></p>
            <p>Copyright &copy; 2003-2017聚众网通(北京)科技有限公司版权所有，未经许可不得转载</p><br>
            <p><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备13031706号-2</a>&nbsp;&nbsp;<a href="http://www.news18a.com/ridao.html"> 广播电视节目制作许可证06725号</a>&nbsp;&nbsp;京公网安备11010802011067号</p>
        </div>
    </div>
</div>
</body>
</html><?php }} ?>