<?php
namespace Admin\Action;
use Common\Action\BaseAction;

class UploadjsonAction extends BaseAction
{
	public function show()
	{
		$this->display("./Public/system/upload_show.html");
	}

	public function upload()
	{
		$title = ($_POST["title"] ? $_POST["title"] : "");
		$uppath = "./" . str_replace(array("..", "//"), "", C("upload_path")) . "/";
		$uppath_s = "./" . str_replace(array("..", "//"), "", C("upload_path")) . "-s/";
		$sid = trim($_POST["sid"]);
		$fileback = (!empty($_POST["fileback"]) ? trim($_POST["fileback"]) : "news_pic");

		if ($sid) {
			$uppath .= $sid . "/";
			$uppath_s .= $sid . "/";
			mkdirss($uppath);
			mkdirss($uppath_s);
		}

		$up = new \Org\Net\UploadFile();
		$up->savePath = $uppath;
		$up->saveRule = uniqid;
		$up->uploadReplace = true;
		$upload_class = str_replace(array("php", "asp", "apsx", "txt", "asax", "ascx", "cdx", "cer", "cgi", "jsp", "html", "html", "htm", ",,"), "", strtolower(C("upload_class")));
		$upload_classs = trim($upload_class, ",");
		$up->allowExts = explode(",", $upload_classs);
		$up->autoSub = true;
		$up->subType = date;
		$up->dateFormat = C("upload_style");

		if (!$up->upload()) {
			$error = $up->getErrorMsg();

			if ($error == "上传文件类型不允许") {
				$error .= "，可上传<font color=red>" . $upload_classs . "</font>";
			}

			exit($error . " [<a href=\"?s=Admin-Upload-Show-sid-" . $sid . "-fileback-" . $fileback . "\">重新上传</a>]");
		}

		$uploadList = $up->getUploadFileInfo();

		if (C("upload_water")) {
			$image = new \Think\Image();
			$image->open($uppath . $uploadList[0]["savename"])->water(C("upload_water_img"), C("upload_water_pos"), C("upload_water_pct"))->save($uppath . $uploadList[0]["savename"]);
		}

		if (C("upload_thumb")) {
			$thumbdir = substr($uploadList[0]["savename"], 0, strrpos($uploadList[0]["savename"], "/"));
			mkdirss($uppath_s . $thumbdir);
			$image = new \Think\Image();
			$image->open($uppath . $uploadList[0]["savename"]);
			$image->thumb(C("upload_thumb_w"), C("upload_thumb_h"), C("upload_thumb_pos"))->save($uppath_s . $uploadList[0]["savename"]);
		}

		if (C("upload_ftp")) {
			$img = D("Img");
			$img->ftp_upload($sid . "/" . $uploadList[0]["savename"]);
		}

		header("Content-type: text/html; charset=UTF-8");
		$imagesurl = "/" . C("upload_path") . "/" . $sid . "/" . $uploadList[0]["savename"];
		echo json_encode(array("error" => 0, "url" => $imagesurl, "title" => $title));
		exit();
	}
}


