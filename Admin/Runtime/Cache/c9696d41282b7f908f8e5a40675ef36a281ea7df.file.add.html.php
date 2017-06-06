<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 13:31:11
         compiled from "./Admin/Tpl\Activity\add.html" */ ?>
<?php /*%%SmartyHeaderCode:1012059363e1f43bdc7-30390485%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9696d41282b7f908f8e5a40675ef36a281ea7df' => 
    array (
      0 => './Admin/Tpl\\Activity\\add.html',
      1 => 1490607864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1012059363e1f43bdc7-30390485',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cat' => 0,
    'v' => 0,
    'time' => 0,
    'token' => 0,
    'session_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59363e1f9b648',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59363e1f9b648')) {function content_59363e1f9b648($_smarty_tpl) {?>
<div class="pageContent">
        
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/uploadify.css">
        <script type="text/javascript" src="__PUBLIC__/js/jquery.uploadify.js"></script>
        <script src="__PUBLIC__/js/jquery.Jcrop.js"></script>
        <link rel="stylesheet" href="__PUBLIC__/css/jquery.Jcrop.css" type="text/css" />
	<form method="post" action="__URL__/data_add/navTabId/listmessage/callbackType/closeCurrent"  class="pageForm required-validate" onsubmit="return validateCallback(this,dialogAjaxDone);"><<?php ?>?php  //窗体组件采用这个 iframeCallback(this, navTabAjaxDone); ?<?php ?>>
            <style type='text/css'>
            .uploadify-button-text{ display: block; line-height: 30px;}
            #add_table{ width: 100%;}
            #add_table tr td{ padding: 5px;}
            </style>
            <div class="pageFormContent" layouth="60">
                <table id="add_table">
                    
                    
                
                <tr><td>帖子标题：</td></tr>

                <tr><td><input type="text" class="required"  name="title" /></td></tr>

                <tr><td>分类：</td></tr>

                <tr><td>
                        <select name="pid">
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                            <?php } ?>
                        </select>
                    </td></tr>
                <tr><td><input type="file" id="file_upload" name="enclosure" size='50' value='' /></td></tr>
                <tr><td>图片比例3:2</td></tr>
                <tr>
                    <td>
                        <div id="showpic_2"></div>
                        <input type='hidden' name='showpicval_2' id='showpicval_2' />
                        <input type="hidden" id="x_2" name="x_2" /> 
                        <input type="hidden" id="y_2" name="y_2" /> 
                        <input type="hidden" id="w_2" name="w_2" /> 
                        <input type="hidden" id="h_2" name="h_2" />
                      </td>
                </tr>
                <tr><td><input type="file" id="file_upload_2" name="enclosure_2" size='50' value='' /></td></tr>
                  <tr><td>属性：</td></tr>

                <tr><td>
                        精华帖：<input type="radio" value="0" name='isbest' checked='checked' />否&nbsp;&nbsp;<input type="radio" value="1" name='isbest' />是<br>
                        
                        
             
                </td></tr>
                <tr><td>精华推送：<input type="radio" value="0" name='ishot' checked='checked' />否&nbsp;&nbsp;<input type="radio" value="1" name='ishot' />是<br> </td></tr>
                <tr><td>首页轮换图：<input type="radio" value="0" name='isindex' checked='checked' />否&nbsp;&nbsp;<input type="radio" value="1" name='isindex' />是</td></tr>
                <tr><td>状态：</td></tr>
                <tr><td>
                    <input type="radio" value='3' name="sstatus" checked='checked' />&nbsp;未审核&nbsp;&nbsp;
                    <input type="radio" value='1' name="sstatus" />&nbsp;已审核&nbsp;&nbsp;
                </td></tr>
                <tr><td>内容：</td></tr>
                  <tr><td>
                          <textarea class='editor' class="required" cols="100" rows="20" name="content" tools='simple' upImgUrl='__URL__/doupload' upImgExt='jpg,jpeg,gif,png'></textarea>
                  
                   </textarea></td></tr>
                    </table>
             </div>

		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">发布</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>
<script type="text/javascript">
    $(function () {
       
        $('#file_upload').uploadify({
            'formData': {
                'timestamp': '<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
',
                'token': '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
',
                'sessionid': '<?php echo $_smarty_tpl->tpl_vars['session_id']->value;?>
',
                'sizeproportion':1
            },
            'swf': '__PUBLIC__/js/uploadify.swf',
            'auto': true, //是否自动上传  
            'uploader': '__URL__/swf_uploadpic/',
            'fileTypeExts': '*.jpg;*.gif;*.jpeg;*.png',
            'buttonText': '请选择',
            'removeTimeout': 0,
            'buttonClass': ".write",
            'onUploadSuccess': function (file, data, respone) {
                $("#showpic").html("<img id='cropbox' src='__PUBLIC__/Uploads/cover/" + data + "' />");
                $("#showpicval").val(data);
                //调用裁剪插件
                $('#cropbox').Jcrop({
                    aspectRatio: 2 / 1,
                    onSelect: updateCoords,
                    minSize:[1000,500],
                    setSelect:[0,50,1000,500],
                    onRelease:function(){
                        return;
                    }
                });
            }
        });
        $('#file_upload_2').uploadify({
            'formData': {
                'timestamp': '<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
',
                'token': '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
',
                'sessionid': '<?php echo $_smarty_tpl->tpl_vars['session_id']->value;?>
',
                'sizeproportion':2
            },
            'swf': '__PUBLIC__/js/uploadify.swf',
            'auto': true, //是否自动上传  
            'uploader': '__URL__/swf_uploadpic/',
            'fileTypeExts': '*.jpg;*.gif;*.jpeg;*.png',
            'buttonText': '请选择',
            'removeTimeout': 0,
            'buttonClass': ".write",
            'onUploadSuccess': function (file, data, respone) {
                
                $("#showpic_2").html("<img id='cropbox_2' src='__PUBLIC__/Uploads/cover/" + data + "' />");
                $("#showpicval_2").val(data);
                //调用裁剪插件
                $('#cropbox_2').Jcrop({
                    aspectRatio: 3 / 2,
                    onSelect: updateCoords_2,
                    minSize:[300,200],
                    setSelect:[0,50,300,200],
                    onRelease:function(){
                        return;
                    }
                });
            }
        });
        
    });
    function updateCoords(c){
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    }
    function updateCoords_2(c){
        $('#x_2').val(c.x);
        $('#y_2').val(c.y);
        $('#w_2').val(c.w);
        $('#h_2').val(c.h);
    }


//    function checkCoords(){
//        if (parseInt($('#w').val()))
//            return true;
//        alert('Please select a crop region then press submit.');
//        return false;
//    }

</script>
<?php }} ?>