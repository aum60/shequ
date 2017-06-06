<?php

//帖子信息控制Action类
class ActivityAction extends CommonAction {

    //上传目录
    protected $upload_dir = '/tmp/';
    protected $_SERVER_LIST = array(
        array(//img_ftp 4
            'WWW' => 'http://img.news18a.com',
            'STATIC' => '/data/',
            'TEMPLATE' => '/export/home/cms/www/template.img.newsa.com.cn',
            'FTP_CFG' => array(
                array(
                    'FTP_SVR' => '10.15.200.11',
                    'FTP_USER' => "img_ftp",
                    'FTP_PWD' => "PMRcmeN6ZZYNk",
                    'FTP_DIR' => ""
                ),
            ),
        )
    );
    protected $ftp_img_path = 'http://img.news18a.com/community/';

    //添加搜索方法
    public function _filter(&$map) {
        //判断是否有搜索条件
        if ($_REQUEST['username'] || $_REQUEST['name']) {
            //$list = M("Users")->field('id')->where("`name` like '%" . trim($_REQUEST['name']) . "%'")->select();
            $list=D('Users')->get_user_by_where("`name` like '%" . trim($_REQUEST['name']) . "%'");
            $uid = array();
            foreach ($list as $vo) {
                $uid[] = $vo['id'];
            }
            if (count($uid) > 0) {

                $map['uid'] = array('in', implode(',', $uid));
            }
        }
        if ($_REQUEST['title']) {
            $map['title'] = array("like", "%{$_REQUEST['title']}%");
        }
        if (intval($_REQUEST['pid'])) {

            //$map['pid'] = array('eq', $_REQUEST['pid']);
            $map['pid'] = array('like', '%,' . $_REQUEST['pid'] . ',%');
        }
        if ($_REQUEST['isbest']) {
            $map['isbest'] = array("eq", '1');
        }
        if ($_REQUEST['ishot']) {
            $map['ishot'] = array("eq", '1');
        }
        if ($_REQUEST['isindex']) {
            $map['isindex'] = array("eq", '1');
        }
        if ($_REQUEST['status']) {
            $map['status'] = array("eq", $_REQUEST['status']);
        }
    }

    public function index() {
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        if (!intval($map['pid'])) {
            unset($map['pid']);
        }
        if (!intval($map['status'])) {
            unset($map['status']);
        }
        //判断采用自定义的Model类
        if (!empty($_POST["actionName"])) {
            $model = D($_POST["actionName"]);
        } else {
            $model = D($this->getActionName());
        }
        if (!empty($model)) {
            $this->_list($model, $map);
        }
        $this->typeSelect();
        $this->display();
    }

    public function edit() {
        $model = D($this->getActionName());
        $id = $_REQUEST[$model->getPk()];
        $vo = $model->where('id=' . $id)->find();
        $tmp = $this->_SERVER_LIST;
        $vo['cover2_path'] = $this->ftp_img_path . $vo['cover2'];
        $vo['pid'] = explode(',', substr($vo['pid'], 1, -1));
        $this->assign('vo', $vo);
        $session_id = session_id();
        $this->assign('session_id', $session_id);
        $time = time();
        $token = md5('unique_salt' . time());
        $this->assign('time', $time);
        $this->assign('token', $token);
        //查询分类
        $cat = D('Cat')->where('id != 999')->select();
        $this->assign('cat', $cat);
        $this->assign('ftp_img_path', $this->ftp_img_path);
        $this->display('edit');
    }

