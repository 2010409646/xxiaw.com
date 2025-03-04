<?php
namespace Admin\Action;
use Common\Action\BasedAction;
class CreatehtmliuhuhgAction extends BasedAction
{
	public function _initialize()
	{
		parent::_initialize();
		$this->assign($this->Lable_Style());
		$this->assign("waitSecond", C("url_time"));
	}

	public function newslist()
	{
		$this->list_cache_array(2);
	}

	public function newslist_create()
	{
		$this->list_create_array(2);
	}

	public function vodlist()
	{
		$this->list_cache_array(1);
	}

	public function vodlist_create()
	{
		$this->list_create_array(1);
	}

	public function list_cache_array($sid = 1)
	{
		$jump = intval($_REQUEST["jump"]);
		$this->check(C("url_html_list"), getsidname($sid) . "列表页", "?s=Admin-Create-Index-jump-" . $jump);
		$array_list = F("_gxlnews/list");
		$array_listids = explode(",", $_REQUEST["ids_list_" . $sid]);
		$k = 0;

		foreach ($array_listids as $key => $value ) {
			$list = list_search($array_list, "list_id=" . $value);

			if ($list[0]["list_limit"]) {
				$totalpages = ceil(getcount($value) / $list[0]["list_limit"]);
			}
			else {
				$totalpages = 1;
			}

			for ($page = 1; $page <= $totalpages; $page++) {
				$array[$k]["id"] = $value;
				$array[$k]["page"] = $page;
				$k++;
			}
		}

		F("_create/list", $array);

		if ($sid == 1) {
			$this->vodlist_create();
		}
		else {
			$this->newslist_create();
		}
	}

	public function list_create_array($sid)
	{
		$List = F("_gxlnews/list");
		$Url = F("_create/list");
		$key = intval($_REQUEST["key"]);
		$jump = intval($_REQUEST["jump"]);

		if ($sid == 1) {
			$nextcreate = "?s=Admin-Create-Vodlist_create-jump-" . $jump . "-key-" . $key;
			$sidname = "视频";
		}
		else {
			$nextcreate = "?s=Admin-Create-Newslist_create-jump-" . $jump . "-key-" . $key;
			$sidname = "资讯";
		}

		F("_create/nextcreate", $nextcreate);
		echo "<ul id=\"show\" style=\"font-size:12px;list-style:none;margin:0px;padding:0px;font-family:宋体\">";
		echo "<li>总共需要生成<font color=blue>" . count($Url) . "</font>个" . $sidname . "列表页，每页生成" . C("url_number") . "个。</li>";

		for ($i = 1; $i <= C("url_number"); $i++) {
			if (!$Url[$key]) {
				break;
			}

			C("jumpurl", gxl_list_url(getsidname($sid), array("id" => $Url[$key]["id"], "p" => "{!page!}"), 9999));
			C("currentpage", $Url[$key]["page"]);
			$channel = list_search($List, "list_id=" . $Url[$key]["id"]);

			if ($sid == 1) {
				$channel = $this->Lable_Vod_List(array("id" => $Url[$key]["id"], "page" => $Url[$key]["page"], "order" => "addtime"), $channel[0]);
				$mcat = D("Mcat")->list_cat($Url[$key]["id"]);

				foreach ((array) $mcat as $k => $v ) {
					$mcat[$k]["m_url"] = UU("Home-vod/show", array("id" => $Url[$key]["id"], "mcid" => $v["m_cid"]), false, true);
				}

				$this->assign("mcat", $mcat);
			}
			else {
				$channel = $this->Lable_News_List(array("id" => $Url[$key]["id"], "page" => $Url[$key]["page"], "order" => "addtime"), $channel[0]);
			}

			$this->assign($channel);
			$listdir = str_replace("{!page!}", $Url[$key]["page"], gxl_list_url_dir(getsidname($sid), $Url[$key]["id"], $Url[$key]["page"]));
			$this->buildHtml($listdir, "./", $channel["list_skin"]);
			$showurl = C("sitepath") . $listdir . C("html_file_suffix");
			echo "<li>第<font color=red>" . ($key + 1) . "</font>个生成完毕　<a href=\"" . $showurl . "\" target=\"_blank\">" . $showurl . "</a></li>";
			ob_flush();
			flush();
			$key++;
		}

		echo "</ul>";

		if ($key < count($Url)) {
			if ($sid == 1) {
				$nextcreate = "?s=Admin-Create-Vodlist_create-jump-" . $jump . "-key-" . $key;
			}
			else {
				$nextcreate = "?s=Admin-Create-Newslist_create-jump-" . $jump . "-key-" . $key;
			}

			$this->jump($nextcreate, "让服务器休息一会，生成任务等待中...");
		}
		else {
			F("_create/list", NULL);
			F("_create/nextcreate", NULL);
			$this->jump("?s=Admin-Create-Index-jump-" . $jump, "列表页已经全部生成，下次将生成网站首页。");
		}
	}

