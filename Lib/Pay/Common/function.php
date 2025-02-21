<?php
function random($length, $chars = "0123456789")
{
	$hash = "";
	$max = strlen($chars) - 1;

	for ($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}

	return $hash;
}
function md5Sign($prestr, $key) {
	$prestr = $prestr . $key;
	return md5($prestr);
}

/**
 * 验证签名
 * @param $prestr 需要签名的字符串
 * @param $sign 签名结果
 * @param $key 私钥
 * return 签名结果
 */
function md5Verify($prestr, $sign, $key) {
	$prestr = $prestr . $key;
	$mysgin = md5($prestr);

	if($mysgin == $sign) {
		return true;
	}
	else {
		return false;
	}
}
function createLinkstring($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$key."=".$val."&";
	}
	//去掉最后一个&字符
	$arg = substr($arg,0,count($arg)-2);
	
	//如果存在转义字符，那么去掉转义
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
	
	return $arg;
}
/**
 * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串，并对字符串做urlencode编码
 * @param $para 需要拼接的数组
 * return 拼接完成以后的字符串
 */
function createLinkstringUrlencode($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$key."=".urlencode($val)."&";
	}
	//去掉最后一个&字符
	$arg = substr($arg,0,count($arg)-2);
	
	//如果存在转义字符，那么去掉转义
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
	
	return $arg;
}
/**
 * 除去数组中的空值和签名参数
 * @param $para 签名参数组
 * return 去掉空值与签名参数后的新签名参数组
 */
function paraFilter($para) {
	$para_filter = array();
	while (list ($key, $val) = each ($para)) {
		if($key == "sign" || $key == "sign_type" || $val == "")continue;
		else	$para_filter[$key] = $para[$key];
	}
	return $para_filter;
}
/**
 * 对数组排序
 * @param $para 排序前的数组
 * return 排序后的数组
 */
function argSort($para) {
	ksort($para);
	reset($para);
	return $para;
}
/**
 * 写日志，方便测试（看网站需求，也可以改成把记录存入数据库）
 * 注意：服务器需要开通fopen配置
 * @param $word 要写入日志里的文本内容 默认值：空值
 */
function logResult($word='') {
	$fp = fopen("log.txt","a");
	flock($fp, LOCK_EX) ;
	fwrite($fp,"执行日期：".strftime("%Y%m%d%H%M%S",time())."\n".$word."\n");
	flock($fp, LOCK_UN);
	fclose($fp);
}

/**
 * 远程获取数据，POST模式
 * 注意：
 * 1.使用Crul需要修改服务器中php.ini文件的设置，找到php_curl.dll去掉前面的";"就行了
 * 2.文件夹中cacert.pem是SSL证书请保证其路径有效，目前默认路径是：getcwd().'\\cacert.pem'
 * @param $url 指定URL完整路径地址
 * @param $cacert_url 指定当前工作目录绝对路径
 * @param $para 请求的数据
 * @param $input_charset 编码格式。默认值：空值
 * return 远程输出的数据
 */
function getHttpResponsePOST($url, $cacert_url, $para, $input_charset = '') {

	if (trim($input_charset) != '') {
		$url = $url."_input_charset=".$input_charset;
	}
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
	curl_setopt($curl, CURLOPT_CAINFO,$cacert_url);//证书地址
	curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
	curl_setopt($curl,CURLOPT_POST,true); // post传输数据
	curl_setopt($curl,CURLOPT_POSTFIELDS,$para);// post传输数据
	$responseText = curl_exec($curl);
	//var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
	curl_close($curl);
	
	return $responseText;
}

/**
 * 远程获取数据，GET模式
 * 注意：
 * 1.使用Crul需要修改服务器中php.ini文件的设置，找到php_curl.dll去掉前面的";"就行了
 * 2.文件夹中cacert.pem是SSL证书请保证其路径有效，目前默认路径是：getcwd().'\\cacert.pem'
 * @param $url 指定URL完整路径地址
 * @param $cacert_url 指定当前工作目录绝对路径
 * return 远程输出的数据
 */
function getHttpResponseGET($url,$cacert_url) {
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
	curl_setopt($curl, CURLOPT_CAINFO,$cacert_url);//证书地址
	$responseText = curl_exec($curl);
	//var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
	curl_close($curl);
	
	return $responseText;
}

/**
 * 实现多种字符编码方式
 * @param $input 需要编码的字符串
 * @param $_output_charset 输出的编码格式
 * @param $_input_charset 输入的编码格式
 * return 编码后的字符串
 */
function charsetEncode($input,$_output_charset ,$_input_charset) {
	$output = "";
	if(!isset($_output_charset) )$_output_charset  = $_input_charset;
	if($_input_charset == $_output_charset || $input ==null ) {
		$output = $input;
	} elseif (function_exists("mb_convert_encoding")) {
		$output = mb_convert_encoding($input,$_output_charset,$_input_charset);
	} elseif(function_exists("iconv")) {
		$output = iconv($_input_charset,$_output_charset,$input);
	} else die("sorry, you have no libs support for charset change.");
	return $output;
}
/**
 * 实现多种字符解码方式
 * @param $input 需要解码的字符串
 * @param $_output_charset 输出的解码格式
 * @param $_input_charset 输入的解码格式
 * return 解码后的字符串
 */
