<?php
/**
*	短信验证功能 使用模块(auto api 专题部分)
*	@way 分为POST GET方式发送
*	@param content String 内容
*	@param phone String 手机号
*	@return statusNo 状态码
*/


class sms {
	private $strReg = '';	//注册号(SN码)
	private $strPwd = '';	//密码

	function __construct($strReg='',$strPwd='')
	{	
		if(!empty($strReg) && !empty($strPwd)){
			$this->strReg = $strReg;   
			$this->strPwd = $strPwd;
		}else{
			$_SMS_CONF = array("strReg"=>"SDK-WKS-010-01124", "strPwd"=>"456401");
			$this->strReg = $_SMS_CONF['strReg'];
			$this->strPwd = $_SMS_CONF['strPwd'];
		}
		
	}

	// GET方式发送
	function getSend($url,$param)
	{
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url."?".$param);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 2);
		
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;	
	}

	// POST方式发送
	public function postSend($url,$param)
	{
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$param);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	// 编码转换并进行 url编码
	public function gbkToUtf8($str)
	{
		return rawurlencode(iconv('GB2312','UTF-8',$str));	
	}

	// 发送短信
	function Send($phone,$content,$ext='')
	{
		$strPhone = $phone;	//手机号码，多个手机号用半角逗号分开，最多10000个
		$strContent = $content;   //短信内容
		$strExt = $ext;	//扩展码
		$strStime = "";	//定时发送时间,时间格式yyyy-MM-dd HH:mm:ss,含有空格请转码
		$strRrid = "";	//唯一标识
		$strMsgfmt = ""; //内容编码

		$strSmsUrlArr = array("http://sdk2.entinfo.cn:8061/mdsmssend.ashx","http://sdk.entinfo.cn:8061/mdsmssend.ashx");
		$strKey = array_rand($strSmsUrlArr);
		$strSmsUrl = $strSmsUrlArr[$strKey];
		$strSmsParam = "sn=".$this->strReg."&pwd=".strtoupper(MD5($this->strReg.$this->strPwd))."&mobile=".$strPhone."&content=".$strContent."&ext=".$strExt."&stime=".$strStime."&rrid=".$strRrid."&msgfmt=".$strMsgfmt ;
		//echo $strSmsUrl.$strSmsParam;
		$strRes = $this->getSend($strSmsUrl,$strSmsParam);
		if(!$strRes){
			$strRes = $this->Send($strPhone,$strContent,$ext);
		}else{
			$status = $this->getStatus($strRes);
			if($status){
				$resQ = $this->logSms($strPhone,$strRes,urldecode($content));
				//var_dump($resQ);
				return $resQ;
			}else{
				$resQ = $this->logSms($strPhone,$strRes,urldecode($content));
				return $resQ;
			}
		}
	}

	// 查询余额
	public function Balance()
	{
		$strSmsUrl = "http://sdk.entinfo.cn:8060/webservice.asmx/balance";
		$strSmsParam = "sn=".$this->strReg."&pwd=".strtoupper(MD5($this->strReg.$this->strPwd));
		$xmlRes = $this -> postSend($strSmsUrl, $strSmsParam);
		$xmlArr = simplexml_load_string($xmlRes);
		return $xmlArr[0];
	}

	/* 提示信息
	*	@param $str String 返回值
	*	@return boolean true/false
	*/
	public function getStatus($str)
	{
		if(!$str)return false;
		$position = strpos($str,'-');
		return ($position === 0) ? false : true;
	}

	/**
	* 短信日志
	* @param String phoneNum
	* @param String number
	* @return resourse 
	*/
	public function logSms($phoneNum,$number,$content)
	{
        $_M_smslog = M('ina_smslog','cms_','DB_CONFIG2');
		$data = array('phonenum'=>$phoneNum, 'status'=>$number, 'content'=>$content, 'add_time'=>date('Y-m-d H:i:s'));
		$query = $_M_smslog->add($data);
		return $query;
	}
	
}
?>