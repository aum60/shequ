<?php /* Smarty version Smarty-3.1.6, created on 2017-06-05 18:16:36
         compiled from "D:\pro\new\Home\Tpl\Public\user_head.html" */ ?>
<?php /*%%SmartyHeaderCode:1848759352f844ba577-07555050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd91bcca34685758b4beb8f38ffbf1f6b442c20a5' => 
    array (
      0 => 'D:\\pro\\new\\Home\\Tpl\\Public\\user_head.html',
      1 => 1496399443,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1848759352f844ba577-07555050',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTION_NAME' => 0,
    'user' => 0,
    'count_mess' => 0,
    'count_f' => 0,
    'count_s' => 0,
    'v' => 0,
    'editor' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59352f84b1f27',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59352f84b1f27')) {function content_59352f84b1f27($_smarty_tpl) {?><div class="<?php if ($_smarty_tpl->tpl_vars['ACTION_NAME']->value=='uspace'){?>ina_author_bg<?php }else{ ?>ina_center_bg<?php }?>">
    <div class="ina_silde">
        <div class="ina_author_top">
            <dl>
                <dt>
                    <?php if ($_smarty_tpl->tpl_vars['ACTION_NAME']->value=='uspace'){?><a href="javascript:;;"><?php }else{ ?><a href="__APP__/Ucenter/euserinfo"><?php }?><img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['picture_path'];?>
"></a><!--<img src="http://img.news18a.com/community/image/man.png">--><i></i>
                    <a href="__APP__/Ucenter/uspace/uid/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><span class="ina_first">发帖数<br><b><?php echo $_smarty_tpl->tpl_vars['count_mess']->value;?>
</b></span></a>
                    <span>关注<br><b><?php echo $_smarty_tpl->tpl_vars['count_f']->value;?>
</b></span>
                    <span>粉丝<br><b><?php echo $_smarty_tpl->tpl_vars['count_s']->value;?>
</b></span>
                </dt>
                <dd>
                    <div class="ina_author_name">
                        <h3><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</h3>
                        <p>
                            <span>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value['sex']=='1'){?>
                                <span><i class="ina_icon ina_man"></i>男</span>
                                <?php }else{ ?>
                                <span><i class="ina_icon ina_women"></i>女</span>
                                <?php }?>
                            </span>
                            <?php if ($_smarty_tpl->tpl_vars['user']->value['city']){?>
                            <span><i class="ina_icon ina_addr"></i>来自<?php echo $_smarty_tpl->tpl_vars['user']->value['province'];?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['city'];?>
</span>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['user']->value['constellation']){?>
                            <span><i class="ina_icon <?php if ($_smarty_tpl->tpl_vars['user']->value['constellation']=='处女座'){?>
                    ina_chunv
                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value['constellation']=='水瓶座'){?>
                    ina_shuiping
                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value['constellation']=='天秤座'){?>
                    ina_tiancheng
                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value['constellation']=='射手座'){?>
                    ina_sheshou
                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value['constellation']=='双子座'){?>
                    ina_shuangzi
                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value['constellation']=='金牛座'){?>
                    ina_jinniu
                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value['constellation']=='巨蟹座'){?>
                    ina_juxie
                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value['constellation']=='天蝎座'){?>
                    ina_tianxie
                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value['constellation']=='狮子座'){?>
                    ina_shizi
                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value['constellation']=='白羊座'){?>
                    ina_baiyang
                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value['constellation']=='摩羯座'){?>
                    ina_mojie
                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value['constellation']=='双鱼座'){?>
                    ina_shuangyu
                    <?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['user']->value['constellation'];?>
</span>
                            <?php }?>

                        </p>
                    </div>
                    <div class="ina_label">
                        <?php if ($_smarty_tpl->tpl_vars['user']->value['interest']){?>
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value['interest']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                        <span class="ina_cur"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span>
                        <?php } ?>
                        <?php }else{ ?>
                        <span class="ina_cur">兴趣</span>
                        <?php }?>

                    </div>
                    <div class="ina_author_jj"><span>个人简介：</span><?php echo $_smarty_tpl->tpl_vars['user']->value['introduce'];?>
</div>
                    <div class="ina_gzzt">
                        <?php if ($_smarty_tpl->tpl_vars['editor']->value){?>
                        <a href="__APP__/Ucenter/euserinfo" class="ina_edit"><i class="ina_icon"></i></a>
                        <?php }else{ ?>
                            <?php if ($_smarty_tpl->tpl_vars['list']->value['follow']=='1'){?>
                            <a href="javascript:;;" class="quxiao ina_yiguanzhu" uid="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><i class="ina_icon"></i><b>已关注</b><em>取&nbsp;&nbsp;消</em></a>
                            <?php }elseif($_smarty_tpl->tpl_vars['list']->value['follow']=='2'){?>
                            <a href="javascript:;;" class="quxiao ina_huguanzhu" uid="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><i class="ina_icon"></i><b>互关注</b><em>取消</em></a>
                            <?php }else{ ?>
                            <a href="javascript:;;" class="tianjiagz ina_jia" uid="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><i class="ina_icon"></i>加关注</a>
                            <?php }?>
                        <?php }?>
                    </div>
                </dd>
            </dl>
        </div>
    </div>
</div><?php }} ?>