	public function newsclass()
	{
		$jump = intval($_REQUEST["jump"]);
		$ids = trim($_REQUEST["ids_2"]);
		$page = (!empty($_GET["page"]) ? intval($_GET["page"]) : 1);
		$this->check(C("url_html"), "资讯内容页", "?s=Admin-Create-Newslist-ids_2-" . $ids . "-jump-" . $jump);
		F("_create/nextcreate", "?s=Admin-Create-Vodclass-ids_2-" . $ids . "-jump-" . $jump . "-page-" . $page);
		$rs = D("News");
		$where["news_status"] = array("eq", 1);
		$where["news_cid"] = array("in", $ids);
		$count = $rs->where($where)->count("news_id");
		$totalpages = ceil($count / C("url_number"));
		$array = $rs->where($where)->order("news_addtime desc")->limit(C("url_number"))->page($page)->relation("Tag")->select();

		if (empty($array)) {
			$this->assign("jumpUrl", "?s=Admin-Create-Show");
			$this->error("当前分类没有数据，暂不需要生成！");
		}

		echo "<ul id=\"show\" style=\"font-size:12px;list-style:none;margin:0px;padding:0px;font-family:宋体\">";
		echo "<li>总共需要生成<font color=blue>" . $count . "</font>个资讯内容页，需要分<font color=blue>" . $totalpages . "</font>次来执行，正在执行第<font color=red>" . $page . "</font>次</li>";

		foreach ($array as $key => $value ) {
			$this->news_read_create($value);
		}

		echo "</ul>";
		$jumpurl = "?s=Admin-Create-Show";

		if ($page < $totalpages) {
			$jumpurl = "?s=Admin-Create-Newsclass-ids_2-" . $ids . "-jump-" . $jump . "-page-" . ($page + 1);
		}
		else if ($jump) {
			$jumpurl = "?s=Admin-Create-Newslist-ids_list_2-" . $ids . "-jump-" . $jump;
		}

		if ($page < $totalpages) {
			$this->jump($jumpurl, "稍等一会，准备生成下一次资讯内容页...");
		}

		F("_create/nextcreate", NULL);
		$this->jump($jumpurl, "恭喜您，资讯内容页全部生成完毕。");
	}

