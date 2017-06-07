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
