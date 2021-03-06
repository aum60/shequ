<?php

/**
 * 公共Action
 *
 */
class CommonAction extends Action {

    public function _initialize() {
        //模拟用户登录信息
        //$_SESSION['user'] = array('id'=>1,'username'=>'admin');

        /*
          if($this->getActionName()=='User' &&  (ACTION_NAME=='login' || ACTION_NAME=='dologin') ){
          //不验证
          }else{
          //验证登录
          if(!($_SESSION['user']['id']>0)){
          $this->redirect('User/login');
          return;
          }
          }// */
        //echo session_id();die;
        //var_dump($_SESSION[C('USER_AUTH_KEY')]);die;


        if ($_POST['sessionid']) {
            session('[pause]');
            session_id($_POST['sessionid']);
            session('[start]');
        }
        //判断用户是否登录
        if (empty($_SESSION[C('USER_AUTH_KEY')])) {
            $this->redirect('Public/login');
            return;
        }

        //权限过滤
        if ( in_array($_SESSION[C('USER_AUTH_KEY')]['username'],C('SUPERMAN'))) {
            $mname = strtolower(MODULE_NAME); //获取模块名
            $aname = strtolower(ACTION_NAME); //获取方法名
            $nodelist = $_SESSION[C('USER_AUTH_KEY')]['nodelist']; //获取权限列表

            if (empty($nodelist[$mname]) || !in_array($aname, $nodelist[$mname])) {
                $this->error("抱歉！没有操作权限！");
                return;
            }
        }
        //
        //
        //
        //
        /*
          //dump($_SESSION[C('USER_AUTH_KEY')]['nodelist']);

          //权限过滤
          $mname = strtolower(MODULE_NAME); //获取模块名
          $aname = strtolower(ACTION_NAME); //获取方法名
          $nodelist = $_SESSION[C('USER_AUTH_KEY')]['nodelist']; //获取权限列表
          if(empty($nodelist[$mname]) || !in_array($aname,$nodelist[$mname])){
          //$this->error("抱歉！没有操作权限！");
          //return;
          }
         */
        //若当前用户不是admin和root用户，并且访问的是客户信息，只允许客户访问自己的。
        //$userlist=C("USERLIST");
        //if(!in_array($_SESSION["user"]["name"],$userlist) && MODULE_NAME=="Customer"){
        //	$_REQUEST["user_id"]=$_SESSION["user"]["id"];
        //}
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

    public function add() {

        //通过调用类型Action(CatAction)中的typeSelect()方法
        //R("Cat/typeSelect");
        //==========================================
        //把资源的类别信息赋值到模板中
        $session_id = session_id();
        $this->assign('session_id', $session_id);
        $time = time();
        $token = md5('unique_salt' . time());
        $this->assign('time', $time);
        $this->assign('token', $token);
        //查询分类
        $cat = D('Cat')->select();
        $this->assign('cat', $cat);
        $this->display('add');
    }

    public function insert() {
        $model = D($this->getActionName());
        unset($_POST [$model->getPk()]);

        if (false === $model->create()) {
            $this->error($model->getError());
        }
        //保存当前数据对象
        if ($result = $model->add()) { //保存成功
            // 回调接口
            if (method_exists($this, '_tigger_insert')) {
                $model->id = $result;
                $this->_tigger_insert($model);
            }
            //成功提示
            $this->success(L('新增成功'));
        } else {
            //失败提示
            $this->error(L('新增失败') . $model->getLastSql());
        }
    }

    public function edit() {
        $model = D($this->getActionName());
        $id = $_REQUEST[$model->getPk()];
        $vo = $model->where('id='.$id)->find();
        $this->assign('vo', $vo);
        $session_id = session_id();
        $this->assign('session_id', $session_id);
        $time = time();
        $token = md5('unique_salt' . time());
        $this->assign('time', $time);
        $this->assign('token', $token);
        //查询分类
        $cat = D('Cat')->select();
        $this->assign('cat', $cat);
        $this->display('edit');
    }

    public function update() {
        $model = D($this->getActionName());
        /*
          //用于事件处理
          if(in_array($this->getActionName(),$this->eventlist)){
          //保留一下原始数据
          $_POST["jsoninfo"]=$model->where("id=".$_POST['id'])->find();
          $_POST["jsoninfo"]["actionname"]=$this->getActionName();
          }
         */

        if (false === $model->create()) {
            $this->error($model->getError());
        }
        // 更新数据
        if (false !== $model->save()) {
            // 回调接口
            if (method_exists($this, '_tigger_update')) {
                $this->_tigger_update($model);
            }
            //成功提示
            $this->success(L('更新成功'));
        } else {
            //错误提示
            $this->error(L('更新失败'));
        }
    }

    public function delete() {
        //删除指定记录
        $model = D($this->getActionName());
        if (!empty($model)) {
            $pk = $model->getPk();
            $id = $_REQUEST[$pk];
            if (isset($id)) {

                //用于事件处理
                //if(in_array($this->getActionName(),$this->eventlist)){
                //保留一下原始数据
                //	$_POST["jsoninfo"]=$model->where("id=".$id)->find();
                //	$_POST["jsoninfo"]["actionname"]=$this->getActionName();
                //}

                $condition = array($pk => array('in', explode(',', $id)));
                if (false !== $model->where($condition)->delete()) {
                    $this->success(L('删除成功'));
                } else {
                    $this->error(L('删除失败'));
                }
            } else {
                $this->error('非法操作');
            }
        }
    }

    //删除状态
    public function delete_tag() {
        //删除指定记录
        $model = M($this->getActionName());
        if (!empty($model)) {
            $pk = $model->getPk();
            $id = $_REQUEST[$pk];
            if (isset($id)) {

                //用于事件处理
                //if(in_array($this->getActionName(),$this->eventlist)){
                //保留一下原始数据
                //	$_POST["jsoninfo"]=$model->where("id=".$id)->find();
                //	$_POST["jsoninfo"]["actionname"]=$this->getActionName();
                //}

                $condition = array($pk => array('in', explode(',', $id)));
                if (false !== $model->where($condition)->setField('is_delete', 1)) {
                    $this->success(L('删除成功'));
                } else {
                    $this->error(L('删除失败'));
                }
            } else {
                $this->error('非法操作');
            }
        }
    }

    /**
     * 根据表单生成查询条件
     * 进行列表过滤
     * @param string $name 数据对象名称
     * @return HashMap
     */
    protected function _search($name = '') {
        //生成查询条件
        if (empty($name)) {
            $name = $this->getActionName();
        }
        $model = D($name);
        $map = array();
        foreach ($model->getDbFields() as $key => $val) {
            if (substr($key, 0, 1) == '_')
                continue;
            if (isset($_REQUEST[$val]) && $_REQUEST[$val] != '') {
                $map[$val] = $_REQUEST[$val];
            }
        }
        return $map;
    }

    /**
     * 根据表单生成查询条件
     * 进行列表过滤
     * @param Model $model 数据对象
     * @param HashMap $map 过滤条件
     * @param string $sortBy 排序
     * @param boolean $asc 是否正序
     */
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
        //==========================================
        //把资源的类别信息赋值到模板中
        //==========================================
        //通过调用类型Action(CatAction)中的typeSelect()方法
        R("Cat/typeSelect");
        //==========================================
        //把资源的类别信息赋值到模板中
        //==========================================
    }

