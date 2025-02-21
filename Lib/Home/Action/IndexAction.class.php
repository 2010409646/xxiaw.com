<?php
namespace Home\Action;
use Common\Action\HomeAction;
class IndexAction extends HomeAction{   
    public function index(){
		if (!is_file('./Runtime/Install/install.lock')) {
			$this->assign("jumpUrl",'index.php?s=Admin-Install');
			$this->error('您还没安装本程序，请运行 install.php 进入安装!');
		}
		//伪静态判断
		if(C('url_html')){
			redirect('index'.C('url_html_suffix'));
		}
		  $this->assign($this->Lable_Index());
		  //print_r($this->Lable_Index());
	    $this->display('gxl_index');
    }
    public function caiji(){
       $url = $_SERVER["REQUEST_URI"];
	   $searchString = "url-"; // 定义要查询的字符为url=
		$url = strstr($url,$searchString);
		$length = strlen($searchString);
		$url = substr($url, $length);
        $url =getHTTPS($url);
        preg_match('|<h2 class="project-menu1">(.*?)</h2>(.*?)<mip-link class="project-menu2 project-menu2-activity|is',$url,$title) ; 
		preg_match_all('|<h2 class="project-menu1">(.*?)</h2>|is',$title[0],$data) ; 
		preg_match('|<div class="content-block content-intro">(.*?)<div class="article-navigation-prev">|is',$url,$da) ; 
		preg_match('|<h1 class="content-title">(.*?)</h1>|is',$url,$h); 
		preg_match('|<h1 class="title">(.*?)</h1>|is',$url,$title);
		preg_match_all('|<a target="_blank" showtry="1" href="(.*?)" class="(.*?)">(.*?)</a>|is',$url,$cs) ; 
		if(!$cs[1]){
			
		preg_match_all('|<a target="_blank" class="showbtn" showtry="1" href="(.*?)">(.*?)</a> |is',$url,$cs) ; 	
		}
		
		$lenth=count($data[1]);
		if($cs[1]){
			foreach($cs[1] as $k=>$v){
				
				$cs[1][$k]='<a href="https://m.w3cschool.cn'.$v.'" >';
			}
			
		}
		
		$info=$title[0].$h[0].'<h9 id="gxlsys">'.$data[1][$lenth-1].'</h9>'.$da[0].'<div id="codsss">'.implode('',$cs[1]).'</div>';
		
		echo $info;
        die;
        
    
    }
}
  function getHTTPS($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($ch);
        curl_close($ch);
       
        return $result;
}

?>