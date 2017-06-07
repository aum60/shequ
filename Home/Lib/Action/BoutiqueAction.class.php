<?php

class BoutiqueAction extends CommentAction {

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


    //精华展示
    public function index() {
        //创建分页对象
        $order = $_GET['order'];
        $orderby = 'addtime desc';

        //导入分页类
        import("ORG.Util.Page");
        if ($order == 'click') {//点击最多

            $sql="select count(*) as counts from bbs_message where 1 and isbest=1 and status=1";
            $c_query = M()->query($sql);
            $count = $c_query[0]['counts'];
            //创建分页对象
            $page = new Page($count, 20);
            //$sql = $sql = "select a.*,ifnull(t.c,0) as tc from bbs_message as a left JOIN (select mid,count(1) as c from bbs_view_record group by mid) as t on a.id = t.mid where 1 and a.isbest=1 order by tc desc limit " . $page->firstRow . "," . $page->listRows . ";";
            $sql="select * from bbs_message where 1 and isbest=1 and status=1 order by show_scan desc limit " . $page->firstRow . "," . $page->listRows . ";";
            // echo $sql;die;
            $list = M()->query($sql);
        } elseif ($order == 'comment') {//评论最多
            $sql = "select count(*) as counts from (select a.*,ifnull(t.c,0) as tc from bbs_message as a left JOIN (select mid,count(1) as c from bbs_comm group by mid) as t on a.id = t.mid where 1 and a.isbest=1 and a.status=1) as tt";
            $c_query = M()->query($sql);
            $count = $c_query[0]['counts'];
            //创建分页对象
            $page = new Page($count, 20);
            $sql = $sql = "select a.*,ifnull(t.c,0) as tc from bbs_message as a left JOIN (select mid,count(1) as c from bbs_comm group by mid) as t on a.id = t.mid where 1 and a.isbest=1 and a.status=1 order by tc desc limit " . $page->firstRow . "," . $page->listRows . ";";
            $list = M()->query($sql);
        } else {//最新发布
            $count = M('Message')->where('isbest=1 and status=1')->count();

            //创建分页对象
            $page = new Page($count, 20);
            //最新贴
            $list = M('Message')->where('isbest=1 and status=1')->limit($page->firstRow . "," . $page->listRows)->order($orderby)->select();
        }
        if ($list) {
            foreach ($list as &$vo) {
                //计算时间差
                $vo['addtime'] = $this->get_time_Company($vo['addtime']);

                //头像显示
                //$userinfo = M('Users')->where('id=' . $vo['uid'])->find();
                $userinfo=D('Users')->get_user_info($vo['uid']);
                $vo['picture_path'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
                $vo['username'] = $userinfo['name'] ? $userinfo['name'] : $userinfo['username'];
                $vo['cover'] = $this->ftp_img_path . $vo['cover'];
                $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];

                //截取文章描述
                $description = String::msubstr(trim(strip_tags($vo['content'])), 0, 50);
                $vo['description'] = $description === '...' ? $vo['title'] : $description;

                //查询栏目信息
                $class_info = M('Cat')->where('id=' . $vo['pid'])->find();
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
        }
        if($order == 'click'){
            $list = $this->multi_array_sort($list,'scan');
        }
        $this->assign('count', $count);
        $this->assign('pageinfo', $page->show());
        $this->assign('order', $order);
        $this->assign('list', $list);
        //精华推荐

        $this->display();
    }


    //栏目页面
    public function column() {

        $mod = M("Message");
        $pid = intval($_GET['pid']);
        $is_best = trim($_GET['best']);
        $this->assign('pid', $pid);
        $lanmu_info = M('Cat')->where('id=' . $pid)->find();
        //显示栏目信息

        if($is_best){
            $list = M('Message')->where('pid like "%,' . $pid . ',%" and isbest=1 and status=1')->limit(0 . "," . $this->listRows)->order('addtime desc')->select();
        }else{
            $list = M('Message')->where('pid like "%,' . $pid . ',%" and status=1')->limit(0 . "," . $this->listRows)->order('addtime desc')->select();
        }
        $flag = count($list) < 20 ? true : false;

        foreach ($list as &$vo) {
            //计算时间差
            $vo['addtime'] = $this->get_time_Company($vo['addtime']);

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
            $class_info = M('Cat')->where('id=' . $vo['pid'])->find();
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
