<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 11:35:13
         compiled from "./Admin/Tpl\PictureManagement\index.html" */ ?>
<?php /*%%SmartyHeaderCode:12451593622f1f01ed9-37816897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49f3612adcab18a963938380c9520d397d3f5e72' => 
    array (
      0 => './Admin/Tpl\\PictureManagement\\index.html',
      1 => 1490607864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12451593622f1f01ed9-37816897',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'numPerPage' => 0,
    'list' => 0,
    'vo' => 0,
    'totalCount' => 0,
    'currentPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593622f262865',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593622f262865')) {function content_593622f262865($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("Public/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" method="post">
	<input type="hidden" name="numPerPage" value="<?php echo $_smarty_tpl->tpl_vars['numPerPage']->value;?>
" /><!--每页显示多少条-->
	
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
            <ul class="toolBar">
                <li><a class="add" href="__URL__/add"  width="800" height="500" target="dialog"><span>添加首页轮播图</span></a></li>
                <li><a class="edit" href="__URL__/edit/id/{item_id}"  width="800" height="500" target="dialog"><span>修改首页轮播图</span></a></li>
                <li><a class="delete" href="__URL__/delete/id/{item_id}"  target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
                <li class="line">line</li>
                <li><a class="icon"  href="javascript:navTabPageBreak()"><span>刷新</span></a></li>
            </ul>
	</div>
    <style type="text/css">
        .grid .gridTbody td div{ height: 100px;}
    </style>
	<table class="table" width="100%" layoutH="112">
		<thead>
			<tr>
                            <th width="20"></th>
                            <!--<th width="40" orderField="id" <?php if (!isset($_smarty_tpl->tpl_vars['smarty']) || !is_array($_smarty_tpl->tpl_vars['smarty']->value)) $_smarty_tpl->createLocalArrayVariable('smarty');
if ($_smarty_tpl->tpl_vars['smarty']->value['request']['_order'] = 'id'){?>class=<?php echo $_REQUEST['_sort'];?>
<?php }?>>ID</th>-->
                            
                            <th width="150">轮播图</th>
                            <th >标题</th>
                            <th >是否显示</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
                            <tr target="item_id" rel="<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
">
                                <td style="heigh：100xp;" width="10"><input type='checkbox' name='select_deom' value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" /></td>
                                <td><img src="<?php echo $_smarty_tpl->tpl_vars['vo']->value['picture'];?>
" height="100" /></td>
                                <td><a href='<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['vo']->value['message_link'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
' target='top'><?php echo $_smarty_tpl->tpl_vars['vo']->value['message_link'];?>
</a></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['status'];?>
</td>
                            </tr>
			<?php } ?>
		</tbody>
	</table>
	<div class="panelBar">
            <div class="pages">
                <span>显示</span>
                <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
                        <option value="10" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==10){?>selected<?php }?>>10</option>
                        <option value="15" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==15){?>selected<?php }?>>15</option>
                        <option value="20" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==20){?>selected<?php }?>>20</option>
                        <option value="25" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==25){?>selected<?php }?>>25</option>
                        <option value="30" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==30){?>selected<?php }?>>30</option>
                </select>
                <span>共<?php echo $_smarty_tpl->tpl_vars['totalCount']->value;?>
条</span>
            </div>
            <div class="pagination" targetType="navTab" totalCount="<?php echo $_smarty_tpl->tpl_vars['totalCount']->value;?>
" numPerPage="<?php echo $_smarty_tpl->tpl_vars['numPerPage']->value;?>
" pageNumShown="10" currentPage="<?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
"></div>
	</div>
</div>
<script>
$(function(){
    $("#all_delete").click(function(){
         var r=confirm("确定执行批量删除？")
            if (r==true){
                var str = '';
                $("input[name='select_deom']:checked").each(function(){
                    str += $(this).val() + ',';
                });
                $.post('__URL__/all_delete',{'str':str},function(data){
                    if(data==2){
                        alert('删除成功');
                        navTabPageBreak();
                    }
                });
            }
    });
    //批量审核
    $("#all_examine").click(function(){
       var r=confirm("确定执行批量审核？");
            if (r==true){
                var str = '';
                $("input[name='select_deom']:checked").each(function(){
                    str += $(this).val() + ',';
                });
                $.post('__URL__/all_examine',{'str':str},function(data){
                    if(data==2){
                        alert('审核成功');
                        navTabPageBreak();
                    }
                });
            }
    });
    //批量取消审核
    
    $("#re_all_examine").click(function(){
       var r=confirm("确定执行批量取消审核？");
            if (r==true){
                var str = '';
                $("input[name='select_deom']:checked").each(function(){
                    str += $(this).val() + ',';
                });
                $.post('__URL__/re_all_examine',{'str':str},function(data){
                    if(data==2){
                        alert('取消审核成功');
                        navTabPageBreak();
                    }
                });
            }
    });
    //批量精华
    $("#all_jinghua").click(function(){
       var r=confirm("确定执行批量加精华？");
            if (r==true){
                var str = '';
                $("input[name='select_deom']:checked").each(function(){
                    str += $(this).val() + ',';
                });
                $.post('__URL__/all_jinghua',{'str':str},function(data){
                    if(data==2){
                        alert('添加精华成功');
                        navTabPageBreak();
                    }
                });
            }
    });
    //批量精华
    $("#re_all_jinghua").click(function(){
       var r=confirm("确定执行批量取消精华？");
            if (r==true){
                var str = '';
                $("input[name='select_deom']:checked").each(function(){
                    str += $(this).val() + ',';
                });
                $.post('__URL__/re_all_jinghua',{'str':str},function(data){
                    if(data==2){
                        alert('取消精华成功');
                        navTabPageBreak();
                    }
                });
            }
    });
});
</script>
<?php }} ?>