<?php
namespace Home\Action;
use Common\Action\HomeAction;
class ShowlistAction extends HomeAction
{
	public function show()
	{
		$dir = I("get.dir", "none", "strip_tags,htmlspecialchars");
		$Url = gxl_param_url();

		if ($dir != "none") {
			$Url["id"] = get_id_by_dir($dir);
		}

		$JumpUrl = gxl_param_jump($Url);
		$JumpUrl["p"] = "{!page!}";
		C("jumpurl", UU("Home-news/type", $JumpUrl, true, false));
		C("currentpage", $Url["page"]);
		$List = list_search(F("_gxlnews/list"), "list_id=" . $Url["id"]);
		$channel = $this->Lable_news_List($Url, $List[0]);
		$this->assign($channel);
		$channel["list_skin"] = "gxl_ajaxlist";
		$this->display($channel["list_skin"]);
	}

	private function get_cache_detail($news_id)
	{
		if (!$news_id) {
			return false;
		}

		if (C("data_cache_news")) {
			$array_detail = S("data_cache_news_" . $news_id);

			if ($array_detail) {
				return $array_detail;
			}
		}

		$where = array();
		$where["news_id"] = $news_id;
		$where["news_cid"] = array("gt", 0);
		$where["news_status"] = array("eq", 1);
		$rs = D("news");
		$array = $rs->where($where)->relation("Tag")->find();

		if ($array) {
			$array_detail = $this->Lable_news_Read($array);

			if (C("data_cache_news")) {
				S("data_cache_news_" . $news_id, $array_detail, intval(C("data_cache_news")));
			}

			return $array_detail;
		}

		return false;
	}
}


