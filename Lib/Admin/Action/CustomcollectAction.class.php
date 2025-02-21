<?php
namespace Admin\Action;
use Common\Action\BaseAction;
class CustomcollectAction extends BaseAction
{
	private $CModel;
	private $RModel;

	public function _initialize()
	{
		parent::_initialize();
		$this->CModel = D("CustomCollect");
		$this->RModel = D("ColRun");
	}

	public function Index()
	{
		exit();
	}

	public function Add()
	{
		header("Cache-control: private");

		if (isset($_POST["dosubmit"])) {
			$Get = $this->CModel->GetParam();

			if (!$this->CModel->CheckParam($Get)) {
				$this->error($this->CModel->getError());
			}

			if ($nid = $this->CModel->Save($Get)) {
				$this->assign("jumpUrl", C("cms_admin") . "?s=Admin-Customcollect-ListShow");

				if (!empty($Get["nid"])) {
					$this->success("修改成功！");
					$this->success("跳转到预览页面");
				}
				else {
					$this->success("添加成功！");
				}
			}
			else {
				$this->error("操作失败！");
			}
		}
		else {
			if (!empty($_GET["nid"])) {
				$this->assign($this->CModel->DataShow($_GET["nid"]));
			}

			$ArrBase = $this->CModel->BaseArr();
			$this->assign("base", $ArrBase);
			$this->assign("files", $this->CModel->FilterRules());
			$this->assign("channel_tree", F("_gxlnews/list"));
			$this->display("./Public/system/node_form.html");
		}
	}

	public function Manage()
	{
		$action = $_GET["action"];
		$this->assign("jumpUrl", C("cms_admin") . "?s=Admin-Customcollect-ListShow");

		switch ($action) {
		case $action:
			$ArrCopy = $this->CModel->ActionCheck();

			if ($ArrCopy) {
				if (isset($_POST["dosubmit"])) {
					$Result = $this->CModel->Copy($ArrCopy);

					if ($Result) {
						$this->success("复制成功！");
					}
					else {
						$this->error("操作失败！");
					}
				}
				else {
					$this->assign("name", $ArrCopy["name"]);
					$this->assign("nid", $ArrCopy["id"]);
					$this->display("./Public/system/node_cp.html");
				}
			}
			else {
				$this->error("参数错误！");
			}

			break;

		case $action:
			if ($_POST["codedata"]) {
				header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment; filename=coll_" . $_GET["nid"] . ".txt");
				echo $_POST["codedata"];
			}

			break;

		case $action:
			if ($Data = $this->CModel->ExpCode()) {
				$this->assign("data", $Data);
				$this->assign("nid", $_GET["nid"]);
				$this->display("./Public/system/export.html");
			}

			break;

		case $action:
			if (isset($_POST["submit"])) {
				$Save = $this->CModel->SaveImport();

				if ($Save) {
					$this->success("导入成功！");
				}
				else {
					$this->assign("jumpUrl", C("cms_admin") . "?s=Admin-Customcollect-Manage-action-import");

					if ($this->CModel->getError()) {
						$this->error($this->CModel->getError());
					}
					else {
						$this->error("无法识别的编码！");
					}
				}
			}
			else {
				$this->display("./Public/system/export.html");
			}

			break;

		case $action:
			if ($this->CModel->Del()) {
				$this->success("删除成功！");
			}

			break;

		case $action:
			if ($this->CModel->DelAll()) {
				$this->success("批量删除成功！");
			}

			break;

		default:
			echo "Request error";
			break;
		}
	}

	public function TestUrl()
	{
		$ArrUrl = $this->CModel->GetUrl();

		if (!$ArrUrl) {
		}
		else {
			$this->assign("ArrUrl", $ArrUrl);
		}

		$this->assign("jumpUrl", "?s=Admin-Customcollect-Add");
		$this->display("./Public/system/url_list.html");
	}

