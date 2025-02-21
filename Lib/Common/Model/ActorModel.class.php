<?php
namespace Common\Model;
use Think\Model\RelationModel;
class ActorModel extends RelationModel
{
	private $vod_id;
	protected $_validate = array(
		array("actor_vid", "require", "影片ID必须填写！", 1, "", 3)
		);
	protected $_auto = array(
		array("actor_content", "actor_content", 3, "callback")
		);
	protected $_link = array(
		"Vod" => array("mapping_type" => HAS_MANY, "class_name" => "Vod", "mapping_name" => "Vod", "foreign_key" => "vod_id", "parent_key" => "actor_vid", "mapping_fields" => "vod_id,vod_cid,vod_mcid,vod_name,vod_title,vod_keywords,vod_actor,vod_director,vod_content,vod_pic")
		);

	public function actor_content()
	{
		if (!empty($_POST["actor_content"])) {
			$actor_content = gxl_news_img_array($_POST["actor_content"], 1);
			if ((C("upload_http") && !empty($actor_content)) || (C("upload_http_news") && !empty($actor_content))) {
				$img = D("Img");

				if (!!$path = getarraypic($actor_content)) {
					$savePath = $img->down_load($path, "vod");
					$contents1 = str_ireplace($path, $savePath, $actor_content);
					return $contents1;
				}
				else {
					return $_POST["actor_content"];
				}
			}
			else {
				return $actor_content;
			}
		}
		else {
			return $_POST["actor_content"];
		}
	}
}


