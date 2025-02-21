<?php

namespace Plus\Action;
use Common\Action\BaseAction;
class MyAction extends BaseAction
{
	public function statusall()
	{
		if (empty($_POST["ids"])) {
			$this->error("请选择需要审核的影片！");
		}

		$rs = D("news");
		$array = $_POST["ids"];

		foreach ($array as $val ) {
			$where["news_id"] = $val;
			$rs->where($where)->setField("news_status", 1);
		}

		redirect("?s=Admin-news-Show-status-3");
	}
}


