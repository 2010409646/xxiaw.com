<?php
namespace Common\Action;
use Think\Action;
class AllAction extends Action
{
	public function _initialize()
	{
		header("Content-Type:text/html; charset=utf-8");
	}
	
	public function formate_download($ftps)
	{
		$array = explode("\r\n", $ftps);

		foreach ($array as $val ) {
			$result[] = explode("\$", $val);
		}

		foreach ($result as $val ) {
			$res["ftp_name"] = $val[0];
			$res["ftp_url"] = $val[1];
			$arr_download[] = $res;
		}

		return $arr_download;
	}
		public function Lable_Down_List($param, $array_list)
	{
	
		$array_list["sid"] =1;
		$array_list["list_wd"] = isset($param["wd"])?$param["wd"]:'';
		$array_list["list_page"] = isset($param["page"])?$param["page"]:'';
		$array_list["list_letter"] = isset($param["letter"])?$param["letter"]:'';
		$array_list["list_order"] = isset($param["order"])?$param["order"]:'';
		$array_list["list_picurl"] = isset($array_list["list_pic"])?gxl_img_url($array_list["list_pic"],1):'';
		if (isset($param["page"])) {
			$array_list["title"] = $array_list["list_name"] . "-第" . $param["page"] . "页";
		}
		else {
			$array_list["title"] = $array_list["list_name"];
		}

		$array_list["title"] = $array_list["title"] . "-" . C("site_name");
		
		if (empty($array_list["list_skin"])) {
			$array_list["list_skin"] = "gxl_downlist";
		}
		
		return $array_list;
	}
	public function Lable_Down_Read($array, $array_play = false)
	{
		$array_list = list_search(F("_gxlnews/list"), "list_id=" . $array["down_cid"]);
		$rs = M("Down");
		$array["sid"] = 12;
		$array["down_namem"] = msubstr($array["down_name"],0,5);
		$array["title"] = $array["down_name"] . "-" . C("site_name");
		$array["down_readurl"] = gxl_data_url("down", $array["down_id"], $array["down_cid"], $array["down_name"], 1, $array["down_jumpurl"]);
		$array["xia_url"] = gxl_data_down_url("down", $array["down_id"], $array["down_cid"], $array["down_name"], 1, $array["down_jumpurl"]);
		$array["down_picurl"] = gxl_img_url($array["down_pic"], $array["down_content"]);
		$array["down_iconurl"] = gxl_img_url($array["down_icon"], $array["down_content"]);
		$array["down_hits_insert"] = gxl_get_hits("down", "insert", $array);
		$array["down_hits_month"] = gxl_get_hits("down", "down_hits_month", $array);
		$array["down_hits_week"] = gxl_get_hits("down", "down_hits_week", $array);
		$array["down_hits_day"] = gxl_get_hits("down", "down_hits_day", $array);
		if($array["down_down2"]){
		$array["down_baidu"] =explode('&&',$array["down_down2"])[0];
		$array["down_code"] =str_replace('#', '',explode('&&',$array["down_down2"])[1]);
		}
		if($array["down_down3"]){
		$array["down_baidu1"] =explode('&&',$array["down_down3"])[0];
		$array["down_code1"] =str_replace('#', '',explode('&&',$array["down_down3"])[1]);
		}
		if($array["down_cid"]==170){
		    $typedown='url';
		}else{
		     $typedown='down';
		}
		$array["down_content"] =tagContent(gxl_down_img_array($array["down_content"], 2,$array["down_name"]),$array['down_keywords'],$typedown,$array["down_cid"]);
	    $array["down_picall"] =tagContent(gxl_down_img_array($array["down_picall"], 2,$array["down_name"]),$array['down_keywords'],$typedown,$array["down_cid"]);
		if ($array["down_skin"]) {
			$array["down_skin_detail"] =trim($array["down_skin"]);
		}elseif($array_list[0]['list_skin_detail'] != "pp_down"){
			$array["down_skin_detail"] =trim($array_list[0]['list_skin_detail']);
		}else {
			$array["down_skin_detail"] = ($array["list_skin_detail"] ? "" . $array_list["list_skin_detail"] : "pp_down");
		
		}
		if($array['down_down1']){
          $array['down_down1']=downnginx($array['down_down1']);
		}
       if($array['down_down4']){
          $array['down_down4']=downnginx($array['down_down4']);
		}
		if($array['down_down5']){
		 $array['down_down5']=downnginx($array['down_down5']);
		}
	
		$array["down_is_null"]=($array["down_down1"].$array["down_down2"].$array["down_down3"].$array["down_down4"].$array["down_down5"].$array["down_down6"])?1:0;
	
		$arrays["show"] = $array_list[0];
		$arrays["read"] = $array;
		
		
		return $arrays;
	}
	public function Lable_News_List($param, $array_list)
	{
		$array_list["sid"] =2;
		$array_list["list_wd"] = $param["wd"];
		$array_list["list_page"] = $param["page"];
		$array_list["list_letter"] = $param["letter"];
		$array_list["list_order"] = $param["order"];
		$array_list["thisurl"] = str_replace("{!page!}", $param["page"], gxl_list_url("news", array("id" => $array_list["list_id"], "listdir" => $array_list["list_dir"]), $param["page"]));

		if (1 < $param["page"]) {
			$array_list["title"] = $array_list["list_name"] . "-第" . $param["page"] . "页";
		}
		else {
			$array_list["title"] = $array_list["list_name"];
		}

		$array_list["title"] = $array_list["title"] . "-" . C("site_name");
		
		if (empty($array_list["list_skin"])) {
			$array_list["list_skin"] = "gxl_newslist";
		}

		return $array_list;
	}
	public function Lable_Icp_List($param, $array_list)
	{
		$array_list["sid"] =4;
		$array_list["list_wd"] = $param["wd"];
		$array_list["list_page"] = $param["page"];
		$array_list["list_letter"] = $param["letter"];
		$array_list["list_order"] = $param["order"];
		$array_list["thisurl"] = str_replace("{!page!}", $param["page"], gxl_list_url("news", array("id" => $array_list["list_id"], "listdir" => $array_list["list_dir"]), $param["page"]));
		
		if (1 < $param["page"]) {
			$array_list["title"] = $array_list["list_name"] . "-第" . $param["page"] . "页";
		}
		else {
			$array_list["title"] = $array_list["list_name"];
		}

		$array_list["title"] = $array_list["title"] . "-" . C("site_name");
		
		if (empty($array_list["list_skin"])) {
			$array_list["list_skin"] = "gxl_linkslist";
		}

		return $array_list;
	}
	public function Lable_Icp_Read($array, $array_play = false)
	{
		$array_list = list_search(F("_gxlnews/list"), "list_id=" . $array["icp_cid"]);


		if (!$array) {
			return false;
		}

        $array['icp_readurl']=gxl_icp_url($array["icp_id"]);

		$array["icp_skin_detail"] ='gxl_icp';


		
		$arrays["show"] = $array_list[0];
		$arrays["read"] = $array;
		return $arrays;
	}
	public function Lable_Links_List($param, $array_list)
	{
		$array_list["sid"] =4;
		$array_list["list_wd"] = $param["wd"];
		$array_list["list_page"] = $param["page"];
		$array_list["list_letter"] = $param["letter"];
		$array_list["list_order"] = $param["order"];
		$array_list["thisurl"] = str_replace("{!page!}", $param["page"], gxl_list_url("news", array("id" => $array_list["list_id"], "listdir" => $array_list["list_dir"]), $param["page"]));
		
		if (1 < $param["page"]) {
			$array_list["title"] = $array_list["list_name"] . "-第" . $param["page"] . "页";
		}
		else {
			$array_list["title"] = $array_list["list_name"];
		}

		$array_list["title"] = $array_list["title"] . "-" . C("site_name");
		
		if (empty($array_list["list_skin"])) {
			$array_list["list_skin"] = "gxl_linkslist";
		}

		return $array_list;
	}
		public function Lable_Doc_List($param, $array_list)
	{
		$array_list["sid"] =5;
		$array_list["list_wd"] = $param["wd"];
		$array_list["list_page"] = $param["page"];
		$array_list["list_letter"] = $param["letter"];
		$array_list["list_order"] = $param["order"];
		$array_list["thisurl"] = str_replace("{!page!}", $param["page"], gxl_list_url("doc", array("id" => $array_list["list_id"], "listdir" => $array_list["list_dir"]), $param["page"]));
		
		if (1 < $param["page"]) {
			$array_list["title"] = $array_list["list_name"] . "-第" . $param["page"] . "页";
		}
		else {
			$array_list["title"] = $array_list["list_name"];
		}

		$array_list["title"] = $array_list["title"] . "-" . C("site_name");
		
		if (empty($array_list["list_skin"])) {
			$array_list["list_skin"] = "gxl_doclist";
		}

		return $array_list;
	}
	public function Lable_News_Read($array, $array_play = false)
	{
		$array_list = list_search(F("_gxlnews/list"), "list_id=" . $array["news_cid"]);
		$rs = M("News");
		$count = $rs->field("news_id")->count("news_id");

		if (!$count) {
			return false;
		}

		$array["sid"] = 12;
		$array["title"] = $array["news_name"] . "-" . C("site_name");
		$array["news_readurl"] = gxl_data_url("news", $array["news_id"], $array["news_cid"], $array["news_name"], 1, $array["news_jumpurl"]);
		$array["thisurl"] = gxl_data_url("news", $array["news_id"], $array["news_cid"], $array["news_name"], 1, $array["news_jumpurl"]);
		$array["news_picurl"] = gxl_img_url($array["news_pic"], $array["news_content"]);
		$array["news_picurl_small"] = gxl_img_url_small($array["news_pic"], $array["news_content"]);
		$array["news_hits_insert"] = gxl_get_hits("news", "insert", $array);
		$array["news_hits_month"] = gxl_get_hits("news", "news_hits_month", $array);
		$array["news_hits_week"] = gxl_get_hits("news", "news_hits_week", $array);
		$array["news_hits_day"] = gxl_get_hits("news", "news_hits_day", $array);
		$array["news_content"] =tagContent(custom_htmlspecialchars(gxl_news_img_array($array["news_content"], 2,$array["news_name"])),$array['news_keywords'],'news',$array["news_cid"]);
		$array["news_name"] =  htmlentities($array["news_name"]);
		$array["news_remark"] =$array["news_remark"]?htmlentities($array["news_remark"]):'';
		$contimg = C("news_images");
        $rss = D('TopicdownView');
        $wheres['topic_sid'] = 3;
		$wheres['topic_tid'] = $array["news_id"];
		$array["news_topic"] = $rss->field('down_id,down_name,down_pic,down_size,down_remark,down_jumpurl,topic_oid')->where($wheres)->order('topic_oid desc,topic_did desc')->select();
		if($array["news_topic"]){
		    foreach ($array["news_topic"] as $k=>$v){
		        $array["news_topic"][$k]['down_picurl']= gxl_img_url($v["down_pic"]);
		         $array["news_topic"][$k]['down_readurl']=  gxl_data_url("down", $v["down_id"], $v["down_cid"], $v["down_name"], 1, $v["down_jumpurl"]);
		    }
		}
	
		if (!empty($contimg)) {
			$array["news_imgarry"] = gxl_img_url_array($array["news_content"]);
			$array["news_imgcount"] = count($array["news_imgarry"]);

			if ($contimg < $array["news_imgcount"]) {
				$array["news_content"] = gxl_news_imgs_array($array["news_content"]);
			}
		}

		if ($array["news_id"] != $count) {
			$array["news_next"] = gxl_data_url("news", $array["news_id"] + 1, $array["news_cid"], $array["news_name"], 1, $array["news_jumpurl"]);
			$next = getnews($array["news_id"] + 1);
			$array["news_next_name"] =  $next["news_name"];
			$array["news_next_picurl"] = gxl_img_url($next["news_pic"]);
			$array["news_next_small"] = gxl_img_url_small($next["news_pic"]);
			//print_r();die();
			//$array["news_next_picurl"] = gxl_img_url(return getnews($array["news_id"] + 1)["news_pic"]);
			//$array["news_next_small"] = gxl_img_url_small(return getnews($array["news_id"] + 1)["news_pic"]);
		}
		if ($array["news_id"] != 1) {
			$array["news_prev"] = gxl_data_url("news", $array["news_id"] - 1, $array["news_cid"], $array["news_name"], 1, $array["news_jumpurl"]);
			$prev = getnews($array["news_id"] - 1);
			$array["news_prev_name"] =  $prev["news_name"];
			$array["news_prev_picurl"] = gxl_img_url($prev["news_pic"]);
			$array["news_prev_small"] = gxl_img_url_small($prev["news_pic"]);
			//$array["news_prev_picurl"] = gxl_img_url(getnews($array["news_id"] - 1)["news_pic"]);
			//$array["news_prev_small"] = gxl_img_url_small(getnews($array["news_id"] - 1)["news_pic"]);
		}

		if ($array["news_skin"]) {
			$array["news_skin_detail"] =trim($array["news_skin"]);
		}elseif($array_list[0]['list_skin_detail'] != "pp_news"){
			$array["news_skin_detail"] =trim($array_list[0]['list_skin_detail']);
		}else {
			$array["news_skin_detail"] = ($array["list_skin_detail"] ? "" . $array_list["list_skin_detail"] : "pp_news");
		
		}


		
		$arrays["show"] = $array_list[0];
		$arrays["read"] = $array;
		return $arrays;
	}
	public function Lable_Doc_Read($array, $array_play = false)
	{
		$array_list = list_search(F("_gxlnews/list"), "list_id=" . $array["doc_cid"]);
		$rs = M("Doc");
		
		$array['doc_list']=get_doc_list($array["doc_id"],$array["doc_letters"]);
		$array["sid"] = 5;
		$array["title"] = $array["doc_name"] . "-" . C("site_name");
		$array["doc_readurl"] = gxl_data_url("doc", $array["doc_id"], $array["doc_cid"], $array["doc_name"], 1, $array["doc_jumpurl"],$array["doc_letters"]);
		$array["thisurl"] =  gxl_data_url("doc", $array["doc_id"], $array["doc_cid"], $array["doc_name"], 1, $array["doc_jumpurl"],$array["doc_letters"]);
		$array["doc_picurl"] = gxl_img_url($array["doc_pic"], $array["doc_content"]);
		$array["doc_picurl_small"] = gxl_img_url_small($array["doc_pic"], $array["doc_content"]);
		$array["doc_hits_insert"] = gxl_get_hits("doc", "insert", $array);
		$array["doc_hits_month"] = gxl_get_hits("doc", "doc_hits_month", $array);
		$array["doc_hits_week"] = gxl_get_hits("doc", "doc_hits_week", $array);
		$array["doc_hits_day"] = gxl_get_hits("doc", "doc_hits_day", $array);
		$array["doc_content"] = gxl_news_img_array($array["doc_content"], 2,$array["doc_name"]);
		$array["doc_name"] =  htmlentities($array["doc_name"]);
		$array["doc_remark"] =$array["doc_remark"]?htmlentities($array["doc_remark"]):'';
		$contimg = C("doc_images");

		if (!empty($contimg)) {
			$array["doc_imgarry"] = gxl_img_url_array($array["doc_content"]);
			$array["doc_imgcount"] = count($array["doc_imgarry"]);

			if ($contimg < $array["doc_imgcount"]) {
				$array["doc_content"] = gxl_news_imgs_array($array["doc_content"]);
			}
		}


		if ($array["doc_skin"]) {
			$array["doc_skin_detail"] =trim($array["doc_skin"]);
		}elseif($array_list[0]['list_skin_detail'] != "pp_doc"){
			$array["doc_skin_detail"] =trim($array_list[0]['list_skin_detail']);
		}else {
			$array["doc_skin_detail"] = ($array["list_skin_detail"] ? "" . $array_list["list_skin_detail"] : "pp_doc");
		
		}
		
		$arrays["show"] = $array_list[0];
		$arrays["read"] = $array;
		return $arrays;
	}
	public function Lable_Doc_Type($array, $array_play = false)
	{
		
		$rs = M("News");
		$cid=M('Doc')->where(array('doc_id'=>$array["doc_id"]))->find();
		$array_list = list_search(F("_gxlnews/list"), "list_id=" . $cid['doc_cid']);
		$array['news_list']=get_doc_list($array["doc_id"],$cid["doc_letters"]);
	
		$array["sid"] = 5;
		$array["title"] = $array["news_name"] . "-" . C("site_name");
		$array["news_readurl"] = gxl_data_type_url("doc", $array["news_id"], $array["news_cid"], $array["news_name"], 1,$array["news_jumpurl"], $array["news_letters"],$cid["doc_letters"]);
		$array["thisurl"] = gxl_data_type_url("doc", $array["news_id"], $array["news_cid"], $array["news_name"], 1, $array["news_jumpurl"]);
		$array["news_picurl"] = gxl_img_url($array["news_pic"], $array["news_content"]);
		$array["news_picurl_small"] = gxl_img_url_small($array["news_pic"], $array["news_content"]);
		$array["news_hits_insert"] = gxl_get_hits("news", "insert", $array);
		$array["news_hits_month"] = gxl_get_hits("news", "news_hits_month", $array);
		$array["news_hits_week"] = gxl_get_hits("news", "news_hits_week", $array);
		$array["news_hits_day"] = gxl_get_hits("news", "news_hits_day", $array);
		$array["news_content"] = gxl_news_img_array($array["news_content"], 2,$array["doc_name"]);
		$array["news_name"] =  htmlentities($array["news_name"]);
		$array["news_remark"] =$array["news_remark"]?htmlentities($array["news_remark"]):'';
	
		$contimg = C("news_images");

		if (!empty($contimg)) {
			$array["news_imgarry"] = gxl_img_url_array($array["news_content"]);
			$array["news_imgcount"] = count($array["news_imgarry"]);

			if ($contimg < $array["news_imgcount"]) {
				$array["news_content"] = gxl_news_imgs_array($array["news_content"]);
			}
		}


		if ($array["news_skin"]) {
			$array["list_skin_type"] =trim($array["news_skin"]);
		}elseif($array_list[0]['list_skin_type']){
			$array["list_skin_type"] =trim($array_list[0]['list_skin_type']);
		}else {
			$array["list_skin_type"] ="gxl_type";
		}
		
		$arrays["show"] = $array_list[0];
		$arrays["read"] = $array;
		return $arrays;
	}
	public function Lable_Zhidao_Read($array, $array_play = false)
	{
		$array_list = list_search(F("_gxlnews/list"), "list_id=" . $array["zhidao_cid"]);
		$rs = M("Zhidao");
		$count = $rs->field("zhidao_id")->count("zhidao_id");

		if (!$count) {
			return false;
		}

		$array["sid"] = 12;
		$array["title"] = $array["zhidao_name"] . "-" . C("site_name");
		$array["zhidao_readurl"] = gxl_data_url("zhidao", $array["zhidao_id"], $array["zhidao_cid"], $array["zhidao_name"], 1, $array["zhidao_jumpurl"]);
		$array["thisurl"] = gxl_data_url("zhidao", $array["zhidao_id"], $array["zhidao_cid"], $array["zhidao_name"], 1, $array["zhidao_jumpurl"]);
		$array["zhidao_picurl"] = gxl_img_url($array["zhidao_pic"], $array["zhidao_content"]);
		$array["zhidao_picurl_small"] = gxl_img_url_small($array["zhidao_pic"], $array["zhidao_content"]);
		$array["zhidao_hits_insert"] = gxl_get_hits("zhidao", "insert", $array);
		$array["zhidao_hits_month"] = gxl_get_hits("zhidao", "zhidao_hits_month", $array);
		$array["zhidao_hits_week"] = gxl_get_hits("zhidao", "zhidao_hits_week", $array);
		$array["zhidao_hits_day"] = gxl_get_hits("zhidao", "zhidao_hits_day", $array);
		$array["zhidao_content"] = gxl_news_img_array($array["zhidao_content"], 2,$array["zhidao_name"]);
		$contimg = C("zhidao_images");

		if (!empty($contimg)) {
			$array["zhidao_imgarry"] = gxl_img_url_array($array["zhidao_content"]);
			$array["zhidao_imgcount"] = count($array["zhidao_imgarry"]);

			if ($contimg < $array["zhidao_imgcount"]) {
				$array["zhidao_content"] = gxl_zhidao_imgs_array($array["zhidao_content"]);
			}
		}

		if ($array["zhidao_id"] != $count) {
			$array["zhidao_next"] = gxl_data_url("zhidao", $array["zhidao_id"] + 1, $array["zhidao_cid"], $array["zhidao_name"], 1, $array["zhidao_jumpurl"]);
			$next = getnews($array["zhidao_id"] + 1);
			$array["zhidao_next_name"] =  $next["zhidao_name"];
			$array["zhidao_next_picurl"] = gxl_img_url($next["zhidao_pic"]);
			$array["zhidao_next_small"] = gxl_img_url_small($next["zhidao_pic"]);
			//print_r();die();
			//$array["zhidao_next_picurl"] = gxl_img_url(return getzhidao($array["zhidao_id"] + 1)["zhidao_pic"]);
			//$array["zhidao_next_small"] = gxl_img_url_small(return getzhidao($array["zhidao_id"] + 1)["zhidao_pic"]);
		}
		if ($array["zhidao_id"] != 1) {
			$array["zhidao_prev"] = gxl_data_url("zhidao", $array["zhidao_id"] - 1, $array["zhidao_cid"], $array["zhidao_name"], 1, $array["zhidao_jumpurl"]);
			$prev = getnews($array["zhidao_id"] - 1);
			$array["zhidao_prev_name"] =  $prev["zhidao_name"];
			$array["zhidao_prev_picurl"] = gxl_img_url($prev["zhidao_pic"]);
			$array["zhidao_prev_small"] = gxl_img_url_small($prev["zhidao_pic"]);
			//$array["zhidao_prev_picurl"] = gxl_img_url(getzhidao($array["zhidao_id"] - 1)["zhidao_pic"]);
			//$array["zhidao_prev_small"] = gxl_img_url_small(getzhidao($array["zhidao_id"] - 1)["zhidao_pic"]);
		}

		if ($array["zhidao_skin"]) {
			$array["zhidao_skin_detail"] =trim($array["zhidao_skin"]);
		}elseif($array_list[0]['list_skin_detail'] != "pp_zhidao"){
			$array["zhidao_skin_detail"] =trim($array_list[0]['list_skin_detail']);
		}else {
			$array["zhidao_skin_detail"] = ($array["list_skin_detail"] ? "" . $array_list["list_skin_detail"] : "gxl_zhidao");
		
		}

		
		$arrays["show"] = $array_list[0];
		$arrays["read"] = $array;
		return $arrays;
	}
	public function Lable_Links_Read($array, $array_play = false)
	{
		$array_list = list_search(F("_gxlnews/list"), "list_id=" . $array["links_cid"]);
		$rs = M("Links");
		$count = $rs->field("links_id")->count("links_id");

		if (!$count) {
			return false;
		}
		if($array['links_uid']){
			
			$array["user"]=M('User')->where(array('uid'=>$array['links_uid']))->field('password,groupid,random,regtime,addtime',true)->find();
			$array["user"]['avatar_img']=gxl_img_url($array["user"]['avatar_img']);
			
		}
		$array["sid"] = 12;
		$array["title"] = $array["links_name"] . "-" . C("site_name");
		$array["links_readurl"] = gxl_data_url("links", $array["links_id"], $array["links_cid"], $array["links_name"], 1, $array["links_jumpurl"]);
		$array["thisurl"] = gxl_data_url("links", $array["links_id"], $array["links_cid"], $array["links_name"], 1, $array["links_jumpurl"]);
		$array["links_picurl"] = gxl_img_url($array["links_pic"], $array["links_content"]);
		$array["links_picurl_small"] = gxl_img_url_small($array["links_pic"], $array["links_content"]);
		$array["links_hits_insert"] = gxl_get_hits("links", "insert", $array);
		$array["links_hits_month"] = gxl_get_hits("links", "links_hits_month", $array);
		$array["links_hits_week"] = gxl_get_hits("links", "links_hits_week", $array);
		$array["links_hits_day"] = gxl_get_hits("links", "links_hits_day", $array);
		$array["links_content"] = gxl_news_img_array($array["links_content"], 2, $array["links_name"]);
		$array["links_links"] =$array["links_link"];
		$array["links_link"] =$array["links_is"]?substr_replace($array["links_link"], '****',2,8):$array["links_link"];
		$contimg = C("links_images");

		if (!empty($contimg)) {
			$array["links_imgarry"] = gxl_img_url_array($array["links_content"]);
			$array["links_imgcount"] = count($array["links_imgarry"]);

			if ($contimg < $array["links_imgcount"]) {
				$array["links_content"] = gxl_links_imgs_array($array["links_content"]);
			}
		}
		if ($array["links_skin"]) {
			$array["links_skin_detail"] =trim($array["links_skin"]);
		}elseif($array_list[0]['list_skin_detail'] != "pp_links"){
			$array["links_skin_detail"] =trim($array_list[0]['list_skin_detail']);
		}else {
			$array["links_skin_detail"] = ($array["list_skin_detail"] ? "" . $array_list["list_skin_detail"] : "gxl_links");
		
		}

		
		$arrays["show"] = $array_list[0];
		$arrays["read"] = $array;
		return $arrays;
	}
	public function Lable_Special_List($param)
	{
		$array_list = array();
		$array_list["sid"] = 3;
		$array_list["special_skin"] = "gxl_speciallist";
		$array_list["special_page"] = $param["page"];
		$array_list["special_order"] = "special_" . $param["order"];
		$array_list["thisurl"] = str_replace("{!page!}", $param["page"], gxl_special_url($param["page"]));

		if (1 < $param["page"]) {
			$array_list["title"] = "专题列表-第" . $param["page"] . "页-" . C("site_name");
			$array_list["page"] = "-第" . $param["page"] . "页";
		}
		else {
			$array_list["title"] = "专题列表-" . C("site_name");
		}

		return $array_list;
	}

