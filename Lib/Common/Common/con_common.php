<?php
function UUU($model, $params, $redirect = true, $suffix = false)
{
	
	
	if (C("url_html")) {
		$reurl = str_replace("index.php?s=/", "index.php?s=", U($model, $params, $redirect, $suffix));
		
	}
	else {
		
		if(C('url_rewrite')){
		$models=str_replace("-","/",$model);
		
		$reurl =str_replace("index.php?s=/","", U($models, $params, $redirect, $suffix));
		
		}else{
		$reurl = str_replace("index.php?s=/", "?s=", U($model, $params, $redirect, $suffix));
		
		}
	}

	return $reurl;
}
// 循环标签.TAG话题
function gxl_mysql_tags($tag_str){
	$tag = gxl_param_lable($tag_str);
	$where = array();
	$order = (!empty($tag["order"]) ? $tag["order"] : "tag_id desc");
	$limit = (!empty($tag["limit"]) ? $tag["limit"] : 10);
	//根据参数生成查询条件
	if ($tag['ids']) {
		$where['tag_id'] = array('in',$tag['ids']);
	}
	if ($tag['cid']) {
		$where['tag_sid'] = array('in',$tag['cid']);
	}
	
	if ($tag['name']) {
		$where['tag_name'] = array('eq',''.$tag['name'].'');
	}
	
	if(S('tag_list'.$tag['cid'])){
	   
	  return  S('tag_list'.$tag['cid']);
	}
		
	$rs = new \Think\Model('Tag');
	$count = $rs->query("select count(1) as count from (select  *  from ".C('db_prefix')."tag  group by tag_sid,tag_name ) aa where tag_sid  in  (".$tag['cid'].")");
	$rs = D('Tag');
   
	$count=$count[0]["count"];	
    $home_pagenum=5;
    $totalpages = ceil($count / $limit);
	
	$currentpage = get_maxpage(C("currentpage"),$totalpages);
	$pageurl = urldecode(C("jumpurl"));
	$pages =  getpage($currentpage, $totalpages, $home_pagenum, $pageurl, "pagego('" . $pageurl . "'," . $totalpages . ")");
	$pagestop = "<strong>" . $currentpage . "/" . $totalpages . "</strong>" . getpagetop($currentpage, $totalpages, $home_pagenum, $pageurl, "pagego('" . $pageurl . "'," . $totalpages . ")");
	$list = $rs->field('*,count(tag_name) as tag_count')->where($where)->limit($limit)->page($currentpage)->group('tag_sid,tag_name')->order('tag_sid asc,tag_count desc')->select();
	
	$list[0]["count"] = count($list);
	$list[0]["page"] = $pages;
	$list[0]["pagecount"] = $count;
	$list[0]["pagetop"] = $pagestop;

		foreach($list as $key=>$val){
		   
			$list[$key]['tag_url'] = UU('Home-tag/show',array('type'=>ucfirst(getsidname($val['tag_sid'])),'name'=>urlencode($val['tag_name']),'mcid'=>$val['tag_sid']),'',true,false);
		}
	if(!S('tag_list'.$tag['cid'])){
	  	S('tag_list'.$tag['cid'], $list,30000);
	}
    return $list;
}
function gxl_mysql_down($tag)
{
	$search = array();
	$where = array();
	$tag = gxl_param_lable($tag);
	$field = (!empty($tag["field"]) ? $tag["field"] : "*");
	$limit = (!empty($tag["limit"]) ? $tag["limit"] : "10");
	$order = (!empty($tag["order"]) ? $tag["order"] : "down_addtime");
	if (C("data_cache_downforeach") && (C("currentpage") < 2)) {
		$data_cache_name = md5(C("data_cache_foreach") . implode(",", $tag));
		$data_cache_content = S($data_cache_name);

		if ($data_cache_content) {
			return $data_cache_content;
		}
	}
	$where["down_status"] = array("eq", 1);

	if (isset($tag["ids"])) {
		$where["down_id"] = array("in", $tag["ids"]);
	}

	if (isset($tag["day"])) {
		$where["down_addtime"] = array("gt", getxtime($tag["day"]));
	}

	if (isset($tag["hits"])) {
		$hits = explode(",", $tag["hits"]);

		if (1 < count($hits)) {
			$where["down_hits"] = array("between", $hits[0] . "," . $hits[1]);
		}
		else {
			$where["down_hits"] = array("gt", $hits[0]);
		}
	}

	if (isset($tag["cid"])) {
		$cids = explode(",", trim($tag["cid"]));

		if (1 < count($cids)) {
			$where["down_cid"] = array("in", getlistarr_tag($cids));
		}
		else {
			$where["down_cid"] = getlistsqlin($tag["cid"]);
		}
	}


	if (isset($tag["stars"])) {
		$where["down_stars"] = array("in", $tag["stars"]);
	}
	if (isset($tag["pic"])) {
		$where["down_pic"] = array('neq','');
		
	}
	if (isset($tag["letter"])) {
		$where["down_letter"] = array("in", $tag["letter"]);
	}

	if (isset($tag["name"])) {
		$where["down_name"] = array("like", "%" . $tag["name"] . "%");
	}

	if (isset($tag["title"])) {
		$where["down_title"] = array("like", "%" . $tag["title"] . "%");
	}


	if (isset($tag["wd"])) {
		$search["down_name"] = array("like", "%" . $tag["wd"] . "%");
		$search["down_inputer"] = array("like", "%" . $tag["wd"] . "%");
		$search["_logic"] = "or";
		$where["_complex"] = $search;
	}

	if (isset($tag["up"])) {
		$up = explode(",", $tag["up"]);

		if (1 < count($up)) {
			$where["down_up"] = array("between", $up[0] . "," . $up[1]);
		}
		else {
			$where["down_up"] = array("gt", $up[0]);
		}
	}

	if (isset($tag["down"])) {
		$down = explode(",", $tag["down"]);

		if (1 < count($down)) {
			$where["down_down"] = array("between", $down[0] . "," . $down[1]);
		}
		else {
			$where["down_down"] = array("gt", $down[0]);
		}
	}

	if (isset($tag["gold"])) {
		$gold = explode(",", $tag["gold"]);

		if (1 < count($gold)) {
			$where["down_gold"] = array("between", $gold[0] . "," . $gold[1]);
		}
		else {
			$where["down_gold"] = array("gt", $gold[0]);
		}
	}

	if (isset($tag["golder"])) {
		$golder = explode(",", $tag["golder"]);

		if (1 < count($golder)) {
			$where["down_golder"] = array("between", $golder[0] . "," . $golder[1]);
		}
		else {
			$where["down_golder"] = array("gt", $golder[0]);
		}
	}

    if ($tag["tag"]) {
        if($tag["sid"]){
        	$tagwhere["tag_sid"] = $tag["sid"];
        }
		    $tagwhere["tag_name"] =urldecode($tag["tag"]);
			$rs = D('TagdownView');
		
		  
		if(S('down_count'.$tagwhere["tag_name"])){
	     $count =  S('down_count'.$tagwhere["tag_name"]);
	    }else{
		  $count = $rs->where($tagwhere)->count();
        // 缓存数据300秒
         S('down_count'.$tagwhere["tag_name"],$count,3000);
	    }
	
		 	
	}
	else {
		$rs = M("down");
		if(S('down_count'.$where["down_cid"])){
	     $count =  S('down_count'.$where["down_cid"]);
	    }else{
		  $count = $rs->where($where)->count();
        // 缓存数据300秒
         S('down_count'.$where["down_cid"],$count,3000);
	    }
	  
	}
  
	if (isset($tag["page"])) {
	  
       
		if (!$count) {
			return false;
		}
        $home_pagenum=5;
		$totalpages = ceil($count / $limit);
		$currentpage = get_maxpage(C("currentpage"),$totalpages);
		$pageurl = urldecode(C("jumpurl"));
	
		if ($tag["tag"]) {
		  $list = $rs->field($field)->where($tagwhere)->order($order)->limit($limit)->page($currentpage)->select(); 	
	    }else{
	       $list = $rs->field($field)->where($where)->order($order)->limit($limit)->page($currentpage)->select();
	    }
		$pages =  getpage($currentpage, $totalpages, $home_pagenum, $pageurl, "pagego('" . $pageurl . "'," . $totalpages . ")");
		$pagestop = "<strong>" . $currentpage . "/" . $totalpages . "</strong>" . getpagetop($currentpage, $totalpages, $home_pagenum, $pageurl, "pagego('" . $pageurl . "'," . $totalpages . ")");
		
		$list[0]["count"] = count($list);
		$list[0]["page"] = $pages;
		$list[0]["pagecount"] = $count;
		$list[0]["pagetop"] = $pagestop;
	}
	else {
	    if ($tag["tag"]) {
		  $list = $rs->field($field)->where($tagwhere)->order($order)->limit($limit)->select();
	    }else{
	      $list = $rs->field($field)->where($where)->order($order)->limit($limit)->select();  
	    }
		if ($tag["count"] && empty($tag["page"])) {
			$count = $rs->where($where)->count("down_id");

			if (!$count) {
				return false;
			}

			$list[0]["counts"] = $count;
		}
	}
		
	foreach ($list as $key => $val ) {
	
		$down_jumpurl=empty($list[$key]["down_jumpurl"])?'':$list[$key]["down_jumpurl"];
		$down_content=empty($list[$key]["down_content"])?'':$list[$key]["down_content"];
		$list[$key]["list_id"] = $list[$key]["down_cid"];
		$list[$key]["list_name"] = getlistname($list[$key]["list_id"], "list_name");
		$list[$key]["list_url"] = getlistname($list[$key]["list_id"], "list_url");
		$list[$key]["down_readurl"] = gxl_data_url("down", $list[$key]["down_id"],$list[$key]["down_cid"], $list[$key]["down_name"], 1,$down_jumpurl);
		$list[$key]["down_picurl"] =$list[$key]["down_pic"]?gxl_img_url($list[$key]["down_pic"],$down_content): gxl_img_url($list[$key]["down_icon"],$down_content);
		if (array_key_exists("down_icon", $val)) {
		$list[$key]["down_iconurl"] = gxl_img_url($list[$key]["down_icon"],$down_content);
		}
	}

	if (C("data_cache_downforeach") && (C("currentpage") < 2)) {
		S($data_cache_name, $list, intval(C("data_cache_downforeach")));
	}

	return $list;
}
function get_doc_list($id,$cid){
	
	$list=M('doc_list')->where(array('list_docid'=>$id))->order('list_oid asc')->select();
	$data=M('doc_list as a')->join('gxl_doc_news as b on b.news_cid=a.list_name')->where(array('a.list_docid'=>$id))->field('b.news_id,b.news_name,b.news_cid,b.news_jumpurl,b.news_letters')->select();
	foreach($data as $k=>$v){
		$data[$k]["news_name"]=htmlentities($v["news_name"]);
		
		
		
	}
	foreach($data as $k=>$v){
		$v['news_readurl']=gxl_data_type_url("doc", $v["news_id"], $v["news_cid"], $v["news_name"], 1,$v["news_jumpurl"], $v["news_letters"],$cid);
		$array[$v['news_cid']][$k]=$v;
		
		
	}
	
	foreach($list as $k=>$v){
		
		$list[$k]['array']=$array[$v['list_name']];

		
	}
	
	return $list;
}
function curl_post($url, $data, $Content, $token) {
    $ip = "101.".mt_rand(1,255).".".mt_rand(1,255).".".mt_rand(1,255);
    $ch = curl_init();
    $headers = array(
        "Content-Type: $Content",
        "Origin: https://beian.miit.gov.cn/",
        "Referer: https://beian.miit.gov.cn/",
        "token: $token",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36",
        "CLIENT-IP: $ip",
        "X-FORWARDED-FOR: $ip"
    );
    curl_setopt($ch, CURLOPT_URL, "https://hlwicpfwc.miit.gov.cn/icpproject_query/api/" . $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $content = curl_exec($ch);
	
    curl_close($ch);
    return $content;
}
function getTopHost($url) {
	
	if(strpos($url,"-")){
		return $url;
	}
	if(strpos($url, "备")){
		return $url;
	}
	if(strpos($url, "号")){
		return $url;
	}

    if (stristr($url, "http") === false) {
        $url = "http://" . $url;
    }
	
    $url = strtolower($url);
    $hosts = parse_url($url);
    $host = $hosts['host'];
    $data = explode('.', $host);
    $n = count($data);
    $preg = '/[\w].+\.(com|net|org|gov|edu)\.cn$/';
    $pregip = '/((2(5[0-5]|[0-4]\d))|[0-1]?\d{1,2})(\.((2(5[0-5]|[0-4]\d))|[0-1]?\d{1,2})){3}/';
    if (($n > 2) && preg_match($preg, $host)) {
        $host = $data[$n - 3] . '.' . $data[$n - 2] . '.' . $data[$n - 1];
    } elseif (preg_match($pregip, $host)) {
        $host = $host;
    } else {
        $host = $data[$n - 2] . '.' . $data[$n - 1];
    }
	
    return $host;
}
function baidutu($url)
{
    
	if (is_array($url)) {
		$urls = $url;
	}
	else {
		$urls = array(rtrim(C("site_url"), "/") . $url);
	}

	$api = C("baidu_tui");
 
  
	$ch = curl_init();
	$options = array(
		CURLOPT_URL            => $api,
		CURLOPT_POST           => true,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CONNECTTIMEOUT => 8,
		CURLOPT_TIMEOUT        => 6,
		CURLOPT_POSTFIELDS     => implode("\n", $urls),
		CURLOPT_HTTPHEADER     => array("Content-Type: text/plain")
		);
	curl_setopt_array($ch, $options);
	$result = curl_exec($ch);
	$success = json_decode($result, true);
	curl_close($ch);
	
    if(C("bing_api")){
		
		bing($url);
		
	}
	if ($success["success"]) {
		return "百度数据推送<font color=red>" . $success["success"] . "</font>条，今日剩余<font color=red>" . $success["remain"] . "</font>条";
	}
	else {
		return "百度数据推送失败";
	}
}
function bing($url){
    $urls = array(
    'siteUrl'=>C('site_url'),
    'url'=>C('site_url').$url
    );
    $api ='https://ssl.bing.com/webmaster/api.svc/json/SubmitUrl?apikey='.C('bing_api');
    
    $result = https_post($api,$urls);
  

}
function bingindex($urls,$source,$page){
$url = 'https://api.indexnow.org/indexnow';

// Create the data array
if($source=='pc'){
    $data = array(
    'host' => 'www.sxiaw.com',
    'key' => 'f42c9d155cc347da92691eb8085c108f',
    'keyLocation' => 'https://www.sxiaw.com/f42c9d155cc347da92691eb8085c108f.txt',
    'urlList' =>$urls
);
}
if($source=='m'){
    $data = array(
    'host' => 'm.sxiaw.com',
    'key' => '8eecda44366e48ce849f90f054925ca7',
    'keyLocation' => 'https://m.sxiaw.com/8eecda44366e48ce849f90f054925ca7.txt',
    'urlList' =>$urls
);
}

$response=https_post($url,$data);



  

}
function https_post($url,$data) {
    $postdata = json_encode($data);

    $headers = array(
        "content-type: application/json;charset=UTF-8",//设置请求头  请求的内容格式，编码
        "Accept: application/json",   //Accept字段头确定客户端可以接收的媒体类型
        "Cache-Control: no-cache",
        "Pragma: no-cache",
    );
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60); //设置超时
    if(0 === strpos(strtolower($url), 'https')) {
        //https请求
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //对认证证书来源的检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //从证书中检查SSL加密算法是否存在
    }
    curl_setopt( $ch, CURLOPT_POST, true);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
    $resp = curl_exec ($ch);

    curl_close ( $ch );
    return $resp;
}
function gxl_img_url_preg_news($file, $content, $number = 1)
{
	preg_match_all("/<img(.*?)src=\"(.*?)(?=\")/si", $content, $imgarr);
	preg_match_all("/(?<=src=\").*?(?=\")/si", implode("\" ", $imgarr[0]) . "\" ", $imgarr);
	$countimg = count($imgarr[0]);

	if ($countimg == 1) {
		return $imgarr[0][0];
	}

	foreach ($imgarr[0] as $key => $val ) {
		$pic = getimagesize($val);

		if ($pic[1] < $pic[0]) {
			return $val;
		}
	}

	return $imgarr[0][0];
}

