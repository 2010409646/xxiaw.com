<?php
namespace Common\Model;
use Think\Model\RelationModel;
class DownModel extends RelationModel
{
	private $down_id;
	protected $_validate = array(
		array("down_cid", "number", "请选择分类！", 1, "", 3),
		array("down_cid", "getlistson", "请选择当前分类下面的子栏目！", 1, "function", 3),
		array("down_name", "require", "文章标题必须填写！", 1, "", 3)
		);
	protected $_auto = array(
		array("down_name", "trim", 3, "function"),
		array("down_remark", "get_remark", 3, "callback"),
		array("down_letter", "a_letter", 3, "callback"),
		array("down_addtime", "a_addtime", 3, "callback"),
		array("down_pic", "down_pic", 3, "callback"),
		array("down_content", "down_content", 3, "callback")
		);
	protected $_link = array(
		"Tag" => array("mapping_type" => HAS_MANY, "class_name" => "Tag", "mapping_name" => "Tag", "foreign_key" => "tag_id", "parent_key" => "down_id", "mapping_fields" => "tag_id,tag_sid,tag_name", "condition" => "tag_sid = 7")
		);

	public function get_remark()
	{
		if (empty($_POST["down_remark"])) {
			return msubstr(trim($_POST["down_content"]), 0, 100, "utf-8", false);
		}
		else {
			return trim($_POST["down_remark"]);
		}
	}

	public function a_letter()
	{
		return gxl_letter_first(trim($_POST["down_name"]));
	}

	public function a_addtime()
	{
		if ($_POST["checktime"]) {
			return time();
		}
		else {
			return strtotime($_POST["addtime"]);
		}
	}

	public function down_content()
	{
		if (!empty($_POST["down_content"])) {
			$down_content = gxl_down_img_array($_POST["down_content"], 1);
			if ((C("upload_http") && !empty($down_content)) || (C("upload_http_down") && !empty($down_content))) {
				$img = D("Img");

				if (!!$path = getarraypic($down_content)) {
					$savePath = $img->down_load($path, "down");
					$contents1 = str_ireplace($path, $savePath, $down_content);
					return $contents1;
				}
				else {
					return $_POST["down_content"];
				}
			}
			else {
				return $down_content;
			}
		}
		else {
			return $_POST["down_content"];
		}
	}

	public function down_pic()
	{
		$img = D("Img");
		if (empty($_POST["down_pic"]) && $_POST["down_content"]) {
			if (C("down_pic")) {
				$urlpic = gxl_img_url_preg_down("", trim($_POST["down_content"]), 1);
			}
			else {
				$urlpic = gxl_img_url_preg("", trim($_POST["down_content"]), 1);
			}

			if ($urlpic) {
				return $img->down_load($urlpic, "down");
			}
			else {
				return $img->down_load(trim($_POST["down_pic"]), "down");
			}
		}
		else {
			return $img->down_load(trim($_POST["down_pic"]), "down");
		}
	}
}


