<?php
class ViewnumAction extends CommonAction{

	function index(){
		$begin=date("Y-m-d",strtotime("-1 day"));
		$begintime=strtotime(date("$begin H:i:s"));
		// $sql = "SELECT scan FROM`bbs_message` where addtime>$begintime ORDER BY scan DESC limit 1";
		// echo $sql;die;
		// $q=M()->query($sql);
		$num=M('Message')->field('scan')->where("addtime>".$begintime." and status=1")->order('scan desc')->find();
		//echo $num;die;
		//echo M('Message')->getLastSql();die;
		$this->assign('num',$num['scan']);
		$this->display();
	}
	function add(){
		//echo"<pre>";print_r($_POST);die;
		unset($_POST['ajax']);
		$data=implode(',',$_POST);
		//echo"<pre>";print_r($_POST);die;
		$arr=array('num'=>$data);
		//print_r($data);die;
		$Model=M('view_num');
		$a=$Model->where('id=1')->save($arr);
		//echo $Model->getLastSql();die;
		if ($a) {
			 $this->success(L("添加成功"));
		}

	}
}
?>