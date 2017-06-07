<?php

class IndexAction extends CommentAction {

    public function __construct() {
        parent::__construct();

        //引入字符串处理类
        import("ORG.Util.String");

        //导入图片处理类和http处理类
        import("ORG.Net.Http");
        import("ORG.Util.Image.ThinkImage");
        $this->image = new ThinkImage();

        //导航
        $this->keyword();
        $this->assign('action_name', ACTION_NAME);
    }

    //首页
    public function index() {
       $row_list = M('PictureManagement')->where('status=2')->order('addtime desc')->limit(5)->select();
        if ($row_list) {
            foreach ($row_list as &$v) {
                list($data,$name) = explode('/',$v['picture']);
                $v['cover'] = $this->ftp_img_path . $v['picture'];
                $v['cover3'] = '/pic/' . $name;
                $s = strpos($v['message_link'], '.');
//                $v['message_link']=substr_replace($v['message_link'], 'm', 24, 5);
                $v['message_link'] = str_replace('index.php','m.php', $v['message_link']);
            }
        }


        $this->assign('row_list',$row_list);
        $message = M('Message')->where('status = 1 and isbest = 1')->order('addtime desc')->limit(20)->select();
        $message=$this->getAllData($message);
       // echo "<pre>";print_r($message);die;
        $this->assign('title','首页');
        $this->assign('page',2);
        $this->assign('message',$message);
        $this->display();
    }
    //精华
    public function essence(){
        $order = $_GET['order'];
        import("ORG.Util.Page");
        if ($order=='click') {//点击最多
            $count=M('Message')->where('isbest=1 and status=1')->count();
            $message=M('Message')->where('isbest=1 and status=1')->order('show_scan desc')->limit(20)->select();
        }elseif ($order == 'comment'){//评论最多
            $sql = "select count(*) as counts from (select a.*,ifnull(t.c,0) as tc from bbs_message as a left JOIN (select mid,count(1) as c from bbs_comm group by mid) as t on a.id = t.mid where 1 and a.isbest=1 and a.status=1) as tt";
            $c_query = M()->query($sql);
            $count = $c_query[0]['counts'];
            //创建分页对象
            $page = new Page($count, 20);
            $sql = $sql = "select a.*,ifnull(t.c,0) as tc from bbs_message as a left JOIN (select mid,count(1) as c from bbs_comm group by mid) as t on a.id = t.mid where 1 and a.isbest=1 and a.status=1 order by tc desc limit " . $page->firstRow . "," . $page->listRows . ";";
            $message = M()->query($sql);
        }else{//最新发布
            $count=M('Message')->where('isbest=1 and status=1')->count();
            $message=M('Message')->where('isbest=1 and status=1')->order('addtime desc')->limit(20)->select();
           // echo M('Message')->getLastSql();die;
        }
        if($order == 'click'){
            //$list = $this->multi_array_sort($list,'scan');
            $sort='scan';
            $list=$this->getAllData($message,$sort);
            //echo "<pre>";print_r($list);die;
        }else{
            $list=$this->getAllData($message);
        }
        $list['title'] = '精华';
        $this->assign('page',2);
        $this->assign('count',$count);
        $this->assign('order',$order);
        $this->assign('list',$list);
        $this->display();
    }
    //热门
    public function hot(){
        import("ORG.Util.Page");
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
        $list = M()->query($sql);

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

        $this->assign('title','热门排行');
        $this->assign('page',2);
//        $this->assign('count',$count);
        $this->assign('list',$list);
        $this->display();
    }

    //栏目列表
    public function column(){
        $mod = M("Message");
        $pid = intval($_GET['pid']);
        $this->assign('pid', $pid);
        $lanmu_info = M('Cat')->where('id=' . $pid)->find();
        //显示栏目信息
        $count = M('Message')->where('pid like "%,' . $pid . ',%" and status=1')->count();
        // echo M('Message')->getLastSql();die;
        //导入分页类
        import("ORG.Util.Page");
        $page = new Page($count, 20);
        $message = M('Message')->where('pid like "%,' . $pid . ',%" and status=1')->limit($page->firstRow . "," . $page->listRows)->order('addtime desc')->select();
        $list=$this->getAllData($message);
        $title = $lanmu_info['name'];

        $this->assign('title', $title);
        $this->assign('lanmu_info', $lanmu_info);
        $this->assign('list', $list);
        $this->assign('where', $_GET['pid']);
        $this->assign('page',2);
        $this->display();
    }
    //搜索
    public function search(){
        $search = urldecode(urldecode($_GET['q']));
        //$search = $search == 'index.php' ? '' : $search;
        if ($search) {
            import("ORG.Util.Page");
            $count = M('Message')->where("status=1 and title like '%" . trim($search) . "%'")->count();
            $this->assign('count', $count);
            $message = M('Message')->where("status=1 and title like '%" . trim($search) . "%'")->limit(20)->order('addtime desc')->select();
            if ($message) {
                $list=$this->getAllData($message);
            }
            $this->assign('list', $list);
            $this->assign('q', urldecode($search)); 
            $this->assign('page',2);
        }
         $this->display();
    }


