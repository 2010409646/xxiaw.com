<?php
namespace Admin\Action;
use Common\Action\BaseAction;
class DownAction extends BaseAction
{
	public function show()
	{
		$admin = array();
		$admin["cid"] = $_REQUEST["cid"];
		$admin["status"] = intval($_REQUEST["status"]);
		$admin["stars"] = intval($_REQUEST["stars"]);
		$admin["type"] = (!empty($_GET["type"]) ? $_GET["type"] : C("admin_order_type"));
		$admin["order"] = (!empty($_GET["order"]) ? $_GET["order"] : "desc");
		$admin["orders"] = "down_" . $admin["type"] . " " . $admin["order"];
		$admin["wd"] = urldecode(trim($_REQUEST["wd"]));
		$admin["tag"] = urldecode(trim($_REQUEST["tag"]));
		$admin["tid"] = $_REQUEST["tid"];
		$admin["nid"] = $_REQUEST["nid"];
		$admin["did"] = $_REQUEST["did"];
		$admin["vid"] = $_REQUEST["vid"];
		$admin["p"] = "";
		$limit = C("url_num_admin");
		$order = "down_" . $admin["type"] . " " . $admin["order"];

		if ($admin["cid"]) {
			$where["down_cid"] = getlistsqlin($admin["cid"]);
		}
        if ($_REQUEST["pic"]) {
			$where["down_pic"]='';
		}           
		if ($admin["status"] == 2) {
			$where["down_status"] = array("neq",1);
		}
		else  {
			$where["down_status"] = array("eq", 1);
		}
       
		if ($admin["stars"]) {
			$where["down_stars"] = $admin["stars"];
		}

		if ($admin["wd"]) {
			$where["down_name"] = array("like", "%" . $admin["wd"] . "%");
			$admin["wd"] = urlencode($admin["wd"]);
		}

		if ($admin["tag"]) {
			$where["tag_sid"] = 7;
			$where["tag_name"] =urldecode($admin["tag"]);
			$rs = D("TagdownView");
			$admin["tag"] = urlencode($_REQUEST["tag"]);
			
		}
		else {
			$rs = D("Down");
			//$where["down_status"] = array("eq", 1);
			
		}
       $count = $rs->where($where)->count();
	
	    if ($_REQUEST["pic"]) {
			$list = $rs->where($where)->getField('down_reurl',true);
			foreach($list as $v){
			    
			    if(strstr($v,'51xiazai')){
			    echo $v.'<br>';
			    }
			}
		    echo json_encode($list);
		//	dump($list);
			exit;
		} 
	    
		$totalpages = ceil($count / $limit);
		$currentpage = (!empty($_GET["p"]) ? intval($_GET["p"]) : 1);
		
		$currentpage = get_maxpage($currentpage, $totalpages);
		
		$pageurl = U("Admin-Down/Show", $admin, false, false) . "-p-{!page!}" . C("url_html_suffix");
		$admin["p"] = $currentpage;
		$_SESSION["down_jumpurl"] = U("Admin-Down/Show", $admin) . C("url_html_suffix");
		$pages = "共" . $count . "个软件&nbsp;当前:" . $currentpage . "/" . $totalpages . "页&nbsp;" . getpage($currentpage, $totalpages, 8, $pageurl, "pagego('" . $pageurl . "'," . $totalpages . ")");
		$admin["pages"] = $pages;
		$list = $rs->where($where)->order($order)->limit($limit)->page($currentpage)->select();
      
		foreach ($list as $key => $val ) {
			$list[$key]["list_url"] = "?s=Admin-Down-Show-cid-" . $list[$key]["down_cid"];
			$list[$key]["down_url"] = gxl_data_url("down", $list[$key]["down_id"], $list[$key]["down_cid"], $list[$key]["down_name"], 1, $list[$key]["down_jumpurl"]);
			$list[$key]["down_starsarr"] = admin_star_arr($list[$key]["down_stars"]);
		}
		$this->assign($admin);
		$this->assign("list", $list);
		$this->assign("list_down", F("_gxlnews/listdown"));

		if ($admin["tid"]) {
			$this->display("./Public/system/special_down.html");
		}
		else if ($admin["did"]) {
			$this->display("./Public/system/star_down.html");
		}
		
		else {
			$this->display("./Public/system/down_show.html");
		}
	}

