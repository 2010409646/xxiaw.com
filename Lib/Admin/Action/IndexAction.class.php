<?php
namespace Admin\Action;
use Common\Action\BaseAction;
class IndexAction extends BaseAction
{
	public function index()
	{
		$this->display("./Public/system/index.html");
	}

	public function top()
	{
		$this->display("./Public/system/top.html");
	}

	public function left()
	{
		$array = F("_nav/list");
		$this->assign("array_nav", $array);
		$this->display("./Public/system/left.html");
	}

	public function right()
	{
		$this->display("./Public/system/right.html");
	}

	public function phpinfo()
	{
		phpinfo();
	}
}