function gxl_img_url_array($content)
{
	$contimg = C("news_images");
	preg_match_all("/<img(.*?)(?=>)/si", $content, $imgarr);

	foreach ($imgarr[0] as $key => $value ) {
		preg_match("/(?<=alt=\").*?(?=\")/si", $value, $title);
		preg_match("/(?<=src=\").*?(?=\")/si", $value, $imgurl);
		$array[$key]["img"] = $imgurl[0];
		$array[$key]["alt"] = $title[0];
	}

	$countarray = count($array);

	if ($contimg < $countarray) {
		return $array;
	}
}

function ThunderEncode($url)
{
	$thunderPrefix = "AA";
	$thunderPosix = "ZZ";
	$thunderTitle = "thunder://";
	$thunderUrl = $thunderTitle . base64_encode($thunderPrefix . $url . $thunderPosix);
	if ((strpos($url, "http://") !== false) || (strpos($url, "ftp://") !== false)) {
		return $thunderUrl;
	}
	else {
		return $url;
	}
}


function getnews($id, $field)
{
	$rs = M("News");
	$where["news_id"] = $id;
	$field = (!empty($field) ? $field : "*");
	$list = $rs->field($field)->where($where)->find();

	if ($list) {
		return $list;
	}

	return "";
}


function getlistdir($cid)
{
	$arr = list_search(F("_gxlnews/list"), "list_id=" . $cid);

	if (empty($arr)) {
		return 0;
	}
	else {
		return $arr[0]["list_dir"];
	}
}


