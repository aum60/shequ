<?php

class ActivityAction extends CommentAction {

    public function __construct() {
        parent::__construct();

        //检查url标识
        $this->check_url();

        //导航
        $this->keyword();
        $this->assign('action_name', ACTION_NAME);
        $this->assign('module_name', MODULE_NAME);
        $this->listRows = 20;   //默认显示20条内容

        //查询用户信息
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            $_M_user = D('Users');
            $userinfo = $_M_user->get_user_info($_SESSION[C('USER_AUTH_KEY')]['id']);

            //为了过滤开始的头像裁剪
            if (empty($userinfo['name']) && $_GET['_URL_'][1] != 'cut_pic_size') {
                $this->redirect('Ucenter/euserinfo');
            }
        }

        //引入字符串处理类
        import("ORG.Util.String");
    }



    //活动页面
    public function index() {

        $mod = M("Activity");
        $pid = intval($_GET['pid']);
        $is_best = trim($_GET['best']);
        $this->assign('pid', $pid);
        $lanmu_info = M('Cat')->where('id=' . $pid)->find();
        //显示栏目信息

        if($is_best){
            $list =$mod->where( 'status=1 and is_best=1')->limit(0 . "," . $this->listRows)->order('add_time desc')->select();
        }else{
            $list =$mod->where('status != 4')->limit(0 . "," . $this->listRows)->order('add_time desc')->select();
        }
        $flag = count($list) < 20 ? true : false;

        foreach ($list as &$vo) {
            //计算时间差
            $vo['addtime'] = $this->get_time_Company($vo['add_time']);

            //头像显示
            //查询用户
            //$userinfo = M('Users')->where('id=' . $vo['uid'])->find();
            $_M_user = D('Users');
            $userinfo = $_M_user->get_user_info($vo['uid']);
            $vo['picture_path'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
            $vo['username'] = $userinfo['name'] ? $userinfo['name'] : $userinfo['username'];
            $vo['cover'] = $this->ftp_img_path . $vo['cover'];
            $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];

            //截取文章描述
            $description = String::msubstr(trim(strip_tags($vo['content'])), 0, 50);
            $vo['description'] = $description === '...' ? $vo['title'] : $description;

            //查询栏目信息
            $class_info = M('Cat')->where('id=' . $vo['cat_id'])->find();
            $class_name = array();
            $orther = array('class_name'=>'其他','class_num'=>2);

            if ($vo['pid']) {
                $pid_str = substr($vo['pid'], 1, -1);
                $pid_str_array = explode(',', $pid_str);
                if ($pid_str_array) {
                    foreach ($pid_str_array as $kkk => $vvv) {
                        //查询栏目信息
                        $class_info = M('Cat')->where('id=' . $vvv)->find();
                        $class_name[$kkk]['class_name'] = $class_info['name'];
                        $class_name[$kkk]['class_num'] = $class_info['class'];
                    }
                }
            }
            $vo['class_name'] = $class_name ? $class_name : array($orther);
            //$vo['class_num'] = $class_info['class'];
            //查询评论
            $p = M('Comm')->where('mid=' . $vo['id'])->count();
            $c = M('Reply')->where('mid=' . $vo['id'])->count();
            $vo['pl_num'] = $p + $c;
            $z = M('MessageGive')->where('mid=' . $vo['id'])->count();
            $vo['znum'] = $z;
            //浏览量
            //$vie = M('ViewRecord')->where('mid = ' . $vo['id'])->count();
            $vie=$this->_getPageviews($vo['id'])+$vo['show_scan'];
            $vo['scan'] = $vie;
        }
        $this->assign('lanmu_info', $lanmu_info);
        $this->assign('list', $list);
        $this->assign("where", $_GET);
        $this->assign("flag", $flag);
        $this->display();
    }


    function web_error() {
        $this->display();
    }

}