	public function newsday()
	{
		$jump = intval($_REQUEST["jump"]);
		$this->check(C("url_html"), "资讯内容页");
		$rs = D("News");
		$mday = intval($_REQUEST["mday_2"]);
		$min = intval($_REQUEST["min"]);
		$where["news_status"] = array("eq", 1);
		$where["news_cid"] = array("gt", 0);

		if ($min) {
			$where["news_addtime"] = array("gt", time() - ($min * 60));
		}
		else {
			$where["news_addtime"] = array("gt", getxtime($mday));
		}

		$count = $rs->where($where)->count("news_id");
		$totalpages = ceil($count / C("url_number"));
		$page = (!empty($_GET["page"]) ? intval($_GET["page"]) : 1);
		$array = $rs->where($where)->order("news_addtime desc")->limit(C("url_number"))->page($page)->relation("Tag")->select();

		if (empty($array)) {
			$this->assign("jumpUrl", "?s=Admin-Create-Show");
			$this->error("今日没有数据更新,暂不需要生成！");
		}

		echo "<ul id=\"show\" style=\"font-size:12px;list-style:none;margin:0px;padding:0px;font-family:宋体\">";
		echo "<li>总共需要生成<font color=blue>" . $count . "</font>个资讯内容页，需要分<font color=blue>" . $totalpages . "</font>次来执行，正在执行第<font color=red>" . $page . "</font>次</li>";

		foreach ($array as $key => $value ) {
			$this->news_read_create($value);
		}

		echo "</ul>";
		$jumpurl = "?s=Admin-Create-Show";

		if ($page < $totalpages) {
			$jumpurl = "?s=Admin-Create-Newsday-jump-" . $jump . "-mday_2-" . $mday . "-min-" . $mid . "-page-" . ($page + 1);
		}
		else if ($jump) {
			$listarr = F("_gxlnews/list");

			foreach ($listarr as $key => $value ) {
				$keynew = $value["list_sid"];
				$list[$keynew][$key] = $value["list_id"];
			}

			$ids = implode(",", $list[1]);
			$jumpurl = "?s=Admin-Create-Newslist-jump-1-ids_list_2-" . $ids;
		}

		if ($page < $totalpages) {
			$this->jump($jumpurl, "第(" . $page . ")页已经生成完毕，正在准备下一个。");
		}

		F("_create/nextcreate", NULL);
		$this->jump($jumpurl, "恭喜您，生成完毕。");
	}

	public function newsid()
	{
		$where = array();
		$rs = D("News");
		$where["news_id"] = array("in", $_REQUEST["id"]);
		$where["news_status"] = 1;
		$where["news_cid"] = array("gt", 0);
		$array = $rs->where($where)->relation("Tag")->select();

		foreach ($array as $value ) {
			$this->news_read_create($value);
		}
	}

	public function news_read_create($array)
	{
		$arrays = $this->Lable_News_Read($array);
		$this->assign($arrays["show"]);
		$this->assign($arrays["read"]);
		$newsdir = gxl_data_url_dir("news", $arrays["read"]["news_id"], $arrays["read"]["news_cid"], $arrays["read"]["news_name"], 1);
		$this->buildHtml($newsdir, "./", $arrays["read"]["news_skin_detail"]);
		$newsurl = C("site_path") . $newsdir . C("html_file_suffix");
		echo "<li>" . $arrays["read"]["news_id"] . " <a href=\"" . $newsurl . "\" target=\"_blank\">" . $newsurl . "</a> 生成完毕</li>";
		ob_flush();
		flush();
	}

	public function vodclass()
	{
		$jump = intval($_REQUEST["jump"]);
		$ids = trim($_REQUEST["ids_1"]);
		$page = (!empty($_GET["page"]) ? intval($_GET["page"]) : 1);
		$this->check(C("url_html"), "视频内容页", "?s=Admin-Create-Vodlist-ids_1-" . $ids . "-jump-" . $jump);
		F("_create/nextcreate", "?s=Admin-Create-Vodclass-ids_1-" . $ids . "-jump-" . $jump . "-page-" . $page);
		$rs = D("Vod");
		$where["vod_status"] = array("eq", 1);
		$where["vod_cid"] = array("in", $ids);
		$count = $rs->where($where)->count("vod_id");
		$totalpages = ceil($count / C("url_number"));
		$array = $rs->where($where)->order("vod_addtime desc")->limit(C("url_number"))->page($page)->relation(array("Tag", "Mcid", "Story", "Actor"))->select();

		if (empty($array)) {
			$this->assign("jumpUrl", "?s=Admin-Create-Show");
			$this->error("当前分类没有数据，暂不需要生成！");
		}

		echo "<ul id=\"show\" style=\"font-size:12px;list-style:none;margin:0px;padding:0px;font-family:宋体\"><li>总共需要生成<font color=blue>" . $count . "</font>个视频内容页，需要分<font color=blue>" . $totalpages . "</font>次来执行，正在执行第<font color=blue>" . $page . "</font>次</li>";

		foreach ($array as $key => $value ) {
			$this->vod_read_create($value);
		}

		echo "</ul>";
		$jumpurl = "?s=Admin-Create-Show";

		if ($page < $totalpages) {
			$jumpurl = "?s=Admin-Create-Vodclass-ids_1-" . $ids . "-jump-" . $jump . "-page-" . ($page + 1);
		}
		else if ($jump) {
			$jumpurl = "?s=Admin-Create-Vodlist-ids_list_1-" . $ids . "-jump-" . $jump;
		}

		if ($page < $totalpages) {
			$this->jump($jumpurl, "稍等一会，准备生成下一次视频内容页...");
		}

		F("_create/nextcreate", NULL);
		$this->jump($jumpurl, "恭喜您，视频内容页全部生成完毕。");
	}