    protected function _list($model, $map = array(), $sortBy = '', $asc = false) {
        //排序字段 默认为主键名
        if (!empty($_REQUEST['_order'])) {
            $order = $_REQUEST['_order'];
        } else {
//            $order = !empty($sortBy) ? $sortBy : $model->getPk();
            $order = !empty($sortBy) ? $sortBy : 'add_time';
        }

        //排序方式默认按照倒序排列
        //接受 sort参数 0 表示倒序 非0都 表示正序
        if (!empty($_REQUEST['_sort'])) {
            $sort = $_REQUEST['_sort'] == 'asc' ? 'asc' : 'desc';
        } else {
            $sort = $asc ? 'asc' : 'desc';
        }

        //取得满足条件的记录数
        $count = $model->where($map)->count();

        //每页显示的记录数
        if (!empty($_REQUEST['numPerPage'])) {
            $listRows = $_REQUEST['numPerPage'];
        } else {
            $listRows = '10';
        }


        //设置当前页码
        if (!empty($_REQUEST['pageNum'])) {
            $nowPage = $_REQUEST['pageNum'];
        } else {
            $nowPage = 1;
        }
        $_GET['p'] = $nowPage;

        //创建分页对象
        import("ORG.Util.Page");
        $p = new Page($count, $listRows);


        //分页查询数据
        $list = $model->where($map)->order($order . ' ' . $sort)->limit($p->firstRow . ',' . $p->listRows)->select();
       
        if ($list) {
            foreach ($list as &$v) {
                $v['cover'] = $this->ftp_img_path . $v['cover'];
                //浏览次数

                //查询分类信息
                $catInfo = D('Cat')->getCatNameById($v['cat_id']);
                $v['cat_id'] = $catInfo['id'];
                $v['cat_name'] = $catInfo['name'];

                if ($v['pid']) {
                    $cat = M('Cat')->where('id in(' . $v['pid'] . ')')->select();
                    $str = '';
                    foreach ($cat as $cv) {
                        $str .= $cv['name'] . ',';
                    }
                    $v['pid'] = $str;
                }
            }
        }
        //回调函数，用于数据加工，如将用户id，替换成用户名称
        if (method_exists($this, '_tigger_list')) {
            $this->_tigger_list($list);
        }
        //分页跳转的时候保证查询条件
        foreach ($map as $key => $val) {
            if (!is_array($val)) {
                $p->parameter .= "$key=" . urlencode($val) . "&";
            }
        }

        //分页显示
        $page = $p->show();
        //列表排序显示
        $sortImg = $sort;                                 //排序图标
        $sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列';   //排序提示
        $sort = $sort == 'desc' ? 1 : 0;                  //排序方式
        //模板赋值显示
        $this->assign('list', $list);
        $this->assign('sort', $sort);
        $this->assign('order', $order);
        $this->assign('sortImg', $sortImg);
        $this->assign('sortType', $sortAlt);
        $this->assign("page", $page);

        $this->assign("search", $search);   //搜索类型
        $this->assign("values", $_POST['values']); //搜索输入框内容
        $this->assign("totalCount", $count);   //总条数
        $this->assign("numPerPage", $p->listRows);  //每页显多少条
        $this->assign("currentPage", $nowPage);   //当前页码
    }

    public function typeSelect() {
        //判断是否有类别id的传值,设置默认选中的选项
        if ($_REQUEST['pid']) {
            $id = $_REQUEST['pid'];
        } else {
            $id = '0';
        }

        $mm = M('Cat');
        //查询数据库表中所有类型 order by concat(path,id) 按照类别的层次进行查询
        $res = $mm->field('id,name,path')->order("concat(path,id)")->select();
        //定义存放类别信息的数组
        $ss[] = '全部';
        foreach ($res as $vo) {
            //分割查出的每条路径为数组
            $path = explode(",", $vo['path']);
            //通过数组元素的个数分别传入不同的类别名 达到级别的分级显示
            switch (count($path)) {
                case '1':
                    $vo['name'] = $vo['name'];
                    break;
                case '2':
                    $vo['name'] = $vo['name'];
                    break;
                case '3':
                    $vo['name'] = "---" . $vo['name'];
                    break;
            }
            //把类别名以及对应的类别id存进数组中
            $ss[$vo['id']] = $vo['name'];
        }
        //把所有类别信息的关联数组赋给模板
        $this->assign('myOptions', $ss);
        $this->assign('mySelect', $id); //设置默认选中的option的下标值id
    }

