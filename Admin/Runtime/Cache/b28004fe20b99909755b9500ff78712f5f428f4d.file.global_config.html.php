<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 11:34:56
         compiled from "./Admin/Tpl\Message\global_config.html" */ ?>
<?php /*%%SmartyHeaderCode:20487593622e0c2f564-15025202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b28004fe20b99909755b9500ff78712f5f428f4d' => 
    array (
      0 => './Admin/Tpl\\Message\\global_config.html',
      1 => 1490607864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20487593622e0c2f564-15025202',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_593622e0df095',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593622e0df095')) {function content_593622e0df095($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("Public/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="pageContent">
    <div style="padding:10px;">
        <div>
        帖子审核：
        <input type="radio" name="examine" <?php if ($_smarty_tpl->tpl_vars['config']->value==1){?>checked="checked"<?php }?>  value="y"  />开启
        <input type="radio" name="examine" <?php if ($_smarty_tpl->tpl_vars['config']->value==0){?>checked="checked"<?php }?>  value="n" />关闭
        
        </div>
    </div>
	
</div>
<script>
$(function(){
    //修改配置
    //获取初始化的radio值
    var Original = $("input[name='examine']:checked").val();
    $("input[name='examine']").change(function(){
         var r=confirm("确定修改？");
            if (r==true){
                var examine = $(this).val();
                $.post('__URL__/examine',{'examine':examine},function(data){
                    if(data==''){
                        alert('修改成功');
                    }
                });
            }else{
                //恢复原始
                $("input[name='examine'][value='" + Original + "']").attr("checked",":checked");
            }
    });
});
</script>
<?php }} ?>