	public function vodday()
	{
		$jump = intval($_REQUEST["jump"]);
		$this->check(C("url_html"), "视频内容页");
		$rs = D("Vod");
		$mday = intval($_REQUEST["mday_1"]);
		$min = intval($_REQUEST["min"]);
		$where["vod_status"] = array("eq", 1);
		$where["vod_cid"] = array("gt", 0);

		if ($min) {
			$where["vod_addtime"] = array("gt", time() - ($min * 60));
		}
		else {
			$where["vod_addtime"] = array("gt", getxtime($mday));
		}

		$count = $rs->where($where)->count("vod_id");
		$totalpages = ceil($count / C("url_number"));
		$page = (!empty($_GET["page"]) ? intval($_GET["page"]) : 1);
		$array = $rs->where($where)->order("vod_addtime desc")->limit(C("url_number"))->page($page)->relation(array("Tag", "Mcid", "Story", "Actor"))->select();

		if (empty($array)) {
			$this->assign("jumpUrl", "?s=Admin-Create-Show");
			$this->error("今日没有数据更新,暂不需要生成！");
		}

		echo "<ul id=\"show\" style=\"font-size:12px;list-style:none;margin:0px;padding:0px;font-family:宋体\"><li>总共需要生成<font color=blue>" . $count . "</font>个视频内容页，需要分<font color=blue>" . $totalpages . "</font>次来执行，正在执行第<font color=blue>" . $page . "</font>次</li>";

		foreach ($array as $key => $value ) {
			$this->vod_read_create($value);
		}

		echo "</ul>";

		if ($page < $totalpages) {
			$jumpurl = "?s=Admin-Create-Vodday-jump-" . $jump . "-mday_1-" . $mday . "-min-" . $mid . "-page-" . ($page + 1);
		}
		else if ($jump) {
			$listarr = F("_gxlnews/list");

			foreach ($listarr as $key => $value ) {
				$keynew = $value["list_sid"];
				$list[$keynew][$key] = $value["list_id"];
			}

			$ids = implode(",", $list[1]);
			$jumpurl = "?s=Admin-Create-Vodlist-jump-1-ids_list_1-" . $ids;
		}
		else {
			$jumpurl = "?s=Admin-Create-Show";
		}

		if ($page < $totalpages) {
			$this->jump($jumpurl, "第(" . $page . ")页已经生成完毕，正在准备下一个。");
		}

		F("_create/nextcreate", NULL);
		$this->jump($jumpurl, "恭喜您，生成完毕。");
	}

	public function vodid()
	{
		$where = array();
		$rs = D("Vod");
		$where["vod_id"] = array("in", $_REQUEST["id"]);
		$where["vod_cid"] = array("gt", 0);
		$where["vod_status"] = 1;
		$array = $rs->where($where)->relation(array("Tag", "Mcid", "Story", "Actor"))->select();

		foreach ($array as $value ) {
			$this->vod_read_create($value);
		}
	}

	public function vod_read_create($array)
	{
		$arrays = $this->Lable_Vod_Read($array);
		$this->assign($arrays["show"]);
		$this->assign($arrays["read"]);
		$this->assign($arrays["story"]);
		$this->assign($arrays["actor"]);
		$videodir = gxl_data_url_dir("vod", $arrays["read"]["vod_id"], $arrays["read"]["vod_cid"], $arrays["read"]["vod_name"], 1);
		$this->buildHtml($videodir, "./", $arrays["read"]["vod_skin_detail"]);
		echo "<li><a href=\"" . C("site_path") . $videodir . C("html_file_suffix") . "\" target=\"_blank\">" . $arrays["read"]["vod_id"] . "</a> detail ok</li>";

		if (C("url_html")) {
			$this->vod_play_create($arrays);
		}

		ob_flush();
		flush();
	}