	public function ListShow()
	{
		$ArrNode = $this->CModel->ShowList();
		$this->assign("cache", F("_gxlnews/ColCache"));
		$this->assign("ArrList", $ArrNode["node"]);
		$this->assign("pagelist", $ArrNode["pagelist"]);
		$this->display("./Public/system/node_list.html");
	}

	public function ColTest()
	{
		$Get = $this->CModel->GetParam();

		if (!$this->CModel->CheckParam($Get)) {
			$this->error($this->CModel->getError());
		}

		$ArrUrl = $this->RModel->CoUrl($Get);
		$Con = $this->RModel->Contest($ArrUrl["url"][0], $Get);
		$this->assign("url", $ArrUrl["url"][0]["url"]);
		$this->assign("con", $Con);
		$this->display("./Public/system/col_url.html");
	}

	public function ColRun()
	{
		header("Content-type: text/html; charset=utf-8");
		$Param = $this->RModel->GetParam();
		$Data = $this->RModel->Check($Param);

		if (!$Data) {
			$this->error($this->RModel->getError());
		}

		$this->assign("jumpUrl", "?s=Admin-Customcollect-ListShow");
		if (($Param["action"] === "real") && ($Param["type"] === "content")) {
			$ColResult = $this->RModel->Collecting($Data);

			if ($ColResult) {
				if ($ColResult == "1") {
					$this->success("采集完成! 自动跳转到采集节点管理");
					exit();
				}

				$this->assign("video", $ColResult);
				$this->display("./Public/system/col_cont.html");
				exit();
			}
			else {
				$this->error($this->RModel->getError());
			}
		}

		$ArrUrl = $this->RModel->CoUrl($Data);

		if ($Param["action"] === "demo") {
			$Con = $this->RModel->Contest($ArrUrl["url"][0], $Data);
			$this->assign("url", $ArrUrl["url"][0]["url"]);
			$this->assign("con", $Con);
		}

		if ($Param["type"] === "all") {
			$this->assign("ArrUrl", $ArrUrl);
			$this->display("./Public/system/col_url.html");
		}
	}

	public function ColVideo()
	{
		$Search = $this->RModel->ColVideoSearch();
		$Arr = $this->RModel->ColVideoList($Search);
		$this->assign("Arr", $Arr);
		$this->assign("nodetree", F("_gxlnews/ColNode"));
		$this->display("./Public/system/col_video_list.html");
	}

	public function ColManage()
	{
		header("Content-type: text/html; charset=utf-8");

		if (empty($_GET["act"])) {
			$this->error("参数 有误!");
		}
		else {
			$act = $_GET["act"];
			if (($act == "inflow") || ($act == "allinflow") || ($act == "today") || ($act == "allunused")) {
				$Result = $this->RModel->Inflow($act);

				if ($Result) {
					print_r($Result);
					$this->redirect("Admin-Customcollect/ColManage-act-" . $act . "", array(), 3, "<p>每次入库50条数据,为了减小服务器压力，3秒后进行下一次操作~</p>");
					$this->assign("result", $Result);
					$this->display("./Public/system/col_video_save.html");
				}
				else {
					$this->error($this->RModel->getError());
				}
			}
			else {
				if (($act == "delselect") || ($act == "delall") || ($act == "delonly")) {
					if ($this->RModel->Del($act)) {
						$this->success("删除影片成功!");
					}
					else {
						$this->error($this->RModel->getError());
					}
				}
			}
		}
	}

	public function AutoChannel()
	{
		if (!empty($_GET["action"])) {
			if ($this->CModel->ChannelManage($_GET["action"])) {
				$this->assign("jumpUrl", C("cms_admin") . "?s=Admin-Customcollect-AutoChannel");
				$this->success("操作成功!");
			}
			else {
				$this->error($this->CModel->getError());
			}
		}
		else {
			$search = $this->CModel->ChannelSearch();
			$this->assign("nodetree", F("_gxlnews/ColNode"));
			$this->assign("list", $this->CModel->ChannelList($search));
			$this->assign("channel_tree", F("_gxlnews/channeltree"));
			$this->display("./Public/system/col_class.html");
		}
	}
}


