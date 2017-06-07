<?php

//用户中心模块
class UcenterAction extends CommentAction {

    public function __construct()
    {
        parent::__construct();

        //检查用户信息
        $this->check_user();

        //渲染栏目
        $this->keyword();
    }

    //个人中心
    public function index() {
        $mod = D("Message");
        $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];
        //查询用户的帖子数关注及粉丝数
        $this->get_user_info_data($uid);
        $where = array();
        $where['uid'] = array('eq', $uid);
        $where['status'] = array('eq', "1");
        $count = $mod->where($where)->count();       //获取总数据条数
        //我的帖子-已审核
        $list = ($mod->where($where)->order('addtime desc,status asc')->limit(0 . ',' . 15)->select());
        foreach ($list as &$vo) {
            $modell = D('Comm');
            $num = $modell->where("mid={$vo['id']} and pid='0'")->count('mid');
            //回复数量
            $vo['plnum'] = $num;
            //状态

            $vo['status'] = '已审核';

            //浏览量
            $vie=$this->_getPageviews($vo['id'])+$vo['show_scan'];
            $vo['scan'] = $vie;

            //时间
            $vo['addtime'] = $this->get_time_Company($vo['addtime']);
            //查询栏目归属
            $tmp = D('Cat')->where(array('id'=>array('in',$vo['pid'])))->find();
            $vo['p_name'] = $tmp['name'];
            $vo['class_id'] = $tmp['class'];
            $vo['cover'] = $this->ftp_img_path . $vo['cover'];
            $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
        }
        //我的帖子-未审核
        $where = array();
        $where['uid'] = array('eq', $uid);
        $where['status'] = array('in', "3,5");
        $wsh_count = $mod->where($where)->count();       //获取总数据条数
        $wsh_list = ($mod->where($where)->order('addtime desc,status asc')->limit(0 . ',' . 15)->select());
        foreach ($wsh_list as &$vo) {
            $modell = D('Comm');
            $num = $modell->where("mid={$vo['id']} and pid='0'")->count('mid');
            //回复数量
            $vo['plnum'] = $num;
            //状态
            if ($vo['status'] == 3) {
                $vo['status'] = '未审核';
            } else {
                $vo['status'] = '未通过';
            }

            //浏览量
            $vie=$this->_getPageviews($vo['id'])+$vo['show_scan'];
            $vo['scan'] = $vie;

            //时间
            $vo['addtime'] = $this->get_time_Company($vo['addtime']);
            //查询栏目归属
            $tmp = D('Cat')->where(array('id'=>array('in',$vo['pid'])))->find();
            $vo['p_name'] = $tmp['name'];
            $vo['class_id'] = $tmp['class'];
            $vo['cover'] = $this->ftp_img_path . $vo['cover'];
            $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
        }
        //热门文章
        $this->assign('count', $count);
        $this->assign('wsh_count', $wsh_count);
        $this->assign('count_page', $count>12 ? true : false);
        $this->assign('list', $list);
        $this->assign('wsh_list', $wsh_list);
        $this->display();

    }

    public function draft(){
        $mod = D("Message");
        $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];

        $where = array();

        //我的草稿
        $where['uid'] = array('eq', $uid);
        $where['status'] = array('eq', "2");
        $list2 = ($mod->where($where)->order('addtime desc,status asc')->limit(6)->select());
        foreach ($list2 as &$vo) {
            //时间
            $vo['addtime'] = $this->get_time_Company($vo['addtime']);
            //查询栏目归属
            $tmp = D('Cat')->where('id = ' . $vo['pid'])->find();
            $vo['p_name'] = $tmp['name'];
            $vo['class_id'] = $tmp['class'];
            $vo['cover_path'] = $vo['cover'];
            $vo['cover2_path'] = $vo['cover2'];
            $vo['status'] = '草稿';
//            $vo['cover'] = $this->ftp_img_path . $vo['cover'];
            $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
        }

        $this->assign('list2', $list2);
        $this->display();

    }

    public function user_info_edit() {
        $mod = D("Message");
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            //登录用户的id
            $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];

            //查询用户信息
            $res = D('Users')->get_user_info($uid);
            //生日
            $birthday = '';
            if ($res['birthday']) {
                $birthday = date('Y-m-d', $res['birthday']);
            }
            $res['birthday'] = $birthday;

            //头像显示
            $res['picture_path'] = $this->get_portrait($res['photo'], $res['sex']);
            $res['introduce'] = $res['introduce'] ? $res['introduce'] : '这个人很懒，什么都没有留下~';
            $res['introduce'] = mb_strlen($res['introduce'] > 30) ? mb_strcut($res['introduce'], 0, 30, 'utf-8') . '...' : $res['introduce'];

            //查询全部的省份
            $pmodel = M('InaProvince');
            $province = $pmodel->field('provinceID,provinceNameC')->order('provinceOrder asc')->select();
            $this->assign('province', $province);
            //查询城市
            $cmodel = M('InaCity');
            $city = $cmodel->where('provinceID=' . $res['province_id'])->field('cityID,cityNameC')->select();
            
            $this->assign('city', $city);
            //查询兴趣
            $interest = array();
            if ($res['interest']) {
                $interest = explode('-', $res['interest']);
            }
            $res['interest'] = $interest;
          

            $res['city']=$res['city_id'];
            $res['province']=$res['province_id'];
            //符";s:8:"birthday";N;s:8:"interest";N;s:13:"constellation";N;}
            //导航
            $this->keyword();
            //用户信息
            $this->assign('user', $res);
            //查询用户的帖子数关注及粉丝数