function getlistpid($id)
{
	$list_mod = M("list");
	$arr = $list_mod->where("list_id='$id'")->field("list_pid")->find();

	if ($arr["list_pid"] == "0") {
		$condition = $id;
	}
	else {
		$condition = $arr["list_pid"];
	}

	return $condition;
}


function getmd5($id)
{
	if (!empty($id) && intval($id)) {
		$id = md5($id);
		return $id;
	}

	return "";
}

function gediridmd($id)
{
	$rs = M("List");
	$where["list_dir"] = $id;
	$list = $rs->where($where)->getField("list_id");
	if (!empty($list) && intval($list)) {
		$list = md5($list);
		return $list;
	}

	return "";
}

function gelistdir_id($id)
{
	$rs = M("List");
	$where["list_id"] = $id;
	$list = $rs->where($where)->getField("list_dir");

	if (!empty($list)) {
		return $list;
	}

	return "";
}

function getsppinyin($id)
{
	$rs = M("Special");
	$where["special_id"] = $id;
	$list = $rs->where($where)->getField("special_letters");

	if (!empty($list)) {
		return $list;
	}

	return "";
}

function get_sp_id_by_name($name)
{
	$rs = M("Special");
	$where["special_letters"] = $name;
	$list = $rs->field("special_id")->where($where)->limit(1)->select();

	if (!empty($list[0])) {
		return $list[0]["special_id"];
	}

	return "";
}