	public function vod_play_create($arrays)
	{
		if (C("url_html_play") == 1) {
			$this->assign($arrays["show"]);
			$arrays["read"] = $this->Lable_Vod_Play($arrays["read"], array("id" => $arrays["read"]["vod_id"], "sid" => 0, "pid" => 1));
			$this->assign($arrays["read"]);
			$playdir = gxl_play_url_dir($arrays["read"]["vod_id"], 0, 1, $arrays["read"]["vod_cid"], $arrays["read"]["vod_name"]);
			$this->buildHtml($playdir, "./", $arrays["read"]["vod_skin_play"]);
			echo "<li>" . $arrays["read"]["vod_id"] . " play ok</li>";
		}
		else if (C("url_html_play") == 2) {
			echo "<li>" . $arrays["read"]["vod_id"] . " play ";
			$player_dir = gxl_play_url_dir($arrays["read"]["vod_id"], 0, 1, $arrays["read"]["vod_cid"], $arrays["read"]["vod_name"]);
			write_file("./" . $player_dir . ".js", $arrays["read"]["vod_player"]);
			$this->assign($arrays["show"]);

			foreach ($arrays["read"]["vod_playlist"] as $sid => $son ) {
				$arr_sid = explode("-", $sid);
				$arr_play = array();

				foreach ($son["son"] as $pid => $value ) {
					$player_dir_ji = preg_replace("/play-([0-9]+)-([0-9]+)-([0-9]+)/i", "play-\$1-" . $arr_sid[1] . "-" . ($pid + 1) . "", $player_dir);
					$this->assign($this->Lable_Vod_Play($arrays["read"], array("id" => $arrays["read"]["vod_id"], "sid" => $arr_sid[1], "pid" => $pid + 1), true));
					$this->buildHtml($player_dir_ji, "./", $arrays["read"]["vod_skin_play"]);
				}

				echo "ok </li>";
			}
		}
	}

	public function maps()
	{
		$this->check(C("url_html"), "网站地图");
		$this->google(true);
		$this->baidu(true);
		$this->rss(true);
		$this->assign("jumpUrl", "?s=Admin-Create-Show");
		$this->success("恭喜您，所有地图生成完毕！");
	}

	public function baidu($id)
	{
		$baiduall = (!empty($_REQUEST["baiduall"]) ? intval($_REQUEST["baiduall"]) : 200);
		$baidu = (!empty($_REQUEST["baidu"]) ? intval($_REQUEST["baidu"]) : 200);
		$page = ceil(intval($baiduall) / intval($baidu));

		for ($i = 1; $i <= $page; $i++) {
			$this->map_create("baidu", $baidu, $i);
		}

		if (empty($id)) {
			$this->assign("waitSecond", 5);
			$this->assign("jumpUrl", "?s=Admin-Create-Show");
			$this->success("Baidu Sitemap地图生成成功！<br />请通过<a href=\"http://sitemap.baidu.com\" target=\"_blank\">百度站长平台</a>提交！");
		}
	}

	public function google($id)
	{
		$googleall = (!empty($_REQUEST["googleall"]) ? intval($_REQUEST["googleall"]) : 200);
		$google = (!empty($_REQUEST["google"]) ? intval($_REQUEST["google"]) : 200);
		$page = ceil(intval($googleall) / intval($google));

		for ($i = 1; $i <= $page; $i++) {
			$this->map_create("google", $google, $i);
		}

		if (empty($id)) {
			$this->assign("waitSecond", 5);
			$this->assign("jumpUrl", "?s=Admin-Create-Show");
			$this->success("Google Sitemap地图生成成功！<br />请通过<a href=\"http://www.google.com/webmasters/tools\" target=\"_blank\">谷歌站长工具</a>提交！");
		}
	}

	public function rss($id)
	{
		$rss = (!empty($_REQUEST["rss"]) ? intval($_REQUEST["rss"]) : 50);
		$this->map_create("rss", $rss, 1);

		if (empty($id)) {
			$this->assign("jumpUrl", "?s=Admin-Create-Show");
			$this->success("Rss订阅文件生成成功！");
		}
	}

