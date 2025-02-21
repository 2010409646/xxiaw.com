<?php

namespace Home\Action;
use Common\Action\ApiAction;
class BookAction extends ApiAction
{
	public function search()
	{
		$wd =I('get.name');
		$ar =I('get.ar');
		$url='https://www.biquge5200.cc/modules/article/search.php?searchkey='.$wd;
		$lines_string=aicurlpr($url);
		
		
		foreach($lines_string as $k=>$v){
			
			if($v['name']==$wd and $v['au']==$ar){
				
				$data['name']=$v['name'];
				$data['url']=$v['url'];
				$data['zhangurl']=$v['zhangurl'];
				$data['zhangname']=$v['zhangname'];
				$data['zhangname']=$v['zhangname'];
				$data['source']='www.biquge5200.cc';
			}
			
		}
		
		if(!$data){
		echo json_encode(array('code'=>1,'data'=>$data));
		}else{
		echo json_encode(array('code'=>0,'data'=>$data));
		}
		
	}
	
	public function getlist(){
		$url =I('post.url');
		
		//$url='https://www.biquge5200.cc/130_130510/';
		$datas=geturl($url);
		
		if(count($datas)<=0){
		echo json_encode(array('code'=>1,'data'=>$datas));
		}else{
		echo json_encode(array('code'=>0,'data'=>$datas));
		}
		
	}
	
	public function getbookread(){
		
		$url =I('post.url');
		
		$datas=getbookurl($url);
		
		if(count($datas)<=0){
		echo json_encode(array('code'=>1,'data'=>$datas,'url'=>$url));
		}else{
		echo json_encode(array('code'=>0,'data'=>$datas,'url'=>$url));
		}
	}
	
}

function aicurlpr($url) {

	
	$useragent = array(
        'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)',
        'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2)',
        'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)',
        'Mozilla/5.0 (Windows; U; Windows NT 5.2) Gecko/2008070208 Firefox/3.0.1',
        'Opera/9.27 (Windows NT 5.2; U; zh-cn)',
        'Opera/8.0 (Macintosh; PPC Mac OS X; U; en)',
        'Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.2.149.27 Safari/525.13 ',
        'Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/525.13 (KHTML, like Gecko) Version/3.1 Safari/525.13'
    );
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HTTPHEADER,'Content-Type: application/json; charset=gbk');
	curl_setopt($ch, CURLOPT_URL,$url);;
	curl_setopt($ch, CURLOPT_HEADER,0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//禁止调用时就输出获取到的数据
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,true);
	curl_setopt($ch, CURLOPT_USERAGENT, array_rand($useragent));
	$result =html_entity_decode(doEncoding(curl_exec($ch)));
	preg_match_all('|<td class="odd"><a href="https://www.biquge5200.cc/(.*?)/">(.*?)</a></td>|i',$result,$id);
	preg_match_all('|<td class="odd">(.*?)</td>|i',$result,$au);
	preg_match_all('|<td class="even"><a href="(.*?)" target="_blank">(.*?)</a></td>|i',$result,$zhang);
	foreach($au[1] as $k=>$v){
		  if ($k % 2) {
			  $ar[$k]=$v;
		  }
		 
		
		
	}
	$uu=array_merge($ar);
	
	foreach($id as $k=>$v){
		$data[$k]['au']=$uu[$k];
		$data[$k]['name']=$id[2][$k];
		$data[$k]['zhangurl']=$zhang[1][$k];
		$data[$k]['zhangname']=$zhang[2][$k];
		$data[$k]['url']='https://www.biquge5200.cc/'.$id[1][$k].'/';
	}
	
	
	curl_close($ch);
	return $data;
	
}
function geturl($url) {

	$useragent = array(
        'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)',
        'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2)',
        'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)',
        'Mozilla/5.0 (Windows; U; Windows NT 5.2) Gecko/2008070208 Firefox/3.0.1',
        'Opera/9.27 (Windows NT 5.2; U; zh-cn)',
        'Opera/8.0 (Macintosh; PPC Mac OS X; U; en)',
        'Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.2.149.27 Safari/525.13 ',
        'Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/525.13 (KHTML, like Gecko) Version/3.1 Safari/525.13'
    );
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HTTPHEADER,'Content-Type: application/json; charset=gbk');
	curl_setopt($ch, CURLOPT_URL,$url);;
	curl_setopt($ch, CURLOPT_HEADER,0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//禁止调用时就输出获取到的数据
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,true);
	curl_setopt($ch, CURLOPT_USERAGENT, array_rand($useragent));
	$result = curl_exec($ch);
	preg_match_all('|<dd><a href=\"https://www.biquge5200.cc/(.*?)/(.*?)\">(.*?)</a></dd>|i',$result,$title);

	foreach($title[1] as $k=>$v){
		$data[$k]['index']=$k;
		$data[$k]['chapterId']='https://www.biquge5200.cc/'.$title[1][$k].'/'.$title[2][$k];
		$data[$k]['name']=iconv('gbk','UTF-8',$title[3][$k]);
	}
	
	curl_close($ch);
	return $data;
	
}

function getbookurl($url) {
	
	$useragent = array(
        'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)',
        'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2)',
        'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)',
        'Mozilla/5.0 (Windows; U; Windows NT 5.2) Gecko/2008070208 Firefox/3.0.1',
        'Opera/9.27 (Windows NT 5.2; U; zh-cn)',
        'Opera/8.0 (Macintosh; PPC Mac OS X; U; en)',
        'Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.2.149.27 Safari/525.13 ',
        'Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/525.13 (KHTML, like Gecko) Version/3.1 Safari/525.13'
    );
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,$url);;
	curl_setopt($ch, CURLOPT_HEADER,0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//禁止调用时就输出获取到的数据
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,true);
	curl_setopt($ch, CURLOPT_USERAGENT, array_rand($useragent));
	$result =html_entity_decode(doEncoding(curl_exec($ch)));
	preg_match_all('|<div id=\"content\">.*?<\/div>|is',$result,$bodys);

	$data=$bodys[0][0];
	
	curl_close($ch);
	return $data;
	
}
function doEncoding($str){
        $encode = strtoupper(mb_detect_encoding($str, ["ASCII",'UTF-8',"GB2312","GBK",'BIG5']));
        if($encode!='UTF-8'){
            $str = mb_convert_encoding($str, 'UTF-8', $encode);
        }
        return $str;
    }



