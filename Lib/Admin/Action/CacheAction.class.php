<?php

namespace Admin\Action;
use Common\Action\BaseAction;
class CacheAction extends BaseAction
{
	public function show()
	{
		$this->display("./Public/system/cache_show.html");
	}

	public function del()
	{
		$dir = new \Org\Net\Dir();
		$this->gxlnews_list();
		@unlink("./Runtime/common~runtime.php");

		if (!$dir->isEmpty("./Runtime/Data/_fields")) {
			$dir->del("./Runtime/Data/_fields");
		}

		if (!$dir->isEmpty("./Runtime/Temp")) {
			$dir->delDir("./Runtime/Temp");
		}

		if (!$dir->isEmpty("./Runtime/Cache")) {
			$dir->delDir("./Runtime/Cache");
		}

		if (!$dir->isEmpty("./Runtime/Logs")) {
			$dir->delDir("./Runtime/Logs");
		}

		echo "清除成功";
	}

	public function delhtml()
	{
		$id = $_GET["id"];
		$dir = new \Org\Net\Dir();

		if ("index" == $id) {
			@unlink(HTML_PATH . "index" . C("html_file_suffix"));
		}
		else if ("newslist" == $id) {
			if (is_dir(HTML_PATH . "News_show")) {
				$dir->delDir(HTML_PATH . "News_show");
			}
		}
		else if ("newsread" == $id) {
			if (is_dir(HTML_PATH . "News_read")) {
				$dir->delDir(HTML_PATH . "News_read");
			}
		}
		else if ("ajax" == $id) {
			if (is_dir(HTML_PATH . "My_show")) {
				$dir->delDir(HTML_PATH . "My_show");
			}

			if (is_dir(HTML_PATH . "Ajax_show")) {
				$dir->delDir(HTML_PATH . "Ajax_show");
			}
		}
		else if ("speciallist" == $id) {
			if (is_dir(HTML_PATH . "Special_show")) {
				$dir->delDir(HTML_PATH . "Special_show");
			}
		}
		else if ("specialread" == $id) {
			if (is_dir(HTML_PATH . "Special_read")) {
				$dir->delDir(HTML_PATH . "Special_read");
			}
		}
		else if ("day" == $id) {
			$this->delhtml_day();
		}
		else {
			@unlink(HTML_PATH . "index" . C("html_file_suffix"));
			if (is_dir(HTML_PATH . "News_show")) {
				$dir->delDir(HTML_PATH . "News_show");
			}

			if (is_dir(HTML_PATH . "News_read")) {
				$dir->delDir(HTML_PATH . "News_read");
			}

			if (is_dir(HTML_PATH . "My_show")) {
				$dir->delDir(HTML_PATH . "My_show");
			}

			if (is_dir(HTML_PATH . "Special_read")) {
				$dir->delDir(HTML_PATH . "Special_read");
			}

			if (is_dir(HTML_PATH . "Ajax_show")) {
				$dir->delDir(HTML_PATH . "Ajax_show");
			}

		}

		echo "清除成功";
	}

	
	public function dataclear()
	{
		if ((C("data_cache_type") == "memcache") || (C("data_cache_type") == "xcache")) {
			$cache = \Think\Cache::getInstance();
			$cache->clear();
		}
		else {
			$dir = new \Org\Net\Dir();

			if (!$dir->isEmpty(TEMP_PATH)) {
				$dir->delDir(TEMP_PATH);
			}
		}

		echo "清除成功";
	}

	public function dataforeach()
	{
		$config_old = require "./Runtime/Conf/config.php";
		$config_new = array_merge($config_old, array("data_cache_foreach" => uniqid()));
		arr2file("./Runtime/Conf/config.php", $config_new);
		@unlink("./Runtime/common~runtime.php");
		echo "清除成功";
	}

	
	public function datadaynews()
	{
		$where = array();
		$where["news_addtime"] = array("gt", getxtime(1));
		$rs = M("News");
		$array = $rs->field("news_id")->where($where)->order("news_id desc")->select();

		foreach ($array as $key => $val ) {
			S("data_cache_news_" . $val["news_id"], NULL);
		}

		echo "清除成功";
	}

	public function datadayspecial()
	{
		$where = array();
		$where["special_addtime"] = array("gt", getxtime(1));
		$rs = M("Special");
		$array = $rs->field("special_id")->where($where)->order("special_id desc")->select();

		foreach ($array as $key => $val ) {
			S("data_cache_special_" . $val["special_id"], NULL);
		}

		echo "清除成功";
	}
}