function get_id_by_dir($dir)
{
	$arr = list_search(F("_gxlnews/list"), "list_dir=" . $dir);

	if (empty($arr)) {
		return 0;
	}
	else {
		return $arr[0]["list_id"];
	}
}

function getlistall($cid)
{
	$tree = list_search(F("_gxlnews/listtree"), "list_id=" . $cid);
	
	if (!empty($tree[0]["son"])) {
	
		foreach ($tree[0]["son"] as $val ) {
			$param[] = $val;
		}

		return $param;
	}
	else {
		
		$tree = list_search(F("_gxlnews/listtree"), "list_pid=0");
		return $tree;
	}
}


function getarraypic($contents)
{
	if ($contents == NULL) {
		return false;
	}

	preg_match_all("/<img(.*?)src=\"(.*?)(?=\")/si", $contents, $imgarr);
	preg_match_all("/(?<=src=\").*?(?=\")/si", implode("\" ", $imgarr[0]) . "\" ", $imgarr);

	if (is_array($imgarr[0])) {
		return $imgarr[0];
	}

	return false;
}

function gxl_news_img_array($content, $type,$name)
{
    
    //$content= gxl_alt($content,$name);
	$prefix = C("upload_http_prefix");

	if ($content == NULL) {
		return false;
	}

	preg_match_all("/<img(.*?)src=\"(.*?)(?=\")/si", $content, $imgarr);
	preg_match_all("/(?<=src=\").*?(?=\")/si", implode("\" ", $imgarr[0]) . "\" ", $imgarr);

	if (is_array($imgarr[0])) {
		$picarray = $imgarr[0];
	}

	$pathArr = array();

	foreach ($picarray as $key => $value ) {
		if (0 < strpos($value, "ttp")) {
			$pathArr[] = $value;
		}
		else if ($type == 1) {
			$pathArr[] = str_replace(C("site_path") . C("upload_path") . "/", "", $value);
		}
		else {
		
			if (($type == 2) && !empty($prefix)) {
				$pathArr[] = $prefix . $value;
			}
			else {
			
				$pathArr[] = C("site_path") . C("upload_path") . "/" . $value;
				
			}
		}
	}

	if (is_array($pathArr)) {
		$data=str_ireplace(array_unique($picarray), array_unique($pathArr), $content);
		
		return $data;
	}

	return $content;
}

function gxl_news_imgs_array($content)
{
	$content = preg_replace("/<img(.*?)>/si", "", $content);
	return $content;
}



function safe_replace($string)
{
	$string = str_replace("%20", "", $string);
	$string = str_replace("%27", "", $string);
	$string = str_replace("%2527", "", $string);
	$string = str_replace("*", "", $string);
	$string = str_replace("\"", "&quot;", $string);
	$string = str_replace("'", "", $string);
	$string = str_replace("\"", "", $string);
	$string = str_replace(";", "", $string);
	$string = str_replace("<", "&lt;", $string);
	$string = str_replace(">", "&gt;", $string);
	$string = str_replace("{", "", $string);
	$string = str_replace("}", "", $string);
	$string = str_replace("\\", "", $string);
	return $string;
}

function get_replace_input($str, $rptype = 0)
{
	$str = stripslashes($str);
	$str = htmlspecialchars($str);
	$str = get_replace_nb($str);
	return addslashes($str);
}

function get_replace_nr($str)
{
	$str = str_replace(array("<nr/>", "<rr/>"), array("\n", "\r"), $str);
	return trim($str);
}

function get_replace_nb($str)
{
	$str = str_replace("&nbsp;", " ", $str);
	$str = str_replace("　", " ", $str);
	$str = ereg_replace("[\r\n\t ]{1,}", " ", $str);
	return trim($str);
}

function get_cms_page_max($count, $limit, $page)
{
	$totalPages = ceil($count / $limit);

	if ($totalPages < $page) {
		$page = $totalPages;
	}

	return $page;
}

