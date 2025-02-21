<?php
namespace Admin\Action;
use Common\Action\BaseapiAction;
class ApinewsAction extends BaseapiAction
{
	public function getcate()
	{
		$rs = F("_gxlnews/listnews");
		$select_start = "<select name=\"vod_cid\" id=\"vod_cid\" style=\"width:100px\">";
		$select_option = "";

		foreach ($rs as $c ) {
			if (isset($c["son"])) {
				foreach ($c["son"] as $s ) {
					$select_option = $select_option . "<option value=\"" . $s["list_id"] . "\">" . $c["list_name"] . "---" . $s["list_name"] . "</option>";
				}
			}
			else {
				$select_option = $select_option . "<option value=\"" . $c["list_id"] . "\">" . $c["list_name"] . "</option>";
			}
		}

		$select_end = "</select>";
		$select = $select_start . $select_option . $select_end;
		print_r($select);
		exit();
	}

	public function _before_insert()
	{
		$_POST["news_keywords"] = explode(",", str_replace(array("，", "、"), ",", $_POST["news_keywords"]));
		$_POST["news_keywords"] = implode(",", array_unique($_POST["news_keywords"]));
		$list = M("list");
		$list_name = $_POST["news_cid"];
		$listcid = $list->where("list_name ='$list_name'")->getField("list_id");
		$_POST["news_cid"] = $listcid;
		$news_name = $_POST["news_name"];
		$array = M("News")->field("news_id")->where("news_name='$news_name'")->find();

		if ($array) {
			$this->success("添加新闻失败,存在相同新闻");
			exit();
		}
	}

	public function insert()
	{
		$rs = D("News");
		$newsrel = D("Newsrel");

		if ($rs->create()) {
			$id = $rs->add();

			if (false !== $id) {
				if ($_POST["news_vod"]) {
					$newsrel->newsrel_update($id, $_POST["news_vod"], 1);
				}

				if ($_POST["news_star"]) {
					$newsrel->newsrel_update($id, $_POST["news_star"], 2);
				}
				else {
					$newsrel->newsrel_update($id, $_POST["news_keywords"]);
				}

				if (C("baidu_tui") && C("cai_baidutui")) {
					$newsurl = gxl_data_url("news", $id, $_POST["news_cid"], $_POST["news_name"], 1, $_POST["news_jumpurl"]);
					$baidutui = baidutu($newsurl);
				}

				print_r($baidutui);
				$this->assign("jumpUrl", "?s=Admin-News-Add");
			}
		}
		else {
			$this->success("添加新闻失败");
		}
	}

	public function _after_insert()
	{
		cookie("news_cid", intval($_POST["news_cid"]));

		if (C("data_cache_news")) {
			S("data_cache_news_" . $news_id, NULL);
		}

		if (C("html_cache_on")) {
			@unlink(HTML_PATH . "index" . C("html_file_suffix"));
			$list_url = md5(getlistname($_POST["news_cid"], "list_url"));
			$big_url = md5(getlistname($_POST["news_cid"], "list_url_big"));
			$news_url = md5(gxl_data_url("news", $news_id, $_POST["news_cid"], $_POST["news_name"], 1, $_POST["news_jumpurl"]));
			@unlink(HTML_PATH . "/Vod_show/" . $list_url . C("html_file_suffix"));
			@unlink(HTML_PATH . "/Vod_show/" . $big_url . C("html_file_suffix"));
			@unlink(HTML_PATH . "/News_read/" . $news_url . C("html_file_suffix"));
		}

		if (C("url_html")) {
			echo "<iframe scrolling=\"no\" src=\"?s=Admin-Create-newsid-id-" . $news_id . "\" frameborder=\"0\" style=\"display:none\"></iframe>";
		}

		$this->success("添加新闻成功");
	}

	public function update()
	{
		$this->_before_insert();
		$tag = D("Tag");
		$rs = D("News");
		$newsrel = D("Newsrel");

		if ($rs->create()) {
			if (false !== $rs->save()) {
				if ($_POST["news_keywords"]) {
					$tag->tag_update($_POST["news_id"], $_POST["news_keywords"], 2);
				}

				if ($_POST["news_vod"]) {
					$newsrel->newsrel_update($_POST["news_id"], $_POST["news_vod"], 1);
				}

				if ($_POST["news_star"]) {
					$newsrel->newsrel_update($_POST["news_id"], $_POST["news_star"], 2);
				}

				$rs->$news_id = $_POST["news_id"];
			}
			else {
				$this->error("修改新闻信息失败！");
			}
		}
		else {
			$this->error($rs->getError());
		}
	}