	public function add()
	{
		$rs = D("Down");
		$down_id = intval($_GET["id"]);

		if (0 < $down_id) {
			$where["down_id"] = $down_id;
			$array = $rs->where($where)->relation("Tag")->find();
			$array['down_content'] = M('downAll')->where($where)->getField('down_content');
			$array['down_picall'] = M('downAll')->where($where)->getField('down_picall');
			$array["down_tplname"] = "编辑";

			foreach ($array["Tag"] as $key => $value ) {
				$tag[$key] = $value["tag_name"];
			}

			$array["down_starsarr"] = admin_star_arr($array["down_stars"]);

			if (C("admin_time_edit")) {
				$array["checktime"] = "checked";
			}

			$array["down_content"] = gxl_down_img_array($array["down_content"]);
			$array["down_picall"] = gxl_down_img_array($array["down_picall"]);
			$_SESSION["vod_jumpurl"] = $_SERVER["HTTP_REFERER"];
			unset($where);
		}
		else {
			$array["down_cid"] = cookie("down_cid");
			$array["down_stars"] = 0;
			$array["down_del"] = 0;
			$array["down_hits"] = 0;
			$array["down_inputer"] = $_SESSION["admin_name"];
			$array["down_addtime"] = time();
			$array["down_starsarr"] = admin_star_arr(1);
			$array["checktime"] = "checked";
			$array["down_tplname"] = "添加";
			$array["countvod"] = 0;
			$array["countstar"] = 0;
		}

		$this->assign($array);
		$this->assign("list_down",F('_gxlnews/listdown'));
		$this->display("./Public/system/down_add.html");
	}

	public function _before_insert()
	{
		if (empty($_POST["down_keywords"]) && C("rand_tag")) {
			$_POST["down_keywords"] = gxl_tag_auto($_POST["down_name"], $_POST["down_content"]);
		}
	}

	public function insert()
	{
		$rs = D("Down");
		$downrel = D("Downrel");
    	$img = D('Img');
        if(!empty($_POST["down_content"])) {
			$down_content = gxl_news_img_array($_POST["down_content"], 1);
		
			if ((C("upload_http") && !empty($down_content)) || (C("upload_http_news") && !empty($down_content))) {
			
	
				if (!!$path = getarraypic($down_content)) {
					$savePath = $img->down_load($path,"down");
				
				
					foreach($savePath as $k=>$v){
						
						if(!$savePath[$k]){
							$savePath[$k]='/Public/code/img/iconds.jpg';
							
						}
						
					}
					
					$edit['down_content']= str_ireplace($path, $savePath, $down_content);
				
			
				}
			else {
					$edit['down_content']=$_POST["down_content"];;
				}
			}
			else {
				$edit['down_content']=$_POST["down_content"];;
			}
		}
		else {
			$edit['down_content']=$_POST["down_content"];
		}
		if(!empty($_POST["down_picall"])) {
			$down_picall = gxl_news_img_array($_POST["down_picall"], 1);
		
			if ((C("upload_http") && !empty($down_picall)) || (C("upload_http_news") && !empty($down_picall))) {
			
	
				if (!!$path = getarraypic($down_picall)) {
					$savePath = $img->down_load($path,"down");
				
				
					foreach($savePath as $k=>$v){
						
						if(!$savePath[$k]){
							$savePath[$k]='/Public/code/img/iconds.jpg';
							
						}
						
					}
					
					$edit['down_picall']= str_ireplace($path, $savePath, $down_picall);
				
			
				}
			else {
					$edit['down_picall']=$_POST["down_picall"];;
				}
			}
			else {
				$edit['down_picall']=$_POST["down_picall"];;
			}
		}
		else {
			$edit['down_picall']=$_POST["down_picall"];
		}
		if ($rs->create()) {
			$id = $rs->add();
             $downall['down_content']= $edit['down_content'];
             $downall['down_picall']= $edit['down_picall'];
             $downall['down_name']=$_POST['down_name'];
             $downall['down_id']= $id;
           M('DownAll')->data($downall)->add();
        if(empty($_POST['down_remark'])){
		    	$down_remark = msubstr(trim($_POST['down_content']),0,100,'utf-8',false);;
	    }
       
		$search['search_name']=$_POST['down_name'];
		$search['search_type']=2;
		$search['search_dec']=$down_remark;
		$search['search_pic']=$_POST['down_pic'];
		$search['search_tid']=$id;
		M('search')->add($search);
			if (false !== $id) {
				if ($_POST["down_vod"]) {
					$downrel->downrel_update($id, $_POST["down_vod"], 1);
				}

				if ($_POST["down_star"]) {
					$downrel->downrel_update($id, $_POST["down_star"], 2);
				}

				$this->assign("jumpUrl", "?s=Admin-Down-Add");
			}
		}
		else {
			$this->error($rs->getError());
		}
	}

