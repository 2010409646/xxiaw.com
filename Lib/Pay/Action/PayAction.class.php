<?php
namespace Pay\Action;
use Common\Action\UserAction;
class PayAction extends UserAction
{
	//微信支付
	
		public function _initialize()
    {
        //引入WxPayPubHelper
        Vendor('WxPayPubHelper.WxPayPubHelper');
		Vendor('Alipayapp.AopSdk');
		
    }
	public function pay(){
		$array["action"] = strtolower(ACTION_NAME);
		$userid=cookie(_userid);
		$userid=cookie_decode($userid);
	
		$array=M('User')->where(array('userid'=>$userid))->field('password',true)->find();
		$array["list_menu"] = F("_gxlnews/listtree");
		$array["action"]='pay';
		
		$this->assign("menus", get_menus());
		$this->assign("memberinfo", $array);
		$this->assign($array);
		$this->display("./Public/user/" . C("user_theme") . "/home/user_pay.html");
	}
	public function payapp(){
		
		$aop = new \AopClient;
		$aop->gatewayUrl = "https://openapi.alipay.com/gateway.do";
		$aop->appId = "2017090708602418";
		$aop->rsaPrivateKey = 'MIIEpAIBAAKCAQEApWtqAK06soygYc/K2bhpme2z22kDsrulqLE5TZON8iCFpzN6kEOuowJ+kn44LdRVjmLecv+zfMm8ljuFx6bSWG2Z6wrY+xfsUr8YsUVpKXERlSgsea3OWEe18AM+7i6Ve+25Q/CwrqAdavhVG/gEY3lKv+pl/h3ZrNNWYV9OTv6W9dDDeZeHk369xkIvP//VqE5Hr0Pv40e3vVITqUDtbeQT1T//8eN77ve/INjv2w0FSVxOZaNO1emeiWzu8/+vt+E6BCy4yxIvC+va6OyMXo5j10cVRONtE5YW2W7neHJfkFp3bNkIVlGrfb/npXGJmq4e4hOTIZNlv917+U0u0wIDAQABAoIBABNjKHRV2ThN9QohsXOdAntw+ZBwmWdcSMkhpEasUYmcOC3lgarg09n1E+KVen4ckb5zZgDyaRXqCvlMlpxUt/h3N//tMIsVPbRhA0LbkLyzrMzffX7xWOrN1MwBhWGjAhAZR4pn7j05NNlxq3/wrIsADzu4/CUxWG7CAjC9W880JTRk4UoiOMyWUSbcbap3Mu2KYrBcn7npj25Whx/tLga9aYxBa2imfv1gaBkut6Cxh85AuS8Jyvb2Mafld9+Is/8j/DkKto9/Rw1JyLRcCtSCRt4rw9nv64/gS91RtW1G0Uccn1XspERbCV8kNBptPnyrym3m/9mg8S0BPHSVI9ECgYEA1k1Zv+fwf0P7N0vDAEsKq0NCLeZ+VC52YFxk1tXfBGImnm9uG9gv4isPM+UAA08xgkGejWxjEI7M2+QtxkOmwZNRXhCO8g0jorjfzcYr4Q3zUK/g5cypCQMLrAF5AM3GAoDppd688X2hkWl5SDNBuqoc7mULVqctmYkJBjzBBPsCgYEAxZsp7zzhOiTQwd1l3oETyCZHQIVeyQyYxUSIIqW2KugYxTtTlddyWr6QAZlGUOtoCycvqGKBM43UyE70LSelXoiMrko9kZvGZtgAfIQ3DCaKf2zE31LGH2nmg5YmZzeUg8p8gIwk4bhZQW9PvzAEYjCmSIdiGXY0grm7g7UYZgkCgYALg3Jb9hkcrUlU6jQa0u1K0D1A/A4zdZ+Ug8JDLJBjyuYqQvBWfKHt88RIVHhQtTOCvQXIsVcNL67f7X1sFnxiEAkiFZ+ob35HoskbZBc9ayN0ZU6e6gT23/wDjLy0h1mpDsX+zF24V7iTeGg0sdRJNBSD1lfqmua/RfZ/KEpyewKBgQCvYApTnUB3Df2IUSn706ru06ohBT0eSeO8EBqSRWfrpJl3UjPYpKGFD+NWx+W0I3jvjROq6eGpE5NpQ0lKWglWYPIaLSF/fTUUSVgFKoKAciQw+yOu4BOeBarj1fq3WIiifq8Il1iUS7xLarLoB4Gcc3jgnebemh34d0aImczRoQKBgQCmGGmyPztaGPYold9FcdIPI1N/SCAaPcBc15tWrthoER/SPvyAWozT7DK2e0PXKdciTCATd+ujx69Row88t4ClvXFWqdMJlZAm7on40nw4svD9xgAxLXeJp3QF5n9iy644jLlHLs42norVM4jr8b8vjTWhB34Ol+na3xUOEvGWTg==';
		$aop->format = "json";
		$aop->charset = "UTF-8";
		$aop->signType = "RSA";
		$aop->alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAoh+s1rHdMF0i6N7BCGcUggEVzvktlFrGRwMoetPbVBg5EIgzQ7tBE87o9RrLIhFNZqQEE1GZc3gObWJe4F/8PjaZtbzdmxbFP2LIEfE3Xj//WfipqckFQAoLQIVu+j7k6i6lnEXMZcU69RMS1CY+wTAX/XvTxx/5uAuubxh/rYmY3JH4aFzVFFjbWGyQ0vq92vZ8+BZzQB38ye+W/3wQjiDLWFv06zRx/8sOpm8YEUYOX9Lw0/YUzT7EtLnMSj5SjBS4MTvaGfYZTBfTxthLSNX2gqOXI/OnzPEiAiKdgZlE0lYPuUm1vcwROkGKf3o9tEum2Rpgzo2KZkFMLXul4wIDAQAB';
		//实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.trade.app.pay
		$request = new \AlipayTradeAppPayRequest();
		//SDK已经封装掉了公共参数，这里只需要传入业务参数
		$bizcontent = "{\"body\":\"我是测试数据\"," 
						. "\"subject\": \"App支付测试\","
						. "\"out_trade_no\": \"20170125test01\","
						. "\"timeout_express\": \"30m\"," 
						. "\"total_amount\": \"0.01\","
						. "\"product_code\":\"QUICK_MSECURITY_PAY\""
						. "}";
		$request->setNotifyUrl("http://api.lrts.net");
		$request->setBizContent($bizcontent);
		//这里和普通的接口调用不同，使用的是sdkExecute
		$response = $aop->sdkExecute($request);
		
		//htmlspecialchars是为了输出到页面时防止被浏览器将关键参数html转义，实际打印到日志以及http传输不会有这个问题
		echo htmlspecialchars($response);//就是orderString 可以直接给客户端请求，无需再做处理。
		
		
	}
	//支付宝异步
	public function notify_url(){
		$alipay_config=$this->config();
		
		//计算得出通知验证结果
		$alipayNotify = new \Org\Util\AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyNotify();
		$arr=$_POST;
		 $myfile = fopen("W.txt", "w");
		fwrite($myfile,implode('||',$arr));
		/*$is = fopen("is.txt", "w");
		fwrite($is,$verify_result);	
		 */

if($verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代
		
		
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
	
    //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
	
	//商户订单号

	$out_trade_no = $_POST['out_trade_no'];

	//支付宝交易号

	$trade_no = $_POST['trade_no'];

	//交易状态
	$trade_status = $_POST['trade_status'];

	$buyer_email=$_POST['buyer_email'];
    if($_POST['trade_status'] == 'TRADE_FINISHED') {
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
				
		//注意：
		//该种交易状态只在两种情况下出现
		//1、开通了普通即时到账，买家付款成功后。
		//2、开通了高级即时到账，从该笔交易成功时间算起，过了签约时的可退款时限（如：三个月以内可退款、一年以内可退款等）后。

        //调试用，写文本函数记录程序运行情况是否正常
        //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
		
    }
    else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
				
		//注意：
		//该种交易状态只在一种情况下出现——开通了高级即时到账，买家付款成功后。

        //调试用，写文本函数记录程序运行情况是否正常
        //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
	
		
		//充值金额
		$rss=M('order');
		
		$where['order_code']=$_POST['out_trade_no'];
		$where['order_type']=0;
		$find=$rss->where($where)->find();
		
		
		
		if($find){
			
			//支付宝交易号
		$data["order_code"] = $_POST['trade_no'];
		//交易状态
		$data["order_type"]=1;
		$data["order_endtime"]=$_POST['notify_time'];
		
		//买家支付宝账号
		$data["order_pay_code"]= $trade_no;
		
		$rss->where($where)->save($data);
		}
	
    }

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
        
	echo "success";		//请不要修改或删除
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    echo "fail";

    //调试用，写文本函数记录程序运行情况是否正常
    //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
}
		
		
		
	}
	public function chong(){
		header("Content-type:text/html;charset=utf-8");
		$username=cookie(_username);
		$username=cookie_decode($username);
		$userid=cookie(_userid);
		$userid=cookie_decode($userid);
		
		
		if(!$userid){
			$this->error('用户未登录',U('User/center-login'),3);
		}
		
		$data["order_type_id"]=I('post.links_id');
		$data["order_uid"]=$userid;
		$data["order_money"]=I('post.price');
		$data["order_code"]=$userid.time();
		$data["order_modtype"]='links';
		$data["order_addtime"]=time();
		$data["order_type"]=0;
		$data["order_pay_type"]=1;
		$rs=M('order')->data($data)->add();;
		
		$product['product_code']=$userid.time();
		$product["product_addtime"]=time();
		$product["product_mod"]='links';
		$product["product_uid"]=M('Links')->where(array('links_id'=>$data["order_type_id"]))->getfield('links_uid');
		$product["product_pid"]=I('post.links_id');
		$product["product_type"]=0;
		$product["product_refund_type"]=0;
		M('product')->data($product)->add();
	
		$alipay_config['partner']=C('partner');
		$alipay_config['seller_id']=$alipay_config['partner'];
		$alipay_config['key']=C("paykey");
		$alipay_config['notify_url'] =C('payurl'). "/pay-pay-notify_url.html";
// 页面跳转同步通知页面路径 需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
		$alipay_config['return_url'] = C('payurl')."/pay-pay-return_url.html";
//签名方式
		$alipay_config['sign_type']    = strtoupper('MD5');

//字符编码格式 目前支持 gbk 或 utf-8
		$alipay_config['input_charset']= strtolower('utf-8');

//ca证书路径地址，用于curl中ssl校验
//请保证cacert.pem文件在当前文件夹目录中
		$alipay_config['cacert']    = getcwd().'\\Lib\Pay\Action\Lib\cacert.pem';
		

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		$alipay_config['transport']    = 'http';

// 支付类型 ，无需修改
		$alipay_config['payment_type'] = "1";
		
// 产品类型，无需修改
		$alipay_config['service'] = "create_direct_pay_by_user";

		$alipay_config['anti_phishing_key'] = "";

		$alipay_config['exter_invoke_ip'] = "";

	

        $out_trade_no =$data["order_code"];
        $subject = C('payname');
        $total_fee = $data["order_money"];
        //商品描述，可空
        $body = $_POST['WIDbody'];
		$parameter = array(
		"service"       => $alipay_config['service'],
		"partner"       => $alipay_config['partner'],
		"seller_id"  => $alipay_config['seller_id'],
		"payment_type"	=> $alipay_config['payment_type'],
		"notify_url"	=> $alipay_config['notify_url'],
		"return_url"	=> $alipay_config['return_url'],
		
		"anti_phishing_key"=>$alipay_config['anti_phishing_key'],
		"exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"body"	=> $body,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))	
);	
$alipaySubmit = new \Org\Util\AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
echo $html_text;
	
	}
	
	//同步跳转接口
	public function return_url(){
		$username=cookie(_username);
		$userid=cookie(_userid);
		$userid=cookie_decode($userid);
		$username=cookie_decode($username);
		$alipay_config['partner']=C('partner');
		$alipay_config['seller_id']=$alipay_config['partner'];
		$alipay_config['key']=C("paykey");
		

//签名方式
		$alipay_config['sign_type']    = strtoupper('MD5');

//字符编码格式 目前支持 gbk 或 utf-8
		$alipay_config['input_charset']= strtolower('utf-8');

//ca证书路径地址，用于curl中ssl校验
//请保证cacert.pem文件在当前文件夹目录中
		$alipay_config['cacert']    = getcwd().'\\Lib\Pay\Action\Lib\cacert.pem';
		

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		$alipay_config['transport']    = 'http';

// 支付类型 ，无需修改
		$alipay_config['payment_type'] = "1";
		
// 产品类型，无需修改
		$alipay_config['service'] = "create_direct_pay_by_user";

		$alipay_config['anti_phishing_key'] = "";

		$alipay_config['exter_invoke_ip'] = "";
		$alipayNotify = new \Org\Util\AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyReturn();
		
		
		
		
		
		
		
		if($verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表
		//充值金额
		
		$rs=M('User');
		
		//充值金额
		$rss=M('money');
		
		
		$data["money"]=$_GET['total_fee'];
		//商户订单号
		$data["number"] = $_GET['out_trade_no'];
		//支付宝交易号
		$data["jy_number"] = $_GET['trade_no'];
		//交易状态
		$data["status"]= $_GET['trade_status'];
		$data["time"]=$_GET['notify_time'];
		
			//买家支付宝账号
		$data["seller_id"]= $_GET['seller_id'];
		//买家支付宝邮箱
		$data["seller_email"]= $_GET['seller_email'];
		$order=$rss->where(array('number'=>$data["number"],'status'=>'no'))->find();
		
		
		if($order){
			
		//处理订单更新状态
		$fu=$rss->where(array('number'=>$data["number"]))->save($data);
			
		if($order['pay_type']==3){
		$rs->where(array('userid'=>$find["userid"]))->setField('vip',1);
		}else{
		$amount=$rs->where(array("userid"=>$order['userid']))->getfield('amount');
		$datavip["amount"]=$ji["amount"]+$_GET['total_fee'];	
		$rs->data($datavip)->where(array("userid"=>$order['userid']))->save();	
		}
			
		}
		
		
		
		
		
    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
    }
    else {
      echo "trade_status=".$_GET['trade_status'];
    }
		
		$this->display("./Public/user/" . C("user_theme") . "/home/user_pay-list.html");

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    
    
	$this->display("./Public/user/" . C("user_theme") . "/home/user_pay-list.html");
}
		
		
	}
	public function config(){
		
		$userid=cookie(_username);
		$username=cookie_decode($userid);
		$alipay_config['partner']=C('partner');
		$alipay_config['seller_id']=$alipay_config['partner'];
		$alipay_config['key']=C("paykey");
		$alipay_config['notify_url'] =C('payurl'). "/pay-pay-notify_url.html";
// 页面跳转同步通知页面路径 需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
		$alipay_config['return_url'] = C('payurl')."/pay-pay-return_url.html";

//签名方式
		$alipay_config['sign_type']    = strtoupper('MD5');

//字符编码格式 目前支持 gbk 或 utf-8
		$alipay_config['input_charset']= strtolower('utf-8');

//ca证书路径地址，用于curl中ssl校验
//请保证cacert.pem文件在当前文件夹目录中
		$alipay_config['cacert']    = getcwd().'\\Lib\Pay\Action\Lib\cacert.pem';
		

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		$alipay_config['transport']    = 'http';

// 支付类型 ，无需修改
		$alipay_config['payment_type'] = "1";
		
// 产品类型，无需修改
		$alipay_config['service'] = "create_direct_pay_by_user";

		$alipay_config['anti_phishing_key'] = "";

		$alipay_config['exter_invoke_ip'] = "";
 return $alipay_config;
		
	}
	
	
	
	
	
	
	
	
	public function pays(){
		
		$_POST = I("post.", "", "strip_tags,htmlspecialchars");
		$username=cookie(_username);
		$username=cookie_decode($username);
		$userid=cookie(_userid);
		$userid=cookie_decode($userid);
		if(!$userid){
			$this->error('用户未登录',U('User/User-login'),3);
		}
		$is=M('User')->where(array('userid'=>$userid))->getfield('vip');
		
		if($is){
			$this->error('您的会员已经开通了请勿重复开通,到期后可以继续开通偶！',U('User/software-vip'),3);
			
		}
		switch ($_POST['vip_id'])
			{
			case 1:
			 $money=50;
			 $money_name='月会员开通';
			 $endtime=strtotime(date('Y-m-d H:i:s',time()).' +1 month');
			  break;  
			case 2:
			 $money=120;
			  $money_name='季会员开通';
			  $endtime=strtotime(date('Y-m-d H:i:s',time()).' +3 month');
			  break;
			case 3:
			 $money=200;
			  $money_name='年会员开通';
			   $endtime=strtotime(date('Y-m-d H:i:s',time()).' +12 month');
			  break;
			default:
			 $money_name='SVIP会员开通';
			 $endtime=11062424364;
			 $money=999;
			}
		$data["username"]=$username;
		$data["userid"]=$userid;
		$data["money"]=$money;
		$data["number"]=$username.time();
		$data["payname"]=$money_name;
		$data["time"]=time();
		$data["endtime"]=$endtime;
		$data["status"]='no';
		$data["pay_type"]=3;
	
		$rs=M('Money');
		$rs->create($data);
		$rs->add();
		$alipay_config['partner']=C('partner');
		$alipay_config['seller_id']=$alipay_config['partner'];
		$alipay_config['key']=C("paykey");
		$alipay_config['notify_url'] =C('payurl'). "/pay-pay-notify_url.html";
// 页面跳转同步通知页面路径 需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
		$alipay_config['return_url'] = C('payurl')."/pay-pay-return_url.html";
//签名方式
		$alipay_config['sign_type']    = strtoupper('MD5');

//字符编码格式 目前支持 gbk 或 utf-8
		$alipay_config['input_charset']= strtolower('utf-8');

//ca证书路径地址，用于curl中ssl校验
//请保证cacert.pem文件在当前文件夹目录中
		$alipay_config['cacert']    = getcwd().'\\Lib\User\Action\Lib\cacert.pem';
		

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		$alipay_config['transport']    = 'http';

// 支付类型 ，无需修改
		$alipay_config['payment_type'] = "1";
		
// 产品类型，无需修改
		$alipay_config['service'] = "create_direct_pay_by_user";

		$alipay_config['anti_phishing_key'] = "";

		$alipay_config['exter_invoke_ip'] = "";

	

        $out_trade_no =$username.time();
        $subject = $money_name;
        $total_fee = $money;
        //商品描述，可空
        $body ='会员权限开通';
		$parameter = array(
		"service"       => $alipay_config['service'],
		"partner"       => $alipay_config['partner'],
		"seller_id"  => $alipay_config['seller_id'],
		"payment_type"	=> $alipay_config['payment_type'],
		"notify_url"	=> $alipay_config['notify_url'],
		"return_url"	=> $alipay_config['return_url'],
		
		"anti_phishing_key"=>$alipay_config['anti_phishing_key'],
		"exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"body"	=> $body,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))	
		);	
		
		$alipaySubmit = new \Org\Util\AlipaySubmit($alipay_config);

		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
	
		echo $html_text;
		
		
		
	}
	
	
	
	
	
	
	
	
	  //生成二维码
	public function weixin()
    {
		
        //使用统一支付接口
        $unifiedOrder = new \UnifiedOrder_pub();
        //设置统一支付接口参数
        //   $subject = C('payname');$total_fee = $data["money"];
		$price=I('post.price');
        $unifiedOrder->setParameter("body",C('payname'));//商品描述
        //自定义订单号，此处仅作举例
        $timeStamp = time();
		$userid = cookie('_userid');
		$userid = cookie_decode($userid);
        $out_trade_no ="$timeStamp".rand(3000,10000);
        $unifiedOrder->setParameter("out_trade_no",$out_trade_no);//商户订单号 
        $unifiedOrder->setParameter("total_fee",$price*100);//总金额
        $unifiedOrder->setParameter("notify_url",C('site_url').'/Pay/Pay/weixin_notify');//通知地址 
		
		
        $unifiedOrder->setParameter("trade_type","NATIVE");//交易类型
        //非必填参数，商户可根据实际情况选填
        //$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号  
        //$unifiedOrder->setParameter("device_info","XXXX");//设备号 
        //$unifiedOrder->setParameter("attach","XXXX");//附加数据 
        //$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
        //$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间 
//         $unifiedOrder->setParameter("goods_tag","");//商品标记 
//         $unifiedOrder->setParameter("openid","19405");//用户标识
        //$unifiedOrder->setParameter("product_id","XXXX");//商品ID
        //获取统一支付接口结果
		
        $unifiedOrderResult = $unifiedOrder->getResult();
	
//         var_dump($unifiedOrder);
        //商户根据实际情况设置相应的处理流程
        if ($unifiedOrderResult["return_code"] == "FAIL") 
        {
            //商户自行增加处理流程
            echo "通信出错：".$unifiedOrderResult['return_msg']."<br>";
        }
        elseif($unifiedOrderResult["result_code"] == "FAIL")
        {
            //商户自行增加处理流程
            echo "错误代码：".$unifiedOrderResult['err_code']."<br>";
            echo "错误代码描述：".$unifiedOrderResult['err_code_des']."<br>";
        }
        elseif($unifiedOrderResult["code_url"] != NULL)
        {
            //从统一支付接口获取到code_url
            $code_url = $unifiedOrderResult["code_url"];
            //商户自行增加处理流程
            //......
        }
		
		$username=cookie(_username);
		$username=cookie_decode($username);
		$data["username"]=$username;
		$data["userid"]=$userid;
		$data["money"]=I('post.price');
		$data["number"]=$out_trade_no;
		$data["payname"]=C('payname');
		$data["time"]=time();
		$data["pay_type"]=2;
		$data["status"]='no';
		$rs=M('Money');
		
		$rs->add($data);
		
        $this->assign('out_trade_no',$out_trade_no);
        $this->assign('price',$price);
		$this->assign('time',time());
		$this->assign('code_url',$code_url);
        $this->assign('unifiedOrderResult',$unifiedOrderResult);
       
        $this->display('./Public/user/'. C("default_user") . '/Tpl/user_weixin.html');
    }
