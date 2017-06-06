<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 14:22:53
         compiled from "./Admin/Tpl\Activity\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1831059363e0f837c78-22309104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9be2677c83e323cfacb4eb2d8d7b9bd3a75887c1' => 
    array (
      0 => './Admin/Tpl\\Activity\\index.html',
      1 => 1496730166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1831059363e0f837c78-22309104',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59363e0fac811',
  'variables' => 
  array (
    'list' => 0,
    'vo' => 0,
    'totalCount' => 0,
    'numPerPage' => 0,
    'currentPage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59363e0fac811')) {function content_59363e0fac811($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("Public/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="pageHeader">
    <form rel="pagerForm" onsubmit="return navTabSearch(this);" method="post">

        <div class="searchBar">
            <table class="searchContent">
                <tr>
                    <td style='font:bold 14px "宋体";'>活动管理</td>
                    <td style='font:bold 14px "宋体";'>>　<a href="__APP__/Activity/index" target="navTab" rel="listcat" title="活动列表">活动列表</a></td>
                </tr>
            </table>
        </div>
    </form>
</div>
<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="__URL__/add/navTabId/" target="dialog"><span>添加</span></a></li>
            <li><a class="edit" href="__URL__/edit/id/123/navTabId/listcat" target="dialog"><span>修改</span></a></li>
            <li class="line">line</li>
            <li><a class="delete" href="__URL__/delete/id/123/navTabId/listnotice" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
            <!--<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>-->
        </ul>
    </div>
    <style type="text/css">
        .grid .gridTbody td div{ height: 20px;}
    </style>
    <table class="table" width="100%" layoutH="138">
        <thead>
        <tr>
            <th align="center" width="5%" orderField="id" <?php if (!isset($_smarty_tpl->tpl_vars['smarty']) || !is_array($_smarty_tpl->tpl_vars['smarty']->value)) $_smarty_tpl->createLocalArrayVariable('smarty');
if ($_smarty_tpl->tpl_vars['smarty']->value['request']['_order'] = 'id'){?>class=<?php echo $_REQUEST['_sort'];?>
<?php }?>>ID号</th>
            <th align="center" width="10%">发布时间</th>
            <th align="center" width="10%">活动标题</th>
            <th align="center" width="10%">栏目分类</th>
            <th align="center" width="10%">活动状态</th>
            <th align="center" width="10%">活动类型</th>
            <th align="center" width="10%">参加权限</th>
            <th align="center" width="10%">报名人数</th>
            <th align="center" width="10%">活动贴</th>
            <th align="center" width="10%">操作</th>

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
            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['add_time'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['cat_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['status'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['type'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['auth'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['join_num'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['activity_message'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['operation'];?>
</td>
        </tr>
        <?php } ?>

        </tbody>
    </table>
    <div class="panelBar">
        <div class="pages">
            <span>显示</span>
            <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
                <option value="10"> 1</option>
                <option value="15"> 2</option>
                <option value="20"> 3</option>
            </select>
            <span>条，共100条</span>
        </div>

        <div class="pagination" targetType="navTab" totalCount="<?php echo $_smarty_tpl->tpl_vars['totalCount']->value;?>
" numPerPage="<?php echo $_smarty_tpl->tpl_vars['numPerPage']->value;?>
" pageNumShown="10" currentPage="<?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
"></div>

    </div>
</div><?php }} ?>