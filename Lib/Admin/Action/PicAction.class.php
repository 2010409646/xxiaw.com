<?php

namespace Admin\Action;
use Common\Action\BaseAction;
class PicAction extends BaseAction
{
		public function picall(){
	    
	    $where['gxl_down_all.down_picall']=array('neq','');
	    $where['gxl_down.down_cid']=170;
	   
	   $list = M("down")
        ->where($where)
        ->join('gxl_down_all on gxl_down.down_id = gxl_down_all.down_id')
        ->limit(C("upload_http_down"))
        ->field('gxl_down_all.down_id,gxl_down_all.down_picall')
        ->select();
       $count = M("down")
        ->where($where)
        ->join('gxl_down_all on gxl_down.down_id = gxl_down_all.down_id')
        ->limit(C("upload_http_down"))
        ->field('gxl_down_all.down_id,gxl_down_all.down_picall')
        ->count();
        foreach ($list as $k=>$v) {
            $val=getarraypic(gxl_news_img_array($v['down_picall']));
            foreach ($val as $kk=>$vv){
               
                 unlink('.'.$vv);
            }
           $id=M('down_all')->where("down_id=" . $v["down_id"])->setField("down_picall", '');
            
        }
        if ($list) {
			echo "<style type=\"text/css\">div{font-size:13px;color: #333333;line-height:21px;}span{font-weight:bold;color:#gxl0000}</style>";
			echo "<div>共有<span>" . $count . "</span>张远程图片，每次批量删除<span>" . C("upload_http_down") . "</span>张，<span>" . C("play_collect_time") . "</span>秒后执行下一次操作。<br />";
			echo "请稍等一会，正在释放服务器资源...<meta http-equiv=\"refresh\" content=" . C("play_collect_time") . ";url=?s=Admin-Pic-picall>";
			echo "</div>";
       }else{
           
       }
	    
	    
	}
    public function down()
	{
		C("upload_http", 1);
		$img = D("Img");
		$rs = D("Down");

		if ("fail" == trim($_GET["id"])) {
			$rs->execute("update " . C("db_prefix") . "down set down_pic=REPLACE(down_pic,\"http://\", \"http://\")");
		}

		$count = $rs->where("Left(down_pic,4)=\"http\"")->count("down_id");
		$list = $rs->where("Left(down_pic,4)=\"http\"")->order("down_addtime desc")->limit(C("upload_http_down"))->select();
        
		if ($list) {
			echo "<style type=\"text/css\">div{font-size:13px;color: #333333;line-height:21px;}span{font-weight:bold;color:#gxl0000}</style>";
			echo "<div>共有<span>" . $count . "</span>张远程图片，每次批量下载<span>" . C("upload_http_down") . "</span>张，<span>" . C("play_collect_time") . "</span>秒后执行下一次操作。<br />";

			foreach ($list as $key => $value ) {
				@$imgnew = $img->down_load($value["down_pic"], "down");
                
				if ($value["down_pic"] == $imgnew) {
				   
					$rs->where("down_id=" . $value["down_id"])->setField("down_pic", '');
				    $htmlContent=M('Down_all')->where("down_id=" . $value["down_id"])->getField('down_content');
					$news_content = gxl_news_img_array($htmlContent, 1);
					
					preg_match_all('/<img.*?src="(.*?)".*?>/', gxl_down_img_array($htmlContent,'pic'), $matches);
                
                if (!empty($matches[1])) {
                    $dom = new \DOMDocument();
                    $htmlContent=mb_convert_encoding($htmlContent, 'HTML-ENTITIES', 'UTF-8');
                    $dom->loadHTML($htmlContent);
                    $images = $dom->getElementsByTagName('img');

                  foreach ($images as $image) {
                        $imageUrl = $image->getAttribute('src');
                       
                        if (!isImageAccessible($imageUrl)) {
                            $image->parentNode->removeChild($image);
                        }
                    }
            
                    $newHtmlContent =html_entity_decode($dom->saveHTML(), ENT_QUOTES, 'UTF-8'); ;
                }
                
                M('down_all')->where("down_id=" . $value["down_id"])->setField("down_content", $newHtmlContent);
					
					echo ($key + 1) . " <a href=\"" . $value["down_pic"] . "\" target=\"_blank\">" . $value["down_pic"] . $value["down_name"] . "</a> <font color=red>下载失败!</font><br/>";
				}
				else {
					$rs->where("down_id = " . $value["down_id"])->setField("down_pic", $imgnew);
					echo ($key + 1) . " <a href=\"" . $value["down_pic"] . "\" target=\"_blank\">" . $value["down_pic"] . $value["down_name"] . "</a> 下载成功！<br />";
				}

				ob_flush();
				flush();
			}

		echo "请稍等一会，正在释放服务器资源...<meta http-equiv=\"refresh\" content=" . C("play_collect_time") . ";url=?s=Admin-Pic-down>";
			echo "</div>";
		}
		else {
			$count = $rs->where("Left(down_pic,8)=\"http://\"")->count("down_id");

			if ($count) {
				echo "<div style=\"font-size:14px;\">共有<span>" . $count . "</span>张远程图片保存失败,如果需要重新下载,请点击<a href=\"?s=Admin-Pic-Down-id-fail\">[这里]</a>!</div>";
			}
			else {
				$this->assign("jumpUrl", "?s=Admin-Down-Show");
				$this->success("恭喜您,所有远程图片已经下载完成！");
			}
		}
	}
	public function news()
	{
		C("upload_http", 1);
		$img = D("Img");
		$rs = D("News");

		if ("fail" == trim($_GET["id"])) {
			$rs->execute("update " . C("db_prefix") . "news set news_pic=REPLACE(news_pic,\"http://\", \"http://\")");
		}

		$count = $rs->where("Left(news_pic,7)=\"http://\"")->count("news_id");
		$list = $rs->where("Left(news_pic,7)=\"http://\"")->order("news_addtime desc")->limit(C("upload_http_down"))->select();

		if ($list) {
			echo "<style type=\"text/css\">div{font-size:13px;color: #333333;line-height:21px;}span{font-weight:bold;color:#gxl0000}</style>";
			echo "<div>共有<span>" . $count . "</span>张远程图片，每次批量下载<span>" . C("upload_http_down") . "</span>张，<span>" . C("play_collect_time") . "</span>秒后执行下一次操作。<br />";

			foreach ($list as $key => $value ) {
				@$imgnew = $img->down_load($value["news_pic"], "news");

				if ($value["news_pic"] == $imgnew) {
					$rs->where("news_id=" . $value["news_id"])->setField("news_pic", str_replace("http://", "http://", $value["news_pic"]));
					echo ($key + 1) . " <a href=\"" . $value["news_pic"] . "\" target=\"_blank\">" . $value["news_pic"] . "</a> <font color=red>下载失败!</font><br/>";
				}
				else {
					$rs->where("news_id = " . $value["news_id"])->setField("news_pic", $imgnew);
					echo ($key + 1) . " <a href=\"" . $value["news_pic"] . "\" target=\"_blank\">" . $value["news_pic"] . "</a> 下载成功！<br />";
				}

				ob_flush();
				flush();
			}

			echo "请稍等一会，正在释放服务器资源...<meta http-equiv=\"refresh\" content=" . C("play_collect_time") . ";url=?s=Admin-Pic-news>";
			echo "</div>";
		}
		else {
			$count = $rs->where("Left(news_pic,8)=\"http://\"")->count("news_id");

			if ($count) {
				echo "<div style=\"font-size:14px;\">共有<span>" . $count . "</span>张远程图片保存失败,如果需要重新下载,请点击<a href=\"?s=Admin-Pic-Down-id-fail\">[这里]</a>!</div>";
			}
			else {
				$this->assign("jumpUrl", "?s=Admin-News-Show");
				$this->success("恭喜您,所有远程图片已经下载完成！");
			}
		}
	}