function charsetDecode($input,$_input_charset ,$_output_charset) {
	$output = "";
	if(!isset($_input_charset) )$_input_charset  = $_input_charset ;
	if($_input_charset == $_output_charset || $input ==null ) {
		$output = $input;
	} elseif (function_exists("mb_convert_encoding")) {
		$output = mb_convert_encoding($input,$_output_charset,$_input_charset);
	} elseif(function_exists("iconv")) {
		$output = iconv($_input_charset,$_output_charset,$input);
	} else die("sorry, you have no libs support for charset changes.");
	return $output;
}
function password($password, $encrypt = "")
{
	$pwd = array();
	$pwd["encrypt"] = ($encrypt ? $encrypt : create_randomstr());
	$pwd["password"] = md5(md5(trim($password)) . $pwd["encrypt"]);
	return $encrypt ? $pwd["password"] : $pwd;
}

function create_randomstr($lenth = 6)
{
	return random($lenth, "123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ");
}

function sys_auth($string, $operation = "ENCODE", $key = "", $expiry = 0)
{
	$key_length = 4;
	$fixedkey = md5($key);
	$egiskeys = md5(substr($fixedkey, 16, 16));
	$runtokey = ($key_length ? ($operation == "ENCODE" ? substr(md5(microtime(true)), -$key_length) : substr($string, 0, $key_length)) : "");
	$keys = md5(substr($runtokey, 0, 16) . substr($fixedkey, 0, 16) . substr($runtokey, 16) . substr($fixedkey, 16));
	$string = ($operation == "ENCODE" ? sprintf("%010d", $expiry ? $expiry + time() : 0) . substr(md5($string . $egiskeys), 0, 16) . $string : base64_decode(substr($string, $key_length)));
	$i = 0;
	$result = "";
	$string_length = strlen($string);

	for ($i = 0; $i < $string_length; $i++) {
		$result .= chr(ord($string[$i]) ^ ord($keys[$i % 32]));
	}

	if ($operation == "ENCODE") {
		return $runtokey . str_replace("=", "", base64_encode($result));
	}
	else {
		if (((substr($result, 0, 10) == 0) || (0 < (substr($result, 0, 10) - time()))) && (substr($result, 10, 16) == substr(md5(substr($result, 26) . $egiskeys), 0, 16))) {
			return substr($result, 26);
		}
		else {
			return "";
		}
	}
}

function new_stripslashes($string)
{
	if (!is_array($string)) {
		return stripslashes($string);
	}

	foreach ($string as $key => $val ) {
		$string[$key] = new_stripslashes($val);
	}

	return $string;
}

function getvisitor($userid)
{
	if (!is_numeric($userid)) {
		$userid = cookie_decode(cookie("_userid"));

		if (empty($userid)) {
			return "";
		}
	}

	$rss = D("User");
	$limit = 8;
	$list = $rss->getVisitors($userid, $limit);
	return $list;
}

function system_authkey()
{
	$member_setting = F("_user/setting");
	$auth_key = "123";

	if ($member_setting["auth_key"]) {
		$auth_key = $member_setting["auth_key"];
	}

	return $auth_key;
}

function get_menus($parentid = 0)
{
	$menu_db = M("User_nav");
	$menus = $menu_db->where(array("display" => 1, "parentid" => $parentid))->order(array("listorder" => "asc"))->select();

	foreach ($menus as $key => $val ) {
		$menus[$key]["url"] = UUU($menus[$key]["m"] . "-" . $menus[$key]["c"] . "/" . $menus[$key]["a"], "", true, false);
	}

	return $menus;
}

function cookie_encode($data)
{
	if ($data == "") {
		return "";
	}

	return sys_auth($data, "ENCODE", md5(system_authkey()));
}

function cookie_decode($data)
{
	if ($data == "") {
		return "";
	}

	return sys_auth($data, "DECODE", md5(system_authkey()));
}

function getParentCatalog($lid)
{
	$rs = M("List");
	$pid = $rs->where(array("list_id" => $lid))->getField("list_pid");
	if (empty($pid) || ($pid == 0)) {
		return $lid;
	}
	else {
		return getParentCatalog($pid);
	}
}

function ps_getavatar($uid)
{
	if (!is_numeric($uid)) {
		$uid = cookie_decode(cookie("_userid"));

		if (empty($uid)) {
			return "";
		}
	}

	$z = (in_array(big, array("big", "middle", "small")) ? big : "big");
	$uid = abs(intval($uid));
	$uid = sprintf("%09d", $uid);
	$dir1 = substr($uid, 0, 3);
	$dir2 = substr($uid, 3, 2);
	$dir3 = substr($uid, 5, 2);
	$typeadd = ($type == "real" ? "_real" : "");
	$url = "avatar/customavatars/" . $dir1 . "/" . $dir2 . "/" . $dir3 . "/" . substr($uid, -2) . $typeadd . "_avatar_$z.jpg";
	$info = getimagesize($url);
	$fp = fopen($url, "rb");
	$rss = D("User");
	$url = geturl() . "avatar/avatar.php?uid=" . $uid;
	$memberinfo = $rss->getuserinfo($uid);
	if (!$fp && ($memberinfo["avatar"] == 1) && !empty($memberinfo["avatar_img"])) {
		$avatar = array("big" => $memberinfo["avatar_img"], "middle" => $memberinfo["avatar_img"], "small" => $memberinfo["avatar_img"]);
	}
	else {
		$avatar = array("big" => $url . "&&size=big", "middle" => $url . "&&size=middle", "small" => $url . "&&size=small");
	}

	return $avatar;
}