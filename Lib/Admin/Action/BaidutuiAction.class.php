<?php
namespace Admin\Action;
use Common\Action\BasedAction;
class BaidutuiAction extends BasedAction
{
	public function index()
	{
		$news_id = $_GET["id"];

		if (C("baidu_tui")) {
			$newsurl = gxl_data_url("news", $news_id, getnewscid($news_id), get_id_news_name($news_id), 1, $_POST["news_jumpurl"], getnewspinyin($news_id));
			$baidutui = baidutu($newsurl);
		}

		echo $baidutui;
	}
}


