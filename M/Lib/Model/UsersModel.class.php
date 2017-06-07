<?php

//自定义资源管理类
class UsersModel extends Model {

    protected $_M_user_r;

    public function __construct() {
        $this->_M_user_r = M('app_user', 'cms_');
    }

    //获取用户信息
    public function getUser($where) {

        $return = $this->_M_user_r->where($where)->find();
        if ($return) {
            //对查询结果进行转化
            $extend_info = $return['extend_info'];
            $extend_info_array = unserialize($extend_info);

            //简介
            $return['introduce'] = ( ($extend_info_array['introduce'] === "这个人很懒，什么都没有留下~") || ($extend_info_array['introduce'] == '') ) ? '爱生活，爱极趣，围绕极趣生活享受极致体验。' : $extend_info_array['introduce'];
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
            $return['username'] = $return['name'] ? $return['name'] : substr_replace($return['phone'],'****',3,4);
        }
        return $return;
    }

    public function getUsers($where){
        $return = $this->_M_user_r->where($where)->select();
        if ($return) {
            foreach ($return as $key=>$val){
                //对查询结果进行转化
                $extend_info = $val['extend_info'];
                $extend_info_array = unserialize($extend_info);

                //简介
                $val['introduce'] = $extend_info_array['introduce'];
                //生日
                $val['birthday'] = $extend_info_array['birthday'];
                //兴趣
                $val['interest'] = $extend_info_array['interest'];
                //星座
                $val['constellation'] = $extend_info_array['constellation'];
                //性别
                if ($val['gender'] === '男') {
                    $return['sex'] = 1;
                } elseif ($val['gender'] === '女') {
                    $val['sex'] = 2;
                } else {
                    $val['sex'] = '';
                }
                $val['username'] = $val['name'] ? $val['name'] : $val['phone'];
            }
        }
        return $return;
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

}