	public function Lable_Special_Read($array, $array_play = false)
	{
		$array_ids = array();
		$where = array();
		$array["special_readurl"] = gxl_data_url("special", $array["special_id"], 0, $array["special_name"], 1, 0, $array["special_letters"]);
		$array["thisurl"] = gxl_data_url("special", $array["special_id"], 0, $array["special_name"], 1, 0, $array["special_letters"]);
		$array["special_logo"] = gxl_img_url($array["special_logo"], $array["special_content"]);
		$array["special_banner"] = gxl_img_url($array["special_banner"], $array["special_content"]);
		$array["special_hits_insert"] = gxl_get_hits("special", "insert", $array);
		$array["special_hits_month"] = gxl_get_hits("special", "special_hits_month", $array);
		$array["special_hits_week"] = gxl_get_hits("special", "special_hits_week", $array);
		$array["special_hits_day"] = gxl_get_hits("special", "special_hits_day", $array);
		$array["special_skin"] = (!empty($array["special_skin"]) ? "" . $array["special_skin"] : "gxl_special");
		$array["title"] = $array["special_name"] . "-专题-" . C("site_name");
		$array["sid"] = 3;
		$rs = D("TopicvodView");
		$where["topic_sid"] = 1;
		$where["topic_tid"] = $array["special_id"];
		$list_vod = $rs->where($where)->order("topic_oid desc,topic_did desc")->select();

		foreach ($list_vod as $key => $val ) {
			$list_vod[$key]["list_id"] = $list_vod[$key]["vod_cid"];
			$list_vod[$key]["list_name"] = getlistname($list_vod[$key]["list_id"], "list_name");
			$list_vod[$key]["list_url"] = getlistname($list_vod[$key]["list_id"], "list_url");
			$list_vod[$key]["vod_readurl"] = gxl_data_url("vod", $list_vod[$key]["vod_id"], $list_vod[$key]["vod_cid"], $list_vod[$key]["vod_name"], 1, $list_vod[$key]["vod_jumpurl"], $list_vod[$key]["vod_letters"]);
			$list_vod[$key]["vod_playurl"] = gxl_play_url($list_vod[$key]["vod_id"], 0, 1, $list_vod[$key]["vod_cid"], $list_vod[$key]["vod_name"]);
			$list_vod[$key]["vod_picurl"] = gxl_img_url($list_vod[$key]["vod_pic"], $list_vod[$key]["vod_content"]);
			$list_vod[$key]["vod_picurl_small"] = gxl_img_url_small($list_vod[$key]["vod_pic"], $list_vod[$key]["vod_content"]);
		}

		$rs = D("TopicnewsView");
		$where["topic_sid"] = 2;
		$where["topic_tid"] = $array["special_id"];
		$list_news = $rs->where($where)->order("topic_oid desc,topic_did desc")->select();

		foreach ($list_news as $key => $val ) {
			$list_news[$key]["list_id"] = $list_news[$key]["news_cid"];
			$list_news[$key]["list_name"] = getlistname($list_news[$key]["list_id"], "list_name");
			$list_news[$key]["list_url"] = getlistname($list_news[$key]["list_id"], "list_url");
			$list_news[$key]["news_readurl"] = gxl_data_url("news", $list_news[$key]["news_id"], $list_news[$key]["news_cid"], $list_news[$key]["news_name"], 1, $list_news[$key]["news_jumpurl"]);
			$list_news[$key]["news_picurl"] = gxl_img_url($list_news[$key]["news_pic"], $list_news[$key]["news_content"]);
			$list_news[$key]["news_picurl_small"] = gxl_img_url_small($list_news[$key]["news_pic"], $list_news[$key]["news_content"]);
		}

		$arrays["read"] = $array;
		$arrays["list_vod"] = $list_vod;
		$arrays["list_news"] = $list_news;
		return $arrays;
	}