//异步通知url，商户根据实际开发过程设定
	public function weixin_notify() {
	    //使用通用通知接口
		header("Content-type:text/html;charset=utf-8");
		$userid = cookie('_userid');
		$userid = cookie_decode($userid);
	    $notify = new \Notify_pub();
	    //存储微信的回调
		
		$xml = $GLOBALS['HTTP_RAW_POST_DATA'];

		$notify->saveData($xml);
	    if($notify->checkSign() == FALSE){
	        $notify->setReturnParameter("return_code", "FAIL");//返回状态码
	        $notify->setReturnParameter("return_msg", "签名失败");//返回信息
	    }else{
	        $notify->setReturnParameter("return_code", "SUCCESS");//设置返回码
	    }
			if($notify->checkSign() == TRUE){
				
				if ($notify->data["return_code"] == "FAIL") {
	            //此处应该更新一下订单状态，商户自行增删操作
	            //$this->log_result($log_name, "【return_code返回值为fail】:\n".$xml."\n");
	            //更新订单数据【通信出错】设为无效订单
	            
	            // 返回状态码
	            $notify->setReturnParameter("return_code","FAIL");
	            // 返回信息
	            $notify->setReturnParameter("return_msg","签名失败");
	        } else if($notify->data["result_code"] == "FAIL"){
	            //此处应该更新一下订单状态，商户自行增删操作
	            //$this->log_result($log_name, "【result_code返回值为fail】:\n".$xml."\n");
	            //更新订单数据【通信出错】设为无效订单
	            
	            // 返回状态码
	            $notify->setReturnParameter("return_code","FAIL");
	            // 返回信息
	            $notify->setReturnParameter("return_msg","签名失败");
	        } else{
				
				
				$notify->setReturnParameter("return_code","SUCCESS");//设置返回码
				
				
				$order_id         = $notify->data['out_trade_no'];
				
				
	            //微信交易号
	            $transaction_id   = $notify->data['transaction_id'];
	            
	            //openid
	            $openid   = $notify->data['openid'];
	            $return_code=$notify->data['return_code'];
	            //交易金额，单位分
	            $price            = $notify->data['total_fee'];
	            
	            //交易完成时间
	            $finish_time      = $notify->data['time_end'];
	            $finish_time      = strtotime($finish_time);
				
	            
				$ui=M('recharge_record')->where('record_number='.$order_id)->find();
				
				if($ui['trade_status']!='SUCCESS'){
				$data["username"]=$username;
				$data["userid"]=$userid;
				$data["jy_number"]=$transaction_id;
				$data["endtime"]=$finish_time;
				$data["seller_email"]=$openid;
				$data["status"]='off';
				$rs=M('Money');
				$ui=$rs->where(array('number'=>$order_id))->find();
				M('User')->where(array('userid'=>$ui['userid']))->setInc('amount',$price);
				$rs->where(array('number'=>$order_id))->save($data);
				
				
				
				
				}else{
					
					
					$notify->setReturnParameter("return_code","SUCCESS");
				}
				
	    
			}
			} else {
	        // 返回状态码
	        $notify->setReturnParameter("return_code","FAIL");
	        // 返回信息
	        $notify->setReturnParameter("return_msg","签名失败");
	    }
			
		
		
	  
	   
	 

	
	}

    //查询订单
    public function orderQuery()
    {  
//         out_trade_no='+$('out_trade_no').value,
        //退款的订单号
    	if (!isset($_POST["out_trade_no"]))
    	{
    		$out_trade_no =1000;
    	}else{
    	    $out_trade_no = I('get.out_trade_no');
    		//使用订单查询接口
    		$orderQuery = new \OrderQuery_pub();
    		//设置必填参数
    		//appid已填,商户无需重复填写
    		//mch_id已填,商户无需重复填写
    		//noncestr已填,商户无需重复填写
    		//sign已填,商户无需重复填写
    		$orderQuery->setParameter("out_trade_no",$out_trade_no);//商户订单号 
    		//非必填参数，商户可根据实际情况选填
    		//$orderQuery->setParameter("sub_mch_id","XXXX");//子商户号  
    		//$orderQuery->setParameter("transaction_id","XXXX");//微信订单号
    		
    		//获取订单查询结果
    		$orderQueryResult = $orderQuery->getResult();
    		
    		//商户根据实际情况设置相应的处理流程,此处仅作举例
    		if ($orderQueryResult["return_code"] == "FAIL") {
    			$this->error($out_trade_no);
    		}
    		elseif($orderQueryResult["result_code"] == "FAIL"){
//     			$this->ajaxReturn('','支付失败！',0);
    			$this->error($out_trade_no);
    		}
    		else{
    		     $i=$_SESSION['i'];
    		     $i--;
    		     $_SESSION['i'] = $i;
    		      //判断交易状态
    		      switch ($orderQueryResult["trade_state"])
    		      {
    		          case SUCCESS: 
    		              $this->success("支付成功！");
    		              break;
    		          case REFUND:
    		              $this->error("超时关闭订单：".$i);
    		              break;
    		          case NOTPAY:
    		              $this->error("超时关闭订单：".$i);
//     		              $this->ajaxReturn($orderQueryResult["trade_state"], "支付成功", 1);
    		              break;
    		          case CLOSED:
    		              $this->error("超时关闭订单：".$i);
    		              break;
    		          case PAYERROR:
    		              $this->error("支付失败".$orderQueryResult["trade_state"]);
    		              break;
    		          default:
    		              $this->error("未知失败".$orderQueryResult["trade_state"]);
    		              break;
    		      }
    		     }	
    	}
    }
	
	
	
	
}