    //修改list数组
    public function _tigger_list(&$list) {
        foreach ($list as &$v) {
            //获取users表的操作对象
            // $ob = M("Users")->field('username,name')->find($v['uid']);
            $ob=D('Users')->get_user_info($v['uid']);
            $v['username'] = $ob['phone'];
            $v['name'] = $ob['name'];
            //评论数
            $ob2 = D('Comm')->where("mid={$v['id']}")->count();
            $v['plnum'] = $ob2;
            //所属栏目
            $cat = M("Cat");
            $cat_info = $cat->where('id=' . $v['pid'])->find();
            $v['cat'] = $cat_info['name'];
        }
    }

    //定义一个处理编辑器的上传内容
    public function doupload() {
        $res = array("err" => "", "msg" => ""); //定义一个响应信息
        import('ORG.Net.UploadFile');
        $upload = new UploadFile(); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->savePath = $this->upload_dir;
        //执行上传
        if ($upload->upload()) {
            $info = $upload->getUploadFileInfo();
            $tmp_file_name = $info[0]['savename'];
            //ftp上传路径
            $ftp_path = 'community/cover';
            //服务器的文件路径
            $aDestination_file[] = $ftp_path . '/' . $info[0]['savename'];
            //本地的的文件路径
            $aSource_file[] = $this->upload_dir . $tmp_file_name;
            $this->ftp_copy_files($aDestination_file, $aSource_file, 0, FTP_BINARY);
            unlink($this->upload_dir . $tmp_file_name);
            //添加图片信息
            //$res["msg"] = $this->upload_dir . $tmp_file_name;  //上传成功！
            $www = $this->_SERVER_LIST;
            $res["msg"] = $www[0]['WWW'] . '/' . $ftp_path . '/' . $tmp_file_name;
        } else {
            $res['err'] = $upload->getErrorMsg(); //失败
        }
        echo json_encode($res);
    }

    //发帖上传图片
    public function add_uploadpic() {

        if ($_POST['sessionid']) {
            session('[pause]');
            session_id($_POST['sessionid']);
            session('[start]');
        }
        if (!$_SESSION[C('USER_AUTH_KEY')]) {
            echo 1;
            die;
        }
        $sizeproportion = intval($_POST['sizeproportion']);
        if ($sizeproportion == 1) {
            $w = 750;
        } else if ($sizeproportion == 2) {
            $w = 900;
        } else if ($sizeproportion == 3) {
            $w = 200;
        }

        //执行上传
        $return = $this->uploadpic($w);
        echo $return;

        //}
    }

    //执行批量操作
    public function all_delete() {
        if ($_POST) {
            $id_str = substr($_POST['str'], 0, -1);
            $sql = 'update bbs_message set status=4 where id in(' . $id_str . ')';
            D()->query($sql);
            echo 2;
        } else {
            echo 1;
        }
    }

    //批量审核
    public function all_examine() {
        if ($_POST) {
            $id_str = substr($_POST['str'], 0, -1);
            $sql = 'update bbs_message set status=1,addtime=' . strtotime('-1 second') . ' where id in(' . $id_str . ')';
            D()->query($sql);
            echo 2;
        } else {
            echo 1;
        }
    }

    //批量取消审核
    public function re_all_examine() {
        if ($_POST) {
            $id_str = substr($_POST['str'], 0, -1);
            $sql = 'update bbs_message set status=3 where id in(' . $id_str . ')';
            $result = D()->query($sql);
            echo 2;
        } else {
            echo 1;
        }
    }

    //批量加精华
    public function all_jinghua() {
        if ($_POST) {
            $id_str = substr($_POST['str'], 0, -1);

            $sql = 'update bbs_message set isbest = 1 where id in(' . $id_str . ')';
            D()->query($sql);
            $message = M('Message')->where('status = 1 and id in(' . $id_str . ')')->select();
            if ($message) {
                foreach ($message as $v) {
                    //更新消息
                    $this->add_news_management($v['id'], $v['title']);
                }
            }
            echo 2;
        } else {
            echo 1;
        }
    }

