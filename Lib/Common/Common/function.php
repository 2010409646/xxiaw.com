<?php
/*-------------------------------------------------老函数兼容开始------------------------------------------------------------------*/
function getfirstchar($s0){
	return gxl_letter_first($s0);
}
function getfile($url){
	return gxl_file_get_contents($url);
}
function getreurl($listurl){
   return gxl_krsort_url($listurl);
}
function getpicurl($file){
	return gxl_img_url($file);
}
function findKey($arr, $target) {
    foreach ($arr as $key => $value) {
        if ($value == $target) {
            return $key;
        }
    }
    return false; // 如果没找到匹配的，返回false
}
function downnginx($url){
    $lurl=explode('$$$',C('url_fhttps_all'));
    $furl=explode('$$$',C('url_fhttps'));
    $pattern = '/^(?:https?:\/\/)?(?:www\.)?([^\/]+)/i';
    if (preg_match($pattern, $url, $matches)) {
            $isif= $matches[1];
    }
    $result = findKey($lurl, $isif);
    if ($result!== false) {
   
        $key=$furl[$result];
        $zhong=preg_replace('/^https?:\/\/[^\/]+\/(.+)$/i', ''.$key.'/$1', $url);
         return $zhong;
    } else {
        return $url;
    }
   
}
function getnickname($str)
{
	$html = "";
	$name = M("User")->where("userid = $str")->find();
	$html .= " {$name["nickname"]}";
	return $html;
}

function getusername($str)
{
	$html = "";
	$name = M("User")->where("userid = $str")->find();
	$html .= " {$name["username"]}";
	return $html;
}
function tagContent($content, $arr,$type,$cid=170) {
    $arrs = array_unique(array_filter(explode(',', $arr)));
    $type=$type?$type:'news';
    $baseUrl = '/tag-'.$type.'-name-';

    // 将所有 <img> 和 <a> 标签替换为占位符
    $imgTags = [];
    $aTags = [];
    $content = preg_replace_callback(
        '/<img[^>]+>|<a[^>]*>.*?<\/a>/i',
        function ($matches) use (&$imgTags, &$aTags) {
            if (strpos($matches[0], '<img') !== false) {
                $placeholder = '[[IMG_PLACEHOLDER_' . count($imgTags) . ']]';
                $imgTags[] = $matches[0];
            } else {
                $placeholder = '[[A_PLACEHOLDER_' . count($aTags) . ']]';
                $aTags[] = $matches[0];
            }
            return $placeholder;
        },
        $content
    );

    // 按长度对词汇数组排序，确保较长的词先被替换
    usort($arrs, function($a, $b) {
        return strlen($b) - strlen($a);
    });

    // 替换目标词汇为带超链接的形式
    foreach ($arrs as $word) {
        $content = preg_replace_callback(
            '/' . preg_quote($word, '/') . '(?![^<]*<\/a>)/i',
            function ($matches) use ($baseUrl,$cid) {
                $url = $baseUrl . urlencode($matches[0]) . '-mcid-'.$cid.'-p-1.html';
                return '<a href="' . $url . '">' . $matches[0] . '</a>';
            },
            $content
        );
    }

    // 将占位符替换回原始的 <a> 和 <img> 标签
    foreach ($aTags as $index => $aTag) {
        $content = str_replace('[[A_PLACEHOLDER_' . $index . ']]', $aTag, $content);
    }
    foreach ($imgTags as $index => $imgTag) {
        $content = str_replace('[[IMG_PLACEHOLDER_' . $index . ']]', $imgTag, $content);
    }

    return $content;
}
function gxl_data_down_url($sid,$id,$cid,$name,$page,$jumpurl){

	//有跳转地址

	if ($jumpurl !="") {

		return $jumpurl;

	}
	//动态模式
	$arrurl['id'] = $id;

	
	if($cid){
	$arrurl['listdir'] = getlistdir($cid);
	}else{
	$arrurl['pinyin'] = $letters;	
		
	}
	if($page > 1){

		$arrurl['p'] = '{!page!}';

	}
	return UU('Home-'.$sid.'/down',$arrurl,true,false);

}
function custom_htmlspecialchars($text) {
// 将所有 <pre> 标签替换为占位符，避免转义标签内的内容
    $text=htmlspecialchars_decode($text);
    $text = preg_replace('/<pre\b[^>]*>/', "\x1A", $text);
    // 将所有 </pre> 标签替换为占位符
    $text = str_replace('</pre>', "\x1B", $text);
    // 转义标签之间的内容
    $text = preg_replace_callback('/\x1A(.*?)\x1B/s', function($matches) {
        return '<pre>' . htmlspecialchars($matches[1]) . '</pre>';
    }, $text);
    // 将占位符替换回标签
    $text = str_replace("\x1A", '<pre>', $text);
    $text = str_replace("\x1B", '</pre>', $text);
    return $text;
}
function removeImgStyle($content) {
    $imgPattern = '/<img([^>]*)>/i';
    preg_match_all($imgPattern, $content, $imgMatches);
    foreach ($imgMatches[0] as $imgTag) {
        $newImgTag = preg_replace('/style="([^"]*)"/i', '', $imgTag);
        $content = str_replace($imgTag, $newImgTag, $content);
    }
    return $content;
}

function gxl_down_img_array($content, $type)
{
	$prefix = C("upload_http_prefix");
    if($type=='pic'){
       	$prefix = C('site_url');
    }
   
    $pattern = '/(<img[^>]*src=["\'])(?!http)(?!\/'.C('upload_path').'\/down\/)(down\/)/i';
    $replacement = '$1'.$prefix.'/'.C('upload_path').'/$2';
    $updatedContent = preg_replace($pattern, $replacement, $content);
    
    
    return removeImgStyle($updatedContent);
}


//爱站网
	function aizhanzhang($url){
		
		$data=aicurlpr($url);
		return $data;
		
	}
//百度pc baidupcday，百度移动baidumobileday,搜狗m ,搜狗pc ,so m haosoupcday,so pc haosoupcday
function aicurlpr($url) {
	$heade=array(
	'Host:www.aizhan.com',
	'Content-Type:text/html; charset=utf-8',
	'Connection: keep-alive',
	'Referer:https://www.aizhan.com/',
	'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36'
	);
	$url ='https://www.aizhan.com/cha/'.$url;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt ($ch, CURLOPT_HTTPHEADER,$heade);
	curl_setopt($ch, CURLOPT_HEADER,0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//禁止调用时就输出获取到的数据
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,true);
	$result = curl_exec($ch);
	preg_match('|<a id=\"baidurank_br\" target=\"_blank\" href=\"(.*?)"><img src="//statics.aizhan.com/images/br/(.*?).png"|i',$result,$baidu);
	preg_match('|<a id=\"baidurank_mbr\" target=\"_blank\" href=\"(.*?)"><img src="//statics.aizhan.com/images/mbr/(.*?).png"|i',$result,$baidum);
	preg_match('|<a id=\"360_pr\" target=\"_blank\" href=\"(.*?)"><img src="//statics.aizhan.com/images/360/(.*?).png"|i',$result,$sopc);
	preg_match('|<a id=\"sm_pr\" target=\"_blank\" href=\"(.*?)"><img src="//statics.aizhan.com/images/sm/(.*?).png"|i',$result,$sm);
	preg_match('|<a id=\"sogou_pr\" target=\"_blank\" href=\"(.*?)"><img src="//statics.aizhan.com/images/sr/(.*?).png"|i',$result,$sogoupc);
	preg_match('|<a id=\"google_pr\" target=\"_blank\" href=\"(.*?)"><img src="//statics.aizhan.com/images/pr/(.*?).png"|i',$result,$google);
	$data['baidupc']=$baidu[2];
	$data['baidum']=$baidum[2];
	$data['sopc']=$sopc[2];
	$data['sm']=$sm[2];
	$data['sogoupc']=$sogoupc[2];
	$data['google']=$google[2];
	curl_close($ch);
	return $data;
	
}
//获取百度收录
function getbaidu($url){
	
	$key=urlencode(file_get_contents_by_curl($url));
	$data['baidupc']=curlpr($url,$key,'baidupcday');
	$data['baidum']=curlpr($url,$key,'baidumobileday');
	$data['som']=curlpr($url,$key,'haosoumobileday');
	$data['sopc']=curlpr($url,$key,'haosoupcday');
	$data['sogoupc']=curlpr($url,$key,'sogoupc');
	$data['sogoum']=curlpr($url,$key,'sogoumobileday');
	$data['som']=curlpr($url,$key,'sogoumobileday');
	$data['sm']=curlpr($url,$key,'shenmaday');
	$data['toutiao']=curlpr($url,$key,'toutiao');
	$data['google']=curlpr($url,$key,'googleday');
	$data['site']=curlsite($url,$key,'toutiao');
	return $data;
}
function getMillisecond() {
        list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
}

