<?php

/**
 * 内容获取接口
 */
class MoreAction extends CommentAction {

    protected $listRows = 10;

    public function __construct() {
        parent::__construct();

        //加载字符处理类
        import("ORG.Util.String");

    }

    //首页加载更多
    public function index() {
        //接收参数
        $go = trim($_REQUEST['go']);
        $htmlData = array();


        //加载更多
        $list2 = M('Message')->where('status = 1 and isbest = 1')->limit($go . "," . 20)->order('addtime desc')->select();
        foreach ($list2 as &$vo) {

            //计算时间差
            $vo['addtime'] = $this->get_time_Company($vo['addtime']);

            //截取文章描述
            $description = String::msubstr(trim(strip_tags($vo['content'])), 0, 50);
            $vo['description'] = $description ? $description : $vo['title'];

            //头像显示
            $_M_user = D('Users');
            //个人信息
            $userinfo = $_M_user->get_user_info($vo['uid']);
            $vo['picture_path'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
            $vo['username'] = $userinfo['username'];
//            demo($vo['cover']);
            list($data,$name) = explode('/',$vo['cover2']);
            $vo['cover3'] = '/pic/' . $name;
            $vo['cover'] = $this->ftp_img_path . $vo['cover'];
            $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
            $class_name = array();
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
            $vo['class_name'] = $class_name;
            //查询评论
            $p = M('Comm')->where('mid=' . $vo['id'])->count();
            //$c = M('Reply')->where('mid=' . $vo['id'])->count();
            $vo['pl_num'] = $p;
            $z = M('MessageGive')->where('mid=' . $vo['id'])->count();
            $vo['znum'] = $z;
            //浏览量
            $vie=$this->_getPageviews($vo['id'])+$vo['show_scan'];
            $vo['scan'] = $vie;
            $this->assign('vo', $vo);
            $htmlData[] = $this->fetch('More:index');
        }


        echo json_encode($htmlData);
        exit;
    }

    /**
     *精华页
     */
    public function essence(){
        //创建分页对象
        $go = $_REQUEST['go'];
        $order = trim($_REQUEST['order']);
        $htmlData = array();
        $orderby = 'addtime desc';
        if($order === 'click'){  //点击量最多
            $order = 'show_scan desc';
            //最新贴
            $list = M('Message')->where('isbest=1 and status=1')->limit($go . "," . 20)->order($order)->select();

        }elseif ($order === 'comment'){  //评论最多

            $sql = "select a.*,ifnull(t.c,0) as tc from bbs_message as a left JOIN (select mid,count(1) as c from bbs_comm group by mid) as t on a.id = t.mid where 1 and a.isbest=1 and a.status=1 order by tc desc limit " . $go . "," . 20 . ";";
            $list = M()->query($sql);
        }else{


            //最新贴
            $list = M('Message')->where('isbest=1 and status=1')->limit($go . "," . 20)->order($orderby)->select();
        }


        if ($list) {
            foreach ($list as &$vo) {
                //计算时间差
                $vo['addtime'] = $this->get_time_Company($vo['addtime']);

                //头像显示
                $userinfo=D('Users')->get_user_info($vo['uid']);
                $vo['picture_path'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
                $vo['username'] = $userinfo['name'] ? $userinfo['name'] : $userinfo['username'];
                $vo['cover'] = $this->ftp_img_path . $vo['cover'];
                $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
                //查询栏目信息
                $class_info = M('Cat')->where('id=' . $vo['pid'])->find();
                $class_name = array();
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
                $vo['class_name'] = $class_name;
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
                $this->assign('vo', $vo);
                $htmlData[] = $this->fetch('More:essence');
            }
        }

        echo json_encode($htmlData);
        exit;

    }

    //二级页面-栏目页
    public function column() {

        $pid = intval($_REQUEST['pid']);
        $go = intval($_REQUEST['go']);
        $htmlData = array();

        $this->assign('pid', $pid);
        //显示栏目信息
        //导入分页类
        $list = M('Message')->where('pid like "%,' . $pid . ',%" and status=1')->limit($go . "," . 20)->order('addtime desc')->select();
        foreach ($list as &$vo) {
            //计算时间差
            $vo['addtime'] = $this->get_time_Company($vo['addtime']);

            //头像显示
            //查询用户
            $_M_user = D('Users');
            $userinfo = $_M_user->get_user_info($vo['uid']);
            $vo['picture_path'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
            $vo['username'] = $userinfo['name'] ? $userinfo['name'] : $userinfo['username'];
            $vo['cover'] = $this->ftp_img_path . $vo['cover'];
            $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];

            //查询栏目信息
            $class_name = array();
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
            $vo['class_name'] = $class_name;

            //查询评论
            $p = M('Comm')->where('mid=' . $vo['id'])->count();
            $c = M('Reply')->where('mid=' . $vo['id'])->count();
            $vo['pl_num'] = $p + $c;
            $z = M('MessageGive')->where('mid=' . $vo['id'])->count();
            $vo['znum'] = $z;

            //浏览量
            $vie=$this->_getPageviews($vo['id'])+$vo['show_scan'];
            $vo['scan'] = $vie;
            $this->assign('vo', $vo);
            $htmlData[] = $this->fetch('More:column');
        }
        echo json_encode($htmlData);
        exit;
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
       $sql="select * from bbs_message as a where 1 " . $seven_day_stamp_where . " order by show_scan desc limit 10;";
        $list = M()->query($sql);
       // echo"<pre>";print_r($list);die;
        foreach ($list as &$vo) {
            //计算时间差
            $vo['addtime'] = $this->get_time_Company($vo['addtime']);

            //头像显示
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
            $vo['scan']=$this->_getPageviews($vo['id'])+$vo['show_scan'];
        }
        $list = $this->multi_array_sort($list,'scan');
    
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

    //活动
    public function activity(){
        $this->display();
    }


    //搜索结果页
    public function search(){
        $search = addslashes(urldecode(trim($_GET['q'])));
        $go = trim($_REQUEST['go']);
        $htmlData = array();
        $search = $search == 'index.php' ? '' : $search;
        if ($search) {

            //查询对应的搜索详情
            $list = M('Message')->where("status=1 and title like '%" . urldecode($search) . "%'")->limit($go . "," . 15)->order('addtime desc')->select();
            if ($list) {
                foreach ($list as &$vo) {
                    //计算时间差
                    $vo['addtime'] = $this->get_time_Company($vo['addtime']);

                    //对搜索结果的标题处理
                    $search = urldecode($search);
                    $vo['title'] = preg_replace("|($search)|i","<span style='color:red;'>\$1</span>",$vo['title']);
//                    $vo['title'] = str_replace(urldecode($search), '<span style="color:red;">' . urldecode($search) . '</span>', $vo['title']);


                    //头像显示
                    $_M_user = D('Users');
                    $userinfo = $_M_user->get_user_info($vo['uid']);
                    $vo['picture_path'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
                    $vo['username'] = $userinfo['name'] ? $userinfo['name'] : $userinfo['username'];
                    $vo['cover'] = $this->ftp_img_path . $vo['cover'];
                    $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];

                    //截取文章描述
                    $description = String::msubstr(trim(strip_tags($vo['content'])), 0, 55);
                    $vo['description'] = $description === '...' ? '暂无简介' : $description;

                    //查询栏目信息
                    $class_info = M('Cat')->where('id=' . $vo['pid'])->find();
                    $vo['class_name'] = $class_info['name'];
                    $vo['class_num'] = $class_info['class'];
                    // $vo['scan'] = M('ViewRecord')->where('mid=' . $vo['id'])->count();
                    $vo['scan']=$this->_getPageviews($vo['id'])+$vo['show_scan'];

                    //查询评论
                    $p = M('Comm')->where('mid=' . $vo['id'])->count();
                    //$c = M('Reply')->where('mid=' . $vo['id'])->count();
                    $vo['pl_num'] = $p;
                    $z = M('MessageGive')->where('mid=' . $vo['id'])->count();
                    $vo['znum'] = $z;
                    $this->assign('vo', $vo);
                    $htmlData[] = $this->fetch('More:search');
                }
            }

            $this->assign('q', urldecode($search));

        }
        echo json_encode($htmlData);
        exit;
    }

    //ajax评论
    public function comment() {
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            //检查用户是否被禁言
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



    //获取评论数据
    public function get_comm_data() {
        $id = $_GET['id'];
        $go = $_GET['go'];
        $flag = $_GET['flag'];

        $order = $flag == 'old' ? 'addtime asc' : 'addtime desc';
        $model = M("Comm");
        $comm_list = $model->where('mid = ' . $id)->limit($go . ',' . 10)->order($order)->select();

//        demo($model->getLastSql());
        if ($comm_list) {
            //用户信息
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

        return $comm_list;


    }

    //获取详情页评论数据列表
    public function get_comm_list() {
        $htmlData = array();
        $comm_list = $this->get_comm_data();
        foreach($comm_list as $k => $v){
            $this->assign('v', $v);
            $htmlData[] = $this->fetch('More:comment');
        }
        echo json_encode($htmlData);
        exit;


    }

    /**
     *返回详情页评论数据,每次10条
     */
    public function get_comm_html(){
        $htmlData = array();
        $comm_list = $this->get_comm_data();
        foreach($comm_list as $k => $v){
            $this->assign('v', $v);
            $htmlData[] = $this->fetch('More:comment');
        }
        echo json_encode($htmlData);
        exit;
    }

    public function get_comm_data_html() {
        $id = intval($_POST['mid']);
        if ($id) {
            $model = M("Comm");
            import("ORG.Util.Page");
            $count = $model->where('mid = ' . $id)->count();
            $page = new Page($count, 10, 'p', 'Index/show/id/' . $id);
            $comm_list = $model->where('mid = ' . $id)->limit($page->firstRow . ',' . $page->listRows)->order('addtime desc')->select();
            $html = '';
            $html .= '<div class="ina_comment_bt">';
            $html .= '<h3>全部评论(<span id="count_rep_comm">' . $count . '</span>)</h3>';
            $html .= '<p><a href="javascript:;;" class="ina_cur">最新</a><span></span></p>';
            $html .= '</div>';
            if ($comm_list) {
                //用户信息
                //$model_user = M('Users');
                 $_M_user = D('Users');
                $comm_give_model = M('CommGive');
                $html .= '<div class="ina_comment_nr">';
                foreach ($comm_list as $k => $v) {

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
                $html .= '<div class="ina_page">' . $page->show() . '</div>';
            }

            $tmp = array();
            $tmp['html'] = $html;
            echo json_encode($tmp);
            exit;
        }
    }


    /**
     *个人中心文章获取
     */
    public function getuspaceinfo(){
        $htmlData = array();
        $uid = trim($_REQUEST['uid']);
        $go =  trim($_REQUEST['go']);
        $_M_user = D('Users');
        $userinfo = $_M_user->get_user_info($uid);
        $this->assign('user', $userinfo);
        $this->assign('editor',false);
        //导入分页类
//        $count = M('message')->where('uid = ' . $uid . ' and status = 1')->count();
        $message = M('message')->where('uid = ' . $uid . ' and status = 1')->order('addtime desc')->limit($go, 15)->select();
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

                $this->assign('v', $v);
                $htmlData[] = $this->fetch('More:uspace');
            }
        }

        echo json_encode($htmlData);
        exit;
    }


    /**
     *获取我的收藏文章内容，已审核和未审核
     */
    public function get_my_mess(){
        $htmlData = array();
        $uid = trim($_REQUEST['uid']);
        $go =  trim($_REQUEST['go']);
        $flag =  trim($_REQUEST['flag']);
        $mod = D("Message");

        if(!$flag){return '缺少参数[flag]';}
        $status = ($flag == 'yes') ? 1 : 3;

        //我的帖子-未审核
        $where = array();
        $where['uid'] = array('eq', $uid);
        $where['status'] = array('eq', $status);
        $wsh_list = ($mod->where($where)->order('addtime desc,status asc')->limit($go . ',' . 15)->select());
        if($wsh_list){

        foreach ($wsh_list as &$vo) {
            $modell = D('Comm');
            $num = $modell->where("mid={$vo['id']} and pid='0'")->count('mid');
            //回复数量
            $vo['plnum'] = $num;
            //状态
            if ($vo['status'] == 3) {
                $vo['status'] = '未审核';
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
            $this->assign('v', $vo);
            $htmlData[] = $this->fetch('More:mymess_'. $flag);
        }

        }else{
            $htmlData[] = $this->fetch('More:fatie');
        }

        echo json_encode($htmlData);
        exit;
    }

    public function get_mynews(){
        $htmlData = array();
        $go =  trim($_REQUEST['go']);
        $uid = $_SESSION[C('USER_AUTH_KEY')]['id'];

        //查看和已查看的
        $where = 'userid=' . $uid . ' and status in(0,1)';
        $count = M('NewsManagement')->where($where)->count();       //获取总数据条数
        //未查看的
        $where2 = 'userid=' . $_SESSION[C('USER_AUTH_KEY')]['id'] . ' and status = 0';
        $count_w = M('NewsManagement')->where($where2)->count();
        $this->assign('count_w', $count_w);
        //查询个人的消息数据
        $news_data = M('NewsManagement')->where($where)->order('create_time desc')->limit($go . ',' . 15)->select();

//        demo(M('NewsManagement')->getLastSql());

        if ($news_data) {
            foreach ($news_data as $key => &$v) {
                if ($v['act_userid']) {
                    $userInfo = D('Users')->get_user_info($v['act_userid']);
                    //print_r($getname);die;
                    $a = "<a href='/index.php/Ucenter/uspace/uid/" . $userInfo['id'] . "'>" . $userInfo['username'] . "</a>";
                    //echo $a;die;
                }

                $v['create_time'] = date('Y-m-d H:i:s', $v['create_time']);
                $v['message'] = $a . $v['message'];
                $v['photo'] = $userInfo['photo'];

                $this->assign('v', $v);
                $htmlData[] = $this->fetch('More:mynews');
            }
        }

        // if ($news_data) {
        //     foreach ($news_data as &$v) {
        //         $v['create_time'] = date('Y-m-d H:i:s', $v['create_time']);
        //         //$v['message']="<a href='/index.php/Ucenter/uspace/uid/'".$news_data['act_userid']">".$name['']
        //     }
        // }
        //$user = M('Users')->where('id=' . $uid)->find();

//        $_M_user = D('Users');
//        $user = $_M_user->get_user_info($uid);
//
//        if (empty($user['name'])) {
//            $this->redirect('Ucenter/euserinfo');
//        }
//        //头像显示
//        $user['picture_path'] = $this->get_portrait($user['photo'], $user['sex']);
//        //用户名
//        $user['username'] = $user['name'] ? $user['name'] : $user['phone'];
//        $user['introduce'] = $user['introduce'] ? $user['introduce'] : '这个人很懒，什么都没有留下~';
        //热门文章
//        $this->get_hot();
        //查询用户的帖子数关注及粉丝数
//        $this->get_user_info_data($uid);
//        $this->assign('user', $user);
//        $this->assign('count', $count);
//        $this->assign('news_data', $news_data);

       echo json_encode($htmlData);
        exit;
    }

    function web_error() {
        $this->display();
    }

}
