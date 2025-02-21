<?php
namespace Home\Action;
use Common\Action\HomeAction;
class ActorAction extends HomeAction
{
	public function show()
	{
		$dir = I("get.dir", "none", "strip_tags,htmlspecialchars");
		$Url = gxl_param_url();

		if ($dir != "none") {
			$Url["id"] = get_id_by_dir($dir);
			$Url["dir"] = getlistdir($Url["id"]);
		}

		$JumpUrl = gxl_param_jump($Url);
		$JumpUrl["p"] = "{!page!}";
		C("jumpurl", UU("Home-actor/show", $JumpUrl, true, false));
		C("currentpage", $Url["page"]);
		$List = list_search(F("_gxlnews/list"), "list_id=" . $Url["id"]);
		$channel = $this->Lable_Actor_List($Url, $List[0]);
		$this->assign($channel);
		$this->assign("sid", $channel);
		$this->display("gxl_actorlist");
	}

	public function read()
	{
		$name = I("get.name", "none", "strip_tags,htmlspecialchars");
		$id = intval(I("get.id", "", "strip_tags,htmlspecialchars"));

		if ($name != "none") {
			$id = get_id_by_name($name);
		}

		$array_detail = $this->get_cache_detail($id);
		$this->assign($array_detail["show"]);
		$this->assign($array_detail["read"]);
		$this->assign($array_detail["story"]);
		$this->assign($array_detail["actor"]);
		$this->display("gxl_actor");
	}

	public function role()
	{
		$name = I("get.name", "none", "strip_tags,htmlspecialchars");
		$id = intval(I("get.id", "", "strip_tags,htmlspecialchars"));
		$vid = get_id_by_vodid($id);

		if ($name != "none") {
			$vid = get_id_by_name($name);
		}

		$array_detail = $this->get_cache_detail($vid);
		$array_actor["role"] = $array_detail["actor"]["actor_list"][$id];
		if ($array_detail && $array_actor["role"]) {
			$vod = A("Home.Vod");
			$actor = M("Actor");
			$year_vodlist = array();
			$where["actor_star"] = array("eq", $array_actor["role"]["star_name"]);
			$join = C("db_prefix") . "vod on " . C("db_prefix") . "actor.actor_vid = " . C("db_prefix") . "vod.vod_id ";
			$actorvod = $actor->field("actor_id,actor_vid,actor_pic,actor_name,actor_star,vod_mcid,vod_id,vod_cid,vod_name,vod_pic,vod_actor,vod_filmtime,vod_jumpurl,vod_letters,vod_year")->join($join)->where($where)->limit(16)->order("vod_year desc")->select();

			foreach ($actorvod as $key => $value ) {
				$year_vodlist[$key]["vod_year"] = $value["vod_year"];
				$year_vodlist[$key]["vod_filmtime"] = $value["vod_filmtime"];
				$year_vodlist[$key]["vod_name"] = $value["vod_name"];
				$year_vodlist[$key]["vod_mcid"] = $value["vod_mcid"];
				$year_vodlist[$key]["vod_pic"] = gxl_img_url($value["vod_pic"]);
				$year_vodlist[$key]["vod_actor"] = $value["vod_actor"];
				$year_vodlist[$key]["vod_readurl"] = gxl_data_url("vod", $value["vod_id"], $value["vod_cid"], $value["vod_name"], 1, $value["vod_jumpurl"], $value["vod_letters"]);
				$year_vodlist[$key]["actor_name"] = $actorvod[$key]["actor_name"];
				$year_vodlist[$key]["actor_url"] = gxl_actor_url("role", $value["vod_cid"], $value["vod_id"], $value["vod_letters"], $actorvod[$key]["actor_id"], 1);
				$year_vodlist[$key]["actor_pic"] = gxl_img_url($actorvod[$key]["actor_pic"]);
			}

			$this->assign("year_vodlist", $year_vodlist);
			$this->assign($array_actor["role"]);
			$this->assign($array_detail["show"]);
			$this->assign($array_detail["read"]);
			$this->assign($array_detail["story"]);
			$this->assign($array_detail["actor"]);
			$this->assign("thisurl", gxl_actor_url("role", $array_detail["read"]["vod_cid"], $array_detail["read"]["vod_id"], $array_detail["read"]["vod_letters"], $id, 1));
			$this->display("gxl_role");
		}
		else {
			header("HTTP/1.0 404 Not Found");
			header("status: 404 not found");
			$this->display("my_404");
			exit();
		}
	}

	private function get_cache_detail($vod_id)
	{
		if (!$vod_id) {
			return false;
		}

		if (C("data_cache_vod")) {
			$array_detail = S("data_cache_vod_" . $vod_id);

			if ($array_detail) {
				return $array_detail;
			}
		}

		$where = array();
		$where["vod_id"] = $vod_id;
		$where["vod_cid"] = array("gt", 0);
		$where["vod_status"] = array("eq", 1);
		$rs = D("Vod");
		$array = $rs->where($where)->relation(array("Tag", "Mcid", "Story", "Actor"))->find();

		if ($array) {
			$array_detail = $this->Lable_Vod_Read($array);

			if (C("data_cache_vod")) {
				S("data_cache_vod_" . $vod_id, $array_detail, intval(C("data_cache_vod")));
			}

			return $array_detail;
		}

		return false;
	}
}


