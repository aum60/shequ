<?php

session_start();

//自定义用户操作模块Action类

class UsersAction extends Action {

    //加载资源浏览页
    public function index() {
        if ($_SESSION[C('USER_AUTH_KEY')]) {
            $this->redirect('Index/index');
        } else {

            $this->display('index');
        }
    }

    //定义数据添加的方法
    public function insert() {
        if ($_POST) {

            if ($_POST['ina_yzm'] == $_SESSION['mobile_vcode']) {
                $info = '';
                $status = 0;
                if (!trim($_POST['username'])) {
                    $info = '用户名不能为空';
                    $status = 1;
                }
                if (!trim($_POST['userpass'])) {
                    $info = '密码不能为空';
                    $status = 1;
                }
                $tmp = array();
                $salt = $this->GetRandStr(4);

                $tmp['salt'] = $salt;
                $tmp['phone'] = trim($_POST['username']);
                $tmp['passwd'] = md5(md5(trim($_POST['userpass'])).$salt);
                $tmp['add_time'] = date('Y-m-d H:i:s', time());
                $tmp['gender'] = '男';
                $tmp['user_from'] = 'shequ';
                $is_insert = D('Users')->get_user_by_name(addslashes(trim($_POST['username'])));
                if (!$is_insert['id']) {
                    $result = D('Users')->set_user_info($tmp);
                    if ($result) {
                        $userInfo = D('Users')->get_user_info($result);
                        $_SESSION[C("USER_AUTH_KEY")] = $userInfo;
                        $info = '注册成功';
                        $status = 0;
                    } else {
                        $info = '注册失败';
                        $status = 1;
                    }
                } else {
                    $info = '注册用户已存在';
                    $status = 1;
                }
            } else {
                $info = '验证码错误';
                $status = 3;
            }
            $array = array();
            $array['info'] = $info;
            $array['status'] = $status;
            echo json_encode($array);
        }
    }

    //用户登陆
    //登陆验证
    public function dologin() {
        if ($_POST) {
            $info = '';
            $status = 0;
            if (trim($_POST['username'])) {
                $info = '用户名不能为空';
                $status = 1;
            }
            if (trim($_POST['userpass'])) {
                $info = '密码不能为空';
                $status = 1;
            }
            $auto_login = $_POST['auto_login'];
            //只根据用户名查询
            $tmp_info = D('Users')->get_user_by_name(addslashes(trim($_POST['username'])));
            if ($tmp_info) {
                //根据用户名和密码查询
                if ($tmp_info['passwd'] == md5(md5(trim($_POST['userpass'])).$tmp_info['salt'])) {

                    //注册session
                    /* 这里看起来很奇怪 但是有不敢动 */
                    $_SESSION[C('USER_AUTH_KEY')] = $tmp_info;
                    $info = '登录成功';
                    $status = 0;
                    //如果是新用户或者其他平台用登录，改为社区身份
                    if(!$tmp_info['is_shequ']){
                        $changeStatus = D('Users')->update_user_status($tmp_info);
                    }

                    if ($auto_login) {
                        //注册cookie
                        setcookie('auto_login', addslashes(trim($_POST['username'])) . '|' . addslashes(trim($_POST['userpass'])), time() + 3600 * 24 * 30, '/');
                    } else {
                        //删除cookie
                        setcookie('auto_login', '', time() - 3600, '/');
                    }
                } else {
                    $info = '密码错误';
                    $status = 1;
                }
            } else {
                $info = '账号不存在';
                $status = 2;
            }


            $array = array();
            $array['info'] = $info;
            $array['status'] = $status;
            echo json_encode($array);
        }
    }

    public function loginout() {
        //注销session
        $_SESSION[C('USER_AUTH_KEY')] = '';
        //session_destroy();
        $this->redirect("Users/login");
    }

    //加载登陆页面
    public function login() {
        $refer = $_SERVER['HTTP_REFERER'];
        if ($_GET['from'] == 'add') {
            $refer = 'http://' . $this->_server('HTTP_HOST') . __APP__ . '/Index/add';
        } else {
            if ($refer) {
                $ext_array = array('Usersretrieve_password', 'Usersretrieve_password', 'Userslogin', 'Usersindex', 'Ucentereuserinfo');
                $refer_array = explode('/', $refer);
                $slince_array = array_slice($refer_array, -2, 2);
                $slince_str = $slince_array[0] . $slince_array[1];
                if (in_array($slince_str, $ext_array)) {//以上页面跳转到首页
                    $refer = 'http://' . $this->_server('HTTP_HOST') . __APP__ . '/Index/index';
                }
            } else {
                $refer = 'http://' . $this->_server('HTTP_HOST') . __APP__ . '/Index/index';
            }
        }
//        echo $refer;
        $this->assign('refer', $refer);
        if ($_SESSION[C('USER_AUTH_KEY')]) {
            $this->redirect('Ucenter/index');
        } else {
            if ($_COOKIE['auto_login']) {
                $auto_login_array = explode('|', $_COOKIE['auto_login']);
                $this->assign('auto_login', $auto_login_array);
                $this->assign('is_checked', 1);
            }
            $type = $_GET['type'];
            if ($type) {
                import('ORG.ThinkSDK.ThinkOauth');
                $sns = ThinkOauth::getInstance($type);
//                echo $sns->getRequestCodeURL();die;
//                //跳转到授权页面
                redirect($sns->getRequestCodeURL());
            }
            $this->display('login');
        }
    }

