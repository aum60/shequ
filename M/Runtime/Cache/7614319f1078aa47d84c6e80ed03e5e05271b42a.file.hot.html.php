<?php /* Smarty version Smarty-3.1.6, created on 2017-06-14 13:49:18
         compiled from "./M/Tpl\Index\hot.html" */ ?>
<?php /*%%SmartyHeaderCode:31292593e227573b4f5-98557537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7614319f1078aa47d84c6e80ed03e5e05271b42a' => 
    array (
      0 => './M/Tpl\\Index\\hot.html',
      1 => 1497418608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31292593e227573b4f5-98557537',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593e2275e9252',
  'variables' => 
  array (
    'cat' => 0,
    'vv' => 0,
    'pid' => 0,
    'col' => 0,
    'time' => 0,
    'list' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e2275e9252')) {function content_593e2275e9252($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<div class="ina_head">
    <a href="__APP__/Index/index" class="ina_prev"><img src="https://img.news18a.com/community/mobile/image/prev.png"></a>
    <div class="ina_search"><input  placeholder="搜索文章标题" id="search_con" value=""/><a href="javascript:sousuo();"><i class="ina_icon"></i></a></div>
</div>
<div class="ina_sydaohang ina_white">
    <a href="__APP__/Index/index">精华</a>
    <a href="__APP__/Index/hot/time/week" class="ina_cur">热门排行</a>
    <?php  $_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vv']->key => $_smarty_tpl->tpl_vars['vv']->value){
$_smarty_tpl->tpl_vars['vv']->_loop = true;
?>
    <a href="__APP__/Index/column/pid/<?php echo $_smarty_tpl->tpl_vars['vv']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['vv']->value['id']==$_smarty_tpl->tpl_vars['pid']->value){?>class="ina_cur"<?php }else{ ?><?php }?>><?php echo $_smarty_tpl->tpl_vars['vv']->value['name'];?>
</a>
    <?php } ?>
</div>
<div class="ina_phdate">
    <?php if ($_smarty_tpl->tpl_vars['col']->value=='pl'){?>
    <a href="__APP__/Index/hot/time/week/col/pl" <?php if ($_smarty_tpl->tpl_vars['time']->value=='week'){?>class="ina_cur"<?php }?>>周</a>
    <a href="__APP__/Index/hot/time/month/col/pl" <?php if ($_smarty_tpl->tpl_vars['time']->value=='month'){?>class="ina_cur"<?php }?>>月</a>
    <a href="__APP__/Index/hot/col/pl" <?php if ($_smarty_tpl->tpl_vars['time']->value==''){?>class="ina_cur"<?php }?>>总</a>
    <?php }else{ ?>
    <a href="__APP__/Index/hot/time/week" <?php if ($_smarty_tpl->tpl_vars['time']->value=='week'){?>class="ina_cur"<?php }?>>周</a>
    <a href="__APP__/Index/hot/time/month" <?php if ($_smarty_tpl->tpl_vars['time']->value=='month'){?>class="ina_cur"<?php }?>>月</a>
    <a href="__APP__/Index/hot/time/all" <?php if ($_smarty_tpl->tpl_vars['time']->value=='all'){?>class="ina_cur"<?php }?>>总</a>
    <?php }?>
</div>
<div class="ina_list" id="messid">
    <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
    <?php echo $_smarty_tpl->getSubTemplate ("../More/hot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php } ?>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("../Public/right_side.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script>

var page = <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
;

function more(col){
    var pid='';
    if (col=='') {
        if ('<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
'=='week') {
            pid=61;
        }else if('<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
'=='month'){
            pid=62;
        }else{
            pid=6;
        }

    }else{
        if ('<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
'=='week') {
            pid=71;
        }else if('<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
'=='month'){
            pid=72;
        }else{
            pid=7;
        }
    }

    $.ajax({
        type: "get",//数据提交的类型（post或者get）
        url: "__APP__/Index/ajax_more",//数据提交得地址
        data: {pid:pid,p:page},//提交的数据(自定义的一些后台程序需要的参数)
        dataType: "json",//返回的数据类型
        success: function(data){//请求成功后返执行的方法（这里处理添加五条的数据 data为处理之后的返回数据）

            var str = "";
            page = data.p;
            $.each(data.list,function(a,b){//循环遍历返回的json数据
                //str += "第"+(a+1)+"条数据:" + b;//将json数据拼接成字符串
                str='<dl><a href="__APP__/Index/show/id/'+b.id+'"><dt><img src="'+b.cover2+'">';
                if (b.isbest==1) {
                    str+='<em><i>精</i></em>';
                };
                str+='<p>'+b.addtime+'</p></dt><dd><h3>'+b.title+'</h3><div class="ina_label">';
                $.each(b.class_name,function(k,v){
                    str+='<span class="ina_label1">'+v.class_name+'</span>';
                });
                str+='</div><div class="ina_list_bottom"><div class="ina_photo"><img src="'+b.picture_path+'">'+b.username+'</div>';
                if (col=='pl') {
                    str+='<p><span><i class="ina_icon ina_message"></i>'+b.pl_num+'</span></p></div></dd></a></dl>';
                }else{
                    str+='<p><span><i class="ina_icon ina_read"></i>'+b.scan+'</span></p></div></dd></a></dl>';
                }
                $("#messid").append(str);
            });
            if (data.wu==1) {
                var div_jiazai=document.getElementById('jiazai');
                div_jiazai.style.display="none";
            }

        }

    })

}

function sousuo(){
    var search_con = encodeURIComponent(encodeURIComponent($("#search_con").val()));
    if (search_con=='') {
        alert('请输入文章标题');
        return;
    }else{
        window.location.href = "__APP__/Index/search/q/" + search_con;
    }
}
</script>
</body>
</html><?php }} ?>