function get_cms_page($totalrecords, $pagesize, $currentpage, $params, $filename = "条数据", $pagego = true, $halfPer = 5)
{
	$page["totalrecords"] = $totalrecords;
	$page["totalpages"] = ceil($page["totalrecords"] / $pagesize);
	$page["currentpage"] = $currentpage;
	$page["urlpage"] = $params . "{!page!}";
	$page["listpages"] = "";

	if ($pagego) {
		$pagego = "jumpurl('" . $page["urlpage"] . "'," . $page["totalpages"] . ")";
	}

	$page["listpages"] .= get_cms_page_css($page["currentpage"], $page["totalpages"], $halfPer, $page["urlpage"], $pagego);
	return $page;
}

function get_cms_page_css($currentPage, $totalPages, $halfPer = 5, $url, $pagego)
{
	$linkPage .= (1 < $currentPage ? "<a href=\"" . str_replace("{!page!}", 1, $url) . "\" class=\"pagegbk\" target=\"_self\">首页</a>&nbsp;<a href=\"" . str_replace("{!page!}", $currentPage - 1, $url) . "\" class=\"pagegbk\" target=\"_self\">上一页</a>&nbsp;" : "<em>首页</em>&nbsp;<em>上一页</em>&nbsp;");
	$i = $currentPage - $halfPer;
	(1 < $i) || ($i = 1);
	$j = $currentPage + $halfPer;
	($j < $totalPages) || ($j = $totalPages);

	for (; $i < ($j + 1); $i++) {
		$linkPage .= ($i == $currentPage ? "<span>" . $i . "</span>&nbsp;" : "<a href=\"" . str_replace("{!page!}", $i, $url) . "\" target=\"_self\">" . $i . "</a>&nbsp;");
	}

	$linkPage .= ($currentPage < $totalPages ? "<a href=\"" . str_replace("{!page!}", $currentPage + 1, $url) . "\" class=\"pagegbk\" target=\"_self\">下一页</a>&nbsp;<a href=\"" . str_replace("{!page!}", $totalPages, $url) . "\" class=\"pagegbk\" target=\"_self\">尾页</a>" : "<em>下一页</em>&nbsp;<em>尾页</em>");

	if (!empty($pagego)) {
		$linkPage .= "&nbsp;<input type=\"input\" name=\"page\" id=\"page\" class=\"pageinput\"/><input type=\"button\" value=\"跳 转\" onclick=\"" . $pagego . "\" class=\"pagebg\"/>";
	}

	return str_replace("_1" . C("html_file_suffix"), C("html_file_suffix"), str_replace("index1" . C("html_file_suffix"), "", $linkPage));
}

function checkbox($array = array(), $id = "", $str = "", $defaultvalue = "", $width = 0, $field = "")
{
	$string = "";
	$id = trim($id);

	if ($id != "") {
		$id = (strpos($id, ",") ? explode(",", $id) : array($id));
	}

	if ($defaultvalue) {
		$string .= "<input type=\"hidden\" " . $str . " value=\"-99\">";
	}

	$i = 1;

	foreach ($array as $key => $value ) {
		$key = trim($key);
		$checked = ($id && in_array($key, $id) ? "checked" : "");

		if ($width) {
			$string .= "<label class=\"ib\" style=\"width:" . $width . "px\">";
		}

		$string .= "<input type=\"checkbox\" " . $str . " id=\"" . $field . "_" . $i . "\" " . $checked . " value=\"" . htmlspecialchars($key) . "\"> " . htmlspecialchars($value);

		if ($width) {
			$string .= "</label>";
		}

		$i++;
	}

	return $string;
}

function url_check($url, $baseurl, $config)
{
	$urlinfo = parse_url($baseurl);
	$baseurl = $urlinfo["scheme"] . "://" . $urlinfo["host"] . (substr($urlinfo["path"], -1, 1) === "/" ? substr($urlinfo["path"], 0, -1) : str_replace("\\", "/", dirname($urlinfo["path"]))) . "/";

	if (strpos($url, "://") === false) {
		if ($url[0] == "/") {
			$url = $urlinfo["scheme"] . "://" . $urlinfo["host"] . $url;
		}
		else if ($config["page_base"]) {
			$url = $config["page_base"] . $url;
		}
		else {
			$url = $baseurl . $url;
		}
	}

	return $url;
}

function get_html($url, &$config)
{
	if (!get_headers($url)) {
		return false;
	}

	$ctx = stream_context_create(array(
	"http" => array("timeout" => 30)
	));
	if (!empty($url) && ($html = @file_get_contents($url, 0, $ctx))) {
		if (($syscharset != $config["sourcecharset"]) && ($config["sourcetype"] != 4)) {
			$html = iconv($config["sourcecharset"], "utf-8", $html);
		}

		return $html;
	}
	else {
		return false;
	}
}

function cut_html($html, $start, $end)
{
	if (empty($html)) {
		return false;
	}

	$html = str_replace(array("\r", "\n"), "", $html);
	$start = str_replace(array("\r", "\n"), "", $start);
	$end = str_replace(array("\r", "\n"), "", $end);
	$start = stripslashes($start);
	$end = stripslashes($end);

	if (!empty($start)) {
		$html = explode(trim($start), $html);
	}

	if (!empty($end) && is_array($html)) {
		$html = explode(trim($end), $html[1]);
		return $html[0];
	}
	else {
		return $html;
	}
}

function replace_sg($html)
{
	$list = explode("[内容]", $html);

	if (is_array($list)) {
		foreach ($list as $k => $v ) {
			$list[$k] = str_replace(array("\r", "\n"), "", trim($v));
		}
	}

	return $list;
}

function replace_item($html, $config)
{
	if (empty($config)) {
		return $html;
	}

	$config = explode("\n", $config);
	$patterns = $replace = array();
	$p = 0;

	foreach ($config as $k => $v ) {
		if (empty($v)) {
			continue;
		}

		$c = explode("[|]", $v);
		$patterns[$k] = "/" . str_replace("/", "\/", $c[0]) . "/i";
		$replace[$k] = $c[1];
		$p = 1;
	}

	return $p ? @preg_replace($patterns, $replace, $html) : false;
}