    //批量取消精华
    public function re_all_jinghua() {
        if ($_POST) {
            $id_str = substr($_POST['str'], 0, -1);
            $sql = 'update bbs_message set  isbest = 0  where id in(' . $id_str . ')';
            D()->query($sql);
            echo 2;
        } else {
            echo 1;
        }
    }

    //批量驳回
    public function re_all_bohui() {
        if ($_POST) {
            $id_str = substr($_POST['str'], 0, -1);
            $sql = 'update bbs_message set  status = 5  where id in(' . $id_str . ')';
            D()->query($sql);
            echo 2;
        } else {
            echo 1;
        }
    }

    //批量取消审核
    public function global_config() {
        $sql = 'select * from bbs_global_config where id=1';
        $result = D()->query($sql);
        $this->assign('config', $result[0]['is_examine']);
        $this->display();
    }

    //修改帖子审核
    public function examine() {
        if ($_POST['examine']) {

            if ($_POST['examine'] == 'y') {
                //开启
                $tmp = 1;
            } else if ($_POST['examine'] == 'n') {
                //关闭
                $tmp = 0;
            }
            $sql = 'update bbs_global_config set is_examine=' . $tmp . ' where id=1';
            $result = D()->query($sql);
        }
    }

    public function swf_uploadpic() {
        //执行上传

//        $return = $this->uploadpic();
//        echo $return;

        //}
    }

    //图片上传显示裁剪
    public function uploadpic($w) {
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        $upload->maxSize = 3145728; // 设置附件上传大小
        $upload->allowExts = array('jpg', 'gif', 'bmp', 'png', 'jpeg'); // 设置附件上传类型
        $upload->savePath = $this->upload_dir; // 设置附件上传目录
        if (!$upload->upload()) {
            return $upload->getErrorMsg();
        } else {
            $info = $upload->getUploadFileInfo();
        }
        $picsrc = $info[0]['savename'];
        $path = $this->upload_dir;
        //去压缩
        $this->updateImage($picsrc, $path, "s_", $w);
        //删除最原始的上传图
        unlink($path . $picsrc);
        //返回压缩后的文件名
        return date('Ymd', time()) . '/s_' . $picsrc;
    }

    //图片缩放
    public function updateImage($picname, $path, $prix = "s_", $w) {
        //1. 定义获取基本信息
        $path = rtrim($path, "/"); //去除后面多余的"/"
        $info = getimagesize($path . "/" . $picname);  //获取图片文件的属性信息

        $width = $info[0]; //原图片的宽度
        $height = $info[1]; //原图片的高度
        //获取原来图片的长宽比例
        $h = intval($height / $width * $w);
        $sizeproportion = intval($_POST['sizeproportion']);
        if ($sizeproportion == 1) {
            if ($h < 500) {
                $h = 500;
            }
        } else if ($sizeproportion == 2) {
            if ($h < 500) {
                $h = 500;
                //$w = intval(500 / $height) * $width;
            }
        } else if ($sizeproportion == 3) {
            if ($h < 150) {
                $h = 150;
            }
        }

        $newim = imagecreateTrueColor($w, $h); //新图片源
        //根据原图片类型来创建图片源
        switch ($info[2]) {
            case 1: //gif格式
                $srcim = imageCreateFromgif($path . "/" . $picname);
                break;
            case 2: //jpeg格式
                $srcim = imageCreateFromjpeg($path . "/" . $picname);
                break;
            case 3: //png格式
                $srcim = imageCreateFrompng($path . "/" . $picname);
                break;
            case 6: //bmp格式
                $srcim = imageCreateFrompng($path . "/" . $picname);
                break;
            default :
                exit("无效的图片格式!");
                break;
        }

        //4. 执行缩放处理
        imagecopyresampled($newim, $srcim, 0, 0, 0, 0, $w, $h, $width, $height);

        //5. 输出保存绘画
        //header("Content-Type:".$info['mime']); //设置响应类型为图片格式
        //根据原图片类型来保存新图片
        switch ($info[2]) {
            case 1: //gif格式
                imagegif($newim, $path . "/" . $prix . $picname); //保存
                //imagegif($newim);//输出
                break;
            case 2: //jpeg格式
                imagejpeg($newim, $path . "/" . $prix . $picname);
                //imagejpeg($newim);
                break;
            case 3: //png格式
                imagepng($newim, $path . "/" . $prix . $picname);
                //imagepng($newim);
                break;
            case 6: //bmp格式
                imagebmp($newim, $path . "/" . $prix . $picname);
                break;
        }
        //ftp上传路径
        $ftp_path = '/community/' . date('Ymd', time()) . '/';
        //服务器的文件路径
        $aDestination_file[] = $ftp_path . '/' . $prix . $picname;
        //本地的的文件路径
        $aSource_file[] = $path . '/' . $prix . $picname;
        $this->ftp_copy_files($aDestination_file, $aSource_file, 0, FTP_BINARY);
        //删除裁剪前的图片
        unlink($path . "/" . $prix . $picname);
        //6. 销毁资源
        imageDestroy($newim);
        imageDestroy($srcim);
    }

