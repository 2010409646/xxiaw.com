<?php

namespace Home\Action;
use Common\Action\HomeAction;
class OtherAction extends HomeAction
{
	public function vodid()
	{
		$where = array();
		$rs = D("Vod");
		$where["vod_id"] = array("in", $_REQUEST["id"]);
		$where["vod_cid"] = array("gt", 0);
		$where["vod_status"] = 1;
		$array = $rs->where($where)->relation(true)->select();

		if ($array) {
			foreach ($array as $value ) {
				$this->vod_read_create($value);
			}
		}
	}

	public function vod_read_create($array)
	{
		$arrays = $this->Lable_Vod_Read($array);
		$this->assign($arrays["show"]);
		$this->assign($arrays["read"]);
		$videodir = gxl_data_url_dir("vod", $arrays["read"]["vod_id"], $arrays["read"]["vod_cid"], $arrays["read"]["vod_name"], 1, $arrays["read"]["vod_pyname"]);
		$filename = $_SERVER["DOCUMENT_ROOT"] . "/" . $videodir . ".html";
		$this->buildHtml($videodir, "./", $arrays["read"]["vod_skin"]);
		ob_flush();
		flush();
	}

	public function gettag()
	{
		$title = $_POST["title"];
		$content = $_POST["content"];
		echo gxl_tag_auto($title, $content);
	}
}


