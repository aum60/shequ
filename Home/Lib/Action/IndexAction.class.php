<?php

class IndexAction extends CommentAction {

    public function __construct() {
        parent::__construct();

        //检查url标识
        $this->check_url();

        //导航
        $this->keyword();
        $this->assign('action_name', ACTION_NAME);
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

    //首页
    public function index() {

        $this->assign('show_foot', 1);
        //导入分页类
//        import("ORG.Util.Page");

        //创建分页对象
//        $page = new Page($count, 20);
        //最新贴
        $list2 = M('Message')->where('status = 1')->limit(0 . "," . $this->listRows)->order('addtime desc')->select();

        foreach ($list2 as &$vo) {
            //计算时间差
            $vo['addtime'] = $this->get_time_Company($vo['addtime']);

            //截取文章描述
            $description = String::msubstr(trim(strip_tags($vo['content'])), 0, 50);
            $vo['description'] = $description === '...' ? $vo['title'] : $description;

            //头像显示
            $_M_user = D('Users');
            $userinfo = $_M_user->get_user_info($vo['uid']);
            $vo['picture_path'] = $userinfo['picture_path'];
            $vo['username'] = $userinfo['username'];
            $vo['cover'] = $this->ftp_img_path . $vo['cover'];
//            $vo['cover2'] = $this->ftp_img_path . $vo['cover2'] list($date, $pic_name) = explode($vo['cover2']);
            list($date, $pic_name) = explode('/',$vo['cover2']);
            $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
            $vo['cover3'] = '/pic/'.$pic_name;
            $vo['cover4'] = '/pic_3/'.$pic_name;
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

            //查询评论
            $p = M('Comm')->where('mid=' . $vo['id'])->count();
            $vo['pl_num'] = $p;
            $z = M('MessageGive')->where('mid=' . $vo['id'])->count();
            $vo['znum'] = $z;
            //浏览量
            $vie=$this->_getPageviews($vo['id'])+$vo['show_scan'];
            $vo['scan'] = $vie;
        }

        $this->assign('list2', $list2);
//        $this->assign("pageinfo", $page->show());   //翻页样式,先保留以防后期再改回
        $this->assign("where", $_GET);
        //===============================================  
        //调取首页轮播图
        $row_list = M('PictureManagement')->where('status=2')->order('addtime desc')->limit(3)->select();
        if ($row_list) {
            foreach ($row_list as &$v) {
                $v['cover'] = $this->ftp_img_path . $v['picture'];
                $v['cover2'] = $this->ftp_img_path . $v['picture'];
            }
        }
        $this->assign('row_list', $row_list);
        $this->display("index");
    }

    //二级页面
    public function column() {

        $mod = M("Message");
        $pid = intval($_GET['pid']);
        $this->assign('pid', $pid);
        $lanmu_info = M('Cat')->where('id=' . $pid)->find();
        //显示栏目信息

        $list = M('Message')->where('pid like "%,' . $pid . ',%" and status=1')->limit(0 . "," . $this->listRows)->order('addtime desc')->select();
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
//            echo M('Cat')->getLastSql();die;
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

    //热门排行
    public function hot() {
        $mod = M("Message");
        //获取七天前的时间戳
        $seven_day = strtotime('-7 day');
        $seven_day_stamp = strtotime(date('Y-m-d', $seven_day) . ' 00:00:00');
        $seven_day_stamp_where = " and a.addtime >= " . $seven_day_stamp . ' and status=1';
        $time = $_GET['time'];
        if ($time == 'month') {
            $seven_day = strtotime('-1 month');
            $seven_day_stamp = strtotime(date('Y-m-d', $seven_day) . ' 00:00:00');
            $seven_day_stamp_where = " and a.addtime >= " . $seven_day_stamp . ' and status=1';
        }
        if ($time == 'all') {
            $seven_day_stamp_where = "";
        }
        $this->assign('time', $time);
        //$sql = "select a.*,ifnull(t.c,0) as tc from bbs_message as a left JOIN (select mid,count(1) as c from bbs_view_record group by mid) as t on a.id = t.mid where 1 " . $seven_day_stamp_where . " order by tc desc limit 10;";
       $sql="select * from bbs_message as a where 1 " . $seven_day_stamp_where . " order by show_scan desc limit 10;";
       //echo "$sql";die;
        $list = M()->query($sql);
       // echo"<pre>";print_r($list);die;
        foreach ($list as &$vo) {
            //计算时间差
            $vo['addtime'] = $this->get_time_Company($vo['addtime']);

            //头像显示
            //$userinfo = M('Users')->where('id=' . $vo['uid'])->find();
            $_M_user = D('Users');
            $userinfo = $_M_user->get_user_info($vo['uid']);
            $vo['picture_path'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
            $vo['username'] = $userinfo['name'] ? $userinfo['name'] : $userinfo['username'];
            $vo['cover'] = $this->ftp_img_path . $vo['cover'];
            $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
            //查询栏目信息
            $class_info = M('Cat')->where('id=' . $vo['pid'])->find();
            $vo['class_name'] = $class_info['name'];
            $vo['class_num'] = $class_info['class'];
            //查询评论
            $p = M('Comm')->where('mid=' . $vo['id'])->count();
            $c = M('Reply')->where('mid=' . $vo['id'])->count();
            $vo['pl_num'] = $p + $c;
            $z = M('MessageGive')->where('mid=' . $vo['id'])->count();
            $vo['znum'] = $z;
            //浏览量
            //$vie = M('ViewRecord')->where('mid = ' . $vo['id'])->count();
           // $vo['scan'] = $vo['tc'];
            $vo['scan']=$this->_getPageviews($vo['id'])+$vo['show_scan'];
        }
        $list = $this->multi_array_sort($list,'scan');
    
        //$sql = "select c.addtime,c.id,c.uid,c.cover,c.cover2,c.title,ifnull(ifnull(t2.counts,0) as countss from bbs_message as c LEFT JOIN (select count(1) as counts,mid from bbs_comm GROUP BY mid desc) as t2 on c.id=t2.mid where 1 " . $seven_day_stamp_where2 . " order by countss desc limit 10";
        // echo $sql;die;
        $sql = "select a.*,ifnull(t.c,0) as tc from bbs_message as a left JOIN (select mid,count(1) as c from bbs_comm group by mid) as t on a.id = t.mid where 1 " . $seven_day_stamp_where . " order by tc desc limit 10;";
        $common = $mod->query($sql);
        if ($common) {
            foreach ($common as &$v) {
                //计算时间差
                $vo['addtime'] = $this->get_time_Company($vo['addtime']);
                //头像显示
                //$userinfo = M('Users')->where('id=' . $v['uid'])->find();
                $_M_user = D('Users');
                $userinfo = $_M_user->get_user_info($v['uid']);
                $v['picture_path'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
                $v['username'] = $userinfo['name'] ? $userinfo['name'] : $userinfo['username'];
                $v['cover'] = $this->ftp_img_path . $v['cover'];
                $v['cover2'] = $this->ftp_img_path . $v['cover2'];
                //查询栏目信息
                $class_info = M('Cat')->where('id=' . $vo['pid'])->find();
                $v['class_name'] = $class_info['name'];
                $v['class_num'] = $class_info['class'];
                $v['pl_num'] = $v['tc'] ? $v['tc'] : 0;
                $z = M('MessageGive')->where('mid=' . $vo['id'])->count();
                $v['znum'] = $z;
                //浏览量
                //$vie = M('ViewRecord')->where('mid = ' . $v['id'])->count();
                $this->_getPageviews($v['id'])+$vo['show_scan'];
                $v['scan'] = $vie;
            }
        }
        $this->assign('list', $list);
        $this->assign('common', $common);
        $this->display();
    }

    public function activity(){
        $this->display();
    }

    //发帖子
    public function add() {
        if (!$_SESSION[C('USER_AUTH_KEY')]['id']) {
//            $this->redirect("Users/login");
            echo "<script>window.location.href='/index.php/Users/login/from/add'</script>";
            die;
        }
        $session_id = session_id();
        $this->assign('session_id', $session_id);
        $time = time();
        $token = md5('unique_salt' . time());
        $this->assign('time', $time);
        $this->assign('token', $token);
        //$_SESSION['article_img'] = array(); //定义一个用于存放上传图片信息数组变量
        $this->assign('ftp_img_path', 'http://img.news18a.com/community/');
        $this->display();
    }

    //发帖/保存
    public function add_posts() {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            //检查用户是否被禁言
           // $userinfo = M('Users')->where('id=' . $_SESSION[C('USER_AUTH_KEY')]['id'])->find();
            $_M_user = D('Users');
            $userinfo = $_M_user->get_user_info($_SESSION[C('USER_AUTH_KEY')]['id']);
            if ($userinfo['is_gag']) {//被禁言
                echo 100;
                die;
            }
            if (empty($userinfo['name'])) {
                echo 101;
                die;
            }
            //标题
            $a = array("'", "\"", "\\", "'");
            $b = array("", "", "", "‘",);
            $ina_gxbt = str_replace($a, $b, addslashes(trim($_POST['ina_gxbt'])));
            //栏目id
            //$column = intval($_POST['column']);
            //精彩头图
            $showpicval = addslashes(trim($_POST['showpicval']));
            //上传封面
            $showpicval_1 = addslashes(trim($_POST['showpicval_1']));

            //是否开启水印
            $water = trim($_POST['water']);
            //接收内容并编辑图片
            $c_content = trim($_POST['c_content']);
//            $tt1='/(<img.*?src=(\S+)[^>]*>)/is';
//            $c_content=preg_replace($tt1,"<a href=$2 target='_blank'>$1</a>",$content);

            //类别
            $type = intval($_POST['types']);

            //文章id
            $id = intval($_POST['id']);

            $tmp = array();
            //获取发帖配置0无需审核1为发帖后审核
            $m_config = $this->get_message_config();

            if ($type) {
                if ($type == 1) {//草稿
                    $tmp['status'] = 2;
                } elseif ($type == 2) {//发帖
                    $tmp['status'] = 3;
                    //校验pid
//                    if (!$column) {
//                        echo 2;
//                        die;
//                    }
                    //if ($showpicval == '' || $showpicval_1 == '') {
                    if ($showpicval_1 == '') {
                        echo 2;
                        die;
                    }
                    if ($c_content == '') {
                        echo 2;
                        die;
                    }
                    //开启审核
                    if ($m_config == 1) {
                        $tmp['status'] = 3; //待审核状态
                    } else {
                        $tmp['status'] = 1; //已审核状态
                    }
                } else {
                    die;
                }
            } else {
                die;
            }


            //标题
            $tmp['title'] = $ina_gxbt;
            $tmp['uid'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
            //栏目
            //$tmp['pid'] = ',' . $column . ',';
            $tmp['cover'] = $showpicval;
            $tmp['cover2'] = $showpicval_1;
            //水印
            $tmp['is_water'] = $water;
            //内容
            $tmp['content'] = $this->filterEmoji($c_content);
            //$tmp['status'] = $c_content;
            //时间
            $tmp['addtime'] = (strtotime('-1 second'));
            //敏感词库
            $minganci_array = explode('|', $this->minganci);
            foreach ($minganci_array as $mv) {
                $tmp['title'] = str_replace($mv, "*", $tmp['title']);
                $tmp['content'] = str_replace($mv, "*", $tmp['content']);
            }
            //执行添加
            $mod = M('Message', 'bbs_', 'DB_CONFIG2');
            if($id){
                //id
                $tmp['id'] = $id;

                if ($type == 1) {   //从草稿中保存

                    //查询保存帖子的状态
                    $t_info = M('Message')->where('id=' . $id)->find();
                    if (in_array($t_info['status'], array(2, 5))) {
                        $result = $mod->save($tmp);
                    }
                } elseif($type == 2) {  //从草稿中发布
                    $result = $mod->save($tmp);
                }

            }else{
                $result = $mod->add($tmp);
            }

            if ($result !== false) {
                echo 1;
            } else {
                //echo "<script>alert('添加失败');window.location.history(-1);</script>";
                echo 3;
            }
        }
    }

    //修改/保存
    public function update() {
        $mod = M("Message", 'bbs_', 'DB_CONFIG2');
        $_POST['id'] = intval($_POST['id']);
        $_POST['pid'] = intval($_POST['pid']);
        $_POST['types'] = intval($_POST['types']);
        $_POST['verify'] = intval($_POST['verify']);
        //验证登录
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            //检查修改权限
            $info = M('Message')->where('id=' . $_POST['id'])->find();
            if (!$info || $_SESSION[C('USER_AUTH_KEY')]['id'] != $info['uid']) {
                //无权限
                echo 4;
                die;
            }
        } else {
            echo 4;
            die;
        }
        if (!$_POST['id']) {
            echo 1;
            die;
        } else {
            $mod->id = $_POST['id'];
        }
        if ($_POST['types']) {
            if ($_POST['types'] == 1) {//草稿
                $mod->status = 2;
            } elseif ($_POST['types'] == 2) {//发帖
                $mod->status = 3; //待审核状态
            } else {
                echo 1;
                die;
            }
        } else {
            echo 1;
            die;
        }
        //校验pid
        if (!$_POST['pid']) {
            $this->redirect("Index/index");
        }
        //验证码
        if ($_POST['verify']) {
            if (session('verify') !== md5($_POST['verify'])) {
                //验证码错误
                echo 11;
                die;
            }
        } else {
            //验证码为空
            echo 1;
            die;
        }

        //内容
        $_POST['content'] = trim($_POST['content']);
        if (trim($_POST['title'])) {
            $mod->title = trim($_POST['title']);
        } else {
            echo 2;
            die;
        }
        if (trim($_POST['content'])) {
            $mod->content = $_POST['content'];
        } else {
            echo 3;
            die;
        }


        //上传文件
        if (trim($_POST['showpicval']) && file_exists(Cover_Upload_Path . trim($_POST['showpicval']))) {
            //上传封面名称
            $mod->cover = $_POST['showpicval'];
        } else {
            //未上传
            echo 5;
            die;
        }
        //帖子标题
        $mod->title = htmlspecialchars(trim($_POST['title']));
        //帖子所属分类
        $mod->pid = trim($_POST['pid'], ',');
        //添加时间
        $mod->addtime = time();
        $result = $mod->save();
        //执行添加
        if ($result = $mod->save()) {
            //清除上传图片
            echo 6;
            die;
        } else {
            echo "<script>alert('添加失败');window.location.history(-1);</script>";
        }
    }

    //修改帖子
    public function edit() {
        //登录
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            $id = intval($_GET['id']);
            if ($id) {
                $model = M('Message');
                $list = $model->where('id=' . $id . ' and status in(2,5)')->find();
                $list['cover_path'] = $this->ftp_img_path . $list['cover'];
                $list['cover2_path'] = $this->ftp_img_path . $list['cover2'];
                $this->assign('list', $list);
                $session_id = session_id();
                $this->assign('session_id', $session_id);
                $time = time();
                $token = md5('unique_salt' . time());
                $this->assign('time', $time);
                $this->assign('token', $token);
                $this->assign('ftp_img_path', $this->ftp_img_path);
                $this->display();
            }
        }
    }

    //执行删除帖子
    public function delete() {
        $mod = M("Message");
        $mod2 = M('Comm');
        $id = intval($_GET['id']);
        $res = $mod->where("id='{$id}'")->find();
        //echo $mod->getLastSql();die;
        //检索用户id
        if ($_SESSION[C('USER_AUTH_KEY')]['id'] != $res['uid']) {
            $this->error('没有权限！');
            die;
        }
        //检测帖子内容是否含有图片地址,有则截取图路径
        preg_match_all('/\/Public\/Uploads\/editor\/\d+\/[\w.]+/i', $res['content'], $arr);
        $res2 = $mod2->where("mid='{$res['id']}'")->select();
        //检测评论内容是否含有图片地址,有则截取图路径
        foreach ($res2 as $vo) {
            preg_match_all('/\/Public\/Uploads\/editor\/\d+\/[\w.]+/i', $vo['content'], $aa);
            if (!empty($aa[0])) {
                foreach ($aa[0] as $ss) {
                    $arr2[] = $ss;
                }
            }
        }
        foreach ($res2 as $vo) {
            $where[] = $vo['id'];
        }
        if (M('Message', 'bbs_', 'DB_CONFIG2')->delete($_GET['id'])) {
            if (!empty($arr[0])) {
                foreach ($arr[0] as $vo) {
                    unlink('.' . $vo);
                }
            }
            if (!empty($arr2)) {
                foreach ($arr2 as $vo) {
                    unlink('.' . $vo);
                }
            }
            //删除该帖子被收藏中的数据
            M('Like', 'bbs_', 'DB_CONFIG2')->where("mid='{$_GET['id']}'")->delete();
            $this->success("删除成功", $_SERVER['HTTP_REFERER']);
        } else {
            $this->error("删除失败");
        }
    }

    //执行评论或回复的删除方法
    public function delcomm() {
        $mod = M('Comm');
        $res = $mod->where("id='{$_GET['cid']}'")->find();

        //检测评论内容是否含有图片地址,有则截取图路径
        preg_match_all('/\/Public\/Uploads\/editor\/\d+\/[\w.]+/i', $res['content'], $arr);
        if (M('Comm', 'bbs_', 'DB_CONFIG2')->delete($_GET['cid'])) {
            if (!empty($arr[0])) {
                foreach ($arr[0] as $vo) {
                    //执行图片删除
                    unlink('.' . $vo);
                }
            }
            //判断并删除该评论的所有回复
            M('Comm', 'bbs_', 'DB_CONFIG2')->where("pid={$_GET['cid']}")->delete();
            if ($_GET['id']) {
                $this->redirect("Index/show?id={$_GET['id']}");
            } else {
                $this->redirect("Index/mynews");
            }
        } else {
            $this->error("删除失败");
        }
    }

    //收藏
    public function add_like() {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            $id = intval($_POST['id']);
            if ($id) {
                //查询帖子是否为可浏览状态
                $m_info = M('Message')->where('id=' . $id)->find();
                if ($m_info['status'] == 1) {
                    $lmodel = M('Like');
                    $l_info = $lmodel->where('uid = ' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and mid = ' . $id)->find();
                    if ($l_info) {
                        echo 3;
                    } else {
                        $tmp_array = array();
                        $tmp_array['uid'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
                        $tmp_array['mid'] = $id;
                        $tmp_array['create_time'] = time();
                        $lmodel = M('Like', 'bbs_', 'DB_CONFIG2');
                        $res = $lmodel->add($tmp_array);
                        if ($res) {
                            echo 1;
                        } else {
                            echo 4;
                        }
                    }
                } else {
                    echo 22;
                }
            }
        } else {
            echo 2;
        }
    }

    //取消收藏
    public function del_like() {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            $id = intval($_POST['id']);
            if ($id) {
                $lmodel = M('Like');
                $l_info = $lmodel->where('uid = ' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and mid = ' . $id)->find();
                if ($l_info) {
                    $lmodel = M('Like', 'bbs_', 'DB_CONFIG2');
                    $res = $lmodel->where('uid = ' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and mid = ' . $id)->delete();
                    if ($res !== false) {
                        echo 1;
                    } else {
                        echo 2;
                    }
                }
            }
        }
    }

    //删除帖子
    public function del_mess() {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            $id = intval($_POST['id']);
            if ($id) {
                $lmodel = M('Message');
                $l_info = $lmodel->where('uid = ' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and id = ' . $id)->find();
                if ($l_info) {
                    $lmodel = M('Message', 'bbs_', 'DB_CONFIG2');
                    $tmp_array = array();
                    $tmp_array['id'] = $id;
                    $tmp_array['status'] = 4;
                    $res = $lmodel->save($tmp_array);
                    //$res = $lmodel->where('uid = ' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and id = ' . $id)->delete();
                    if ($res !== false) {
                        echo 1;
                    } else {
                        echo 2;
                    }
                }
            }
        }
    }

    //关注操作
    public function friend() {
        $id = intval($_GET['id']);
        if (!$_SESSION[C('USER_AUTH_KEY')]['id']) {
            //没登录并且有userid 
            if ($id) {
                //提示登录
                echo 1;
            } else {
                //没登录也没有数据
                echo 2;
            }
        }
        $mod = M('Friend', 'bbs_', 'DB_CONFIG2');
        $mod->uid = $_SESSION[C('USER_AUTH_KEY')]['id'];
        $mod->fid = $_POST['fid'];
        if ($_SESSION[C('USER_AUTH_KEY')]['id'] == $_POST['fid']) {
            //自己关注自己
            echo 3;
        }
        if ($_POST['vv'] == 'y') {
            if ($result = $mod->add()) {
                //关注成功
                echo 4;
            } else {
                //关注失败
                echo 5;
            }
        } elseif ($_POST['vv'] == 'n') {
            if ($result = $mod->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} and fid={$_POST['fid']}")->delete()) {
                //取消成功
                echo 6;
            } else {
                //取消失败
                echo 7;
                //$this->error("取消关注失败");
            }
        }
    }

    //ajax评论
    public function comment() {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            //检查用户是否被禁言
            //$userinfo = M('Users')->where('id=' . $_SESSION[C('USER_AUTH_KEY')]['id'])->find();
            $_M_user = D('Users');
            $userinfo = $_M_user->get_user_info($_SESSION[C('USER_AUTH_KEY')]['id']);
            if ($userinfo['is_gag']) {//被禁言
                echo 100;
                die;
            }
            if (empty($userinfo['name'])) {
                echo 101;
                die;
            }
            $tmp = array();

            //文章id
            $id = intval($_POST['id']);
            //评论id
            $pid = intval($_POST['pid']);
            $content_message = addslashes(strip_tags(trim($_POST['content_message'])));

            //查询帖子是否为可浏览状态
            $m_info = M('Message')->where('id=' . $id)->find();
            if ($m_info['status'] == 1) {

                if ($id && $content_message) {
                    $model = M('Comm', 'bbs_', 'DB_CONFIG2');
                    $tmp_array = array();
                    $tmp_array['mid'] = $id;
                    $tmp_array['uid'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
                    $tmp_array['addtime'] = strtotime('-1 second');
                    $tmp_array['content'] = $content_message;
                    $tmp_array['id_path'] = '';
                    if ($pid) {
                        //查询评论是否存在id_path
                        $p_info = M('Comm')->where('id=' . $pid)->find();
                        if ($p_info['id_path']) {
                            $tmp_array['id_path'] = $p_info['id_path'] . ',' . $pid;
                        } else {
                            $tmp_array['id_path'] = $pid;
                        }
                    }
                    //敏感词库
                    $minganci_array = explode('|', $this->minganci);
                    foreach ($minganci_array as $mv) {
                        $tmp_array['content'] = str_replace($mv, "*", $tmp_array['content']);
                    }
                    $return = $model->add($tmp_array);
                    if ($return) {
                        //判断评论或者回复是不是本人
                        if ($m_info['uid'] != $_SESSION[C('USER_AUTH_KEY')]['id']) {
                            if ($pid) {//回复
                                //消息提醒
                                $this->add_news_management($_SESSION[C('USER_AUTH_KEY')]['id'], $id, $tmp_array['content'], 2, '回复');
                            } else {//评论
                                //消息提醒
                                $this->add_news_management($_SESSION[C('USER_AUTH_KEY')]['id'], $id, $tmp_array['content'], 1, '评论');
                            }
                        }
                        //查询用户信息
                        //$userinfo = M("Users")->where('id=' . $_SESSION[C('USER_AUTH_KEY')]['id'])->find();
                        $_M_user = D('Users');
                        $userinfo = $_M_user->get_user_info($_SESSION[C('USER_AUTH_KEY')]['id']);
                        $userinfo['picture'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
                        $userinfo['username'] = $userinfo['name'] ? $userinfo['name'] : $userinfo['username'];
                        $userinfo['addtime'] = $this->get_time_Company((strtotime('-1 second')));
                        $html = '<dl><dt><a href="' . __APP__ . '/Ucenter/uspace/uid/' . $userinfo['id'] . '"><img src="' . $userinfo['photo'] . '"></a></dt><dd><div class="ina_comment_top"><h3><a href="' . __APP__ . '/Ucenter/uspace/uid/' . $userinfo['id'] . '">' . $userinfo['username'] . '</a></h3><span class="ina_date">' . $userinfo['addtime'] . '111111</span><p><span><a href="javascript:identification(1,' . $return . ')"><i style="font-style: normal; width: 15px;">顶</i>0</a></span><span><a href="javascript:;;" class="ina_huifu_a" pid="' . $return . '" cid="0"><i class="ina_icon ina_huifu"></i></a></span></p></div><div class="ina_comment_bottom">' . $tmp_array['content'] . '</div></dd></dl>';
                        $tmp['status'] = 1;
                        $tmp['html'] = $html;
                    } else {
                        $tmp['status'] = 2;
                    }
                    echo json_encode($tmp);
                }
            } else {
                echo 22;
            }
        } else {
            $tmp['status'] == 3;
        }
    }

    //帖子详情页
    public function show() {
        $id = intval($_GET['id']);
        if ($id) {
            $mod = M("Message");
            $msg = $mod->where('id=' . $id)->find();
            if ($msg) {
                //更新消息
                if ($_GET['see']) {
                    $sql = "update bbs_news_management set status=1 where message_id=" . $id;
                    M('NewsManagement', 'bbs_', 'DB_CONFIG2')->query($sql);
                }

                if ($msg['status'] == 1) {
                    //访问记录统计
                    $array = array();
                    if ($_COOKIE['view_record']) {
                        $array = unserialize($_COOKIE['view_record']);

                        if (!in_array($id, $array)) {
                            $array[] = $id;
                            setcookie('view_record', serialize($array), strtotime(date('Y-m-d 0:0:1', time())) + (3600 * 24), '/');
                            $this->_setPageviews($id);
                            $tmp_r = array();
                            if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
                                $u_r_id = $_SESSION[C('USER_AUTH_KEY')]['id'];
                            } else {
                                $u_r_id = 0;
                            }
                            $tmp_r['userid'] = $u_r_id;
                            $tmp_r['mid'] = $id;
                            $tmp_r['create_time'] = time();
                            M('ViewRecord', 'bbs_', 'DB_CONFIG2')->add($tmp_r);
                        }
                    } else {
                        $array = array();
                        $array[] = $id;
                        setcookie('view_record', serialize($array), strtotime(date('Y-m-d 0:0:1', time())) + (3600 * 24), '/');
                        $this->_setPageviews($id);
                        $tmp_r = array();
                        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
                            $u_r_id = $_SESSION[C('USER_AUTH_KEY')]['id'];
                        } else {
                            $u_r_id = 0;
                        }
                        $tmp_r['userid'] = $u_r_id;
                        $tmp_r['mid'] = $id;
                        $tmp_r['create_time'] = time();
                        M('ViewRecord', 'bbs_', 'DB_CONFIG2')->add($tmp_r);
                    }
                    //访问记录统计结束
                    //浏览量递增
//                    $msg['scan'] += 1;
//                    M('Message', 'bbs_', 'DB_CONFIG2')->where("id={$id}")->save($msg);
                }
               // echo "<pre>";print_r($tmp_r);exit;
                //查询帖子详情
                if ($_SESSION['is_super'] == 1) {
                    $list = $mod->where('id=' . $id)->find();
                } else {
                    $where_d = $_SESSION[C('USER_AUTH_KEY')]['id'] ? $_SESSION[C('USER_AUTH_KEY')]['id'] : 0;
                    $list = $mod->where('(id=' . $id . ' and status=1) or ( id = ' . $id . ' and status=3 and uid= ' . $where_d . ')')->find();
                }
                //echo $mod->getLastSql();die;
                $list['addtime'] = date('m月d日 H:i:s', $list['addtime']);
                //头图和分享图
                $list['banner'] = $this->ftp_img_path . $list['cover2'];

                //查询文章所属栏目
                $class_name = array();
                if ($list['pid']) {
                    $pid_str = substr($list['pid'], 1, -1);
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
                $list['class_name'] = $class_name;
                //查询评论数
                $commodel = M('Comm');
                $comm_num = $commodel->where('mid= ' . $list['id'])->count();
                $check_comm = $comm_num > 10 ? true : false;
                $replymodel = M('Reply');
                $reply_num = $replymodel->where('mid= ' . $list['id'])->count();
                $list['comm_num'] = $comm_num + $reply_num;
                $this->assign('comm_count',$check_comm);

                //查询作者信息
                // $model = M('Users');
                // $name = $model->field('id,username,name,introduce,sex,picture')->where('id=' . $list['uid'])->find();
                $_M_user = D('Users');
                $name = $_M_user->get_user_info($list['uid']);
                //有昵称显示昵称没有则显示登录名称
                $list['username'] = $name['name'] ? $name['name'] : $name['username'];
                $list['picture_path'] = $this->get_portrait($name['photo'], $name['sex']);
                $list['introduce'] = $name['introduce'] ? $name['introduce'] : '这个人很懒，什么都没有留下~';
                $list['introduce'] = mb_strlen($list['introduce'] > 30) ? mb_strcut($list['introduce'], 0, 30, 'utf-8') . '...' : $list['introduce'];
                $list['sex'] = $name['sex'];
                $list['userid'] = $name['id'];
                //浏览量
               // $vie = M('ViewRecord')->where('mid = ' . $id)->count();
                $vie=$this->_getPageviews($id)+$list['show_scan'];
                $list['scan'] = $vie;
                //获取发帖数
                $this->get_user_info_data($name['id']);
                //查询是否点赞----------是否关注了作者
                $list['is_give'] = '';
                $list['follow'] = '';
                $list['is_like'] = '';
                if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
                    //查询是否点赞
                    $givemodel = M('MessageGive');
                    $give_info = $givemodel->where('mid = ' . $list['id'] . ' and uid = ' . $_SESSION[C('USER_AUTH_KEY')]['id'])->find();
                    if ($give_info) {
                        $list['is_give'] = '1';
                    }
                    //查询是否关注
                    $friend = M('Friend');
                    $f_info = $friend->where('uid = ' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and fid=' . $name['id'])->find();
                    if ($f_info) {
                        $f_info2 = $friend->where('uid = ' . $name['id'] . ' and fid=' . $_SESSION[C('USER_AUTH_KEY')]['id'])->find();
                        if ($f_info2) {
                            $list['follow'] = '2'; //互粉
                        } else {
                            $list['follow'] = '1'; //关注
                        }
                    }
                    //判断是否收藏
                    $like_info = M('Like')->where('uid=' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and mid=' . $list['id'])->find();
                    if ($like_info) {
                        $list['is_like'] = 1;
                    }
                }
                //查询搜藏状态
                $res = M('Like')->where("mid={$list['id']} and uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->select();
                //是否收藏
                $list['like'] = empty($res) ? 0 : 1;
                //分享
                /*
                 * http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey
                  ?url=  //分享url
                  &title  //分享内容
                  &summary //分享内容摘要
                  &pics  //图片
                 * 
                 *  http://v.t.sina.com.cn/share/share.php
                  ?url=  //分享url
                  &title  //分享内容
                  &content=utf-8 //内容编码
                  &pic  //图片
                  &appkey  //APP key 显示分享来源
                 * 
                 * 
                 * http://s.jiathis.com/qrcode.php?url=你的链接
                 */
//                echo $this->_server('HTTP_HOST');
//                die;
                  //echo "<pre>";print_r($list);die;
                if ($list['status'] == 1) {
                    $list['share_qq'] = 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=' . urlencode('http://' . $this->_server('HTTP_HOST')) . '/index.php/Index/show/id/' . $list['id'] . '&title=' . urlencode($list['title']) . '&pics=' . urlencode($list['banner']);

                    $list['share_weibo'] = 'http://v.t.sina.com.cn/share/share.php?url=' . urlencode('http://' . $this->_server('HTTP_HOST')) . '/index.php/Index/show/id/' . $list['id'] . '&title=' . urlencode($list['title']) . '&pic=' . urlencode($list['banner']);
                    $list['share_weixin'] = 'http://s.jiathis.com/qrcode.php?url=' . urlencode('http://' . $this->_server('HTTP_HOST')) . '/m.php/Index/show/id/' . $list['id'];
                }
                //echo $list['share_weixin'];die;
                $this->assign("list", $list);
                //查询推荐的文章（文章下面的推荐）
                $recommend = $mod->where('id != ' . $id . ' and status=1 and isbest=1 and pid like "%' . $list['pid'] . '%"')->limit(9)->select();
               //echo count($recommend);die;
                //echo $mod->getLastSql();die;
               //echo"<pre>";  print_r($recommend);die;
                $cou=count($recommend);
                if ($cou<9) {
                    $arr=$mod->where('id != ' . $id . ' and status=1')->limit(9-$cou)->order('show_scan DESC')->select();
                    if($cou){
                        $recommend=array_merge_recursive($recommend,$arr);
                    }else{
                        $recommend = $arr;
                    }
                }
                if ($recommend) {
                    foreach ($recommend as &$v) {
                        $v['cover'] = $this->ftp_img_path . $v['cover'];
                        $v['cover2'] = $this->ftp_img_path . $v['cover2'];
                    }
                }
                $this->assign("recommend", $recommend);
               // $this->assign("list", $list);
                //查询评论数据
                $comm_list = $this->get_comm_data($id);
                $comm_old_list = $this->get_comm_data($id, 'ASC');
                $this->assign('comm_list', $comm_list);
                $this->assign('comm_old_list', $comm_old_list);
                //该作者的其他文章
                $another_message = $mod->where('uid = ' . $list['uid'] . ' and status = 1 and id != ' . $id)->order('show_scan desc')->limit(3)->select();

                if ($another_message) {
                    foreach ($another_message as &$v) {
                        $v['cover'] = $this->ftp_img_path . $v['cover'];
                        $v['cover2'] = $this->ftp_img_path . $v['cover2'];
                    }
                }
                $this->assign('another_message', $another_message);
                //该栏目下其他的热门文章
                $other_hot = $mod->where('pid like "%' . $list['pid'] . '%" and status=1 and isbest = 1 and id != ' . $id)->order('show_scan desc')->limit(5)->select();
//                demo($mod->getLastSql());
                //查询当前的栏目名称
                $class_info = M('Cat')->where('id=' . $list['pid_p'])->field('name')->find();
                $this->assign('class_info', $class_info);
                if ($other_hot) {
                    foreach ($other_hot as &$v) {
                        //用户信息
                        $user_info = $_M_user->get_user_info($v['uid']);
                        if (!$user_info['photo']) {
                            $user_info['photo'] = $user_info['sex'] == 1 ? 'http://img.news18a.com/community/image/man.png' : 'http://img.news18a.com/community/image/women.png' ;
                        }
                        $v['user_info'] = $user_info;
                        $v['cover'] = $this->ftp_img_path . $v['cover'];
                        $v['cover2'] = $this->ftp_img_path . $v['cover2'];
                        //浏览量
                        $vie=$this->_getPageviews($v['id'])+$v['show_scan'];
                        $v['scan'] = $vie;
                        //评论量
                        $p = M('Comm')->where('mid=' . $v['id'])->count();
                        $v['pl_num'] = $p ? $p : 0;
                    }
                }
                $this->assign('other_hot', $other_hot);
                //即时查询用户的禁言状态
                 $_M_user = D('Users');
                $userinfo = $_M_user->get_user_info($_SESSION[C('USER_AUTH_KEY')]['id']);
                $this->assign('userinfo', $userinfo);
            }

            //查询帖子点赞数量
            $m_num = M('MessageGive')->where('mid=' . $id)->count();
            $this->assign('m_num', $m_num);
            $this->display('show');
        }
    }

    //获取评论数据
    public function get_comm_data($id, $order='desc') {
        $model = M("Comm");
        import("ORG.Util.Page");
        $count = $model->where('mid = ' . $id)->count();
        $page = new Page($count, 10);
        $comm_list = $model->where('mid = ' . $id)->limit($page->firstRow . ',' . $page->listRows)->order('addtime '. $order)->select();
        /*
          select * from (
          SELECT * FROM bbs_reply
          UNION
          SELECT * FROM bbs_comm
          ) as t
          where mid = 195
         *          */
        if ($comm_list) {
            //用户信息
           // $model_user = M('Users');
             $_M_user = D('Users');
            $comm_give_model = M('CommGive');
            foreach ($comm_list as $k => $v) {
                $tmp = array();
                if ($v['id_path']) {//存在回复
                    $id_path_array = explode(',', $v['id_path']);
                    foreach ($id_path_array as $kk => $vv) {
                        $history_info = $model->where('id=' . $vv)->order('addtime desc')->find();
                        //$name = $model_user->field('id,username,name,sex,picture')->where("id = " . $history_info['uid'])->find();
                        $name=$_M_user->get_user_info($history_info['uid']);
                        $history_info['username'] = $name['name'] ? $name['name'] : $name['username'];
                        $history_info['uid'] = $name['id'];
                        $history_info['addtime'] = $this->get_time_Company($v['addtime']);
                        $history_info['picture_path'] = $this->get_portrait($name['photo'], $name['sex']);
                        //查询赞数
                        $pz = $comm_give_model->where('commid = ' . $vv)->count();
                        // echo $comm_give_model->getLastSql();
                        $history_info['pz'] = $pz;
                        $tmp[($kk + 1)] = $history_info;
                    }
                }
                $comm_list[$k]['history'] = $tmp;
               // $name = $model_user->field('id,username,name,sex,picture')->where("id = " . $v['uid'])->find();
                $name=$_M_user->get_user_info($v['uid']);
                $comm_list[$k]['username'] = $name['name'] ? $name['name'] : $name['username'];
                $comm_list[$k]['uid'] = $name['id'];
                $comm_list[$k]['addtime'] = $this->get_time_Company($v['addtime']);
                $comm_list[$k]['picture_path'] = $this->get_portrait($name['photo'], $name['sex']);
                //查询赞数
                $pz = $comm_give_model->where('commid = ' . $v['id'])->count();
                $comm_list[$k]['pz'] = $pz;
            }
        }
        $tmp = array();
        $tmp['data'] = $comm_list;
        $tmp['page_info'] = $page->show('bbs_comment');
        return $tmp;
    }


    /**
     * 获取详情页全部评论的结果
     *
     */
    public function get_comm_data_html($order = 'desc') {
        $id = intval($_REQUEST['mid']);
        if ($id) {
            $model = M("Comm");
            import("ORG.Util.Page");
            $count = $model->where('mid = ' . $id)->count();
            $page = new Page($count, 10, 'p', 'Index/show/id/' . $id);
            $order = 'addtime desc';
            $comm_list = $model->where('mid = ' . $id)->limit($page->firstRow . ',' . $page->listRows)->order($order)->select();
            $html = '';
            $html .= '<div class="ina_comment_bt">';
            $html .= '<h3>全部评论(<span id="count_rep_comm">' . $count . '</span>)</h3>';
            $html .= '<p><a href="javascript:;;" class="ina_cur" id="new_comm">最新</a><span>|</span><a href="javascript:;;" id="old_comm">最早</a></p>';
            $html .= '</div>';
            if ($comm_list) {
                //用户信息
                //$model_user = M('Users');
                 $_M_user = D('Users');
             //$model_user = $_M_user->get_user_info($_SESSION[C('USER_AUTH_KEY')]['id']);
                $comm_give_model = M('CommGive');
                $html .= '<div class="ina_comment_nr" id="result">';
                foreach ($comm_list as $k => $v) {

                   // $name = $model_user->field('id,username,name,sex,picture')->where("id = " . $v['uid'])->find();
                    $name=$_M_user->get_user_info($v['uid']);
                    $name['username'] = $name['name'] ? $name['name'] : $name['username'];
                    //查询赞数
                    $pz = $comm_give_model->where('commid = ' . $v['id'])->count();
                    $html .= '<dl>';
                    $html .= '<dt><a href="' . __APP__ . '/Ucenter/uspace/uid/' . $name['id'] . '" target="_blank"><img src="' . $this->get_portrait($name['photo'], $name['sex']) . '"></a></dt>';
                    $html .= '<dd>';
                    $html .= '<div class="ina_comment_top">';
                    $html .= '<h3><a href="' . __APP__ . '/Ucenter/uspace/uid/' . $name['id'] . '" target="_blank">' . $name['username'] . '</a></h3>';
                    $html .= '<span class="ina_date">' . $this->get_time_Company($v['addtime']) . '</span>';
                    $html .= '<p><span><a href="javascript:identification(' . $v['id'] . ')"><i style="font-style: normal; width: 15px;">顶</i>' . $pz . '</a></span>';
                    $html .= ' <span><a href="javascript:;;" class="ina_huifu_a" pid="' . $v['id'] . '"><i class="ina_icon ina_huifu"></i></a></span></p>';
                    $html .= '</div>';
                    if ($v['id_path']) {//存在回复
                        $id_path_array = explode(',', $v['id_path']);
                        $html .= '<ul>  ';
                        foreach ($id_path_array as $kk => $vv) {
                            //查询历史
                            $rcomm_list = $model->where('id = ' . $vv)->find();
                            $history_info = $model->where('id=' . $vv)->order('addtime desc')->find();
                            $name=$_M_user->get_user_info($history_info['uid']);
                            //$name = $model_user->field('id,username,name,sex,picture')->where("id = " . $history_info['uid'])->find();
                            $name['username'] = $name['name'] ? $name['name'] : $name['username'];
                            //查询赞数
                            $pz = $comm_give_model->where('commid = ' . $vv)->count();
                            // echo $comm_give_model->getLastSql();
                            $history_info['pz'] = $pz;
                            $html .= ' <li>';
                            $html .= '<div class="ina_li_top">';
                            $html .= '<h3><a href="' . __APP__ . '/Ucenter/uspace/uid/' . $name['id'] . '" target="_blank">' . $name['username'] . '</a></h3>';
                            $html .= '<p><span><a href="javascript:identification(' . $vv . ')"><i style="font-style: normal; width: 15px;">顶</i>' . $pz . '</a></span><span><a href="javascript:;" class="ina_huifu_ra" pid="' . $vv . '"><i class="ina_icon ina_huifu"></i></a></span></p>';
                            $html .= '</div>';
                            $html .= '<div class="ina_linr">' . $rcomm_list['content'] . '</div>';
                            $html .= '<div class="ina_floor"><span>' . ($kk + 1) . '楼</span><i></i></div>';
                            $html .= '</li>';
                        }
                        $html .= ' </ul>';
                    }
                    $html .= '<div class="ina_comment_bottom">' . $v['content'] . '</div>';
                    $html .= '</dd>';
                    $html .= '</dl>';
                }
                $html .= '</div>';


            }
//            header("Content-type:text/html;charset=utf-8");
//            echo $html;
//            die;
            $tmp = array();
            $tmp['html'] = $html;
            echo json_encode($tmp);
        }
    }

    //帖子点赞
    public function message_give() {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            $mid = $_POST['mid'];
            if ($mid) {
                //查询帖子是否为可浏览状态
                $m_info = M('Message')->where('id=' . $mid)->find();
                if ($m_info['status'] == 1) {
                    $givemodel = M('MessageGive');
                    //查询是否点过赞
                    $giveinfo = $givemodel->where('mid=' . $mid . ' and uid = ' . $_SESSION[C('USER_AUTH_KEY')]['id'])->find();

                    if ($giveinfo) {
                        echo 4;
                    } else {
                        $mid = $_POST['mid'];
                        $tmp_array = array();
                        $tmp_array['uid'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
                        $tmp_array['mid'] = $mid;
                        $givemodel = M('MessageGive', 'bbs_', 'DB_CONFIG2');
                        $return = $givemodel->add($tmp_array);
                        if ($return) {
                            echo 1;
                        } else {
                            echo 2;
                        }
                    }
                } else {
                    echo 22;
                }
            }
        } else {
            echo 3;
        }
    }

    //评论及回复点赞
    public function comm_give() {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            if ($_POST) {
                $id = intval($_POST['id']);

                $ccmodel = M('CommGive');
                //查询
                $res = $ccmodel->where('uid=' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and commid=' . $id)->find();
                if ($res) { //取消评论点赞
                    $ress = M('CommGive', 'bbs_', 'DB_CONFIG2')->where('uid=' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and commid=' . $id)->delete();
                    if ($ress != false) {
                        echo 3;
                    }
                } else {//给评论加赞
                    $tmp_array = array();
                    $tmp_array['uid'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
                    $tmp_array['commid'] = $id;
                    $ccmodel = M('CommGive', 'bbs_', 'DB_CONFIG2');
                    $res = $ccmodel->add($tmp_array);
                    if ($res) {
                        echo 1;
                    } else {
                        echo 4;
                    }
                }
            }
        } else {
            echo 2;
        }
    }

    //取消点赞
    public function message_u_give() {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            $mid = $_POST['mid'];
            if ($mid) {
                $givemodel = M('MessageGive', 'bbs_', 'DB_CONFIG2');
                //查询是否点过赞
                $giveinfo = $givemodel->where('mid=' . $mid . ' and uid = ' . $_SESSION[C('USER_AUTH_KEY')]['id'])->find();
                if ($giveinfo) {
                    $return = $givemodel->where('mid=' . $mid . ' and uid=' . $_SESSION[C('USER_AUTH_KEY')]['id'])->delete();
                    if ($return) {
                        echo 1;
                    }
                } else {
                    echo 2;
                }
            }
        } else {
            echo 3;
        }
    }

    //执行评论或回复的标记已读方法
    public function readall() {
        $mod = M('Comm', 'bbs_', 'DB_CONFIG2');
        if ($_POST['id']) {
            $id = trim($_POST['id'], ',');
            $data['status'] = '1';
            $mod->where("id in ({$id})")->data($data)->save();
        }
        $_SESSION[C('USER_AUTH_KEY')]['hfnum'] = '0';     //待回复消息归零
        $this->redirect('Index/mynews');
    }

    //验证码
    Public function verify() {
        //echo session('verify');die;
        import('ORG.Util.Image');
        Image::buildImageVerify();
        if (session('verify') != md5($_POST['verify'])) {
            $this->error('验证码错误！');
        }
    }

    //搜索方法
    public function search() {
        $search = addslashes(urldecode(trim($_GET['q'])));
        $search = $search == 'index.php' ? '' : $search;
        if ($search) {
            //$where = "(a.title like '%" . urldecode($search) . "%') and a.status=1";
            //导入分页类
            import("ORG.Util.Page");
            $count = M('Message')->where("status=1 and title like '%" . urldecode($search) . "%'")->count();
            //$count = M('Message')->where("status=1")->count();
            //创建分页对象
            $page = new Page($count, 15);
            $this->assign('count', $count);
            $this->assign('count_num', $count>20 ? true : false);
            $list = M('Message')->where("status=1 and title like '%" . urldecode($search) . "%'")->limit($page->firstRow . "," . $page->listRows)->order('addtime desc')->select();
            if ($list) {
                //$long_str = 100;
                foreach ($list as &$vo) {
                    //计算时间差
                    $vo['addtime'] = $this->get_time_Company($vo['addtime']);

                    //对搜索结果的标题处理
                    $search = urldecode($search);
                    $vo['title'] = preg_replace("|($search)|i","<span style='color:red;'>\$1</span>",$vo['title']);
//                    $vo['title'] = str_ireplace(urldecode($search), '<span style="color:red;">' . urldecode($search) . '</span>', $vo['title']);

                    //头像显示
                    //$userinfo = M('Users')->where('id=' . $vo['uid'])->find();
                    $_M_user = D('Users');
                    $userinfo = $_M_user->get_user_info($vo['uid']);
                    $vo['picture_path'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
                    $vo['username'] = $userinfo['name'] ? $userinfo['name'] : $userinfo['username'];
                    $vo['cover'] = $this->ftp_img_path . $vo['cover'];
                    $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
                    //查询栏目信息
                    $class_info = M('Cat')->where(array('id' =>array('in', trim($vo['pid'],','))))->find();
                    $vo['class_name'] = $class_info['name'] ? $class_info['name'] : '其他';
                    $vo['class_num'] = $class_info['class'] ? $class_info['class'] : 2;
                   // $vo['scan'] = M('ViewRecord')->where('mid=' . $vo['id'])->count();
                    $vo['scan']=$this->_getPageviews($vo['id'])+$vo['show_scan'];
                    //查询评论
                    $p = M('Comm')->where('mid=' . $vo['id'])->count();
                    //$c = M('Reply')->where('mid=' . $vo['id'])->count();
                    $vo['pl_num'] = $p;
                    $z = M('MessageGive')->where('mid=' . $vo['id'])->count();
                    $vo['znum'] = $z;
                }
            }
            $this->assign('list', $list);
            $this->assign('pageinfo', $page->show());
            $this->assign('q', urldecode($search));
        }
        $this->display();
    }

    //精华
    public function boutique() {
        //创建分页对象
        $order = $_GET['order'];
        $orderby = 'addtime desc';
        //$sql = "SELECT a.*,b.name,b.username,b.picture,b.sex,c.name as class_name,c.class as class_num,count(d.id) as plnum,count(e.id) as znum,count(f.id) as rnum,count(d.id)+count(f.id) as pr FROM `bbs_message` as a left join bbs_users as b on a.uid = b.id left join bbs_cat as c on a.pid = c.id left join bbs_comm as d on a.id = d.mid left join bbs_message_give as e on a.id = e.mid left join bbs_reply as f on a.id = f.mid where " . $where . " group by a.id order by " . $orderby . " limit " . $page->firstRow . "," . $page->listRows . ";";
        //导入分页类
        import("ORG.Util.Page");
        if ($order == 'click') {//点击最多
            //$sql = "select count(*) as counts from (select a.*,ifnull(t.c,0) as tc from bbs_message as a left JOIN (select mid,count(1) as c from bbs_view_record group by mid) as t on a.id = t.mid where 1 and a.isbest=1) as tt";
           
            $sql="select count(*) as counts from bbs_message where 1 and isbest=1 and status=1";
              //echo $sql;die;
            $c_query = M()->query($sql);
            //echo "<pre>";print_r($c_query);die;
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

    //编辑器上传
    public function doupload() {
        set_time_limit(80);
        $water = trim($_GET['is_water']);
        $res = array("err" => "", "msg" => ""); //定义一个响应信息
        import('ORG.Net.UploadFile');
        $upload = new UploadFile(); // 实例化上传类
        $upload->maxSize = 10485760; // 设置附件上传大小
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg','bmp'); // 设置附件上传类型
        //$upload->savePath = './Public/Uploads/editor/' . date('Ym', time()) . '/'; // 设置附件上传目录
        $upload->savePath = $this->upload_dir;
        //执行上传
        if ($upload->upload()) {
            $info = $upload->getUploadFileInfo();
            $tmp_file_name = $info[0]['savename'];
            //ftp上传路径
            $ftp_path = 'community/' . date('Ymd', time());
            $this->updateImage_content($tmp_file_name, $this->upload_dir, 'xc_', 800, $water);
            //服务器的文件路径

            //本地的的文件路径

            unlink($this->upload_dir . $tmp_file_name);
            //添加图片信息
            //$res["msg"] = $this->upload_dir . $tmp_file_name;  //上传成功！
            $www = $this->_SERVER_LIST;
            $res["msg"] = $www[0]['WWW'] . '/' . $ftp_path . '/xc_' . $tmp_file_name;
            $tmp = array();
            $tmp['state'] = 'SUCCESS';
            $tmp['url'] = $www[0]['WWW'] . '/' . $ftp_path . '/xc_' . $tmp_file_name;
            $tmp['title'] = '';
            $tmp['original'] = '';
            $tmp['type'] = '1';
            $tmp['size'] = '1';
        } else {
            $res['err'] = $upload->getErrorMsg(); //失败
        }

        echo json_encode($tmp);
    }

    //图片缩放
    public function updateImage_content($picname, $path, $prix, $w, $water, $limit=false) {
        import("ORG.Util.Image.ThinkImage");
        $image = new ThinkImage();
        $path = rtrim($path, "/"); //去除后面多余的"/"
        $picture = $path . '/'  . $picname;

        //1. 定义获取基本信息
        $image->open($picture);
        $width = $image->width(); // 返回图片的宽度
        $height = $image->height(); // 返回图片的高度

//        $info = getimagesize($picture);
//        //获取图片文件的属性信息
//        $width = $info[0]; //原图片的宽度
//        $height = $info[1]; //原图片的高度

        //获取原来图片的长宽比例
        $h = intval($height / $width * $w);
        $sizeproportion = intval($_POST['sizeproportion']);
        $ftp_path = '/community/' . date('Ymd', time());
//        if ($width >= 800 && !$limit) {

        if ($width >= 680 && !$limit) {
            $w = 680;
            $h = intval(floatval(sprintf("%.1f", floatval(680 / $width))) * $height);
            $image->thumb($w,$h,1)->save($picture);
        } else {
            $w = $width;
            $h = $height;
        }


        //图片添加水印
        if($water){
            $image->open($picture);
            $image->water("./Public/images/water.png")->save($picture);
        }

        //服务器的文件路径
        $aDestination_file[] = $ftp_path . '/' . $prix . $picname;
        //本地的的文件路径
//        $aSource_file[] = $path . '/' . $prix . $picname;
        $aSource_file[] = $picture;
        $this->ftp_copy_files($aDestination_file, $aSource_file, 0, FTP_BINARY);

        //删除裁剪前的图片
        unlink($picture);
        //6. 销毁资源
//        imageDestroy($newim);
//        imageDestroy($srcim);
    }

    function web_error() {
        $this->display();
    }

}