function Doaddslashes($str)
{
	if (!is_array($str)) {
		return addslashes($str);
	}

	foreach ($str as $key => $val ) {
		$str[$key] = Doaddslashes($val);
	}

	return $str;
}

function Dostripslashes($str)
{
	if (!is_array($str)) {
		return stripslashes($str);
	}

	foreach ($str as $key => $val ) {
		$str[$key] = Dostripslashes($val);
	}

	return $str;
}

function string2array($data)
{
	if (is_array($data)) {
		return $data;
	}

	if ($data == "") {
		return array();
	}

	$data = dostripslashes($data);
	@eval("\$array = $data;");
	return $array;
}

function array2string($data, $isformdata = 1)
{
	if ($data == "") {
		return "";
	}

	if ($isformdata) {
		$data = dostripslashes($data);
	}

	return addslashes(var_export($data, true));
}

function download_img($old, $out)
{
	if (!empty($old) && !empty($out) && (strpos($out, "://") === false)) {
		return str_replace($out, url_check($out, $url, $config), $old);
	}
	else {
		return $old;
	}
}

function str_replace_all($data)
{
	$out = str_replace(array("(", ")", "[", "]", ".", "*", "/", "?", "+", "\$"), array("\(", "\)", "\[", "\]", "\.", ".*?", "\/", "\?", "\+", "\\\$"), $data);
	return $out;
}

function get_syschannel_id($cname, $type = "list_id")
{
	$arr = list_search(F("_gxlnews/list"), "list_name=" . $cname);
	if (is_array($arr) && !empty($arr)) {
		return $arr[0][$type];
	}
	else {
		return false;
	}
}

function get_channel_id($cname, $type = "list_id")
{
	$arr = list_search(F("_gxlnews/list"), "list_name=" . $cname);
	if (is_array($arr) && !empty($arr)) {
		return $arr[0][$type];
	}
	else {
		$arr = list_search(F("_gxlnews/list"), "list_name=/" . mb_substr($cname, 0, 2, "utf-8") . "([\s\S]*?)/");
		if (is_array($arr) && !empty($arr)) {
			return $arr[0][$type];
		}
		else {
			return false;
		}
	}
}

function get_Autochannel_id($cname, $nid, $type = "reid")
{
	$arr = list_search(F("_gxlnews/Autochannel"), "cname=" . $cname . "_" . $nid);
	if (is_array($arr) && !empty($arr)) {
		return $arr[0][$type];
	}
	else {
		$arr = list_search(F("_gxlnews/Autochannel"), "cname=" . $cname . "_0");
		if (is_array($arr) && !empty($arr)) {
			return $arr[0][$type];
		}
		else {
			return false;
		}
	}
}


function get_channel_son($pid)
{
	$tree = list_search(F("_gxlnews/list"), "list_id=" . $pid);

	if (!empty($tree[0]["son"])) {
		return false;
	}
	else {
		return true;
	}
}

function getReq($a1, $a2)
{
	$a = array();

	foreach ($a2 as $key => $row ) {
		if (isset($a1[$key])) {
			if ($row == "string") {
				$a[$key] = $a1[$key];
			}
			else {
				$a[$key] = intval($a1[$key]);
			}
		}
		else if ($row == "string") {
			$a[$key] = "";
		}
		else {
			$a[$key] = 0;
		}
	}

	return $a;
}


function get_replace_html($str, $start = 0, $length, $charset = "utf-8", $suffix = false)
{
	return msubstr(eregi_replace("<[^>]+>", "", ereg_replace("[\r\n\t ]{1,}", " ", get_replace_nb($str))), $start, $length, $charset, $suffix);
}

