<?php
namespace Admin\Action;
use Common\Action\BasedAction;
class CachesAction extends BasedAction
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

	

	
}


