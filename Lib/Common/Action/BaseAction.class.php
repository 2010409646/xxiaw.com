<?php
namespace Common\Action;
use Common\Action\AllAction;

class BaseAction extends AllAction
{
	public function _initialize()
	{
		parent::_initialize();

		if (!$_SESSION[C("USER_AUTH_KEY")]) {
			$this->assign("jumpUrl", C("cms_admin") . "?s=Admin-Login");
			$this->error("对不起，您还没有登录，请先登录！");
		}

		if (!in_array(strtolower(ACTION_NAME), explode(",", C("NOT_AUTH_ACTION")))) {
			$model_id = array_search(CONTROLLER_NAME, explode(",", C("REQUIRE_AUTH_MODULE")));
		
			if (is_int($model_id)) {
				$usertype = explode(",", $_SESSION["admin_ok"]);

				if (!$usertype[$model_id]) {
					$this->error("对不起，您没有管理该模块的权限，请联系超级管理员授权！");
				}
			}
		}
	}

	public function gxlnews_play()
	{
		$this->assign("countplayer", count(C("gxl_PLAYER")));
		$this->assign("playtree", C("play_player"));
	}
public function gxlnews_area()
	{
		$rs = D("Area");
		$where["area_status"] = array("eq", 1);
		$area = $rs->where($where)->order("area_oid asc")->select();

		foreach ($area as $key => $val ) {
			if ($area[$key]["area_sid"] == 9) {
				$area[$key]["area_url"] = $area[$key]["area_jumpurl"];
				$area[$key]["area_url_big"] = $area[$key]["area_jumpurl"];
			}
			else {
				if (C("url_rewrite")) {
					$area[$key]["area_url"] = gxl_list_url(getsidname($area[$key]["area_sid"]), array("id" => $area[$key]["area_id"], "areadir" => $area[$key]["area_dir"]), 1);
					$area[$key]["area_url_big"] = gxl_list_url(getsidname($area[$key]["area_sid"]), array("id" => $area[$key]["area_pid"], "areadir" => gelistdir_id($area[$key]["area_pid"])), 1);
				}
				else {
					$area[$key]["area_url"] = gxl_list_url(getsidname($area[$key]["area_sid"]), array("id" => $area[$key]["area_id"]), 1);
					$area[$key]["area_url_big"] = gxl_list_url(getsidname($area[$key]["area_sid"]), array("id" => $area[$key]["area_pid"]), 1);
				}

				$area[$key]["area_name_big"] = getlistname($area[$key]["area_pid"]);

				if ($area[$key]["area_sid"] == 1) {
					$area[$key]["area_limit"] = gettplnum("gxl_mysql_vod\('(.*)'\)", $area[$key]["area_skin"]);
				}
				else if ($area[$key]["area_sid"] == 4) {
					$area[$key]["area_limit"] = gettplnum("gxl_mysql_story\('(.*)'\)", $area[$key]["area_skin"]);
				}
				else {
					$area[$key]["area_limit"] = gettplnum("gxl_mysql_news\('(.*)'\)", $area[$key]["area_skin"]);
				}
			}
		}

		$condition = array("area_pid" => 0, "area_sid" => 2);
		$tree = M("Area")->where($condition)->field("area_id,area_name,area_oid")->order("area_oid asc")->select();

		foreach ($tree as $k => $v ) {
			$tree[$k]["son"] = D("Mcat")->area_cat($v["area_id"]);
			$tree[$k]["total"] = ($tree[$k]["son"] == null ? 0 : count($tree[$k]["son"]));
		}

		$mcat_mcid = M("Mcat")->order("m_cid asc")->select();

		foreach ($tree as $k => $v ) {
			$mcat_mcid[$k]["son"] = $mcat_mcid[0]["m_cid"];
		}

		F("_gxlnews/mcat", $tree);
		F("_gxlnews/mcid", $mcat_mcid);
		F("_gxlnews/area", $area);
		F("_gxlnews/areatree", list_to_tree($area, "area_id", "area_pid", "son", 0));
		
		$where["area_sid"] = array("EQ", 4);
		$area = $rs->where($where)->order("area_oid asc")->select();
		F("_gxlnews/area_list", list_to_tree($area, "area_id", "area_pid", "son", 0));
	}
	public function gxlnews_list()
	{
		$rs = D("List");
		$where["list_status"] = array("eq", 1);
		$list = $rs->where($where)->order("list_oid asc")->select();

		foreach ($list as $key => $val ) {
			if ($list[$key]["list_sid"] == 9) {
				$list[$key]["list_url"] = $list[$key]["list_jumpurl"];
				$list[$key]["list_url_big"] = $list[$key]["list_jumpurl"];
			}
			else {
		
				if (C("url_rewrite")) {
					$list[$key]["list_url"] = gxl_list_url(getsidname($list[$key]["list_sid"]), array("id" => $list[$key]["list_id"], "listdir" => $list[$key]["list_dir"]), 1);
					$list[$key]["list_url_big"] = gxl_list_url(getsidname($list[$key]["list_sid"]), array("id" => $list[$key]["list_pid"], "listdir" => gelistdir_id($list[$key]["list_pid"])), 1);
				}
				else {
					$list[$key]["list_url"] = gxl_list_url(getsidname($list[$key]["list_sid"]), array("id" => $list[$key]["list_id"]), 1);
					$list[$key]["list_url_big"] = gxl_list_url(getsidname($list[$key]["list_sid"]), array("id" => $list[$key]["list_pid"]), 1);
				}

				$list[$key]["list_name_big"] = getlistname($list[$key]["list_pid"]);

				if ($list[$key]["list_sid"] == 1) {
					$list[$key]["list_limit"] = gettplnum("gxl_mysql_vod\('(.*)'\)", $list[$key]["list_skin"]);
				}
				else if ($list[$key]["list_sid"] == 4) {
					$list[$key]["list_limit"] = gettplnum("gxl_mysql_story\('(.*)'\)", $list[$key]["list_skin"]);
				}
				else {
					$list[$key]["list_limit"] = gettplnum("gxl_mysql_news\('(.*)'\)", $list[$key]["list_skin"]);
				}
			}
		}
		
		$condition = array("list_pid" => 0, "list_sid" => 2);
		$tree = M("List")->where($condition)->field("list_id,list_name,list_oid")->order("list_oid asc")->select();

		foreach ($tree as $k => $v ) {
			$tree[$k]["son"] = D("Mcat")->list_cat($v["list_id"]);
			$tree[$k]["total"] = ($tree[$k]["son"] == null ? 0 : count($tree[$k]["son"]));
		}

		$mcat_mcid = M("Mcat")->order("m_cid asc")->select();

		foreach ($tree as $k => $v ) {
			$mcat_mcid[$k]["son"] = $mcat_mcid[0]["m_cid"];
		}

		F("_gxlnews/list", $list);
		F("_gxlnews/listtree", list_to_tree($list, "list_id", "list_pid", "son", 0));
		$where["list_sid"] = array("EQ", 1);
		$list = $rs->where($where)->order("list_oid asc")->select();
		F("_gxlnews/listaudio", list_to_tree($list, "list_id", "list_pid", "son", 0));
		$where["list_sid"] = array("EQ", 2);
		$list = $rs->where($where)->order("list_oid asc")->select();
		F("_gxlnews/listnews", list_to_tree($list, "list_id", "list_pid", "son", 0));
		$where["list_sid"] = array("EQ", 3);
		$list = $rs->where($where)->order("list_oid asc")->select();
		F("_gxlnews/listzhidao", list_to_tree($list, "list_id", "list_pid", "son", 0));
		$where["list_sid"] = array("EQ",4);
		$list = $rs->where($where)->order("list_oid asc")->select();
		F("_gxlnews/listlinks", list_to_tree($list, "list_id", "list_pid", "son", 0));
		$where["list_sid"] = array("EQ",5);
		$list = $rs->where($where)->order("list_oid asc")->select();
		F("_gxlnews/listdoc", list_to_tree($list, "list_id", "list_pid", "son", 0));
			$where["list_sid"] = array("EQ", 7);
		$list = $rs->where($where)->order("list_oid asc")->select();
		F("_gxlnews/listdown", list_to_tree($list, "list_id", "list_pid", "son", 0));
	}
}