	public function _after_insert()
	{
		cookie("down_cid", intval($_POST["down_cid"]));

		if (C("baidu_tui")) {
			$downurl = gxl_data_url("down", $id, $_POST["down_cid"], $_POST["down_name"], 1, $_POST["down_jumpurl"]);
			$baidutui = baidutu($downurl);
		}

		$this->success("软件添加成功" . $baidutui . "继续添加新软件！");
	}

	public function update()
	{
		$this->_before_insert();
		$tag = D("Tag");
		$rs = D("Down");
		$img = D('Img');
		$downrel = D("Downrel");
        if(!empty($_POST["down_content"])) {
			$down_content = gxl_news_img_array($_POST["down_content"], 1);
		
			if ((C("upload_http") && !empty($down_content)) || (C("upload_http_news") && !empty($down_content))) {
			
	
				if (!!$path = getarraypic($down_content)) {
					$savePath = $img->down_load($path,"down");
				
				
					foreach($savePath as $k=>$v){
						
						if(!$savePath[$k]){
							$savePath[$k]='/Public/code/img/iconds.jpg';
							
						}
						
					}
					
					$edit['down_content']= str_ireplace($path, $savePath, $down_content);
				
			
				}
				else {
					$edit['down_content']=$_POST["down_content"];;
				}
			}
			else {
				$edit['down_content']=$_POST["down_content"];;
			}
		}
		else {
			$edit['down_content']=$_POST["down_content"];
		}
	     if(!empty($_POST["down_picall"])) {
			$down_picall = gxl_news_img_array($_POST["down_picall"], 1);
		
			if ((C("upload_http") && !empty($down_picall)) || (C("upload_http_news") && !empty($down_picall))) {
			
	
				if (!!$path = getarraypic($down_picall)) {
					$savePath = $img->down_load($path,"down");
				
				
					foreach($savePath as $k=>$v){
						
						if(!$savePath[$k]){
							$savePath[$k]='/Public/code/img/iconds.jpg';
							
						}
						
					}
					
					$edit['down_picall']= str_ireplace($path, $savePath, $down_picall);
				
			
				}
				else {
					$edit['down_picall']=$_POST["down_picall"];;
				}
			}
			else {
				$edit['down_picall']=$_POST["down_picall"];;
			}
		}
		else {
			$edit['down_picall']=$_POST["down_picall"];
		}
		if ($rs->create()) {
			if (false !== $rs->save()) {
				if ($_POST["down_keywords"]) {
					$tag->tag_update($_POST["down_id"], $_POST["down_keywords"], 2);
				}
	         $downall['down_content']= $edit['down_content'];
	         $downall['down_picall']= $edit['down_picall'];
             $downall['down_name']=$_POST['down_name'];
            
             M('DownAll')->where(array('down_id'=>$_POST['down_id']))->data($downall)->save();
         if(empty($_POST['down_remark'])){
		    	$down_remark = msubstr(trim($_POST['down_content']),0,100,'utf-8',false);;
	    }
        $search['search_status']=$_POST['down_status'];
		$search['search_name']=$_POST['down_name'];
		$search['search_type']=2;
		$search['search_dec']=$down_remark;
		$search['search_pic']=$_POST['down_pic'];
		$search['search_tid']=$_POST['down_id'];
		M('search')->where(array('search_tid'=>$_POST['down_id'],'search_type'=>2))->data($search)->save();
				if (C("baidu_tui")) {
			$downurl = gxl_data_url("down", $_POST['down_id'], $_POST["down_cid"], $_POST["down_name"], 1, $_POST["down_jumpurl"]);
			$baidutui = baidutu($downurl);
			
		}

				$rs->$down_id = $_POST["down_id"];
			}
			else {
				$this->error("修改软件信息失败！");
			}
		}
		else {
			$this->error($rs->getError());
		}
	}

	public function _after_update()
	{
		$rs = D("Down");
		$down_id = $rs->$down_id;

		if ($down_id) {
			$this->_after_add_update($down_id);
			$this->assign("jumpUrl", $_SESSION["down_jumpurl"]);
			if (C("baidu_tui") && ($_POST["insertseo"] == 5)) {
				$downurl = gxl_data_url("down", $down_id, $_POST["down_cid"], $_POST["down_name"], 1, $_POST["down_jumpurl"]);
				$baidutui = baidutu($downurl);
			}

			$this->success("修改软件信息成功" . $baidutui . "！");
		}
		else {
			$this->error("修改软件信息失败！");
		}
	}

