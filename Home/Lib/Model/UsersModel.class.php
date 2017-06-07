<?php

//自定义资源管理类
class UsersModel extends Model {

    protected $_M_user_r;
    protected $_M_user_w;

    public function __construct() {
        $this->_M_user_r = M('app_user', 'cms_');
        $this->_M_user_w = M('app_user', 'cms_', 'DB_CONFIG2');

    }


    /**
     * 获取用户的详细信息
     * (与user Ucenter类中相似，后期合并)
     *
     * @param $uid
     * @return mixed
     */
    public function get_user_info($uid) {
        $uid = intval($uid);
        if ($uid) {
            $return = $this->_M_user_r->where("id=" . $uid)->find();
            if ($return) {
                $return['username'] = $return['phone'];
                //对查询结果进行转化
                $extend_info = $return['extend_info'];
                $extend_info_array = unserialize($extend_info);
                //简介
                $return['introduce'] = $extend_info_array['introduce'];
                //生日
                $return['birthday'] = $extend_info_array['birthday'];
                //兴趣
                $return['interest'] = $extend_info_array['interest'];
                //星座
                $return['constellation'] = $extend_info_array['constellation'];
                //性别
                $gender = $return['gender'];
                if ($gender === '男') {
                    $return['sex'] = 1;
                } elseif ($gender === '女') {
                    $return['sex'] = 2;
                } else {
                    $return['sex'] = '';
                }
                //处理用户头像
                $return['picture_path'] = $this->get_portrait($return['photo'], $return['sex']);
                $return['username'] = $return['name'] ? $return['name'] : $return['phone'];
            }
            return $return;
        }
    }

    //根据用户名获取用户信息
    public function get_user_by_name($name) {
        $name = trim($name);
        if ($name) {
            $return = $this->_M_user_r->where("phone='" . $name . "'")->find();
           // echo $this->_M_user_r->getLastSql();exit;
            if ($return) {
                $return['username'] = $return['phone'];
                //对查询结果进行转化
                $extend_info = $return['extend_info'];
                $extend_info_array = unserialize($extend_info);
                //简介
                $return['introduce'] = $extend_info_array['introduce'];
                //生日
                $return['birthday'] = $extend_info_array['birthday'];
                //兴趣
                $return['interest'] = $extend_info_array['interest'];
                //星座
                $return['constellation'] = $extend_info_array['constellation'];
                //性别
                $gender = $return['gender'];
                if ($gender === '男') {
                    $return['sex'] = 1;
                } elseif ($gender === '女') {
                    $return['sex'] = 2;
                } else {
                    $return['sex'] = '';
                }
                $return['username'] = $return['name'] ? $return['name'] : $return['phone'];
            }
            return $return;
        }
    }

    //根据用户名和密码获取用户信息
    public function get_user_by_nameandpass($name, $pass) {
        $name = trim($name);
        if ($name) {
            $return = $this->_M_user_r->where("phone=" . $name . " and passwd = '" . $pass . "'")->find();
            if ($return) {
                $return['username'] = $return['phone'];
                //对查询结果进行转化
                $extend_info = $return['extend_info'];
                $extend_info_array = unserialize($extend_info);
                //简介
                $return['introduce'] = $extend_info_array['introduce'];
                //生日
                $return['birthday'] = $extend_info_array['birthday'];
                //兴趣
                $return['interest'] = $extend_info_array['interest'];
                //星座
                $return['constellation'] = $extend_info_array['constellation'];
                //性别
                $gender = $return['gender'];
                if ($gender === '男') {
                    $return['sex'] = 1;
                } elseif ($gender === '女') {
                    $return['sex'] = 2;
                } else {
                    $return['sex'] = '';
                }
                $return['username'] = $return['name'] ? $return['name'] : $return['phone'];
            }
            return $return;
        }
    }

    public function get_user_by_where($where) {
        $name = trim($where);
        if ($name) {
            $return = $this->_M_user_r->where($where)->find();
           // echo $this->_M_user_r->getLastSql();die;
            if ($return) {
                $return['username'] = $return['phone'];
                //对查询结果进行转化
                $extend_info = $return['extend_info'];
                $extend_info_array = unserialize($extend_info);
                //简介
                $return['introduce'] = $extend_info_array['introduce'];
                //生日
                $return['birthday'] = $extend_info_array['birthday'];
                //兴趣
                $return['interest'] = $extend_info_array['interest'];
                //星座
                $return['constellation'] = $extend_info_array['constellation'];
                //性别
                $gender = $return['gender'];
                if ($gender === '男') {
                    $return['sex'] = 1;
                } elseif ($gender === '女') {
                    $return['sex'] = 2;
                } else {
                    $return['sex'] = '';
                }
                $return['username'] = $return['name'] ? $return['name'] : $return['phone'];
            }
            return $return;
        }
    }

    public function get_user_by_id($id){
        $uid = intval($id);
        if ($uid) {

            $messageInfo = M('Message')->where("id=" . $uid)->find();
            $return = $this->_M_user_r->where("id=" . $messageInfo['uid'])->find();
            if ($return) {
                $return['username'] = $return['phone'];
                //对查询结果进行转化
                $extend_info = $return['extend_info'];
                $extend_info_array = unserialize($extend_info);

                //简介
                $return['introduce'] = $extend_info_array['introduce'];
                //生日
                $return['birthday'] = $extend_info_array['birthday'];
                //兴趣
                $return['interest'] = $extend_info_array['interest'];
                //星座
                $return['constellation'] = $extend_info_array['constellation'];
                //性别
                $gender = $return['gender'];
                if ($gender === '男') {
                    $return['sex'] = 1;
                } elseif ($gender === '女') {
                    $return['sex'] = 2;
                } else {
                    $return['sex'] = '';
                }
                $return['username'] = $return['name'] ? $return['name'] : $return['phone'];
            }
            return $return;
        }
    }

    //获取头像
    public function get_portrait($picture, $sex)
    {
        if ($picture) {
            //$ftp_img_path
            // $picture_path = $this->ftp_img_path . $picture;
            $picture_path = $picture;
        } else {
            if ($sex == 1) {
                $picture_path = 'http://img.news18a.com/community/image/man.png';
            } else {
                $picture_path = 'http://img.news18a.com/community/image/women.png';
            }
        }
        return $picture_path;
    }

    /**
     * 更新用户的身份状态 1：社区用户 0：非社区用户
     * @param $data
     * @return bool 成功返回 1, 失败返回 false
     */
    public function update_user_status($userInfo){
        if(is_array($userInfo) && $userInfo){
            $data = array();
            $data['id'] = $userInfo['id'];
            $data['is_shequ'] = 1;
            $info = $this->_M_user_w->save($data);
            return $info;
        }else{
            return '请传入有效参数~';
        }

    }

    //插入用户数据
    public function set_user_info($data) {
       // print_r($data);die;
        $id = $this->_M_user_w->add($data);
        //echo $this->_M_user_w->getLastSql();exit;
        return $id;
    }

    //更新
    /**
     * @param $data
     * @return bool
     */
    public function update_user_info($data) {
        $id = $this->_M_user_w->save($data);
        //echo $this->_M_user_w->getLastSql();exit;
        return $id;
    }

    public function get_counts($where) {
        if ($where) {
            $return = $this->_M_user_r->where($where)->count();
            return $return;
        }
    }

}
