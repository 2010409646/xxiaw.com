<?php
namespace Common\Action;

use Common\Action\AllAction;

class BaseapiAction extends AllAction
{
	public function _initialize()
	{
		parent::_initialize();

		if (C("apipass") != $_REQUEST["pass"]) {
			$this->error("密码错误");
		}

		$_SESSION[C("USER_AUTH_KEY")] = 1;
		$_SESSION["admin_name"] = "admin";
		$_SESSION["admin_ok"] = "1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1";
	}
}