	public function _after_add_update($down_id)
	{
		if (C("data_cache_down")) {
			S("data_cache_down_" . $down_id, NULL);
		}

		if (C("html_cache_on")) {
			@unlink(HTML_PATH . "index" . C("html_file_suffix"));
			$list_url = md5(getlistname($_POST["down_cid"], "list_url"));
			$big_url = md5(getlistname($_POST["down_cid"], "list_url_big"));
			$down_url = md5(gxl_data_url("down", $down_id, $_POST["down_cid"], $_POST["down_name"], 1, $_POST["down_jumpurl"]));
			@unlink(HTML_PATH . "/Vod_show/" . $list_url . C("html_file_suffix"));
			@unlink(HTML_PATH . "/Vod_show/" . $big_url . C("html_file_suffix"));
			@unlink(HTML_PATH . "/Down_read/" . $down_url . C("html_file_suffix"));
		}

		if (C("url_html")) {
			echo "<iframe scrolling=\"no\" src=\"?s=Admin-Create-downid-id-" . $down_id . "\" frameborder=\"0\" style=\"display:none\"></iframe>";
		}
	}

	public function ajax()
	{
		$data = array();
		$where = array();
		$did = intval($_GET["did"]);
		$nid = intval($_GET["nid"]);
		$sid = (!empty($_GET["sid"]) ? $_GET["sid"] : 1);
		$type = trim($_GET["type"]);
		$lastdid = intval($_GET["lastdid"]);

		if ($sid == 1) {
			$name = get_id_vod_name($did);
		}

		if ($sid == 2) {
			$name = get_name_star_id($did);
		}

		if ($did && $nid) {
			$rs = D("Downrel");

			if ($type == "add") {
				$rsid = $rs->where("downrel_sid = " . $sid . " and downrel_did = " . $did . " and downrel_nid = " . $nid)->getField("downrel_did");

				if (!$rsid) {
					$count = $rs->where("downrel_sid = " . $sid . " and downrel_nid = " . $nid)->max("downrel_oid");
					$data["downrel_did"] = $did;
					$data["downrel_nid"] = $nid;
					$data["downrel_name"] = $name;
					$data["downrel_sid"] = $sid;
					$data["downrel_oid"] = $count + 1;
					$rs->data($data)->add();
				}
			}
			else if ($type == "del") {
				$where["downrel_did"] = $did;
				$where["downrel_nid"] = $nid;
				$where["downrel_sid"] = $sid;
				$rs->where($where)->delete();
			}
			else if ($type == "up") {
				$where["downrel_did"] = $did;
				$where["downrel_nid"] = $nid;
				$where["downrel_sid"] = $sid;
				$rs->where($where)->setInc("downrel_oid");
				$where["downrel_did"] = $lastdid;
				$rs->where($where)->setDec("downrel_oid");
			}
			else if ($type == "down") {
				$where["downrel_did"] = $did;
				$where["downrel_nid"] = $nid;
				$where["downrel_sid"] = $sid;
				$rs->where($where)->setDec("downrel_oid");
				$where["downrel_did"] = $lastdid;
				$rs->where($where)->setInc("downrel_oid");
			}
		}

		if ($nid && ($sid == 1)) {
			$this->showvod($did, $nid);
		}
		else {
			if ($nid && ($sid == 2)) {
				$this->showstar($did, $nid);
			}
			else {
				echo "请先添加软件！";
			}
		}
	}

	public function showvod($did, $nid)
	{
		$where = array();
		$where["downrel_sid"] = 1;
		$where["downrel_nid"] = $nid;
		$rs = D("Downrel");
		$maxoid = $rs->where($where)->max("downrel_oid");
		$minoid = $rs->where($where)->min("downrel_oid");
		$rs = D("DownvodView");
		$list = $rs->field("vod_id,vod_name,vod_actor,downrel_oid")->where($where)->order("downrel_oid desc,downrel_did desc")->select();

		if (!$list) {
			echo "该软件暂未收录任何视频数据！";
		}
		else {
			$this->assign("max_oid", $maxoid);
			$this->assign("min_oid", $minoid);
			$this->assign("list_vod", $list);
			$this->assign("count", count($list));
			$this->display("./Public/system/down_vod_ids.html");
		}
	}

