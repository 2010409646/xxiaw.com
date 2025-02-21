<?php

namespace Common\Model;
use Think\Model;

class ImgModel extends Model
{
	public function down_load($url, $sid = "vod", $pyname='')
	{
	    
		if (is_array($url)) {
			$pathArr = array();
           
			foreach ($url as $key => $value ) {
				if ((C("upload_http") && (0 < strpos($value, "://"))) || (C("upload_http_news") && ($sid == "news") && ($sid == "vod") && ($sid == "tv") && ($sid == "star") && (0 < strpos($value, "://")))) {
					$pathArr[] = $this->down_img($value, $sid,$pyname);
				}
				else {
					$pathArr[] = $value;
				}
			}

			return $pathArr;
		}
		else {
		    
			if ((C("upload_http") && (0 < strpos($url, "://"))) || (C("upload_http_news") && ($sid == "news") && ($sid == "vod") && ($sid == "tv") && ($sid == "star") && (0 < strpos($url, "://")))) {
				return $this->down_img($url, $sid, $pyname);
			}
			else {
				return $url;
			}
		}
	}

	public function down_img($url, $sid = "vod", $pyname='')
	{
	    
		$chr = strrchr($url, ".");
        $imgis=checkFor3dmgameIgnoreCase($url);
		if (!empty($pyname)) {
			//$imgUrl = $pyname;
			$img =explode('/',$url);
			$imgUrl=$img[count($img)-1];
		}
		else {
			//$imgUrl = uniqid();
			$img =explode('/',$url);
			$imgUrl=$img[count($img)-1];
		}
	
		$imgPath = $sid . "/" .($pyname?$pyname:date(C("upload_style"), time())) . "/";
		$imgPath_s = "./" . C("upload_path") . "/" . $imgPath;
		$filename = "./" . C("upload_path") . "/" . $imgPath . $imgUrl ;
		$get_file = gxl_file_get_contents($url);
      
		if ($get_file) {
			write_file($filename, $get_file);
			
		    @$image = new \Think\Image();
			$gif=getimagesize($filename);
			if($sid!='down_icon'){
             if($gif[2] != IMAGETYPE_GIF){
			if (C("upload_water")) {
				
				@$image->open($filename)->water(C("upload_water_img"), C("upload_water_pos"), C("upload_water_pct"))->save($filename);
			}
             } 
			}
			if (C("upload_thumb")) {
				mkdirss($imgPath_s);
			
			    
				@$image->crop($image->width(), $image->height()-40,0,0)->save($imgPath_s . $imgUrl );
			}
			
			if($imgis){
			    $ursx=	@$image->open($filename);
			    @$image->crop($image->width(), $image->height()-40,0,0)->save($imgPath_s . $imgUrl );
			}
           
			if (C("upload_ftp")) {
				$this->ftp_upload($imgPath . $imgUrl);
			}
            $uls=$imgPath . $imgUrl ;
           
			return $uls;
		}
		else {
			return $url;
		}
	}

	public function ftp_upload($imgurl)
	{
		$ftpcon = array("ftp_host" => C("upload_ftp_host"), "ftp_port" => C("upload_ftp_port"), "ftp_user" => C("upload_ftp_user"), "ftp_pwd" => C("upload_ftp_pass"), "ftp_dir" => '/'.C("upload_ftp_dir"));
		$ftp = new \Org\Net\Ftp();
		$ftp->config($ftpcon);
		$ftp->connect();
		$ftpimg = $ftp->put($imgurl);


		if (C("upload_ftp_del")) {
			if ($ftpimg) {
				@unlink($imgurl);
			}

			if ($ftpimg_s) {
				@unlink($imgurl_s);
			}
		}

		$ftp->bye();
	}
	
	public function ftp($imgurl){
		
		$root="/" .C("upload_path") .$imgurl;
		$roots="./" .C("upload_path") .$imgurl;
		$ftpcon = array("ftp_host" => C("upload_ftp_host"), "ftp_port" => C("upload_ftp_port"), "ftp_user" => C("upload_ftp_user"), "ftp_pwd" => C("upload_ftp_pass"), "ftp_dir" => C("upload_ftp_dir"));
		$ftp = new \Org\Net\Ftp();
		$ftp->config($ftpcon);
		$ftp->connect();
		$ftpimg = $ftp->put($roots,$root);

	
		
		if (C("upload_ftp_del")) {
			if ($ftpimg) {
				@unlink(C("upload_path") . "/" . $imgurl);
			}

			if ($ftpimg_s) {
				@unlink(C("upload_path") . "/thumb" . $imgurl_s);
			}
		}

		$ftp->bye();
	}
}
function checkFor3dmgameIgnoreCase($inputString) {
    if (stripos($inputString, "3dmgame")!== false) {
        return true;
    } else {
        return false;
    }
}


