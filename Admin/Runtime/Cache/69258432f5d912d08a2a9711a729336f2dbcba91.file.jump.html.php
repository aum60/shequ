<?php /* Smarty version Smarty-3.1.6, created on 2017-06-06 13:13:57
         compiled from "./Admin/Tpl\Public\jump.html" */ ?>
<?php /*%%SmartyHeaderCode:475159363a15ac72f7-65092117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69258432f5d912d08a2a9711a729336f2dbcba91' => 
    array (
      0 => './Admin/Tpl\\Public\\jump.html',
      1 => 1490607864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '475159363a15ac72f7-65092117',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59363a15c133c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59363a15c133c')) {function content_59363a15c133c($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
.system-message{ padding: 24px 48px; }
.system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
.system-message .jump{ padding-top: 10px}
.system-message .jump a{ color: #333;}
.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
</style>
</head>
<body>
<div class="system-message">
{if isset($message)}
<h1>:)</h1>
<p class="success">{$message}</p>
{else}
<h1>:(</h1>
<p class="error">{$error}</p>
{/if}
<p class="detail"></p>
<p class="jump">
页面自动 <a id="href" href="{$jumpUrl}">跳转</a> 等待时间： <b id="wait">{$waitSecond}</b>
</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time == 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html><?php }} ?>