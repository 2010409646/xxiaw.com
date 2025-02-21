<?php
//类转成数组object_array()
function object_array($array) {
    if (is_object($array)) {
        $array = (array)$array;
    }
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            $array[$key] = object_array($value);
        }
    }
    return $array;
}
function admin_star_arr($stars)
{
	for ($i = 1; $i <= 5; $i++) {
		if ($i <= $stars) {
			$ss[$i] = 1;
		}
		else {
			$ss[$i] = 0;
		}
	}

	return $ss;
}

function array_multi2single($array)

{    unset($array['part']);
	   //unset($array['url']);
    static $result_array=array();
    foreach($array as $value)
    {
        if(is_array($value))
        {
            array_multi2single($value);
        }
        else  
            $result_array[]=$value;
    }
    return $result_array;
}


function gettplnum($rule, $filename)
{
	$content = read_file(C("VIEW_PATH") . C("default_theme") . "/" . trim($filename) . ".html");
	preg_match_all("/" . $rule . "/", $content, $data);

	foreach ($data[1] as $key => $val ) {
		if (0 < strpos($val, "page:true")) {
			$array = explode(";", str_replace("num", "limit", $val));

			foreach ($array as $v ) {
				list($key, $val) = explode(":", trim($v));
				$param[trim($key)] = trim($val);
			}

			return $param["limit"];
			break;
		}
	}

	return 0;
}

function get_hilight($string, $keyword, $classname = "kw-hilight")
{
	return str_replace($keyword, "<span>" . $keyword . "</span>", $string);
}

function get_hilight_ex($string, $keyword, $arr = "span", $color = "black")
{
	return str_replace($keyword, "<" . $arr . " color=\"" . $color . "\">" . $keyword . "</" . $arr . ">", $string);
}

function getcmcid($id, $sid)
{
	
		$rs = D("News");
		$array = $rs->field("news_name")->where("news_id=" . $id)->find();

		if ($array) {
			return $array["news_name"];
		}
	

	return "未知数据！";
}

function testwrite($d)
{
	$tfile = "_gxlnews.txt";
	$d = ereg_replace("/\$", "", $d);
	$fp = @fopen($d . "/" . $tfile, "w");

	if (!$fp) {
		return false;
	}
	else {
		fclose($fp);
		$rs = @unlink($d . "/" . $tfile);

		if ($rs) {
			return true;
		}
		else {
			return false;
		}
	}
}

function gettplname($filename)
{
	if ("gxl_footer.html" == $filename) {
		return "底部公用模板";
	}
	else if ("gxl_header.html" == $filename) {
		return "顶部公用模板";
	}
	else if ("gxl_index.html" == $filename) {
		return "网站首页模板";
	}
	else if ("gxl_news.html" == $filename) {
		return "新闻内容模板";
	}
	else if ("gxl_newschannel.html" == $filename) {
		return "新闻频道列表模板";
	}
	else if ("gxl_newslist.html" == $filename) {
		return "新闻栏目列表模板";
	}
	else if ("gxl_newssearch.html" == $filename) {
		return "新闻搜索模板";
	}
	else if ("gxl_newstag.html" == $filename) {
		return "新闻标签模板";
	}
	
	else if ("gxl_comment.html" == $filename) {
		return "评论模板";
	}
	else if ("gxl_guestbook.html" == $filename) {
		return "留言模板";
	}
	else if ("gxl_letter.html" == $filename) {
		return "字母模版";
	}
	else if ("gxl_role.html" == $filename) {
		return "角色模版";
	}
	else if ("mov_index.html" == $filename) {
		return "电影栏目模版";
	}
	else if ("tv_index.html" == $filename) {
		return "电视剧栏目模版";
	}
	else if ("weidy_index.html" == $filename) {
		return "微电影栏目模版";
	}
	else if ("gxl_up.html" == $filename) {
		return "上映热映模版";
	}
	else if ("gxl_starlist.html" == $filename) {
		return "明星列表模版";
	}
	else if ("gxl_star.html" == $filename) {
		return "明星内容模版";
	}
	else if ("gxl_starhz.html" == $filename) {
		return "合作明星模版";
	}
	else if ("gxl_starwork.html" == $filename) {
		return "明星作品模版";
	}
	else if ("gxl_story.html" == $filename) {
		return "剧情模版";
	}
	else if ("gxl_actor.html" == $filename) {
		return "演员表模版";
	}
	else if ("gxl_koushui.html" == $filename) {
		return "口水模版";
	}
	else if ("style.css" == $filename) {
		return "模板主题样式表";
	}
	else if ("js.css" == $filename) {
		return "Javascript样式表";
	}
	else if ("js.js" == $filename) {
		return "Javascript文件";
	}
	else if (stristr($filename, "home_")) {
		return "自定义标签";
	}
	else if (stristr($filename, "my_")) {
		return "自定义模板";
	}
	else if (stristr($filename, "gxl_foot")) {
		return "自定义底部模板";
	}
	else if (stristr($filename, "wap_")) {
		return "移动模块模板";
	}
	else {
		return "未知文件";
	}
}