	public function showstar($did, $nid)
	{
		$where = array();
		$where["downrel_sid"] = 2;
		$where["downrel_nid"] = $nid;
		$rs = D("Downrel");
		$maxoid = $rs->where($where)->max("downrel_oid");
		$minoid = $rs->where($where)->min("downrel_oid");
		$rs = D("DownstarView");
		$list = $rs->field("star_id,star_name,star_pyname,downrel_oid")->where($where)->order("downrel_oid desc,downrel_did desc")->select();

		if (!$list) {
			echo "该软件暂未收录任何明星数据！";
		}
		else {
			$this->assign("max_oid", $maxoid);
			$this->assign("min_oid", $minoid);
			$this->assign("list_star", $list);
			$this->assign("count", count($list));
			$this->display("./Public/system/down_star_ids.html");
		}
	}

	public function ajaxstars()
	{
		$where["down_id"] = $_GET["id"];
		$data["down_stars"] = intval($_GET["stars"]);
		$rs = D("Down");
		$rs->where($where)->save($data);
		
		exit("ok");
	}

	public function status()
	{
		$where["down_id"] = $_GET["id"];
		$rs = D("Down");

		if ($_GET["value"]) {
			$rs->where($where)->setField("down_status", 1);
			$search["search_status"] = 1;
		}
		else {
			$rs->where($where)->setField("down_status", 0);
				$search["search_status"] = 0;
		}
        
		M('search')->where(array('search_tid'=>$_GET["id"],'search_type'=>2))->data($search)->save();	 
		redirect($_SESSION["down_jumpurl"]);
	}

	public function del()
	{
		$this->delfile($_GET["id"]);
		redirect($_SESSION["down_jumpurl"]);
	}

	public function delall()
	{
		if (empty($_POST["ids"])) {
			$this->error("请选择需要删除的软件！");
		}

		$array = $_POST["ids"];

		foreach ($array as $val ) {
			$this->delfile($val);
		}

		redirect($_SESSION["down_jumpurl"]);
	}

	public function delfile($id)
	{
		$rs = D("Topic");
		$where["topic_sid"] = 1;
		$where["topic_did"] = $id;
		$rs->where($where)->delete();
		unset($where);
		
		$rs->where($where)->delete();
		$rs = D("Tag");
		$where["tag_id"] = $id;
		$where["tag_sid"] = 2;
		$rs->where($where)->delete();
		unset($where);
		$rs = D("Downrel");
		$where["downrel_nid"] = $id;
		$rs->where($where)->delete();
		unset($where);
		$rs = D("Down");
		$where["down_id"] = $id;
		$array = $rs->field("down_id,down_cid,down_pic,down_name")->where($where)->find();
		$arr = M('down_all')->where($where)->find();
		$down_content =  getarraypic(gxl_news_img_array($arr["down_content"], 1));
		if(count($down_content)){
		    
		    foreach($down_content as $k=>$v){
		        
		       	@unlink($v); 
		    }
		}
	
		@unlink(gxl_img_url($array["down_pic"]));

		if (0 < C("url_html")) {
			@unlink(gxl_data_url("down", $array["down_id"], $array["down_cid"], $array["down_name"], 1));
		}

		unset($where);
		$where["down_id"] = $id;
		$rs = D("Down");
		$rs->where($where)->delete();
		M('DownAll')->where($where)->delete();
		M('search')->where(array('search_tid'=>$id,'search_type'=>1))->delete();
		unset($where);
	}

	public function pestcid()
	{
		if (empty($_POST["ids"])) {
			$this->error("请选择需要转移的软件！");
		}

		$cid = intval($_POST["pestcid"]);

		if (getlistson($cid)) {
			$rs = D("Down");
			$data["down_cid"] = $cid;
			$where["down_id"] = array("in", $_POST["ids"]);
			$rs->where($where)->save($data);
			redirect($_SESSION["down_jumpurl"]);
		}
		else {
			$this->error("请选择当前大类下面的子分类！");
		}
	}

	public function create()
	{
		echo "<iframe scrolling=\"no\" src=\"?s=Admin-Create-downid-id-" . implode(",", $_POST["ids"]) . "\" frameborder=\"0\" style=\"display:none\"></iframe>";
		$this->assign("jumpUrl", $_SESSION["down_jumpurl"]);
		$this->success("批量生成软件成功！");
	}
}


