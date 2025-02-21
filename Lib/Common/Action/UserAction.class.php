<?php
namespace Common\Action;
use Common\Action\AllAction;
class UserAction extends AllAction
{
	public $memberinfo;

	public function _initialize()
	{
		if (substr(ACTION_NAME, 0, 7) != "public_") {
			self::check_member();
		}
	}

	public function getSystemAuthKey()
	{
		$member_setting = F("_user/setting");
		$auth_key = "336198ssss943331";

		if ($member_setting["auth_key"]) {
			$auth_key = $member_setting["auth_key"];
		}

		return $auth_key;
	}

	final public function check_member()
	{
		if ((MODULE_NAME == "User") && (CONTROLLER_NAME == "Center") && in_array(ACTION_NAME, array("login", "logout", "resetpwd", "reg", "show","agreement","resetpasswdstep1","resetpasswdstep"))) {
			return true;
		}
		else {
			$cms_auth = $_COOKIE["auth"];

			if ($cms_auth) {
				$cms_auth_key = md5($this->getSystemAuthKey());
				list($userid, $password) = explode("\t", sys_auth($cms_auth, "DECODE", $cms_auth_key));
				$rs = M("User");
			
				$where["uid"] = array("eq",$userid);
		
				$list=$rs->where($where)->field('random,password',true)->find();
				if(!$list['uid']){
				cookie("auth", null);
				cookie("_userid", null);
				cookie("_username", null);
				cookie("_groupid", null);
				cookie("_nickname", null);
				redirect("" . UUU("User-Center/login", "", true, false) . "");
					
				}
				
				$list['avatar_img']=$list['avatar_img']?gxl_img_url($list['avatar_img'],$list['avatar_img']):'/Public/user/'.C('default_user').'/img/user.png';
				$list['action_name']=ACTION_NAME;
				$list['mail']=$list['email'];
				
				$groupid = cookie("_groupid");
				$this->assign($list);
			
			
			}
			else {
				cookie("auth", null);
				cookie("_userid", null);
				cookie("_username", null);
				cookie("_groupid", null);
				cookie("_nickname", null);
				redirect("" . UUU("User-Center/login", "", true, false) . "");
			}
		}
	}

	public function getq($q)
	{
		$auth_key = "51bacc1b8e8d6dad549a43b4f0deef13";
		return $auth_key;
	}

	public function Lable_Style()
	{
		$array = array();
		$array["model"] = strtolower(CONTROLLER_NAME);
		$array["action"] = strtolower(ACTION_NAME);
		C("TOKEN_ON", false);
		$array["root"] = __ROOT__ . "/";
		$array["tpl"] = $array["root"] . str_replace("./", "", C("VIEW_PATH") . C("default_theme")) . "/";
		$array["css"] = "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $array["tpl"] . "style.css\">\n";
		$array["sitename"] = C("site_name");
		$array["siteurl"] = C("site_url");
		$array["sitepath"] = C("site_path");
		$array["playwidth"] = C("play_width");
		$array["playheight"] = C("play_height");
		$array["sitehot"] = gxl_hot_key(C("site_hot"));
		$array["keywords"] = C("site_keywords");
		$array["description"] = C("site_description");
		$array["email"] = C("site_email");
		$array["copyright"] = C("site_copyright");
		$array["tongji"] = C("site_tongji");
		$array["murl"] = rtrim(C("m_url"), "/");
		$array["icp"] = C("site_icp");
		$array["hotkey"] = gxl_hot_key(C("site_hot"));
		$array["url_tag"] = UU("Home-tag/show");
		$array["url_guestbook"] = UU("Home-gb/show");
		$array["url_special"] = gxl_special_url(1);
		$array["url_map_rss"] = gxl_map_url("rss");
		$array["url_map_baidu"] = gxl_map_url("baidu");
		$array["url_map_google"] = gxl_map_url("google");
		$array["url_map_soso"] = gxl_map_url("soso");
		$array["list_slide"] = F("_gxlnews/slide");
		$array["list_link"] = F("_gxlnews/link");
		$array["list_menu"] = F("_gxlnews/listtree");
		$array["movhot"] = F("_vod/movhot");
		$array["tvhot"] = F("_vod/tvhot");
		$array["movup"] = F("_vod/movup");
		$array["tvup"] = F("_vod/tvup");
		$array["url_gbshow"] = UU("User-gb/show", "", true, false);
		$array["s_area"] = explode(",", C("play_area"));
		$array["s_language"] = explode(",", C("play_language"));
		$array["s_year"] = explode(",", C("play_year"));
		$array["s_picm"] = array("1", "2");
		$array["s_letter"] = range(A, Z);
		$array["s_order"] = array("addtime", "hits", "gold");
		$mbid = explode(",", C("site_mbid"));
	
		$array["mobile_status"] = C("mobile_status");
		return $array;
	}
}
?>