function gxl_alt($html,$name){
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dom = new DOMDocument();
$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

$imgs = $dom->getElementsByTagName('img');
foreach ($imgs as $img) {
  if ($img->hasAttribute('alt')) {
    $img->setAttribute('alt', $name);
  } else {
    $img->setAttribute('alt', $name);
  }
}

$newHtml = $dom->saveHTML($dom->getElementsByTagName('body')->item(0));
$newHtml = mb_convert_encoding($newHtml, 'UTF-8', 'HTML-ENTITIES');
return $newHtml;
}
function gxl_rand($length,$limit=10000) {

  $arr = array();
  for ($i = 0; $i < $length; $i++) {
    $arr[] = mt_rand(1, $limit); // 生成 1~100 之间的随机数
  }
  return implode(',',$arr);
}
function gxl_mysql_news($tag)
{
	$search = array();
	$where = array();
	$tag = gxl_param_lable($tag);
	$field = (!empty($tag["field"]) ? $tag["field"] : "*");
	$limit = (!empty($tag["limit"]) ? $tag["limit"] : "10");
	$order = (!empty($tag["order"]) ? $tag["order"] : "news_addtime");
	if (C("data_cache_newsforeach") && (C("currentpage") < 2)) {
		$data_cache_name = md5(C("data_cache_foreach") . implode(",", $tag));
		$data_cache_content = S($data_cache_name);

		if ($data_cache_content) {
			return $data_cache_content;
		}
	}
	$where["news_status"] = array("eq", 1);

	if ($tag["ids"]) {
		$where["news_id"] = array("in", $tag["ids"]);
	}

	if ($tag["day"]) {
		$where["news_addtime"] = array("gt", getxtime($tag["day"]));
	}

	if ($tag["hits"]) {
		$hits = explode(",", $tag["hits"]);

		if (1 < count($hits)) {
			$where["news_hits"] = array("between", $hits[0] . "," . $hits[1]);
		}
		else {
			$where["news_hits"] = array("gt", $hits[0]);
		}
	}

	if ($tag["cid"]) {
		$cids = explode(",", trim($tag["cid"]));

		if (1 < count($cids)) {
			$where["news_cid"] = array("in", getlistarr_tag($cids));
		}
		else {
			$where["news_cid"] = getlistsqlin($tag["cid"]);
		}
	}

	if ($tag["stars"]) {
		$where["news_stars"] = array("in", $tag["stars"]);
	}
	if ($tag["pic"]) {
		$where["news_pic"] = array("like", "%" . $tag["pic"] . "%");
	}
	if ($tag["letter"]) {
		$where["news_letter"] = array("in", $tag["letter"]);
	}

	if ($tag["name"]) {
		$where["news_name"] = array("like", "%" . $tag["name"] . "%");
	}

	if ($tag["title"]) {
		$where["news_title"] = array("like", "%" . $tag["title"] . "%");
	}

	if ($tag["no"]) {
		$where["news_id"] = array("neq", $tag["no"]);
	}

	if ($tag["wd"]) {
		$search["news_name"] = array("like", "%" . $tag["wd"] . "%");
		$search["news_inputer"] = array("like", "%" . $tag["wd"] . "%");
		$search["_logic"] = "or";
		$where["_complex"] = $search;
	}

	if ($tag["up"]) {
		$up = explode(",", $tag["up"]);

		if (1 < count($up)) {
			$where["news_up"] = array("between", $up[0] . "," . $up[1]);
		}
		else {
			$where["news_up"] = array("gt", $up[0]);
		}
	}

	if ($tag["down"]) {
		$down = explode(",", $tag["down"]);

		if (1 < count($down)) {
			$where["news_down"] = array("between", $down[0] . "," . $down[1]);
		}
		else {
			$where["news_down"] = array("gt", $down[0]);
		}
	}

	if ($tag["gold"]) {
		$gold = explode(",", $tag["gold"]);

		if (1 < count($gold)) {
			$where["news_gold"] = array("between", $gold[0] . "," . $gold[1]);
		}
		else {
			$where["news_gold"] = array("gt", $gold[0]);
		}
	}

	if ($tag["golder"]) {
		$golder = explode(",", $tag["golder"]);

		if (1 < count($golder)) {
			$where["news_golder"] = array("between", $golder[0] . "," . $golder[1]);
		}
		else {
			$where["news_golder"] = array("gt", $golder[0]);
		}
	}


	 if ($tag["tag"]) {
		$tagwhere["tag_sid"] = $tag["sid"]? $tag["sid"]:2;
	    $tagwhere["tag_name"] =urldecode($tag["tag"]);
		$rs = D('TagnewsView');
		if(S('news_count'.$tagwhere["tag_name"])){
	     $count =  S('news_count'.$tagwhere["tag_name"]);
	    }else{
		 $count = $rs->where($tagwhere)->count();
        // 缓存数据300秒
         S('news_count'.$tagwhere["tag_name"],$count,3000);
	    } 	
	}
	else if ($tag["news"]) {
		if ($tag["type"]) {
			$where["newsrel_sid"] = $tag["type"];
		}

		if (!empty($tag["did"])) {
			$search["newsrel_did"] = $tag["did"];
			$search["newsrel_name"] = $tag["news"];
			$search["_logic"] = "or";
			$where["_complex"] = $search;
		}
		else {
			$where["newsrel_name"] = $tag["news"];
		}

		$rs = D("StarnewsView");
	}
	else {
		$rs = M("News");
		 if(S('news_count'.$where["news_cid"])){
	    $count =  S('news_count'.$where["news_cid"]);
	    }else{
		$count = $rs->where($where)->count("news_id");
        // 缓存数据300秒
        S('news_count'.$where["news_cid"],$count,3000);
	    }
		
	}
    
		 
	if ($tag["page"]) {
	    if (!$count) {
			return false;
		}
	 
        $home_pagenum=5;
		$totalpages = ceil($count / $limit);
		$currentpage = get_maxpage(C("currentpage"), $totalpages);
		$pageurl = urldecode(C("jumpurl"));
		$pages = getpage($currentpage, $totalpages,$home_pagenum, $pageurl, "pagego('" . $pageurl . "'," . $totalpages . ")");
		$pagestop = "<strong>" . $currentpage . "/" . $totalpages . "</strong>" . getpagetop($currentpage, $totalpages, $home_pagenum, $pageurl, "pagego('" . $pageurl . "'," . $totalpages . ")");
		$list = $rs->field($field)->where($where)->order($order)->limit($limit)->page($currentpage)->select();
		
		if ($tag["tag"]) {
		   
		  $list = $rs->field($field)->where($tagwhere)->order($order)->limit($limit)->page($currentpage)->select(); 	
	    }else{
	       $list = $rs->field($field)->where($where)->order($order)->limit($limit)->page($currentpage)->select();
	    }
		$list[0]["count"] = count($list);
		$list[0]["page"] = $pages;
		$list[0]["pagecount"] = $count;
		$list[0]["pagetop"] = $pagestop;
	}
	else {
		$list = $rs->field($field)->where($where)->order($order)->limit($limit)->select();
		if ($tag["count"] && empty($tag["page"])) {
			$count = $rs->where($where)->count("news_id");

			if (!$count) {
				return false;
			}

			$list[0]["counts"] = $count;
		}
	}

	foreach ($list as $key => $val ) {
		$list[$key]["list_id"] = $list[$key]["news_cid"];
		$list[$key]["news_name"] =  htmlentities($val["news_name"]);
		$list[$key]["news_remark"] =$val["news_remark"]?htmlentities($val["news_remark"]):'';
		if($val["news_content"]){
		$list[$key]["news_content"] =$val["news_content"]?htmlentities($val["news_content"]):'';
		}
		$list[$key]["list_name"] = getlistname($list[$key]["list_id"], "list_name");
		$list[$key]["list_url"] = getlistname($list[$key]["list_id"], "list_url");
		$list[$key]["news_readurl"] = gxl_data_url("news", $list[$key]["news_id"], $list[$key]["news_cid"], $list[$key]["news_name"], 1, $list[$key]["news_jumpurl"]);
	    if($val["news_pic"]){
		$list[$key]["news_picurl"] = gxl_img_url($list[$key]["news_pic"], $list[$key]["news_content"]);
		$list[$key]["news_picurl_small"] = gxl_img_url_small($list[$key]["news_pic"], $list[$key]["news_content"]);
	    }
	}

	if (C("data_cache_newsforeach") && (C("currentpage") < 2)) {
		S($data_cache_name, $list, intval(C("data_cache_newsforeach")));
	}

	return $list;
}