    //接受裁剪数据
    public function cut_pic_size() {
        if ($_POST) {
            if ($_POST['pn'] != '' && $_POST['x'] != '' && $_POST['y'] != '' && $_POST['w'] != '' && $_POST['h'] != '') {
                header("Content-type:text/html;charset=utf-8");
                $pn = explode('/', $_POST['pn']);
                echo $this->cut_pic(end($pn), $this->upload_dir, $_POST['x'], $_POST['y'], $_POST['w'], $_POST['h']);
            }
        }
    }

    //根据点位坐标裁剪图片     (图片名称,图片路径,x坐标,y坐标,长度,宽度,前缀)
    public function cut_pic($picname, $path, $x, $y, $width, $height, $prix = "x_") {
        //去除后面多余的"/"
        $path = rtrim($path, "/");
        //获取图片文件的属性信息
        //$info = getimagesize($path . "/" . $picname);
        $ftp_yuancheng = 'http://img.news18a.com/community/' . date('Ymd', time()) . '/';
        $info = getimagesize($ftp_yuancheng . $picname);
        //新图片源
        $newim = imagecreateTrueColor($width, $height);
        //根据原图片类型来创建图片源
        switch ($info[2]) {
            case 1: //gif格式
                $srcim = imageCreateFromgif($ftp_yuancheng . $picname);
                break;
            case 2: //jpeg格式
                $srcim = imageCreateFromjpeg($ftp_yuancheng . $picname);
                break;
            case 3: //png格式
                $srcim = imageCreateFrompng($ftp_yuancheng . $picname);
                break;
            case 6: //bmp格式
                $srcim = imageCreateFrompng($ftp_yuancheng . $picname);
                break;
            default :
                exit("无效的图片格式!");
                break;
        }
        //执行裁剪
        imagecopyresampled($newim, $srcim, 0, 0, $x, $y, $width, $height, $width, $height);
        //保存图片
        switch ($info[2]) {
            case 1: //gif格式
                imagegif($newim, $path . "/" . $prix . $picname); //保存
                break;
            case 2: //jpeg格式
                imagejpeg($newim, $path . "/" . $prix . $picname);
                break;
            case 3: //png格式
                imagepng($newim, $path . "/" . $prix . $picname);
                break;
            case 6: //bmp格式
                imagebmp($newim, $path . "/" . $prix . $picname);
                break;
        }
        //释放资源
        imageDestroy($newim);
        imageDestroy($srcim);
        //ftp上传路径
        $ftp_path = '/community/' . date('Ymd', time()) . '/';
        //服务器的文件路径
        $aDestination_file[] = $ftp_path . $prix . $picname;
        //本地的的文件路径
        $aSource_file[] = $path . '/' . $prix . $picname;
        $this->ftp_copy_files($aDestination_file, $aSource_file, 0, FTP_BINARY);
        unlink($path . "/" . $picname);
        unlink($path . '/' . $prix . $picname);
        $save_path = date('Ymd', time()) . '/';
        return $save_path . $prix . $picname;
    }