	public function newsall()
	{
		C("upload_http", 1);
		$img = D("Img");
		$rs = D("news");

		if ("fail" == trim($_GET["id"])) {
			$rs->execute("update " . C("db_prefix") . "news set news_content=REPLACE(news_content,\"https://\", \"http://\")");
	
		}
		
		$where="news_content like '%http%jpg%' or news_content like '%http%png%' or news_content like '%http%gif%'";
	
	
		$count = $rs->where($where)->count("news_id");
		$list = $rs->where($where)->order("news_addtime desc")->field('news_id,news_name,news_content')->limit(C("upload_http_down"))->select();
		
		
		if ($list) {
			echo "<style type=\"text/css\">div{font-size:13px;color: #333333;line-height:21px;}span{font-weight:bold;color:#FF0000}</style>";
			echo "<div>共有<span>" . $count . "</span>张远程图片，每次批量下载<span>" . C("upload_http_down") . "</span>张，<span>" . C("play_collect_time") . "</span>秒后执行下一次操作。<br />";

			foreach ($list as $key => $value ) {
				
				$xia[$key]=gxl_news_img_array($value["news_content"],2);
				if (!!$path = getarraypic($xia[$key])) {
					$savePath = $img->down_load($path, "news");
					$value['news_content']= str_ireplace($path, $savePath, $xia[$key]);
					$value['news_content'];
					$rs->where("news_id=" . $value["news_id"])->setField("news_content", $value['news_content']);
				}
				echo ($key + 1) . " <a href=\"" .gxl_data_url("news",$value["news_id"], $value["news_cid"], $value["news_name"], 1, $value["news_jumpurl"]) . "\" target=\"_blank\">" . $value["news_name"] . "</a> <font color=green>下载成功!</font><br/>";
				ob_flush();
				flush();
			}

			echo "请稍等一会，正在释放服务器资源...<meta http-equiv=\"refresh\" content=" . C("play_collect_time") . ";url=?s=Admin-Pic-news>";
			echo "</div>";
		}
		else {
			$count = $rs->where("Left(news_content,8)=\"https://\"")->count("news_id");

			if ($count) {
				echo "<div style=\"font-size:14px;\">共有<span>" . $count . "</span>张远程图片保存失败,如果需要重新下载,请点击<a href=\"?s=Admin-Pic-Down-id-fail\">[这里]</a>!</div>";
			}
			else {
				$this->assign("jumpUrl", "?s=Admin-Vod-Show");
				$this->success("恭喜您,所有远程图片已经下载完成！");
			}
		}
	}