    //定义显示查询用户提醒模块的方法
    public function remind() {
        $this->display();
    }

    //获取跳转链接
    public function jumpurl() {
        if ($_SERVER["REQUEST_URI"]) {
            $even_url = $_SERVER["REQUEST_URI"];
        } else {
            $even_url = $_SERVER['HTTP_HOST'];
        }
        $_SESSION['even_url'] = $even_url;
    }

    //发送验证码
    public function get_Sms() {
        //if ($this->_server('HTTP_HOST') == 'local.new_edu.com' || $this->_server('HTTP_HOST') == 'shequ.news18a.com' || $this->_server('HTTP_HOST') == 'play.news18a.com') {
            if ($_POST) {
                //查询手机是否已经注册了
                $phone_info = D('Users')->get_user_by_name(addslashes(trim($_POST['phone'])));
                if ($_POST['type'] == 'zhaohui') {//找回密码
                    if (empty($phone_info)) {
                        echo 3; //还未注册
                    } else {

                        if ($this->isMobile($_POST['phone'])) {
                            if ($_COOKIE['zh_yzm']) {
                                echo 222;
                            } else {
                                $vcode = rand(1000, 9999);
                                import("ORG.Util.Sms");
                                $sms = new sms();
                                $content = '验证码为：' . $vcode . '【网通社】';
                                $sms->Send($_POST['phone'], $content);
                                $_SESSION['mobile_vcode'] = $vcode;
                                setcookie('zh_yzm', '1', time() + 60, '/');
                                echo 1;
                            }
                        } else {
                            echo 2;
                        }
                    }
                } else {//注册账号
                    if ($phone_info) {
                        echo 3; //已经注册
                    } else {

                        if ($this->isMobile($_POST['phone'])) {
                            if ($_COOKIE['zc_yzm']) {
                                echo 222;
                            } else {
                                $vcode = rand(1000, 9999);
                                import("ORG.Util.Sms");
                                $sms = new sms();
                                $content = '验证码为：' . $vcode . '【网通社】';
                                $sms->Send($_POST['phone'], $content);
                                $_SESSION['mobile_vcode'] = $vcode;
                                setcookie('zc_yzm', '1', time() + 60, '/');
                                echo 1;
                            }
                        } else {
                            echo 2;
                        }
                    }
                }
            }
        //}
    }

    //验证手机号码
    private function isMobile($mobile) {
        $return = preg_match("/1[34578]{1}\d{9}$/", $mobile);
        return $return;
    }

    //找回密码
    public function retrieve_password() {
        if ($_POST) {
            $mobel_num = addslashes(trim($_POST['mobel_num']));
            //根据用户名查找用户信息
            $info = D('Users')->get_user_by_name($mobel_num);
            if ($info) {
                $vcode = $_POST['vcode']; //获取验证码
                if ($_SESSION['mobile_vcode'] == $vcode) {
                    $_SESSION['mobel_num'] = $mobel_num; //重置标识
                    echo 1;
                } else {
                    echo 3;
                }
            } else {
                echo 2;
            }
            die;
        }
        $this->display();
    }

    //重置密码
    public function reset_password() {
        if ($_SESSION['mobel_num']) {
            if ($_POST) {
                if ($_POST['password1'] == $_POST['password2'] && $_POST['password1'] != '' && $_SESSION['mobel_num'] != '') {
                    $info = D('Users')->get_user_by_name($_SESSION['mobel_num']);
                    $tmp_array = array();
                    $tmp_array['id'] = $info['id'];
                    $yan = $this->GetRandStr(4);
                    $tmp_array['salt'] = $yan;
                    $tmp_array['passwd'] = md5(md5(trim($_POST['password1'])).$yan);
                    $res = D('Users')->update_user_info($tmp_array);
                    if ($res >= 0) {
                        unset($_SESSION['mobel_num']);
                        unset($_SESSION['mobile_vcode']);
                        echo 1;
                    } else {
                        echo 2;
                    }
                } else {
                    echo 3;
                }
                die;
            }
            $this->display();
        }
    }

    //协议
    public function agreement() {
        $this->display();
    }

    //获取四位随机数
    protected function GetRandStr($len) {
        $chars = array(
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
            "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
            "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
            "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
            "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
            "3", "4", "5", "6", "7", "8", "9"
        );
        $charsLen = count($chars) - 1;
        shuffle($chars);
        $output = "";
        for ($i = 0; $i < $len; $i++) {
            $output .= $chars[mt_rand(0, $charsLen)];
        }
        return $output;
    }

}
