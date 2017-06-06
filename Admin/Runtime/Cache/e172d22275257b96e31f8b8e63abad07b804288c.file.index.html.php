<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 11:35:16
         compiled from "./Admin/Tpl\Viewnum\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2463593622f4aa9410-83761786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e172d22275257b96e31f8b8e63abad07b804288c' => 
    array (
      0 => './Admin/Tpl\\Viewnum\\index.html',
      1 => 1492666512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2463593622f4aa9410-83761786',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'num' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593622f4c5ec7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593622f4c5ec7')) {function content_593622f4c5ec7($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("Public/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="pageHeader">
    <p>24小时内浏览数最高为：<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
</p></br>
    <!-- <form method="post" action="__URL__/add" name="myform" onSubmit="return myCheck()"> -->
    <form method="post" action="__URL__/add/navTabId/listusers/callbackType/closeCurrent" enctype="multipart/form-data" onsubmit="return iframeCallback(this, dialogAjaxDone);">
    <input name="time1" type="text" class="required"/>1</br>
	<input name="time2" type="text" class="required"/>2</br>
    <input name="time3" type="text" class="required"/>3</br>
    <input name="time4" type="text" class="required"/>4</br>
    <input name="time5" type="text" class="required"/>5</br>
    <input name="time6" type="text" class="required"/>6</br>
    <input name="time7" type="text" class="required"/>7</br>
    <input name="time8" type="text" class="required"/>8</br>
    <input name="time9" type="text" class="required"/>9</br>
    <input name="time10" type="text" class="required"/>10</br>
    <input name="time11" type="text" class="required"/>11</br>
    <input name="time12" type="text" class="required"/>12</br>
    <input name="time13" type="text" class="required"/>13</br>
    <input name="time14" type="text" class="required"/>14</br>
    <input name="time15" type="text" class="required"/>15</br>
    <input name="time16" type="text" class="required"/>16</br>
    <input name="time17" type="text" class="required"/>17</br>
    <input name="time18" type="text" class="required"/>18</br>
    <input name="time19" type="text" class="required"/>19</br>
    <input name="time20" type="text" class="required"/>20</br>
    <input name="time21" type="text" class="required"/>21</br>
    <input name="time22" type="text" class="required"/>22</br>
    <input name="time23" type="text" class="required"/>23</br>
    <input name="time24" type="text" class="required"/>24</br>
    <div class="buttonContent"><button type="submit">提交</button></div>
	</form>
</div>
 <script type="text/javascript">
      // function myCheck()
      // {
      //   for(var i=0;i<document.myform.elements.length-1;i++)
      //   {
      //    if(document.myform.elements[i].value=="")
      //    {
      //      alert("当前表单不能有空项");
      //      document.myform.elements[i].focus();
      //      return false;
      //    }
      //   }
      //   return true;
        
      // }
    </script>


<?php }} ?>