	public function Lable_Search($param, $sidname = "vod")
	{
		$array_search = array();

		if ($sidname == "vod") {
			$array_search["search_actor"] = $param["actor"];
			$array_search["search_director"] = $param["director"];
			$array_search["search_area"] = $param["area"];
			$array_search["search_langaue"] = $param["langaue"];
			$array_search["search_year"] = $param["year"];
			$array_search["sid"] = 1;
		}
		else {
			$array_search["sid"] = 2;
		}

		$array_search["search_wd"] = $param["wd"];
		$array_search["search_name"] = $param["name"];
		$array_search["search_title"] = $param["title"];
		$array_search["search_page"] = $param["page"];
		$array_search["search_letter"] = $param["letter"];
		$array_search["search_order"] = $param["order"];
		$array_search["search_skin"] = "gxl_" . $sidname . "search";

		if (1 < $param["page"]) {
			$array_search["title"] = $array_search["search_wd"] . "-第" . $param["page"] . "页";
		}
		else {
			$array_search["title"] = $array_search["search_wd"];
		}

		$array_search["title"] = $array_search["search_area"] . $array_search["search_langaue"] . $array_search["search_actor"] . $array_search["search_director"] . $array_search["title"] . "-" . C("site_name");
		$array_search["thisurl"] = str_replace(array("{!page!}", "addtime", "_0_", "-0-", "lz--", "mcid--", "letter--", "area--", "order--", "year--", "xb--", "id--", "-p-1"), array($param["page"], "", "__", "--", ""), UU("Home-vod/search", array("wd" => $param["wd"], "p" => "{!page!}"), true, false));
		return $array_search;
	}



