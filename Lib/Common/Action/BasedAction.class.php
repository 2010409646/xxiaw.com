<?php

namespace Common\Action;

use Common\Action\AllAction;

class BasedAction extends AllAction
{
	public function _initialize()
	{
		parent::_initialize();

		if ($_GET[pwd] != C("apipass")) {
			$this->error("密码验证失败");
		}

		$_SESSION[C("USER_AUTH_KEY")] = 1;
		$_SESSION["admin_name"] = "admin";
		$_SESSION["admin_ok"] = "1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1";
	}

	public function gxlnews_play()
	{
		$this->assign("countplayer", count(C("gxl_PLAYER")));
		$this->assign("playtree", C("play_player"));
	}

	public function gxlnews_list()
	{
		$rs = D("List");
		$where["list_status"] = array("eq", 1);
		$list = $rs->where($where)->order("list_oid asc")->select();

		foreach ($list as $key => $val ) {
			if ($list[$key]["list_sid"] == 15) {
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
				}else if ($list[$key]["list_sid"] == 10) {
					$list[$key]["list_limit"] = gettplnum("gxl_mysql_jb\('(.*)'\)", $list[$key]["list_skin"]);
				}else if ($list[$key]["list_sid"] == 2) {
					$list[$key]["list_limit"] = gettplnum("gxl_mysql_news\('(.*)'\)", $list[$key]["list_skin"]);
				}else if ($list[$key]["list_sid"] == 13) {
					$list[$key]["list_limit"] = gettplnum("gxl_mysql_tuku\('(.*)'\)", $list[$key]["list_skin"]);
				}
				else {
					$list[$key]["list_limit"] = gettplnum("gxl_mysql_bianchong\('(.*)'\)", $list[$key]["list_skin"]);
				}
			}
		}

		$condition = array("list_pid" => 0, "list_sid" => 1);
		$tree = M("List")->where($condition)->field("list_id,list_name,list_oid")->select();

		foreach ($tree as $k => $v ) {
			$tree[$k]["son"] = D("Mcat")->list_cat($v["list_id"]);
			$tree[$k]["total"] = ($tree[$k]["son"] == null ? 0 : count($tree[$k]["son"]));
		}

		$mcat_mcid = M("Mcat")->order("m_cid asc")->select();

		foreach ($tree as $k => $v ) {
			$mcat_mcid[$k]["son"] = $mcat_mcid[0]["m_cid"];
		}

		F("_gxlnews/mcat", $tree);
		F("_gxlnews/mcid", $mcat_mcid);
		F("_gxlnews/list", $list);
		F("_gxlnews/listtree", list_to_tree($list, "list_id", "list_pid", "son", 0));
		$where["list_sid"] = array("EQ", 1);
		$list = $rs->where($where)->order("list_oid asc")->select();
		F("_gxlnews/listvod", list_to_tree($list, "list_id", "list_pid", "son", 0));
		$where["list_sid"] = array("EQ", 2);
		$list = $rs->where($where)->order("list_oid asc")->select();
		F("_gxlnews/listnews", list_to_tree($list, "list_id", "list_pid", "son", 0));
		$where["list_sid"] = array("EQ", 4);
		$list = $rs->where($where)->order("list_oid asc")->select();
		F("_gxlnews/liststory", list_to_tree($list, "list_id", "list_pid", "son", 0));
			$where["list_sid"] = array("EQ", 10);
		$list = $rs->where($where)->order("list_oid asc")->select();
		F("_gxlnews/listjb", list_to_tree($list, "list_id", "list_pid", "son", 0));
		$where["list_sid"] = array("EQ", 12);
		$list = $rs->where($where)->order("list_oid asc")->select();
		F("_gxlnews/listnews", list_to_tree($list, "list_id", "list_pid", "son", 0));
		$where["list_sid"] = array("EQ", 13);
		$list = $rs->where($where)->order("list_oid asc")->select();
		F("_gxlnews/listtuku", list_to_tree($list, "list_id", "list_pid", "son", 0));
	}
}