function gxl_mysql_icp($tag)
{


    $search = array();
    $where = array();
    $tag = gxl_param_lable($tag);
    $field = (!empty($tag["field"]) ? $tag["field"] : "*");
    $limit = (!empty($tag["limit"]) ? $tag["limit"] : "10");
    $order = (!empty($tag["order"]) ? $tag["order"] : "icp_addtime");
    if (C("data_cache_icpforeach") && (C("currentpage") < 2)) {
        $data_cache_name = md5(C("data_cache_foreach") . implode(",", $tag));
        $data_cache_content = S($data_cache_name);

        if ($data_cache_content) {
            return $data_cache_content;
        }
    }





    $rs = M("icp");


    if ($tag["page"]) {
        $count = $rs->where($where)->count("icp_id");

        if (!$count) {
            return false;
        }
         $home_pagenum=5;
        $totalpages = ceil($count / $limit);
        $currentpage = get_maxpage(C("currentpage"), $totalpages);
        $pageurl = urldecode(C("jumpurl"));
        $pages =  getpage($currentpage, $totalpages,$home_pagenum, $pageurl, "pagego('" . $pageurl . "'," . $totalpages . ")");
        $pagestop = "<strong>" . $currentpage . "/" . $totalpages . "</strong>" . getpagetop($currentpage, $totalpages,$home_pagenum, $pageurl, "pagego('" . $pageurl . "'," . $totalpages . ")");
        $list = $rs->field($field)->where($where)->order($order)->limit($limit)->page($currentpage)->select();
        $list[0]["count"] = count($list);
        $list[0]["page"] = $pages;
        $list[0]["pagecount"] = $count;
        $list[0]["pagetop"] = $pagestop;
    }
    else {
        $list = $rs->field($field)->where($where)->order($order)->limit($limit)->select();
        if ($tag["count"] && empty($tag["page"])) {
            $count = $rs->where($where)->count("icp_id");

            if (!$count) {
                return false;
            }

            $list[0]["counts"] = $count;
        }
    }

    foreach ($list as $key => $val ) {
        $list[$key]["icp_readurl"] = gxl_icp_url($val["icp_id"]);;

    }

    if (C("data_cache_icpforeach") && (C("currentpage") < 2)) {
        S($data_cache_name, $list, intval(C("data_cache_icpforeach")));
    }

    return $list;
}





function getname($cid, $type = 1, $field = "vod_name")
{
	if ($type == 1) {
	
	}
	else {
		$rs = M("News");
		$where["news_id"] = $cid;
		$field = "News_name";
		$list = $rs->field($field)->where($where)->select();

		if ($list) {
			return $list[0];
		}
	}
}

function getpy($name)
{
	if (C("letters")) {
		$str = $name;
		$str = preg_replace("/\s|\:|(|\~|\`|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\-|\+|\=|\{|\}|\[|\]|\||\|\:|\;|\"|\'|\<|\,|\>|\.|\?|\/)/is", "", $str);

		for ($ascLen = strlen($str); $i < $ascLen; $i++) {
			$c = ord(substr($str, 0, 1));

			if (252 < $c) {
				$p = 5;
			}
			else if (248 < $c) {
				$p = 4;
			}
			else if (240 < $c) {
				$p = 3;
			}
			else if (224 < $c) {
				$p = 2;
			}
			else if (192 < $c) {
				$p = 1;
			}
			else {
				$p = 0;
			}

			$truekey = substr($str, 0, $p + 1);

			if ($truekey === false) {
				break;
			}

			$splikey[] = $truekey;
			$str = substr($str, $p + 1);
		}

		if ($splikey) {
			foreach ($splikey as $value ) {
				$pystr[] = strtolower(gxl_letter_first($value));
			}
		}

		return implode("", $pystr);
	}
	else {
		return gxl_pinyin($name);
	}
}
function geturl()
{
	return rtrim(C("site_url"), "/") . C("site_path");
}
function cssurl()
{
	if (C("site_cssjsurl")) {
		$useurl = C("site_cssjsurl");
	}
	else {
		$useurl = C("site_path");
	}

	return $useurl;
}
//邮箱验证
function quickSendMail($address, $title, $message)
{
	

	
	$setting = array("MAIL_ADDRESS" =>C("mail_from"), "MAIL_SMTP" => C("mail_server"), "MAIL_LOGINNAME" => C("mail_user"), "MAIL_PASSWORD" => C("mail_password"), "MAIL_PORT" => C("mail_port"));
	return SendMail($address, $title, $message, $setting, C("mail_user"));
	

	return "错误原因: 没有找到发送服务器";
}

function SendMail($address, $title, $message, $mailSetting, $sender = "")
{
	vendor("Email.class#phpmailer");
	$mail = new phpmailer();
	$mail->IsSMTP();
	$mail->CharSet = "UTF-8";
	$mail->AddAddress($address);
	$mail->Body = $message;
	$mail->From = $mailSetting["MAIL_ADDRESS"];
	$mail->FromName = $sender;
	$mail->Subject = $title;
	$mail->Host = $mailSetting["MAIL_SMTP"];
	$mail->SMTPAuth = true;
	if(C('mail_ssl')){
	$mail->SMTPSecure ='ssl';
	}else{
	$mail->SMTPSecure ='';
	}
	$mail->Username = $mailSetting["MAIL_LOGINNAME"];
	$mail->Port = $mailSetting["MAIL_PORT"];
	$mail->IsHTML(true);
	$mail->Password = $mailSetting["MAIL_PASSWORD"];

	if ($mail->Send()) {
		return true;
	}
	else {
		return "错误原因: " . $mail->ErrorInfo;
	}
}