//百度pc baidupcday，百度移动baidumobileday,搜狗m ,搜狗pc ,so m haosoupcday,so pc haosoupcday
function curlpr($url,$key,$type) {
	$heade=array(
	'Host:mseo.chinaz.com',
	'Content-Type:text/html; charset=utf-8',
	'Connection: keep-alive',
	'Referer:http://mseo.chinaz.com/'.$url,
	'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36'
	);
	$url ='http://mseo.chinaz.com/Handle/AjaxHandler.ashx?action=GetRank&host='.$url.'&secretkey='.$key.'&type='.$type;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt ($ch, CURLOPT_HTTPHEADER,$heade);
	curl_setopt($ch, CURLOPT_HEADER,0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//禁止调用时就输出获取到的数据
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	$result = curl_exec($ch);
	preg_match('|\"Rank\":(.*?)\,|i',$result,$title);
	curl_close($ch);
	return $title[1];
	
}
//百度收录量
function curlsite($url,$key,$type) {
	$url='http://'.$url;
	$time=getMillisecond();
	$heade=array(
	'Host:mseo.chinaz.com',
	'Content-Type:text/html; charset=utf-8',
	'Connection: keep-alive',
	'Referer:http://mseo.chinaz.com/'.$url,
	'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36'
	);
	$url='http://mseo.chinaz.com/Handle/AjaxHandler.ashx?action=GetBaiduRealateInfo&host='.$url.'&deskey='.$key.'&r='.$time;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt ($ch, CURLOPT_HTTPHEADER,$heade);
	curl_setopt($ch, CURLOPT_HEADER,0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//禁止调用时就输出获取到的数据
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	$result = curl_exec($ch);
	
	preg_match('|#seo_BaiduSiteIndex\'\).html\((.*?)\>(.*?)<\/|i',$result,$baidupc);
	preg_match('|#seo_SogouPages\'\).html\((.*?)\>(.*?)<\/|i',$result,$sogou);
	preg_match('|#seo_Pages360\'\).html\((.*?)\>(.*?)<\/|i',$result,$so);
	preg_match('|#seo_PagesSm\'\).html\((.*?)\>(.*?)<\/|i',$result,$sm);
	preg_match('|#seo_GooglePages\'\).html\((.*?)\>(.*?)<\/|i',$result,$google);
	
	/* preg_match('|#seo_SogouPages\'\)\.html\((.*)<font color=\'#999999\'>(.*?)</font>|i',$result,$sogou);
	preg_match('|#seo_Pages360\'\)\.html\((.*)<font color=\'#999999\'>(.*?)</font>|i',$result,$so);
	preg_match('|#seo_PagesSm\'\)\.html\((.*)<font color=\'#999999\'>(.*?)</font>|i',$result,$sm);
	preg_match('|#seo_GooglePages\'\)\.html\((.*)<font color=\'#999999\'>(.*?)</font>|i',$result,$google); */
	$data['baidupc']=msubstr($baidupc[2]);
	$data['sogou']=msubstr($sogou[2]);
	$data['so']= msubstr($so[2]);
	$data['sm']= msubstr($sm[2]);
	$data['google']=msubstr($google[2]);

	curl_close($ch);
	return $data;
	
}
//HTTPS抓取内容
function file_get_contents_by_curl($url){
	$heade=array(
	'Host:mseo.chinaz.com',
	'Content-Type:text/html;charset=utf-8',
	'Connection: keep-alive',
	'Referer:http://mseo.chinaz.com/'.$url,
	'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36'
	);
	$url ='http://mseo.chinaz.com/'.urlencode($url);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt ($ch, CURLOPT_HTTPHEADER,$heade);
	curl_setopt($ch, CURLOPT_HEADER,0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//禁止调用时就输出获取到的数据
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,true);
	$result = curl_exec($ch);
	preg_match('|desKey = \'(.*?)\'|i',$result,$title);

	curl_close($ch);
	return $title[1];
	
}
function gxl_icp_url($id){

    if(C('url_html')){

        $readurl = C('site_path').str_replace('index'.C('html_file_suffix'),'',gxl_data_url_dir($sid,$id,$cid,$name,$page).C('html_file_suffix'));

        return $readurl;

    }
    $arrurl['id'] = $id;

    return UU('Home-icp/read',$arrurl,true,false);
}

/*-------------------------------------------------文件夹与文件操作开始------------------------------------------------------------------*/

function read_file($l1){
	 $ctx = stream_context_create(array('http'=>array('timeout'=>30)));
	return @file_get_contents($l1, 0, $ctx);
}
//写入文件
function write_file($l1, $l2=''){
	$dir = dirname($l1);
	if(!is_dir($dir)){
		mkdirss($dir);
	}
	return @file_put_contents($l1, $l2);
}
//递归创建文件
function mkdirss($dirs,$mode=0777) {
	if(!is_dir($dirs)){
		mkdirss(dirname($dirs), $mode);
		return @mkdir($dirs, $mode);
	}
	return true;
}
// 数组保存到文件
function arr2file($filename, $arr=''){
	if(is_array($arr)){
		$con = var_export($arr,true);
	} else{
		$con = $arr;
	}
	$con = "<?php\nreturn $con;\n?>";//\n!defined('IN_MP') && die();\nreturn $con;\n
	write_file($filename, $con);
}
/*-------------------------------------------------系统路径相关函数开始------------------------------------------------------------------*/
//获取当前地址栏URL
function get_http_url(){
	return htmlspecialchars("http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]);
}
//获取根目录路径
function get_site_path($filename){
    $basepath = $_SERVER['PHP_SELF'];
    $basepath = substr($basepath,0,strpos($basepath,$filename));
	return $basepath;
}
//相对路径转绝对路径
function get_base_url($baseurl,$url){
	if("#" == $url){
		return "";
	}elseif(FALSE !== stristr($url,"http://")){
		return $url;
	}elseif( "/" == substr($url,0,1) ){
		$tmp = parse_url($baseurl);
		return $tmp["scheme"]."://".$tmp["host"].$url;
	}else{
		$tmp = pathinfo($baseurl);
		return $tmp["dirname"]."/".$url;
	}
}
//获取指定地址的域名
function get_domain($url){
	preg_match("|http://(.*)\/|isU", $url, $arr_domain);
	return $arr_domain[1];
}
/*-------------------------------------------------字符串处理开始------------------------------------------------------------------*/
// UT*转GBK
function u2g($str){
	return iconv("UTF-8","GBK",$str);
}
// GBK转UTF8
function g2u($str){
	return iconv("GBK","UTF-8//ignore",$str);
}
// 转换成JS
function t2js($l1, $l2=1){
    $I1 = str_replace(array("\r", "\n"), array('', '\n'), addslashes($l1));
    return $l2 ? "document.write(\"$I1\");" : $I1;
}
// 去掉换行
function nr($str){
	$str = str_replace(array("<nr/>","<rr/>"),array("\n","\r"),$str);
	return trim($str);
}
//去掉连续空白
function nb($str){
	$str = str_replace("　",' ',str_replace("&nbsp;",' ',$str));
	$str = eregi_replace("/\n{2,}/",' ',$str);
	return trim($str);
}
//字符串截取(同时去掉HTML与空白)
function msubstr($str, $start=0, $length, $suffix=false){
	return ff_msubstr(eregi_replace('<[^>]+>','',eregi_replace("[\r\n\t ]{1,}",' ',nb($str))),$start,$length,'utf-8',$suffix);
}
function ff_msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true){
	$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
	$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
	$re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
	$re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
	preg_match_all($re[$charset], $str, $match);
	$length_new = $length;
	for($i=$start; $i<$length; $i++){
		if (ord($match[0][$i]) > 0xa0){
			//中文
		}else{
			$length_new++;
			$length_chi++;
		}
	}
	if($length_chi<$length){
		$length_new = $length+($length_chi/2);
	}
	$slice = join("",array_slice($match[0], $start, $length_new));
    if($suffix && $slice != $str){
		return $slice."…";
	}
    return $slice;
}
// 汉字转拼单
function gxl_pinyin($str,$ishead=0,$isclose=1){
	$str = u2g($str);//转成GBK
	global $pinyins;
	$restr = '';
	$str = trim($str);
	$slen = strlen($str);
	if($slen<2){
		return $str;
	}
	if(count($pinyins)==0){
		$fp = fopen('./Lib/Conf/pinyin.dat','r');
		while(!feof($fp)){
			$line = trim(fgets($fp));
			$pinyins[$line[0].$line[1]] = substr($line,3,strlen($line)-3);
		}
		fclose($fp);
	}
	for($i=0;$i<$slen;$i++){
		if(ord($str[$i])>0x80){
			$c = $str[$i].$str[$i+1];
			$i++;
			if(isset($pinyins[$c])){
				if($ishead==0){
					$restr .= $pinyins[$c];
				}
				else{
					$restr .= $pinyins[$c][0];
				}
			}else{
				//$restr .= "_";
			}
		}else if( eregi("[a-z0-9]",$str[$i]) ){
			$restr .= $str[$i];
		}
		else{
			//$restr .= "_";
		}
	}
	if($isclose==0){
		unset($pinyins);
	}
	return $restr;
}

//生成字母前缀
function gxl_letter_first($s0){
	$firstchar_ord=ord(strtoupper($s0{0})); 
	if (($firstchar_ord>=65 and $firstchar_ord<=91)or($firstchar_ord>=48 and $firstchar_ord<=57)) return $s0{0}; 
	$s=iconv("UTF-8","gb2312", $s0); 
	$asc=ord($s{0})*256+ord($s{1})-65536; 
	if($asc>=-20319 and $asc<=-20284)return "A";
	if($asc>=-20283 and $asc<=-19776)return "B";
	if($asc>=-19775 and $asc<=-19219)return "C";
	if($asc>=-19218 and $asc<=-18711)return "D";
	if($asc>=-18710 and $asc<=-18527)return "E";
	if($asc>=-18526 and $asc<=-18240)return "F";
	if($asc>=-18239 and $asc<=-17923)return "G";
	if($asc>=-17922 and $asc<=-17418)return "H";
	if($asc>=-17417 and $asc<=-16475)return "J";
	if($asc>=-16474 and $asc<=-16213)return "K";
	if($asc>=-16212 and $asc<=-15641)return "L";
	if($asc>=-15640 and $asc<=-15166)return "M";
	if($asc>=-15165 and $asc<=-14923)return "N";
	if($asc>=-14922 and $asc<=-14915)return "O";
	if($asc>=-14914 and $asc<=-14631)return "P";
	if($asc>=-14630 and $asc<=-14150)return "Q";
	if($asc>=-14149 and $asc<=-14091)return "R";
	if($asc>=-14090 and $asc<=-13319)return "S";
	if($asc>=-13318 and $asc<=-12839)return "T";
	if($asc>=-12838 and $asc<=-12557)return "W";
	if($asc>=-12556 and $asc<=-11848)return "X";
	if($asc>=-11847 and $asc<=-11056)return "Y";
	if($asc>=-11055 and $asc<=-10247)return "Z";
	return 0;//null
}
/*-------------------------------------------------采集函数开始------------------------------------------------------------------*/
// 采集内核
function gxl_file_get_contents($url,$timeout=10,$referer){
	if(function_exists('curl_init')){
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,$timeout);
		if($referer){
			curl_setopt ($ch, CURLOPT_REFERER, $referer);
		}		
		$content = curl_exec($ch);
		$status = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if($content && $status==200){
			return $content;
		}		
	}
	$ctx = stream_context_create(array('http'=>array('timeout'=>$timeout)));
	$content = @file_get_contents($url, 0, $ctx);
	if(strlen($content) == 0){
    return false;
	}
	elseif($content){
		return $content;
	}
	return false;
}
// 采集-匹配规则结果
function gxl_preg_match($rule,$html){
	$arr = explode('$$$',$rule);
	if(count($arr) == 2){
	    preg_match('/'.$arr[1].'/', $html, $data);
		return $data[$arr[0]].'';
	}else{
	    preg_match('/'.$rule.'/', $html, $data);
		return $data[1].'';
	}
}
// 采集-匹配规则结果all
function gxl_preg_match_all($rule,$html){
	$arr = explode('$$$',$rule);
	if(count($arr) == 2){
	    preg_match_all('/'.$arr[1].'/', $html, $data);
		return $data[$arr[0]];
	}else{
	    preg_match_all('/'.$rule.'/', $html, $data);
		return $data[1];
	}
}
// 采集-倒序采集
function gxl_krsort_url($listurl){
   krsort($listurl);
   foreach($listurl as $val){
       $list[]=$val;
   }
   return $list;
}
// 采集-将所有替换规则保存在一个字段
function gxl_implode_rule($arr){
    foreach($arr as $val){
	    $array[] = trim(stripslashes($val));
	}
	return implode('|||',$array);
}
//  采集-规则替换
function gxl_replace_rule($str){
	//$str = str_replace(array("\n","\r"),array("<nr/>","<rr/>"),strtolower($str));
	$arr1 = array('?','"','(',')','[',']','.','/',':','*','||');
	$arr2 = array('\?','\"','\(','\)','\[','\]','\.','\/','\:','.*?','(.*?)');
	//$str = str_replace(array("\n","\r"),array("<nr/>","<rr/>"),strtolower($str));
	return str_replace('\[$gxlnews\]','([\s\S]*?)',str_replace($arr1,$arr2,$str));
}
//生成随机伪静态简介
function gxl_rand_str($string){
    $arr=C('play_collect_content');
    //$all=mb_strlen($string,'utf-8');
	$all=iconv_strlen($string,'utf-8');
    $len=floor(mt_rand(0,$all-1));
    $str=msubstr($string,0,$len);
	$str2=msubstr($string,$len,$all);
	return $str.$arr[array_rand($arr,1)].$str2;
}
//获取绑定分类对应ID值
function gxl_bind_id($key){
	$bindcache = F('_xml/bind');
	
	return $bindcache[$key];
}
//TAG分词自动获取
function gxl_tag_auto($title,$content){
	$data = gxl_file_get_contents('http://keyword.discuz.com/related_kw.html?ics=utf-8&ocs=utf-8&title='.rawurlencode($title).'&content='.rawurlencode(msubstr($content,0,500)));
	if($data) {
		$parser = xml_parser_create();
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_parse_into_struct($parser, $data, $values, $index);
		xml_parser_free($parser);
		$kws = array();
		foreach($values as $valuearray) {
			if($valuearray['tag'] == 'kw') {
				if(strlen($valuearray['value']) > 3){
					$kws[] = trim($valuearray['value']);
				}
			}elseif($valuearray['tag'] == 'ekw'){
				$kws[] = trim($valuearray['value']);
			}
		}
		return implode(',',$kws);
	}
	return false;
}


/*-------------------------------------------------飞飞系统栏目相关函数开始------------------------------------------------------------------*/
//通过栏目名名获取对应的栏目ID
function getlistid($str){
    $arr = list_search(F('_gxlnews/list'),'list_name='.$str);
	if(empty($arr)){
		return 0;
	}else{
	    return $arr[0]['list_id'];
	}
}
//通过栏目ID获取对应的栏目名称/别名等
function getlistname($cid,$type='list_name'){
    $arr=list_search(F('_gxlnews/list'),'list_id='.$cid);
	if(is_array($arr)){
		return $arr[0][$type];
	}else{
	    return '未知ID'.$cid;
	}
}
// 检查当前栏目是否没有小类
function getlistson($pid){
	$tree=list_search(F('_gxlnews/listtree'),'list_id='.$pid);
	if(!empty($tree[0]['son'])){
		return false;
	}else{
	    return true;
	}
}
function getlistdocson($pid){
	$tree=M('doc_list')->where(array('list_pid'=>$pid))->find();
	if(!empty($tree)){
		return false;
	}else{
	    return true;
	}
}
//生成栏目sql查询语句范围
function getlistsqlin($cid){
	$tree = list_search(F('_gxlnews/listtree'),'list_id='.$cid);
	if (!empty($tree[0]['son'])) {
		foreach($tree[0]['son'] as $val){
			$arr['news_cid'][] = $val['list_id'];
		}
		$channel = implode(',', $arr['news_cid']);
		return array('IN',''.$channel.'');	
	}
	return $cid;
}
//通过栏目ID返回其它值按数组方式
function getlistarr($cid,$type='list_id'){
    $tree = list_search(F('_gxlnews/listtree'),'list_id='.$cid);
	if(!empty($tree[0]['son'])){
		foreach($tree[0]['son'] as $val){$param[]=$val[$type];}
		return $param;
	}else{
		return false;
	}
}

//去重后的模板栏目ID参数 $cids = array(1,2,3,...)
function getlistarr_tag($cids){
	foreach($cids as $key=>$value){
		if(getlistson($value)){
			$cid .= ','.$value;
		}else{
			$cidin = getlistsqlin($value);
			$cid .= ','.$cidin[1];
		}
	}
	$cidarr = explode(',',$cid);
	unset($cidarr[0]);
	$cidarr = array_unique($cidarr);
	return $cidarr;
}
// 获取栏目数据统计
function getcount($cid){
	$where = array();
	
		$sid = getlistname($cid,'list_sid');
		if ($sid == '2'){
			$where['news_cid'] = getlistsqlin($cid);
			$where['news_status'] = 1;
			$rs = M("News");
			$count = $rs->where($where)->count('news_id');
		}
	
	//dump($rs->getLastSql());
	return $count+0;
}
//获取模型名称
function getsidname($sid){
	if ($sid==1){
		return 'Voice';
	}elseif ($sid==2){
		return 'news';
	}elseif ($sid==3){
		return 'zhidao';
	}elseif ($sid==4){
		return 'links';
	}elseif ($sid==5){
		return 'doc';
	}elseif ($sid==6){
		return 'icp';
	}elseif ($sid==7){
		return 'down';
	}else{
		return 'url';
	}
}
//获取模型ID
function gxl_sid($sidname){
	if ($sidname == 'news'){
		return 2;
	}else{
		return 9;
	}
}
/*-------------------------------------------------模板常用函数-----------------------------------------------------------------*/
//获得某天前的时间戳
function getxtime($day){
	$day = intval($day);
	return mktime(23,59,59,date("m"),date("d")-$day,date("y"));
}
// 获取标题颜色
function getcolor($str,$color){
	if(empty($color)){
	    return $str;
	}else{
	    return '<font color="'.$color.'">'.$str.'</font>';
	}
}
// 获取时间颜色
function getcolordate($type='Y-m-d H:i:s',$time,$color='red'){
	if((time()-$time)>86400){
	    return date($type,$time);
	}else{
	    return '<font color="'.$color.'">'.date($type,$time).'</font>';
	}
}
// 读出qvod地址的文件名
function gxl_qvod_name($jiname){
	$jiname = gxl_preg_match('3$$$(.*)\|(.*)\|(.*)\.(.*)\|',$jiname);
	return $jiname;
}
// 处理积分样式
function getjifen($fen){
	$array = explode('.',$fen);
	return '<strong>'.$array[0].'</strong>.'.$array[1];
}
//分页样式
function getpage($currentPage,$totalPages,$halfPer=3,$url,$pagego){
    $linkPage .= ( $currentPage > 1 )
        ? '<a href="'.str_replace('{!page!}',1,$url).'" class="prev disabled" data="p-0">首页</a>&nbsp;<a href="'.str_replace('{!page!}',($currentPage-1),$url).'" class="prev" data="p-'.($currentPage-1).'">上一页</a>&nbsp;' 
        : '';
    for($i=$currentPage-$halfPer,$i>1||$i=1,$j=$currentPage+$halfPer,$j<$totalPages||$j=$totalPages;$i<$j+1;$i++){
        $linkPage .= ($i==$currentPage)?'<span class="current">'.$i.'</span>&nbsp;':'<a href="'.str_replace('{!page!}',$i,$url).'" data="p-'.$i.'">'.$i.'</a>&nbsp;'; 
    }
    $linkPage .= ( $currentPage < $totalPages )
        ? '<a href="'.str_replace('{!page!}',($currentPage+1),$url).'" class="next pagegbk" data="p-'.($currentPage+1).'">下一页</a>&nbsp;<a href="'.str_replace('{!page!}',$totalPages,$url).'" class="next pagegbk" data="p-'.$totalPages.'">尾页</a>'
        : '';
	if(!empty($pagego)){
		$linkPage .='';
	}
	//分页样式
	
	if(C('url_html') && C('url_html_list')){
    	return str_replace('-1'.C('html_file_suffix'),C('html_file_suffix'),str_replace('index-1'.C('html_file_suffix'),'',$linkPage));
	}	
	else{
		return str_replace('-1'.C('html_file_suffix'),C('html_file_suffix'),str_replace('index-1'.C('html_file_suffix'),'',$linkPage));
	}
}
//顶部分页样式
function getpagetop($currentPage,$totalPages,$halfPer=5,$url,$pagego){
    $linkPage .= ( $currentPage > 1 )
        ? '<a href="'.str_replace('{!page!}',($currentPage-1),$url).'" class="prev pagegbk" data="p-'.($currentPage-1).'">上一页</a>&nbsp;'
        : '<span class="prev disabled">上一页</span>';
    $linkPage .= ( $currentPage < $totalPages )
        ? '<a href="'.str_replace('{!page!}',($currentPage+1),$url).'" class="next pagegbk" data="p-'.($currentPage+1).'">下一页</a>&nbsp;'
        : '<span class="prev disabled">下一页</span>';
     return str_replace('-1'.C('html_file_suffix'),C('html_file_suffix'),str_replace('index-1'.C('html_file_suffix'),'',$linkPage));
}
//搜索统计
function getpagecount($currentPage,$totalPages,$halfPer=5,$url,$pagego){
    $linkPage .= ( $currentPage > 1 )
        ? '' 
        : '';
    $linkPage .= ( $currentPage < $totalPages )
        ? ''
        : '';
    return str_replace('-1'.C('html_file_suffix'),C('html_file_suffix'),str_replace('index1'.C('html_file_suffix'),'',$linkPage));
}
//处理最大分页参数
function get_maxpage($currentpage,$totalpages){
	if ($currentpage > $totalpages){
		$currentpage = $totalpages;
	}
	return $currentpage;
}
// 获取热门关键词
function gxl_hot_key($string){
	if(C('site_hot')){
		if(C('url_html')){
		return '<script type="text/javascript" src="'.C('site_path').'Runtime/Js/hotkey.js" charset="utf-8"></script>';
	}
	$array_hot = array();
	foreach(explode(chr(13),trim($string)) as $key=>$value){
		$array = explode('|',$value);
	
		if(count($array)>1){
			$array_hot[$key] = '<a href="'.$array[1].'" target="_blank">'.trim($array[0]).'</a>';
		}else{
			$array_hot[$key] = '<a href="'.UU('Home-news/search',array('wd'=>urlencode(trim($value))),true,false).'">'.trim($value).'</a>';
		}
	}
	return implode(' ',$array_hot);
	}
	else{
	$hotkey = F('_gxlnews/hotkey');
	$array = explode('|',$hotkey);
	if(C('url_html')){
		return '<script type="text/javascript" src="'.C('site_path').'Runtime/Js/hotkey.js" charset="utf-8"></script>';
	}
	$hotkey = '';
	foreach($array as $key=>$value){
		if($value != ""){
			$hotkey .= '<a href="'.UU('Home-news/search',array('wd'=>urlencode(trim($value))),true,false).'" target="_blank">'.$value.'</a>';
		}
	}return $hotkey;  
	}	
	
}
// 获取与处理人气值
function gxl_get_hits($sidname,$type='hits',$array,$js=true){
	if((C('url_html') && $js) || $type=='insert'){
		return '<script type="text/javascript" src="'.C('site_path').'index.php?s=hits-show-id-'.$array[$sidname.'_id'].'-type-'.$type.'-sid-'.$sidname.'" charset="utf-8"></script>';
	}else{
		return $array[$type];
	}
}
// 递归多维数组转为一级数组
function gxl_arrays2array($array){
	static $result_array=array();
	foreach($array as $value){
		if(is_array($value)){
			gxl_arrays2array($value);
		}else{ 
			$result_array[]=$value;
		}
	}
	return $result_array;
}

/*-------------------------------------------------飞飞系统访问路径函数开始------------------------------------------------------------------*/
// 重写动态路径
function UU($model,$params='',$redirect=true,$suffix=false){
   
	//rewrite重写
	if(C('url_rewrite')){
		//$params['p']=$params?$params:1;
	
		if(array_key_exists("p", $params)){
		if($params['p'] != '{!page!}'){
			$params['p'] = '1';
		}
		}else{
		    	$params['p'] = '1';
		}
		if($model == 'Home-news/show'){
			$reurl = str_replace(array('$id','$listdir','$page'),array($params['id'],$params['listdir'],$params['p']),C('rewrite_newslist'));
		}elseif($model == 'Home-news/read'){
			$reurl = str_replace(array('$id','$listdir'),array($params['id'],$params['listdir']),C('rewrite_newsdetail'));
		}elseif($model == 'Home-news/search'){
			$reurl = str_replace(array('$wd','$page'),array($params['wd'],$params['p']),C('rewrite_newssearch'));
		}elseif($model == 'Home-tag/news'){
			$reurl = str_replace(array('$wd','$page'),array($params['wd'],$params['p']),C('rewrite_newstag'));
		}elseif($model == 'Home-special/show'){
			$reurl = str_replace('$page',$params['p'],C('rewrite_speciallist'));
		}elseif($model == 'Home-special/read'){
			$reurl = str_replace(array('$id','$pinyin'),array($params['id'],$params['pinyin']),C('rewrite_specialdetail'));
		}elseif($model == 'Home-gb/show'){
			$reurl = str_replace(array('$id','$page'),array($params['id'],$params['p']),C('rewrite_guestbook'));
		}elseif($model == 'User-gb/show'){
			$reurl = str_replace(array('$id','$page'),array($params['id'],$params['p']),C('rewrite_guestbook'));	
		}elseif($model == 'Home-my/show'){
			$reurl = str_replace('$id',$params['id'],C('rewrite_mytpl'));
		}elseif($model == 'Home-map/show'){
			$reurl = str_replace(array('$id','$limit'),array($params['id'],$params['limit']),C('rewrite_map'));
		}elseif($model == 'Home-down/showlist'){

			$reurl = str_replace(array('$id','$listdir','$page'),array($params['id'],$params['listdir'],$params['p']),C('rewrite_downlist'));

		}elseif($model == 'Home-down/show'){

			$reurl = str_replace(array('$id','$listdir','$page'),array($params['id'],$params['listdir'],$params['p']),C('rewrite_downlist'));

		}elseif($model == 'Home-tag/show'){
           
		$reurl = str_replace(array('$type','$name','$mcid','$page'),array($params['type'],$params['name'],$params['mcid'],$params['p']),C('rewrite_taglist'));
	

		}elseif($model == 'Home-down/read'){

			$reurl = str_replace(array('$id','$listdir'),array($params['id'],$params['listdir']),C('rewrite_downdetail'));

		}elseif($model == 'Home-down/down'){

			$reurl = str_replace(array('$id','$type'),array($params['id'],$params['type']),C('rewrite_downdown'));

		}elseif($model == 'Home-down/search'){

			$reurl = str_replace(array('$wd','$page'),array($params['wd'],$params['p']),C('rewrite_downsearch'));

		}
		elseif($model == 'Home-up/show'){
			$reurl = str_replace(array('$id','$dir','$s','$data'),array($params['id'],$params['dir'],$params['s'],$params['data']),C('rewrite_up'));
		}
		//伪静态规则设置正确
		if($reurl){
		    
		  $urlyy=array('index1'.C('url_html_suffix'),'index'.C('url_html_suffix'),'index-1'.C('url_html_suffix'),'id--');
	
		return str_replace($urlyy,'',$reurl.C('url_html_suffix'));
		    
		}
		else{
		return preg_replace(array("/listdir-.*?-/","/pinyin-.*?-/","/pinyin-.*?-/"), "", str_replace(array('index.php?s=/Home-','lz--','mcid--','letter--','area--','order--','year--','xb--','id--'),'',U($model,$params,$redirect,$suffix)));
		}	
    	}
    	//TP框架默认生成的路径
    	$reurl =  str_replace('=home-','=',str_replace(array('index.php?s=/','lz--','id--','mcid--','letter--','area--','order--','year--','xb--','-order-.'),array('index.php?s=','','','','','','','','.'),U($model,$params,$redirect,$suffix)));
    	$reurl = preg_replace(array("/listdir-.*?-/","/docpinyin-.*?-/","/docid-.*?-/","/pinyin-.*?-/","/listid-.*?-/","/dir-.*?-/"), "", $reurl);
    	$reurl = preg_replace(array("/-pinyin-.*?\./","/-listdir-.*?\./","/-vodpinyin-.*?\./"), ".", $reurl);
    	//不是静态模式则去掉index.php
    	if(!C('url_html')){
    		return str_replace(array('index.php'),'',urldecode($reurl));
    	}
	
	return $reurl;
};
/*************************获取内容页路径****************************************
* $sid 模型名称'vod/news/special'
* $id 影片ID/文章ID/专题ID值
* $cid 当前影片/文章/专题/对应的栏目ID值
* $name 影片/文章/专题/的名称
* $page 分页数字,大于1时返回的URL带有分页跳转参数变量{!page!}
* $jumpurl 跳转地址
*/
function gxl_data_url($sid,$id,$cid,$name,$page,$jumpurl,$vod_letters='',$type=''){
	//有跳转地址
	if ($jumpurl !="") {
		return $jumpurl;
	}
	//静态
	if(C('url_html')){
		$readurl = C('site_path').str_replace('index'.C('html_file_suffix'),'',gxl_data_url_dir($sid,$id,$cid,$name,$page).C('html_file_suffix'));
		return $readurl;
	}
	//动态模式
	$arrurl['id'] = $id;
	//$arrurl['pinying'] = getsppinyin($id);
	//$arrurl['pinying'] = getvodpinyin($id);
	$arrurl['pinyin'] = $vod_letters?$vod_letters:'';
	$arrurl['listdir'] = $type?$type:getlistdir($cid);
	
	if($page > 1){
		$arrurl['p'] = '{!page!}';
	}
	return UU('Home-'.$sid.'/read',$arrurl,true,false);
}
function get_id_by_name($name,$type)
{
	if($type=='type'){
	$rs = M("Doc_news");
	$where["news_letters"] = $name;
	$list = $rs->field("news_id")->where($where)->find();

	if (isset($list)) {
		return $list["news_id"];
	}
	}else{
	$rs = M("Doc");
	$where["doc_letters"] = $name;
	$list = $rs->field("doc_id")->where($where)->find();

	if (isset($list)) {
		return $list["doc_id"];
	}	
		
	}

	return "";
}
function gxl_data_type_url($sid,$id,$cid,$name,$page,$jumpurl,$vod_letters,$type){
	//有跳转地址
	if ($jumpurl !="") {
		return $jumpurl;
	}
	//静态
	if(C('url_html')){
		$readurl = C('site_path').str_replace('index'.C('html_file_suffix'),'',gxl_data_url_dir($sid,$id,$cid,$name,$page).C('html_file_suffix'));
		return $readurl;
	}
	//动态模式
	$arrurl['id'] = $id;
	//$arrurl['pinying'] = getsppinyin($id);
	//$arrurl['pinying'] = getvodpinyin($id);
	$arrurl['pinyin'] = $vod_letters;
	$arrurl['listdir'] = $type?$type:getlistdir($cid);
	
	if($page > 1){
		$arrurl['p'] = '{!page!}';
	}
	return UU('Home-'.$sid.'/type',$arrurl,true,false);
}
// 获取广告调用地址
function getadsurl($str,$charset="utf-8"){
	return '<script type="text/javascript" src="'.C('site_path').C('admin_ads_file').'/'.$str.'.js" charset="'.$charset.'"></script>';
}
/*******************替换自定义路径的变量****************************/
function str_replace_dir($urldir,$id,$cid,$name){
	$old = array('{listid}','{listdir}','{pinyin}','{id}','{md5}',C('html_file_suffix'));
	$new = array($cid,getlistname($cid,'list_dir'),getvodpinyin($id),$id,md5($id),'');
	return str_replace($old,$new,$urldir);
}
function str_special_dir($urldir,$id){
	$old = array('{pinyin}','{id}',C('html_file_suffix'));
	$new = array(getsppinyin($id),$id,'');
	return str_replace($old,$new,$urldir);
}

/*******************获取栏目页路径****************************
* $sid 模型名称'movie/article/special'
* $arrurl为数组参数传入参考U函数(方便动态模式直接生成)
* $page 分页数字,大于1时返回的URL带有分页跳转参数变量{!page!}
* 只有一个栏目ID参数时 $arrurl['id'] = $cid;
*/
function gxl_list_url($sid,$arrurl,$page){
	//静态模式
	if(C('url_html') && C('url_html_list') && in_array($sid,array('vod','news','tv'))){
		$showurl = C('site_path').str_replace('index'.C('html_file_suffix'),'',gxl_list_url_dir($sid,$arrurl['id'],$page).C('html_file_suffix'));
		return $showurl;
	}else{
		if($page > 1){ $arrurl['p'] = '{!page!}'; }
		$showurl = UU('Home-'.$sid.'/show',$arrurl,true,false);
	}
	return $showurl;
}
/**********************静态生成的栏目结构******************************
* (返回的值为buildHtml的文件名,生成静态时需要将{!page!}换成对应的page值)
* $mid 模型名称'movie/article/special'
* $cid 当前分类的栏目ID值
* $page 分页数字,大于1时返回的URL带有分页跳转参数变量{!page!}
*/
function gxl_list_url_dir($sid,$cid,$page){
	//影视或文章
	if('vod' == $sid){
		$listdir = str_replace_dir(C('url_vodlist'),$id,$cid,$name);
	}else{
		$listdir = str_replace_dir(C('url_newslist'),$id,$cid,$name);
	}
	if($page > 1){
		$listdir .= '-{!page!}';
	}
	return $listdir;
}



/*************************获取详情页目录****************************************
* 返回的值为buildHtml的文件名
* $sid 模型名称'vod/news/special'
* $id 影片ID/文章ID/专题ID值
* $cid 当前影片/文章/专题/对应的栏目ID值
* $name 影片/文章/专题/的名称
* $page 分页数字,大于1时返回的URL带有分页跳转参数变量{!page!}
*/
function gxl_data_url_dir($sid,$id,$cid,$name,$page){
	//专题直接返回
	if('special' == $sid){
		return str_special_dir(C('url_special').C('url_specialdata'),$id);
	}
	//影视或文章
	if('vod' == $sid){
		$datadir = str_replace_dir(C('url_voddata'),$id,$cid,$name);
	}else{
		$datadir = str_replace_dir(C('url_newsdata'),$id,$cid,$name);
	}
	if($page > 1){
		$datadir .= '-{!page!}';
	}
	return $datadir;
}
//获取播放页链接

//播放页静态生成结构

//获取专题URL
function gxl_special_url($page){
	if(C('url_html')){
		return C('site_path').str_replace('index'.C('html_file_suffix'),'',gxl_special_url_dir($page).C('html_file_suffix'));
	}else{
		if($page > 1){ $arrurl['p'] = '{!page!}'; }
		return UU('Home-special/show',$arrurl,true,false);
	}
}
//获取专题静态模式目录结构URL
function gxl_special_url_dir($page){
	$listdir = trim(C('url_special')).'index';
	if($page > 1){
		$listdir .= '-{!page!}';
	}
	return $listdir;
}
// 获取某图片的访问地址
function gxl_img_url($file,$content,$number=1){
	if(empty($file)){
		return C('site_path').'no.jpg';
		}
	if(!$file){
		return gxl_img_url_preg($file,$content,$number);
	}
	if(strpos($file,'http') !== false){
		return $file;
	}
	$prefix = C('upload_http_prefix');
	if(!empty($prefix)){
		return $prefix.$file;
	}else{
	
	if(strpos($file,'Uploads') !== false){
		return $file;
	}
	if(strpos($file,'Uploads-s') !== false){
		return $file;
	}
		return C('site_path').C('upload_path').'/'.$file;
	}
}
// 获取某图片的缩略图地址
function gxl_img_url_small($file,$content,$number=1){
	if(!$file){
		return gxl_img_url_preg($file,$content,$number);
	}
	if(strpos($file,'http://') !== false){
		return $file;
	}	
	$prefix = C('upload_http_prefix');
	if(!empty($prefix)){
		return $prefix.$file;
	}else{
		return C('site_path').C('upload_path').'-s/'.$file;
	}	
}
//正则提取正文里指定的第几张图片地址
function gxl_img_url_preg($file,$content,$number=1){
	preg_match_all('/<img(.*?)src="(.*?)(?=")/si',$content,$imgarr);///(?<=img.src=").*?(?=")/si
	preg_match_all('/(?<=src=").*?(?=")/si',implode('" ',$imgarr[0]).'" ',$imgarr);
	$countimg = count($imgarr);
	if($number > $countimg){
		$number = $countimg;
	}
	return $imgarr[0][($number-1)];
}
// Tag链接
function gxl_tag_url($str,$sid=1){
	if($sid==2){
		return UU('Home-tag/news',array('wd'=>urlencode($str)),true,false);
	}else{
		return UU('Home-tag/vod',array('wd'=>urlencode($str)),true,false);
	}
}
// 内容页Tag链接
function gxl_content_url($content,$array_tag='',$sid=''){
	if($array_tag){
		foreach($array_tag as $key=>$value){
			$content = str_replace($value['tag_name'],'<a href="'.gxl_tag_url($value['tag_name'],$sid).'">'.$value['tag_name'].'</a>',$content);
		}
	}
	return $content;
}
// 自定义模板链接
function gxl_mytpl_url($tplname){
	$tplname = str_replace(array('my_','.html'),'',$tplname);
	if(C('url_html')){
		return C('site_path').C('url_mytpl').$tplname.C('html_file_suffix');
	}
	return UU('Home-my/show',array('id'=>trim($tplname)),true,false);
	print_r($tplname) ;
}
// 地图页链接
function gxl_map_url($tplname){
	if(C('url_html')){
		return C('site_path').C('url_map').$tplname.'.xml';
	}
	$limit = 30;
	if($tplname != 'rss'){
		$limit = 100;
	}
	return UU('Home-map/show',array('id'=>$tplname,'limit'=>$limit),true,false);
}
// 获取26个字母链接
function gxl_letter_url($file='vod',$str=''){
	if(C('url_html')){
		$index='index.html';
	}else{
		$index='index.php';
	}
    for($i=1;$i<=26;$i++){
	   $url = UU('Home-'.$file.'/search',array('id'=>chr($i+64),'x'=>'letter'),true,false);
	   $str.='<a href="'.$url.'" class="letter_on">'.chr($i+64).'</a>';
	}
	return $str;
}
// 获取搜索带链接
function gxl_search_url($str,$type="actor",$sidname='vod',$action='search'){
	$array = array();
    $str = str_replace(array('/','|',',','，'),' ',$str);
	$arr = explode(' ',$str);
	foreach($arr as $key=>$val){
		$array[$key] = '<a href="'.UU('Home-'.$sidname.'/'.$action,array($type=>urlencode($val)),true,false).'" target="_blank">'.$val.'</a>';
	}
	return implode(' ',$array);
}
// 获取影片最后一集array(sid,pid,jiname,jipath)

/*---------------------------------------标签解析函数开始------------------------------------------------------------------*/
//路径参数处理函数
function gxl_param_url(){
	$where = array();
	$where['sid'] = intval($_REQUEST['sid']);
	$where['id'] = intval($_REQUEST['id']);
	$where['year'] = intval($_REQUEST['year']);
	$where['language'] = htmlspecialchars(urldecode(trim($_REQUEST['language'])));
	$where['name'] = htmlspecialchars(urldecode($_REQUEST['name']));
	$where['area'] = htmlspecialchars(urldecode(trim($_REQUEST['area'])));
	$where['letter'] = htmlspecialchars($_REQUEST['letter']);
	$where['actor'] = htmlspecialchars(urldecode(trim($_REQUEST['actor'])));
	$where['director'] = htmlspecialchars(urldecode(trim($_REQUEST['director'])));
	$where['xb'] = htmlspecialchars(urldecode(trim($_REQUEST['xb'])));
	$where['wd'] = htmlspecialchars(urldecode(trim($_REQUEST['wd'])));
    $where['listdir'] = htmlspecialchars($_REQUEST['listdir']);
	$where['pinyin'] = htmlspecialchars($_REQUEST['pinyin']);
	$where['index'] = htmlspecialchars($_REQUEST['index']);
	$where['picm'] = intval($_REQUEST['picm']);
	$where['type'] = htmlspecialchars($_REQUEST['type']);
	$where['zy'] = htmlspecialchars(urldecode(trim($_REQUEST['zy'])));
	//
	$where['limit'] = !empty($_GET['limit']) ? intval($_GET['limit']) : 10;
	$where['page'] = !empty($_GET['p']) ? intval($_GET['p']) : 1;
	$where['order'] = gxl_order_by($_GET['order']);
	//小分类等路径处理QQ：182377860
	$where['mcid'] = intval($_REQUEST['mcid']);
	$where['p'] = intval($_REQUEST['p']);
	return $where;
}
//分页跳转参数处理
function gxl_param_jump($where){
	if($where['sid']){
		$jumpurl['sid'] = $where['sid'];
	}
	if($where['id']){
		$jumpurl['id'] = $where['id'];
		if(C('url_rewrite')){
    	$jumpurl['listdir'] = getlistdir($where['id']);
	}
	}
	if($where['dir']){
		$jumpurl['id'] = $where['id'];
		$jumpurl['listdir'] = $where['dir'];
	}
	if($where['pinyin']){
		$jumpurl['id'] = $where['id'];
		$jumpurl['pinyin'] = $where['pinyin'];
	}
	if($where['year']){
		$jumpurl['year'] = $where['year'];
	}		
	if($where['language']){
		$jumpurl['language'] = urlencode($where['language']);
	}
	if($where['area']){
		$jumpurl['area'] = urlencode($where['area']);
	}
	if($where['letter']){
		$jumpurl['letter'] = $where['letter'];
	}	
	if($where['actor']){
		$jumpurl['actor'] = urlencode($where['actor']);
	}
	if($where['zy']){
		$jumpurl['zy'] = urlencode($where['zy']);
	}	
	if($where['director']){
		$jumpurl['director'] = urlencode($where['director']);
	}
	//连载类型
	if($where['lz']){
		$jumpurl['lz'] = $where['lz'];
	}
	if($where['mcid']) {
		$jumpurl['mcid'] = $where['mcid']; 
	}
	if($where['picm']) {
		$jumpurl['picm'] = $where['picm']; 
	}
	if($where['type']) {
		$jumpurl['type'] = strtolower($where['type']); 
	}
	//连载类型
	if($where['wd']){
		$jumpurl['wd'] = urlencode($where['wd']);
	}
	if($where['name']){
		$jumpurl['name'] = $where['name'];
	}

	if($where['order'] != 'addtime' && $where['order']){
		$jumpurl['order'] = $where['order'];
	}
	$jumpurl['p'] = $where['p'];
	return $jumpurl;
}
//返回安全的orderby
function gxl_order_by($order = 'addtime'){
	if(empty($order)){
		return 'addtime';
	}
	$array = array();
	$array['addtime'] = 'addtime';
	$array['id'] = 'id';
	$array['hits'] = 'hits';
	$array['hits_month'] = 'hits_month';
	$array['hits_week'] = 'hits_week';
	$array['stars'] = 'stars';
	$array['up'] = 'up';
	$array['down'] = 'down';
	$array['gold'] = 'gold';
	$array['dir'] = 'dir';
	$array['golder'] = 'golder';
	$array['year'] = 'year';
	$array['letter'] = 'letter';
	$array['pinyin'] = 'pinyin';
	$array['listdir'] = 'listdir';
	$array['picm'] = 'picm';
	$array['type'] = 'type';
	//小分类
	$array['mcid'] = 'mcid';
	$array['filmtime'] = 'filmtime';
	return $array[trim($order)];
}
//生成参数列表,以数组形式返回
function gxl_param_lable($tag = ''){
	$param = array();
	$array = explode(';',str_replace('num:','limit:',$tag));
	foreach ($array as $v){
		list($key,$val) = explode(':',trim($v));
		$param[trim($key)] = trim($val);
	}
	return $param;
}
/******************************************
* @处理影视标签函数
* @以字符串方式传入,通过gxl_param_lable函数解析为以下变量
* name:vod 必须(vod/news/special/guestbook/common/user)
* ids:调用指定ID的一个或多个数据,如 1,2,3
* cid:数据所在分类,可调出一个或多个分类数据,如 1,2,3 默认值为全部,在当前分类为:'.$cid.'
* field:调用影视类的指定字段,如(id,title,actor) 默认全部
* limit:数据条数,默认值为10,可以指定从第几条开始,如3,8(表示共调用8条,从第3条开始)
* order:推荐方式(id/addtime/hits/year/up/down) (desc/asc/rand())
* wd:'关键字' 用于调用自定义关键字(搜索/标签)结果
* serial:调用连载信息(all/数字) 全部连载值为all 其它数字为大于该数字的连载影片
* time: 指定上传时间内,如(1/7/30) 分别表示(当天/本周/本月)------未做好
* stars:推荐星级数,可调出一个或多个星级数据,如 1,2,3 默认值为全部
* hits:大于指定人气值的数据(如:888)或某段之间的(如:888,999)
* up:大于指定支持值的数据(如:888)或某段之间的(如:888,999)
* down:大于指定反对值的数据(如:888)或某段之间的(如:888,999)
* gold:大于指定评分平均值的数据(如:6)或某段之间的(如:1,8)/范围:0-10
* golder:大于指定评分人的数据(如:888)或某段之间的(如:888,999)
*/


/*数据调用-专题循环标签*/
function gxl_mysql_special($tag){
	$search = array();$where = array();
	$tag = gxl_param_lable($tag);
	$field = !empty($tag['field']) ? $tag['field'] : '*';
	$limit = !empty($tag['limit']) ? $tag['limit'] : '10';
	$order = !empty($tag['order']) ? $tag['order'] : 'special_addtime';
	//优先从缓存调用
	if(C('data_cache_specialforeach') && C('currentpage') < 2 ){
		$data_cache_name = md5(C('data_cache_foreach').implode(',',$tag));
		$data_cache_content = S($data_cache_name);
		if($data_cache_content){
			return $data_cache_content;
		}
	}	
	//根据参数生成查询条件
	$where['special_status'] = array('eq',1);	
	if ($tag['stars']) {
		$where['special_stars'] = array('in',$tag['stars']);
	}
	if ($tag['ids']) {
		$where['special_id'] = array('in',$tag['ids']);
	}
	if ($tag['hits']) {
		$hits = explode(',',$tag['hits']);
		if (count($hits) > 1) {
			$where['special_hits'] = array('between',$hits[0].','.$hits[1]);
		}else{
			$where['special_hits'] = array('gt',$hits[0]);
		}
	}
	if ($tag['name']) {
		$where['special_name'] = array('like','%'.$tag['name'].'%');
	}
	//查询数据开始
	$rs = M('Special');
	if($tag['page']){
		//组合分页信息
		$count = $rs->where($where)->count('special_id');if(!$count){return false;}
		$totalpages = ceil($count/$limit);
		$currentpage = get_maxpage(C('currentpage'),$totalpages);
		//生成分页列表
		$pageurl = urldecode(C('jumpurl'));
		$pages = '<strong>共'.$count.'篇专题&nbsp;当前:'.$currentpage.'/'.$totalpages.'页&nbsp;</strong>'.getpage($currentpage,$totalpages,C('home_pagenum'),$pageurl,'pagego(\''.$pageurl.'\','.$totalpages.')');
		$pagestop = '<strong>'.$currentpage.'/'.$totalpages.'</strong>'.getpagetop($currentpage,$totalpages,C('home_pagenum'),$pageurl,'pagego(\''.$pageurl.'\','.$totalpages.')');	
		//数据列表
		$list = $rs->field($field)->where($where)->order($order)->limit($limit)->page($currentpage)->select();
		$list[0]['count'] = count($list);
		$list[0]['page'] = $pages;
		$list[0]['pagestop'] = $pagestop;	
	}else{
		$list = $rs->field($field)->where($where)->order($order)->limit($limit)->select();
	}
	//dump($rs->getLastSql());
	//循环赋值
	foreach($list as $key=>$val){
		$list[$key]['special_readurl'] = gxl_data_url('special',$list[$key]['special_id'],0,$list[$key]['special_name'],1,'',$list[$key]['special_letters']);
		$list[$key]['special_logo'] = gxl_img_url($list[$key]['special_logo'],$list[$key]['special_content']);
		$list[$key]['special_banner'] = gxl_img_url_small($list[$key]['special_banner'],$list[$key]['special_content']);		
	}
	//是否写入数据缓存
	if(C('data_cache_specialforeach') && C('currentpage') < 2 ){
		S($data_cache_name,$list,intval(C('data_cache_specialforeach')));
	}	
	return $list;
}





/*---------------------------------------ThinkPhp扩展函数库开始------------------------------------------------------------------
 * @category   Think
 * @package  Common
 * @author   liu21st <liu21st@gmail.com>*/
//输出安全的html
function h($text, $tags = null){
	$text	=	trim($text);
	//完全过滤注释
	$text	=	preg_replace('/<!--?.*-->/','',$text);
	//完全过滤动态代码
	$text	=	preg_replace('/<\?|\?'.'>/','',$text);
	//完全过滤js
	$text	=	preg_replace('/<script?.*\/script>/','',$text);

	$text	=	str_replace('[','&#091;',$text);
	$text	=	str_replace(']','&#093;',$text);
	$text	=	str_replace('|','&#124;',$text);
	//过滤换行符
	$text	=	preg_replace('/\r?\n/','',$text);
	//br
	$text	=	preg_replace('/<br(\s\/)?'.'>/i','[br]',$text);
	$text	=	preg_replace('/(\[br\]\s*){10,}/i','[br]',$text);
	//过滤危险的属性，如：过滤on事件lang js
	while(preg_match('/(<[^><]+)( lang|on|action|background|codebase|dynsrc|lowsrc)[^><]+/i',$text,$mat)){
		$text=str_replace($mat[0],$mat[1],$text);
	}
	while(preg_match('/(<[^><]+)(window\.|javascript:|js:|about:|file:|document\.|vbs:|cookie)([^><]*)/i',$text,$mat)){
		$text=str_replace($mat[0],$mat[1].$mat[3],$text);
	}
	if(empty($tags)) {
		$tags = 'table|td|th|tr|i|b|u|strong|img|p|br|div|strong|em|ul|ol|li|dl|dd|dt|a';
	}
	//允许的HTML标签
	$text	=	preg_replace('/<('.$tags.')( [^><\[\]]*)>/i','[\1\2]',$text);
	//过滤多余html
	$text	=	preg_replace('/<\/?(html|head|meta|link|base|basefont|body|bgsound|title|style|script|form|iframe|frame|frameset|applet|id|ilayer|layer|name|script|style|xml)[^><]*>/i','',$text);
	//过滤合法的html标签
	while(preg_match('/<([a-z]+)[^><\[\]]*>[^><]*<\/\1>/i',$text,$mat)){
		$text=str_replace($mat[0],str_replace('>',']',str_replace('<','[',$mat[0])),$text);
	}
	//转换引号
	while(preg_match('/(\[[^\[\]]*=\s*)(\"|\')([^\2=\[\]]+)\2([^\[\]]*\])/i',$text,$mat)){
		$text=str_replace($mat[0],$mat[1].'|'.$mat[3].'|'.$mat[4],$text);
	}
	//过滤错误的单个引号
	while(preg_match('/\[[^\[\]]*(\"|\')[^\[\]]*\]/i',$text,$mat)){
		$text=str_replace($mat[0],str_replace($mat[1],'',$mat[0]),$text);
	}
	//转换其它所有不合法的 < >
	$text	=	str_replace('<','&lt;',$text);
	$text	=	str_replace('>','&gt;',$text);
	$text	=	str_replace('"','&quot;',$text);
	 //反转换
	$text	=	str_replace('[','<',$text);
	$text	=	str_replace(']','>',$text);
	$text	=	str_replace('|','"',$text);
	//过滤多余空格
	$text	=	str_replace('  ',' ',$text);
	return $text;
}
// 随机生成一组字符串
function build_count_rand ($number,$length=4,$mode=1) {
    if($mode==1 && $length<strlen($number) ) {
        //不足以生成一定数量的不重复数字
        return false;
    }
    $rand   =  array();
    for($i=0; $i<$number; $i++) {
        $rand[] =   rand_string($length,$mode);
    }
    $unqiue = array_unique($rand);
    if(count($unqiue)==count($rand)) {
        return $rand;
    }
    $count   = count($rand)-count($unqiue);
    for($i=0; $i<$count*3; $i++) {
        $rand[] =   rand_string($length,$mode);
    }
    $rand = array_slice(array_unique ($rand),0,$number);
    return $rand;
}
//XSS漏洞过滤
function remove_xss($val) {
   $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);
   $search = 'abcdefghijklmnopqrstuvwxyz';
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $search .= '1234567890!@#$%^&*()';
   $search .= '~`";:?+/={}[]-_|\'\\';
   for ($i = 0; $i < strlen($search); $i++) {
      $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
      $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
   }
   $ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
   $ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
   $ra = array_merge($ra1, $ra2);
   $found = true; // keep replacing as long as the previous round replaced something
   while ($found == true) {
      $val_before = $val;
      for ($i = 0; $i < sizeof($ra); $i++) {
         $pattern = '/';
         for ($j = 0; $j < strlen($ra[$i]); $j++) {
            if ($j > 0) {
               $pattern .= '(';
               $pattern .= '(&#[xX]0{0,8}([9ab]);)';
               $pattern .= '|';
               $pattern .= '|(&#0{0,8}([9|10|13]);)';
               $pattern .= ')*';
            }
            $pattern .= $ra[$i][$j];
         }
         $pattern .= '/i';
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
         $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
         if ($val_before == $val) {
            // no replacements were made, so exit the loop
            $found = false;
         }
      }
   }
   return $val;
}
/*** 把返回的数据集转换成Tree
 +----------------------------------------------------------
 * @param array $list 要转换的数据集
 * @param string $pid parent标记字段
 * @param string $level level标记字段
 * @return array 
 */
