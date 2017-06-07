<?php

class UsersAction extends CommonAction {

    protected $ftp_img_path = 'http://img.news18a.com/community/';

    //添加搜索方法
    public function _filter(&$map) {
        //判断是否有搜索条件
        if (!empty($_REQUEST['username'])) {
            $list = M("Users")->field('id')->where(array('username' => array('like', "%{$_REQUEST['username']}%")))->select();
            //$list = M("Users")->field('id')->where("username like '%" . $_REQUEST['username'] . "%' or `name` like '%" . $_REQUEST['username'] . "%'")->select();
            $uid = array();
            foreach ($list as $vo) {
                $uid[] = $vo['id'];
            }
            if (count($uid) > 0) {
                $map['uid'] = array('in', $uid);
            }
        }
    }

    public function index() {
        //列表过滤器，生成查询Map对象 $map 是用来封装搜索条件的 _search()方法是封装搜索条件的方法
        $map = $this->_search();
        if (!intval($map['pid'])) {
            unset($map['pid']);
        }
        if (!intval($map['status'])) {
            unset($map['status']);
        }
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
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
        $this->display();
        return;
    }

    protected function _list($model, $map = array(), $sortBy = '', $asc = false) {

        //排序字段 默认为主键名
        if (!empty($_REQUEST['_order'])) {
            $order = $_REQUEST['_order'];
        } else {
            $order = !empty($sortBy) ? $sortBy : $model->getPk();
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
                $v['picture_path'] = $this->ftp_img_path . $v['picture'];
            }
        }
        //echo $model->getLastSql();
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

    //修改list数组
    public function _tigger_list(&$list) {
        foreach ($list as &$v) {
            if ($v['is_gag'] == 1) {
                $v['is_gag'] = '<span style="color:red;">已禁言</span>';
            } else {
                $v['is_gag'] = '未禁言';
            }
        }
    }

    //显示添加用户的页面
    public function adduser() {
        $this->assign("tid", $_GET['tid']);
        $this->display();
    }

    //执行用户的添加
    //重写父类中的方法
    public function insert() {
        // dump($_POST);
        //die();

        import("ORG.Net.UploadFile"); //导入文件上传类 执行文件上传
        $upload = new UploadFile();
        $upload->maxSize = 3145728;
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');
        $upload->savePath = "./Public/Uploads/users/{$_POST['username']}/";
        if (!$upload->upload()) {
            $this->error($upload->getErrorMsg());
        } else {
            $info = $upload->getUploadFileInfo();
        }
        //实例化表对象
        $model = D("Users");
        if (false === $model->create()) {
            unlink("./Public/Uploads/users/{$_POST['username']}/{$info[0]['savename']}");

            $this->error($model->getError());
        }
        $model->picture = $info[0]['savename'];
        $id = $model->add();


        //判断数据是否添加成功
        if ($id) {
            $this->success(L("添加成功"));
        } else {
            unlink("./Public/Uploads/users/{$_POST['username']}/{$info[0]['savename']}");

            $this->error(L("添加失败"));
        }
    }

    public function detail() {
        $model = D("Users");

        $where['id'] = array("eq", $_GET['id']);
        $list = $model->where($where)->select();
        $this->assign("list", $list);
        $this->display();
    }

    public function update() {
        //实例化表对象
        $model = D("Users");
        $id = $_POST['id'];

        if (false === $model->create()) {
            $this->error($model->getError());
        }
        $r = $model->where("id='$id'")->select();
        $model->picture = $r[0]['picture'];
        //判断数据是否修改成功
        if ($model->save()) {

            $this->success(L("修改成功"));
        } else {
            $this->error("修改失败" . $model->getLastSql());
        }
    }

    public function delete() {
        //删除指定记录
        $model = D($this->getActionName());
        if (!empty($model)) {
            $pk = $model->getPk();
            $id = $_REQUEST[$pk];
            $where['id'] = $id;
            $list = $model->where($where)->select();
            if (isset($id)) {
                $condition = array($pk => array('in', explode(',', $id)));
                if (false !== $model->where($condition)->delete()) {
                    if ($list[0]['picture'] != '1.jpg') {
                        unlink("./Public/Uploads/users/{$_POST['username']}/{$list[0]['picture']}");
                    }
                    //删除用户和角色关系表
                    $model1 = M("userrole");
                    $model1->where("uid='$id'")->delete();
                    $this->success(L("删除成功"));
                    //删除用户上传头像和个人相册
                    unlink("./Public/Uploads/users/{$_POST['username']}");
                } else {
                    $this->error(L('删除失败'));
                }
            } else {
                $this->error('非法操作');
            }
        }
    }

    //禁言
    public function all_gag() {
        if ($_POST) {
            $id_str = substr($_POST['str'], 0, -1);
            $sql = 'update bbs_users set is_gag=1 where id in(' . $id_str . ')';
            $result = D()->query($sql);
            echo 2;
        } else {
            echo 1;
        }
    }

    //取消禁言
    public function re_all_gag() {
        if ($_POST) {
            $id_str = substr($_POST['str'], 0, -1);
            $sql = 'update bbs_users set is_gag=0 where id in(' . $id_str . ')';
            $result = D()->query($sql);
            echo 2;
        } else {
            echo 1;
        }
    }

    //批量清除头像
    public function all_examine() {
        if ($_POST) {
            $id_str = substr($_POST['str'], 0, -1);
            $sql = 'update bbs_users set picture="" where id in(' . $id_str . ')';
            D()->query($sql);
            echo 2;
        } else {
            echo 1;
        }
    }

}