    //帖子详情
    public function show(){
        $id = intval($_GET['id']);
        if ($id) {
            $mod = M("Message");
            $list = $mod->where('id=' . $id)->find();
        
            $array = array();
            if ($_COOKIE['view_record']) {
               $array = unserialize($_COOKIE['view_record']);

                if (!in_array($id, $array)) {
                   $array[] = $id;
                   setcookie('view_record', serialize($array), strtotime(date('Y-m-d 0:0:1', time())) + (3600 * 24), '/');
                   $this->_setPageviews($id);
               }
            } else {
            $array[] = $id;
            setcookie('view_record', serialize($array), strtotime(date('Y-m-d 0:0:1', time())) + (3600 * 24), '/');
            $this->_setPageviews($id);
            }

            $list['addtime'] = date('m月d日 H:i:s', $list['addtime']);
            //头图
            $list['banner'] = $this->ftp_img_path . $list['cover2'];
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

            $_M_user = D('Users');
            $userinfo = $_M_user->getUser('id='.$list['uid']);
            $list['picture_path'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
            $list['username'] = $userinfo['username'];
            $list['sex']=$userinfo['sex'];
            $list['introduce']=$userinfo['introduce'];
            $list['pageView']=$this->_getPageviews($list['id'])+$list['show_scan'];

            //查询评论数
            $commodel = M('Comm');
            $comm_num = $commodel->where('mid= ' . $id)->count();
            $list['pl_num']=$comm_num;

            //查询帖子点赞数量
            $z_num = M('MessageGive')->where('mid=' . $id)->count();
            $list['z_num'] = $z_num;

            //评论

            $this->getDetailsPageComments($id);

            //推荐文章，同栏目下的精华帖推荐4篇。
           // $recommend = $mod->where('id != ' . $id . ' and status=1 and isbest=1 and pid like "%' . $list['pid'] . '%"')->limit(3)->select();
            //$sql1="select a.*,count(*) as num from bbs_comm as b join bbs_message as a on b.mid=a.id where a.status=1 and a.isbest=1 and a.id !=".$id." and a.pid like '%".$list['pid']."%' order by num desc limit 3";
            $sql1="select a.* from  bbs_message as a left JOIN (SELECT count(*) as num,mid FROM bbs_comm GROUP BY mid) as t on t.mid=a.id where a.status=1 and a.isbest=1 and a.id !=".$id." and a.pid like '%".$list['pid']."%' order by t.num desc limit 4";
            $recommend=M()->query($sql1);
            $cou=count($recommend);
            if ($cou<4) {
                $arr=$mod->where('id != ' . $id . ' and status=1')->limit(4-$cou)->order('show_scan DESC')->select();
                if($cou){
                    $recommend=array_merge_recursive($recommend,$arr);
                }else{
                    $recommend = $arr;
                }
            }
            $tjmess=$this->getAllData($recommend);
        }

        $this->assign('title',$list['title']);
        $this->assign('list',$list);
        $this->assign('tjmess',$tjmess);
        $this->display();
    }


    //点击加载更多
    public function ajax_more(){
        //首页加载更多
        if ($_GET['pid']==0) {
            $order='addtime DESC';
            $where='status=1';
            $num=20;
            $this->getmess($where,$num,$order);
        }
        //搜索加载更多
        if ($_GET['pid']==1) {
            //echo "<pre>";print_r($_GET);die;
            $order='addtime DESC';
            $where="status=1 and title like '%" . urldecode($_GET['k']) . "%'";
            $num=20;
            $this->getmess($where,$num,$order);
        }
        //精华页最新发布加载更多
        if ($_GET['pid']==2) {
            $order='addtime DESC';
            $where='isbest=1 and status=1';
            $num=20;
            $this->getmess($where,$num,$order);
        }
        //精华页点击最高加载更多
        if ($_GET['pid']==3) {
            $order='show_scan DESC';
            $where='isbest=1 and status=1';
            $num=20;
            $sort='scan';
            $this->getmess($where,$num,$order,$sort);
        }
        //精华页评论最多加载更多
        if ($_GET['pid']==4) {
            $num=20;
            $where='1 and a.isbest=1 and a.status=1';
            $this->getmessBypl($num,$where);
        }
         //栏目页汽车/摩托加载更多
        if ($_GET['pid']==5) {
            $order='addtime DESC';
            $where='pid like "%,' . $_GET['id'] . ',%" and status=1';
            $num=20;
            $this->getmess($where,$num,$order);
        }
        //热门帖子排行 加载更多
         if ($_GET['pid']==6) {
            $day = strtotime('-7 day');
            //$day_stamp = strtotime(date('Y-m-d', $day) . ' 00:00:00');
            $order='show_scan DESC';
            $num=20;
            $where='addtime>='.$day.' and status=1';
            $sort='scan';
            $this->getmess($where,$num,$order,$sort);
        }
        //热门帖子排行 月 加载更多
        if ($_GET['pid']==61) {
            $day = strtotime('-1 month');
            //$day_stamp = strtotime(date('Y-m-d', $day) . ' 00:00:00');
            $order='show_scan DESC';
            $num=20;
            $where='addtime>='.$day.' and status=1';
            $sort='scan';
            $this->getmess($where,$num,$order,$sort);
        }
        //热门帖子排行 总 加载更多
        if ($_GET['pid']==62) {
            $order='show_scan DESC';
            $num=20;
            $where='status=1';
            $sort='scan';
            $this->getmess($where,$num,$order,$sort);
        }
        //热门评论排行 加载更多
         if ($_GET['pid']==7) {
            $day = strtotime('-7 day');
            //$day_stamp = strtotime(date('Y-m-d', $day) . ' 00:00:00');
            $num=20;
            $where="1 and a.addtime >= " . $day . ' and status=1';
           // $where='1 and a.status=1';
            $this->getmessBypl($num,$where);
        }
        //热门评论排行 月 加载更多
        if ($_GET['pid']==71) {
            $day = strtotime('-1 month');
            //$day_stamp = strtotime(date('Y-m-d', $day) . ' 00:00:00');
            $num=20;
            $where="1 and a.addtime >= " . $day . ' and status=1';
            $this->getmessBypl($num,$where);
        }
        //热门评论排行 总 加载更多
        if ($_GET['pid']==72) {
            $num=20;
            $where='1 and a.status=1';
            $this->getmessBypl($num,$where);
        }
    }
    //加载更多查询方法传3或4个参数
    public function getmess($where,$num,$order,$sort=''){
        $total = M('Message')->where($where)->count();
        import("ORG.Util.Page");
        $page = new Page($total,$num);
        $pagenum=ceil($total/$num);
        $message=M('Message')->where($where)->limit($page->firstRow.','.$page->listRows)->order($order)->select();
//        $data['p'] = $page->nowPage + 1;
        if ($message) {
            if (!empty($sort)) {
                $data['list']=$this->getAllData($message,$sort);
            }else{
               $data['list']=$this->getAllData($message); 
            }
            
//            if ($page->nowPage==$pagenum) {
//                $data['wu']=1;
//            }
        }
       // echo $pagenum;die;
        // echo '<pre>';
        // print_r($data);exit;
        echo json_encode($data);
    }
    //按评论排行加载更多方法
    public function getmessBypl($num,$where){
        $sql = "select count(*) as counts from (select a.*,ifnull(t.c,0) as tc from bbs_message as a left JOIN (select mid,count(1) as c from bbs_comm group by mid) as t on a.id = t.mid where ".$where.") as tt";
            $c_query = M()->query($sql);
            $count = $c_query[0]['counts'];
            //创建分页对象
            import("ORG.Util.Page");
            $page = new Page($count,$num);
            $data['p'] = $page->nowPage + 1;
            $pagenum=ceil($count/$num);
            $sql = $sql = "select a.*,ifnull(t.c,0) as tc from bbs_message as a left JOIN (select mid,count(1) as c from bbs_comm group by mid) as t on a.id = t.mid where ".$where." order by tc desc limit " . $page->firstRow . "," . $page->listRows . ";";
            //echo $sql;die;
            $message = M()->query($sql);
            if ($message) {
                $data['list']=$this->getAllData($message); 
                if ($page->nowPage==$pagenum) {
                    $data['wu']=1;
                }
            }

            echo json_encode($data);
    }
    //M('Message')后调取的方法，得到所有需展示的数据
    public function getAllData($message,$sort=''){
          foreach ($message as &$vo) {
            //计算时间差
            $vo['addtime'] = $this->get_time_Company($vo['addtime']);
            if($_GET['q']){
                $q = urldecode(urldecode($_GET['q']));
                //对搜索结果的标题处理
//                $search = urldecode($search);
                $vo['title'] = preg_replace("|($q)|i","<span style='color:red;'>\$1</span>",$vo['title']);
//                $vo['title'] = str_replace(trim($q),"<span style='color:red;'>".trim($q)."</span>",$vo['title']);
            }
            //头像显示
            //$userinfo = M('Users')->where('id=' . $vo['uid'])->find();
            $_M_user = D('Users');
            $userinfo = $_M_user->getUser('id='.$vo['uid']);
            $vo['picture_path'] = $this->get_portrait($userinfo['photo'], $userinfo['sex']);
            $vo['username'] = $userinfo['username'];
           // $vo['cover'] = $this->ftp_img_path . $vo['cover'];
            if (empty($vo['cover2'])) {
                $vo['cover2']="http://img.news18a.com/community/image/lazyload_750.jpg";
            }else{
                list($date, $pic_name) = explode('/',$vo['cover2']);
                $vo['cover2'] = $this->ftp_img_path . $vo['cover2'];
                $vo['cover3'] = '/pic/'.$pic_name;
                $vo['cover4'] = '/pic_3/'.$pic_name;
            }
            
            
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

            //截取文章描述
            $description = String::msubstr(trim(strip_tags($vo['content'])), 0, 55);
            $vo['description'] = $description === '...' ? '暂无简介' : $description;

            $vo['class_name'] = $class_name;
            //$vo['class_num'] = $class_info['class'];
            //查询评论
            $p = M('Comm')->where('mid=' . $vo['id'])->count();
            //$c = M('Reply')->where('mid=' . $vo['id'])->count();
            $vo['pl_num'] = $p;
            $z = M('MessageGive')->where('mid=' . $vo['id'])->count();
            $vo['znum'] = $z;
            //浏览量
            //$vie = M('ViewRecord')->where('mid = ' . $vo['id'])->count();
            $vie=$this->_getPageviews($vo['id'])+$vo['show_scan'];
            $vo['scan'] = $vie;
            // echo "<pre>";print_r($vo);die;
        }
        if (!empty($sort)) {
            //echo $sort;die;
            $message = $this->multi_array_sort($message,$sort);
        }
        return $message;
    }


    private function getDetailsPageComments($mid){
        $_M_user = D('Users');
        $sql="select b.*,t.num from  bbs_comm as b left JOIN (SELECT count(*) as num,commid FROM bbs_comm_give GROUP BY commid) as t on t.commid=b.id where b.mid=".$mid." ORDER BY t.num DESC LIMIT 3;";

        $com=M()->query($sql);
        foreach ($com as $key => &$value) {
            $user=$_M_user->getUser('id='.$value['uid']);
            $value['user']=$user['username'];
            $value['tx']=$this->get_portrait($user['photo'], $user['sex']);
            $value['sj']=$this->get_time_Company($value['addtime']);
            if (empty($value['num'])) $value['num']=0;

            if($value['id_path']){
                $arr = explode(",", $value['id_path']);
                $last=$arr[count($arr)-1];
                $sql = "SELECT a.content,b.name,b.phone,b.photo,b.gender as sex FROM bbs_comm as a JOIN cms_app_user as b on a.uid=b.id WHERE a.id=$last";
                $parentCom = M()->query($sql);
                $value['parent_user'] = $parentCom[0]['name'] ? $parentCom[0]['name'] : substr_replace($parentCom[0]['phone'],'****',3,4);
                
                $value['parent_content'] = $parentCom[0]['content'];
                //$value['parent_content_sub'] = mb_substr($parentCom[0]['content'],0,100,'utf-8');
                $value['parent_len'] = mb_strlen($parentCom[0]['content'],'utf8');
                $value['parent_tx']=$this->get_portrait($parentCom[0]['photo'], $parentCom[0]['sex']);
            }else{
                $value['parent_user'] = '';
                $value['parent_content'] = '';
                $value['parent_len'] = 0;
            }
            $value['len'] = mb_strlen($value['content'],'utf8');
            //$value['content_sub'] = mb_substr($value['content'],0,100,'utf-8');
        }
        $this->assign('comments',$com);
    }

}