function list_to_tree($list, $pk='id',$pid = 'pid',$child = '_child',$root=0)
{
    // 创建Tree
    $tree = array();
    if(is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] =& $list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId = $data[$pid];
            if ($root == $parentId) {
                $tree[] =& $list[$key];
            }else{
                if (isset($refer[$parentId])) {
                    $parent =& $refer[$parentId];
                    $parent[$child][] =& $list[$key];
                }
            }
        }
    }
    return $tree;
}
/**----------------------------------------------------------
 * 在数据列表中搜索
 +----------------------------------------------------------
 * @param array $list 数据列表
 * @param mixed $condition 查询条件
 * 支持 array('name'=>$value) 或者 name=$value
 * @return array
 */
function list_search($list,$condition) {
    if(is_string($condition))
        parse_str($condition,$condition);
    // 返回的结果集合
    $resultSet = array();
    foreach ($list as $key=>$data){
        $find   =   false;
        foreach ($condition as $field=>$value){
            if(isset($data[$field])) {
                if(0 === strpos($value,'/')) {
                    $find   =   preg_match($value,$data[$field]);
                }elseif($data[$field]==$value){
                    $find = true;
                }
            }
        }
        if($find)
            $resultSet[]     =   &$list[$key];
    }
    return $resultSet;
}
/**
 +----------------------------------------------------------
 * 字节格式化 把字节数格式为 B K M G T 描述的大小
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function byte_format($size, $dec=2)
{
	$a = array("B", "KB", "MB", "GB", "TB", "PB");
	$pos = 0;
	while ($size >= 1024) {
		 $size /= 1024;
		   $pos++;
	}
	return round($size,$dec)." ".$a[$pos];
}
/**
 +----------------------------------------------------------
 * 对查询结果集进行排序
 +----------------------------------------------------------
 * @access public
 +----------------------------------------------------------
 * @param array $list 查询结果
 * @param string $field 排序的字段名
 * @param array $sortby 排序类型
 * asc正向排序 desc逆向排序 nat自然排序
 +----------------------------------------------------------
 * @return array
 +----------------------------------------------------------
 */