	public function _after_update()
	{
		$rs = D("News");
		$news_id = $rs->$news_id;

		if ($news_id) {
			$this->_after_add_update($news_id);
			$this->assign("jumpUrl", $_SESSION["news_jumpurl"]);
			$this->success("修改新闻信息成功！");
		}
		else {
			$this->error("修改新闻信息失败！");
		}
	}

	public function _after_add_update($news_id)
	{
		if (C("data_cache_news")) {
			S("data_cache_news_" . $news_id, NULL);
		}

		if (C("html_cache_on")) {
			@unlink(HTML_PATH . "index" . C("html_file_suffix"));
			$list_url = md5(getlistname($_POST["news_cid"], "list_url"));
			$big_url = md5(getlistname($_POST["news_cid"], "list_url_big"));
			$news_url = md5(gxl_data_url("news", $news_id, $_POST["news_cid"], $_POST["news_name"], 1, $_POST["news_jumpurl"]));
			@unlink(HTML_PATH . "/Vod_show/" . $list_url . C("html_file_suffix"));
			@unlink(HTML_PATH . "/Vod_show/" . $big_url . C("html_file_suffix"));
			@unlink(HTML_PATH . "/News_read/" . $news_url . C("html_file_suffix"));
		}

		if (C("url_html")) {
			echo "<iframe scrolling=\"no\" src=\"?s=Admin-Create-newsid-id-" . $news_id . "\" frameborder=\"0\" style=\"display:none\"></iframe>";
		}
	}

	public function del()
	{
		$this->delfile($_GET["id"]);
		redirect($_SESSION["news_jumpurl"]);
	}

	public function delall()
	{
		if (empty($_POST["ids"])) {
			$this->error("请选择需要删除的文章！");
		}

		$array = $_POST["ids"];

		foreach ($array as $val ) {
			$this->delfile($val);
		}

		redirect($_SESSION["news_jumpurl"]);
	}

	public function delfile($id)
	{
		$rs = D("Topic");
		$where["topic_sid"] = 1;
		$where["topic_did"] = $id;
		$rs->where($where)->delete();
		unset($where);
		unset($where);
		$rs = D("Cm");
		$where["cm_cid"] = $id;
		$where["cm_sid"] = 2;
		$rs->where($where)->delete();
		$rs = D("Tag");
		$where["tag_id"] = $id;
		$where["tag_sid"] = 2;
		$rs->where($where)->delete();
		unset($where);
		$rs = D("Newsrel");
		$where["newsrel_nid"] = $id;
		$rs->where($where)->delete();
		unset($where);
		$rs = D("News");
		$where["news_id"] = $id;
		$array = $rs->field("news_id,news_cid,news_pic,news_name")->where($where)->find();
		@unlink(gxl_img_url($arr["news_pic"]));

		if (0 < C("url_html")) {
			@unlink(gxl_data_url("news", $array["news_id"], $array["news_cid"], $array["news_name"], 1));
		}

		unset($where);
		$where["news_id"] = $id;
		$rs = D("News");
		$rs->where($where)->delete();
		unset($where);
	}

	public function pestcid()
	{
		if (empty($_POST["ids"])) {
			$this->error("请选择需要转移的新闻！");
		}

		$cid = intval($_POST["pestcid"]);

		if (getlistson($cid)) {
			$rs = D("News");
			$data["news_cid"] = $cid;
			$where["news_id"] = array("in", $_POST["ids"]);
			$rs->where($where)->save($data);
			redirect($_SESSION["news_jumpurl"]);
		}
		else {
			$this->error("请选择当前大类下面的子分类！");
		}
	}

	public function create()
	{
		echo "<iframe scrolling=\"no\" src=\"?s=Admin-Create-newsid-id-" . implode(",", $_POST["ids"]) . "\" frameborder=\"0\" style=\"display:none\"></iframe>";
		$this->assign("jumpUrl", $_SESSION["news_jumpurl"]);
		$this->success("批量生成新闻成功！");
	}
}