    //添加事件信息方法；参数：1：事件类型（参考事件action类属性），2：实际内容
    protected function addEvent($type, $content, $jsoninfo = "") {
        //获取当前登录者信息
        $data['cat_id'] = $type; //事件类型（参考事件action类属性）
        $data["content"] = $content;
        $data["jsoninfo"] = $jsoninfo;
        $data["source"] = $_SESSION['user']['id'];
        $data["is_look"] = 0;
        $data["add_time"] = time();
        //执行添加
        M("Event")->add($data);
    }

    public function add_news_management($message_id, $message_title) {
        $umodel = M('Users');
        $user_info = $umodel->where('id=' . $message_id['uid'])->find();
        $mmodel = M('Message');
        $message_info = $mmodel->where('id=' . $message_id)->find();
        $message_type_con = '系统消息';
        $message_ins = "恭喜你,你发布的帖子《" . $message_title . "》被管理员加精华，继续努力吧！";
        $time = time();
        $status = 0;
        $array = array(
            'userid' => $message_info['uid'],
            'act_userid' => 0,
            'message_id' => $message_id,
            'message_type' => $message_type_con, //系统消息
            'message' => $message_ins,
            'status' => $status,
            'create_time' => $time
        );
        $mmod = M('NewsManagement');
        $mmod->add($array);
        
    }

}

?>