//            $this->get_user_info_data($uid);
            $where['uid'] = array('eq', $uid);
            $where['status'] = array('in', "1,3");
            //我的帖子
            $list = ($mod->where($where)->order('addtime desc,status asc')->limit(3)->select());
            foreach ($list as &$vo) {
                $modell = D('Comm');
                $num = $modell->where("mid={$vo['id']} and pid='0'")->count('mid');
                //回复数量
                $vo['plnum'] = $num;
                //状态
                //$vo['status'] = $status[$vo['status']];
                //时间
                $vo['addtime'] = $this->get_time_Company($vo['addtime']);
                //状态
                if ($vo['status'] == 3) {
                    $vo['status'] = '未审核';
                } else {
                    $vo['status'] = '已审核';
                }
                //查询栏目归属
                $tmp = D('Cat')->where('id = ' . $vo['pid'])->find();
                $vo['p_name'] = $tmp['name'];
                $vo['class_id'] = $tmp['class'];
//                $vo['cover'] = $this->ftp_img_path . $vo['cover'];
                $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
            }
            $where = array();
            $where['uid'] = array('eq', $uid);
            $where['status'] = array('eq', "5");
            //未审核通过的帖子
            $list_wtg = ($mod->where($where)->order('addtime desc,status asc')->limit(3)->select());
            foreach ($list_wtg as &$vo) {
                $modell = D('Comm');
                $num = $modell->where("mid={$vo['id']} and pid='0'")->count('mid');
                //回复数量
                $vo['plnum'] = $num;
                //状态
                //$vo['status'] = $status[$vo['status']];
                //时间
                $vo['addtime'] = $this->get_time_Company($vo['addtime']);
                //状态
                $vo['status'] = '未通过';
                //查询栏目归属
                $tmp = D('Cat')->where('id = ' . $vo['pid'])->find();
                $vo['p_name'] = $tmp['name'];
                $vo['class_id'] = $tmp['class'];
//                $vo['cover'] = $this->ftp_img_path . $vo['cover'];
                $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
            }
            $where = array();
            //我的草稿
            $where['uid'] = array('eq', $uid);
            $where['status'] = array('eq', "2");
            $list2 = ($mod->where($where)->order('addtime desc,status asc')->limit(6)->select());
            foreach ($list2 as &$vo) {
                //时间
                $vo['addtime'] = $this->get_time_Company($vo['addtime']);
                //查询栏目归属
                $tmp = D('Cat')->where('id = ' . $vo['pid'])->find();
                $vo['p_name'] = $tmp['name'];
                $vo['class_id'] = $tmp['class'];
                $vo['cover_path'] = $vo['cover'];
                $vo['cover2_path'] = $vo['cover2'];
                $vo['status'] = '草稿';
//                $vo['cover'] = $this->ftp_img_path . $vo['cover'];
               $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
            }
            //热门文章
            $this->get_hot();
            $this->assign('list', $list);
            $this->assign('list_wtg', $list_wtg);
            $this->assign('list2', $list2);
            $this->display();
        } else {
            $this->redirect('Users/login');
        }
    }

    //修改用户信息
    public function user_edit_data() {

        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {

            if ($_POST) {
                $ina_date = strtotime($_POST['ina_date']);
                $province = intval($_POST['province']);
                $city = intval($_POST['city']);
                $inter = substr(trim($_POST['inter']), 0, -1);
                if (!$ina_date || $ina_date < 0) {
                    echo 1;
                    die;
                }

                if (!$province || !$city) {
                    echo 1;
                    die;
                }
                if ($inter == '') {
                    echo 1;
                    die;
                }
                $userinfo=D("Users")->get_user_info($_SESSION[C('USER_AUTH_KEY')]['id']);
                

                //获取星座
                $constellation = $this->get_constellation(date('m', $ina_date), date('d', $ina_date));
                $tmp_array = array();
                //$tt_mp = array();
                $tmp_array['id'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
                $tmp_array['city_id'] = $city;
                $tmp_array['province_id'] = $province;
                $tmp=unserialize($userinfo['extend_info']);
                $tmp['birthday'] = $ina_date;
                
                $tmp['interest'] = $inter;
                $tmp['constellation'] = $constellation;
                $tmp_array['extend_info'] = serialize($tmp);
                $res = D('Users')->update_user_info($tmp_array);
                if ($res >= 0) {
                    echo 2;
                } else {
                    echo 3;
                }
            }
        } else {
            $this->redirect('Users/login');
        }
    }

    //我的收藏展示
    public function mylike() {
            $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];

            $mod = M("Like");
            //导入分页类
            import("ORG.Util.Page");
            //获取总数据条数
            $count = $mod->where("uid={$uid}")->count();
            //创建分页对象
            $page = new Page($count, 12);
            //$res = $mod->where("uid={$uid}")->order('create_time desc')->limit($page->firstRow . ',' . $page->listRows)->select();
            $sql = "select a.*,b.id,b.show_scan from bbs_like as a right join bbs_message as b on a.mid=b.id where a.uid =" . $uid . " order by create_time desc limit " . $page->firstRow . "," . $page->listRows;
            $res = M()->query($sql);
            //echo"<pre>";print_r($res);die;
            $tmp_array = array();
            if ($res) {
                foreach ($res as $v) {
                    $tmp_array[date('Y-m-d', $v['create_time'])][] = $v;
                }
            }
            //循环三维数组
            $mod2 = M("Message");
            $list = array();
            foreach ($tmp_array as $k => $value) {
                foreach ($value as $v) {
                    if ($v['mid'] != '0') {
                        //查询帖子信息
                        $mm = $mod2->where('id=' . $v['mid'])->field('id,title,isbest,addtime,pid,cover2')->find();
                        //get_time_Company
                        $mm['addtime'] = $this->get_time_Company($mm['addtime']);
                        $catinfo = M('Cat')->where(array('id'=>array('in',$mm['pid'])))->field('name,class')->find();
                        $mm['pid'] = $catinfo['name'];
                        $mm['pid_class'] = $catinfo['class'];
                        $mm['cover'] = $this->ftp_img_path . $mm['cover'];
                        $mm['cover2'] = $this->ftp_img_path . $mm['cover2'];
                        //查询作者信息
                        $_M_user = D('Users');
                        $name = $_M_user->get_user_by_id($v['id']);
                        //有昵称显示昵称没有则显示登录名称
                        $mm['username'] = $name['name'] ? $name['name'] : $name['username'];
                        $mm['picture_path'] = $this->get_portrait($name['photo'], $name['sex']);
                        $mm['userid'] = $name['id'];
                        //echo $mod2->getLastSql();die;
                        //查询评论
                        $p = M('Comm')->where('mid=' . $v['id'])->count();
                        $mm['pl_num'] = $p;
                        //浏览量
                        //$vie = M('ViewRecord')->where('mid = ' . $v['id'])->count();
                        $vie=$this->_getPageviews($v['id'])+$v['show_scan'];
                        $mm['scan'] = $vie;
                        $list[$k][] = $mm;
                    }
                }
            }

            $this->assign('pageinfo', $page->show());
            $this->assign('mnum', $count);
            $this->assign('count', $count>12 ? true : false);
            $this->assign('list', $list);
            //热门文章
            $this->get_hot();
            //查询用户的帖子数关注及粉丝数
            $this->get_user_info_data($uid);
            $this->display();

    }

    //我的帖子
    public function mymess() {
        global $status;
        $mod = D("Message");
        $flag = $_REQUEST['flag'];
        $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];
            //查询用户的帖子数关注及粉丝数
            $this->get_user_info_data($uid);
            $where = array();
            $where['uid'] = array('eq', $uid);
            $where['status'] = array('eq', "1");
            $count = $mod->where($where)->count();       //获取总数据条数
            //我的帖子-已审核
            $list = ($mod->where($where)->order('addtime desc,status asc')->limit(0 . ',' . 15)->select());
            foreach ($list as &$vo) {
                $modell = D('Comm');
                $num = $modell->where("mid={$vo['id']} and pid='0'")->count('mid');
                //回复数量
                $vo['plnum'] = $num;
                //状态

                $vo['status'] = '已审核';

                //浏览量
                $vie=$this->_getPageviews($vo['id'])+$vo['show_scan'];
                $vo['scan'] = $vie;

                //时间
                $vo['addtime'] = $this->get_time_Company($vo['addtime']);
                //查询栏目归属
                $tmp = D('Cat')->where(array('id'=>array('in',$vo['pid'])))->find();
                $vo['p_name'] = $tmp['name'];
                $vo['class_id'] = $tmp['class'];
                $vo['cover'] = $this->ftp_img_path . $vo['cover'];
                $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
            }
            //我的帖子-未审核
            $where = array();
            $where['uid'] = array('eq', $uid);
            $where['status'] = array('in', "3");
            $wsh_count = $mod->where($where)->count();       //获取总数据条数
            $wsh_list = ($mod->where($where)->order('addtime desc,status asc')->limit(0 . ',' . 15)->select());
            foreach ($wsh_list as &$vo) {
                $modell = D('Comm');
                $num = $modell->where("mid={$vo['id']} and pid='0'")->count('mid');
                //回复数量
                $vo['plnum'] = $num;
                //状态
                if ($vo['status'] == 3) {
                    $vo['status'] = '未审核';
                } else {
                    $vo['status'] = '未通过';
                }

                //浏览量
                $vie=$this->_getPageviews($vo['id'])+$vo['show_scan'];
                $vo['scan'] = $vie;

                //时间
                $vo['addtime'] = $this->get_time_Company($vo['addtime']);
                //查询栏目归属
                $tmp = D('Cat')->where(array('id'=>array('in',$vo['pid'])))->find();
                $vo['p_name'] = $tmp['name'];
                $vo['class_id'] = $tmp['class'];
                $vo['cover'] = $this->ftp_img_path . $vo['cover'];
                $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
            }
            //热门文章
            $this->assign('count', $count);
            $this->assign('flag', $flag);
            $this->assign('wsh_count', $wsh_count);
            $this->assign('count_page', $count>12 ? true : false);
            $this->assign('list', $list);
            $this->assign('wsh_list', $wsh_list);
            $this->display();

    }

    //我的关注
    public function myfri() {

            //查询用户的帖子数关注及粉丝数
            $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];
            import("ORG.Util.Page");
            //我的关注(主动关注)
            $sql = "select count(1) as counts from (select a.uid,a.fid,b.* from bbs_friend as a right join cms_app_user as b on a.uid = b.id where a.uid = " . $uid . ") as t";

            $res = M()->query($sql);
            $count = $res[0]['counts'];
            $page = new Page($count, 10);
            $sql = "select a.uid,a.fid from bbs_friend as a right join cms_app_user as b on a.uid = b.id where a.uid = " . $uid . " order by a.id desc limit " . $page->firstRow . "," . $page->listRows;
            $list = M()->query($sql);
            foreach ($list as &$v) {
                //查询用户信息
                $userinfo = D('Users')->get_user_info($v['fid']);
                //头像显示
                $v['picture_path'] = $userinfo['picture_path'];
                //用户名
                $v['username'] = $userinfo['username'];
                $v['sex'] = $userinfo['sex'];
                $v['introduce'] = $userinfo['introduce'] ? $userinfo['introduce'] : '这个人很懒，什么都没有留下~';
                $v['introduce'] = mb_strlen($v['introduce'] > 30) ? mb_strcut($v['introduce'], 0, 30, 'utf-8') . '...' : $v['introduce'];
                //查询发帖  关注 粉丝
                $num_data = $this->get_other_user_info_data($v['fid']);
                $v['num_data'] = $num_data;
                //被动关注
                $fan = M('Friend')->where("fid=" . $_SESSION[C('USER_AUTH_KEY')]['id'] . " and uid=" . $v['fid'])->find();
                if (!empty($fan)) {//被关注(相互关注)
                    $v['like'] = 'y';
                } else {//没有被关注（关注的）
                    $v['like'] = 'n';
                }
            }
            $this->assign('count', $count);
            $this->assign('count_check', $count>10 ? true : false);
            $this->assign('list', $list);
            //推荐的关注用户
            $tuijanid = $this->get_tuijian_id();
            $tuijian = D('Users')->get_user_info($tuijanid);
            //头像显示
            $tuijian['picture_path'] = $this->get_portrait($tuijian['photo'], $tuijian['sex']);
            //用户名
            $tuijian['username'] = $tuijian['username'];
            $tuijian['introduce'] = $tuijian['introduce'] ? $tuijian['introduce'] : '这个人很懒，什么都没有留下~';
            $tuijian['introduce'] = mb_strlen($tuijian['introduce'] > 30) ? mb_strcut($tuijian['introduce'], 0, 30, 'utf-8') . '...' : $tuijian['introduce'];
            //查询发帖  关注 粉丝
            $num_data = $this->get_other_user_info_data($tuijian['id']);
            $tuijian['num_data'] = $num_data;
            $this->assign('tuijian', $tuijian);
            $this->display();

    }

    public function myfri_html() {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];
            import("ORG.Util.Page");
            //我的关注(主动关注)
            $sql = "select count(1) as counts from (select a.uid,a.fid,b.* from bbs_friend as a right join cms_app_user as b on a.uid = b.id where a.uid = " . $uid . ") as t";
            $res = M()->query($sql);
            $count = $res[0]['counts'];
            $page = new Page($count, 10, 'p', 'Ucenter/myfri');
            $sql = "select a.uid,a.fid,b.* from bbs_friend as a right join cms_app_user as b on a.uid = b.id where a.uid = " . $uid . " order by create_time desc limit " . $page->firstRow . "," . $page->listRows;
            $list = M()->query($sql);
            $mod = M("Users");
            $html = '';
            foreach ($list as &$v) {
                //查询用户信息

                $userinfo = D('Users')->get_user_info($v['fid']);
                //头像显示
                $v['picture_path'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
                $v['sex'] = $userinfo['sex'];
                $v['username'] = $userinfo['username'];
                if ($v['sex'] == 1) {
                    $v['sex_str'] = 'ina_man';
                } else {
                    $v['sex_str'] = 'ina_women';
                }
                $v['introduce'] = $userinfo['introduce'] ? $userinfo['introduce'] : '这个人很懒，什么都没有留下~';
                $v['introduce'] = mb_strlen($v['introduce'] > 30) ? mb_strcut($v['introduce'], 0, 30, 'utf-8') . '...' : $v['introduce'];
                //查询发帖  关注 粉丝
                $num_data = $this->get_other_user_info_data($v['fid']);
                $v['num_data'] = $num_data;
                //被动关注
                $fan = M('Friend')->where("fid=" . $_SESSION[C('USER_AUTH_KEY')]['id'] . " and uid=" . $v['fid'])->find();
                if (!empty($fan)) {//被关注(相互关注)
                    $v['like'] = '互关注';
                } else {//没有被关注（关注的）
                    $v['like'] = '已关注';
                }
                $v['introduce'] = mb_strlen($v['introduce'] > 16) ? mb_substr($v['introduce'], 16) . '...' : $v['introduce'];
                $html .= '<div class="ina_grjj">';
                $html .= '<div class="ina_grjj_edit"><a href="javascript:;;" uid="' . $v['fid'] . '" types="list" class="quxiao <{if $v.like eq "y"}>ina_huguanzhu<{else}>ina_yiguanzhu<{/if}>">';
                $html .= ' <i class="ina_icon"></i><b>' . $v['like'] . '</b><em>取&nbsp;&nbsp;消</em></a></div>';
                $html .= '<div class="ina_touxiang">';
                $html .= ' <a href="' . __APP__ . '/Ucenter/uspace/uid/' . $v['fid'] . '"><img src="' . $v['picture_path'] . '"></a>';
                $html .= '<p><span>' . $v['username'] . '</span></p>';
                $html .= '<span class="ina_sex"><i class="ina_icon ' . $v['sex_str'] . '"></i></span>';
                $html .= '</div>';
                $html .= '<div class="ina_grjjbt">个人简介:</div>';
                $html .= '<div class="ina_grjjnr">' . $v['introduce'] . '</div>';
                $html .= '<ul>';
                $html .= ' <li><span>发帖数</span><p><a href="__APP__/Ucenter/uspace/uid/' . $v['fid'] . '">' . $v["num_data"][0] . '</a></p></li>';
                $html .= ' <li><span>关注</span><p><a href="__APP__/Ucenter/uspace/uid/' . $v['fid'] . '">' . $v["num_data"][1] . '</a></p></li>';
                $html .= '<li class="ina_last"><span>粉丝</span><p><a href="__APP__/Ucenter/uspace/uid/' . $v['fid'] . '">' . $v["num_data"][2] . '</a></p></li>';
                $html .= '</ul>';
                $html .= ' </div>';
                $html .= $page->show();
            }
        } else {
            $this->redirect('Users/login');
        }
    }

    //我的我的粉丝
    public function myfans() {
            $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];

            //查询用户的帖子数关注及粉丝数

            import("ORG.Util.Page");
            //我的粉丝(被动动关注)
            $sql = "select count(1) as counts from (select a.uid,a.fid,b.* from bbs_friend as a right join cms_app_user as b on a.uid = b.id where a.fid = " . $uid . ") as t";
            $res = M()->query($sql);
            $count = $res[0]['counts'];
            $page = new Page($count, 10);
            $sql = "select a.*,b.* from bbs_friend as a right join cms_app_user as b on a.uid = b.id where a.fid = " . $uid . " order by a.id desc  limit " . $page->firstRow . "," . $page->listRows;
            $list = M()->query($sql);
            foreach ($list as &$v) {
                //查询粉丝信息
                $userinfo = D('Users')->get_user_info($v['uid']);

                //头像显示
                $v['picture_path'] = $userinfo['picture_path'];
                $v['username'] = $userinfo['username'];
                $v['sex'] = $userinfo['sex'];
                $v['introduce'] = $userinfo['introduce'] ? $userinfo['introduce'] : '这个人很懒，什么都没有留下~';
                $v['introduce'] = mb_strlen($userinfo['introduce'] > 30) ? mb_strcut($userinfo['introduce'], 0, 30, 'utf-8') . '...' : $v['introduce'];
                //查询发帖  关注 粉丝
                $num_data = $this->get_other_user_info_data($v['uid']);
                $v['num_data'] = $num_data;
                //主动关注
                $fan = M('Friend')->where("fid=" . $v['uid'] . " and uid=" . $_SESSION[C('USER_AUTH_KEY')]['id'])->find();
                if (!empty($fan)) {//(相互关注)
                    $v['like'] = 'y';
                } else {//没有被关注（关注的）
                    $v['like'] = 'n';
                }
            }
            $this->assign('count', $count);
            $this->assign('count_check', $count>10 ? true : false);
            $this->assign('list', $list);
            //推荐的关注用户
            $tuijanid = $this->get_tuijian_id();
           // echo $tuijanid;
            $tuijian = D('Users')->get_user_info($tuijanid);
            //头像显示
            $tuijian['picture_path'] = $this->get_portrait($tuijian['photo'], $tuijian['sex']);
            //用户名
            $tuijian['introduce'] = $tuijian['introduce'] ? $tuijian['introduce'] : '这个人很懒，什么都没有留下~';

            $tuijian['introduce'] = mb_strlen($tuijian['introduce'] > 30) ? mb_strcut($tuijian['introduce'], 0, 30, 'utf-8') . '...' : $tuijian['introduce'];
            //查询发帖  关注 粉丝
            $num_data = $this->get_other_user_info_data($tuijian['id']);
            $tuijian['num_data'] = $num_data;
            $this->assign('tuijian', $tuijian);
            $this->display();

    }

    //添加关注
    public function add_attention() {

        demo(111);
        $tmp_array_res = array();

        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            if ($_POST) {
                $id = intval($_POST['id']);
                if ($id) {
                    if ($id == $_SESSION[C('USER_AUTH_KEY')]['id']) {
                        echo 3;
                    } else {
                        $mod = M("Friend");
                        //检查该好友是不是属于你
                        $test = $mod->where('uid=' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and fid=' . $id)->find();
                        if (!$test) {
                            /* 更新消息 */
                            $tmp = array();
                            $tmp['userid'] = $id;
                            $tmp['act_userid'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
                            $tmp['message_id'] = 0;
                            $tmp['message_type'] = '互动消息';

                            $userinfo = D('Users')->get_user_info($_SESSION[C('USER_AUTH_KEY')]['id']);

                            $user_name = $userinfo['username'];
                            $tmp['message'] = "关注了你，多发几篇文章吸引更多粉丝吧~";
                            $tmp['status'] = 0;
                            $tmp['create_time'] = time();
                            M('NewsManagement', 'bbs_', 'DB_CONFIG2')->add($tmp);
                            $tmp['message_type'] = '系统消息';
                            $tmp_array = array();
                            $tmp_array['uid'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
                            $tmp_array['fid'] = $id;
                            $mod = M("Friend", 'bbs_', 'DB_CONFIG2');
                            $res = $mod->add($tmp_array);
                            //查询当前好友状态
                            $ustatus = $mod->where('uid=' . $id . ' and fid = ' . $_SESSION[C('USER_AUTH_KEY')]['id'])->find();

                            //查询新添加的人的信息
                            $ustatus_info = D('Users')->get_user_info($id);
                            $ustatus_info['picture_path'] = $this->get_portrait($ustatus_info['phone'], $ustatus_info['sex']);
                            $ustatus_info['sex'] = $ustatus_info['sex'] == 1 ? 'ina_man' : 'ina_women';
                            $ustatus_info['introduce'] = $ustatus_info['introduce'] ? $ustatus_info['introduce'] : '这个人很懒，什么都没有留下~';
                            $ustatus_info['introduce'] = mb_strlen($ustatus_info['introduce'] > 30) ? mb_strcut($ustatus_info['introduce'], 0, 30, 'utf-8') . '...' : $ustatus_info['introduce'];

                            //获取 发帖，关注，粉丝
                            $num = $this->get_other_user_info_data($ustatus_info['id']);

                            //添加的人物html
                            if ($ustatus) {
                                $ustatus_r = 1; //互粉状态
                                $jiafen = 'ina_huguanzhu';
                            } else {
                                $ustatus_r = 2; //已关注状态
                                $jiafen = 'ina_yiguanzhu';
                            }
                            $html = '<div class="ina_grjj"><div class="ina_grjj_edit"><a href="javascript:;;" uid="' . $ustatus_info['id'] . '" types="list" class="quxiao ' . $jiafen . '"><i class="ina_icon"></i>已关注</a></div><div class="ina_touxiang"><a href="' . __APP__ . '/Ucenter/uspace/uid/' . $ustatus_info['id'] . '"><img src="' . $ustatus_info['picture_path'] . '"></a><p><span>' . $ustatus_info['username'] . '</span></p><span class="ina_sex"><i class="ina_icon ' . $ustatus_info['sex'] . '"></i></span></div><div class="ina_grjjbt">个人简介:</div><div class="ina_grjjnr">' . $ustatus_info['introduce'] . '</div><ul><li><span>发帖数</span><p><a href="' . __APP__ . '/Ucenter/uspace/uid/' . $ustatus_info['id'] . '">' . $num[0] . '</a></p></li><li><span>关注</span><p><a href="' . __APP__ . '/Ucenter/uspace/uid/' . $ustatus_info['id'] . '">' . $num[1] . '</a></p></li><li class="ina_last"><span>粉丝</span><p><a href="' . __APP__ . '/Ucenter/uspace/uid/' . $ustatus_info['id'] . '">' . $num[2] . '</a></p></li></ul></div>';
                            $tmp_array_res['html'] = $html;
                            if ($res) {
                                $tmp_array_res['res'] = 1;
                                $tmp_array_res['status'] = $ustatus_r;
                            } else {
                                $tmp_array_res['res'] = 1;
                                $tmp_array_res['status'] = $ustatus_r;
                            }

                            echo json_encode($tmp_array_res);
                            exit;
                        }
                    }
                }
            }
        } else {
            $tmp_array_res['res'] = 4;
            echo json_encode($tmp_array_res);
            exit;
        }
    }

    //取消关注
    public function cancel_attention() {

        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            if ($_POST) {
                $id = intval($_POST['id']);
                if ($id) {
                    $mod = M("Friend");
                    //检查该好友是不是属于你
                    $test = $mod->where('uid=' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and fid=' . $id)->find();
                    if ($test) {
                        $mod = M("Friend", 'bbs_', 'DB_CONFIG2');
                        $res = $mod->where("uid=" . $_SESSION[C('USER_AUTH_KEY')]['id'] . " and fid=" . $id)->delete();
                        if ($res != false) {
                            //删除成功
                            echo 1;
                        } else {
                            //删除失败
                            echo 2;
                        }
                    }
                }
            }
        } else {
            $this->redirect('Users/login');
        }
    }

    //获取随机用户
    public function get_random_user() {
        $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];
        $frends = M('friend')->where("uid=".$uid)->field('fid')->select();

        $sql = "SELECT count(*) as num, mid,b.uid FROM bbs_view_record as a JOIN bbs_message as b ON a.mid=b.id WHERE b.uid<>$uid GROUP BY mid ORDER BY num DESC LIMIT 50";
        $recommend = M()->query($sql);

        foreach ($recommend as $val){
            $newRecommend[$val['uid']] = $val['uid'];
        }
        $id  = array_rand($newRecommend,1);
        while (in_array($id,$frends)){
            $id  = array_rand($newRecommend,1);
        }

        $info = D('Users')->get_user_info($id);
        //头像显示
        $info['picture_path'] = $this->get_portrait($info['photo'], $info['sex']);
        //用户名
        $info['introduce'] = $info['introduce'] ? $info['introduce'] : '这个人很懒，什么都没有留下~';
        $info['introduce'] = mb_strlen($info['introduce'] > 30) ? mb_strcut($info['introduce'], 0, 30, 'utf-8') . '...' : $info['introduce'];
        $info['sex'] = $info['sex'] == 1 ? 'ina_man' : 'ina_women';

        //获取 发帖，关注，粉丝
        $num = $this->get_other_user_info_data($info['id']);
        $info['num_mess'] = $num[0];
        $info['num_g'] = $num[1];
        $info['num_f'] = $num[2];
        $url = __APP__;
        echo <<<Eof

                    <div class="ina_grjj">
                        <div class="ina_grjj_edit"><a href="javascript:;;" uid="{$info['id']}" class="tianjiagz ina_jia"><i class="ina_icon"></i>加关注</a></div>
                        <div class="ina_touxiang">
                            <a href="{$url}/Ucenter/uspace/uid/{$info['id']}"><img src="{$info['picture_path']}"></a>
                            <p><span>{$info['username']}</span></p>
                            <span class="ina_sex"><i class="ina_icon {$info['sex']}"></i></span>
                        </div>
                        <div class="ina_grjjbt">个人简介:</div>
                        <div class="ina_grjjnr">{$info['introduce']}</div>
                        <ul>
                            <li><span>发帖数</span><p><a href="{$url}/Ucenter/uspace/uid/{$info['id']}">{$num[0]}</a></p></li>
                            <li><span>关注</span><p><a href="{$url}/Ucenter/uspace/uid/{$info['id']}">{$num[1]}</a></p></li>
                            <li class="ina_last"><span>粉丝</span><p><a href="{$url}/Ucenter/uspace/uid/{$info['id']}">{$num[2]}</a></p></li>
                        </ul>
                    </div>
               
Eof;
    }

    //查看作者帖子
    public function uspace() {
        $uid = intval($_GET['uid']);

        if ($uid) {
            $userinfo = $this->get_user_info($uid);
            $this->assign('user', $userinfo);
            $this->assign('editor',false);
            //导入分页类
            import("ORG.Util.Page");
            $count = M('message')->where('uid = ' . $uid . ' and status = 1')->count();
//            $page = new Page($count, 15);
            $message = M('message')->where('uid = ' . $uid . ' and status = 1')->order('addtime desc')->limit(0, 15)->select();
            $cat = M('Cat');
            $where = array();
            if ($message) {
                foreach ($message as &$v) {
                    $v['addtime'] = $this->get_time_Company($v['addtime']);
                    //查询cat
                    $where['id'] = array('in',$v['pid']);
                    $catinfo = $cat->where($where)->find();
                    $v['pid_name'] = $catinfo['name'];
                    $v['pid_class'] = $catinfo['class'];
                    $v['cover'] = $this->ftp_img_path . $v['cover'];
                    $v['cover2'] = $this->ftp_img_path . $v['cover2'];
                    //查询评论
                    $p = M('Comm')->where('mid=' . $v['id'])->count();
                    $v['pl_num'] = $p;
                    //浏览量
                    $vie=$this->_getPageviews($v['id'])+$v['show_scan'];
                    $v['scan'] = $vie;
                }
            }

            $this->assign('count', $count > 15 ? true : false);
            $this->assign('list', $message);

            //查询作者信息
            $_M_user = D('Users');
            $name = $_M_user->get_user_info($uid);

            //查询是否关注
            $friend = M('Friend');
            $f_info = $friend->where('uid = ' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and fid=' . $name['id'])->find();
            if ($f_info) {
                $f_info2 = $friend->where('uid = ' . $name['id'] . ' and fid=' . $_SESSION[C('USER_AUTH_KEY')]['id'])->find();
                if ($f_info2) {
                    $follow = '2'; //互粉
                } else {
                    $follow = '1'; //关注
                }
            }else{
                $follow = '3';  //加关注
            }

            $this->assign('follow', $follow);
            $this->display();
        }
    }

    //编辑用户信息
    public function euserinfo() {
            $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];
            //查询基本信息

            $userinfo = D('Users')->get_user_info($uid);
            $userinfo['picture_path'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
            //////////////////////////////////////////
            //查询全部的省份
            $pmodel = M('InaProvince');
            $province = $pmodel->field('provinceID,provinceNameC')->order('provinceOrder asc')->select();
            $this->assign('province', $province);
            //查询城市
            $cmodel = M('InaCity');
            $city = $cmodel->where('provinceID=' . $userinfo['province_id'])->field('cityID,cityNameC')->select();

            $this->assign('city', $city);
            //查询兴趣
            $interest = array();
            if ($userinfo['interest']) {
                $interest = explode('-', $userinfo['interest']);
            }
            $userinfo['interest'] = $interest;

            //查询星座
            if($userinfo['constellation']){
                $userinfo['xingzuo'] = $this->get_constellation_value($userinfo['constellation']);
            }

            $userinfo['city']=$userinfo['city_id'];
            $userinfo['province']=$userinfo['province_id'];


            $this->keyword();   //获取并渲染栏目
            $this->assign('ftp_img_path', $this->ftp_img_path); //http://img.news18a.com/community/
            $this->assign('userinfo', $userinfo);
            $this->assign('session_id', $uid);
            $this->assign('xingzuo', $this->xingzuo());
            $this->display();

    }

    //更新用户信息
    public function update_userinfo() {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            if ($_POST) {
                $tmp_array = array();
                $userinfo_sss = D('Users')->get_user_info($_SESSION[C('USER_AUTH_KEY')]['id']);
                //print_r($userinfo_sss);die;
                $tmp_array['id'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
                //头像
                if($_POST['showpicval']){
                    $tmp_array['photo'] = 'http://img.news18a.com/community/'.addslashes(trim($_POST['showpicval']));
                }
                //性别
                if (intval($_POST['sex'])==1) {
                $tmp_array['gender'] = '男';

                }elseif (intval($_POST['sex'])==2) {
                   $tmp_array['gender'] = '女';
                }else{
                    $tmp_array['gender'] = '-';
                }
                //昵称
                //只能修改一次
                $userinfo_s = D('Users')->get_user_info($_SESSION[C('USER_AUTH_KEY')]['id']);
                if (empty($userinfo_s['name'])) {
                    //查询昵称
                    $userinfo = D('Users')->get_user_by_where("id != " . $_SESSION[C('USER_AUTH_KEY')]['id'] . " and `name`='" . addslashes(trim($_POST['nickname'])) . "'");
                    if ($userinfo) {
                        echo 2;
                        die;
                    }
                    //敏感词库
                    $minganci_array = explode('|', $this->name_minganci);
                    foreach ($minganci_array as $mv) {
                        $tmp_array['name'] = str_replace($mv, "*", addslashes(trim($_POST['nickname'])));
                    }
                }

                //星座
                $xingzuo = intval($_POST['xingzuo']);

                //地区和兴趣
//                $ina_date = strtotime($_POST['ina_date']);
                $province = intval($_POST['province']);
                $city = intval($_POST['city']);
                $inter = substr(trim($_POST['inter']), 0, -1);
//                if (!$ina_date || $ina_date < 0) {
//                    echo 1;
//                    die;
//                }

                if (!$xingzuo ) {
                    echo 1;
                    die;
                }

                if (!$province || !$city) {
                    echo 1;
                    die;
                }
                if ($inter == '') {
                    echo 1;
                    die;
                }

                $tmp_array['city_id'] = $city;
                $tmp_array['province_id'] = $province;

                //简介
                $tmp_array['introduce'] = addslashes(trim($_POST['ina_textarea']));

                //获取星座名称
                $constellation = $this->get_constellation_value($xingzuo, true);
                $tmp_ttt_array = unserialize($userinfo_sss['extend_info']);
                $tmp_ttt_array['introduce'] = addslashes(trim($_POST['ina_textarea']));
                $tmp_ttt_array['birthday'] = '';  //暂时取消生日字段，未防后期再用,先保留
                $tmp_ttt_array['interest'] = $inter;
                $tmp_ttt_array['constellation'] = $constellation;
                $tmp_array['extend_info'] = serialize($tmp_ttt_array);
                $res = D('Users')->update_user_info($tmp_array);

                if ($tmp_array['name']) {
                    $_SESSION[C('USER_AUTH_KEY')]['name'] = $tmp_array['name'];
                }
                unlink($this->upload_dir . $tmp_array['picture']);
//                echo $umodel->getLastSql();
//                die;
               // var_dump($res);die;
                if ($res !== false) {
                    echo 1;
                }
            }
        } else {
            $this->redirect('Users/login');
        }
    }

    //获取推荐的id
    public function get_tuijian_id() {
        $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];
        if ($uid) {
            $sql = "select fid from bbs_friend where uid = " . $uid;
            $list = M()->query($sql);
            $where = '';
            if ($list) {
                $tmp_array = array();
                foreach ($list as $v) {
                    $tmp_array[] = $v['fid'];
                }
                $fid = implode(', ', $tmp_array);
                $where = "uid not in($fid) AND ";
            }

            $info = M('message')->where($where."status=1 AND uid<>$uid")->field('uid')->order('show_scan DESC')->find();
            return $info['uid'];
        } else {
            $this->redirect('Users/login');
        }
    }


    /**
     *检查用户登录状态
     */
    public function check_user()
    {
        if(ACTION_NAME == 'uspace'){
            return true;
        }elseif ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            //登录用户的id
            $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];
            $userInfo = $this->get_user_info($uid);

            //用户信息
            $this->assign('user', $userInfo);
            $this->assign('editor',true);
        } else {
            $this->redirect('Users/login');
        }
    }


    /**
     * 获取用户的详细信息
     *
     * @param int $uid 用户id
     * @return mixed
     */
    public function get_user_info($uid){
        //查询用户信息
        $res = D('Users')->get_user_info($uid);
        if (empty($res['name'])) {
//            $this->redirect('Ucenter/euserinfo');
            return '请补充完整个人信息';
        }

        //查询并赋值用户粉丝、发帖、关注数
        $this->get_user_info_data($uid);

        //头像显示
        $res['picture_path'] = $this->get_portrait($res['photo'], $res['sex']);
        $res['introduce'] = $res['introduce'] ? $res['introduce'] : '这个人很懒，什么都没有留下~';
        $res['introduce'] = mb_strlen($res['introduce'] > 30) ? mb_strcut($res['introduce'], 0, 30, 'utf-8') . '...' : $res['introduce'];

        $birthday = '';
        if ($res['birthday']) {
            $birthday = date('Y-m-d', $res['birthday']);
        }
        $res['birthday'] = $birthday;

        //查询城市
        $pmodel = M('InaProvince');
        $cmodel = M('InaCity');
        $p_info = $pmodel->where('provinceID=' . $res['province_id'])->field('provinceNameC')->find();
        $c_info = $cmodel->where('cityID=' . $res['city_id'])->field('cityNameC')->find();
        $res['province'] = $p_info['provinceNameC'];
        $res['city'] = $c_info['cityNameC'];
        //查询兴趣
        $int_array = explode('-', $res['interest']);
        $int_list = array();
        if ($int_array) {
            $int_id = implode(',', $int_array);
            $int_list = M('Cat')->where('id in(' . $int_id . ')')->field('name')->select();
        }
        $res['interest'] = $int_list;

        //默认的生日和星座
        $res['constellation'] = $res['constellation'] ? $res['constellation'] : '射手座';

        return $res;
    }


}