	public function show()
	{
		$id = trim($_GET["id"]);

		if ($id) {
			$dirpath = admin_gxl_url_repalce(str_replace("*", "-", $id));
		}
		else {
			$dirpath = "./" . C("upload_path");
		}

		if (!strpos($dirpath, C("upload_path"))) {
			$this->error("不在上传文件夹范围内！");
		}

		$dirlast = $this->dirlast();
		$dir = new \Org\Net\Dir($dirpath);
		$list_dir = $dir->toArray();

		foreach ($list_dir as $key => $value ) {
			$list_dir[$key]["pathfile"] = admin_gxl_url_repalce($value["path"], "desc") . "|" . str_replace("-", "*", $value["filename"]);
		}

		if (empty($list_dir)) {
			$this->error("还没有上传任何附件,无需管理！");
		}

		if ($dirlast && ($dirlast != ".")) {
			$this->assign("dirlast", admin_gxl_url_repalce($dirlast, "desc"));
		}

		$this->assign("dirpath", $dirpath);
		$this->assign("list_dir", $list_dir);
		$this->display("./Public/system/pic_show.html");
	}

	public function dirlast()
	{
		$id = admin_gxl_url_repalce(trim($_GET["id"]));

		if ($id) {
			return substr($id, 0, strrpos($id, "/"));
		}
		else {
			return false;
		}
	}

	public function del()
	{
		$path = trim(str_replace("*", "-", $_GET["id"]));
		@unlink($path);
		@unlink(str_replace(C("upload_path") . "/", C("upload_path") . "-s/", $path));
		$this->success("删除附件成功！");
	}

	public function ajaxpic()
	{
		$path = trim(str_replace("*", "-", $_GET["id"]));
		$list = glob($path . "/*");

		if (empty($list)) {
			exit("无图片");
		}

		foreach ($list as $i => $file ) {
			$dir[] = str_replace("./" . C("upload_path") . "/", "", $path . "/" . basename($file));
		}

	if (stristr($path, "/news")) {
			$rs = M("News");
			$array = $rs->field("news_pic")->where("Left(news_pic,4)!=\"http\"")->order("news_addtime desc")->select();

			foreach ($array as $value ) {
				$dir2[] = $value["news_pic"];
			}
		}
	
		else if (stristr($path, "/slide")) {
			$rs = D("Slide");
			$array = $rs->field("slide_pic")->where("Left(slide_pic,4)!=\"http\"")->order("slide_id desc")->select();

			foreach ($array as $value ) {
				$dir2[] = $value["slide_pic"];
			}
		}
		else if (stristr($path, "/link")) {
			$rs = M("Link");
			$array = $rs->field("link_logo")->where("Left(link_logo,4)!=\"http\"")->order("link_id desc")->select();

			foreach ($array as $value ) {
				$dir2[] = $value["link_logo"];
			}
		}

		$del = array_digxl($dir, $dir2);

		foreach ($del as $key => $value ) {
			@unlink("./" . C("upload_path") . "/" . $value);
		}

		exit("清理完成");
	}
}

function isImageAccessible($imageUrl) {
    $ch = curl_init($imageUrl);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ($httpCode === 200);
}