	public function map_create($mapname, $limit, $page)
	{
		$suffix = C("html_file_suffix");
		$listmap = $this->Lable_Maps($mapname, $limit, $page);

		if ($listmap) {
			$this->assign("list_map", $listmap);
			C("html_file_suffix", ".xml");

			if ($page == 1) {
				$this->buildHtml($mapname, "./" . C("url_map"), "./Public/maps/" . $mapname . ".html");
			}
			else {
				$this->buildHtml($mapname . "-" . $page, "./" . C("url_map"), "./Public/maps/" . $mapname . ".html");
			}

			C("html_file_suffix", $suffix);
		}
	}

	public function all()
	{
		$this->assign($this->Lable_Index());
		echo "<body>";
		$this->buildHtml("index", "./", "gxl_index");
		echo "生成首页OK<BR/>";
		ob_flush();
		flush();
		$this->google(true);
		echo "生成goolge OK<BR/>";
		ob_flush();
		flush();
		$this->baidu(true);
		echo "生成baidu OK<BR/>";
		ob_flush();
		flush();
		$this->rss(true);
		echo "生成rss OK<BR/>";
		ob_flush();
		flush();
		$List = F("_gxlnews/list");

		foreach ($List as $key => $array ) {
			$Url = array("id" => $array["list_id"]);
			$channel = $this->Lable_Vod_List($Url, $array);
			$this->assign($channel);
			if (($array["list_skin"] == "gxl_letter") && ($array["list_status"] == 1)) {
				$list_path = "./" . $array["list_dir"] . "/";
				mkdirss($list_path);
				$this->buildHtml("index", $list_path, "gxl_letter");
				echo "生成栏目页 <a href=\"" . $array["list_dir"] . "\" target=\"_blank\">" . $channel["list_name"] . "</a> OK<BR/>";
			}

			if ((0 < strpos($array["list_skin"], "_index")) && ($array["list_status"] == 1)) {
				list($pindao, $moban) = explode("_", $array["list_skin"]);
				$list_path = "./" . $array["list_dir"] . "/";
				mkdirss($list_path);
				$this->buildHtml("index", $list_path, $pindao . "_" . $moban);
				echo "生成频道页 <a href=\"" . $array["list_dir"] . "\" target=\"_blank\">" . $channel["list_name"] . "</a> OK<BR/>";
			}

			ob_flush();
			flush();
		}

		import("ORG.Io.Dir");
		$dir = new Dir(TEMPLATE_PATH . "/Home");
		$list_dir = $dir->toArray();
		$array_tpl = array();

		foreach ($list_dir as $key => $value ) {
			if (ereg("my_(.*)\.html", $value["filename"])) {
				C("html_file_suffix", $suffix);
				$this->buildHtml(str_replace(array("my_", ".html"), "", $value["filename"]), "./" . C("url_mytpl"), str_replace(".html", "", $value["filename"]));
				echo "生成自定义页 <a href=\"" . C("url_mytpl") . str_replace(array("my_"), "", $value["filename"]) . "\" target=\"_blank\">./" . C("url_mytpl") . str_replace(array("my_"), "", $value["filename"]) . "</a> OK<BR/>";
				ob_flush();
				flush();
			}
		}

		echo "</body>";
	}

	public function index()
	{
		$jump = intval($_GET["jump"]);
		$this->check(C("url_html"), "网站首页");
		F("_create/nextcreate", NULL);
		$this->assign($this->Lable_Index());
		$this->buildHtml("index", "./", "gxl_index");

		if ($jump) {
			$this->assign("jumpUrl", "?s=Admin-Create-Mytpl-jump-" . $jump);
			$this->success("首页生成完毕，准备生成自定义模板！");
		}
		else {
			$this->assign("jumpUrl", "?s=Admin-Create-Show");
			$this->success("首页生成完毕。");
		}
	}

