<?php /* Smarty version Smarty-3.1.6, created on 2017-06-13 16:12:22
         compiled from "./M/Tpl\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:24268593dfed3387042-96076502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af8928b0808767bc371ee395041ba5fb3c6da44b' => 
    array (
      0 => './M/Tpl\\Index\\index.html',
      1 => 1497340956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24268593dfed3387042-96076502',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593dfed37d0bc',
  'variables' => 
  array (
    'row_list' => 0,
    'v' => 0,
    'activity' => 0,
    'vo' => 0,
    'cat' => 0,
    'vv' => 0,
    'message' => 0,
    'pid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593dfed37d0bc')) {function content_593dfed37d0bc($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/search.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ina_focus">
    <div class="ina_focus_nr" id="ina_focus">
        <div class="ina_bd">
            <ul>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['message_link'];?>
"><img data-original="<?php echo $_smarty_tpl->tpl_vars['v']->value['cover'];?>
" src="http://img.news18a.com/community/image/lazyload_1000_400.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</span></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="ina_hd">
            <ul></ul>
        </div>
    </div>
</div>
<div class="ina_hot">
    <div class="ina_hotbt"><h3>热门活动</h3></div>
    <div class="ina_hotnr">
        <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activity']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
        <a href="__APP__/Index/show/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"><img src="http://img.news18a.com/community/image/lazyload_1000.jpg" data-original="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cover2'];?>
" /></a>
        <?php } ?>
    </div>
</div>
<div class="ina_sydaohang">
    <a href="__APP__/Index/index" class="ina_cur">精华</a>
    <a href="__APP__/Index/hot/time/week">热门排行</a>
    <?php  $_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vv']->key => $_smarty_tpl->tpl_vars['vv']->value){
$_smarty_tpl->tpl_vars['vv']->_loop = true;
?>
    <a href="__APP__/Index/column/pid/<?php echo $_smarty_tpl->tpl_vars['vv']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['vv']->value['name'];?>
</a>
    <?php } ?>
</div>
<div class="ina_list" id="messid">
    <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['message']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
    <?php echo $_smarty_tpl->getSubTemplate ("../More/index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php } ?>
</div>
<div class="ina_btn ina_backgroundno" id="jiazai"><a href="javascript:more();">点击加载更多<i class="ina_icon"></i></a></div>
<script>

</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("../Public/right_side.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src='http://img.news18a.com/3g/js/TouchSlide.1.1.js'></script>
<script>

TouchSlide({
    slideCell:"#ina_focus",
    titCell:".ina_hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
    mainCell:".ina_bd ul",
    effect:"leftLoop",
    autoPlay:true,//自动播放
    interTime:5000,//5秒间隔切换
    autoPage:true, //自动分页
    width:750,
    height:300,
    switchLoad:"data-original"
})

</script>
<script>

    function more(){
                var cont = $("#messid dl").length;
                var str = '';
                $.ajax({
                    url:'__APP__/More/index',
                    type:'get',
                    dataType:'json',
                    data:{
//                        pid:"<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
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