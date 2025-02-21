<?php
namespace Org\Net; 
//单入口模式
//array("baiduhd.gif","qvod.gif","youku.gif","tudou.gif","qiyi.gif","letv.gif","qq.gif","ku6.png","56.gif","other.gif");
class QireCaiji{
	public function getPlayURL($contents){
		if(substr_count($contents,"pp_serverurl") > 0){
			$contents = $this->cut_html($contents,"pp_serverurl","</script>");
		}
		$players = $this->getplayer($contents);
		$urls = $this->geturl($contents);
		$cnt = count(explode("$$$",$players));
		return array("players"=>$players,"urls"=>$urls,"count"=>$cnt);
	}
	function getplayer($contents){
		$contents  = str_replace(" ", "", $contents);
		if(substr_count($contents,"pp_serverurl") > 0){
			return $this->checkplayer($this->cut_html($contents,'pp_serverurl="','";'));
		}else{
			return $this->checkplayer($this->cut_html($contents,'="','";'));
		}		
	}
	function checkplayer($data){
		$data = str_replace(array('baiduhd','youku_new','youku'),array('bdhd','yuku','flv'),$data);
		return $data;
	}
	
	function geturl($contents){
		$bsubstring = substr_count($contents,"substring");
		$rep = $this->getData($contents,"pp_play.replace",1);
		$rep = $this->getData($rep,";",0);
		$contents1 = explode(trim(";"), $this->getData($contents,"pp_play",0)); 
		$contents2 = $this->getData($contents,"pp_play",1);
		$arr = array();
		$exa = array("","pp_play","pp_plays","sid","curplay");
		$str = "";
		
		foreach($contents1 as $row){
			if($str == ""){
				$str = "true";
			}else{
				if(strpos($row,"=") > 0){
					$tmp = trim($this->getData($row,"=",0));
					if(!in_array($tmp,$exa)){						
						$row = trim(str_replace('var ',"",$row));
						$row = str_replace('\'',"\"",$row);
						$tmp = trim(str_replace('var ',"",$tmp));
						$arr[] = array('s'=>$tmp,'r'=>"$".$row.";");
					}	
				}
			}
		}
	
		$str = "pp_play".$this->getData($contents2,";",0).";";
		
		foreach($arr as $row){
			$str = str_replace($row['s'],"$".$row['s'],$str);
			eval($row['r']);
		}
		
		$str = str_replace('\'',"\"",$str);
		$str = str_replace('+'," . ",$str);
		
		$str = "$".trim($str);
		eval($str);	
		
		if(strlen($rep) >0 ){
			$rep = str_replace('\'',"\"",$rep);
			$rep = explode(".replace", $rep); 
			foreach($rep as $row){		
				$row = str_replace(')',",\$pp_play);",$row);
				eval("\$pp_play = str_replace".$row);
			}
		}
	
		if($bsubstring > 0){
			$pp_play = substr($pp_play,0,strlen($pp_play)-1);
		}		
		
		$pp_play = urldecode($pp_play);
		$pp_play = str_replace("+++","\r\n",$pp_play);
		$pp_play = str_replace("++","$",$pp_play);
		return $pp_play;			
	}
	
	function getData($contents,$str,$i){
		$contents = explode($str, $contents); 
		if(isset($contents[$i])){
			return $contents[$i];
		}else{
			return "";
		}
	}
	
	
	public function cut_html($html, $start, $end) {
		if (empty($html)) return false;
		$html  = str_replace(array("\r", "\n"), "", $html);
		$start = str_replace(array("\r", "\n"), "", $start);
		$end   = str_replace(array("\r", "\n"), "", $end);
		$start = stripslashes($start);
		$end   = stripslashes($end);
		if(!empty($start)) $html  = explode(trim($start), $html); 
		if(!empty($end) && is_array($html)){ 
		$html = explode(trim($end), $html[1]);
		return $html[0];
		}else{
			return $html;
		}
	}
}
?>