	public function mytpl()
	{
		$suffix = C("html_file_suffix");
		$jump = intval($_GET["jump"]);
		$this->check(C("url_html"), "自定义模板");
		import("ORG.Io.Dir");
		$dir = new Dir(TEMPLATE_PATH . "/Home");
		$list_dir = $dir->toArray();
		$array_tpl = array();

		foreach ($list_dir as $key => $value ) {
			if (ereg("my_(.*)\.html", $value["filename"])) {
				C("html_file_suffix", $suffix);
				$this->buildHtml(str_replace(array("my_", ".html"), "", $value["filename"]), "./" . C("url_mytpl"), str_replace(".html", "", $value["filename"]));
			}
		}

		if ($jump) {
			$this->assign("jumpUrl", "?s=Admin-Create-Maps-jump-" . $jump);
			$this->success("自定义模板生成完毕，准备生成网站地图！");
		}
		else {
			$this->assign("jumpUrl", "?s=Admin-Create-Show");
			$this->success("恭喜您，自定义模板生成成功！");
		}
	}

	public function speciallist()
	{
		$this->check(C("url_html"), "专题列表页", "?s=Admin-Create-Show");
		$page = (!empty($_GET["page"]) ? intval($_GET["page"]) : 1);
		$limit = gettplnum("gxl_mysql_special\('(.*)'\)", "gxl_speciallist");
		$rs = D("Special");
		$where["special_status"] = array("eq", 1);
		$count = $rs->where($where)->count("special_id");
		$totalpages = ceil($count / $limit);
		echo "<ul id=\"show\" style=\"font-size:12px;list-style:none;margin:0px;padding:0px;font-family:宋体\">";
		echo "<li>共有专题<font color=red>" . $count . "</font>篇，专题列表需要生成<font color=blue>" . $totalpages . "</font>页。</li>";

		for ($i = 1; $i <= $totalpages; $i++) {
			C("jumpurl", gxl_special_url(9999));
			C("currentpage", $i);
			$channel = $this->Lable_Special_List(array("page" => $i));
			$htmldir = str_replace("{!page!}", $i, gxl_special_url_dir($i));
			$htmlurl = C("sitepath") . $htmldir . C("html_file_suffix");
			$this->buildHtml($htmldir, "./", $channel["special_skin"]);
			echo "<li>第<font color=blue>" . $i . "</font>页生成完毕　<a href=\"" . $htmlurl . "\" target=\"_blank\">" . $htmlurl . "</a></li>";
			ob_flush();
			flush();
		}

		echo "</ul>";
		exit();
		$this->jump("?s=Admin-Create-Show", "恭喜您，专题列表页已经全部生成！");
	}

	public function specialclass()
	{
		$this->check(C("url_html"), "专题内容页", "?s=Admin-Create-Show");
		$page = (!empty($_GET["page"]) ? intval($_GET["page"]) : 1);
		$rs = D("Special");
		$where["special_status"] = array("eq", 1);
		$count = $rs->where($where)->count("special_id");
		$totalpages = ceil($count / C("url_number"));
		$array = $rs->field("special_id")->where($where)->order("special_addtime desc")->limit(C("url_number"))->page($page)->select();

		if (empty($array)) {
			$this->assign("jumpUrl", "?s=Admin-Create-Show");
			$this->error("没有数据，不需要生成！");
		}

		echo "<ul id=\"show\" style=\"font-size:12px;list-style:none;margin:0px;padding:0px;font-family:宋体\">";
		echo "<li>总共需要生成<font color=blue>" . $count . "</font>个专题内容页，需要分<font color=blue>" . $totalpages . "</font>次来执行，正在执行第<font color=red>" . $page . "</font>次</li>";

		foreach ($array as $key => $value ) {
			$this->create_red_special($value["special_id"]);
		}

		echo "</ul>";
		$jumpurl = "?s=Admin-Create-Show";

		if ($page < $totalpages) {
			$jumpurl = "?s=Admin-Create-Specialclass-page-" . ($page + 1);
			$this->jump($jumpurl, "稍等一会，准备生成下一次专题内容页...");
		}

		$this->jump($jumpurl, "恭喜您，专题内容页全部生成完毕。");
	}