function gettablename($tablename)
{
	if (0 < strpos($tablename, "ads")) {
		return "广告";
	}

	if (0 < strpos($tablename, "news")) {
		return "资讯";
	}



	if (0 < strpos($tablename, "list")) {
		return "栏目";
	}

	if (0 < strpos($tablename, "cm")) {
		return "评论信息";
	}

	if (0 < strpos($tablename, "gb")) {
		return "留言本";
	}

	if (0 < strpos($tablename, "admin")) {
		return "后台用户";
	}

	if (0 < strpos($tablename, "special")) {
		return "专题";
	}

	if (0 < strpos($tablename, "user")) {
		return "用户中心";
	}

	if (0 < strpos($tablename, "view")) {
		return "观看记录";
	}

	if (0 < strpos($tablename, "slide")) {
		return "幻灯片";
	}

	if (0 < strpos($tablename, "link")) {
		return "友情链接";
	}

	if (0 < strpos($tablename, "collect")) {
		return "采集";
	}

	if (0 < strpos($tablename, "tag")) {
		return "标签";
	}

	if (0 < strpos($tablename, "actor")) {
		return "角色";
	}

	if (0 < strpos($tablename, "tv")) {
		return "电台";
	}
}

function getdirsize($dir)
{
	$dirlist = opendir($dir);

	while (false !== $folderorfile = readdir($dirlist)) {
		if (($folderorfile != ".") && ($folderorfile != "..")) {
			if (is_dir("$dir/$folderorfile")) {
				$dirsize += getdirsize("$dir/$folderorfile");
			}
			else {
				$dirsize += filesize("$dir/$folderorfile");
			}
		}
	}

	closedir($dirlist);
	return $dirsize;
}



function specialletters($name)
{
	$rs = M("Special");
	$special["special_letters"] = getpy($name);
	$where["special_letters"] = $special["special_letters"];

	if (0 < $rs->where($where)->count()) {
		$special["special_letters"] = getpy($name);
		$where["special_letters"] = $special["special_letters"];
		$i = 1;

		while (0 < $rs->where($where)->count()) {
			$special["special_letters"] = getpy($name) . $i;
			$where["special_letters"] = $special["special_letters"];
			$i++;
		}
	}

	return $special["special_letters"];
}



function starletters($name)
{
	$rs = M("Star");
	$star["star_pyname"] = getpy($name);
	$where["star_pyname"] = $star["star_pyname"];

	if (0 < $rs->where($where)->count()) {
		$star["star_pyname"] = getpy($name);
		$where["star_pyname"] = $star["star_pyname"];
		$i = 1;

		while (0 < $rs->where($where)->count()) {
			$star["star_pyname"] = getpy($name) . $i;
			$where["star_pyname"] = $star["star_pyname"];
			$i++;
		}
	}

	return $star["star_pyname"];
}

function admin_gxl_hot_key($string)
{
	if (C("site_hot")) {
		$array_hot = array();

		foreach (explode(chr(13), trim($string)) as $key => $value ) {
			$array = explode("|", $value);

			if ($array[1]) {
				$array_hot[$key] = "<a href=\"" . $array[1] . "\" target=\"_blank\">" . trim($array[0]) . "</a>";
			}
			else {
				$vodid = getvodname(trim($value));

				if ($vodid) {
					$vodurl = gxl_data_url("vod", $vodid, getvodcid($vodid), trim($value), 1, "", getvodpinyin($vodid));
					$array_hot[$key] = "<a href=\"" . $vodurl . "\">" . trim($value) . "</a>";
				}
				else {
					$array_hot[$key] = "<a href=\"" . UU("Home-vod/search", array("wd" => urlencode(trim($value))), true, false) . "\">" . trim($value) . "</a>";
				}
			}
		}

		$hotkey = implode(" ", $array_hot);
		$hotkey = "document.write('" . $hotkey . "');";
		write_file("./Runtime/Js/hotkey.js", $hotkey);
	}
}

function admin_gxl_url_repalce($xmlurl, $order = "asc")
{
	if ($order == "asc") {
		return str_replace(array("|", "@", "#", "||"), array("/", "=", "&", "//"), $xmlurl);
	}
	else {
		return str_replace(array("/", "=", "&", "||"), array("|", "@", "#", "//"), $xmlurl);
	}
}

function getlistcidid($string)
{
	$data = M("List")->field("list_id")->where(array("list_pid" => $string))->select();
	$cids = array();

	foreach ($data as $val ) {
		$cids[] = $val["list_id"];
	}

	return $cids;
}