    //新增数据添加方法
    public function data_add() {
        //var_dump($_POST);die;
        if ($_POST) {
            $x = $_POST['x'];
            $y = $_POST['y'];
            $width = $_POST['w'];
            $height = $_POST['h'];

            $x_2 = $_POST['x_2'];
            $y_2 = $_POST['y_2'];
            $width_2 = $_POST['w_2'];
            $height_2 = $_POST['h_2'];
            if ($x != '' && $y != '' && $width != '' && $height != '') {
                $path = $this->upload_dir;
                $picname = $_POST['showpicval'];
                $cut_pic = $this->cut_pic($picname, $path, intval($x), intval($y), intval($width), intval($height));
                $_POST['cover'] = $cut_pic;
            }
            if ($x_2 != '' && $y_2 != '' && $width_2 != '' && $height_2 != '') {
                $path = $this->upload_dir;
                $picname_2 = $_POST['showpicval_2'];
                $cut_pic = $this->cut_pic($picname_2, $path, intval($x_2), intval($y_2), intval($width_2), intval($height_2));
                $_POST['cover2'] = $cut_pic;
            }
            $_POST['status'] = $_POST['sstatus'];
            $_POST['uid'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
            $_POST['addtime'] = time();
            $model = D("Message");
            $return = $model->add($_POST);
//            echo $model->getLastSql();
//            die;
            if ($return) {
                $this->success(L('新增成功'));
            } else {
                $this->error(L('新增失败') . $model->getLastSql());
            }
        }
    }

    public function data_edit() {
        //var_dump($_POST);die;
        if ($_POST) {
            $_POST['status'] = $_POST['sstatus'];
            $_POST['cover2'] = $_POST['showpicval'];
            $video = '';
            $last = '';
            if ($_POST['pid']) {
                $pid = ',' . $_POST['pid'];
                $last = ',';
            }
            if ($_POST['video']) {
                $video = ',' . $_POST['video'];
                $last = ',';
            }

            $_POST['pid'] = $pid . $video . $last;
//            var_dump($_POST);die;
            $model = D("Message");
            $return = $model->save($_POST);
            if ($return) {
                if (($_POST['isbest'] == 1 || $_POST['ishot'] == 1 ) && $_POST['sstatus'] == 1) {
                    //更新消息
                    $this->add_news_management($_POST['id'], $_POST['title']);
                }
                $this->success(L('修改成功'));
            } else {
                $this->error(L('修改失败') . $model->getLastSql());
            }
        }
    }

    protected function ftp_copy_files($aDestination_file, $aSource_file, $serverindex, $ftp_mode) {
        if (!$aDestination_file || !$aSource_file) {
            return;
        }
        //global $_SERVER_LIST;
        $_SERVER_LIST = $this->_SERVER_LIST;
        if (isset($_SERVER_LIST[$serverindex]['FTP_CFG']) && is_array($_SERVER_LIST[$serverindex]['FTP_CFG']) && count($_SERVER_LIST[$serverindex]['FTP_CFG']) > 0) {
            $aFTP_CFG = $_SERVER_LIST[$serverindex]['FTP_CFG'];
            for ($i = 0; $i < count($aFTP_CFG); $i++) {
                $aFtp_server[] = $aFTP_CFG[$i]['FTP_SVR'];
                $aFtp_user_name[] = $aFTP_CFG[$i]['FTP_USER'];
                $aFtp_user_pass[] = $aFTP_CFG[$i]['FTP_PWD'];
                $aFtp_dir[] = $aFTP_CFG[$i]['FTP_DIR'];
            }
        } else {
            //如果没有配置ftp服务器信息，直接返回，不做分发处理
            return;
        }
        if (isset($aFtp_server) && count($aFtp_server) > 0) {
            for ($y = 0; $y < count($aFtp_server); $y++) {
                $ftp_server = $aFtp_server[$y];
                $ftp_user_name = $aFtp_user_name[$y];
                $ftp_user_pass = $aFtp_user_pass[$y];
                $ftp_dir = $aFtp_dir[$y];
                $conn_id = ftp_connect($ftp_server);
                $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
                if ((!$conn_id) || (!$login_result)) {
                    $this->errinfo($ftp_server . ":" . $ftp_user_name . ",连接FTP服务器出问题!");
                }
                //循环上传文件
                if (is_array($aDestination_file) && is_array($aSource_file) && count($aDestination_file) > 0 && count($aSource_file) > 0) {
                    for ($x = 0; $x < count($aDestination_file); $x++) {
                        $destination_file = $aDestination_file[$x];
                        $source_file = $aSource_file[$x];

                        //创建目录
                        $aPath = explode("/", $destination_file);
                        array_pop($aPath);
                        if (is_array($aPath) && count($aPath) > 0) {
                            $path = "";
                            foreach ($aPath as $key => $val) {
                                $path .= "/" . $val;
                                @ftp_mkdir($conn_id, $path);
                            }
                        }
                        //上传文件
                        $upload = ftp_put($conn_id, $destination_file, $source_file, $ftp_mode);
                        //unlink($source_file);
                        if (!$upload) {
                            $this->errinfo($ftp_server . ":" . $ftp_user_name . ",上传失败!");
                        }
                    }
                }
                ftp_close($conn_id);
            }
        }
    }

    private function errinfo($err) {
        die("<meta http-equiv='Content-Type' content='text/html; charset=utf-8'><font color='red'><b>系统错误:" . $err . "</b></font>");
    }

    //删除ftp服务器文件
    private function ftp_del_files($files, $serverindex) {

        $_SERVER_LIST = $this->_SERVER_LIST;

        if (isset($_SERVER_LIST[$serverindex]['FTP_CFG']) && is_array($_SERVER_LIST[$serverindex]['FTP_CFG']) && count($_SERVER_LIST[$serverindex]['FTP_CFG']) > 0) {
            $aFTP_CFG = $_SERVER_LIST[$serverindex]['FTP_CFG'];
            for ($i = 0; $i < count($aFTP_CFG); $i++) {
                $aFtp_server[] = $aFTP_CFG[$i]['FTP_SVR'];
                $aFtp_user_name[] = $aFTP_CFG[$i]['FTP_USER'];
                $aFtp_user_pass[] = $aFTP_CFG[$i]['FTP_PWD'];
                $aFtp_dir[] = $aFTP_CFG[$i]['FTP_DIR'];
            }
        }
        if (isset($aFtp_server) && count($aFtp_server) > 0) {
            for ($y = 0; $y < count($aFtp_server); $y++) {
                $ftp_server = $aFtp_server[$y];
                $ftp_user_name = $aFtp_user_name[$y];
                $ftp_user_pass = $aFtp_user_pass[$y];
                $ftp_dir = $aFtp_dir[$y];
                $conn_id = ftp_connect($ftp_server);
                $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
                if ((!$conn_id) || (!$login_result)) {
                    $this->errinfo("连接FTP服务器出问题!");
                }
                //循环删除文件
                if (is_array($files) && count($files) > 0 && count($files) > 0) {
                    for ($x = 0; $x < count($files); $x++) {
                        $tmp_file = $files[$x];
                        echo $tmp_file;
                        die;
                        ftp_delete($conn_id, $tmp_file);
                    }
                }
                ftp_close($conn_id);
            }
        }
    }

}
