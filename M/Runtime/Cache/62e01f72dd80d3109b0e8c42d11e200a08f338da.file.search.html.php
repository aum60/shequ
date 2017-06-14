<?php /* Smarty version Smarty-3.1.6, created on 2017-06-12 15:20:10
         compiled from "./M/Tpl\Index\search.html" */ ?>
<?php /*%%SmartyHeaderCode:24300593e40aa41ba98-97192905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62e01f72dd80d3109b0e8c42d11e200a08f338da' => 
    array (
      0 => './M/Tpl\\Index\\search.html',
      1 => 1497234218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24300593e40aa41ba98-97192905',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'q' => 0,
    'list' => 0,
    'count' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593e40aa757d5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e40aa757d5')) {function content_593e40aa757d5($_smarty_tpl) {?> <!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>极趣社区-搜索</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="format-detection" content="telephone=no" />
<meta name="format-detection" content="email=no" />
<meta name="format-detection" content="address=no" />
<meta name="format-detection" content="date=no" />
<link rel="stylesheet" type="text/css" href="http://img.news18a.com/community/mobile/css/index_170517.css">
<script src="http://img.news18a.com/js/jquery-1.7.2.min.js"></script>
</head>
<body>
<div class="ina_head">
    <a href="javascript:fanhui();" class="ina_prev"><img src="http://img.news18a.com/community/mobile/image/prev.png"></a>
    <span class="ina_head_bt">搜索</span>
</div>
<div class="ina_searchnr"><input value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" id="search_con_nav"/><a href="javascript:;"><i class="ina_icon" id="search_nav"></i></a></div>
<div class="ina_list" id="messid">
    <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
    <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
    <?php echo $_smarty_tpl->getSubTemplate ("../More/search.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php } ?>
    <?php }else{ ?>
    <div class="ina_search_no">
        <img src="http://img.news18a.com/community/image/search.png">
        <p>目前还没有<?php if ($_smarty_tpl->tpl_vars['q']->value){?>“<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
”的<?php }?>相关帖子，<br>您可以<a href="http://www.news18a.com/app/download.php">下载APP</a>首发帖子留下历史首创足迹^_^</p>
    </div>
    <?php }?>
</div>
<?php if ($_smarty_tpl->tpl_vars['count']->value>20){?> <div class="ina_btn" id="jiazai"><a href="javascript:more();">点击加载更多<i class="ina_icon"></i></a></div><?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_fhtop">
    <a href="http://www.news18a.com/app/download.php"><span>下载<br>APP</span></a>
    <a href="javascript:;" class="ina_fh_top"><span>顶部</span></a>
</div>
<script>

$(function () {
    $("#search_nav").click(function () {
        var search_con_nav = encodeURIComponent(encodeURIComponent($("#search_con_nav").val()));
        window.location.href = "__APP__/Index/search/q/" + search_con_nav;
    });

});
function fanhui(){
    window.history.go(-1);
}

var page = <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
;
var keyword=encodeURIComponent('<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
');
function more(){

    var cont = $("#messid dl").length;
    var str = '';
    $.ajax({
        url:'__APP__/More/search',
        type:'get',
        dataType:'json',
        data:{
            q:"<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
",
            go:cont
        },
        success:function(data){
            var len = data.length;
            if(len<10){$(".ina_btn a").replaceWith('<a href="javascript:;;");>暂无更多~</a>');}
            for(var i=0; i<len; i++){
                str = data[i];
                $("#messid").append(str);
            }
            lazy();
        }
    });

}
</script>
</body>
</html><?php }} ?>