function send_remindset($vod_id)
{
	$rs = D("Vod");
	$member_remindset = F("_user/remindset");
	$authUser = $member_remindset["remindset_auth"] == "1";

	if ($authUser) {
		$siteurl = geturl();
		$usercenterremind = rtrim(C("site_url") . C("site_path"), "/") . UUU("User-Center/remind", "", true, false);
		$usercenterremindset = rtrim(C("site_url") . C("site_path"), "/") . UUU("User-Center/remindset", "", true, false);
		$usercenterlove = rtrim(C("site_url") . C("site_path"), "/") . UUU("User-Center/love", "", true, false);
		$sittitle = C("site_name");
		$sitemail = C("site_email");
		$movie = $rs->where("vod_id='$vod_id'")->field("vod_name,vod_title,vod_cid,vod_actor,vod_director,vod_area,vod_year,vod_language,vod_content,vod_pic,vod_jumpurl,vod_letters")->find();
		$vodname = $movie["vod_name"];
		$vodtitle = $movie["vod_title"];
		$vodcid = $movie["vod_cid"];
		$vodactor = $movie["vod_actor"];
		$voddirector = $movie["vod_director"];
		$vodarea = $movie["vod_area"];
		$vodyear = $movie["vod_year"];
		$vodlanguage = $movie["vod_language"];
		$vodcontent = mb_substr($movie["vod_content"], 0, 125, "gbk");
		$vodaddtime = date("Y-m-d H:i:s");
		$vodpic = getpicurl($movie["vod_pic"]);
		$url = gxl_data_url("vod", $vod_id, $vodcid, $vodname, 1, $movie["vod_jumpurl"], $movie["vod_letters"]);
		$vodurl = rtrim(C("site_url") . C("site_path"), "/") . $url;
		$rss = D("User");
		$edata = $rss->getemail($vod_id);

		foreach ($edata as $key => $val ) {
			$usercenterindex = rtrim(C("site_url") . C("site_path"), "/") . UU("User-Home/index", array("id" => $val["userid"]), false, false);
			$message = str_replace("\\", "", $member_remindset["remindset_message"]);
			$messagetitle = $member_remindset["remindset_title"];
			$messagetitle = str_replace(array("{siteurl}", "{sittitle}", "{sitemail}", "{vod_url}", "{vod_name}", "{vod_pic}", "{vod_title}"), array($siteurl, $sittitle, $sitemail, $vodurl, $vodname, $vodpic, $vodtitle), $messagetitle);
			$message = str_replace(array("{siteurl}", "{sittitle}", "{sitemail}", "{vod_url}", "{vod_name}", "{vod_pic}", "{vod_title}", "{nickname}", "{vodactor}", "{voddirector}", "{vodarea}", "{vodyear}", "{vodlanguage}", "{vodcontent}", "{vodaddtime}", "{usercenterindex}", "{usercenterremind}", "{usercenterremindset}", "{usercenterlove}"), array($siteurl, $sittitle, $sitemail, $vodurl, $vodname, $vodpic, $vodtitle, $val["nickname"], $vodactor, $voddirector, $vodarea, $vodyear, $vodlanguage, $vodcontent, $vodaddtime, $usercenterindex, $usercenterremind, $usercenterremindset, $usercenterlove), $message);
			quickSendMail($val["iemail"], $messagetitle, $message);
		}

		return $vod_id;
	}
}

function upremind($vod_id)
{
	$rss = D("User");
	$edata = $rss->getstation($vod_id);
	$fav = M("Remind");

	foreach ($edata as $key => $val ) {
		if ($val["userid"]) {
			$where = array("user_id" => $val["userid"], "vod_id" => $vod_id);
			$data["cdate"] = time();
			$fav->where($where)->save($data);

			return $vod_id;
		}
	}
}

function send_station($vod_id)
{
	$rs = D("Vod");
	$rss = D("User");
	$edata = $rss->getstation($vod_id);
	$movie = $rs->where("vod_id='$vod_id'")->find();
	$fav = D("station");

	foreach ($edata as $key => $val ) {
		if ($val["userid"]) {
			$where = array("user_id" => $val["userid"], "vod_id" => $vod_id);
			$count = $fav->where($where)->count();
			$data = array();
			$data["user_id"] = $val["userid"];
			$data["vod_id"] = $vod_id;
			$data["time"] = time();
			$data["vod_time"] = $movie["vod_addtime"];
			$data["status"] = 0;

			if (0 < $count) {
				$fav->where($where)->save($data);
			}
			else {
				$fav->add($data);
			}
		}
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

function random($length, $chars = "0123456789")
{
	$hash = "";
	$max = strlen($chars) - 1;

	for ($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}

	return $hash;
}

function password($password, $encrypt = "")
{
	$pwd = array();
	$pwd["encrypt"] = ($encrypt ? $encrypt : create_randomstr());
	$pwd["password"] = md5(md5($password.$pwd["encrypt"]));
	return $encrypt ? $pwd["password"] : $pwd;
}

function create_randomstr($lenth = 6)
{
	return random($lenth, "123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ");
}