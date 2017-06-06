<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 11:34:51
         compiled from "./Admin/Tpl\Message\index.html" */ ?>
<?php /*%%SmartyHeaderCode:27833593622dba49d11-95125980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd41b26d9f8479f15a77017d0a5c1f090a400739b' => 
    array (
      0 => './Admin/Tpl\\Message\\index.html',
      1 => 1496213581,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27833593622dba49d11-95125980',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'numPerPage' => 0,
    'myOptions' => 0,
    'mySelect' => 0,
    'list' => 0,
    'vo' => 0,
    'totalCount' => 0,
    'currentPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593622dc8bf7d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593622dc8bf7d')) {function content_593622dc8bf7d($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\pro\\bbs_admin\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\pro\\bbs_admin\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Public/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" method="post">
	<input type="hidden" name="numPerPage" value="<?php echo $_smarty_tpl->tpl_vars['numPerPage']->value;?>
" /><!--每页显示多少条-->
	<div class="searchBar">
            
          
		<table class="searchContent">
			<tr>
				<td>
                    <b>搜索</b> &nbsp; 
                </td>
                <td>
                    昵称：
                    <input type="text" name="name" size='10' value="<?php echo $_POST['name'];?>
" />
                </td>
                <td>
                    标题：
                    <input type="text" name="title" size='15' value="<?php echo $_POST['title'];?>
" />
                </td>
                <td>
                    分类：<?php echo smarty_function_html_options(array('name'=>'pid','options'=>$_smarty_tpl->tpl_vars['myOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['mySelect']->value),$_smarty_tpl);?>

                </td>
                <td>
                    状态：
                    <select name="status" >
                        <option value="0" <?php if ($_POST['status']=='0'){?>selected="selected"<?php }?>>请选择</option>
                        <option value="1" <?php if ($_POST['status']=='1'){?>selected="selected"<?php }?>>已审核</option>
                        <option value="3" <?php if ($_POST['status']=='3'){?>selected="selected"<?php }?>>未审核</option>
                        <option value="5" <?php if ($_POST['status']=='5'){?>selected="selected"<?php }?>>未通过审核</option>
                        <option value="2" <?php if ($_POST['status']=='2'){?>selected="selected"<?php }?>>草稿</option>
                        <option value="4" <?php if ($_POST['status']=='4'){?>selected="selected"<?php }?>>已删除</option>
                    </select>
                </td>
                <td>
                    <input style='float:left' type="checkbox" name="isbest" value='1' <?php if ($_POST['isbest']=='1'){?>checked<?php }?>>
                    <div style='float:left;margin:4px -13px 0px 5px'>精华帖</div>
                </td>
<!--                <td>
                    <input style='float:left' type="checkbox" name="ishot" value='1' <?php if ($_POST['ishot']=='1'){?>checked<?php }?>>
                    <div style='float:left;margin:4px -10px 0px 5px'>精华推送</div>
                </td>
                 <td>
                    <input style='float:left' type="checkbox" name="isindex" value='1' <?php if ($_POST['isindex']=='1'){?>checked<?php }?>>
                    <div style='float:left;margin:4px -10px 0px 5px'>首页轮播</div>
                </td>-->
                <td>
					<div class="buttonActive"><div class="buttonContent"><button type="submit">搜索</button></div></div>
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
            <ul class="toolBar">
                <!--<li><a class="add" href="__URL__/add" target="dialog" width="1200" height="900" title="发表帖子"><span>添加帖子</span></a></li>-->
                <!--<li><a class="edit" href="__URL__/edit/id/{item_id}"  width="1200" height="500" target="dialog"><span>修改帖子</span></a></li>-->
<!--                <li><a class="delete" href="__URL__/delete/id/{item_id}/navTabId/listmessage" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>-->
                <li class="line">line</li>
                <li><a class="add" id="all_examine" title="确定要进行批量审核吗?"><span>批量审核</span></a></li>
                <li><a class="delete" id="re_all_examine" title="确定要进行批量取消审核吗?"><span>批量取消审核</span></a></li>
                <li class="line">line</li>
                <li><a class="add" id="all_jinghua" title="确定要进行批量加精华吗?"><span>批量加精华</span></a></li>
                <li><a class="delete" id="re_all_jinghua" title="确定要进行批量取消精华吗?"><span>批量取消精华</span></a></li>
                <li class="line">line</li>
                <li><a class="delete" id="re_all_bohui" title="确定要进行批量驳回吗?"><span>批量驳回</span></a></li>
                <li class="line">line</li>
                <li><a class="delete" id="all_delete" title="确定要进行批量删除吗?"><span>批量删除</span></a></li>
                <li class="line">line</li>
                <li><a class="edit" href="__APP__/Comm/index/mid/{item_id}" target="navTab" rel="listcomm" title="帖子评论信息"><span>查看帖子评论</span></a></li>
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
                            <th width="10"></th>
                            <!--<th width="40" orderField="id" <?php if (!isset($_smarty_tpl->tpl_vars['smarty']) || !is_array($_smarty_tpl->tpl_vars['smarty']->value)) $_smarty_tpl->createLocalArrayVariable('smarty');
if ($_smarty_tpl->tpl_vars['smarty']->value['request']['_order'] = 'id'){?>class=<?php echo $_REQUEST['_sort'];?>
<?php }?>>ID</th>-->
                            
                            <th width="150">昵称</th>
                            <th width="150">标题</th>
                            <th width="150">头图</th>
                            <th width="150">分类</th>
                            <th width="150">添加时间</th>
                            <th width="150">精华帖</th>
<!--                            <th width="150">精华推送</th>
                            <th width="150">是否首页轮换</th>-->
                            <!--<th width="150" orderField="scan" <?php if ($_REQUEST['_order']=='scan'){?>class="<?php echo $_REQUEST['_sort'];?>
"<?php }?>>浏览次数</th>-->
                            <th width="150">浏览次数</th>
                            <th width="150">评论次数</th>
                            <th width="150">状态</th>
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
                                <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['name'];?>
</td>
                                <td><a href="__URL__/edit/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"  width="1200" height="500" target="dialog"><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</a></td>
                                <td><?php if ($_smarty_tpl->tpl_vars['vo']->value['cover2']){?><img height="100" src="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cover2_path'];?>
" /><?php }else{ ?>无<?php }?></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['pid'];?>
</td>
                                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
                                <td><?php if ($_smarty_tpl->tpl_vars['vo']->value['isbest']=='1'){?>是<?php }else{ ?>否<?php }?></td>
<!--                                <td><?php if ($_smarty_tpl->tpl_vars['vo']->value['ishot']=='1'){?>是<?php }else{ ?>否<?php }?></td>
                                <td><?php if ($_smarty_tpl->tpl_vars['vo']->value['isindex']=='1'){?>是<?php }else{ ?>否<?php }?></td>-->
                                <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['scan'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['plnum'];?>
</td>
                                <td><?php if ($_smarty_tpl->tpl_vars['vo']->value['status']=='1'){?>已审核<?php }elseif($_smarty_tpl->tpl_vars['vo']->value['status']=='2'){?>草稿<?php }elseif($_smarty_tpl->tpl_vars['vo']->value['status']=='3'){?>未审核<?php }elseif($_smarty_tpl->tpl_vars['vo']->value['status']=='4'){?>已删除<?php }elseif($_smarty_tpl->tpl_vars['vo']->value['status']==5){?>未通过审核<?php }?></td>
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
    //批量驳回
    $("#re_all_bohui").click(function(){
       var r=confirm("确定执行批量驳回精华？");
            if (r==true){
                var str = '';
                $("input[name='select_deom']:checked").each(function(){
                    str += $(this).val() + ',';
                });
                $.post('__URL__/re_all_bohui',{'str':str},function(data){
                    if(data==2){
                        alert('批量驳回成功');
                        navTabPageBreak();
                    }
                });
            }
    });
});
</script>
<?php }} ?>