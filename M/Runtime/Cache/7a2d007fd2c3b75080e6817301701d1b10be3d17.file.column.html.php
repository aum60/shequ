<?php /* Smarty version Smarty-3.1.6, created on 2017-06-13 16:04:47
         compiled from "./M/Tpl\Index\column.html" */ ?>
<?php /*%%SmartyHeaderCode:248593e22310debe4-50239007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a2d007fd2c3b75080e6817301701d1b10be3d17' => 
    array (
      0 => './M/Tpl\\Index\\column.html',
      1 => 1497340956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '248593e22310debe4-50239007',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593e2231710c5',
  'variables' => 
  array (
    'lanmu_info' => 0,
    'cat' => 0,
    'vv' => 0,
    'pid' => 0,
    'list' => 0,
    'vo' => 0,
    'vvv' => 0,
    'where' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e2231710c5')) {function content_593e2231710c5($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<div class="ina_head">
    <a href="__APP__/Index/index" class="ina_prev"><img src="https://img.news18a.com/community/mobile/image/prev.png"></a>
    <div class="ina_search"><input placeholder="搜索文章标题" id="search_con" value=""/><a href="javascript:sousuo();"><i class="ina_icon"></i></a></div>
</div>
<div class="ina_banner">
    <?php if ($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==1){?>
    <img src="http://img.news18a.com/community/image/head2.jpg">
    <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==2){?>
    <img src="http://img.news18a.com/community/image/head8.jpg">
    <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==3){?>
    <img src="http://img.news18a.com/community/image/head7.jpg">
    <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==4){?>
    <img src="http://img.news18a.com/community/image/head6.jpg">
    <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==5){?>
    <img src="http://img.news18a.com/community/image/head4.jpg">
    <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==6){?>
    <img src="http://img.news18a.com/community/image/head3.jpg">
    <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==7){?>
    <img src="http://img.news18a.com/community/image/head9.jpg">
    <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==8){?>
    <img src="http://img.news18a.com/community/image/head1.jpg">
    <?php }elseif($_smarty_tpl->tpl_vars['lanmu_info']->value['id']==999){?>
    <img src="http://img.news18a.com/community/image/head10.jpg">
    <?php }else{ ?>
    <img src="http://img.news18a.com/community/image/head5.jpg">
    <?php }?>
</div>
<div class="ina_sydaohang">
    <a href="__APP__/Index/index">精华</a>
    <a href="__APP__/Index/hot/time/week">热门排行</a>
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
<div class="ina_list" id="messid">
    <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
    <dl>
        <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
">
            <dd>
                <div class="ina_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['vo']->value['picture_path'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['username'];?>
</div>
                <div class="ina_date"><i class="ina_icon"></i><?php echo $_smarty_tpl->tpl_vars['vo']->value['addtime'];?>
</div>
            </dd>
            <dt>
                <img src="http://img.news18a.com/community/image/lazyload_1000.jpg" data-original="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cover2'];?>
">
                <?php if ($_smarty_tpl->tpl_vars['vo']->value['isbest']==1){?><em><i>精</i></em><?php }?>
                <p><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</p>
            </dt>
            <dd class="ina_m12">
                <div class="ina_label">
                    <?php  $_smarty_tpl->tpl_vars['vvv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vvv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vo']->value['class_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vvv']->key => $_smarty_tpl->tpl_vars['vvv']->value){
$_smarty_tpl->tpl_vars['vvv']->_loop = true;
?>
                    <span class="ina_label<?php echo $_smarty_tpl->tpl_vars['vvv']->value['class_num'];?>
"><?php echo $_smarty_tpl->tpl_vars['vvv']->value['class_name'];?>
</span>
                    <?php } ?>
                </div>
                <div class="ina_list_bottom">
                    <p><span><i class="ina_icon ina_read"></i><?php echo $_smarty_tpl->tpl_vars['vo']->value['scan'];?>
</span><span><i class="ina_icon ina_message"></i><?php echo $_smarty_tpl->tpl_vars['vo']->value['pl_num'];?>
</span><span><i class="ina_icon ina_roar"></i><?php echo $_smarty_tpl->tpl_vars['vo']->value['znum'];?>
</span></p>
                </div>
            </dd>
        </a>
    </dl>
    <?php } ?>
</div>
<div class="ina_btn ina_backgroundno" id="jiazai"><a href="javascript:more(<?php echo $_smarty_tpl->tpl_vars['where']->value;?>
);">点击加载更多<i class="ina_icon"></i></a></div>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("../Public/right_side.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script>

function sousuo(){
    var search_con = encodeURIComponent(encodeURIComponent($("#search_con").val()));
    window.location.href = "__APP__/Index/search/q/" + search_con;
}


function more(){
    var cont = $("#messid dl").length;
    var str = '';
    $.ajax({
        url:'__APP__/More/column',
        type:'get',
        dataType:'json',
        data:{
            pid:"<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
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