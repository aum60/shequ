<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 11:34:55
         compiled from "./Admin/Tpl\Comm\index.html" */ ?>
<?php /*%%SmartyHeaderCode:3134593622df4f75a5-20685204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd41d68eccd71b44950df9b5a3e329bad32a8e71c' => 
    array (
      0 => './Admin/Tpl\\Comm\\index.html',
      1 => 1490607862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3134593622df4f75a5-20685204',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'vo' => 0,
    'numPerPage' => 0,
    'totalCount' => 0,
    'currentPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593622dfaac5f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593622dfaac5f')) {function content_593622dfaac5f($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\pro\\bbs_admin\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Public/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="pageHeader">
    <form rel="pagerForm" onsubmit="return navTabSearch(this);" method="post">
	<div class="searchBar">
		<table class="searchContent">
            <tr>
                <td>
                    <b>搜索</b> &nbsp; 
                </td>
				<td>
                    用户名：<input type="text" name="name" size="10" value="<?php echo $_POST['name'];?>
"/>
                </td>
                <td>
                    帖子名：<input type="text" name="title" size="15" value="<?php echo $_REQUEST['title'];?>
"/>
                </td>
               
                <td>
                    <div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div>
                </td>
			</tr>
		</table>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="delete" href="__URL__/delete/id/{sid_user}/navTabId/listcomm" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
            <li class="line">line</li>
            <li><a class="icon" href="javascript:navTabPageBreak()"><span>刷新</span></a></li>
            <!--<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>-->
		</ul>
	</div>
	<table class="table" width="100%" layoutH="138">
		<thead>
			<tr>
				<th align="center" width="10" orderField="id" <?php if (!isset($_smarty_tpl->tpl_vars['smarty']) || !is_array($_smarty_tpl->tpl_vars['smarty']->value)) $_smarty_tpl->createLocalArrayVariable('smarty');
if ($_smarty_tpl->tpl_vars['smarty']->value['request']['_order'] = 'id'){?>class=<?php echo $_REQUEST['_sort'];?>
<?php }?>>ID号</th>
                <th align="center" width="40">昵称</th>
                <th align="center" width="40">评论帖子</th>
                <th align="center" width="40">评论内容</th>
                <th align="center" width="40" orderField="addtime" <?php if (!isset($_smarty_tpl->tpl_vars['smarty']) || !is_array($_smarty_tpl->tpl_vars['smarty']->value)) $_smarty_tpl->createLocalArrayVariable('smarty');
if ($_smarty_tpl->tpl_vars['smarty']->value['request']['_order'] = 'addtime'){?>class=<?php echo $_REQUEST['_sort'];?>
<?php }?>>评论时间</th>
                <th align="center" width="40">评论/回复</th>
                <th align="center" width="40">评论状态</th>
			</tr>
		</thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
            <tr target="sid_user" rel="<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
">
                <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</td>
                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['vo']->value['content']);?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
                <td><?php if ($_smarty_tpl->tpl_vars['vo']->value['pid']=='0'){?>评论<?php }else{ ?>回复<?php }?></td>
                <td><?php if ($_smarty_tpl->tpl_vars['vo']->value['status']==1){?>已查看<?php }else{ ?>未查看<?php }?></td>
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
            <span>条，共<?php echo $_smarty_tpl->tpl_vars['totalCount']->value;?>
条</span>
		</div>
		
        <div class="pagination" targetType="navTab" totalCount="<?php echo $_smarty_tpl->tpl_vars['totalCount']->value;?>
" numPerPage="<?php echo $_smarty_tpl->tpl_vars['numPerPage']->value;?>
" pageNumShown="10" currentPage="<?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
"></div>

	</div>
</div>
<?php }} ?>