	public function create_red_special($specialid)
	{
		$where = array();
		$where["special_id"] = $specialid;
		$where["special_status"] = array("eq", 1);
		$rs = D("Special");
		$array_special = $rs->where($where)->find();

		if ($array_special) {
			$arrays = $this->Lable_Special_Read($array_special);
			$this->assign($arrays["read"]);
			$this->assign("list_vod", $arrays["list_vod"]);
			$this->assign("list_news", $arrays["list_news"]);
			$htmldir = gxl_data_url_dir("special", $arrays["read"]["special_id"], 0, $arrays["read"]["special_name"], 1);
			$htmlurl = C("site_path") . $htmldir . C("html_file_suffix");
			$this->buildHtml($htmldir, "./", $arrays["read"]["special_skin"]);
			echo "<li>" . $arrays["read"]["special_id"] . " <a href=\"" . $htmlurl . "\" target=\"_blank\">" . $htmlurl . "</a> 生成完毕</li>";
		}
	}

	public function actorvid()
	{
		$actor_id = $_REQUEST["vid"];
		$array = explode(",", $actor_id);

		foreach ($array as $key => $value ) {
			$this->create_red_actor($array[$key]);
		}
	}

	public function actorid()
	{
		$rs = D("Actor");
		$where["actor_id"] = array("in", $_REQUEST["id"]);
		$array = $rs->field("actor_vid")->where($where)->group("actor_vid")->select();

		foreach ($array as $value ) {
			$this->create_red_actor($value["actor_vid"]);
		}
	}

	public function create_red_actor($actor_vid)
	{
		$rs = D("Vod");
		$where["vod_id"] = $actor_vid;
		$array = $rs->where($where)->relation(array("Tag", "Mcid", "Story", "Actor"))->find();

		if ($array) {
			$array_detail = $this->Lable_Vod_Read($array);
			$this->create_red_role($array_detail);
			ob_flush();
			flush();
		}
	}

	public function create_red_role($array_detail)
	{
		$this->assign($array_detail["show"]);
		$this->assign($array_detail["read"]);
		$this->assign($array_detail["story"]);
		$this->assign($array_detail["actor"]);
		$actordir = gxl_actor_url_dir("actor", $array_detail["read"]["vod_cid"], $array_detail["read"]["vod_id"], $array_detail["read"]["vod_letters"], 1);
		$this->buildHtml($actordir, "./", "gxl_actor");
		echo "<li>" . $array_detail["read"]["vod_id"] . " actor ";

		if ($array_detail["actor"]["actor_list"]) {
			echo " role ";

			foreach ($array_detail["actor"]["actor_list"] as $key => $var ) {
				$array_actor["role"] = $array_detail["actor"]["actor_list"][$array_detail["actor"]["actor_list"][$key]["actor_id"]];
				$this->assign($array_actor["role"]);
				$roldir = gxl_actor_url_dir("role", $array_detail["read"]["vod_cid"], $array_detail["read"]["vod_id"], $array_detail["read"]["vod_letters"], $array_detail["actor"]["actor_list"][$key]["actor_id"]);
				$this->buildHtml($roldir, "./", "gxl_role");
			}

			echo "ok </li>";
		}
	}

	public function show()
	{
		$array["url_html"] = C("url_html");

		if (C("url_html_list")) {
			$array["url_html_list"] = C("url_html_list");
		}
		else {
			$array["url_html_list"] = 0;
		}

		$listarr = F("_gxlnews/list");

		foreach ($listarr as $key => $value ) {
			$keynew = $value["list_sid"];
			$list[$keynew][$key] = $value["list_id"];
		}

		$this->assign($array);
		$this->assign("jumpurl", F("_create/nextcreate"));
		$this->assign("list_vod_all", implode(",", $list[1]));
		$this->assign("list_news_all", implode(",", $list[2]));
		$this->assign("list_vod", F("_gxlnews/listvod"));
		$this->assign("list_news", F("_gxlnews/listnews"));
		$this->display("./Public/system/html_show.html");
	}

	public function check($html_status, $html_err, $jumpurl = "?s=Admin-Create-Show")
	{
		if (!$html_status) {
			$this->assign("jumpUrl", $jumpurl);
			$this->error("\"" . $html_err . "\"模块动态运行，不需要生成静态网页！");
		}
	}

	public function jump($jumpurl, $html)
	{
		echo "</div><script>if(document.getElementById(\"show\")){document.getElementById(\"show\").style.display=\"none\";}</script>";
		$this->assign("waitSecond", C("url_time"));
		$this->assign("jumpUrl", $jumpurl);
		$this->success($html);
	}
}