function list_sort_by($list,$field, $sortby='asc') {
   if(is_array($list)){
       $refer = $resultSet = array();
       foreach ($list as $i => $data)
           $refer[$i] = &$data[$field];
       switch ($sortby) {
           case 'asc': // 正向排序
                asort($refer);
                break;
           case 'desc':// 逆向排序
                arsort($refer);
                break;
           case 'nat': // 自然排序
                natcasesort($refer);
                break;
       }
       foreach ( $refer as $key=> $val)
           $resultSet[] = &$list[$key];
       return $resultSet;
   }
   return false;
}
function ismobile() {    
   // 如果有HTTP_X_WAP_PROFILE则一定是移动设备 
   if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))        
       return true;        
    //此条摘自TPM智能切换模板引擎，适合TPM开发    
   if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])      
     return true;    
   //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息    
   if (isset ($_SERVER['HTTP_VIA']))        
        //找不到为flase,否则为true      
        return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;    
   //判断手机发送的客户端标志,兼容性有待提高    
   if (isset ($_SERVER['HTTP_USER_AGENT'])) { 
    $clientkeywords = array(            'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile');        
    //从HTTP_USER_AGENT中查找手机浏览器的关键字        
   if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) { 
    return true;       
        }    
   }   
    //协议法，因为有可能不准确，放到最后判断    
    if (isset ($_SERVER['HTTP_ACCEPT'])) {       
       // 如果只支持wml并且不支持html那一定是移动设备        
       // 如果支持wml和html但是wml在html之前则是移动设备        
    if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
         return true;       
        }    
      }   
       return false;
    } 
require("./Lib/Common/Common/con_common.php");
?>