	public function Lable_Tags($param)
	{
		$array_tag = array();
		$array_tag["tag_name"] = $param["wd"];
		$array_tag["tag_url"] = gxl_tag_url($param["wd"]);
		$array_tag["tag_page"] = $param["page"];

		if (1 < $param["page"]) {
			$array_tag["title"] = $array_tag["tag_name"] . "-第" . $param["page"] . "页-" . C("site_name");
		}
		else {
			$array_tag["title"] = $array_tag["tag_name"] . "-" . C("site_name");
		}

		return $array_tag;
	}

	public function Lable_Index()
	{
		$array = array();
		$array["title"] = C("site_name");
		$array["model"] = "index";
		return $array;
	}

	public function Lable_Maps($mapname, $limit, $page)
	
	{
	    
	    if($mapname=='doc_news'){
	        
		    $rs = M($mapname.' as a');
	        $name='news_';
	        $list = $rs->join('gxl_doc as b on a.doc_id=b.doc_id')->order($name."addtime desc")->field('a.*,b.doc_letters')->limit($limit)->page($page)->select();
	        if ($list) {
			foreach ($list as $key => $val ) {
				$list[$key]["readurl"] = gxl_data_type_url("doc", $list[$key][$name."id"], $list[$key][$name."cid"], $list[$key][$name."name"], 1,$list[$key][$name."jumpurl"], $list[$key][$name."letters"],$list[$key]["doc_letters"]);
					$list[$key]["addtime"] = $list[$key][$name."addtime"];
			}

			return $list;
		    }
	    }elseif($mapname=='down'){
	        
		    $rs = M($mapname);
	        $name='down_';
	        $list = $rs->order($name."addtime desc")->limit($limit)->page($page)->select();
	        
	        if ($list) {
			foreach ($list as $key => $val ) {
				$list[$key]["readurl"] = gxl_data_url("down", $list[$key][$name."id"], $list[$key][$name."cid"], $list[$key][$name."name"], 1,$list[$key][$name."jumpurl"], $list[$key][$name."letters"],$list[$key][$name."letters"]);
				$list[$key]["addtime"] = $list[$key][$name."addtime"];
			}
			return $list;
		    }
	    }else{
	        
	
	    
	     $name='news_';
	     $rs = M($name);
	     $list = $rs->order($name."addtime desc")->limit($limit)->page($page)->select();
	   
	     if ($list) {
			foreach ($list as $key => $val ) {
				$list[$key]["readurl"] =  gxl_data_url("news", $list[$key]["news_id"], $list[$key]["news_cid"], $list[$key]["news_name"], 1, $list[$key]["news_jumpurl"]);
				$list[$key]["addtime"] = $list[$key][$name."addtime"];
			}

            
			return $list;
		}
	    }
		
	
		

		return false;
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
		$array["home_pagenum"]=C("home_pagenum");
		$array["murl"] = rtrim(C("m_url"), "/");
		$array["icp"] = C("site_icp");
		$array["hotkey"] = gxl_hot_key(C("site_hot"));
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
		$array["siteday"] = C("site_day");
		$array["siteweek"] = C("site_week");
		$array["sitenewg"] = C("site_newg");
		$array["dujia"] = C("dujia");
		$array["rd"] = C("rd");
		$array["jihe"] = C("jihe");
		$array["newss_id"] = $mbid[5];
		$array["newss_hx"] = $mbid[6];
		$array["geturl"] = geturl();
		$array["apicss"] = cssurl();
		$array["hideplayer"] = C("hideplayer");
		$array["mobile_status"] = C("mobile_status");
		return $array;
	}
}
?>