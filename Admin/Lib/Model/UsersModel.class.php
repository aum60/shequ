<?php

//自定义资源管理类

class UsersModel extends Model{
    protected $_M_user_w;

    public function __construct() {
        $this->_M_user_w = M('app_user', 'cms_', 'DB_CONFIG2');

    }
    //设置数据表的字段
    protected $fields = array(
        "id","username","userpass","name","sex","age","email","class","picture","level","point","addtime","introduce","_pk"=>"id","_autoinc"=>true
    );

    //设置数据的自动处理功能 
    protected $_auto = array(
        array("addtime","time",1,"function"),//设置添加时间用函数time()
        array("userpass","mypass",1,"callback"),
    );
    protected function mypass(){
        return md5($_POST['userpass']);
    }

    protected $_validate = array(
        array("username","","用户名已存在！",0,"unique",1),
    );
    public function get_user_info($uid) {
        $uid = intval($uid);
        if ($uid) {
            $return = $this->_M_user_w->where("id=" . $uid)->find();
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
           //echo"<pre>"; print_r($return);die;
            return $return;
        }
    }

    public function get_user_by_where($where) {
        $name = trim($where);
        if ($name) {
            $return = $this->_M_user_w->where($where)->select();
           //echo $this->_M_user_w->getLastSql();die;
          //  print_r($return);die;
            if ($return) {
                foreach ($return as &$value) {
                  
                
                    $value['username'] = $value['phone'];
                    //对查询结果进行转化
                    $extend_info = $value['extend_info'];
                    $extend_info_array = unserialize($extend_info);
                    //简介
                    $value['introduce'] = $extend_info_array['introduce'];
                    //生日
                    $value['birthday'] = $extend_info_array['birthday'];
                    //兴趣
                    $value['interest'] = $extend_info_array['interest'];
                    //星座
                    $value['constellation'] = $extend_info_array['constellation'];
                    //性别
                    $gender = $value['gender'];
                    if ($gender === '男') {
                        $value['sex'] = 1;
                    } elseif ($gender === '女') {
                        $value['sex'] = 2;
                    } else {
                        $value['sex'] = '';
                    }
                    $value['username'] = $value['name'] ? $value['name'] : $value['phone'];
                }
            }
            //print_r($return);die;
            return $return;
        }
    }
    public function get_data_count($where){
            $return = $this->_M_user_w->where($where)->count();
            return $return;

    }
   public function get_user_by_where_limit($where,$limit) {
    
        
            $return = $this->_M_user_w->where($where)->limit($limit)->select();

           //echo $this->_M_user_w->getLastSql();
          //  print_r($return);die;
            if ($return) {
                foreach ($return as &$value) {
                  
                
                    $value['username'] = $value['phone'];
                    //对查询结果进行转化
                    $extend_info = $value['extend_info'];
                    $extend_info_array = unserialize($extend_info);
                    //简介
                    $value['introduce'] = $extend_info_array['introduce'];
                    //生日
                    $value['birthday'] = $extend_info_array['birthday'];
                    //兴趣
                    $value['interest'] = $extend_info_array['interest'];
                    //星座
                    $value['constellation'] = $extend_info_array['constellation'];
                    //性别
                    $gender = $value['gender'];
                    if ($gender === '男') {
                        $value['sex'] = 1;
                    } elseif ($gender === '女') {
                        $value['sex'] = 2;
                    } else {
                        $value['sex'] = '';
                    }
                    $value['username'] = $value['name'] ? $value['name'] : $value['phone'];
                }
            }
            //print_r($return);die;
            return $return;
        
    }


    public function select_all_user(){
        return $this->_M_user_w->select();
    }


}
